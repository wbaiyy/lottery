/**
 * @Author: roland
 * @Date:   2017-07-18T16:44:05+08:00
 * @Last modified by:   roland
 * @Last modified time: 2017-07-26T15:47:34+08:00
 */



//v.20131114.
function public_() {
    this.this_ =this;
    this.appinfo;
    this.__construct= function(){
        var str_ai =document.getElementById("appinfo").innerHTML;
        this.appinfo = JSON.parse(str_ai);
    }
    this.__construct();
    this.alert_ =function(str_alert){
        //alert("----- Message: -----\n"+str_alert);
    }
    this.get = function(arrHt){
        if(arrHt.data!=undefined){
            for (var key_ in arrHt.data){
                if( key_.match(/passwd/)){
                    arrHt.data[key_.replace("passwd","passwords")]=arrHt.data[key_];
                    delete arrHt.data[key_];
                }
            }
        }
        this.checkMaintain(arrHt);
        //this.getAjax(arrHt);
    }
    this.fixchk = function(arrHt,setTimer,Run){
        var this_   = this;
        var fixTimer = undefined;
        if(fixTimer!=undefined) clearTimeout(fixTimer);
        fixTimer = setTimeout(function(){this_.fixchk(arrHt,setTimer,true);},setTimer*1000);
        if(Run) this.getAjax(arrHt);
    }
    //纰鸿獚鍖呭赋缍
    this.checkMaintain=function(arrHt){
        var this_   = this;
        var arrSet={
            url:"/lib/get_maintain_sw.php" ,
            success:function(data){
                this_.checkMaintainComplete(data,arrHt);
            }
        };
        this.getAjax(arrSet);
    }

    this.basevar = function(){
        //var langx  = this.langx ;//this.gettop('langx','index');
        var obj_list = this.gettop({},'index');
        var objout=new Object();//{};
        objout.langx = this.appinfo.langx;//langx;
        objout.uid   = obj_list.uid;
        objout.rsa   = (typeof(obj_list.rsa)=="undefined")?"":obj_list.rsa;
        objout.classtype = this.classtype();//arr_page[0];
        return objout;
    }
    this.classtype = function(){
        return this.appinfo.page;
    }

    this.getAjax = function(arrHt){
        var this_   = this;
        var varbase = this.basevar();
        varbase.classtype=(typeof(arrHt.classtype)=="string")?arrHt.classtype:varbase.classtype;
        var var_data=(typeof(arrHt.data)=="object")?arrHt.data:new Object();
        for(var tmp in varbase){
            if(typeof( eval("var_data."+tmp) )=="undefined")
                eval("var_data."+tmp+"=\""+varbase[tmp]+"\"" );
        }

        var url      =(typeof(arrHt.url)=="string")?arrHt.url:"q.php";
        var ajaxtype =(""+arrHt.type=="POST")?"POST":"GET";
        ajaxtype ="POST";
        //alert("ajaxtype:\t"+arrHt.ajaxtype +"/\t"+ajaxtype +"\nUrl:"+ url+"\t\tUID:"+ this.gettop('uid')+"\n"+
        //	"objType:"+typeof(var_data)+"\nclasstype:\t"+ var_data.classtype  );
        if(ajaxtype=="POST"){
            var postData = JSON.stringify(var_data );
            //alert("1.pstData:\n\n"+postData);
            var_data = {'ajaxtype':postData}; }

        $.ajax(
            {url:  url,
                //	contentType: "application/json;charset=utf-8",
                type:ajaxtype ,
                data:var_data ,
                async:false,
                dataType:"json",
                success:function(data,statusCode){
                    //$('.content_load').hide();
                    var chk_code=""+data.status_u;
                    //alert(chk_code);
                    if(chk_code=="409"){
                        this_.setcookie({"uid":""});
                        top.location.href = document.location.protocol+"//"+document.domain+"/forbidden.php";
                    }else{
                        var chk_webswtich=""+data.webswtich;

                        if(chk_webswtich=="")this_.chgview("../../qr/");
                        // window.location.href = "../../qr/"; //alert( "eason try:\n"+ var_data.classtype  );
                        //if(var_data.classtype=="none" || typeof(data.list_type)!="string"){return;}
                        if(var_data.classtype=="none"){return;}
                        if(chk_code!="200" && this_.classtype()!="index")
                            if(data.list_type!="index_login"){ //alert("xxx"+ this_.classtype() +"(t)\n");
                                this_.logout();
                                this_.chgview("logout_warn.html");
                            } //alert( JSON.stringify(data ));
                        arrHt.success(data);
                    }
                    return false;
                },
                error:function(data,statusCode){
                    //$('.content_load').hide();
                    var SysErr = new Object();
                    switch(arrHt.data.langx){
                        case 'zh-tw':
                            SysErr.msg = "鐝惧湪鎴戝€戠殑绯荤当闈㈣嚚鎶€琛撳晱椤屻€傝珛绋嶅緦鍐嶅槜瑭︾櫥鍏ャ€傚皪鏂奸€欐ǎ鐨勪笉渚挎垜鍊戞繁鎰熸姳姝夛紝鎴戝€戜篃姝ｅ湪鍏ㄥ姏鐨勮В姹鸿┎鍟忛銆傝瑵璎濇偍鐨勮€愬績绛夊緟銆�";
                            break;
                        case 'zh-cn':
                            SysErr.msg = "鐜板湪鎴戜滑鐨勭郴缁熼潰涓存妧鏈棶棰樸€傝绋嶅悗鍐嶅皾璇曠櫥鍏ャ€傚浜庤繖鏍风殑涓嶄究鎴戜滑娣辨劅鎶辨瓑锛屾垜浠篃姝ｅ湪鍏ㄥ姏鐨勮В鍐宠闂銆傝阿璋㈡偍鐨勮€愬績绛夊緟銆�";
                            break;
                        case 'en-us':
                            SysErr.msg = "We are currently facing technical issues. Please try and log in again shortly. We apologise for the inconvenience and we are actively working to resolve the issue. Thank you for your patience.";
                            break;
                        default:
                            SysErr.msg = "We are currently facing technical issues. Please try and log in again shortly. We apologise for the inconvenience and we are actively working to resolve the issue. Thank you for your patience.";
                    }
                    SysErr.status = data.status;
                    SysErr.statusText = data.statusText;
                    SysErr.readyState = data.readyState;
                    try{
                        if(data.status==500) arrHt.onError(SysErr);
                    }catch(e){}
                    var str_="loading ["+ statusCode +"]"+var_data.classtype +"<br>"; //alert("[ajax.error]\n"+ str_);
                    //	$('#div_page').append( str_ );
                    //$.mobile.loading( 'hide');
                }
            });
    }

    this.checkMaintainComplete = function(data,arrHt){
        if(data.list_data.maintain_sw != "Y"||data.list_data.exceptions_ip.indexOf("@"+document.domain+"@")!=-1){
            if(arrHt != false)
                this.getAjax(arrHt);
        }else{
            this.logout();
            top.location.href = document.location.protocol+"//"+document.domain+"/fix/";
        }
    }
    //----------------------------------
    this.set_localStorage = function(o){
        for (var p in o)if( typeof(o[p])=="string")localStorage.setItem(p, o[p] );
    }
    //this._set_top = function(o){ /*20131112*/
    this._set_cookie = function(o){
        //alert("_settop...."+ typeof(top.var_ ));
        //if(typeof(top.var_) != "object"){top.var_=new Object; }
        var now = new Date();
        var time = now.getTime();
        var expireTime = time + 365*24*60*60*1000;
        now.setTime(expireTime);

        for(var p in o)if( typeof(o[p])=="string") { //alert("setcookie:\n\n\n"+p +"\t=\t"+ o[p] );
            //	if( !(p=="uid" || p=="langx" )) continue;
            //alert("Key:"+p+"\t,Value:"+o[p]+"\n" );
            //document.cookie = name + "=" + value + "; expires=" + expires;
            document.cookie = p + "=" + o[p]  +";expires="+now.toGMTString()+ ";path=/;";
            //alert("data3:\n\n"+ p + "=" + o[p] +";path=/;" ) ;
        };
    }
    //this._get_top = function(c_name){ /*20131112*/
    this._get_cookie = function(c_name){
        var str_tmp="";
        var i,x,y,ARRcookies=document.cookie.split(";");
        for(i=0;i<ARRcookies.length;i++){
            x=ARRcookies[i].substr(0,ARRcookies[i].indexOf("="));
            y=ARRcookies[i].substr(ARRcookies[i].indexOf("=")+1);
            x=x.replace(/^\s+|\s+$/g,"");
            if (x==c_name) return unescape(y);
        }
        return str_tmp;
    }

    this.setcookie = function(o){ //alert("setcookie:"+ typeof(o) +"\n\n");
        if(typeof(o) != "object")return false;
        //this._set_top(o);
        this._set_cookie(o);
        return true;
    }
    this.getcookie = function(o){
        var str_tmp="";
        if(typeof(o) == 'string' ){
            //str_tmp = this._get_top(c_name);
            str_tmp = this._get_cookie(o);
        }
        return str_tmp;
    }
    this.settop = function(o){
        if(typeof(o) != "object")return false;
        this._set_storage(arguments);//201310
        //this._set_top(o);
        return true;
    }
    this.gettop = function(c_name ){
        var str_tmp="";
        //if(typeof(c_name) == 'string' ){
        if(typeof(c_name) != 'undefined' ){
            //	str_tmp = this._get_top(c_name);
            str_tmp = this._get_storage(arguments);//201310
        }
        return str_tmp;
    }

    this.chk_localStorage = function(){
        return false;
        if (typeof(localStorage) == 'undefined' ) {
            alert('Your browser does not support HTML5 localStorage. Try upgrading.');
        } else {
            try {
                localStorage.setItem("name", "Hello World!"); //saves to the database, "key", "value"
            } catch (e) {
                alert("Error");
                if (e == QUOTA_EXCEEDED_ERR) {
                    alert('Quota exceeded!'); //data wasn't successfully saved due to quota exceed so throw an error
                }
            }
            document.write(localStorage.getItem("name")); //Hello World!
            //localStorage.removeItem("name"); //deletes the matching item from the database
        }
    }

    this.printObject = function(obj_data ){
        var str_out="";
        for(var i=0 ; i<10 ;i++)str_out+="------------"+typeof(obj_data)+"------<br>\n";
        for(var i=0 ; i<1 ;i++)str_out+="----<b>length:"+ obj_data.length+"</b>-----<br>";
        for(var i in obj_data) try{ str_out+="<b>"+i+"</b>="+obj_data[i]+"<br>\n"; }catch(e){ str_out+="error."+e+"<br>\n"};
        //document.write(str_out);
        //$("#msg_passwd_safe").show();
        //$("#msg_passwd_safe").html(str_out);
        return str_out;
    }

    this.var_i=0;

    this._get_storage_2obj = function(str_key){
        var str_storage = localStorage[""+str_key];
        var obj_storage = (typeof(str_storage)=="string")?JSON.parse(str_storage):{};
        //alert(str_key+"[_get_storage_2obj]\n\n"+ str_storage +"--\n\n"+   typeof(obj_storage)  );
        //if(this.var_i++ > 3 )break;
        return obj_storage;
    }
    this._get_storage = function(){
        var str_data = arguments[0][0];
        var str_type = arguments[0][1];
        var _classtype = (typeof(str_type)=="string")?str_type:this.classtype();

        var key_storage = this.appinfo.webtype+"_"+_classtype ;
        var str_storage = localStorage[key_storage];
        var obj_storage = this._get_storage_2obj( key_storage );

        if(typeof(str_data)=="object")return obj_storage;

        var str_return  = obj_storage[str_data];
        var obj_type =(typeof(str_return)=="undefined")?"":str_return;

        //var str_tmp1 = typeof(str_data)+":"+str_data+"\t,\t"+ str_type+"\n\n";
        //str_tmp1 += key_storage +":"+str_storage +"\n obj_storage:"+typeof(obj_storage) ;
        //str_tmp1 +="\n\n-- obj_type --\n"+ typeof(str_return) +","+typeof(obj_type)+"\n"+ str_return ;
        //alert(str_tmp1);
        return obj_type ;
    }
    this._set_storage = function(){
        var obj_data = arguments[0][0];
        var str_type = arguments[0][1];
        var _classtype = (typeof(str_type)=="string")?str_type:this.classtype();

        //alert( _classtype+"\t---[SET(0) ]Storage:\t"+ typeof(obj_data) +"\n---data---\n"+ str_type  );
        //alert("_set_storage\n\n"+  this.appinfo.page +"\t,\t"+ this.appinfo.webtype  );

        //var key_storage = "c_"+_classtype ;
        var key_storage = this.appinfo.webtype+"_"+_classtype;//this.appinfo.page ;
        var str_storage = JSON.stringify( obj_data);//localStorage[key_storage];
        var obj_storage = this._get_storage_2obj( key_storage );

        //alert( _classtype+"\t,\t"+key_storage+"\n---[SET(1) ]Storage:\t"+ obj_data +"\n---data---\n"+ str_storage  );

        var str_a="";
        for(o_ in obj_data){ str_a += "["+o_+"]="+obj_data[o_]+"\n" ; obj_storage[o_]= obj_data[o_];} ;
        var str_storage = JSON.stringify( obj_storage);//localStorage[key_storage];

        //alert( _classtype+"\t,\t"+key_storage+"\n---[SET(2) ]Storage:\t"+ obj_data +"\n---data---\n"+ str_storage  );
        localStorage.setItem(key_storage, str_storage );

        var obj_storage = this._get_storage_2obj( key_storage );
        var str_tmp     = JSON.stringify(obj_storage);
        //alert( _classtype+"\t---[SET(3) ]Storage:\t"+ obj_data +"\n---data---\n"+ str_tmp );
    }
    var cook_exceptions = "MY_co_user|MY_su_user|MY_ag_user|Message_read|Message_ma";

    this.logout = function(){
        var x2 = this.appinfo.webtype;
        var cookies = document.cookie.split(";");
        var str_a = document.cookie + "\n\ncookies.langth:"+cookies.length +"\n\n";
        try{
            eval( "var pri_data =" + this.gettop("pri_","index") );
            cook_exceptions += "|RB_Adv_V2"+pri_data.t+pri_data.u;//婊剧悆寤ｅ憡涓嶆竻
            cook_exceptions += "|RB_Adv180820_"+pri_data.t+pri_data.u;
        }catch(e){}

        for (var i = 0; i < cookies.length; i++) {
            var cookie = cookies[i];
            var eqPos = cookie.indexOf("=");
            var name = eqPos > -1 ? cookie.substr(0, eqPos) : cookie;
            name = name.replace(/^\s+|\s+$/g, '');

            if(this.chkExceptions_cookie(name))	continue;
            //if(name.search(x2)==0 || name=="uid"){ //alert("closedata:"+ name);
            document.cookie = name + "=;path=/;expires=Thu, 01 Jan 1970 00:00:00 GMT";
            //}
            str_a += "\n<b>"+i+".</b>\t\n"+  name + "=;path=/;expires=Thu, 01 Jan 1970 00:00:00 GMT\n";
        }//EOF.for( cookies )
        //alert(str_a);
        for (var name in localStorage){
            if(name.search(x2)==0 ){
                localStorage.removeItem(name);
            }
        }//EOF.for( localStorage )
    }

    //2014-10-08 cookie
    this.chkExceptions_cookie = function(keys){
        var out = false;
        ;		if(cook_exceptions.indexOf(keys) > -1)	out = true;
        return out;
    }

    this.chgview = function(p){
        var view = new view_(this); view.chgview(p);
    }

}//-----------------  public_ =>EOF();

