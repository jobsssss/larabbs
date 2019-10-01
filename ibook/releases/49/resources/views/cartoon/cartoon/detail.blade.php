@extends('cartoon.partials._layout')
@section('title'){{$info->title}}-@parent @endsection
@section('keyword'){{$info->title}}-@parent @endsection
@section('description'){{$info->intro}}-@parent @endsection
@section('content')
    <div class="mycontainer detail-header-new">

        <div class="detail-left-new ">

            <div class="detail-back-new">
                <a href="javascript:window.history.back()" class=" detail-new-a">
                    <img class="global-back-icon detail-back-padd" alt=""
                         src="{{asset('static/images/nav_ic_img_back_new.png')}}">
                </a>
            </div>
            <div class="detail-home-new">
                <a href="{{url('/')}}" class=" detail-new-a">
                    <img class="global-back-icon " alt=""
                         src="{{asset('static/images/nav_ic_img_home_new.png')}}">
                </a>
            </div>

            <div class="detail-book-info-new">

                <div class="detail-book-cover">
                    <img class="book-cover-new" alt="" src="{{$info->cover}}">
                </div>

                <div class="detail-book-other">
                    <div class="detail-book-other-item detail-book-bookName">
                        <h2 id="bookd" class="detail-book-other-bookName-h2" data-bookid="79">{{$info->title}}</h2>
                    </div>
                    <div class="detail-book-other-item detail-book-hit">
                        <p>热度：<span style="color: #9664D5">{{$info->hot}}ºC</span></p>
                    </div>

                    <div class="detail-book-other-item detail-book-author">
                        <p>作者：{{$info->author}}</p>
                    </div>

                    <div class="detail-book-other-item detail-book-summary">
                        <p><span style="color: #555">内容简介：</span>{{$info->intro}}
                        </p>
                    </div>

                    <div class="detail-line">

                    </div>

                    <div class="detail-book-other-item detail-book-keyword">
                        <p>分类：{{$info->tags}}</p>
                    </div>

                    <div class="detail-book-other-item detail-book-startread-new ">

                        <a href="javascript:doCollect();" class="detail-book-other-item-btn"> 收藏</a>
                    </div>

                </div>

                <div class="detail-book-info-bg" style="background-image: url({{$info->cover}})"></div>
                </div>

            <div class="detail-book-chapters-new">
                <div class="detail-chapters-header-new">
                    <div class="detail-chapters-header-left-new">
                        <h2 class="detail-chapters-header-title">章节目录</h2>

                        {{--<p class="detail-chapters-header-font">状态:<span style="color: #9664D5">每周一 18:00</span></p>--}}

                    </div>

                    <a href="javascript:void(0);" class="detail-chapters-header-font detail-sort-new">正序</a>
                </div>

                <div class="detail-chapters-list">
                    @foreach($chapters as $chapter)
                        <a href="{{route('chapter.index',['cartoon_id' => $info->id,'chapter_id' => $chapter->id])}}" class="detail-chapters-list-item">
                            <span class="detail-chapters-list-item-left">
                                <span class="detail-chapters-list-item-bookName">{{$chapter->name}}</span>
                                <span class="detail-chapters-list-item-date">更新时间：{{$chapter->updated_at->format('Y-m-d')}}</span>
                            </span>
                            @if($chapter->price > 0)
                                <span><img class="un-lock" alt="" src="{{asset('static/images/lock.png')}}"></span>
                            @else
                                <span class="">免费</span>
                            @endif
                        </a>
                    @endforeach
                </div>

            </div>

        </div>


        <div ng-app="app" ng-controller="detailCtl" class="detail-right-new  ng-scope">
            <div class="detail-right-newupdate">
                <div class="detail-right-item-header">
                    <h2>今日更新</h2>
                </div>
                <div class="detail-right-item-list" style="display: block;">
                    <!-- ngRepeat:  x in books  -->
                    @foreach($todayUpdatedCartoons as $v)
                        <a ng-repeat=" x in books " class="detail-right-item-list-item ng-scope" href="{{route('cartoon.detail',['id' => $v->id])}}">
                            <span class="detail-right-item-list-item-no-p ng-binding">{{$loop->iteration}}</span>
                            <span class="detail-right-item-list-item-name ng-binding">{{$v->title}}</span>
                            <span class="detail-right-item-list-item-arrow"></span>
                        </a>
                    @endforeach
                </div>
                <div class="detail-right-item-footer detail-right-item-footer-update">
                    <a href="{{url('cartoons')}}?cat=今日更新" class="ng-binding">查看更多&gt;&gt;</a>
                </div>

            </div>
            <div class="detail-right-similar">
                <div class="detail-right-item-header">
                    <h2>类似推荐</h2>
                </div>
                <div class="detail-right-similar-list">
                    @foreach($recommends as $v)
                        <a href="{{route('cartoon.detail',['id' => $v->id])}}" class="detail-right-similar-list-item">
                        <span class="detail-right-similar-list-item-cover">
                            <img class="img-placeholder book-cover-new" alt="化龙记封面图片" src="{{\helpers\img_url($v->cover)}}">
                        </span>
                            <span class="detail-right-similar-list-item-info">
                            <span class="detail-right-similar-list-item-info-name">{{$v->title}}</span>
                            <span class="detail-right-similar-list-item-info-keyword">标签：{{$v->tags}}</span>
                            <span class="detail-right-similar-list-item-info-summary">作者：{{$v->author}}</span>
                        </span>
                        </a>
                    @endforeach
                </div>


            </div>
            <div class="detail-right-ad hide">
                <div class="detail-right-item-header ">
                    <h2>广告</h2>
                </div>
            </div>
        </div>
    </div>


