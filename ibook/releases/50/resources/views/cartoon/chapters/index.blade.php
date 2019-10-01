@extends('cartoon.partials._layout')
@section('title'){{$chapter->name ?? ''}}-{{$cartoon->title ?? ''}}- @parent @endsection
@section('keyword'){{$chapter->name ?? ''}}- @parent @endsection
@section('description'){{$cartoon->intro ?? ''}}- @parent @endsection
@section('content')
    <div class="mycontainer-full">
        <div class="page-bar-new page-topbar-new">
            <div class="page-bar-wrap page-topbar-wrap page-topbar-wrap-padd">
                <div class="page-topbar-wrap-letf">
                    <a href="javascript:window.history.back()" class="global-back page-topbar-wrap-letf-back">
                        <img class="global-img-p" alt="" src="{{asset('static/images/nav_ic_img_back_new.png')}}">
                    </a>
                </div>
                <div class="page-topbar-wrap-mid">
                    <h1>{{$chapter->name ?? ''}}</h1>
                </div>
                <div class="page-topbar-wrap-right">

                </div>
            </div>
        </div>
        <div class="page-img-list">
            @foreach($contents as $content)
                <div class="nav-chapter-new">
                    <img class="lazy chapter-img-new img-placeholder" width="100%" data-original="{{$content->image}}">
                </div>
            @endforeach
        </div>
        <div class="page-last-next">

            <a href="{{route('chapter.index',['cartoon_id' => $cartoon->id,'chapter_id' => $next->id ?? 0])}}"  class="page-last-next-btn" >
                <span>下一章</span>
            </a>


        </div>
        <div class="page-similar-new">
            <h2 class="page-similar-header-new">类似推荐</h2>
            <div class="page-similar-list-new">
                @foreach($recommends as $recommend)
                    <a href="{{route('cartoon.detail',['id' => $recommend->id])}}" class="page-similar-list-item-new">
                        <img class="global-img-p img-placeholder" alt="" src="{{$recommend->cover}}">
                        <span class="hide">{{$recommend->title}}</span>
                        <span class="hide">作者:{{$recommend->author}}</span>
                        <span class="hide">简介:{{$recommend->intro}}</span>
                        {{--<span class="hide">更新到:13话</span>--}}
                    </a>
                @endforeach
            </div>
        </div>

        <div class="page-bar-new page-bottombar-new">
            <div class="page-bar-wrap">
                <a href="{{url('/')}}" class="page-bar-wrap-bottom-item">
                    <img class="global-img-p" alt="" src="{{asset('static/images/nav_ic_img_home_new.png')}}">
                </a>

                <a href="{{route('cartoon.detail',['id' => $cartoon->id ?? 0])}}" class="page-bar-wrap-bottom-item">
                    <img class="global-img-p" alt="" src="{{asset('static/images/nav_ic_img_list_new.png')}}">

                </a>

                @if(isset($prev))
                    <a href="{{route('chapter.index',['cartoon_id' => $cartoon->id ?? 0,'chapter_id' => $prev->id ?? 0])}}" class="page-bar-wrap-bottom-item">
                        <img class="global-img-p" alt="" src="{{asset('static/images/nav_ic_img_back_new.png')}}">
                    </a>
                @else
                    <a href="javascript:showToastr('已经是第一章')" class="page-bar-wrap-bottom-item">
                        <img class="global-img-p" alt="" src="{{asset('static/images/nav_ic_img_back_new.png')}}">
                    </a>
                @endif

                @if(isset($next))
                    <a href="{{route('chapter.index',['cartoon_id' => $cartoon->id,'chapter_id' => $next->id ?? 0])}}" class="page-bar-wrap-bottom-item">
                        <img class="global-img-p" alt="" src="{{asset('static/images/nav_ic_img_next_new.png')}}">

                    </a>
                @else
                    <a href="javascript:showToastr('已经是第一章')" class="page-bar-wrap-bottom-item">
                        <img class="global-img-p" alt="" src="{{asset('static/images/nav_ic_img_next_new.png')}}">

                    </a>
                @endif






            </div>
        </div>

    </div>
    <div class="hide">
        <span id="chapter-params" data-chapterid="{{$chapter->id ?? 0}}" data-bookid="{{$cartoon->id ?? 0}}" data-chapterindex="{{$chapter->order ?? 0}}" data-alert="true"></span>
    </div>
    {{--<div class="float-app-download">--}}
        {{--<a href="/page/app_down.html" class="float-app-download-link">--}}
            {{--<span class="float-app-download-cover"><img class="global-img-p" alt="" src="http://47.97.112.180/static/images/app_icon.png"></span>--}}
            {{--<span class="float-app-download-info">下载APP</span>--}}
        {{--</a>--}}
    {{--</div>--}}


    <!-- 提示登录 -->
    <div id="login-modal" class="modal fade">
        <div class="modal-dialog login-modal-position">
            <div class="modal-content">
                <div class="modal-body">
                    <h1 class="login-modal-header">未完待续</h1>
                    <p class="login-modal-tip">登录后可继续阅读</p>
                    <div>
                        <a href="{{route('login')}}" class="login-modal-btn">登录</a>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div id="pay-modal" class="modal fade ">
        <div class="modal-dialog pay-modal-poition">
            <div class="modal-content pay-modal-poition">
                <div class=" modal-body pay-modal-body">
                    <div class="pay-modal-body-header">
                        <h1>未完待续</h1>
                        <p>购买后可继续阅读</p>
                    </div>
                    <div class="pay-modal-body-h2">
                        <div class="pay-modal-body-h2-block"></div>
                        <h2>购买此章节</h2>
                    </div>
                    <div class="pay-modal-body-info">

                        <div class="pay-modal-body-info-left">
                            <span class="pay-modal-body-info-left-tip">收费</span>
                            <img class="pay-modal-body-info-left-icon" alt="" src="http://47.97.112.180/static/images/book_coin.png">
                            <span class="pay-modal-body-info-left-cost">0</span>
                        </div>


                    </div>

                    <div class="pay-modal-body-bottom">
                        <div class="pay-modal-body-bottom-left">
                            <span class="pay-modal-body-bottom-autoby">漫画币余额：</span>
                            <span class="pay-modal-body-bottom-remain"></span>
                        </div>
                        <label id='autocheck'>
                            <input id="pay-modal-auto-input"  type="checkbox" name="autobuy" value="1" checked> <span class="pay-modal-body-bottom-autoby" >自动购买下一章</span>
                        </label>
                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>


        var bookId=-1;
        var chapterIndex=-1;
        var chapterId=-1;
        var toopShowFlag=true;
        var isLogin = "{{Auth::check()}}";
        var needLogin = "{{$chapter->need_login}}";
        $(function() {
            mask();
            //checkLogin();
            if (needLogin == 1 && !isLogin) {
                //$('#login-modal').modal('show');
                $('#login-modal').modal({show:true,backdrop:'static'});
            }
            initParams();
            $("img.lazy").lazyload({
                threshold :800
            });
            init();
            setTimeout(function() {
                $('.chapter-img-new').css({
                    'width':'100%',
                    'height':'100%',
                })
                unmask();
            }, 1000);
            setTimeout(function() {
                $(window).scroll(function () {
                    if ($('.page-bar-new').css("display")!='none'&&$('#pay-modal').css('display')=='none') {
                        $('.page-bar-new').fadeOut('slow');
                    }

                })
            }, 1500);

        })
        function init(){

            //导航栏动画
            $('.page-img-list').click(function() {
                $('.page-bar-new').fadeToggle("slow");

            })

            //提示信息
            initToastr();

            //提示登录modal
            $('#login-modal').modal({
                backdrop: 'static',
                keyboard: false,
                show:false
            });
            //
            $('#pay-modal').modal({
                backdrop: 'static',
                keyboard: false,
                show:false
            });



            chargeAlertHandler();


        }

        function chargeAlertHandler(){
            if($('#chapter-params').data('alert')){
                recordMark();
            }else{
                if(!localStorage.getItem("blcomics_token")){
                    $('#login-modal').modal('show')
                }else{
                    $('#pay-modal').modal('show');

                    setInterval(function() {
                        $('.page-bar-new').show();
                    }, 1000);
                }
                stopBodyScoll();

            }
        }

        function doBuy(){
            token=localStorage.getItem("blcomics_token");
            if($("input[type='checkbox']").is(':checked')){
                $.ajax({
                    url:"/book/charge_alerted",
                    type:'post',
                    async:false,
                    cache:false,
                    data:{"bookId":bookId,'token':token}
                })
            }else{
                //删除自动购买
                $.ajax({
                    url:"/book/remove_alerted",
                    type:'post',
                    data:{"bookId":bookId,'token':token}
                })
            }
            window.history.replaceState({page: 3}, 'title 3', '/page/get/'+bookId+'/'+chapterIndex+'/true');
            window.location.reload();
        }
        function doRecharge(){
            window.location.href="/charge.html";
        }

        //初始化参数
        function initParams(){
            bookId=$('#chapter-params').data('bookid');
            chapterIndex=$('#chapter-params').data('chapterindex');
            chapterId=$('#chapter-params').data('chapterid');
        }


        function showToastr(msg){
            toastr.info(msg);
        }

        function recordMark(){
            token=localStorage.getItem("blcomics_token");
            if(token){
                $.ajax({
                    url:'/bookmark/create',
                    type:'post',
                    async:false,
                    cache:false,
                    data:{'token':token,'bookId':bookId,'chapterId':chapterId,'percent':0},
                    success:function(result){
                        if(result.code=='200'){

                        }
                    }
                })
            }
        }

    </script>
