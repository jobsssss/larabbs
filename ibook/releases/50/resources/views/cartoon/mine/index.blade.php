@extends('cartoon.partials._layout')
@section('content')

    <div class="container myinfo">
        <div class="row myinfo-base">
            <div class="col-xs-12 g-padding-xs-0 myinfo-base-contect">
                <div class="col-xs-9 g-padding-xs-0 myinfo-base-contect">
                    <div class="col-xs-4 g-padding-xs-0 myinfo-base-contect-user">
                        <img id="userimg" class="img-circle user-icon" alt="头像" src="{{asset('static/images/default_icon_user.jpg')}}">
                        <div class="huiyuan-icon"></div>
                    </div>
                    <div class="col-xs-8 g-padding-xs-0 myinfo-base-nid">
                        <p id="myinfo-username">
                            @if(Auth::check())
                                {{Auth::user()->name}}
                            @else
                                <a id="log-btn" href="{{route('login')}}">(点我登录)</a>
                            @endif

                        </p>
                        <p class="myinfo-base-np"><img class="coin-img" style="margin-bottom: 3px;margin-left: 0px;" alt="" src="{{asset('static/images/book_coin.png')}}">&nbsp;漫画币：<span id="myinfo-remain">0</span></p>
                        <p class="myinfo-isvip"><img class="coin-img" style="margin-bottom: 3px;margin-left: 0px;width: 18px;height: 18px;" alt="" src="{{asset('static/images/vip_icon.png')}}">&nbsp;<span id="myinfo-isvip-text"></span></p>
                    </div>
                </div >
                <div class="col-xs-3 g-padding-xs-0 hide">
                    <button  type="button" class=" fr myinfo-base-checkin">签到</button>
                </div>
            </div>
        </div>
        <!-- <div class="col-xs-12 g-padding-xs-0">

        <hr style="filter: alpha(opacity=100,finishopacity=0,style=3);margin: 0px 0px;" width="100%" color="#6f5499" size="3" />
        </div>	 -->

    </div>

    <div class="container ">
        <div class="row myinfo-function">
            <div class="col-xs-12 myinfo-function-list function-charge">
                <p class="function-desc">充值漫画币<span class="glyphicon glyphicon-menu-right "></span></p>
            </div>
            <div class="col-xs-12 myinfo-function-list function-purchase">
                <p class="function-desc ">消费记录 <span class="glyphicon glyphicon-menu-right "></span></p>
            </div>
            <!-- <div class="col-xs-12 myinfo-function-list function-tasks">
                <p class="function-desc ">推广进度<span class="glyphicon glyphicon-menu-right "></span></p>
            </div> -->
            <div class="col-xs-12 myinfo-function-list function-issue">
                <p class="function-desc function-border-none">问题反馈<span class="glyphicon glyphicon-menu-right "></span></p>
            </div>
        </div>

    </div>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-12 myinfo-contactline"><!-- 401876095 -->
                <p class="theme-color" style="text-align: center;width: 100%;line-height: 22px;font-size: 12px;margin-top: 5px;">客服联系方式：QQ2462450809</p>
            </div>
        </div>

    </div>


    <!-- 签到 start-->
    <div id="dailycheck" class="modal fade ">
        <div class="modal-dialog dailycheck-dialog">
            <div class="modal-content ">
                <div class=" modal-body dailycheck-header">
                    <div class="row">
                        <h1>每日签到</h1>
                        <HR style="border:1 dashed #fff;margin-bottom: 0px;" width="100%" color=#fff SIZE=1>
                    </div>
                    <div class="dailycheck-item-list">
                        <div class="dailycheck-item">
                            <p>连续1天</p>
                            <div class="dailycheck-item-content">
                                <img class="dailycheck-item-img" src="{{asset('static/images/recharge_coin.png')}}">
                                <span class="dailycheck-item-coin">4漫画币</span>
                            </div>
                            <div class="dailycheck-item-hide">

                            </div>
                        </div>
                        <div class="dailycheck-item">
                            <p>连续2天</p>
                            <div class="dailycheck-item-content">
                                <img class="dailycheck-item-img" src="{{asset('static/images/recharge_coin.png')}}">
                                <span class="dailycheck-item-coin">5漫画币</span>
                                <div class="dailycheck-item-hide">

                                </div>
                            </div>
                        </div>
                        <div class="dailycheck-item">
                            <p>连续3天</p>
                            <div class="dailycheck-item-content">
                                <img class="dailycheck-item-img" src="{{asset('static/images/recharge_coin.png')}}">
                                <span class="dailycheck-item-coin">6漫画币</span>
                                <div class="dailycheck-item-hide">

                                </div>
                            </div>
                        </div>
                        <div class="dailycheck-item">
                            <p>连续4天</p>
                            <div class="dailycheck-item-content">
                                <img class="dailycheck-item-img" src="{{asset('static/images/recharge_coin.png')}}">
                                <span class="dailycheck-item-coin">7漫画币</span>
                                <div class="dailycheck-item-hide">

                                </div>
                            </div>
                        </div>
                        <div class="dailycheck-item dailycheck-item-last">
                            <p>连续5天</p>
                            <div class="dailycheck-item-content">
                                <img class="dailycheck-item-img" src="{{asset('static/images/recharge_coin.png')}}">
                                <span class="dailycheck-item-coin">12漫画币</span>
                                <div class="dailycheck-item-hide">

                                </div>
                            </div>
                        </div>
                        <button  class="dailycheck-item-btn"> 签到</button>
                        <div class="dailycheck-item-info">每天连续签到领取奖励，每五天重置签到</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- 签到 end-->

    <!-- tabbar -->
    @include('cartoon.partials._footer')