@endsection

@section('scripts')
    <script>
        var isLogin = "{{Auth::check()}}";
        var sortFlag = true;
        $(function () {


            //checkLogin();
            init();
            initToastr();

        })

        function init() {
            //日期格式转化
            // $('.detail-chapters-list-item-date').each(function () {
            //     var dateStr = parseInt($(this).text()) * 1000;
            //     var date = dateFtt('yyyy-MM-dd', new Date(dateStr));
            //     $(this).text("更新时间：" + date);
            // })

            //加载今日更新数据

            //initUpdateData();

            $('.detail-sort-new').click(function () {
                if (sortFlag) {
                    //flex-flow: wrap-reverse;flex-direction: row-reverse;
                    $('.detail-chapters-list').css({
                        'flex-flow': 'wrap-reverse',
                        'flex-direction': 'row-reverse',
                    })
                    $('.detail-sort-new').text('反序');
                    sortFlag = false;
                } else {
                    $('.detail-chapters-list').css({
                        'flex-flow': 'wrap',
                        'flex-direction': 'row',
                    })
                    $('.detail-sort-new').text('正序');
                    sortFlag = true;
                }

            })


        }

        function doCollect() {

            //var token = localStorage.getItem("blcomics_token");
            if (isLogin) {
                $.ajax({
                    url: '{{route('collect.create')}}',
                    type: 'post',
                    //data: {'token': token, 'bookId': $('#bookd').data('bookid')},
                    data: {'bookId': $('#bookd').data('bookid')},
                    success: function (result) {
                        if (result.code == '200') {
                            toastr.info(result.msg);

                        } else {
                            toastr.info(result.msg);
                        }
                    }
                })
            } else {
                toastr.info("请先登录");
            }
        }


        //function initUpdateData(){
        //	$.ajax({
        //		url:'/book/get_section',
        //		type:'post',
        //		data:{'sectionId':7,'index':1,'size':6},
        //		success:function(res){
        //			console.log(res);
        //			if (res.code==200) {
        //				if (res.data.books.length>0) {
        //					generatorUpdate(res.data.books);
        //				}else{
        //					$('.detail-right-item-footer-update a').text('暂无数据')
        //				}
        //			}
        //		}
        //
        //	})
        //}

        //function generatorUpdate(books){
        //	var updateStr='<a href="/book/webBookDetail/t_bookId" class="detail-right-item-list-item"><span class="detail-right-item-list-item-no-p">t_index</span><span class="detail-right-item-list-item-name">t_bookName</span><span class="detail-right-item-list-item-arrow"></span></a>';
        //	var temps="";
        //	var j=1;
        //	for(var i in books){
        //		var temp=updateStr;
        //		temp=temp.replace(/t_bookId/,books[i].id);
        //		temp=temp.replace(/t_index/,j++);
        //		temp=temp.replace(/t_bookName/,books[i].bookName);
        //		temps+=temp;
        //	}
        //	$('.detail-right-item-list').append(temps);
        //}
        //
        //function toUpdatToday(){
        //	var text=$('.detail-right-item-footer-update a').text();
        //	if(text!='暂无数据'){
        //		window.location.href="/books.html?sectionId=7&sectionName=今日更新";
        //	}
        //}


    </script>
