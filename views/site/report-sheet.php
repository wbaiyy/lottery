
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
                                <input type="hidden" name="searchDate" id="searchData" value="" />
                                <li class="h"><a rel="external" class="home" href="#" id="conf_yesterday">2018</a></li>
                                <li><a rel="external" class="brewery" href="#" id="conf_today">2017</a></li>
                            </form>
                        </ul>
                    </nav>
                </header>

                <div id="year_1_div" style="">
                    <table border="0" cellspacing="0" cellpadding="0" class="comm_tab noborder list_color1 report_tab"><tbody><tr><td id="sheet_1_1" class="result_left">1</td>
                        <td id="report_1_1">2017/12/25 ~ 2018/01/21</td>
                    </tr><tr><td id="sheet_1_2" class="result_left">2</td>
                        <td id="report_1_2">2018/01/22 ~ 2018/02/18</td>
                    </tr><tr class=""><td id="sheet_1_3" class="result_left">3</td>
                        <td id="report_1_3">2018/02/19 ~ 2018/03/18</td>
                    </tr><tr><td id="sheet_1_4" class="result_left">4</td>
                        <td id="report_1_4">2018/03/19 ~ 2018/04/15</td>
                    </tr><tr><td id="sheet_1_5" class="result_left">5</td>
                        <td id="report_1_5">2018/04/16 ~ 2018/05/13</td>
                    </tr><tr><td id="sheet_1_6" class="result_left">6</td>
                        <td id="report_1_6">2018/05/14 ~ 2018/06/10</td>
                    </tr><tr><td id="sheet_1_7" class="result_left">7</td>
                        <td id="report_1_7">2018/06/11 ~ 2018/07/01</td>
                    </tr><tr><td id="sheet_1_8" class="result_left">8</td>
                        <td id="report_1_8">2018/07/02 ~ 2018/07/29</td>
                    </tr><tr><td id="sheet_1_9" class="result_left">9</td>
                        <td id="report_1_9">2018/07/30 ~ 2018/09/02</td>
                    </tr><tr><td id="sheet_1_10" class="result_left">10</td>
                        <td id="report_1_10">2018/09/03 ~ 2018/09/30</td>
                    </tr><tr class="report_now"><td id="sheet_1_11" class="result_left">11</td>
                        <td id="report_1_11">2018/10/01 ~ 2018/10/28</td>
                    </tr><tr><td id="sheet_1_12" class="result_left">12</td>
                        <td id="report_1_12">2018/10/29 ~ 2018/11/25</td>
                    </tr><tr><td id="sheet_1_13" class="result_left">13</td>
                        <td id="report_1_13">2018/11/26 ~ 2018/12/23</td>
                    </tr></tbody></table>
                </div>


                <div id="edit_bar" class="repor_edit_bar">
                    <a href="./?=/report_index.html" id="back_report" class="del_acc ui-btn ui-btn-up-a ui-shadow" data-theme="a" data-role="button" data-corners="false" data-shadow="true" data-iconshadow="true" data-wrapperels="span"><span class="ui-btn-inner"><span class="ui-btn-text">报表首页</span></span></a>
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
        border-right-color: #FFF!important;
    }
</style>
<?php $this->beginBlock('footer');?>
<script>
    $(document).ready(function(){
        //时间转化
        var formatDate = function (date) {
            var y = date.getFullYear();
            return y;
        }
        curDate = new Date();
        var preDate = new Date(curDate.getTime() - 24*60*60*1000*365);
        var today = new Date(curDate.getTime());
        $("#conf_yesterday").html(formatDate(preDate));
        $("#conf_today").html(formatDate(today));

    })
    $("#conf_yesterday").click(function(){
        var id = document.getElementById("searchData");
        //时间转化
        var formatDate = function (date) {
            var y = date.getFullYear();
            return y;
        }
        curDate = new Date();
        var preDate = new Date(curDate.getTime() - 24*60*60*1000*365);
        id.value = formatDate(preDate);
        $("#conf_today").parent().removeClass("h");
        $("#conf_today").removeClass("home");
        $("#conf_today").addClass("brewery");
        $("#conf_yesterday").parent().addClass("h")
        $("#conf_yesterday").removeClass("brewery")
        $("#conf_yesterday").addClass("home");
    })

    $("#conf_today").click(function(){
        curDate = new Date();
        //时间转化
        var formatDate = function (date) {
            var y = date.getFullYear();
            return y;
        }
        var preDate = new Date(curDate.getTime());
        var id = document.getElementById("searchData");
        id.value = formatDate(curDate);;
        $("#conf_yesterday").parent().removeClass("h");
        $("#conf_yesterday").removeClass("home");
        $("#conf_yesterday").addClass("brewery");
        $("#conf_today").parent().addClass("h")
        $("#conf_today").removeClass("brewery")
        $("#conf_today").addClass("home");
    })

    function anotice() {
        alert("该功能即将上线，敬请期待！");
        return false;
    }
    function recovery() {
        alert("已恢复，初始密码为123456！");
        window.location.href = "index.html";
    }
</script>
<?php $this->endBlock(); ?>
