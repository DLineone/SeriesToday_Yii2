<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "post_country".
 *
 * @property int $post_id
 * @property int $country_id
 *
 * @property Country $country
 * @property Post $post
 */
class PostCountry extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'post_country';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['post_id', 'country_id'], 'required'],
            [['post_id', 'country_id'], 'integer'],
            [['post_id', 'country_id'], 'unique', 'targetAttribute' => ['post_id', 'country_id']],
            [['country_id'], 'exist', 'skipOnError' => true, 'targetClass' => Country::class, 'targetAttribute' => ['country_id' => 'id']],
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
            'country_id' => 'Country ID',
        ];
    }

    /**
     * Gets query for [[Country]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCountry()
    {
        return $this->hasOne(Country::class, ['id' => 'country_id']);
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
