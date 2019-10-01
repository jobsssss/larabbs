@extends('cartoon.partials._layout')

@section('content')
<!-- section nav 导航栏 -->
<div class="mycontainer ">
    <div class="nav-home-new">
        <div class="nav-home-left-new">
            <a class="nav-home-left-item-new" href="#">
                <img class="nav-home-brand-new" alt="喔喔漫画" src="/static/images/app_icon.png">
            </a>
            <a class="nav-home-left-item-new" href="{{url('cartoons')}}?cat=排行">
                排行
            </a>
            <a class="nav-home-left-item-new" href="{{url('cartoons')}}?cat=连载">
                连载
            </a>

        </div>
        <div class="nav-home-right-new">
            <div  class="nav-home-right-form-new">
                <input id="nav-search-new" type="text" class="form-control"  placeholder="请输入漫画名">
            </div>

            <button class="nav-search-btn-new">
                <span class="glyphicon glyphicon-search "></span>
            </button>

        </div>
    </div>
</div>


<!-- 内容区 -->
<div class="mycontainer ">
    <div class="header-section-new">
        <div class=" header-section-new-body banner-new">
            <div class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators carousel-indicators-active">

                    <li data-target="#carousel-example-generic"></li>

                    <li data-target="#carousel-example-generic"></li>

                    <li data-target="#carousel-example-generic"></li>

                    <li data-target="#carousel-example-generic"></li>

                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner" >
                    @foreach($carousels as  $carousel)
                        <div class="item carousel-inner-active">
                            <a href="{{route('cartoon.detail',['id' => $carousel->id])}}" >
                                {{--<img class="img-placeholder carousel-img-new" src="{{\helpers\img_url($cartoon->cover)}}" alt="{{$cartoon->title}}">--}}
                                <img class="img-placeholder carousel-img-new" src="http://47.99.120.184/8971594e5fef8a1d78e9158c175fa40e" alt="{{$carousel->title}}">
                            </a>
                        </div>
                    @endforeach
                </div>
                <div class="index-cover">

                </div>
            </div>

        </div>
        <div class="header-section-new-body cate-new">
            <div class="cate-item-new">
                <a href="/books.html?sectionId=7&sectionName=今日更新" class="cate-item-new-link" target="_self">
                    <img class="img-placeholder cate-img-new" src="/static/images/update_home.jpg" alt="今日更新">
                </a>
            </div>
            <div class="cate-item-new">
                <a href="/page/activity.jsp" class="cate-item-new-link" target="_self">
                    <img class="img-placeholder cate-img-new" src="/static/images/activity_home.jpg" alt="活动福利">
                </a>
            </div>
            <div class="cate-item-new">
                <a href="/page/app_down.html" class="cate-item-new-link" target="_self">
                    <img class="img-placeholder cate-img-new" src="/static/images/appdown_home.jpg" alt="app下载">
                </a>
            </div>
            <div class="cate-item-new">
                <a href="/page/activity.jsp" class="cate-item-new-link" target="_self">
                    <img class="img-placeholder cate-img-new" src="/static/images/spread_home.jpg" alt="推广">
                </a>
            </div>
        </div>
    </div>

    <div class="header-section-sm-new">

        <a href="javascript:showToastr('尽请期待')" class="header-section-sm-item-new">
            <img class="header-section-sm-img-new" src="/static/images/homepage_activity.png">
        </a>
        <a href="{{url('cartoons')}}?cat=今日更新" class="header-section-sm-item-new">
            <img class="header-section-sm-img-new" alt="" src="/static/images/homepage_ranking.1.0.png">
        </a>

    </div>
</div>


