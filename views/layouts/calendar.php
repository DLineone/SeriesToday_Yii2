<?php

use app\assets\AppAsset;
use yii\helpers\Html;
use yii\helpers\Url;

AppAsset::register($this);

?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">

<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>

<body>
    <?php $this->beginBody() ?>
    <header class="header">
        <a href="<?= Url::to(['/']) ?>" style="display: contents;">
            <?= \yii\helpers\Html::img('@web/images/Logo.svg') ?>
        </a>
    </header>
    <div class="unfilter">
        <?php if (Yii::$app->getRequest()->getQueryParam('date')) : ?>
            <a href="<?= Url::to([Yii::$app->request->url, 'date' => Yii::$app->getRequest()->getQueryParam('date')]) ?>" class="link">
                <?= \yii\helpers\Html::img('@web/images/unfilter.svg') ?>
            </a>
        <?php else : ?>
            <a href="<?= Url::to([Yii::$app->request->url]) ?>" class="link">
                <?= \yii\helpers\Html::img('@web/images/unfilter.svg') ?>
            </a>
        <?php endif; ?>
    </div>
    <nav class="menu">
        <ul class="filters">
            <li class="menu-item">
                <a href="<?= Url::to(['/posts', 'date' => date('Y-m-d')]) ?>" class="link">Сегодня</a>
            </li>
            <li class="menu-item">
                <a class="link">Популярные</a>
            </li>
            <li class="menu-item">
                <a class="link">Фавориты</a>
            </li>
            <li class="menu-item menu-item_right link">
                <form action="<?= Url::to(['/posts']) ?>" method="GET" name="dateform" style="display: contents;">
                    <?php if (Yii::$app->getRequest()->getQueryParam('date')) : ?>

                        <span class="menu-date">
                            <?= Yii::$app->formatter->asDate(Yii::$app->getRequest()->getQueryParam('date'), 'dd.MM.yyyy') ?>
                        </span>
                        <input onchange="document.dateform.submit()" value="<?= Yii::$app->getRequest()->getQueryParam('date') ?>" name="date" type="date" class="datepicker-input">

                    <?php else : ?>

                        <?= \yii\helpers\Html::img('@web/images/searchByDate.svg', ['height' => "40", 'width' => "40"]) ?>
                        <input onchange="document.dateform.submit() " name="date" type="date" class="datepicker-input">
                    <?php endif; ?>

                </form>
            </li>
        </ul>
        <div class="search">
            <input class="search__input" type="text" placeholder="Найти">
            <button type="button" class="link search__button">
                <?= \yii\helpers\Html::img('@web/images/search_icon.svg') ?>
            </button>
        </div>
    </nav>
    <div class="user-section">

        <?php if (Yii::$app->session->get('userToken')) : ?>

            <div class="user-name"><?= Yii::$app->session->get('userName'); ?></div>
            <form action="<?= Url::to(['auth/logout']) ?>" method="POST" style="display: contents;">
                <button type="submit" class="button button_color_primary">Выход</button>
            </form>

        <?php else : ?>

            <button class="button button_color_primary button_login">Вход</button>
            <button class="button button_transparent_primary button_sign-in">Регистрация</button>

        <?php endif; ?>

    </div>

    <?= $content ?>

    <div class="modal modal_login modal_closed">
        <form action="<?= Url::to(['auth/login']) ?>" method="POST" class="modal__form form_login">
            <div class="modal__header">
                Добро пожаловать!
            </div>
            <input value="John Doe" name="form[name]" placeholder="Логин" type="text" class="modal__input" />
            <input value="securepass1" name="form[password]" placeholder="Пароль" type="password" class="modal__input" />
            <div class="modal__controls">
                <button type="submit" class="button button_color_primary">Вход</button>
                <button type="button" class="button button_transparent_primary">Отмена</button>
            </div>
        </form>
    </div>
    <div class="modal modal_sign-in modal_closed">
        <form action="<?= Url::to(['auth/signin']) ?>" method="POST" class="modal__form form_sign-in">
            <div class="modal__header">
                Регистрация
            </div>
            <input name="form[name]" placeholder="Логин" type="text" class="modal__input" />
            <input name="form[password]" placeholder="Пароль" type="password" class="modal__input" />
            <input name="form[email]" placeholder="Почта" type="email" class="modal__input" />
            <div class="modal__controls">
                <button type="submit" class="button button_color_primary">Зарегистрироваться</button>
                <button type="button" class="button button_transparent_primary">Отмена</button>
            </div>
        </form>
    </div>
    <div class="modal modal_create_post modal_post modal_closed">
        <form action="<?= Url::to(['posts/createpost']) ?>" method="POST" class="modal__form modal_post_form form_create_post">

            <div style="display: flex; justify-self: stretch; align-self: stretch;">
                <div class="left_block">
                    <input style="display: none;" name="photo" placeholder="Логин" type="file" class="modal__input" />
                    <div class="photo_holder" ondrop="dropHandler(event);" ondragover="dragOverHandler(event);">
                    </div>
                    <script>
                        function dragOverHandler(ev) {
                            console.log("File(s) in drop zone");

                            // Prevent default behavior (Prevent file from being opened)
                            ev.preventDefault();
                        }

                        function dropHandler(ev) {
                            ev.preventDefault();

                            let file;
                            let imgContainer = document.querySelector('.photo_holder');

                            if (ev.dataTransfer.items) {

                                file = ev.dataTransfer.items[0].getAsFile();

                            } else {
                                file = ev.dataTransfer.files[0];
                            }

                            console.log(file.name);

                            document.querySelector('.left_block input').value = file;
                            let img = document.createElement('img');
                            img.src = URL.createObjectURL(file);
                            img.height = '100%';
                            img.width = '100%';
                            imgContainer.appendChild(img);
                        }
                    </script>
                </div>
                <div class="right_block">
                    <input name="name" placeholder="Написать название..." type="text" class="modal__input" />
                    <input name="season" placeholder="Написать сезон..." type="text" class="modal__input" />
                    <input name="series" placeholder="Написать серию..." type="text" class="modal__input" />
                    <input name="countries" placeholder="Написать страну..." type="text" class="modal__input" />
                    <input name="genres" placeholder="Написать жанр..." type="text" class="modal__input" />
                    <input name="directors" placeholder="Написать режисеров..." type="text" class="modal__input" />
                    <input name="actors" placeholder="Написать актеров..." type="text" class="modal__input" />
                    <input name="date" value="<?= Yii::$app->getRequest()->getQueryParam('date') ?>" placeholder="Написать актеров..." type="hidden" class="modal__input" />
                    <textarea name="description" placeholder="Написать описание..." type="text" class="modal__input modal__input-description"></textarea>
                </div>
            </div>
            <div class="modal__controls">
                <button type="submit" class="button button_color_primary">Создать</button>
                <button type="button" class="button button_transparent_primary">Отмена</button>
            </div>
        </form>
    </div>
    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>