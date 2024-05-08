<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\PostAdminSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="post-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'season') ?>

    <?= $form->field($model, 'series') ?>

    <?= $form->field($model, 'description') ?>

    <?php // echo $form->field($model, 'photo') ?>

    <?php // echo $form->field($model, 'author_id') ?>

    <?php // echo $form->field($model, 'date') ?>

    <?php // echo $form->field($model, 'date_created') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