<div class="mycontainer sessions-books">
    @if(!$excellentCartoons->isEmpty())
        <div class="sessions-books-new ">
            <div class="sessions-header-new">
                <div class="sessions-header-title-new">
                    <span class="hide sessions-header-icon-new sessions-header-icon-new-4"></span>
                    <span class="sessions-header-desc-new">精品推荐</span>
                </div>
                <div>
                    <a href="{{url('cartoons')}}?cat=精品推荐" class="sessions-header-more-new">更多</a>
                </div>
            </div>
            <div class="sessions-books-list-new">
                @foreach($excellentCartoons as $v)
                    <div class="sessions-books-list-item-new">
                        <a class="sessions-books-list-item-link-new" href="{{route('cartoon.detail',['id' =>  $v->id])}}">
                            <img class="img-placeholder book-cover-new" alt="{{$v->title}}" src="{{\helpers\img_url($v->cover)}}">
                            <span class="sessions-books-list-item-link-name">{{$v->title}}</span>
                            <span class="hide">{{$v->intro}}</span>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    @endif

    @if(!$freeCartoons->isEmpty())
    <div class="sessions-books-new ">
        <div class="sessions-header-new">
            <div class="sessions-header-title-new">
                <span class="hide sessions-header-icon-new sessions-header-icon-new-6"></span>
                <span class="sessions-header-desc-new">免费漫画</span>
            </div>
            <div>
                <a href="{{url('cartoons')}}?cat=免费漫画" class="sessions-header-more-new">更多</a>
            </div>
        </div>
        <div class="sessions-books-list-new">
            @foreach($freeCartoons as $v)
                <div class="sessions-books-list-item-new">
                    <a class="sessions-books-list-item-link-new" href="{{route('cartoon.detail',['id' =>  $v->id])}}">
                        <img class="img-placeholder book-cover-new" alt="{{$v->title}}" src="{{\helpers\img_url($v->cover)}}">
                        <span class="sessions-books-list-item-link-name">{{$v->title}}</span>
                        <span class="hide">{{$v->intro}}</span>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
    @endif

    @if(!$noFinishedCartoons->isEmpty())
    <div class="sessions-books-new ">
        <div class="sessions-header-new">
            <div class="sessions-header-title-new">
                <span class="hide sessions-header-icon-new sessions-header-icon-new-1"></span>
                <span class="sessions-header-desc-new">连载漫画</span>
            </div>
            <div>
                <a href="{{url('cartoons')}}?cat=连载漫画" class="sessions-header-more-new">更多</a>
            </div>
        </div>

        <div class="sessions-books-list-new">
            @foreach($noFinishedCartoons  as $v)
                <div class="sessions-books-list-item-new">
                    <a class="sessions-books-list-item-link-new" href="{{route('cartoon.detail',['id' =>  $v->id])}}">
                        <img class="img-placeholder book-cover-new" alt="{{$v->title}}" src="{{\helpers\img_url($v->cover)}}">
                        <span class="sessions-books-list-item-link-name">{{$v->title}}</span>
                        <span class="hide">{{$v->intro}}</span>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
    @endif

    @if(!$finishedCartoons->isEmpty())
    <div class="sessions-books-new ">
        <div class="sessions-header-new">
            <div class="sessions-header-title-new">
                <span class="hide sessions-header-icon-new sessions-header-icon-new-2"></span>
                <span class="sessions-header-desc-new">完结漫画</span>
            </div>
            <div>
                <a href="{{url('cartoons')}}?cat=完结漫画" class="sessions-header-more-new">更多</a>
            </div>
        </div>
        <div class="sessions-books-list-new">

            @foreach($finishedCartoons as $v)
                <div class="sessions-books-list-item-new">
                    <a class="sessions-books-list-item-link-new" href="{{route('cartoon.detail',['id' =>  $v->id])}}">
                        <img class="img-placeholder book-cover-new" alt="{{$v->title}}" src="{{\helpers\img_url($v->cover)}}">
                        <span class="sessions-books-list-item-link-name">{{$v->title}}</span>
                        <span class="hide">{{$v->intro}}</span>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
    @endif


</div>


<div class="mycontainer" >
    <div class="end-books-list">
        <div class="sessions-header-new">
            <div class="sessions-header-title-new">
                <span class="hide sessions-header-icon-new sessions-header-icon-end-new "></span>
                <span class="sessions-header-desc-new">漫画排名</span>
            </div>
        </div>

        <div class="end-books-list-items" >
            <div id="end-scrolled-new" class="end-books-list-items-flex">
                @foreach($ranks as $v)
                    <div class="sessions-books-list-item-end-new">
                        <a class="sessions-books-list-item-link-new" href="{{route('cartoon.detail',['id' => $v->id])}}">
                            <img class="img-placeholder book-cover-new" alt="{{$v->title}}" src="{{\helpers\img_url($v->cover)}}">
                            <span class="sessions-books-list-item-link-name">{{$v->title}}</span>
                            <span class="hide">{{$v->intro}}</span>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>

    </div>


    <a class="sm-btn-new" href="{{url('search')}}">
    </a>
    <div class="copyright" style="text-align: center;padding-top: 10px;padding-bottom: 10px;">
        {{--<p class="text-muted">版权©2019&nbsp;&nbsp;</p>--}}
    </div>
</div>
@include('cartoon.partials._footer')
@endsection


