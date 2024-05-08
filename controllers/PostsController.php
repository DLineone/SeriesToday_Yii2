<?php

namespace app\controllers;

use app\models\Actor;
use app\models\Post;
use app\models\Comment;
use app\models\Country;
use app\models\Director;
use app\models\Genre;
use app\models\PostActor;
use app\models\PostCountry;
use app\models\PostDirector;
use app\models\PostGenre;
use Yii;

class PostsController extends \yii\web\Controller
{
    public function beforeAction($action)
    {
        $this->enableCsrfValidation = false;
        return parent::beforeAction($action);
    }

    public function actionIndex($date)
    {
        $posts = Post::find()->where(['date' => $date])->all();
        $comments = Comment::find()->where(['date' => $date])->andWhere(['post_id' => NULL])->all();
        return $this->render('index', [
            'date' => $date,
            'posts' => $posts,
            'comments' => $comments,
        ]);
    }


    public function actionCreatecomment()
    {
        $date = Yii::$app->request->post('date');
        $text = Yii::$app->request->post('text');

        $comment = new Comment();
        $comment->date = $date;
        $comment->text = $text;
        $comment->post_id = NULL;
        $comment->author_id = Yii::$app->session->get('userID');
        $comment->date_created = date('Y-m-d h:i:s');

        $comment->save();

        return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
    }

    public function actionCreatepost()
    {
        $name = Yii::$app->request->post('name');
        $season = (int)Yii::$app->request->post('season');
        $series = (int)Yii::$app->request->post('series');
        $countries = explode(",", Yii::$app->request->post('countries'));
        $genres = explode(",", Yii::$app->request->post('genres'));
        $directors = explode(",", Yii::$app->request->post('directors'));
        $actors = explode(",", Yii::$app->request->post('actors'));
        $description = Yii::$app->request->post('description');
        $date = Yii::$app->request->post('date');
        $photo = 'poster.png';

        $post = new Post();
        $post->name = $name;
        $post->description = $description;
        $post->date = $date;
        $post->photo = $photo;
        $post->author_id = Yii::$app->session->get('userID');
        $post->season = $season;
        $post->series = $series;
        $post->save();

        foreach ($countries as $countryname) {
            if ($country = Country::find()->where(['full_name' => $countryname])->one()) {
                $junction = new PostCountry();
                $junction->post_id = $post->id;
                $junction->country_id = $country->id;
                $junction->save();
            } else {
                $country = new Country();
                $country->full_name = $countryname;
                $country->save();
                $junction = new PostCountry();
                $junction->post_id = $post->id;
                $junction->countryid = $country->id;
                $junction->save();
            }
        }
        foreach ($genres as $genrename) {
            if ($genre = Genre::find()->where(['full_name' => $genrename])->one()) {
                $junction = new PostGenre();
                $junction->post_id = $post->id;
                $junction->genre_id = $genre->id;
                $junction->save();
            } else {
                $genre = new Genre();
                $genre->full_name = $genrename;
                $genre->save();
                $junction = new PostGenre();
                $junction->post_id = $post->id;
                $junction->genre_id = $genre->id;
                $junction->save();
            }
        }
        foreach ($directors as $directorname) {
            if ($director = Director::find()->where(['full_name' => $directorname])->one()) {
                $junction = new PostDirector();
                $junction->post_id = $post->id;
                $junction->director_id = $director->id;
                $junction->save();
            } else {
                $director = new Director();
                $director->full_name = $directorname;
                $director->save();
                $junction = new PostDirector();
                $junction->post_id = $post->id;
                $junction->director_id = $director->id;
                $junction->save();
            }
        }
        foreach ($actors as $actorname) {
            if ($actor = Actor::find()->where(['full_name' => $actorname])->one()) {
                $junction = new PostActor();
                $junction->post_id = $post->id;
                $junction->actor_id = $actor->id;
                $junction->save();
            } else {
                $actor = new Actor();
                $actor->full_name = $actorname;
                $actor->save();
                $junction = new PostActor();
                $junction->post_id = $post->id;
                $junction->actor_id = $actor->id;
                $junction->save();
            }
        }
        return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
    }
}
