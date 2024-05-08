<?php

use app\models\Post;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\PostAdminSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Posts';
$this->params['breadcrumbs'][] = $this->title;
?>
<main class="main">

    <div class="post-index">

        <h1><?= Html::encode($this->title) ?></h1>

        <p>
            <?= Html::a('Create Post', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

        <?php // echo $this->render('_search', ['model' => $searchModel]); 
        ?>

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'id',
                'name',
                'season',
                'series',
                'description:ntext',
                //'photo',
                //'author_id',
                //'date',
                //'date_created',
                [
                    'class' => ActionColumn::className(),
                    'urlCreator' => function ($action, Post $model, $key, $index, $column) {
                        return Url::toRoute([$action, 'id' => $model->id]);
                    }
                ],
            ],
        ]); ?>


    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelector("tr.filters").classList.toggle('filters');
        });
    </script>
</main>