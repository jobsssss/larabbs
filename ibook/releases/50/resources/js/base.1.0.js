/*基础脚本*/

/*全局变量定义*/
var obj={};
obj.token='';
obj.user={};
/*图片prefix*/
var cname="_autoNext";
var user=null;

$(function(){
    //$.getScript('//js.users.51.la/19787087.js')
    // $.ajax({
    //     url:'/book/asynctest',
    //     type:'post',
    //     success:function(){
    //         //$('body').append('<script async type="text/javascript" src="//js.users.51.la/19787087.js"></script>');
    //         $('body').append('<script async type="text/javascript" src="https://s96.cnzz.com/z_stat.php?id=1277300090&web_id=1277300090"></script>');
    //     }
    // })
//
//	$.getScript('http://pv.sohu.com/cityjson?ie=utf-8',function(){
//		localStorage.setItem("blcomics_ip",returnCitySN["cip"]);
//	});

    openOther();

    //record();
    //refreshTimestampCookie();

})

function openOther(){


    var ua = navigator.userAgent.toLowerCase();
    var isAndroid = (ua.match(/android/i) == "android" || ua.match(/linux/i) == "linux"); //g
    var isIOS = !!ua.match(/\(i[^;]+;( U;)? CPU.+Mac OS X/); //ios终端
    var isWeixin = (ua.match(/MicroMessenger/i) == "micromessenger");
    if(isWeixin){
        $('body').append(errorStr);
        var weixinImg=document.getElementById("weixinImg");
        if(isAndroid){
            weixinImg.setAttribute("src", "http://47.97.112.180/static/images/wx_tip_android.png");
        }else if(isIOS){
            weixinImg.setAttribute("src", "http://47.97.112.180/static/images/wx_tip_ios.png");
        }else{
            weixinImg.setAttribute("src", "http://47.97.112.180/static/images/wx_tip.png");
        }
        $('html,body').css({
            'overflow': 'hidden',
            'height':'100%' ,
            'position':'fixed'
        })

        $(document).on('touchmove',function (e){
            e.preventDefault();
        });
        return;
    }

}


function refreshTimestampCookie() {
    if(getCookie('blcomics_client_timestamp')) {
        setCookie('blcomics_client_timestamp',Date.parse(new Date()));
    }
    if(localStorage.getItem('blcomics_device')){
        $.ajax({
            url:'/statistic/visit_time',
            type:'post',
            data:{'deviceToken':localStorage.getItem('blcomics_device')}
        })
    }
}

function record() {

    var token=localStorage.getItem("blcomics_token");
    var agentToken=getUrlParam();
    if(agentToken.indexOf('agentToken')>-1){
        agentToken=agentToken.substr(12,agentToken.length-1);
    }else{
        agentToken=null;
    }
    if(!token) {
        var referer=getParamvalue('my_referer');
        if(referer){
            var devicetoken=localStorage.getItem('blcomics_device');
            if(!devicetoken){
                $.ajax({
                    url:'/device/add',
                    type:'post',
                    data:{'channel':referer,'agentToken':agentToken},
                    success:function(result){
                        if(result.code=='200'){
                            localStorage.setItem('blcomics_device',result.data);
                        }
                    },
                })
            }
        }else{
            var devicetoken=localStorage.getItem('blcomics_device')
            if(!devicetoken) {
                $.ajax({
                    url:'/device/add',
                    type:'post',
                    data:{'channel':document.referrer,'agentToken':agentToken},
                    success:function(result){
                        if(result.code=='200'){
                            //console.log(localStorage.getItem("blcomics_ip"));
                            localStorage.setItem('blcomics_device',result.data);
                        }
                    },
                })
            }
        }



    }

}


var errorStr='<div class="hide-holder" style="position: fixed;z-index:100000;width: 100%;height: 100%;top:0px;left: 0px;background: rgba(0,0,0,0.8) no-repeat;background-size: contain;">'+
    '<img id="weixinImg" src="http://47.97.112.180/static/images/wx_tip.png" style="width:100%"/>'
'</div>';


function judgmentClient(){
    var UserClient = navigator.userAgent.toLowerCase();
    var IsIPad = UserClient.match(/ipad/i) == "ipad";
    var IsIphoneOs = UserClient.match(/iphone os/i) == "iphone os";
    var IsMidp = UserClient.match(/midp/i) == "midp";
    var IsUc7 = UserClient.match(/rv:1.2.3.4/i) == "rv:1.2.3.4";
    var IsUc = UserClient.match(/ucweb/i) == "ucweb";
    var IsAndroid = UserClient.match(/android/i) == "android";
    var IsCE = UserClient.match(/windows ce/i) == "windows ce";
    var IsWM = UserClient.match(/windows mobile/i) == "windows mobile";
    if(IsIPad || IsIphoneOs || IsMidp || IsUc7 || IsUc || IsAndroid || IsCE || IsWM){
        return "m";
    }else{
        return "p";
    }
}

/*获取cookie*/
function getCookie(name){
    var arr,reg=new RegExp("(^| )"+name+"=([^;]*)(;|$)");
    if(arr=document.cookie.match(reg))
        return unescape(arr[2]);
    else
        return;
}
//添加cookie
function setCookie(name,value){
    document.cookie=name+"="+value;
}
//删除cookie
function delCookie(name) {
    var exp = new Date();
    exp.setTime(exp.getTime() - 1);
    var cval=getCookie(name);
    if(cval!=null)
        document.cookie= name + "="+cval+";expires="+exp.toGMTString();
}

//?sectionId=1&sectionName=%E8%BF%9E%E8%BD%BD"
function getParamvalue(name){
    //location.search是从当前URL的?号开始的字符串
    var params=decodeURI(window.location.search);
    var len=params.length;
    params=params.substr(1,len-1);
    var paramsArr=params.split('&');
    for(var i in paramsArr){
        if(paramsArr[i].indexOf(name)!=-1){
            return paramsArr[i].split("=")[1]
        }

    }
    return null;
}
function getUrlParam(){
    var params=decodeURI(window.location.search);
    var len=params.length;
    return params;
}

function dateFtt(fmt,date)   { //author: meizz
    var o = {
        "M+" : date.getMonth()+1,                 //月份
        "d+" : date.getDate(),                    //日
        "h+" : date.getHours(),                   //小时
        "m+" : date.getMinutes(),                 //分
        "s+" : date.getSeconds(),                 //秒
        "q+" : Math.floor((date.getMonth()+3)/3), //季度
        "S"  : date.getMilliseconds()             //毫秒
    };
    if(/(y+)/.test(fmt))
        fmt=fmt.replace(RegExp.$1, (date.getFullYear()+"").substr(4 - RegExp.$1.length));
    for(var k in o)
        if(new RegExp("("+ k +")").test(fmt))
            fmt = fmt.replace(RegExp.$1, (RegExp.$1.length==1) ? (o[k]) : (("00"+ o[k]).substr((""+ o[k]).length)));
    return fmt;
}
function formatDateTime(timeStamp) {
    var date = new Date();
    date.setTime(timeStamp * 1000);
    var y = date.getFullYear();
    var m = date.getMonth() + 1;
    m = m < 10 ? ('0' + m) : m;
    var d = date.getDate();
    d = d < 10 ? ('0' + d) : d;
    var h = date.getHours();
    h = h < 10 ? ('0' + h) : h;
    var minute = date.getMinutes();
    var second = date.getSeconds();
    minute = minute < 10 ? ('0' + minute) : minute;
    second = second < 10 ? ('0' + second) : second;
    return y + '-' + m + '-' + d+' '+h+':'+minute+':'+second;
};

function chargePlus(){

    var cval=new Number($('#chargecoin').val());
    $('#chargecoin').val(cval+1);
    var moneys=(cval+1)/10;
    $('#paymoneys').text(moneys);
}

function chargeMinus(){
    var cval=new Number($('#chargecoin').val());
    if(cval>0){
        $('#chargecoin').val(cval-1);
        var moneys=(cval-1)/10;
        $('#paymoneys').text(moneys);
    }

}
function IsPC() {
    var userAgentInfo = navigator.userAgent;
    var Agents = ["Android", "iPhone",
        "SymbianOS", "Windows Phone",
        "iPad", "iPod"];
    var flag = true;
    for (var v = 0; v < Agents.length; v++) {
        if (userAgentInfo.indexOf(Agents[v]) > 0) {
            flag = false;
            break;
        }
    }
    return flag;
}

//吐司
function initToastr(){
    toastr.options = {
        closeButton: false,
        debug: false,
        progressBar: true,
        positionClass: "toast-top-right",
        onclick: null,
        showDuration: "300",
        hideDuration: "500",
        timeOut: "2000",
        extendedTimeOut: "500",
        showEasing: "swing",
        hideEasing: "linear",
        showMethod: "fadeIn",
        hideMethod: "fadeOut"
    };
}

//禁止滚动
function bodyScroll(event){
    event.preventDefault();
}
function stopBodyScoll(){

    $('body').css({'position':'fixed',"width":"100%"});
}
function startBodyScoll(){
    //document.body.removeEventListener('touchmove',bodyScroll,false);
    $("body").css({"position":"initial","height":"auto"});
}



function myBrowser(){
    var userAgent = navigator.userAgent; //取得浏览器的userAgent字符串

    if (userAgent.indexOf("OPR") > -1||userAgent.indexOf("Opera") > -1) {
        return "Opera"
    }//判断是否Opera浏览器
    else if (userAgent.indexOf("Firefox") > -1) {
        return "FF";
    } //判断是否Firefox浏览器
    else   if (userAgent.indexOf("Chrome") > -1){
        return "Chrome";
    }
    else   if (userAgent.indexOf("Safari") > -1) {
        return "Safari";
    } //判断是否Safari浏览器
    else  if (userAgent.indexOf("WOW") > -1) {
        return "IE";
    }else{
        return null;
    }
}

function stopScoll( layerNode ){
    //如果没有这个元素的话，那么将不再执行下去
    if ( !document.querySelector( layerNode ) ) return ;

    this.popupLayer = document.querySelector( layerNode ) ;
    this.startX = 0 ;
    this.startY = 0 ;

    this.popupLayer.addEventListener('touchstart', function (e) {
        this.startX = e.changedTouches[0].pageX;
        this.startY = e.changedTouches[0].pageY;
    }, false);

    // 仿innerScroll方法
    this.popupLayer.addEventListener('touchmove', function (e) {

        e.stopPropagation();

        var deltaX = e.changedTouches[0].pageX - this.startX;
        var deltaY = e.changedTouches[0].pageY - this.startY;

        // 只能纵向滚
        if(Math.abs(deltaY) < Math.abs(deltaX)){
            e.preventDefault();
            return false;
        }

        if( this.offsetHeight + this.scrollTop >= this.scrollHeight){
            if(deltaY < 0) {
                e.preventDefault();
                return false;
            }
        }
        if(this.scrollTop === 0){
            if(deltaY > 0) {
                e.preventDefault();
                return false;
            }
        }
        // 会阻止原生滚动
        // return false;
    },false);

}

//tabbar 切换
function switchTabbar(pagename){
    $('.index-tabbar-item-'+pagename).find('img').attr('src','http://47.97.112.180/static/images/tabbar_'+pagename+'_selected.png')

}


//弹窗开始

//充值成功
function chargeSuccessAlert(){
    swal({
        title: '充值成功',
        type: 'success',
        confirmButtonText: '确定',
        allowOutsideClick:false,
        confirmButtonColor:'#9664D5',
    }).then(function(isConfirm) {
        if (isConfirm === true) {
            window.location.href="/myinfo.html"
        } else if (isConfirm === false) {

        } else {

        }
    });
    $('.swal2-spacer').hide();
    $('.show-swal2').css('margin-top','-40%')
    stopBodyScoll();

}




function checkLogin(){
    token=localStorage.getItem("blcomics_token");
    //token=get_cookie('blcomics_token');
    if(token){
        $.ajax({
            url:'/user/loginbytoken',
            type:'post',
            cache:false,
            data:{'token':token},
            success:function(result){
                if(result.code=='200'){
                    user=result.data;
                }
            }
        })
    }
}

function get_cookie(Name) {
    var search = Name + "="//查询检索的值
    var returnvalue = "";//返回值
    if (document.cookie.length > 0) {
        sd = document.cookie.indexOf(search);
        if (sd!= -1) {
            sd += search.length;
            end = document.cookie.indexOf(";", sd);
            if (end == -1)
                end = document.cookie.length;
            //unescape() 函数可对通过 escape() 编码的字符串进行解码。
            returnvalue=unescape(document.cookie.substring(sd, end))
        }
    }
    return returnvalue;
}


function toHHomepage(){
    window.location.href="/book/homepage_web";
}

function isPoneAvailable(phoneNum) {
    var myreg=/^[1][3,4,5,6,7,8,9][0-9]{9}$/;
    if (!myreg.test(phoneNum)) {
        return false;
    } else {
        return true;
    }
}

function isEmail(email) {
    var myreg=/^\w[-\w.+]*@([A-Za-z0-9][-A-Za-z0-9]+\.)+[A-Za-z]{2,14}$/;
    if (!myreg.test(email)) {
        return false;
    } else {
        return true;
    }
}

function mask(){
    $.blockUI({
        css: {
            border: 'none',
            padding: '15px',
            backgroundColor: '#000',
            '-webkit-border-radius': '10px',
            '-moz-border-radius': '10px',
            opacity: 0.8,
            color: '#fff',
        },
        message:'加载中...',
        baseZ: 100000000,
    });
}

function unmask(){
    $.unblockUI();
}


function getAliveIps(){
    var currentIp="";
    $.ajax({
        url:"/message/img_server",
        type:'post',
        async:false,
        success:function(result){
            currentIp=result.data
        }
    })
    return currentIp;
}
//手机中间4位变星号
function encodePhoneNum(tel){
    var reg = /^(\d{3})\d{4}(\d{4})$/;
    tel = tel.replace(reg, "$1****$2");
    return tel;
}

function showToastr(msg){
    toastr.info(msg);
}