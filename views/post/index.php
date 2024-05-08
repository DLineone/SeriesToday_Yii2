<?php
$this->title = 'SeriesToday';

use yii\helpers\Url;
?>

<script>
    console.log(`<?= var_dump($post->reviews[1]) ?>`);
    console.log(`<?= var_dump($post->reviews[1]->date_created) ?>`);
    console.log(`<?= var_dump(count($post->reviews)) ?>`);
    console.log(`<?= var_dump(count(array_filter($post->reviews, function ($review) {
                        return $review->rating == 1;
                    }))) ?>`);
    console.log(`<?= var_dump(count($post->comments)) ?>`);
</script>
<main class="main main_two_side">
    <div class="main__content content_post">
        <div class="content__item">
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
        </div>

        <?php if (
            Yii::$app->session->get('userToken') &&
            !count(array_filter($post->reviews, function ($obj) {
                return $obj->author_id == Yii::$app->session->get('userID');
            }))
        ) : ?>

            <form action="<?= Url::to(['post/createrating']) ?>" method="POST" class="content__make_review">
                <div class="review__name"><?= Yii::$app->session->get('userName') ?></div>
                <textarea name="text" class="review__input" placeholder="Текст обзора..."></textarea>
                <div class="review__undertext">Рекомендуете ли вы этот сериал?</div>
                <input type="text" value="<?= $post->date ?>" name="date" style="display: none;" />
                <input type="text" value="<?= $post->id ?>" name="post_id" style="display: none;" />
                <div class="review__controls">
                    <button name="rating" value="1" type="submit" class="controls__positive button button_review_positive">
                        <?= \yii\helpers\Html::img('@web/images/review_positive.svg') ?>
                        <span>Да</span>
                    </button>
                    <button name="rating" value="0" type="submit" class="controls__negative button button_review_negative">
                        <?= \yii\helpers\Html::img('@web/images/review_negative.svg') ?>
                        <span>Нет</span>
                    </button>
                </div>
            </form>

        <?php endif; ?>

        <?php foreach ($post->reviews as $review) : ?>
            <div class="content__review">
                <div class="review__info">
                    <div class="review__detail">
                        <?php if (Yii::$app->session->get('userRole') == 'admin') : ?>
                            <div class="admin__message" style="display: flex;">
                                <div class="review__name"><?= $review->author->name ?></div>
                                <div class="controls" style="display: flex;">
                                    <form action="<?= Url::to(['/user/delete', 'id' => $review->author->id]) ?>" method="POST">
                                        <button type="submit" class=" link" style="display: flex;">
                                            <?= \yii\helpers\Html::img("@web/images/block_user.svg") ?>
                                            <div style="color: var(--fade-text);">Блок.</div>
                                        </button>
                                    </form>
                                    <form action="<?= Url::to(['/review/delete', 'id' => $review->id]) ?>" method="POST">
                                        <button type="submit" class=" link" style="display: flex;">
                                            <?= \yii\helpers\Html::img("@web/images/delete.svg") ?>
                                            <div style="color: var(--fade-text);">Удалить</div>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        <?php else : ?>
                            <div class="review__name"><?= $review->author->name ?></div>
                        <?php endif; ?>

                        <div class="review__datetime">
                            <?= Yii::$app->formatter->asDate(DateTime::createFromFormat('Y-m-d H:i:s', $review->date_created), 'dd.MM.yyyy - HH:mm') ?>
                        </div>
                    </div>
                    <?php if ($review->rating) : ?>

                        <div class="review__rating rating_card_positive">
                            <?= \yii\helpers\Html::img('@web/images/review_positive.svg') ?>
                            <span>Рекомендую</span>
                        </div>

                    <?php else : ?>

                        <div class="review__rating rating_card_negative">
                            <?= \yii\helpers\Html::img('@web/images/review_negative.svg') ?>
                            <span>Не рекомендую</span>
                        </div>

                    <?php endif; ?>

                </div>
                <div class="review__text">
                    <?= $review->text ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <div class="main__chat">
        <div class="chat__content">
            <?php foreach (array_reverse($post->comments) as $comment) : ?>
                <div class="chat__message">
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

            <form action="<?= Url::to(['post/createcomment']) ?>" method="POST" name="chatform" style="display: contents;">
                <input type="text" value="<?= $post->date ?>" name="date" style="display: none;" />
                <input type="text" value="<?= $post->id ?>" name="post_id" style="display: none;" />
                <input name="text" onchange="document.chatform.submit()" class="chat__input" placeholder="Написать сообщение..." />
            </form>

        <?php endif; ?>

    </div>
</main>