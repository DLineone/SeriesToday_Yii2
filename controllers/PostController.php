<?php

namespace app\controllers;

use app\models\Comment;
use app\models\Post;
use app\models\Review;
use app\models\PostSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use Yii;

/**
 * PostController implements the CRUD actions for Post model.
 */
class PostController extends Controller
{


    public function beforeAction($action)
    {
        $this->enableCsrfValidation = false;
        return parent::beforeAction($action);
    }
    /**
     * Lists all Post models.
     *
     * @return string
     */
    public function actionIndex($id)
    {

        $post = Post::find()->where(['id' => (int)$id])->one();

        return $this->render('index', [
            'post' => $post,
            'id' => $id,
        ]);
    }

    public function actionCreaterating()
    {
        $date = Yii::$app->request->post('date');
        $text = Yii::$app->request->post('text');
        $rating = Yii::$app->request->post('rating');
        $post_id = Yii::$app->request->post('post_id');

        $review = new Review();
        $review->date = $date;
        $review->text = $text;
        $review->rating = (int)$rating;
        $review->post_id = (int)$post_id;
        $review->author_id = Yii::$app->session->get('userID');
        $review->date_created = date('Y-m-d h:i:s');

        $review->save();

        return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
    }


    public function actionCreatecomment()
    {
        $date = Yii::$app->request->post('date');
        $text = Yii::$app->request->post('text');
        $post_id = Yii::$app->request->post('post_id');

        $comment = new Comment();
        $comment->date = $date;
        $comment->text = $text;
        $comment->post_id = (int)$post_id;
        $comment->author_id = Yii::$app->session->get('userID');
        $comment->date_created = date('Y-m-d h:i:s');

        $comment->save();

        return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
    }
}
