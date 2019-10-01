@extends('cartoon.partials._layout')
@section('content')

    <div class="container nav-padding">
        <div class="container-fluid nav-padding">
            <nav class="navbar  nav-detail">
                <a href="javascript:window.history.back()" class="fl">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                </a>
                <a href="{{url('/')}}" class="fr nav-detail-home">
                    <span class="glyphicon glyphicon-home"></span>
                </a>
            </nav>
        </div>
    </div>
    <div class="container ">
        <div class="row login-warp">
            <div
                    class="col-xs-10 col-xs-offset-1 col-md-4 col-md-offset-4 login-warp-main login-warp-login">
                <h2 class="page-title">登录</h2>
                <form class="form-horizontal" action="javascript:logAction();">
                    <div class="form-group">
                        <div class="col-md-8 col-md-offset-2">
                            <input class=" form-control" id="log-email" placeholder="请输入正确邮箱">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-8 col-md-offset-2">
                            <input type="password" class=" form-control " id="log-pwd"
                                   placeholder="请输入密码">
                        </div>
                        <span id="log-error" class="help-block hide">账号或密码错误</span>
                    </div>
                    <div class="form-group">
                        <div class="col-md-8 col-md-offset-2 ">
                            <button type="submit" class=" login-warp-btn ">登录</button>
                        </div>
                    </div>
                </form>
                <div class="col-xs-12 col-md-12 login-warp-feet">
                    <a href="javascript:tofindpasswd();" class="login-rl">忘记密码</a>
                    <!-- <span style="margin: 0px 8px;border:0.5px solid white;height: 12px"></span> -->
                    <!-- <a href="javascript:toreset();">重置密码</a>
                    <span style="margin: 0px 8px;border:0.5px solid black;height: 12px"></span>  -->
                    <a href="javascript:toregist();" class="login-rl">立即注册</a>
                </div>
            </div>
            <div
                    class="col-xs-10 col-xs-offset-1 col-md-4 col-md-offset-4 login-warp-main login-warp-regist">
                <h2 class="page-title">注册</h2>
                <form action="javascript:registerAction();">
                    <div class="form-group">
                        <input class="form-control" id="regist-email"
                               placeholder="请输入正确邮箱">
                    </div>
                    <!-- <div class="form-group login-warp-findpasswd-validate">
                    <input type="text" class="form-control" id="registvalidatecode" style="width: 56.5%" placeholder="请输入验证码">
                   <button id="regist-validate"  type="button" class="btn-lg-theam btn-validate" style="font-size: 14px;width: 40%" onclick="getregistValidate()" >获取验证码</button>
                  </div>  -->
                    <div class="form-group">
                        <input type="password" class="form-control" id="regist-pwd"
                               placeholder="请输入长度5-25个字符的密码"> <span id="regist-error"
                                                                    class="help-block"></span>
                    </div>
                    <!--  <div class="form-group">
                    <input type="password" class="form-control" id="regist-rpwd" placeholder="确认密码">
                  <span id="regist-error" class="help-block"></span>
                  </div> -->
                    <button type="submit" class=" login-warp-btn " style="width: 100%">注册</button>
                </form>
                <div
                        class="col-xs-12 col-md-12 login-warp-feet login-warp-feet-margin login-warp-feet-right">
                    <!-- <a href="javascript:tofindpasswd();" class="login-rl">忘记密码</a>
                    <span style="margin: 0px 8px;border:0.5px solid white;height: 12px"></span> -->
                    <!-- <a href="javascript:toreset();">重置密码</a>
                    <span style="margin: 0px 8px;border:0.5px solid black;height: 12px"></span> -->
                    <a href="javascript:toLogin();" class="login-rl">已注册，去登录</a>
                </div>
            </div>
            <div
                    class="col-xs-10 col-xs-offset-1 col-md-4 col-md-offset-4 login-warp-main login-warp-findpasswd">
                <h2 class="page-title">找回密码</h2>
                <form action="javascript:findpwd();">
                    <div class="form-group">
                        <input class="form-control" id="find-email" placeholder="请输入正确邮箱">
                        <!--  <button id="find-validate" type="button" class="btn btn-info" onclick="getValidate()" >获取验证码</button> -->
                    </div>
                    <div class="form-group login-warp-findpasswd-validate">
                        <input type="text" class="form-control" id="validatecode"
                               style="width: 56.5%" placeholder="请输入验证码">
                        <button id="find-validate" type="button"
                                class="btn-lg-theam btn-validate"
                                style="font-size: 14px; width: 40%" onclick="getValidate()">获取验证码
                        </button>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" id="find-pwd"
                               placeholder="请输入新密码">
                    </div>
                    <!-- <div class="form-group">
                    <label for="exampleInputPassword1">确认密码</label>
                    <input type="password" class="form-control" id="find-rpwd" placeholder="Password">
                    <span id="find-error-p" class="help-block"></span>
                  </div> -->
                    <button type="submit" class=" login-warp-btn " style="width: 100%; margin-top: 0px;">找回
                    </button>
                    <div
                            class="col-xs-12 col-md-12 login-warp-feet login-warp-feet-margin login-warp-feet-right">
                        <!-- <a href="javascript:toreset();">重置密码</a>
                    <span style="margin: 0px 8px;border:0.5px solid black;height: 12px"></span> -->
                        <a href="javascript:toLogin();" class="login-rl">已找回，去登录</a>
                    </div>
                </form>

            </div>

            <div
                    class="col-xs-10 col-xs-offset-1 col-md-4 col-md-offset-4 login-warp-main login-warp-reset">
                <h2 class="page-title">重置密码</h2>
                <form action="javascript:resetpwd();">
                    <div class="form-group">
                        <input type="email" class="form-control" id="reset-email"
                               placeholder="邮箱">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" id="reset-opwd"
                               placeholder="旧密码"> <span id="reset-error"
                                                        class="help-block" style="display: none"></span>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" id="reset-npwd"
                               placeholder="新密码">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" id="reset-rpwd"
                               placeholder="确认密码"> <span id="reset-error-t"
                                                         class="help-block" style="display: none"></span>
                    </div>
                    <button type="submit" class="btn btn-danger "
                            style="width: 100%; margin-top: 10px;">重置
                    </button>
                </form>
            </div>
        </div>

    </div>

