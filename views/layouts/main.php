<?php

/* @var $this \yii\web\View */

/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

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
    <?php
    NavBar::begin([
        'brandLabel' => 'Біржа фрілансу «ОА»',
        'brandUrl' => ['/todo/index'],
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
            'id' => 'header',
        ],  
    ]); 
    echo('<ul class="nav navbar-nav" id="headerok">
      <li><a href="/web/index.php?r=todo/orders">Виконавець</a></li>
      <li><a href="/web/index.php?r=todo/login">Роботодавець</a></li>
      <li><a href="/web/index.php?r=todo/about">Про нас</a></li>
       <li><a href="/web/index.php?r=todo/contacts">Контанти</a></li>
    </ul>');
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'Головна', 'url' => ['/todo/index']],
            empty(Yii::$app->session['logged_user']) ? (

            ['label' => 'Вхід', 'url' => ['/todo/login']]
            ) : (
            ['label' => 'Вихід', 'url' => ['/todo/logout'],

            ]

            )
        ],
    ]);

    NavBar::end();
       echo('<br> <br>')
    ?>
    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy;2017 "НаУ ОА" Економічна кібернетика. Проект з програмування. <br>
    Острог - <?= date('Y') ?></p>

        <p class="pull-right">
    <a href="/web/index.php?r=todo/index"> Головна </a> |
    <a href="/web/index.php?r=todo/orders"> Виконавець </a> |
    <a href="/web/index.php?r=todo/login"> Роботодавець </a> |
    <a href="/web/index.php?r=todo/about"> Про нас </a> |
    <a href="/web/index.php?r=todo/contacts"> Контакти </a></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
