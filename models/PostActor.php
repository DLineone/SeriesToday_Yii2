<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "post_actor".
 *
 * @property int $post_id
 * @property int $actor_id
 *
 * @property Actor $actor
 * @property Post $post
 */
class PostActor extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'post_actor';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['post_id', 'actor_id'], 'required'],
            [['post_id', 'actor_id'], 'integer'],
            [['post_id', 'actor_id'], 'unique', 'targetAttribute' => ['post_id', 'actor_id']],
            [['actor_id'], 'exist', 'skipOnError' => true, 'targetClass' => Actor::class, 'targetAttribute' => ['actor_id' => 'id']],
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
            'actor_id' => 'Actor ID',
        ];
    }

    /**
     * Gets query for [[Actor]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getActor()
    {
        return $this->hasOne(Actor::class, ['id' => 'actor_id']);
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