@endsection

@section('scripts')
    <script>


        var callback_url=null

        $(function(){
            var swidth=window.screen.width;
            var sheight=window.screen.height;
            $('body').css({
                'height':'100vh',
            })
            toLogin();
            getCallBackUrl();
            initToastr();
            toastr.options = {timeOut: "2000" }
        })
        function getCallBackUrl(){
            var arr=window.location.href.split('=');
            callback_url=arr[1];
        }
        function toLogin(){
            $('.login-warp-main').hide(200);
            $('.login-warp-login').show(200);
        }
        function tofindpasswd(){
            //login-warp-findpasswd
            $('.login-warp-main').hide(200);
            $('.login-warp-findpasswd').show(200);

        }
        function appDownloadAlert(){
            swal({
                title: '温馨提示',
                cancelButtonText: '暂时不用',
                confirmButtonText: '下载app',
                text:'使用app注册赠送30漫画币哦！',
                showCancelButton: true,
                allowOutsideClick:true,
                confirmButtonColor:'#9664D5',
                reverseButtons:true,
            }).then(function(isConfirm) {
                if (isConfirm === true) {
                    window.location.href="/page/app_down.html"
                } else if (isConfirm === false) {

                } else {

                }
            });
            $('.swal2-spacer').hide();
            $('.show-swal2').css('margin-top','-40%')
        }
        function toregist(){
            $('.login-warp-main').hide(200);
            $('.login-warp-regist').show(200);
            //appDownloadAlert();
        }

        function toreset(){
            $('.login-warp-main').hide(200);
            $('.login-warp-reset').show(200);

        }

        /*注册*/
        function registerAction(){

            var passwd=$('#regist-pwd').val();
            var usern=$('#regist-email').val();


//	var code=$('#registvalidatecode').val();
            if(!usern){
                toastr.info("账号不能为空");
                return ;
            }
            // if(!isPoneAvailable(usern)){
            //     toastr.info("账号格式不正确");
            //     return;
            // }
            if(!isEmail(usern)){
                toastr.info("账号格式不正确");
                return;
            }

            if(!passwd){
                toastr.info("密码不能为空");
                return ;
            }

//	if(!code){
//		toastr.info("验证码不能为空");
//		return ;
//	}

            var fd = new FormData();
            fd.append("username",$('#regist-email').val());
            fd.append("password",passwd);
//	fd.append("code",code);
            //fd.append("deviceToken",localStorage.getItem('blcomics_device'));
            $.ajax({
                url:"/register",
                type:'POST',
                cache:true,
                async:true,
                dataType:'JSON',
                data:fd,
                processData : false,  //必须false才会避开jQuery对 formdata 的默认处理
                contentType : false,  //必须false才会自动加上正确的Content-Type
                success:function(result){
                    if(result.code!='200'){
                        toastr.info(result.msg);
                    }else{
                        swal({
                            title: '注册成功',
                            text:result.msg,
                            type: 'success',
                            confirmButtonText: '确定',
                            allowOutsideClick:false,
                            confirmButtonColor:'#9664D5',
                        }).then(function(isConfirm) {
                            if (isConfirm === true) {
                                $('#log-email').val($('#regist-email').val());
                                toLogin();
                            } else if (isConfirm === false) {

                            } else {

                            }
                        });
                        $('.swal2-spacer').hide();
                        $('.show-swal2').css('margin-top',-($(window).height() -$('.swal2-modal').height())/2+'px');
                    }
                }
            });
        }
        function logAction(){
            var username=$('#log-email').val();
            var password=$('#log-pwd').val();
            if(!username){
                toastr.info("账号不能为空");
                return;
            }
            // if(!isPoneAvailable(username)){
            //     toastr.info("账号格式不正确");
            //     return;
            // }
            if(!isEmail(username)){
                toastr.info("账号格式不正确");
                return;
            }
            if(!password){
                toastr.info("密码不能为空");
                return;
            }
            $.ajax({
                url:'/do-login',
                type:'POST',
                async:false,
                dataType:'JSON',
                data:{'username':username,'password':password},
                success:function(result){
                    if(result.code!='200'){
                        toastr.info(result.msg);
                    }else{
                        //localStorage.setItem('blcomics_token',result.data.token);
                        toastr.info(result.msg);
                        setTimeout(function(){
                            window.location.href=document.referrer;
                        }, 1200);
                    }
                }
            })
        }
        //找回密码
        function findpwd(){
            var username=$("#find-email").val();
            var code=$("#validatecode").val();
            var password=$("#find-pwd").val();
            if(!username){
                toastr.info("账号不能为空！");
                return;
            }
            // if(!isPoneAvailable(username)){
            //     toastr.info("账号格式不正确");
            //     return;
            // }
            if(!isEmail(username)){
                toastr.info("账号格式不正确");
                return;
            }
            if(!code){
                toastr.info("验证码不能为空！");
                return;
            }
            if(!password){
                toastr.info("新密码不能为空！");
                return;
            }
            $.ajax({
                url:'/user/reset_pwd?'+new Date(),
                type:'post',
                cache:false,
                data:{'username':username,'password':password,'code':code},
                success:function(result){
                    if(result.code=='200'){
                        toastr.info(result.msg);
                        $('#log-email').val(username);
                        setTimeout(function(){
                            toLogin();
                        }, 1500);
                    }else{
                        toastr.info(result.msg);
                    }
                }
            })



        }
        //注册验证码
        function getregistValidate(){
            var email=$('#regist-email').val();
            if(email==null||email==""){
                toastr.info("手机号码不能为空！");
                return;
            }
            $('#regist-validate').attr('disabled','disabled');
            $.ajax({
                url:'/user/sms_code',
                type:'post',
                cache:false,
                data:{'phoneNumber':email,'type':0},
                success:function(result){
                    toastr.info(result.msg);
                    if(result.code==200){
                        var temp=60;
                        var timer=setInterval(function() {
                            $('#regist-validate').text('验证码('+temp+')');
                            temp-=1;
                            if(temp==0){
                                clearInterval(timer);
                                $('#regist-validate').text('获取验证码');
                                $('#regist-validate').removeAttr('disabled').css('color','white');
                            }
                        }, 1000);
                    }else{
                        $('#regist-validate').removeAttr('disabled').css('color','white');
                    }

                }
            })
        }

        //找回密码获取验证吗
        function getValidate(){
            var email=$('#find-email').val();
            if(email==null||email==""){
                toastr.info("账号不能为空！");
                return;
            }
            if(!isPoneAvailable(email)){
                toastr.info("账号格式不正确");
                return;
            }

            $('#find-validate').attr('disabled','disabled');
            $.ajax({
                url:'/user/sms_code',
                type:'post',
                cache:false,
                data:{'phoneNumber':email,'type':1},
                success:function(result){
                    toastr.info(result.msg);
                    if(result.code==200){
                        var temp=60;
                        var timer=setInterval(function() {
                            $('#find-validate').text('验证码('+temp+')')
                            temp-=1;
                            if(temp==0){
                                clearInterval(timer);
                                $('#find-validate').text('获取验证码')
                                $('#find-validate').removeAttr('disabled').css('color','white');
                            }
                        }, 1000);
                    }else{
                        $('#find-validate').removeAttr('disabled').css('color','white');
                    }
                }
            })
        }
    </script>
