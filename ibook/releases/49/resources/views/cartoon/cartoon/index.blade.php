@extends('cartoon.partials._layout')
@section('content')
<div class="nav-top-books-new">
    <div class=" nav-books-new">
        <div class="nav-books-left-new">
            <a href="javascript:window.history.back()" class="detail-back-new-a">
                <img  class="global-back-icon" alt="" src="{{asset('static/images/nav_ic_img_back_new.png')}}">
            </a>
            <h1 class="nav-books-header-1">{{$cat ?? ''}}</h1>
        </div>
        <a href="{{url('/')}}" class="detail-back-new-a">
            <img  class="global-back-icon" alt="" src="{{asset('static/images/nav_ic_img_home_new.png')}}">
        </a>
    </div>

</div>


<div class="mycontainer books-list-new">

</div>

<p id="theend"  style="text-align: center;width: 100%;">我也是有底线的 -_-</p>

@endsection

@section('scripts')
    <script>
        /*book list diplay sheet*/
        var sectionId=-1;
        var pageSize=25;
        var totalpage;
        var flag=false;
        var mainurl='/cartoons/get_section';

        $(function(){

            //初始化页面
            //sectionId= UrlParam.paramValues("sectionId");
            //var sectionName= UrlParam.paramValues("sectionName");

            sectionId=getParamvalue("sectionId");
            //默认加载第一页
            var pageindex=1;
            initpage(sectionId,pageindex,pageSize);

            //下拉加载
            $(window).scroll(function () {
                var scrollTop = $(this).scrollTop();
                var docHeight = $(document).height();
                var windowHeight = $(this).height();
                var leftHeight=docHeight-scrollTop-windowHeight;
                if((leftHeight)<(windowHeight*0.4)){
                    if(flag==false){
                        flag=true;
                        pageindex=pageindex+1;
                        initpage(sectionId,pageindex,pageSize);
                    }

                }
            });

            //changeImg();
            //调整.img-update
            //resetUpdateInfo();
        })

        /*请求数据*/
        function initpage(sectionId,page,pageSize){
            var cat =  "{{$cat ?? ''}}"
            $.ajax({
                url:mainurl,
                data:{"sectionId":sectionId,"page":page,"size":pageSize,"cat":cat},
                type:'get',
                cache:true,
                dataType:'JSON',
                success:function(result){
                    if(result.code!="200"){
                        alert(result.msg);
                    }else{
                        if(result.data.books.length>0){
                            createpage(result.data.books);
                        }else{
                            $('#theend').show();
                        }
                    }
                }

            });
        }
        /*生成界面*/
        function createpage(books){
            //var currentIps=getAliveIps();
            var items="";
            for(var i in books){
                var temp=itemStr;
                temp=temp.replace(/t_bookId/g,books[i].id);
                temp=temp.replace(/t_picon/g,books[i].cover);
                temp=temp.replace(/t_bookName/g,books[i].title);
                temp=temp.replace(/t_words/g,books[i].tags);
                if(books[i].lastChapter<0){
                    temp=temp.replace(/t_lastcpater/g,"完结");
                }else{
                    temp=temp.replace(/t_lastcpater/g,books[i].lastChapter+"话");
                }

                temp=temp.replace(/t_summary/g,books[i].intro);
                temp=temp.replace(/t_author/g,books[i].authorName);
                items=items+temp;
            }
            $('.books-list-new').append(items);
            flag=false;

        }

        var itemStr='<a href="/cartoons/t_bookId" class="books-list-item-new">'+
            '	<div  class="books-list-item-cover">'+
            '		<img class="img-placeholder global-img-p" alt="t_bookName,韩国漫画封面" src="t_picon">'+
            '	</div>'+
            '	<div class="books-list-item-info-new grad-new">'+
            '		<h2 class="books-list-item-info-update">t_bookName</h2>'+
            '		<div class="books-list-item-info-name ">'+
            '			<span class="books-list-item-info-type">t_words</span>'+
            '			<span class="books-list-item-info-cps">t_lastcpater</span>'+
            '			<span class="hide">内容:t_summary</span>'+
            '			<span class="hide">作者:t_author</span>'+
            '		</div>'+
            '	</div>'+
            '</a>';
    </script>
@endsection

@section('styles')
    <style>
        .nav-top-books-new{
            position: relative;
            height: 50px;
            position: fixed;
            width: 100vw;
            z-index: 1000;
        }
        .nav-books-new{
            width:80vw;
            padding:0 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 1px 2px rgba(0,0,0,0.1);
            background-color: #9664D5;
            border-radius: 0px 0px 8px 8px;
            margin-left: auto;
            margin-right: auto;
        }
        .nav-books-left-new{
            display: flex;
            justify-content: flex-start;
            align-items: center;
        }
        .nav-books-header-1{

            font-size: 18px;
            color: white;
            margin-left: -12px;

        }
        .detail-back-new-a{
            width: 50px;
            height: 50px;
            display: block;
            padding: 13px;

        }
        .global-back-icon{
            width: 100%;
            height: 100%;
            object-fit:cover;
        }
        .books-list-new{
            display: flex;
            justify-content: space-around;
            align-items: center;
            flex-wrap: wrap;
            padding-top: 60px;

        }
        .books-list-item-new{
            position: relative;
            margin-bottom: 10px;
            border-radius: 8px;
            overflow: hidden;

        }
        /**/
        .books-list-item-cover{
            width: 12vw;
            height:16.8vw;
            display: block;
            border-radius: 4px;
            overflow: hidden;
        }
        .books-list-item-new:hover{
            webkit-filter: blur(1px);
            filter: blur(1px);
            box-shadow: #333 0px 0px 8px;

        }
        .books-list-item-info-new{
            position: absolute;
            left: 0px;
            bottom: 0px;
            padding-left: 8px;
            width: 100%;
            padding-bottom: 8px;
            padding-right: 8px;
            padding-top: 70px;

        }

        .books-list-item-info-update{
            padding-top: 4px;
            padding-bottom: 8px;
            color: white;
            font-size: 14px;
            border-bottom: 1px solid rgba(121, 121, 121, 0.5);
            width: 100%;
            overflow: hidden;
            text-overflow:ellipsis;
            white-space: nowrap;
        }
        .books-list-item-info-name{
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-top: 4px;


        }
        .books-list-item-info-cps{
            color: #08ff08;
            padding: 2px;
            width:30%;
            overflow: hidden;
            text-overflow:ellipsis;
            white-space: nowrap;
            text-align: right;

        }
        .books-list-item-info-type{
            color: #08ff08;
            width: 65%;
            overflow: hidden;
            text-overflow:ellipsis;
            white-space: nowrap;
        }
        #theend{
            display: none;
        }


        @media (max-width: 568px){

            .books-list-item-cover{
                width: 48vw;
                height:66vw;
                display: block;
                border-radius: 4px;
                overflow: hidden;
            }
            .nav-books-new{

                border-radius: 0px 0px 0px 0px;
            }
            .nav-books-new{
                width: 100vw;
                padding: 0px;
            }
            .detail-back-new-a{
                padding: 13px;
            }
        }
    </style>
@endsection

