<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "director".
 *
 * @property int $id
 * @property string|null $full_name
 *
 * @property PostDirector[] $postDirectors
 * @property Post[] $posts
 */
class Director extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'director';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['full_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'full_name' => 'Полное Имя',
        ];
    }

    /**
     * Gets query for [[PostDirectors]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPostDirectors()
    {
        return $this->hasMany(PostDirector::class, ['director_id' => 'id']);
    }

    /**
     * Gets query for [[Posts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPosts()
    {
        return $this->hasMany(Post::class, ['id' => 'post_id'])->viaTable('post_director', ['director_id' => 'id']);
    }
}