@endsection

@section('styles')
    <style>
        body{
            background-color: rgba(0,0,0,0.7)
        }
        a:hover{
            color: white;
        }
        .img-placeholder {
            background: rgba(0,0,0,0.7) url(http://47.97.112.180/static/images/ico_placeholder_new.png) 50% 50% no-repeat;
            background-size: 30% auto;
        }
        .mycontainer-full{
            width: 100vw;

        }

        .page-img-list{


        }

        .nav-chapter-new{
            width: 60vw;
            margin-left: auto;
            margin-right: auto;
            height: auto;
        }
        .chapter-img-new{
            object-fit:cover;
            margin: auto;
        }
        .page-bar-new{
            height: 60px;
            background-color: rgba(0,0,0,0.7);
            position: fixed;
            left: 0;
            width: 100%;
        }


        .page-topbar-new{
            top:0;
            z-index: 999999;
        }
        .page-bottombar-new{
            bottom:0;
            z-index: 999

        }
        .global-back{
            width: 50px;
            height: 50px;
            display: block;
            padding: 10px;
        }
        .page-bar-wrap{
            width: 70vw;
            margin-left:auto;
            margin-right:auto;
            height: 100%;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .page-topbar-wrap-letf{
            display: flex;
            justify-content: flex-start;
            align-items: center;
            width: 20%;
        }
        .page-topbar-wrap-right{
            width: 20%;
            height: 100%;
        }
        .page-topbar-wrap-mid{
            width: 60%;
            height: 100%;
            display: flex;
            align-items: center;

        }
        .page-topbar-wrap-mid h1{

            overflow: hidden;
            text-overflow:ellipsis;
            white-space: nowrap;
            font-size: 16px;
            color: white;
            text-align: center;
            width: 100%;



        }
        .page-bar-wrap-bottom-item{

            width: 50px;
            height: 50px;
            display: block;
            padding: 10px 10px;
        }
        .page-bar-wrap-bottom-item-home{
            width: 40px;
            height: 40px;
            padding: 2px 2px;
            background-color: #eee;
            border-radius: 20px;

        }
        .page-last-next{
            width: 60vw;
            margin-left: auto;
            margin-right: auto;
            height: 50px;
            background-color: #9664D5;
            color: white;

        }
        .page-last-next-btn{
            width: 100%;
            height: 100%;
            color: white;
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;

        }
        .page-last-next-btn:hover{
            color: white;

        }
        .page-similar-new{
            width: 60vw;
            margin-left: auto;
            margin-right: auto;
            background-color: #666;

        }

        .page-similar-header-new{
            font-size: 16px;
            color: white;
            padding: 16px 16px;
            display: block;
        }
        .page-similar-list-new{
            display: flex;
            justify-content: space-around;
            align-items: center;
            flex-flow: wrap;
        }
        .page-similar-list-item-new{
            width: 18vw;
            height: 25.2vw;
            display: block;
            overflow: hidden;
            border-radius: 8px;
            margin-bottom: 16px;
        }
        .float-app-download{
            width: 10vw;
            position: fixed;
            top:50%;
            right: 0px;
            background-color: #eee;
            border-radius: 25px 0px 0px 25px;


        }
        .float-app-download-link{
            width: 100%;
            display: flex;
            align-content: center;
        }
        .float-app-download-cover{
            width: 50px;
            height: 50px;
            padding: 4px;
            background-color: white;
            border-radius: 25px;
            margin-right: 4px;
        }
        .float-app-download-info{
            padding-top: 17px;
            font-size: 16px;
            color: #555;
        }
        .login-modal-position{

            margin-top: 30vh;
        }

        .login-modal-header{
            text-align: center;
            font-size: 16px;
            color: #333;
            padding: 8px;
        }
        .login-modal-tip{
            text-align: center;
            font-size: 14px;
            color: #777;
            padding: 8px;
        }
        .login-modal-btn{
            width: 200px;
            padding: 10px;
            font-size: 16px;
            color: white;
            margin: 0 auto;
            text-align: center;
            background-color: #9664D5;
            display: block;
            border-radius: 8px;
            margin-top: 8px;
        }
        .pay-modal-body{

            padding: 15px 0px 0px 0px;
        }
        .pay-modal-body-header{

            padding-bottom: 4px;
            border-bottom: 0.5px solid #eee;
        }
        .pay-modal-body-h2{
            display: flex;
            justify-content: flex-start;
            align-items: center;
            padding-bottom: 16px;
            padding-top: 16px;
            border-bottom: 0.5px solid #eee;
        }
        .pay-modal-body-h2 h2{
            font-size: 18px;
            color: #333;
        }
        .pay-modal-body-h2-block{
            height: 22px;
            width: 8px;
            background-color: #9664D5;
            margin-right: 8px;
        }
        .pay-modal-body-header h1{

            font-size: 18px;
            color: #333;
            text-align: center;
            padding: 8px;
        }
        .pay-modal-body-header p{
            font-size: 14px;
            color: #777;
            text-align: center;
            padding: 4px;
        }
        .pay-modal-poition{
            margin-top: 35vh
        }
        .pay-modal-body-info{
            display: flex;
            padding: 16px 16px;
            justify-content: space-between;
            align-items: center;
            border-bottom: 0.5px solid #eee;

        }
        .pay-modal-body-info-left-icon{
            width: 16px;
            height: 16px;
            margin-bottom: 3px;
            margin-left: 5px;
        }
        .pay-modal-body-info-left-tip{
            font-size: 14px;
            color: #555;
        }
        .pay-modal-body-info-left-cost{
            font-size: 16px;
            color: #555;
            margin-left: 5px;
        }
        .pay-modal-body-dobuy{
            background-color: #9664D5;
            color: white;
            padding: 8px 12px;
            font-size: 16px;
            line-height: 1.3333333;
            border-radius: 6px;
        }
        .pay-modal-body-bottom{
            display: flex;
            padding: 8px 16px;
            justify-content: space-between;
            align-items: center;
        }
        .pay-modal-body-bottom-remain{
            font-size: 14px;
            color: #777;
        }
        .pay-modal-body-bottom-autoby{
            font-size: 12px;
            color: #777;
            font-weight: 700;
        }
        label {

            margin-bottom: 0px;
        }
        input[type=checkbox], input[type=radio]{
            margin-top: 0px;
        }



        @media screen and (max-width: 1000px) {
            .float-app-download{
                display: none;
            }

        }

        @media screen and (max-width: 568px) {

            .nav-chapter-new{
                width: 100vw;
                margin-left: auto;
                margin-right: auto;
                height: auto;
            }

            .page-similar-new{
                width: 100vw;
            }

            .page-bar-wrap{
                width: 100vw;
                padding: 0px 12px;
            }
            .page-last-next{
                width: 100vw;

            }
            .float-app-download{
                display: none;
            }
            .page-similar-list-item-new{
                width: 32vw;
                height: 44.8vw;
            }
            .pay-modal-poition{
                margin: 0px;
                position: absolute;
                width: 100%;
                bottom: 0;
                border: none;
                border-radius: 0;

            }
            .page-bar-new{
                height: 50px;
            }
            .page-bar-wrap-bottom-item{
                padding: 12px 12px;
            }
            .global-back{
                padding: 12px;
            }
            .page-topbar-wrap-padd{
                padding: 0px 0px;
            }
        }

    </style>
@endsection