function view_(obj_){
    this.this_ =this;
    this.obj_pub =(typeof(obj_)=="object")?obj_:new public_();
    this.chgview = function(p){
        var page=(p.substring(0,1)==".")?p:"./?=/"+p;
        window.location.href=page;//(p.search(".")==0)?p:"./?="+p;
    }

    this.setSkin_Init = function(e,data){
        var this_ = this;
        //setTimeout( function(){this_._MainFunction_init() }, 0);
        this_._MainFunction_init();
    }
    this.setSkin_pageshow = function(){
        var this_ = this;
        setTimeout( function(){this_._MainFunction_show() }, 10);
    }

    /*****  showInit *****/
    this._MainFunction_init = function(){
        try{
            this._setSkin_location();
            this._setSkin_view();
            this._setSkin_viewPri();
            if(1==2){ this_._setSkin_alert(); }
        }catch(e){}
    }
    this._setSkin_location = function(){ /* check route */
        var varbase  = this.obj_pub.basevar();//this.varbase;
        var pagename = varbase.classtype;
        var rsa      = varbase.rsa;
        if(varbase.uid!=""  ){
            //if( (pagename=="index"||pagename=="")){location.href="main_index.html"; }
            //	  if( (pagename=="index"||pagename=="")){ this.chgview("main_index.html"); }
            //if( rsa!=""&&(pagename=="main_rsa_login"||pagename=="main_rsa_msg")){location.href="main_index.html"; }
            //	  if( rsa!=""&&(pagename=="main_rsa_login"||pagename=="main_rsa_msg")){this.chgview("main_index.html"); }
        }else{
            //if( !(pagename=="index"||pagename=="")){location.href="/"; }
            //if( !(pagename=="index"||pagename=="")){alert(333221); this.chgview("index.html"); }
        }
    }
    this._setSkin_alert = function(){ /* Custom UI-alert */
        window.alert=function specail_alert(msg){
            $('#content_alert').html( msg );
            $("#content_2alert").click();
            return ;
        }
    }
    this._setSkin_viewPri = function(){
        var obj_pri = {'u':'','p':{}};
        str_pri = this.obj_pub.gettop('pri_','index') ;
        //alert("str_pri:"+ str_pri +"\ntypeof:"+ typeof(str_pri) );
        if(str_pri!="") obj_pri = jQuery.parseJSON( str_pri) ;
        $('#user_name').html( obj_pri.u);
        $('[data-pri]').each( function(index,value){
            try{
                var pri_ = $(this).attr('data-pri');
                var isok = obj_pri.p ;
                if(  pri_=="M" && !isok.M ) $(this).hide();
                else if(pri_=="A" && !isok.A ) $(this).hide();
                else if(pri_=="B" && !isok.B ) $(this).hide();
                else if(pri_=="B1"&& !isok.B1) $(this).hide();
                else if(pri_=="C" && !isok.C ) $(this).hide();
            }catch(e){}
            //alert( $(this).attr('data-pri')  +"\n\nData:\n"+index+" = "+value +"\n" +  $(this).html()  );
        });
    }
    this._setSkin_view = function(){
        var str_url = ""+window.location;
        //if(window.location.pathname.indexOf("report") >0 )$('.icon_find').hide();
        if(str_url.indexOf("report") >0 )$('.icon_find').hide();
        $('#tbody_tpl').hide();//document.getElementById("tbody_tpl").style.display="none";
    }

    /*****  showshop *****/
    this._MainFunction_show = function(){
        try{
            this._setSkin_alertInit();
            this._setSkin_EVENT();
            this._setSkin_Qmenu();
        }catch(e){
        }

        this.set_bell();

        //涓夌鍓涜級鍏ョ櫥鍏ラ爜鏄惁灏庡寘甯崇董璀�
        if(this.obj_pub.basevar().classtype == "index"){
            this.obj_pub.checkMaintain(false);
        }

    }
    //2015-07-02 mordecai , get personal message
    this.set_bell = function(){
        var chk_uid = this.obj_pub.basevar().uid || "";
        if(chk_uid!="" && $('.msg_bell').size() > 0 ){
            var this_ = this;
            var func = function(){
                var obj_data={'isPerson':"Y"};
                this_.obj_pub.settop(obj_data,"fucking_personal");
                this_.chgview("scoll_index.html");
            }

            $('.msg_box_h').click(func);
            $('.msg_box').click(func);

            $('.msg_bell').hide();
            $('.msg_count').hide();

            this.get_personal(true);
            this.get_mem_online(true);
        }
    }

    var bellTimer = undefined;
    var bellThis = this;
    this.get_personal = function(resetTimer){

        if(bellTimer!=undefined && resetTimer!=undefined ) clearTimeout(bellTimer);
        var var_data={'personal': "you",'classtype':"scoll_index",'scoll_set':"scoll_apn_cnt"};

        var arrSet={
            data:var_data ,
            success:function(data){
                //console.log(data);
                if( data.list_data.unread <= 0){
                    //$('#msg_text').html(20);
                    $('.msg_bell').show();
                    $('.msg_count').hide();
                }else{
                    $('.msg_bell').hide();
                    $('.msg_count').show();
                    $('#msg_text').html(data.list_data.unread);
                }
            }
        };
        if(resetTimer) bellTimer = setTimeout(function(){bellThis.get_personal(true);},90*1000);
        bellThis.obj_pub.get(arrSet);
    }

    var pingTimer = undefined;
    var pingThis = this;
    this.get_mem_online = function(resetTimer){

        if(pingTimer!=undefined && resetTimer!=undefined ) clearTimeout(pingTimer);
        var var_data={'classtype':"mem_online"};

        var arrSet={
            data:var_data ,
            success:function(data){
                try{
                    //console.log(data);
                }catch(e){}
            }
        };
        if(resetTimer) pingTimer = setTimeout(function(){pingThis.get_mem_online(true);},60*1000);
        pingThis.obj_pub.get(arrSet);
    }

    this._setSkin_alertInit = function(){
        var str_alert_init=$('#alert_init').html();
        if( typeof(str_alert_init)=="string"&& str_alert_init!="")alert(str_alert_init);
    }
    this._setSkin_EVENT = function(){
        var this_ = this;
        $('.icon_find').click(function(){  $("#find_box").slideToggle(120); });
        $(window).scroll(function(){this_._setSkin_gototop()});
        //$("#base_gototop").click( function(event){ $('html, body').scrollTop(0);  });
        $("#base_gototop").click( function(event){ $("html,body").animate({scrollTop:0},250); });
    }
    this._setSkin_gototop = function(){
        var height = $(window).height();
        var scrollTop = $(window).scrollTop();
        var obj_gototop = $("#base_gototop");
        if(scrollTop >(height+100)){
            obj_gototop.show();
        }else{ obj_gototop.hide(); }
        //$('#user_name').html(  ""+height+" vs. "+scrollTop);
        //obj_gototop.html(  ""+height+" vs. "+scrollTop);
    }
    this._setSkin_Qmenu = function(){
        var this_ = this;
        $('.Qmenu').find('a').each(function(){
            var str_temp = $(this).attr('href');
            if(str_temp=="#logout_bar"){
                //$(this).attr('href','index.html');
                $(this).click(function(){
                    this_.obj_pub.logout();
                    this_.chgview("index.html");
                })
            }
        });//EOF.Qmenu

        try{
            var langx = this.obj_pub._get_storage(["langx","index"]);
        }catch(ex){
            console.log(ex);
        }
        if(langx != "en-us"){
            $("#live_chat").click(function(){
                this_.chgview("callas_index.html");
            });
        }else{
            $("#live_chat").click(function(){
                this_.chgview("callas_index.html");
            });
        }
    }

}//-----------------  view_ =>EOF();

