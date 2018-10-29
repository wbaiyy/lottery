<?php

/* @var $this yii\web\View */

$this->title = '月帐期数表';
?>

<div class="container">
    <div class="row clearfix">
        <div class="col-md-12 column">
            <div data-role="content" class="MAIN REPORT ui-content" role="main">
                <h4>月帐期数表</h4>
                <header style="height:0px;">
                    <nav>
                        <ul>
                            <form class="form-horizontal" role="form" action="#" method="post">
                                <input type="hidden" name="searchDate" id="searchData" value=""/>
                                <li class="h"><a rel="external" class="home" href="#" id="conf_yesterday">2018</a></li>
                                <li><a rel="external" class="brewery" href="#" id="conf_today">2017</a></li>
                            </form>
                        </ul>
                    </nav>
                </header>

                <div id="year_div" style="">
                    <table border="0" cellspacing="0" cellpadding="0" class="comm_tab noborder list_color1 report_tab">
                        <tbody>
                        <?php foreach ($result as $key => $data):?>
                        <tr>
                            <td id="sheet_1_<?=$key?>" class="result_left"><?=$key+1?></td>
                            <td id="report_1_<?=$key?>"><?= $data['last'][0]?> ~ <?= $data['last'][1]?></td>
                        </tr>
                        <?php endforeach;?>
                        </tbody>
                    </table>
                </div>

                <div id="today_div" style="display: none">
                <table border="0" cellspacing="0" cellpadding="0" class="comm_tab noborder list_color1 report_tab">
                    <tbody>
                    <?php foreach ($result as $key => $data):?>
                        <tr>
                            <td id="sheet_2_<?=$key?>" class="result_left"><?=$key+1?></td>
                            <td id="report_2_<?=$key?>"><?= $data['current'][0]?> ~ <?= $data['current'][1]?></td>
                        </tr>
                    <?php endforeach;?>
                    </tbody>
                </table>
            </div>



            <div id="edit_bar" class="repor_edit_bar">
                    <a href="./?=/report_index.html" id="back_report" class="del_acc ui-btn ui-btn-up-a ui-shadow"
                       data-theme="a" data-role="button" data-corners="false" data-shadow="true" data-iconshadow="true"
                       data-wrapperels="span"><span class="ui-btn-inner"><span
                                    class="ui-btn-text">报表首页</span></span></a>
                </div>

            </div>
        </div>
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
        border-right-color: #FFF !important;
    }
</style>
<?php $this->beginBlock('footer'); ?>
<script>
    $(document).ready(function () {
        //时间转化
        var formatDate = function (date) {
            var y = date.getFullYear();
            return y;
        }
        curDate = new Date();
        var preDate = new Date(curDate.getTime() - 24 * 60 * 60 * 1000 * 365);
        var today = new Date(curDate.getTime());
        $("#conf_yesterday").html(formatDate(preDate));
        $("#conf_today").html(formatDate(today));

    })
    $("#conf_yesterday").click(function () {
        var id = document.getElementById("searchData");
        //时间转化
        var formatDate = function (date) {
            var y = date.getFullYear();
            return y;
        }
        curDate = new Date();
        var preDate = new Date(curDate.getTime() - 24 * 60 * 60 * 1000 * 365);
        id.value = formatDate(preDate);
        $("#conf_today").parent().removeClass("h");
        $("#conf_today").removeClass("home");
        $("#conf_today").addClass("brewery");
        $("#conf_yesterday").parent().addClass("h")
        $("#conf_yesterday").removeClass("brewery")
        $("#conf_yesterday").addClass("home");

        $("#today_div").css('display', 'none');
        $("#year_div").css('display', 'block');
    })

    $("#conf_today").click(function () {
        curDate = new Date();
        //时间转化
        var formatDate = function (date) {
            var y = date.getFullYear();
            return y;
        }
        var preDate = new Date(curDate.getTime());
        var id = document.getElementById("searchData");
        id.value = formatDate(curDate);
        ;
        $("#conf_yesterday").parent().removeClass("h");
        $("#conf_yesterday").removeClass("home");
        $("#conf_yesterday").addClass("brewery");
        $("#conf_today").parent().addClass("h")
        $("#conf_today").removeClass("brewery")
        $("#conf_today").addClass("home");

        $("#today_div").css('display', 'block');
        $("#year_div").css('display', 'none');
    })

</script>
<?php $this->endBlock(); ?>