@endsection

@section('styles')
    <style>

        .detail-header-new {
            display: flex;
            justify-content: space-between;

        }

        /*80 60 18*/
        .detail-left-new {
            width: 58vw;
            position: relative;
        }

        .detail-right-new {
            width: 18vw;
            min-height: 300px;
        }

        .detail-back-new {

            width: 50px;
            height: 50px;
            position: absolute;
            top: 0;
            left: 0px;
            z-index: 999999;
        }

        .detail-home-new {
            width: 50px;
            height: 50px;
            position: absolute;
            top: 0px;
            right: 0px;
            z-index: 999999;
        }

        .detail-new-a {
            width: 100%;
            height: 100%;
            display: block;
            padding: 10px;;

        }

        .global-back-icon {
            width: 100%;
            height: 100%;
            object-fit: cover;
            padding: 5px;
            background-color: rgba(0, 0, 0, 0.3);
            border-radius: 15px;
        }

        .detail-back-padd {
            padding-left: 8px;
        }

        .detail-book-info-new {
            width: 100%;
            /* 	height: 52vh; */
            display: flex;
            justify-content: flex-start;
            align-items: center;
            padding-left: 55px;
            padding-top: 50px;
            padding-bottom: 25px;
            box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
            background-size: 100%;
            background-repeat: no-repeat;
            overflow: hidden;
            position: relative;


        }

        .detail-book-info-bg {
            -webkit-filter: blur(9px);
            filter: blur(40px);
            position: absolute;
            width: 100%;
            height: 100%;
            z-index: -100;
            top: 0px;
            left: 0px;
            background-repeat: no-repeat;
            background-size: 100%;
        }

        .detail-book-chapters-new {
            margin-top: 15px;
            width: 100%;
            background-color: white;
            box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
        }

        .detail-right-ad {
            margin-top: 15px;
            height: 200px;
            width: 100%;
            background-color: white;
            box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
        }

        .detail-book-cover {
            width: 14vw;
            height: 19.6vw;
            box-shadow: #333 0px 0px 10px;
        }

        .detail-book-other {
            width: 38vw;

            padding: 10px 0px;
            margin-left: 15px;
            display: flex;
            flex-wrap: wrap;
            flex-flow: column;
            justify-content: flex-start;
            text-shadow: 1px 1px 1px white;
            padding-right: 15px;
        }

        .detail-book-other-item {
            display: inline-block;

        }

        .detail-book-other-bookName {
            width: 100%;
            height: auto;
        }

        .detail-book-other-bookName-h2 {

            font-size: 20px;
            color: #333;

        }

        .detail-book-hit {
            margin-top: 8px;
            color: #555;
            font-size: 14px;
        }

        .detail-book-author {
            margin-top: 20px;
            color: #555;
            font-size: 14px;
        }

        .detail-book-summary {
            margin-top: 8px;
            color: #777;
            font-size: 14px;
            width: 80%;
        }

        .detail-line {
            height: 1px;
            background-color: rgba(121, 121, 121, 0.5);
            margin-top: 30px;
            margin-bottom: 15px;
            border-radius: 1px;
        }

        .detail-book-keyword {
            color: #555;
            font-size: 14px;
        }

        .detail-book-startread-new {
            margin-top: 25px;
        }

        .detail-book-other-item-btn {
            font-size: 14px;
            color: white;
            background-color: #9664D5;
            padding: 8px 12px;
            border-radius: 8px;

        }

        .detail-book-other-item-btn:hover {
            color: white;
        }

        .detail-right-newupdate {
            box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
        }

        .detail-right-item-header {
            background-color: #9664D5;
            color: white;
            font-size: 24px;
            text-align: center;
            padding-top: 10px;
            padding-bottom: 10px;
        }

        .detail-right-item-footer {
            color: #777;
            font-size: 16px;
            text-align: center;
            padding-top: 12px;
            padding-bottom: 12px;
            background-color: white;
        }

        .detail-right-item-list {
            display: none;
        }

        .detail-right-item-list-item {
            width: 100%;
            display: flex;
            justify-content: flex-start;
            align-items: center;
            height: 50px;
            padding-left: 10px;
            padding-right: 10px;
            border-bottom: 0.5px solid #eee;
            background-color: white;

        }

        .detail-right-item-list-item:hover {
            background-color: #ddd;
        }

        .detail-right-item-list-item-no-p {
            background-color: #9664D5;
            color: white;
            font-size: 12px;
            text-align: center;
            width: 16px;
            height: 16px;

        }

        .detail-right-item-list-item-name {
            font-size: 16px;
            color: #555;
            width: 80%;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
            margin-left: 15px;

        }

        .detail-right-item-list-item-arrow {
            width: 30px;
            height: 30px;
            background: url(/static/images/nav_icon_front.png) 0px 0px;
            background-size: 100%;
        }

        .detail-chapters-header-new {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 15px 0px;
            background-color: #FAFCFC;
        }

        .detail-chapters-header-left-new {
            display: flex;
            align-items: center;
            justify-content: flex-start;

        }

        .detail-chapters-header-title {
            font-size: 20px;
            color: #555;
            padding-right: 15px;
            padding-left: 15px;
            border-right: 0.5px solid #eee;
        }

        .detail-chapters-header-font {
            font-size: 16px;
            color: #555;
            padding-right: 15px;
            padding-left: 15px;
            padding-bottom: 4px;
            padding-top: 4px;
            /* border-right: 0.5px solid #eee; */
        }

        .detail-chapters-list {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: space-around;
            padding: 15px;


        }

        .detail-chapters-list-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 45%;
            padding-bottom: 12px;
            padding-top: 12px;
            border-bottom: 0.5px solid #eee;

            font-size: 14px;
        }

        /* .detail-chapters-list-item:hover{
            background-color: #eee;

        } */
        .detail-chapters-list-item-left {
            display: flex;
            justify-content: flex-start;
            flex-direction: column;
            width: 80%;

        }

        .detail-chapters-list-item-bookName {
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
            padding-bottom: 8px;
        }

        .detail-chapters-list-item-date {
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
            text-align: left;
            color: #777;
            font-size: 12px
        }

        .un-lock {
            width: 18px;
            height: 22px;
        }

        .detail-right-similar {
            margin-top: 15px;
        }

        .detail-right-similar-list {
            background-color: white;
            display: flex;
            justify-content: space-around;
            align-items: center;
            flex-direction: column;

        }

        .detail-right-similar-list-item {

            position: relative;
            padding: 4px;
            border-bottom: 1px solid #eee;
            display: flex;
            justify-content: flex-start;
            width: 100%;


        }

        .detail-right-similar-list-item-cover {
            width: 5vw;
            height: 7vw;
            background-color: #eee;
            display: block;

        }

        .detail-right-similar-list-item-info {
            display: flex;
            align-content: center;
            flex-direction: column;
            padding-left: 16px;
            width: 70%;

        }

        .detail-right-similar-list-item-info span {
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
            width: 100%;
        }

        .detail-right-similar-list-item-info-name {
            font-size: 16px;
            color: #333;
            padding: 4px 0px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .detail-right-similar-list-item-info-keyword {
            font-size: 12px;
            color: #777;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
            width: 100%;
        }

        .detail-right-similar-list-item-info-summary {
            font-size: 12px;
            color: #777;
            padding-top: 4px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
            width: 100%;
        }

        .detail-right-similar-list-item-other-name {
            font-size: 16px;
            color: white;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
            text-align: left;
            position: absolute;
            bottom: 4px;
            padding-left: 8px;
            text-shadow: 1px 1px 1px #555;


        }

        .detail-right-similar-list-item-other-summary {
            padding: 4px;
            font-size: 12px;
            color: #777;
            width: 100%;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
            text-align: left;
        }

        .detail-right-similar-md {
            display: none;
        }


        @media (max-width: 868px) {
            .detail-book-summary {
                display: none;
            }


        }


        @media (max-width: 768px) {
            .detail-left-new {
                width: 100vw;
            }

            .detail-right-new {
                display: none;
            }

            .detail-book-cover {
                width: 30vw;
                height: 42vw;
                box-shadow: #333 0px 0px 10px;
            }


        }

        @media (max-width: 568px) {
            .detail-left-new {
                width: 100vw;
            }

            .detail-right-new {
                display: none;
            }

            .detail-book-info-new {
                width: 100%;
            }

            .detail-book-info-new {
                width: 100%;
                /* height: 52vh; */
                display: flex;
                justify-content: flex-start;
                align-items: center;
                padding-left: 40px;
                padding-top: 50px;
                padding-bottom: 8px;

            }

            .detail-book-cover {
                width: 40vw;
                height: 48vw;
                box-shadow: #333 0px 0px 10px;
            }

            .detail-book-summary {
                display: none;
            }

            .detail-book-other {
                width: 60vw;
                padding: 10px 0px;
                margin-left: 3vw;
                display: flex;
                flex-wrap: wrap;
                flex-flow: column;
                justify-content: flex-start;
            }

            .detail-line {
                margin-top: 12px;
                height: 1px;
                margin-right: 3vw;
                margin-bottom: 12px;
            }

            .detail-book-author {
                margin-top: 10px;
            }

            .detail-chapters-list-item {
                width: 100%;
                padding-bottom: 8px;
                padding-top: 8px;
                font-size: 15px;
                padding-left: 0px;
                padding-right: 0px;
            }

            .detail-book-keyword p {
                width: 90%;
                overflow: hidden;
                text-overflow: ellipsis;
                white-space: nowrap;

            }

            .detail-book-other-item-btn {
                font-size: 14px;
            }

            .detail-book-startread-new {
                margin-top: 15px;
            }

            .detail-book-chapters-new {
                margin-top: 8px;
            }

            .detail-book-other-bookName-h2 {
                width: 100%;
                overflow: hidden;
                text-overflow: ellipsis;
                white-space: nowrap;
                font-size: 18px;
            }

            .detail-chapters-list-item-date {
            }

            .detail-right-similar {
                margin-top: 8px;
                padding-bottom: 8px;
                background-color: white;
            }

            .detail-right-similar-list {
                flex-wrap: wrap;
                flex-direction: row;

            }

            .detail-right-similar-list-item {
                padding: 4px 0px;
                width: 32vw;
                display: block;
            }

            .detail-right-similar-list-item-cover {
                width: 32vw;
                height: 44.8vw;
                background-color: #eee;
                display: block;
                border-radius: 4px;
                display: block;
                overflow: hidden;

            }

            .detail-right-similar-list-item-info-name {
                position: absolute;
                color: white;
                text-shadow: 1px 1px #333;
                bottom: 4px;
                left: 4px;
                width: 95%;
            }

            .detail-right-similar-md {
                display: block;
            }

            .detail-chapters-header-title {
                font-size: 18px;
                padding-left: 8px;
                padding-right: 8px;
            }

            .detail-book-keyword {
                font-size: 13px;
            }

            .detail-chapters-header-title {

                padding-right: 8px;
                padding-left: 15px;
            }

            .detail-chapters-header-font {
                padding-right: 15px;
                padding-left: 8px;
                /* border-right: 0.5px solid #eee; */
            }

        }
    </style>
@endsection

