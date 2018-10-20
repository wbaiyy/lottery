<?php
/**
 * Created by PhpStorm.
 * User: Wbin
 * Date: 2018/10/20
 * Time: 16:46
 */
/* @var $this yii\web\view  */
$this->title = "修改密码";
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="container">
    <div class="row clearfix">
        <div class="col-md-12 column">
            <h3 style="padding-top:20px;padding-bottom:10px;color:#6c6565;">
                更改密码
            </h3>
            <form class="form-horizontal" role="form" method="post">
                <input type="hidden" name="_csrf" value="<?= Yii::$app->request->csrfToken ?>">
                <div class="form-group">
                    <label for="inputPassword2" class="col-sm-2 control-label" style="color:#950f0f;">旧密码</label>
                    <div class="col-sm-10">
                        <input type="password" name="oldPassword" class="form-control" id="inputPassword1" />
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword2" class="col-sm-2 control-label" style="color:#950f0f;">新密码</label>
                    <div class="col-sm-10">
                        <input type="password" name="password" class="form-control" id="inputPassword2" />
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label"  style="color:#950f0f;">确认密码</label>
                    <div class="col-sm-10">
                        <input type="password" name="confirmPassword" class="form-control" id="inputPassword3" />
                    </div>
                </div>
                <?php if($model->hasErrors()):?>
                    <div class="form-group">
                        <?php
                        $message = '';
                        foreach ($model->getErrors() as $attr => $error) {
                            $message .= implode(',', $error);
                        }
                        ?>

                        <span id="errors" style="color: red"> <?=$message?></span>
                    </div>
                <?php endif;?>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-default">确认修改</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
