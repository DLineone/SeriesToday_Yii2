<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $mail
 * @property string|null $password
 * @property string|null $role
 *
 * @property Comment[] $comments
 * @property Post[] $posts
 * @property Review[] $reviews
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'mail', 'password', 'role'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Имя',
            'mail' => 'Почта',
            'password' => 'Пароль',
            'role' => 'Роль',
        ];
    }

    /**
     * Gets query for [[Comments]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comment::class, ['author_id' => 'id']);
    }

    /**
     * Gets query for [[Posts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPosts()
    {
        return $this->hasMany(Post::class, ['author_id' => 'id']);
    }

    /**
     * Gets query for [[Reviews]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReviews()
    {
        return $this->hasMany(Review::class, ['author_id' => 'id']);
    }

    static public function findByName($name)
    {
        return User::find()->where(['name' => $name])->one();
    }

    static public function validatePassword($user, $password)
    {
        return User::find()->where(['id' => $user->id])->one()->password == $password;
    }
}
