
var objinit={
    'gtypetype' :['FT','BK','TN','VB','BM','TT','BS','OP','SK','FS'],
    'daytype' :['today','yesterday','tomorrow','thisweek','lastweek','report','lastp'],
    'eof':"()"
}
var var_yeartype ="year_2";
var var_listview;
function init(){
    fun_getdata();
    fun_init();
}

function fun_init(){
    document.getElementById("selectmenudaytype").onchange = function() { fun_getday(); };
    document.getElementById("search_report").onclick = function() { fun_settop(); };
}



function fun_getday(){

    var check_text = $("#selectmenudaytype").find("option:selected").text();
    var check_value = $("#selectmenudaytype").find("option:selected").val();
    var arr_date=var_listview.list_data.list.datetype;
    document.getElementById("datestart").value=arr_date[check_value+"_1"];
    document.getElementById("dateend").value=arr_date[check_value+"_2"];

}

function fun_getdata(){

    var obj = new public_();
    var select_value ="select";

    var var_data={
        'sel_value':select_value
    };
    var arrSet={
        data:var_data ,
        success:function(data){
            fun_listview(data);
            //fun_listview_su_ag(data);
        }
    };
    obj.get(arrSet);
}


function fun_listview(obj_){
    var_listview = obj_;
    var arr_gtype = obj_.list_data.list.gtype;
    var arrtype = objinit.gtypetype;
    for(var str_ in arrtype){
        var gtype=arrtype[str_];
        document.getElementById("selectmenugtype").options[(str_*1)+1]=new Option(arr_gtype[gtype],gtype)
    }
    $("#selectmenugtype").selectmenu("refresh", true);

    fun_getday();

    return ;

}

function fun_settop(){
    var selectmenugtype=document.getElementById("selectmenugtype").value;
    var selectmenurtype=document.getElementById("selectmenurtype").value;
    var datestart=document.getElementById("datestart").value;
    var dateend=document.getElementById("dateend").value;
    var obj = new public_();
    var obj_data={'result_type':"Y",'date_start':datestart,'date_end': dateend,'gtype': selectmenugtype,'wtype': selectmenurtype};
    obj.settop(obj_data,"report");
    //str_down_id = obj_json.id;
}