@endsection

@section('scripts')
    <script>

        var user=null;
        //var token=null;
        var isLogin = "{{Auth::check()}}";
        var check=null;
        var checkTime=null;
        $(function(){
//

//	$(window).on('pageshow', function(e){
//		userinfostatus();
//	});
            userinfostatus();
            switchTabbar('mine');
            initpage();
        })

        function initpage(){
            initToastr();
            $('.function-charge').click(function(){
                //token=localStorage.getItem("blcomics_token");

                if(isLogin){
                    window.location.href="/charge"
                }else{
                    toastr.info("请先登录！");
                    setTimeout(function() {
                        window.location.href="/login";
                    }, 1000);
                }

            });
            //消费记录
            $('.function-purchase').click(function(){

                window.location.href="/consume-record"
            });
            $('.function-tasks').click(function(){
                token=localStorage.getItem("blcomics_token");
                if(token){
                    window.location.href="/page/task.html"
                }else{
                    toastr.info("请先登录！");
                    setTimeout(function() {
                        window.location.href="/login.jsp";
                    }, 1000);
                }
            });
            $('.function-issue').click(function(){
                var username='';
                if(user) username=user.username;
                window.location.href="issue?contact="+username;
            })
            //daily check
            $('#dailycheck').modal({
                keyboard: true,
                show:false
            });
            $('.myinfo-base-checkin').click(function(){
                //关闭签到
                return;
                token=localStorage.getItem("blcomics_token");
                if(token){
                    $('#dailycheck').modal('show');
                }else{
                    toastr.info("请先登录！");
                    setTimeout(function() {
                        window.location.href="/login.jsp?preUrl=myinfo.html";
                    }, 1000);
                }

            })

            $('#dailycheck').on('show.bs.modal',function(e){
                $(this).css('display', 'block');
                $('.dailycheck-dialog').css({
                    'top':($(window).height()-$('.dailycheck-dialog').height()-60)/2+'px',
                    'overflow':'hidden'
                });
                token=localStorage.getItem("blcomics_token");
                $.ajax({
                    url:'/activity/checkin_record',
                    type:'post',
                    data:{'token':token},
                    success:function(result){
                        check=result.data;
                        checkTime=localStorage.getItem("checkTime");
                        if(checkTime){
                            $('.dailycheck-item').each(function(){
                                var index=$(this).index('.dailycheck-item');
                                if(index<check.stage){
                                    $(this).find('.dailycheck-item-hide').show();
                                }
                            })
                        }
                    }
                })
            });
            $('.dailycheck-item-btn').click(function(){
                //关闭签到
                return;
                $('.dailycheck-item-btn').text('已签到').attr('disabled','disabled').css({
                    'background-color':'gray'
                });
                token=localStorage.getItem("blcomics_token");
                if(token){
                    $.ajax({
                        url:'/activity/checkin',
                        type:'post',
                        data:{'token':token},
                        success:function(result){
                            if(result.code=='200'){
                                $('#dailycheck').modal('hide');
                                swal({
                                    title: '签到成功',
                                    text:result.msg,
                                    type: 'success',
                                    confirmButtonText: '确定',
                                    allowOutsideClick:false,
                                    confirmButtonColor:'#9664D5',
                                }).then(function(isConfirm) {
                                    localStorage.setItem("checkTime",new Date(new Date(new Date().toLocaleDateString()).getTime()+24*60*60*1000-1));
                                    $('.myinfo-base-checkin').text('已签到');
                                    $('.dailycheck-item-btn').text('已签到').attr('disabled','disabled').css({
                                        'background-color':'gray'
                                    });
                                    userinfostatus();
                                });
                                $('.swal2-spacer').hide();

                                $('.show-swal2').css('margin-top',-($(window).height() -$('.swal2-modal').height()+40)/2+'px');
                            }else{
                                $('#dailycheck').modal('hide');
                                $('.myinfo-base-checkin').text('已签到');
                                $('.dailycheck-item-btn').text('已签到').attr('disabled','disabled').css({
                                    'background-color':'gray'
                                });
                                localStorage.setItem("checkTime",new Date(new Date(new Date().toLocaleDateString()).getTime()+24*60*60*1000-1));
                                setTimeout(function() {
                                    toastr.info(result.msg);
                                }, 1000);
                            }
                        }
                    })
                }
            })


            //$('.dailycheck-item-hide').show();
            //获取签到信息
            //getCheckStatus();





        }
        //获取签到信息
        function getCheckStatus(){
            checkTime=new Date(localStorage.getItem("checkTime")).getTime();
            var currTime= new Date().getTime()
            if(checkTime&&currTime<checkTime){
                $('.myinfo-base-checkin').text('已签到')
                $('.dailycheck-item-btn').text('已签到').attr('disabled','disabled').css({
                    'background-color':'gray'
                })
            }else{
                $('.myinfo-base-checkin').text('签到')
            }

        }
        /*是否登入 获取用户信息*/
        function userinfostatus(){
            token=localStorage.getItem("blcomics_token");
            if(token){
                $.ajax({
                    url:'/user/loginbytoken',
                    type:'post',
                    cache:false,
                    async:false,
                    data:{'token':token},
                    success:function(result){
                        if(result.code=='200'){
                            user=result.data;
                            $('#myinfo-username').html(user.username);
                            $('#myinfo-remain').text(user.bookCoin);
                            $('#log-btn').hide();
                            if(user.svip>0){
                                $('#userimg').addClass('huiyuan');
                                $('.huiyuan-icon').show();
                                $('.myinfo-isvip').show();
                                $('#myinfo-isvip-text').html('<strong style="color:rgb(240,100,100)">年费会员</strong>');
                            }
                        }
                    }
                });

            }else{
                $('#log-btn').show();
            }
//

        }

        function showToastr(msg){
            toastr.info(msg);
        }
    </script>
