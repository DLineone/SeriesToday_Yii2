<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "post_genre".
 *
 * @property int $post_id
 * @property int $genre_id
 *
 * @property Genre $genre
 * @property Post $post
 */
class PostGenre extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'post_genre';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['post_id', 'genre_id'], 'required'],
            [['post_id', 'genre_id'], 'integer'],
            [['post_id', 'genre_id'], 'unique', 'targetAttribute' => ['post_id', 'genre_id']],
            [['genre_id'], 'exist', 'skipOnError' => true, 'targetClass' => Genre::class, 'targetAttribute' => ['genre_id' => 'id']],
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
            'genre_id' => 'Genre ID',
        ];
    }

    /**
     * Gets query for [[Genre]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGenre()
    {
        return $this->hasOne(Genre::class, ['id' => 'genre_id']);
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