@section('scripts')
    <script>
        /*首页脚本*/

        /*全局变量定义*/

        //var app = angular.module('app',[]);
        //app.controller('indexCtl', function($scope,$http) {
        //	 $scope.loadMore=function(){
        //	    	$http({
        //	    		method:'post',
        //		    	url:'/book/get_section',
        //		    	params:{"sectionId":sectionId,"index":pageIndex,"size":pageSize}
        //	    	}).then(function successCallback(res){
        //			    	if (res.data.code==200) {
        //			    		if (res.data.data.books.length>0) {
        //			    			$scope.books.push(res.data.data.books);
        //			    		}
        //					}
        //			    },function errorCallback(res) {
        //			        // 请求失败执行代码
        //			    });
        //	 }
        //
        //});
        //
        //app.directive ('whenScrolled', function () {
        //    return function ( scope, elm, attr ) {
        //
        //        var raw = $(window);
        //        elm.bind ('scroll', function () {
        //            if ( raw.scrollTop + raw.offsetHeight >= raw.scrollHeight ) {
        //            	if(flag==flase){
        //            		flag=true;
        //            		pageIndex+=1;
        //            		scope.$apply (attr.whenScrolled);
        //            	}
        //
        //            }
        //        });
        //    };
        //});

        var pageIndex=1;
        var pageSize=6;
        var sectionId=3;
        var flag=false;
        $(function(){
            checkLogin();
            init();
            $(window).scroll(function () {
                var scrollTop = $(this).scrollTop();
                var docHeight = $(document).height();
                var windowHeight = $(this).height();
                var leftHeight=docHeight-scrollTop-windowHeight;
                if((leftHeight)<(windowHeight*0.4)){
                    if(flag==false){
                        flag=true;
                        pageIndex=pageIndex+1;
                        loadRankingData(sectionId,pageIndex,pageSize);
                    }

                }
            });
            //$('#home-tabbar-img-new').attr('src',"/static/images/tabbar_home_selected.png");
        })

        function init(){
            $("#nav-search-new").autosuggest({
                url: '/search',
                minLength: 1,
                maxNum: 10,
                highlight:true,
                align: 'left',
                menuClass:'searchMenu',
                queryParamName: 'title',
                method: 'post',
                nextStep: function (e) {
                },
                split: ' '
            });

            $(document).click(function(e){
                if($(e.target).attr('id')!='nav-search-new'){
                    $('.searchMenu').hide();
                }
            });
            $('.carousel-inner-active:eq(0)').addClass('active');
            $('.carousel').carousel({
                interval: 4000,

            })

        }


        function loadRankingData(sectionId,pageIndex,pageSize){
            $.ajax({
                url:"/cartoons/get_section",
                data:{"sectionId":sectionId,"page":pageIndex,"size":pageSize},
                type:'get',
                cache:true,
                dataType:'JSON',
                success:function(result){
                    if(result.code!="200"){
                        alert(result.msg);
                    }else{
                        //console.log(result.data.books);
                        if(result.data.books.length>0){
                            createpage(result.data.books);
                        }
                    }
                }

            });
        }

        var baseBook='<div class="sessions-books-list-item-end-new">'+
            '	<a class="sessions-books-list-item-link-new" href="/cartoons/t_bookId">'+
            '		<img class="img-placeholder book-cover-new" alt="t_bookName封面图片" src="t_portraitIcon">'+
            '		<span class="sessions-books-list-item-link-name">t_bookName</span>'+
            '	</a>'+
            '</div>';

        function createpage(data){

            var temps="";
            for(var i in data){
                var temp=baseBook;
                temp=temp.replace(/t_bookId/,data[i].id);
                temp=temp.replace(/t_portraitIcon/,data[i].cover);
                temp=temp.replace(/t_bookName/g,data[i].title);
                temps+=temp;
            }
            $('#end-scrolled-new').append(temps);
            flag=false;

        }
        function formSearch(bookId){

            window.location.href='/book/webBookDetail/'+bookId;
        }
        function showToastr(msg){
            toastr.info(msg);
        }
    </script>
@endsection

