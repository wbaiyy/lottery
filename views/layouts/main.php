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
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <!--<link href='https://fonts.googleapis.com/css?family=Quicksand:400,700|Quattrocento+Sans:400,700|Palanquin:400,600|Raleway|Josefin+Sans' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="assets/css/font-awesome.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.css">
    <link rel="stylesheet" href="assets/css/owl.theme.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">-->
</head>
<body>
<?php $this->beginBody() ?>
<?php if(!isset($this->params['isLogin'])):?>
    <header style="background: #950f0f;">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="logo">
                        <h2><a href="<?= \yii\helpers\Url::to('/site/index')?>" style="color: #fffdfd;"><?=yii::$app->user->getIdentity()->loginname?></a></h2>
                    </div>
                </div>
                <div class="col-md-8">
                    <div id="menu" class="menu">
                        <ul>
                            <li><a href="<?= \yii\helpers\Url::to('/site/index')?>" class="active">首页</a></li>
                            <li><a href="<?= \yii\helpers\Url::to('/site/announcement')?>">公告</a></li>
                            <li><a href="<?= \yii\helpers\Url::to('/site/account')?>">账号管理</a></li>
                            <li><a href="<?= \yii\helpers\Url::to('/site/report')?>">报表</a></li>
                            <li><a href="<?= \yii\helpers\Url::to('/site/contact')?>">联系我们</a></li>
                            <li><a onclick="notice();">在线客服</a></li>
                            <li><a onclick="recovery();">密码恢复</a></li>
                            <li><a href="<?= \yii\helpers\Url::to('/site/change-password')?>">更改密码</a></li>
                            <li><a href="<?= \yii\helpers\Url::to('/site/newest-website')?>">最新网址</a></li>
                            <li><a href="<?= \yii\helpers\Url::to('/site/logout')?>">退出</a></li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>
<?php else:?>
    <header style="background: #950f0f;">
        <div class="container">
            <div class="row">
                <div class="col-md-12" align="center">
                    <div class="logo">
                        <h2><a href="login.html" style="color: #fffdfd;">简体版</a></h2>
                    </div>
                </div>
            </div>
        </div>
    </header>
<?php endif;?>
<?= $content ?>
<footer>
    <div class="main-footer">
        <p> Copyright © 2018 By echo</p>
    </div>
</footer>
<?php $this->endBody() ?>
</body>
<script>
    function notice() {
        alert("该功能展示未开放，敬请期待！");
        return false;
    }
    function recovery() {
        alert("已恢复，初始密码为123456！");
        window.location.href = "<?= \yii\helpers\Url::to('/site/recovery-password') ?>";
    }
</script>
<?php if(isset($this->blocks['footer']) == true):?>
    <?= $this->blocks['footer'] ?>
<?php endif;?>
</html>
<?php $this->endPage() ?>
