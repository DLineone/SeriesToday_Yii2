<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "post_director".
 *
 * @property int $post_id
 * @property int $director_id
 *
 * @property Director $director
 * @property Post $post
 */
class PostDirector extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'post_director';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['post_id', 'director_id'], 'required'],
            [['post_id', 'director_id'], 'integer'],
            [['post_id', 'director_id'], 'unique', 'targetAttribute' => ['post_id', 'director_id']],
            [['director_id'], 'exist', 'skipOnError' => true, 'targetClass' => Director::class, 'targetAttribute' => ['director_id' => 'id']],
            [['post_id'], 'exist', 'skipOnError' => true, 'targetClass' => Post::class, 'targetAttribute' => ['post_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'post_id' => 'Post ID',
            'director_id' => 'Director ID',
        ];
    }

    /**
     * Gets query for [[Director]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDirector()
    {
        return $this->hasOne(Director::class, ['id' => 'director_id']);
    }

    /**
     * Gets query for [[Post]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPost()
    {
        return $this->hasOne(Post::class, ['id' => 'post_id']);
    }
}
