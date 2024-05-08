<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "actor".
 *
 * @property int $id
 * @property string|null $full_name
 *
 * @property PostActor[] $postActors
 * @property Post[] $posts
 */
class Actor extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'actor';
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
     * Gets query for [[PostActors]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPostActors()
    {
        return $this->hasMany(PostActor::class, ['actor_id' => 'id']);
    }

    /**
     * Gets query for [[Posts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPosts()
    {
        return $this->hasMany(Post::class, ['id' => 'post_id'])->viaTable('post_actor', ['actor_id' => 'id']);
    }
}
