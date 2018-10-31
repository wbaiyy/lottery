<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = '帐号管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">
    <hr>
    <div class="row">
        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span12">
                    <a href="<?= \yii\helpers\Url::to('/site/account-detail-set')?>">
                        <button class="btn btn-large btn-inverse btn-block" type="button">详细设定</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-xs-12" align="center">
            <div class="row-fluid">
                <div class="span12">
                    <a href="<?= \yii\helpers\Url::to('/site/account-sub-list')?>">
                        <button class="btn btn-large btn-inverse btn-block" type="button" >子账号</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-xs-12" align="center">
            <div class="row-fluid">
                <div class="span12">
                    <button class="btn btn-large btn-inverse btn-block" type="button"  onclick="anotice();">会员</button>
                </div>
            </div>
        </div>
    </div>
    <hr>
</div>

<script>
    function anotice() {
        alert("该功能即将上线，敬请期待！");
        return false;
    }
    function recovery() {
        alert("已恢复，初始密码为123456！");
        window.location.href = "index.html";
    }
</script>