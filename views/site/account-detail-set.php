
<?php

/* @var $this yii\web\View */

$this->title = '详细设置';
?>

<div class="container">
    <div class="row clearfix">
        <div class="">
            <div data-role="content" class="MAIN MYSET ui-content" role="main" style="    padding: 0!important;">

                <nav>
                    <ul class="nav nav-tabs">
                        <li  id="conf_FT" onclick="getData(this.id);">
                            <a href="#">足球</a>
                        </li>
                        <li class="disabled" id="conf_BK" onclick="getData(this.id);">
                            <a href="#">篮球</a>
                        </li>
                        <li class="disabled" id="conf_OP" onclick="getData(this.id);">
                            <a href="#" >综合球类</a>
                        </li>
                        <li class="disabled" id="conf_FS" onclick="getData(this.id);">
                            <a href="#" >冠军</a>
                        </li>
                    </ul>
                </nav>
                <?php if($model):?>
                <div id="FT_div" style="">
                <h4>让球 &amp; 大小 &amp; 单双</h4>
                <h5 class="commset">退水设定</h5>
                <table border="0" cellspacing="0" cellpadding="0" class="comm_tab td25"><tbody><tr><th>A</th>
                    <th>B</th>
                    <th>C</th>
                    <th>D</th>
                </tr><tr><td id="FT_R_1"><?=$model["FT_Turn_R_A"]?></td>
                    <td id="FT_R_2"><?=$model["FT_Turn_R_B"]?></td>
                    <td id="FT_R_3"><?=$model["FT_Turn_R_C"]?></td>
                    <td id="FT_R_4"><?=$model["FT_Turn_R_D"]?></td>
                </tr></tbody></table><h5 class="commset">投注限额</h5>
                <table border="0" cellspacing="0" cellpadding="0" class="comm_tab td50"><tbody><tr><th>单场</th>
                    <th>单注</th>
                </tr><tr><td id="FT_SC_R"><?=$model["FT_R_Scene"]?> RMB</td>
                    <td id="FT_SO_R"><?=$model["FT_R_Bet"]?> RMB</td>
                </tr></tbody></table><div id="FT_R_Bet" style="display: none;">
                <h5 class="commset">投注限额
                </h5>
                <table border="0" cellspacing="0" cellpadding="0" class="comm_tab td50"><tbody><tr><th>特大单场</th>
                    <th>特大单注</th>
                </tr><tr><td id="FT_BIG_SC_R" class="FT_BIG_R_ENA">-</td>
                    <td id="FT_BIG_SO_R" class="FT_BIG_R_ENA">-</td>
                </tr></tbody></table></div>
                <h4>滚球  让球 &amp; 大小</h4>
                <h5 class="commset">退水设定</h5>
                <table border="0" cellspacing="0" cellpadding="0" class="comm_tab td25"><tbody><tr><th>A</th>
                    <th>B</th>
                    <th>C</th>
                    <th>D</th>
                </tr><tr><td id="FT_RE_1"><?=$model["FT_Turn_RE_A"]?></td>
                    <td id="FT_RE_2"><?=$model["FT_Turn_RE_B"]?></td>
                    <td id="FT_RE_3"><?=$model["FT_Turn_RE_C"]?></td>
                    <td id="FT_RE_4"><?=$model["FT_Turn_RE_D"]?></td>
                </tr></tbody></table><h5 class="commset">投注限额</h5>
                <table border="0" cellspacing="0" cellpadding="0" class="comm_tab td50"><tbody><tr><th>单场</th>
                    <th>单注</th>
                </tr><tr><td id="FT_SC_RE"><?=$model["FT_RE_Scene"]?> RMB</td>
                    <td id="FT_SO_RE"><?=$model["FT_RE_Bet"]?> RMB</td>
                </tr></tbody></table><div id="FT_BIG_RE" style="display: none;">
                <h5 class="commset">投注限额
                </h5>
                <table border="0" cellspacing="0" cellpadding="0" class="comm_tab td50"><tbody><tr><th>特大单场</th>
                    <th>特大单注</th>
                </tr><tr><td id="FT_BIG_SC_RE" class="FT_BIG_R_ENA">-</td>
                    <td id="FT_BIG_SO_RE" class="FT_BIG_R_ENA">-</td>
                </tr></tbody></table></div>
                <h4>独赢 &amp; 滚球独赢</h4>
                <h5 class="commset">退水设定</h5>
                <table border="0" cellspacing="0" cellpadding="0" class="comm_tab td25"><tbody><tr><th>A</th>
                    <th>B</th>
                    <th>C</th>
                    <th>D</th>
                </tr><tr><td colspan="4" id="FT_M_1"><?=$model["FT_Turn_M"]?></td>

                </tr></tbody></table><h5 class="commset">投注限额</h5>
                <table border="0" cellspacing="0" cellpadding="0" class="comm_tab td50"><tbody><tr><th>单场</th>
                    <th>单注</th>
                </tr><tr><td id="FT_SC_M"><?=$model["FT_M_Scene"]?> RMB</td>
                    <td id="FT_SO_M"><?=$model["FT_M_Bet"]?> RMB</td>
                </tr></tbody></table><h5 class="commset">投注限额</h5>
                <table border="0" cellspacing="0" cellpadding="0" class="comm_tab td50"><tbody><tr><th>单场</th>
                    <th>单注</th>
                </tr><tr><td id="FT_SC_DT">20,000 RMB</td>
                    <td id="FT_SO_DT">10,000 RMB</td>
                </tr></tbody></table><h4>滚球其他</h4>
                <h5 class="commset">退水设定</h5>
                <table border="0" cellspacing="0" cellpadding="0" class="comm_tab td25"><tbody><tr><th>A</th>
                    <th>B</th>
                    <th>C</th>
                    <th>D</th>
                </tr><tr><td colspan="4" id="FT_RDT_1"><?=$model["OP_Turn_PC"]?></td>

                </tr></tbody></table><h5 class="commset">投注限额</h5>
                <table border="0" cellspacing="0" cellpadding="0" class="comm_tab td50"><tbody><tr><th>单场</th>
                    <th>单注</th>
                </tr><tr><td id="FT_SC_RDT"><?=$model["OP_PC_Scene"]?> RMB</td>
                    <td id="FT_SO_RDT"><?=$model["OP_PC_Bet"]?> RMB</td>
                </tr></tbody></table></div>




                <div id="BK_div" style="display: none;">
                    <h4>让球 &amp; 大小 &amp; 单双</h4>
                    <h5 class="commset">退水设定</h5>
                    <table border="0" cellspacing="0" cellpadding="0" class="comm_tab td25"><tbody><tr><th>A</th>
                        <th>B</th>
                        <th>C</th>
                        <th>D</th>
                    </tr><tr><td id="BK_R_1"><?=$model["BK_Turn_R_A"]?></td>
                        <td id="BK_R_2"><?=$model["BK_Turn_R_B"]?></td>
                        <td id="BK_R_3"><?=$model["BK_Turn_R_C"]?></td>
                        <td id="BK_R_4"><?=$model["BK_Turn_R_D"]?></td>
                    </tr></tbody></table><h5 class="commset">投注限额</h5>
                    <table border="0" cellspacing="0" cellpadding="0" class="comm_tab td50"><tbody><tr><th>单场</th>
                        <th>单注</th>
                    </tr><tr><td id="BK_SC_R"><?=$model["BK_R_Scene"]?> RMB</td>
                        <td id="BK_SO_R"><?=$model["BK_R_Bet"]?> RMB</td>
                    </tr></tbody></table><h4>滚球  让球 &amp; 大小</h4>
                    <h5 class="commset">退水设定</h5>
                    <table border="0" cellspacing="0" cellpadding="0" class="comm_tab td25"><tbody><tr><th>A</th>
                        <th>B</th>
                        <th>C</th>
                        <th>D</th>
                    </tr><tr><td id="BK_RE_1"><?=$model["BK_Turn_RE_A"]?></td>
                        <td id="BK_RE_2"><?=$model["BK_Turn_RE_A"]?></td>
                        <td id="BK_RE_3"><?=$model["BK_Turn_RE_A"]?></td>
                        <td id="BK_RE_4"><?=$model["BK_Turn_RE_A"]?></td>
                    </tr></tbody></table><h5 class="commset">投注限额</h5>
                    <table border="0" cellspacing="0" cellpadding="0" class="comm_tab td50"><tbody><tr><th>单场</th>
                        <th>单注</th>
                    </tr><tr><td id="BK_SC_RE"><?=$model["BK_RE_Scene"]?> RMB</td>
                        <td id="BK_SO_RE"><?=$model["BK_RE_Bet"]?> RMB</td>
                    </tr></tbody></table>

                    <h4>其他</h4>
                    <h5 class="commset">退水设定</h5>
                    <table border="0" cellspacing="0" cellpadding="0" class="comm_tab td25"><tbody><tr><th>A</th>
                        <th>B</th>
                        <th>C</th>
                        <th>D</th>
                    </tr><tr><td colspan="4" id="BK_DT_1"><?=$model["BK_Turn_PC"]?></td>

                    </tr></tbody></table><h5 class="commset">投注限额</h5>
                    <table border="0" cellspacing="0" cellpadding="0" class="comm_tab td50"><tbody><tr><th>单场</th>
                        <th>单注</th>
                    </tr><tr><td id="BK_SC_DT"><?=$model["BK_PC_Scene"]?> RMB</td>
                        <td id="BK_SO_DT"><?=$model["BK_PC_Scene"]?> RMB</td>
                    </tr></tbody></table></div>


                <div id="OP_div" style="display: none;">
                    <h4>让球 &amp; 大小 &amp; 单双</h4>
                    <h5 class="commset">退水设定</h5>
                    <table border="0" cellspacing="0" cellpadding="0" class="comm_tab td25"><tbody><tr><th>A</th>
                        <th>B</th>
                        <th>C</th>
                        <th>D</th>
                    </tr><tr><td id="OP_R_1"><?=$model["OP_Turn_R_A"]?></td>
                        <td id="OP_R_2"><?=$model["OP_Turn_R_B"]?></td>
                        <td id="OP_R_3"><?=$model["OP_Turn_R_C"]?></td>
                        <td id="OP_R_4"><?=$model["OP_Turn_R_D"]?></td>
                    </tr></tbody></table><h5 class="commset">投注限额</h5>
                    <table border="0" cellspacing="0" cellpadding="0" class="comm_tab td50"><tbody><tr><th>单场</th>
                        <th>单注</th>
                    </tr><tr><td id="OP_SC_R"><?=$model["OP_R_Scene"]?> RMB</td>
                        <td id="OP_SO_R"><?=$model["OP_R_Bet"]?>RMB</td>
                    </tr></tbody></table><h4>滚球  让球 &amp; 大小</h4>
                    <h5 class="commset">退水设定</h5>
                    <table border="0" cellspacing="0" cellpadding="0" class="comm_tab td25"><tbody><tr><th>A</th>
                        <th>B</th>
                        <th>C</th>
                        <th>D</th>
                    </tr><tr><td id="OP_RE_1"><?=$model["OP_Turn_RE_A"]?></td>
                        <td id="OP_RE_2"><?=$model["OP_Turn_RE_B"]?></td>
                        <td id="OP_RE_3"><?=$model["OP_Turn_RE_C"]?></td>
                        <td id="OP_RE_4"><?=$model["OP_Turn_RE_D"]?></td>
                    </tr></tbody></table><h5 class="commset">投注限额</h5>
                    <table border="0" cellspacing="0" cellpadding="0" class="comm_tab td50"><tbody><tr><th>单场</th>
                        <th>单注</th>
                    </tr><tr><td id="OP_SC_RE"><?=$model["OP_RE_Scene"]?> RMB</td>
                        <td id="OP_SO_RE"><?=$model["OP_RE_Bet"]?> RMB</td>
                    </tr></tbody></table><h4>独赢 &amp; 滚球独赢</h4>
                    <h5 class="commset">退水设定</h5>
                    <table border="0" cellspacing="0" cellpadding="0" class="comm_tab td25"><tbody><tr><th>A</th>
                        <th>B</th>
                        <th>C</th>
                        <th>D</th>
                    </tr><tr><td colspan="4" id="OP_M_1"><?=$model["OP_Turn_M"]?></td>

                    </tr></tbody></table><h5 class="commset">投注限额</h5>
                    <table border="0" cellspacing="0" cellpadding="0" class="comm_tab td50"><tbody><tr><th>单场</th>
                        <th>单注</th>
                    </tr><tr><td id="OP_SC_M"><?=$model["OP_M_Scene"]?> RMB</td>
                        <td id="OP_SO_M"><?=$model["OP_M_Bet"]?> RMB</td>
                    </tr></tbody></table><h4>其他</h4>
                    <h5 class="commset">退水设定</h5>
                    <table border="0" cellspacing="0" cellpadding="0" class="comm_tab td25"><tbody><tr><th>A</th>
                        <th>B</th>
                        <th>C</th>
                        <th>D</th>
                    </tr><tr><td colspan="4" id="OP_DT_1"><?=$model["OP_Turn_PC"]?></td>

                    </tr></tbody></table><h5 class="commset">投注限额</h5>
                    <table border="0" cellspacing="0" cellpadding="0" class="comm_tab td50"><tbody><tr><th>单场</th>
                        <th>单注</th>
                    </tr><tr><td id="OP_SC_DT"><?=$model["OP_PC_Scene"]?> RMB</td>
                        <td id="OP_SO_DT"><?=$model["OP_PC_Bet"]?> RMB</td>
                    </tr></tbody></table></div>



                <div id="FS_div" style="display: none;">
                    <h4>冠军</h4>
                    <h5 class="commset">退水设定</h5>
                    <table border="0" cellspacing="0" cellpadding="0" class="comm_tab td25"><tbody><tr><th>A</th>
                        <th>B</th>
                        <th>C</th>
                        <th>D</th>
                    </tr><tr><td id="FS_FS_1" colspan="4"><?=$model["FS_Turn_R"]?></td>
                    </tr></tbody></table><h5 class="commset">投注限额</h5>
                    <table border="0" cellspacing="0" cellpadding="0" class="comm_tab td50"><tbody><tr><th>单场</th>
                        <th>单注</th>
                    </tr><tr><td id="FS_SC_FS"><?=$model["FS_R_Scene"]?> RMB</td>
                        <td id="FS_SO_FS"><?=$model["FS_R_Bet"]?> RMB</td>
                    </tr></tbody></table></div>
                <?php else:?>
                    暂无数据
                <?php endif;?>

                <div id="edit_bar" class="sub_edit_bar3">
                    <a href="#" id="cancel_acc" data-rel="back" data-role="button" data-theme="c" data-corners="false" data-shadow="true" data-iconshadow="true" data-wrapperels="span" class="ui-btn ui-btn-up-c ui-shadow"><span class="ui-btn-inner"><span class="ui-btn-text">返回</span></span></a>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function getData(id) {
        if ( id === 'conf_FT') {
            $("#"+id).removeClass("disabled");
            $("#conf_BK").addClass("disabled");
            $("#conf_OP").addClass("disabled");
            $("#conf_FS").addClass("disabled");
            $("#BK_div").css('display','none');
            $("#OP_div").css('display','none');
            $("#FS_div").css('display','none');
            $("#FT_div").css('display','block');


        } else if ( id === 'conf_BK') {
            $("#"+id).removeClass("disabled");
            $("#conf_FT").addClass("disabled");
            $("#conf_OP").addClass("disabled");
            $("#conf_FS").addClass("disabled");
            $("#BK_div").css('display','block');
            $("#OP_div").css('display','none');
            $("#FS_div").css('display','none');
            $("#FT_div").css('display','none');

        } else if ( id === 'conf_OP') {
            $("#"+id).removeClass("disabled");
            $("#conf_FT").addClass("disabled");
            $("#conf_BK").addClass("disabled");
            $("#conf_FS").addClass("disabled");
            $("#BK_div").css('display','none');
            $("#OP_div").css('display','block');
            $("#FS_div").css('display','none');
            $("#FT_div").css('display','none');
        } else {
            $("#"+id).removeClass("disabled");
            $("#conf_BK").addClass("disabled");
            $("#conf_OP").addClass("disabled");
            $("#conf_FT").addClass("disabled");
            $("#BK_div").css('display','none');
            $("#OP_div").css('display','none');
            $("#FS_div").css('display','block');
            $("#FT_div").css('display','none');
        }
    }
</script>