@section('styles')
    <style>
        @media (max-width: 980px){
            .mycontainer{
                width: 90vw;
                margin-left: auto;
                margin-right: auto;
                padding-left: 15px;
                padding-right: 15px;

            }
        }

        @media (max-width: 768px){
            .mycontainer{
                width: 90vw;
                margin-left: auto;
                margin-right: auto;
                padding-left: 15px;
                padding-right: 15px;
            }
            .header-section-new-body{
                width: 44vw;
                height: 23.45vw;
            }
            .cate-item-new{
                width: 21vw;
                height: 11.2vw;

            }

        }

        .mycontainer{
            width: 80vw;
            margin-left: auto;
            margin-right: auto;
            padding-left: 15px;
            padding-right: 15px;

        }

        @media (max-width: 568px){
            .mycontainer{
                width: 100vw;
                margin-left: auto;
                margin-right: auto;
                padding-left: 0px;
                padding-right: 0px;
            }

        }


        .nav-home-new{
            width:100%;
            height: 56px;
            background-color: #9664D5;
            display: flex;
            justify-content: space-between;
            clear: both;
            box-shadow: 0 1px 2px rgba(0,0,0,0.1);
            border-radius: 4px;
            margin-bottom: 20px;
        }
        .nav-home-left-new{
            width: 50%;
            display: flex;
            justify-content: flex-start;
            align-items: center;

        }

        .nav-home-brand-new{
            height: 48px;
            width: 48px;
            border-radius: 24px;
            background-color: rgba(0,0,0,0.12);
            margin-left: 8px;
        }

        .nav-home-left-item-new{
            text-align: center;
            font-size: 22px;
            margin-right: 16px;
            color: white;
        }
        .nav-home-left-item-new:hover{
            color: white;
        }

        .nav-home-right-new{

            display: flex;
            justify-content: flex-end;
            align-items: center;
            width: 50%;

        }
        .nav-home-right-form-new{
            width: 56%;
            margin-right: 5px;
        }
        #nav-search-new{



        }
        .nav-search-btn-new{
            width: 40px;
            height: 40px;
            font-size: 24px;
            color: white;
            background-color: #9664D5;
        }

        .home-search-result-item{
            width: 100%;
            padding-top:5px;
            background-color: white;
        }
        .home-search-result-item a{
            display: block;
            padding: 10px 15px;
            font-size: 16px;
            color: black;
        }
        .line{
            background-color: rgba(0,0,0,0.12);
            height: 0.6px;


        }

        /*搜索插件*/
        .list-group{
            position: absolute;
            width: 100%;
        }
        /*4% 80% % 750 400*/
        .header-section-new{
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .header-section-new-body{
            width: 38vw;
            height: 21vw;
        }
        .banner-new{
            display: flex;
            align-items: center;

        }
        .cate-new{
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: center;
        }
        .cate-item-new{
            width: 18vw;
            height: 9.3vw;
            background-color: white;
            padding: 4px;
            border-radius: 2px;

        }
        .cate-item-new:hover{
            /* padding: 0px; */
            /* opacity: 0.7; */
            /* box-shadow: #333 0px 0px 10px; */
            webkit-filter: blur(1px);
            filter: blur(1px);

        }

        .carousel-inner{
            border-radius: 12px;
        }
        .carousel-img-new{
            width: 100%;
            height: 100%;
            object-fit:cover;
            border-radius: 12px;
            background-color: white;
        }
        .carousel-img-new:hover{
            box-shadow: #333 0px 0px 10px;
        }
        .index-cover{
            display: none;
            position: absolute;
            bottom: -8px;
        }

        .cate-img-new{
            width: 100%;
            height: 100%;
            object-fit:cover;
        }
        .header-section-sm-new{
            display: none;
        }
        .sessions-books{
            margin-top: 15px;
        }
        .sessions-header-new{
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 8px 8px;
        }
        .sessions-header-title-new{
            display: flex;
            justify-content: flex-start;
            align-items: center;
        }
        .sessions-header-desc-new{
            font-size: 18px;
            color: #222;
        }
        .sessions-header-icon-new{
            /* background: url(../images/ico_home_new.png) no-repeat -83px -3px; */
            display: inline-block;
            width: 40px;
            height: 40px;
            vertical-align: middle;

        }
        .sessions-header-icon-new-4{
            background: url(/static/images/ico_home_new.png) no-repeat -80px -1px;
        }
        .sessions-header-icon-new-6{
            background: url(/static/images/ico_home_new.png) no-repeat -120px -1px;
        }
        .sessions-header-icon-new-1{
            background: url(/static/images/ico_home_new.png) no-repeat -80px -81px;
        }
        .sessions-header-icon-new-2{
            background: url(/static/images/ico_home_new.png) no-repeat -40px -1px;
        }
        .sessions-header-icon-end-new{
            background: url(/static/images/ico_rank_new.png) no-repeat 4px 0px;
            margin-right: 5px;

        }
        .sessions-header-icon-end-left-new{
            background: url(/static/images/ico_home_new.png) no-repeat -47px -40px;
            cursor: pointer;
        }
        .sessions-header-icon-end-right-new{
            background: url(/static/images/ico_home_new.png) no-repeat -113px -40px;
            cursor: pointer;
        }
        .sessions-header-icon-end-left-new:hover{
            background: url(/static/images/ico_home_new.png) no-repeat -7px -40px;
        }
        .sessions-header-icon-end-right-new:hover{
            background: url(/static/images/ico_home_new.png) no-repeat -73px -40px;
        }
        .sessions-header-more-new{
            padding: 5px 10px;
            font-size: 14px;
            border-radius: 12px;
            background-color: #9664D5;
            color: white;
        }
        .sessions-header-more-new:hover {
            color: white;
            text-decoration: none;
        }
        .sessions-books-list-new{
            display: flex;
            flex-wrap: wrap;
            justify-content:space-around;
            align-items: center;

        }
        .sessions-books-list-item-link-new{
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            background-color: white;
            width: 12vw;
            height:20vw;
            padding-bottom:26px;
            position: relative;
            margin-bottom: 10px;
            border-radius: 8px;
            overflow: hidden;

        }
        .sessions-books-list-item-link-new:hover{
            box-shadow: #333 0px 0px 8px;


        }
        /*!!!!!!!!!!!!!!80 13% !!!!!!!!!!!!!*/
        /* .sessions-books-list-item-link-new{
            width: 12vw;
            height:16.8vw;
            padding: 4px;

        } */
        .book-cover-new{
            width: 100%;
            height: 100%;
            object-fit:cover;

        }
        .book-cover-new:hover{
            webkit-filter: blur(1px);
            filter: blur(1px);
        }

        .sessions-books-list-item-link-name{
            font-size: 14px;
            color: #222;
            overflow: hidden;
            text-overflow:ellipsis;
            white-space: nowrap;
            display:inline-block;
            width: 100%;
            position: absolute;
            bottom: 3px;
            left: 0px;
            padding-left: 4px;
            padding-right: 4px;
            text-align: center;
        }

        .end-books-list{
            margin-top: 10px;

        }
        .end-books-list-items{
            display: flex;
            justify-content: space-between;
            align-items: center;

        }

        .end-books-list-items-both{
            /* height: 20vw; */
            width: 40px;
            display: flex;
            align-items: center;
        }
        /* .end-books-list-items-left{
            box-shadow: 12px 0px 7px -5px #333;
        } */



        .end-books-list-items-flex{
            width:100%;
            display: flex;
            justify-content: space-around;
            flex-wrap:wrap;
            align-items: center;
            border-radius: 4px;
        }
        .sm-btn-new{
            display: none;

        }
        .home-tabbar-new{
            display: none;
        }




        @media screen and (max-width: 568px) {
            body{
                background-color: white;
            }
            .sm-btn-new{
                display: block;
                position: fixed;
                top:20px;
                right: 15px;
                padding: 10px;
                width: 26px;
                height: 26px;
                background: url(/static/images/ic_img_search_new.png) no-repeat;
                background-size: contain;
                background-position: center;

            }
            .sm-btn-search-new{
                font-size: 28px;
                color: #eee;
            }
            .nav-home-new{
                display: none;
            }
            .banner-new{
                width: 100vw;
                height: 54vw;
                display:block;
            }
            .index-cover{
                display: block;
                background: url(/static/images/icon_cover.1.0.png) 50% no-repeat;
                width: 100vw;
                height: 40px;
                background-size: 100%;
            }
            .cate-new{
                display: none;
            }
            .carousel-inner,.carousel-img-new{
                border-radius: 0px;
            }
            .header-section-sm-new{
                display: flex;
                justify-content: space-around;
                align-items: center;
                padding-left: 10px;
                padding-right: 10px;
            }
            .header-section-sm-item-new{
                width: 45vw;
                height: 16.76vw;
            }

            .header-section-sm-img-new{
                width: 100%;
                height: 100%;
                object-fit:cover;

            }
            .sessions-header-new{
                padding-left: 4px;
                padding-right: 4px;
            }
            .sessions-books-list-item-link-new{
                flex-wrap:wrap;
                width: 32vw;
                height:52vw;
                border-radius: 0px;
                margin-bottom: 14px;

            }
            .home-tabbar-new{
                display: flex;
                border-top: 0.5px solid #eee;
                height: 55px;
                position: fixed;
                bottom: 0px;
                background-color: #FAFCFC;
                justify-content: space-around;
                align-items: center;

            }
            .book-cover-new{
                background-color: #eee;
            }
            .home-tabbar-item-new{
                height: 42px;
                width: 26px;
            }
            /*47 75*/
            .home-tabbar-icon-new{
                width: 100%;
                height: 100%;
                object-fit:cover;
            }

        }

    </style>
@endsection