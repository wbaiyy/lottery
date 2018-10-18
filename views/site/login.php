<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = '登录';
$this->params['isLogin'] = true;
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="container">
    <div class="row clearfix">
        <div class="col-md-12" style="background-color: #e2e2e2;width: 320px;height: 280px;margin: 0 auto;margin-top: 20px;margin-bottom: 20px;">
            <div class="col-md-12 column">
                <div class="form-group" align="center" style="padding-top:20px;">
                    <button type="button" class="btn btn-large btn-primary">登录1</button>
                    <button type="button" class="btn btn-large btn-info">登录2</button>
                    <button type="button" class="btn btn-large btn-warning">登录3</button>
                </div>
                <form class="form-horizontal" role="form" action="<?= \yii\helpers\Url::to('/site/login')?>" method="post">
                    <input type="hidden" name="_csrf" value="<?= Yii::$app->request->csrfToken ?>">
                    <div class="col-lg-10" style="padding-bottom: 20px;">
                        <input type="text" class="form-control" name="username" placeholder="请输入账户名" required
                               autofocus />
                    </div>

                    <div class="col-lg-10" style="padding-bottom: 20px;">
                        <input type="password" class="form-control" name="password" placeholder="请输入密码" required
                               autofocus />
                    </div>
                    <?php if($model->hasErrors()):?>
                    <div>
                        <?php
                            $message = '';
                            foreach ($model->getErrors() as $attr => $error) {
                                $message .= implode(',', $error);
                            }
                        ?>

                        <span id="errors" style="color: red"> <?=$message?></span>
                    </div>
                    <?php endif;?>
                    <div class="col-lg-10" style="padding-bottom: 10px;">
                        <input type="checkbox" class="col-lg-1">记住密码</input>
                    </div>
                    <div class="col-lg-10" style="padding-bottom: 20px;">
                        <button type="submit" id="btn" class="btn btn-block btn-success" type="button">登入</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
