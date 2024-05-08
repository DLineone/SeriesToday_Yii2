<?php

namespace app\controllers;
use app\models\Post;

class CalendarController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $posts = Post::find()->all();
        return $this->render('index', [
            'posts' => $posts
        ]);
    }

}
