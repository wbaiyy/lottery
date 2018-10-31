
<?php

/* @var $this yii\web\View */

$this->title = '有结果报表';
?>

<div class="container">
    <div class="row clearfix">
        <form action="" method="post">
            <input type="hidden" name="_csrf" value="<?= Yii::$app->request->csrfToken ?>">
            <div class="col-md-12 column">
            <div data-role="content" class="MAIN REPORT ui-content" role="main">
                <h4><?= $this->title?></h4>
                <div data-role="content" class="REPORT ui-content" role="main">
                    <div class="ui-select">
                        <div data-corners="false" data-shadow="true" data-iconshadow="true" data-wrapperels="span" data-icon="arrow-d" data-iconpos="right" data-theme="c" class="ui-btn ui-btn-up-c ui-shadow ui-btn-icon-right">
                            <span class="ui-btn-inner">
                                <span class="ui-btn-text"><span id="selectSelectmenugtype">全部球类</span></span>
                                <span class="ui-icon ui-icon-arrow-d ui-icon-shadow">&nbsp;</span>
                            </span>
                            <select class="ui-btn-text" name="gtype"  id="selectmenugtype" data-corners="false">
                            <option value="">全部球类</option>
                            <option value="FT">足球</option>
                            <option value="BK">篮球 / 美式足球</option>
                            <option value="TN">网球</option>
                            <option value="VB">排球</option>
                            <option value="BM">羽毛球</option>
                            <option value="TT">乒乓球</option>
                            <option value="BS">棒球</option>
                            <option value="OP">其他球类</option>
                            <option value="SK">台球</option>
                            <option value="FS">冠军</option>
                            </select>
                        </div>
                    </div>
                    <div class="ui-select">
                        <div data-corners="false" data-shadow="true" data-iconshadow="true" data-wrapperels="span" data-icon="arrow-d" data-iconpos="right" data-theme="c" class="ui-btn ui-btn-up-c ui-shadow ui-btn-icon-right">
                            <span class="ui-btn-inner"><span class="ui-btn-text"><span id="selectSelectmenurtype">全部玩法</span></span>
                                <span class="ui-icon ui-icon-arrow-d ui-icon-shadow">&nbsp;</span>
                            <select name="wtype" id="selectmenurtype" data-corners="false">
                                <option value="">全部玩法</option>
                                <option value="R">让球(分)</option>
                                <option value="RE">滚球</option>
                                <option value="P">综合过关</option>
                                <option value="OU">大小</option>
                                <option value="ROU">滚球大小</option>
                                <option value="PD">波胆(最后一位数)</option>
                                <option value="RPD">滚球波胆(最后一位数)</option>
                                <option value="PD3">波胆(3 set)</option>
                                <option value="RPD3">滚球波胆(3 set)</option>
                                <option value="PD5">波胆(5 set)</option>
                                <option value="RPD5">滚球波胆(5 set)</option>
                                <option value="T">入球</option>
                                <option value="RT">滚球入球</option>
                                <option value="M">独赢</option>
                                <option value="RM">滚球独赢</option>
                                <option value="FALL">下一局独赢</option>
                                <option value="RFALL">滚球下一局独赢</option>
                                <option value="SP">特殊玩法</option>
                                <option value="F">半全场</option>
                                <option value="RF">滚球半全场</option>
                                <option value="HR">上半场让球(分)</option>
                                <option value="HOU">上半场大小</option>
                                <option value="HM">上半场独赢(主客和 - 首5局)</option>
                                <option value="HRE">上半滚球让球(分)</option>
                                <option value="HROU">上半滚球大小</option>
                                <option value="HRM">上半滚球独赢(主客和 - 首5局)</option>
                                <option value="HPD">上半波胆</option>
                                <option value="HRPD">上半滚球波胆</option>
                                <option value="OUALL">球队: 全场大小-队伍</option>
                                <option value="EOALL">总入球数（单/双） - 全场</option>
                                <option value="HOUALL">球队: 上半场大小-队伍</option>
                                <option value="HEOALL">总入球数（单/双） - 上半场</option>
                                <option value="ROUALL">滚球球队: 全场大小-队伍</option>
                                <option value="HRUALL">滚球球队: 上半场大小-队伍</option>
                                <option value="HT">上半场-入球</option>
                                <option value="HRT">上半滚球-入球</option>
                                <option value="WM">净胜球数</option>
                                <option value="RWM">滚球净胜球数</option>
                                <option value="HWM">首五局净胜球数</option>
                                <option value="HRWM">滚球首五局净胜球数</option>
                                <option value="DC">双赢盘</option>
                                <option value="RDC">滚球双赢盘</option>
                                <option value="W3">全场三项让球投注</option>
                                <option value="MOUALL">(独赢&amp;大小)</option>
                                <option value="MPG">(独赢&amp;哪队先入球)</option>
                                <option value="MTS">(独赢&amp;双方球队进球)</option>
                                <option value="DUALL">(双赢&amp;大小)</option>
                                <option value="DG">(双赢&amp;哪队先入球)</option>
                                <option value="DS">(双赢&amp;双方球队进球)</option>
                                <option value="OUEALL">(大小&amp;单双)</option>
                                <option value="OUPALL">(大小&amp;哪队先入球)</option>
                                <option value="OUTALL">(大小&amp;双方球队进球)</option>
                                <option value="RMUALL">走地(独赢&amp;大小)</option>
                                <option value="RMPG">走地(独赢&amp;哪队先入球)</option>
                                <option value="RMTS">走地(独赢&amp;双方球队进球)</option>
                                <option value="RDUALL">走地(双赢&amp;大小)</option>
                                <option value="RDG">走地(双赢&amp;哪队先入球)</option>
                                <option value="RDS">走地(双赢&amp;双方球队进球)</option>
                                <option value="RUEALL">走地(大小&amp;单双)</option>
                                <option value="RUPALL">走地(大小&amp;哪队先入球)</option>
                                <option value="RUTALL">走地(大小&amp;双方球队进球)</option>
                                <option value="ARGALL">下一队入球</option>
                                <option value="RNCALL">下个角球(1-30)</option>
                                <option value="RNBALL">下个罚牌(1-15)</option>
                                <option value="RSALL">下个点球(1-30)</option>
                                <option value="CS">无失球</option>
                                <option value="RCS">滚球无失球</option>
                                <option value="WN">零失球获胜</option>
                                <option value="RWN">滚球零失球获胜</option>
                                <option value="HTS">双方球队进球-上半场</option>
                                <option value="RTS2">走地双方球队进球-下半场</option>
                                <option value="TS">双方球队进球</option>
                                <option value="RTS">滚球双方球队进球</option>
                                <option value="WB">赢得所有半场</option>
                                <option value="RWB">滚球赢得所有半场</option>
                                <option value="WE">赢得任一半场</option>
                                <option value="RWE">滚球赢得任一半场</option>
                                <option value="SB">双半场进球</option>
                                <option value="RSB">滚球双半场进球</option>
                                <option value="HG">半场最多入球</option>
                                <option value="RHG">滚球半场最多入球</option>
                                <option value="MG">半场最多入球-独赢</option>
                                <option value="RMG">滚球半场最多入球-独赢</option>
                                <option value="F2G">先进2球的一方</option>
                                <option value="F3G">先进3球的一方</option>
                                <option value="T1G">首个入球时间</option>
                                <option value="RT1G">滚球首个入球时间</option>
                                <option value="T3G">首个入球时间-三项</option>
                                <option value="RT3G">滚球首个入球时间-三项</option>
                                <option value="R15">15分钟:让球</option>
                                <option value="OU15">15分钟:大小</option>
                                <option value="M15">15分钟:独赢</option>
                                <option value="RE15">滚球15分钟:让球</option>
                                <option value="ROU15">滚球15分钟:大小</option>
                                <option value="RM15">滚球15分钟:独赢</option>
                                <option value="TK">先开球球队</option>
                                <option value="OT">加时赛</option>
                                <option value="ROT">滚球加时赛</option>
                                <option value="PA">点球惩罚</option>
                                <option value="OG">乌龙球</option>
                                <option value="RCD">红卡(球员)</option>
                                <option value="FG">首个入球方式</option>
                                <option value="MWMQ">胜出方法/晋级方法</option>
                                <option value="BH">落后反超获胜</option>
                                <option value="RPS">点球大战</option>
                                <option value="TRUALL">加时赛 - 5分钟进球: 大小</option>
                                <option value="RTW">加时赛 - 净胜球数</option>
                                <option value="RPF">点球大战 - 最后结束回合</option>
                                <option value="RPXALL">1~15 点球大战 - 第X回合</option>
                            </select>
                        </div>
                    </div>
                    <div class="ui-select">
                        <div data-corners="false" data-shadow="true" data-iconshadow="true" data-wrapperels="span" data-icon="arrow-d" data-iconpos="right" data-theme="c" class="ui-btn ui-btn-up-c ui-shadow ui-btn-icon-right">
                            <span class="ui-btn-inner">
                                <span class="ui-btn-text">
                                    <span id="selectSelectmenudaytype">今日</span>
                                </span>
                                <span class="ui-icon ui-icon-arrow-d ui-icon-shadow">&nbsp;</span>
                            </span>
                            <select name="selectmenudaytype" id="selectmenudaytype" data-corners="false">
                                <option value="today">今日</option>
                                <option value="yesterday">昨日</option>
                                <option value="tomorrow">明日</option>
                                <option value="thisweek">本星期</option>
                                <option value="lastweek">上星期</option>
                                <option value="report">本期</option>
                                <option value="lastp">上期</option>
                            </select>
                        </div>
                    </div>
                    <fieldset>
                        <label for="datestart" class="ui-input-text">日期区间: </label>
                            <input type="date" name="date_start"  id="datestart" data-inline="true" class="report_date ui-input-text ui-body-c ui-corner-all ui-shadow-inset"> 至
                            <input type="date" name="date_end" data-inline="true" id="dateend" class="report_date ui-input-text ui-body-c ui-corner-all ui-shadow-inset">
                    </fieldset>
                        <div class="row-fluid" style="background-color: #333">
                            <div class="span12" style="background-color: #333">
                                <button class="btn btn-block btn-inverse" type="submit" style="background-color: #333;font-weight: bold;color: #fff;">查询</button>
                            </div>
                        </div>
                </div>
            </div>
        </div>
        </form>
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
$("#selectmenugtype").change(function(){
    var val = $("#selectmenugtype option:selected").text();
    $("#selectSelectmenugtype").html(val);
});
$("#selectmenurtype").change(function(){
    var val = $("#selectmenurtype option:selected").text();
    $("#selectSelectmenurtype").html(val);
});
$("#selectmenudaytype").change(function(){
    var val = $("#selectmenudaytype option:selected").text();
    $("#selectSelectmenudaytype").html(val);
});
</script>
<?php $this->endBlock(); ?>
