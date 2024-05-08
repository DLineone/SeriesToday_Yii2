<?php
$this->title = 'SeriesToday';

use yii\helpers\Url;
?>

<script>
    console.log(`<?= var_dump($posts) ?>`);
    console.log(`<?= var_dump($comments) ?>`);
</script>
<main class="main main_two_side">
    <div class="main__content">

        <?php if (Yii::$app->session->get('userRole') == 'admin') : ?>
            <div class="create_post">
                <button class="button_create_post link">
                    <?= \yii\helpers\Html::img("@web/images/plus.svg") ?>
                    <div>Добавить</div>
                </button>
            </div>
        <?php endif; ?>
        <?php if (!count($posts)) : ?>
            <div class="content_missing">
                Нет записей.
            </div>
        <?php endif; ?>
        <?php foreach ($posts as $post) : ?>
            <a href="<?= Url::to(['/post', "id" => $post->id], 'http') ?>" class="content__item">
                <div>
                    <?= \yii\helpers\Html::img("@web/images/{$post->photo}", ['class' => "content__poster"]) ?>
                    <div class="rating">
                        <?php $ratingCount = count($post->reviews) ?>
                        <?php $positiveCount = count(array_filter($post->reviews, function ($review) {
                            return $review->rating == 1;
                        })) ?>
                        <?php $negativeCount = count(array_filter($post->reviews, function ($review) {
                            return $review->rating == 0;
                        })) ?>
                        <div class="rating__numbers">
                            <div class="rating__positive"><?= $positiveCount ?></div>
                            <div class="rating__negative"><?= $negativeCount ?></div>
                        </div>
                        <div class="rating__display">
                            <?php if ($ratingCount) : ?>
                                <div class="rating__positive" style="--part: <?= $positiveCount / $ratingCount * 100 ?>%;"></div>
                                <div class="rating__negative" style="--part: <?= $negativeCount / $ratingCount * 100 ?>%;"></div>
                            <?php else : ?>
                                <div class="rating__positive" style="--part: <?= 50 ?>%;"></div>
                                <div class="rating__negative" style="--part: <?= 50 ?>%;"></div>
                            <?php endif; ?>
                        </div>
                        <div class="rating__icons">
                            <div class="rating__positive">
                                <?= \yii\helpers\Html::img('@web/images/positive.svg') ?>
                            </div>
                            <div class="rating__negative">
                                <?= \yii\helpers\Html::img('@web/images/negative.svg') ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div style="justify-self: stretch; align-self: stretch; width: 100%;">
                    <div class="item__header">
                        <span class="header__name">
                            <?= $post->name ?> - <?= $post->season ?> сезон - <?= $post->series ?> серия
                        </span>
                        <span class="header__date">
                            <?= Yii::$app->formatter->asDate(DateTime::createFromFormat('Y-m-d', $post->date), 'dd.MM.yyyy') ?>
                        </span>
                    </div>
                    <div class="item__countrys">
                        <span class="text-bold">
                            Страна:
                        </span>
                        <span class="text-fade">
                            <?= implode(', ', array_map(function ($elem) {
                                return $elem->full_name;
                            }, $post->countries)) ?>
                        </span>
                    </div>
                    <div class="item__genres">
                        <span class="text-bold">
                            Жанр:
                        </span>
                        <span class="text-fade">
                            <?= implode(', ', array_map(function ($elem) {
                                return $elem->full_name;
                            }, $post->genres)) ?>
                        </span>
                    </div>
                    <div class="item__directors">
                        <span class="text-bold">
                            Режисеры:
                        </span>
                        <span class="text-fade">
                            <?= implode(', ', array_map(function ($elem) {
                                return $elem->full_name;
                            }, $post->directors)) ?>
                        </span>
                    </div>
                    <div class="item__actors">
                        <span class="text-bold">
                            В ролях:
                        </span>
                        <span class="text-fade">
                            <?= implode(', ', array_map(function ($elem) {
                                return $elem->full_name;
                            }, $post->actors)) ?>
                        </span>
                    </div>
                    <div class="item__description">
                        <?= $post->description ?>
                    </div>
                </div>
            </a>
        <?php endforeach; ?>
    </div>
    <div class="main__chat">
        <div class="chat__content" style="width: 100%;">
            <?php foreach (array_reverse($comments) as $comment) : ?>
                <div class="chat__message" style="width: 100%;">
                    <?php if (Yii::$app->session->get('userRole') == 'admin') : ?>
                        <div class="admin__message" style="display: flex;">
                            <div class="message__name" style="margin-right: auto;"><?= $comment->author->name ?></div>
                            <div class="controls" style="display: flex;">
                                <form action="<?= Url::to(['/user/delete', 'id' => $comment->author->id]) ?>" method="POST">
                                    <button type="submit" class=" link" style="display: flex;">
                                        <?= \yii\helpers\Html::img("@web/images/block_user.svg") ?>
                                        <div style="color: var(--fade-text);">Блок.</div>
                                    </button>
                                </form>
                                <form action="<?= Url::to(['/comment/delete', 'id' => $comment->id]) ?>" method="POST">
                                    <button type="submit" class=" link" style="display: flex;">
                                        <?= \yii\helpers\Html::img("@web/images/delete.svg") ?>
                                        <div style="color: var(--fade-text);">Удалить</div>
                                    </button>
                                </form>
                            </div>
                        </div>
                    <?php else : ?>
                        <div class="message__name"><?= $comment->author->name ?></div>
                    <?php endif; ?>
                    <div class="message__time">
                        <?= Yii::$app->formatter->asDate(DateTime::createFromFormat('Y-m-d H:i:s', $comment->date_created), 'dd.MM.yyyy - HH:mm') ?>
                    </div>
                    <div class="message__text">
                        <?= $comment->text ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <?php if (Yii::$app->session->get('userToken')) : ?>

            <form action="<?= Url::to(['posts/createcomment']) ?>" method="POST" name="chatform" style="display: contents;">
                <input type="text" value="<?= Yii::$app->getRequest()->getQueryParam('date') ?>" name="date" style="display: none;" />
                <input name="text" onchange="document.chatform.submit()" class="chat__input" placeholder="Написать сообщение..." />
            </form>

        <?php endif; ?>
    </div>
</main>