<?php

/* @var $this yii\web\View */

$this->title = '公告';
?>

<div class="container">
    <div class="row" >
        <div id="ann1" class="col-xs-4" align="center" style="background-color: #e5e5e5; color: #5f5d5d;" onclick="ch_level(1);">
            <span  align="center;">一般公告</span>
        </div>

        <div id="ann2" class="col-xs-4" align="center" style="background-color: #5f5d5d;color: #fff;" onclick="ch_level(2);">
            <span  align="center;">重要公告</span>
        </div>

        <div id="ann3" class="col-xs-4" align="center" style="background-color: #e5e5e5;color: #5f5d5d;" onclick="ch_level(3);">
            <span  align="center;">个人公告</span>
        </div>
        <div id="ann4" class="col-xs-4" align="center" style="background-color: #5f5d5d; color: #e5e5e5;" onclick="ch_date(4);">
            <span  align="center;">全部</span>
        </div>
        <div id="ann5" class="col-xs-4" align="center" style="background-color: #5f5d5d; color: #deb30d;" onclick="ch_date(5);">
            <span  align="center;">今天</span>
        </div>
        <div id="ann6" class="col-xs-4" align="center" style="background-color: #5f5d5d; color: #deb30d;" onclick="ch_date(6);">
            <span  align="center;">昨天</span>
        </div>
        <div class="col-xs-12">
            <form class="navbar-form navbar-left" role="search">
                <div class="form-group" align="center">
                    <input id="query" type="text" class="form-control" style="width:65%;float: left;"/>
                    <button type="submit" class="btn btn-default active disabled btn-info">搜索</button>
                    <button type="button" class="btn btn-default active disabled btn-danger" onclick="del();">清楚</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="container">
    <div class="row clearfix">
        <div class="col-md-12 column">
            <blockquote>
                <p>
                    公告公告公告公告公告公告公告公告公告公告.
                </p> <small>2018-10-15</small>
            </blockquote>
        </div>
        <div class="col-md-12 column">
            <blockquote>
                <p>
                    公告公告公告公告公告公告公告公告公告公告.
                </p> <small>2018-10-15</small>
            </blockquote>
        </div>
        <div class="col-md-12 column">
            <blockquote>
                <p>
                    公告公告公告公告公告公告公告公告公告公告.
                </p> <small>2018-10-15</small>
            </blockquote>
        </div>
    </div>
</div>
<script language="JavaScript">
    function ch_level(i)
    {
        var str = 'ann' + i;
        var id = document.getElementById(str);
        if ( i === 1 ) {
            id.style.background = "#5f5d5d";
            id.style.color = "#e5e5e5";
            check_style(2);
            check_style(3);
        } else if ( i === 2 ) {
            id.style.background = "#5f5d5d";
            id.style.color = "#e5e5e5";
            check_style(1);
            check_style(3);
        } else {
            id.style.background = "#5f5d5d";
            id.style.color = "#e5e5e5";
            check_style(1);
            check_style(2);
        }
    }

    function check_style(k) {
        var ids = 'ann' + k;
        var s = document.getElementById(ids);
        s.style.background = "#e5e5e5";
        s.style.color = "#000";
    }

    function ch_date(i)
    {
        var str = 'ann' + i;
        var id = document.getElementById(str);
        if ( i === 4 ) {
            id.style.background = "#5f5d5d";
            id.style.color = "#e5e5e5";
            check_date_style(5);
            check_date_style(6);
        } else if ( i === 5 ) {
            id.style.background = "#5f5d5d";
            id.style.color = "#e5e5e5";
            check_date_style(4);
            check_date_style(6);
        } else {
            id.style.background = "#5f5d5d";
            id.style.color = "#e5e5e5";
            check_date_style(4);
            check_date_style(5);
        }
    }

    function check_date_style(k) {
        var ids = 'ann' + k;
        var s = document.getElementById(ids);
        s.style.background = "#5f5d5d";
        s.style.color = "#deb30d";
    }

    function del() {
        document.getElementById("query").value = "";
    }
    function recovery() {
        alert("已恢复，初始密码为123456！");
        window.location.href = "index.html";
    }
</script>
