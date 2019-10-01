@extends('cartoon.partials._layout')
@section('content')
    <div class="section-search-bar">
        <a href="javascript:window.history.back()">
            <img class="search-bar-back" alt="" src="{{asset('static/images/sc_img_search.png')}}">
        </a>
        <div class="search-input">
            <form action="javascript:doSearch()">
                <input id="search_name" type="text" class="form-control"  placeholder="请输入漫画名">
            </form>

        </div>

        <button onclick="doSearch();"  class="btn-search do-search">搜索</button>
    </div>
    <div class="search-list">

    </div>

    <div class="section-similar-search">
        <div>
            <p class="similar-title">大家都在搜</p>
        </div>
        <div class="similar-flex">
            @foreach($hots as $v)
                <a class="similar-item" href="{{route('cartoon.detail',['id' => $v->id])}}">{{$v->title ?? ''}}</a>
            @endforeach
            {{--<a class="similar-item" href="/book/webBookDetail/79">美丽新世界</a>--}}
            {{--<a class="similar-item" href="/book/webBookDetail/2">调教家政妇</a>--}}
            {{--<a class="similar-item" href="/book/webBookDetail/16">欲求王</a>--}}
            {{--<a class="similar-item" href="/book/webBookDetail/22">偷窥</a>--}}
            {{--<a class="similar-item" href="/book/webBookDetail/18">初始的快感</a>--}}
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        $(function(){
            //提示信息
            initToastr();
        })

        function doSearch(){
            var name=$('#search_name').val();
            if(!name){
                toastr.info("请输入书名");
                return;
            }
            $.ajax({
                url:'/search',
                type:'post',
                data:{'title':name},
                success:function(result){
                    if(result.code){
                        createResultData(result.data);
                    }
                }
            })

        }

        var listStr='<div class="search-list-item"><a href="/cartoons/t_bookId">t_bookname</a><div class="line"></div></div>';

        function createResultData(data){
            if(data.length==0){
                toastr.info("查无此书");
                return;
            }
            $('.search-list').empty();
            $('.search-list').show();
            $('.section-similar-search').hide();


            var temps="";
            for(var index in data){
                var temp=listStr;
                temp=temp.replace(/t_bookId/g,data[index].id);
                temp=temp.replace(/t_bookname/g,data[index].title);
                temps+=temp;
            }
            $('.search-list').append(temps);

        }
    </script>
@endsection

@section('styles')
    <style>
        body{

            background-color: white;
        }
        .section-search-bar{

            position: relative;
            display: flex;
            justify-content: flex-start;
            align-items: center;
            height: 55px;
            background-color: #9664D5;
            width: 100%;


        }

        .btn-search{
            display: inline-block;
            padding: 6px 12px;
            margin-bottom: 0;
            font-size: 14px;
            font-weight: 400;
            line-height: 1.42857143;
            text-align: center;
            white-space: nowrap;
            vertical-align: middle;
            -ms-touch-action: manipulation;
            touch-action: manipulation;
            cursor: pointer;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            background-image: none;
            border: none;
            border-radius: 4px;
        }


        .search-bar-back{

            height: 30px;
            width: 30px;
            margin-left: 12px;
            margin-right: 10px;

        }
        .search-input{

            width: 100%;
        }
        .font-search{

            font-size: 16px;
        }
        .do-search{

            margin-left: 8px;
            margin-right: 8px;
            background-color: #9664D5;
            border: none;
            color: white;
            font-size: 16px;
        }
        .section-similar-search{
            padding-top:10px;
            background-color: white;
        }
        .similar-title{
            font-size: 18px;
            color: rgba(0,0,0,0.26);
            padding-left: 16px;
            padding-top: 5px;
            padding-bottom: 5px;


        }
        .similar-flex{
            display: flex;
            justify-content: flex-start;
            align-items: center;
            padding-left: 16px;
            padding-right: 16px;
            flex-wrap: wrap;
            padding-bottom: 16px;
            height: 100%;

        }
        .similar-item{
            border: 0.5px solid rgba(0,0,0,0.12);
            border-radius: 16px;
            margin-left: 6px;
            margin-top:6px;
            font-size: 14px;
            color: rgba(0,0,0,0.54);
            padding-bottom: 6px;
            padding-top: 6px;
            padding-left: 12px;
            padding-right: 12px;

        }

        .search-list{
            position: absolute;
            padding-bottom:8px;
            margin-top: 8px;
            background-color: white;
            width: 100%;
            display: none;

        }

        .search-list-item{
            font-size: 18px;
            color: rgba(0,0,0,0.54);
            padding: 10px;

        }
        .search-list-item a{
            font-size:18px;
            padding:8px 8px 8px 20px;
            width: 100%;
            display: inline-block;


        }
        .line{
            width: 100%;
            height: 1px;
            background-color: rgba(0,0,0,0.12);
            margin-top: 10px;

        }
    </style>
@endsection