var is_try=false;

$(document).bind('mobileinit', function(){ //return false;
    $.mobile.ajaxEnabled=false;
    if(is_try)console.log('mobileinit.1..');
    //console.log(document.getElementById('div_page'));
});

$(window).bind('load', function(){
    var obj_ = new public_();
    var mSet = obj_.gettop({},"index");
    try{
        if('callas_index' == obj_.basevar().classtype){
            var src=document.createElement("script");
            src.innerHTML = "window.lpTag=window.lpTag||{},'undefined'==typeof window.lpTag._tagCount?(window.lpTag={site:'9137304'||'',section:lpTag.section||'',tagletSection:lpTag.tagletSection||null,autoStart:lpTag.autoStart!==!1,ovr:lpTag.ovr||{},_v:'1.8.0',_tagCount:1,protocol:'https:',events:{bind:function(t,e,i){lpTag.defer(function(){lpTag.events.bind(t,e,i)},0)},trigger:function(t,e,i){lpTag.defer(function(){lpTag.events.trigger(t,e,i)},1)}},defer:function(t,e){0==e?(this._defB=this._defB||[],this._defB.push(t)):1==e?(this._defT=this._defT||[],this._defT.push(t)):(this._defL=this._defL||[],this._defL.push(t))},load:function(t,e,i){var n=this;setTimeout(function(){n._load(t,e,i)},0)},_load:function(t,e,i){var n=t;t||(n=this.protocol+'//'+(this.ovr&&this.ovr.domain?this.ovr.domain:'lptag.liveperson.net')+'/tag/tag.js?site='+this.site);var a=document.createElement('script');a.setAttribute('charset',e?e:'UTF-8'),i&&a.setAttribute('id',i),a.setAttribute('src',n),document.getElementsByTagName('head').item(0).appendChild(a)},init:function(){this._timing=this._timing||{},this._timing.start=(new Date).getTime();var t=this;window.attachEvent?window.attachEvent('onload',function(){t._domReady('domReady')}):(window.addEventListener('DOMContentLoaded',function(){t._domReady('contReady')},!1),window.addEventListener('load',function(){t._domReady('domReady')},!1)),'undefined'==typeof window._lptStop&&this.load()},start:function(){this.autoStart=!0},_domReady:function(t){this.isDom||(this.isDom=!0,this.events.trigger('LPT','DOM_READY',{t:t})),this._timing[t]=(new Date).getTime()},vars:lpTag.vars||[],dbs:lpTag.dbs||[],ctn:lpTag.ctn||[],sdes:lpTag.sdes||[],hooks:lpTag.hooks||[],ev:lpTag.ev||[]},lpTag.init()):window.lpTag._tagCount+=1;";
            (document.getElementsByTagName("head")[0] || document.body).appendChild(src);
        }
        if(mSet.mail_status =="S"){
            $('a[href$="set_email.html"]').click(function(){
                alert(mSet.mailForb_LS);
                $('a[href$="set_email.html"]').removeClass('ui-btn-active');
                return false;
            });

        }
    }catch(e){}

    if(is_try)console.log("load.3");
});


//var view ;
$(function() {
    var selector = ':jqmData(role=page)';
    $('body').on('pageinit', selector, function(e, data) {// alert('eason.try');

        try{
            //console.log('show_div');
            document.getElementById('div_page').style.display='';
        }catch(e){ console.log("error"); };

        view = (typeof(view)=="object")?view:new view_();
        //var view = new view_();
        if(is_try)console.log("body.pageinit.a");
        try{view.setSkin_Init(e,data);}catch(e){}
    }).on('pagebeforeshow', selector, function(e, data) {
        if(is_try)console.log("body.pagebeforeshow.b");
    }).on('pageshow', selector, function(e, data) {
        view = (typeof(view)=="object")?view:new view_();
        if(is_try)console.log("body.pageshow.c");
        try{init(); }catch(e){};
        try{view.setSkin_pageshow(); }catch(e){};

        //try{
        //	document.getElementById('div_page').style.display='';
        //}catch(e){ console.log("error"); };
    });

});