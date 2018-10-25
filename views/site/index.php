<?php

/* @var $this yii\web\View */

$this->title = 'My Agent';
?>

<div class="container">
    <hr>
    <div class="row">
        <a href="<?= \yii\helpers\Url::to('/site/announcement')?>">
            <div class="col-xs-6" align="center" style="background-color: #e5e5e5;border-right:2px solid #ffffff;">
                <span class="glyphicon glyphicon-volume-up" style="color: #000;font-size: 60px;" aria-hidden="true"></span>
            </div>
        </a>
        <a href="<?= \yii\helpers\Url::to('/site/account')?>">
            <div class="col-xs-6" align="center" style="background-color: #e5e5e5;border-left:2px solid #ffffff;">
                <span class="glyphicon glyphicon-user" style="color: #000;font-size: 60px;" aria-hidden="true"></span>
            </div>
        </a>
        <div class="col-xs-6" align="center" style="background-color: #e5e5e5;border-right:2px solid #ffffff;">
            <span style="color:#000;" align="center;">公告</span>
        </div>
        <div class="col-xs-6" align="center" style="background-color: #e5e5e5;border-left:2px solid #ffffff;">
            <span style="color:#000;" align="center;">账号管理</span>
        </div>
    </div>
    <hr>
    <div class="row">
        <a href="<?= \yii\helpers\Url::to('/site/report')?>">
            <div class="col-xs-6" align="center" style="background-color: #e5e5e5;border-right:2px solid #ffffff;">
                <span class="glyphicon glyphicon-list-alt" style="color: #000;font-size: 60px;" aria-hidden="true"></span>
            </div>
        </a>

        <a href="<?= \yii\helpers\Url::to('/site/contact')?>">
            <div class="col-xs-6" align="center" style="background-color: #e5e5e5;border-left:2px solid #ffffff;">
                <span class="glyphicon glyphicon-earphone" style="color: #000;font-size: 60px;" aria-hidden="true"></span>
            </div>
        </a>
        <div class="col-xs-6" align="center" style="background-color: #e5e5e5;border-right:2px solid #ffffff;">
            <span style="color:#000;" align="center;">报表</span>
        </div>
        <div class="col-xs-6" align="center" style="background-color: #e5e5e5;border-left:2px solid #ffffff;">
            <span style="color:#000;" align="center;">联系我们</span>
        </div>
    </div>
    <hr>
    <div class="row">
        <a onclick="recovery();">
            <div class="col-xs-6" align="center" style="background-color: #e5e5e5;border-right:2px solid #ffffff;">
                <span class="glyphicon glyphicon-repeat" style="color: #000;font-size: 60px;" aria-hidden="true"></span>
            </div>
        </a>

        <a href="<?= \yii\helpers\Url::to('/site/change-password')?>">
            <div class="col-xs-6" align="center" style="background-color: #e5e5e5;border-left:2px solid #ffffff;">
                <span class="glyphicon glyphicon-lock" style="color: #000;font-size: 60px;" aria-hidden="true"></span>
            </div>
        </a>
        <div class="col-xs-6" align="center" style="background-color: #e5e5e5;border-right:2px solid #ffffff;">
            <span style="color:#000;" align="center;">密码恢复</span>
        </div>
        <div class="col-xs-6" align="center" style="background-color: #e5e5e5;border-left:2px solid #ffffff;">
            <span style="color:#000;" align="center;">更改密码</span>
        </div>
    </div>
    <hr>
    <div class="row">
        <a href="<?= \yii\helpers\Url::to('/site/newest-website')?>">
            <div class="col-xs-6" align="center" style="background-color: #e5e5e5;border-right:2px solid #ffffff;">
                <span class="glyphicon glyphicon-link" style="color: #000;font-size: 60px;" aria-hidden="true"></span>
            </div>
        </a>

        <a href="<?= \yii\helpers\Url::to('/site/logout')?>">
            <div class="col-xs-6" align="center" style="background-color: #e5e5e5;border-left:2px solid #ffffff;">
                <span class="glyphicon glyphicon-log-out" style="color: #000;font-size: 60px;" aria-hidden="true"></span>
            </div>
        </a>
        <div class="col-xs-6" align="center" style="background-color: #e5e5e5;border-right:2px solid #ffffff;">
            <span style="color:#000;" align="center;">最新网站</span>
        </div>
        <div class="col-xs-6" align="center" style="background-color: #e5e5e5;border-left:2px solid #ffffff;">
            <span style="color:#000;" align="center;">登出</span>
        </div>
    </div>
    <hr>
</div>