@endsection

@section('styles')
    <link href="{{asset('css/base.css')}}" rel="stylesheet" />
    <style>
        /* @media screen and (max-width: 960px){ */
        .myinfo{
            padding:0px 0px;
            background-color: white;
        }
        #log-btn{
            display: none;
            color: white;
        }
        .myinfo-base{

            background-color: rgba(150,100,213,0.5);
            margin: 0px 0px;
            padding: 30px 20px;
            /* border-radius: 5px 5px 5px 5px; */
        }
        .myinfo-contactline{

            position: absolute;
            bottom: 50px;
        }
        .myinfo-base-nid{

            margin: 10px 0px;
            padding-left: 8px;
        }
        #myinfo-username{
            padding: 3px 0px;
            color: black;
            font-size: 16px;
        }
        .myinfo-base-np{
            font-size: 14px;
            padding: 3px 0px;
            color: black;
        }
        #myinfo-remain{
            font-size: 14px;
        }
        .myinfo-base-checkin{
            color: #9664D5;
            padding: 6px 16px;
            background-color: white;
            overflow: hidden;
            outline:none;
            border-radius: 16px;
        }
        .myinfo-base-checkin:focus{
            border-color: #9664D5;
            outline:none;
        }
        .btn-default:hover{
            color: #9664D5;
            background-color: white;
            border-color: #9664D5;
            outline:none;
        }
        .btn-default:active{
            border-color: #9664D5;
            outline:none;
        }
        .btn-default:before{
            outline:none;
        }

        .myinfo-function{
            margin-top: 10px;
        }
        .myinfo-function-list{
            font-size: 16px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding-right: 0px;
            background-color: white;

        }

        .function-desc{
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-left: 26px;
            padding: 18px 10px 18px 0px;
            width:100%;
            border-bottom: 1px solid rgba(128,128,128,0.3);
        }
        .function-charge{
            background:white url('/static/images/pig.jpg') no-repeat;
            background-position:left 10px top 50%;
            background-size:24px 24px;
        }
        .function-purchase{

            background:white url('/static/images/user_order.png') no-repeat;
            background-position:left 10px top 50%;
            background-size:24px 24px;
        }
        .function-tasks{
            background:white url('/static/images/task.png') no-repeat;
            background-position:left 7px top 50%;
            background-size:30px 30px;
        }
        .function-issue{
            background:white url('/static/images/user_issue.png') no-repeat;
            background-position:left 10px top 50%;
            background-size:24px 24px;
        }
        .myinfo-function-list p{
            color: black;
            padding-left: 5px;
        }

        .myinfo-function-list span{

            font-size: 16px;
            margin-top: 0px;
            color: #80808075;

            text-align: center;
        }


        .myinfo-center{
            text-align: center;
        }
        .myinfo-functionlist-img{
            width: 22px;
            height: 22px;
            margin-top: -6px;
        }
        .myinfo-base-contect{
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        /*签到*/
        .dailycheck-dialog{
            margin: 30px;
        }
        .dailycheck-header h1{
            text-align: center;
            font-size: 18px;
            color: black;
        }
        .dailycheck-item-list{
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: space-around;
        }
        .dailycheck-item{
            display: flex;
            flex-direction:column;
            align-items: center;
            justify-content: center;

            padding: 8px 10px;
            margin: 10px 10px;
            border: 1px dashed gray;
            position: relative;
        }
        .dailycheck-item-content{
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .dailycheck-item p{
            text-align: center;
            font-size: 16px;
            margin-bottom: 8px;
        }
        .dailycheck-item-img{
            width: 22px;
            height: 20px;
        }
        .dailycheck-item-coin{
            font-size: 16px;
            color: #9664D5;
            line-height: 20px;
            text-align: center;

        }
        .dailycheck-item-last{
            width: 100%;
        }
        .dailycheck-item-btn{
            width: 100%;
            background-color:#9664D5;
            color: white;
            margin: 10px 10px;
            padding: 8px;
            font-size: 16px;
            border-radius: 4px;
        }
        .dailycheck-item-hide{
            display: none;
            position: absolute;
            width: 100%;
            height: 100%;
            background: url(/static/images/edit_icon_selected.png)  no-repeat;
            background-color: rgba(0,0,0,0.7);
            background-position: center;
            background-size: 24px 24px;
            left: 0;
            top: 0;
            z-index: 100000;


        }
        .dailycheck-item-info{
            text-align: left;
            color: gray;
            margin-top: 10px;
        }

        .function-border-none{
            border-bottom: none;
        }
        .myinfo-base-contect-user{
            position: relative;
        }
        .huiyuan-icon{
            position:absolute;
            background: url(/static/images/hg_icon.png)  no-repeat;
            background-position: center;
            background-size:30px 30px;
            top: -14px;
            left:-6px;
            z-index: 1000;
            width: 30px;
            height: 30px;
            display: none;
        }
        .huiyuan{
            border: 2px solid rgb(240,100,100);
        }
        .myinfo-isvip{
            display: none;
            font-size: 16px;
            padding: 3px 0px;
        }
    </style>
@endsection