@endsection

@section('styles')
    <link href="{{asset('css/base.css')}}" rel="stylesheet"/>
    <style>
        body {
            background: url(/static/images/login_bg.png) no-repeat;
            background-position: center;
            background-size: contain;
        }

        .login-warp {


            padding: 90px 10px;
        }

        .page-title {

            font-size: 24px;
            text-align: center;
            padding-bottom: 10px;
            color: white;
        }

        .login-warp-main {

            background-color: rgba(0, 0, 0, 0.3);
            padding: 30px 40px 10px 40px;
            border-radius: 5px;
            display: none;
        }

        .login-warp-feet {

            display: flex;
            align-items: center;
            justify-content: space-between;
            padding-right: 0px;
            padding-left: 0px;
            margin-bottom: 3px;
        }

        .login-warp-feet-right {
            justify-content: flex-end;
        }

        .login-warp-feet-margin {

            margin-top: 15px;
        }

        .btn-lg-theam {
            background-color: #9664D5;
            color: white;
            font-size: 16px;
            font-weight: 600;
            padding: 5px 12px;
            border-radius: 4px;
            white-space: nowrap;
            vertical-align: middle;
            line-height: 24px;
            display: flex;
            justify-content: center;
        }

        .login-warp-btn {
            background-color: #9664D5;
            color: white;
            font-size: 16px;
            font-weight: 600;
            padding: 5px 12px;
            line-height: 24px;
            border-radius: 4px;
            width: 100%;
        }

        @media screen and (max-width: 500px) {

            .login-warp {
                padding: 40px 0px;
            }

            .login-warp-main {

                /* margin: 10px 15px; */

            }

            .login-warp-findpasswd-validate {

                display: flex;
                align-items: center;
                justify-content: space-between;
            }

            .login-rl {
                font-weight: 600;
                color: white;
                font-size: 14px;
            }

            /* .btn-validate{
                padding: 6px 12px;
                border-radius: 4px;
                white-space: nowrap;
                vertical-align: middle;

            } */
            #registvalidatecode {
                width: 70%;
            }

        }
    </style>
@endsection

