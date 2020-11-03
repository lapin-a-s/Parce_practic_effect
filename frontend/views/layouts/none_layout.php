<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <div class="pos-f-t">
        <div class="collapse" id="navbarToggleExternalContent">
            <div class="bg-dark p-4">
                <h4 class="text-white">Collapsed content</h4>
                <span class="text-muted">Toggleable via the navbar brand.</span>
            </div>
        </div>
        <?php
        NavBar::begin([
        ]);
        if (Yii::$app->user->isGuest) {
            $menuItems[] = ['label' => 'Регистрация', 'url' => ['/effect/index']];
            $menuItems[] = ['label' => 'Авторизация', 'url' => ['/effect/login']];
        }
       else if (Yii::$app->user->identity->username == 'Admin') {
            $menuItems[] = ['label' => 'Регистрация', 'url' => ['/effect/index']];
            $menuItems[] = ['label' => 'Авторизация', 'url' => ['/effect/login']];
            $menuItems[] = ['label' => 'В магазин', 'url' => ['/effect/mainwindowadmin']];
        } else {
            $menuItems[] = ['label' => 'Перейти к авторизации', 'url' => ['/effect/login']];
            $menuItems[] = ['label' => 'Регистрация', 'url' => ['/effect/index']];
            $menuItems[] = ['label' => 'В магазин', 'url' => ['/effect/mainwindow']];
        }
        echo Nav::widget([
            'options' => ['class' => 'navbar-nav navbar-left'],
            'items' => $menuItems,
        ]);
        NavBar::end();
        ?>

        <div class="container">
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <?= Alert::widget() ?>
            <?= $content ?>
        </div>
    </div>
    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
