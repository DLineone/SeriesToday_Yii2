<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "post".
 *
 * @property int $id
 * @property string|null $name
 * @property int|null $season
 * @property int|null $series
 * @property string|null $description
 * @property string|null $photo
 * @property int|null $author_id
 * @property string|null $date
 * @property string|null $date_created
 *
 * @property Actor[] $actors
 * @property User $author
 * @property Comment[] $comments
 * @property Country[] $countries
 * @property Director[] $directors
 * @property Genre[] $genres
 * @property PostActor[] $postActors
 * @property PostCountry[] $postCountries
 * @property PostDirector[] $postDirectors
 * @property PostGenre[] $postGenres
 * @property Review[] $reviews
 */
class Post extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'post';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['season', 'series', 'author_id'], 'integer'],
            [['description'], 'string'],
            [['date', 'date_created'], 'safe'],
            [['name', 'photo'], 'string', 'max' => 255],
            [['author_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['author_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'season' => 'Сезон',
            'series' => 'Серия',
            'description' => 'Описания',
            'photo' => 'Фото',
            'author_id' => 'ID Автора',
            'date' => 'Дата',
            'date_created' => 'Дата Создания',
        ];
    }

    /**
     * Gets query for [[Actors]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getActors()
    {
        return $this->hasMany(Actor::class, ['id' => 'actor_id'])->viaTable('post_actor', ['post_id' => 'id']);
    }

    /**
     * Gets query for [[Author]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAuthor()
    {
        return $this->hasOne(User::class, ['id' => 'author_id']);
    }

    /**
     * Gets query for [[Comments]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comment::class, ['post_id' => 'id']);
    }

    /**
     * Gets query for [[Countries]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCountries()
    {
        return $this->hasMany(Country::class, ['id' => 'country_id'])->viaTable('post_country', ['post_id' => 'id']);
    }

    /**
     * Gets query for [[Directors]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDirectors()
    {
        return $this->hasMany(Director::class, ['id' => 'director_id'])->viaTable('post_director', ['post_id' => 'id']);
    }

    /**
     * Gets query for [[Genres]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGenres()
    {
        return $this->hasMany(Genre::class, ['id' => 'genre_id'])->viaTable('post_genre', ['post_id' => 'id']);
    }

    /**
     * Gets query for [[PostActors]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPostActors()
    {
        return $this->hasMany(PostActor::class, ['post_id' => 'id']);
    }

    /**
     * Gets query for [[PostCountries]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPostCountries()
    {
        return $this->hasMany(PostCountry::class, ['post_id' => 'id']);
    }

    /**
     * Gets query for [[PostDirectors]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPostDirectors()
    {
        return $this->hasMany(PostDirector::class, ['post_id' => 'id']);
    }

    /**
     * Gets query for [[PostGenres]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPostGenres()
    {
        return $this->hasMany(PostGenre::class, ['post_id' => 'id']);
    }

    /**
     * Gets query for [[Reviews]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReviews()
    {
        return $this->hasMany(Review::class, ['post_id' => 'id']);
    }
}
