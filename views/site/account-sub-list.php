
<?php

/* @var $this yii\web\View */

$this->title = '帐号管理-子帐号';
?>

<div class="container">
    <div data-role="content" class="MAIN SUB ui-content" role="main">
        <h4><?= $this->title?></h4>
        <table border="0" cellspacing="0" cellpadding="0" class="comm_tab noborder list_color1">
                <div class="row-fluid" style="padding-top:3px;padding-bottom: 3px;">
                    <div class="span12">
                        <a href="acc_sub_add.html">
                        <button class="btn btn-block btn-inverse" type="button" style="background-color: #950f0f;color: white;">新增</button>
                        </a>
                    </div>
                </div>
            <tbody>
            <?php if (!empty($result)):?>
            <tr class="tha">
                <th class="td40" style="text-align:center;">子帐号</th>
                <th class="td40" style="text-align:center;">帐号</th>
                <th class="td40"  data-pri="B1" style="text-align:center;">操作</th>
            </tr>
            </tbody>
         <tbody id="tbody_list">
             <?php foreach ($result as $row):?>
                 <tr id="tr_add" class="acc_tr">
                     <td id="td_1">
                         <INPUT TYPE="HIDDEN" NAME="id" value="<?=$row['ID']?>">
                         <?=$row['Agname']?></td>
                     <td id="td_2"><?=$row['passwd_safe']?></td>
                     <td data-pri="B1">
                         <a href="#edit_bar" data-rel="popup" data-position-to="window" data-role="button" data-inline="true" class="btn_arr_down ui-btn ui-btn-up-c ui-shadow ui-btn-corner-all ui-btn-inline" data-corners="true" data-shadow="true" data-iconshadow="true" data-wrapperels="span" data-theme="c" aria-haspopup="true" aria-owns="#edit_bar">
                            <span class="ui-btn-inner ui-btn-corner-all">
                                <span class="ui-btn-text">&nbsp;</span>
                            </span>
                         </a>
                     </td>
                 </tr>
             <?php endforeach;?>
         </tbody>
            <?php else:?>
                未搜寻到指定相关资料
            <?php endif;?>
        </table>
    </div>
    <div id="edit_bar" class="repor_edit_bar">
        <a href="<?= \yii\helpers\Url::to('/site/account')?>" id="back_report" class="del_acc ui-btn ui-btn-up-a ui-shadow" data-theme="a" data-role="button" data-corners="false" data-shadow="true" data-iconshadow="true" data-wrapperels="span"><span class="ui-btn-inner"><span class="ui-btn-text">帐号首页</span></span></a>
    </div>
</div>
<style>
    body {
        color: #7b7b7b;
    }
    .h {
        width: 50%;
        float: left;
        margin: 0;
        padding: 0;
        list-style-type: none;
        border-right-color: #FFF!important;
    }
</style>
<?php $this->beginBlock('footer');?>
<script>
   
</script>
<?php $this->endBlock(); ?>
