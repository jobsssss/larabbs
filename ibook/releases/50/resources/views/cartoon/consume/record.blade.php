@extends('cartoon.partials._layout')
@section('content')

    <div class="container user-info">
        <div class="row">
            <div class="col-xs-12 flex-center flex-center-start">
                <img id="userimg" class="img-circle user-icon" alt="头像" src="{{asset('static/images/default_icon_user.jpg')}}">
                <p class="charge-userinfo-detail flex-center flex-center-between">
                    @if(Auth::check())
                        <span class="user-name">{{Auth::user()->name}}</span>
                        <span class="user-remain ">漫画币余额:<i  style="color: #eb6056;font-weight: 600">{{Auth::user()->detail()->value('book_icon') ?? 0}}</i></span>
                    @else
                        <span class="user-name" onclick="tolog();">(点我登录)</span>
                    @endif


                </p>
            </div>

        </div>
    </div>


    <div class="container purchase-record">
        <div class="row purchase-item-list">
            <p class="nolog" style="text-align: center;padding: 10px 10px;font-size: 16px;display: none">亲，你还没有登录！</p>
        </div>
    </div>
    <img src="{{asset('static/images/kong.png')}}" class="consume-kong consume-kong-div">

@endsection

@section('scripts')
    <script>

        var user=null;
        //var token=null;
        var isLogin = "{{Auth::check()}}";
        var loadFlag=false;
        var pageIndex=1;
        var pageSize=20;

        $(function(){
            //getuserinfo();


            pushHistory();
            window.addEventListener("popstate", function(e) {
                window.location.href="/mine"
            }, false);
            $(window).scroll(function () {
                var scrollTop = $(this).scrollTop();
                var docHeight = $(document).height();
                var windowHeight = $(this).height();
                var leftHeight=docHeight-scrollTop-windowHeight;
                if((leftHeight)<(windowHeight*0.4)){
                    if(loadFlag==false){
                        loadFlag=true;
                        pageIndex=pageIndex+1;
                        getConsumeRecord(pageIndex,pageSize);
                    }

                }
            });
        })

        function initpage(){

            getConsumeRecord(pageIndex,pageSize);

        }

        function getConsumeRecord(index,size){
            if(user!=null){
                token=user.token;
                $('.nolog').hide();
            }else{
                $('.nolog').show();
                return;
            }
            token=localStorage.getItem("blcomics_token");
            $.ajax({
                url:'/purchased/list',
                type:'post',
                data:{'token':token,'pageIndex':index,'pageSize':size},
                success:function(result){
                    if(result.code='200'){
                        createRecord(result.data);
                    }
                }
            })
        }

        function createRecord(data){
            if(data.length<1) return;
            // $('.purchase-item-list').empty();
            console.log(data);
            var tempStr='';
            for(var i in data){
                var temp=baseStr;
                temp=temp.replace(/rbookName/,data[i].bookName);
                temp=temp.replace(/rchapterName/,data[i].chapterName);
                temp=temp.replace(/rcreateDate/,data[i].createDate);
                temp=temp.replace(/rcostCoin/,data[i].costCoin);
                if(parseInt(data[i].remainCoin)>=1539776414){
                    temp=temp.replace(/rremainCoin/,'--');
                }else{
                    temp=temp.replace(/rremainCoin/,data[i].remainCoin);
                }
                tempStr+=temp;
            }
            $('.purchase-item-list').append(tempStr);
            loadFlag=false;
            formateDate();
        }

        function tolog(){
            // if(!user){
            //     window.location.href="/login";
            // }
            window.location.href="/login";
        }


        var baseStr='<div class="col-xs-12 purchase-item">'+
            '	<div class="col-xs-7 purchase-item-left">'+
            '		<p class="purchase-item-padd purchase-name">rbookName <span>rchapterName</span></p>'+
            '		<p class="text-muted purchase-date">rcreateDate</p>'+
            '	</div>'+
            '	<div class="col-xs-5 purchase-item-right">'+
            '		<p class="purchase-item-padd purchase-cost">-rcostCoin</p>'+
            '		<p class="text-muted purchase-remain">余额：rremainCoin</p>'+
            '	</div>'+
            '</div>';

        function formateDate(){
            $('.purchase-date').each(function(){
                if($(this).text().indexOf('-')==-1){
                    var dateStr=parseInt($(this).text());
                    $(this).text(formatDateTime(dateStr));
                }
            });


        }

        function getuserinfo(){

            //token=localStorage.getItem("blcomics_token");
            //token=get_cookie("blcomics_token");
            if(isLogin){
                $.ajax({
                    url:'/user/loginbytoken',
                    type:'post',
                    cache:false,
                    async:false,
                    //data:{'token':token},
                    success:function(result){
                        if(result.code=='200'){
                            user=result.data;
                            $('.user-name').text(user.username);
                            $('.user-remain i').text(user.bookCoin);
                            initpage();
                        }
                    }
                })
            }else{
                $('#log-btn').show();
                $('.nolog').show();
            }
        }

        function pushHistory() {
            var state = {
                title: "title",
                url: "#"
            };
            window.history.pushState(state, "title", "#");
        }

    </script>
@endsection

@section('styles')
    <link href="{{asset('css/base.css')}}" rel="stylesheet" />
    <style>
        /* @media screen and (max-width: 980px){ */

        .nav-detail{
            margin: 0px 0px;
        }
        #log-btn{
            display: none;
            color: white;
        }
        .user-info{
            background-color: white;
            padding: 10px 20px;
        }
        .user-icon{
            width: 50px;
            height: 50px;
        }
        .paytype-div{
            padding: 0px;

        }
        .paytype{

            display: flex;
            align-items: center;
            justify-content: space-around;
            background-color: white;
            border-radius: 10px 10px 10px 10px;
        }

        .paytype img{

            width: 21px;
            height: 21px;
            margin-right: 5px;

        }
        .paytype p{
            font-size: 16px;
            color: black;
            padding: 15px 20px;

        }

        .charge-userinfo-detail{
            width: 100%;
            padding-left: 8px;
            color: black;
        }



        .purchase-record{
            margin: 10px 0px;
            background-color: white;
            padding: 5px 5px;

        }
        .purchase-item{
            padding: 5px 15px;
            border-bottom: 0.5px solid rgba(128,128,128,0.3);
        }
        .purchase-item-padd{
            padding-bottom: 8px;
        }
        .purchase-name{
            font-size: 14px;

            color: black;
            overflow: hidden;
            text-overflow:ellipsis;
            white-space: nowrap;
        }

        .purchase-date{
            font-size: 14px;
        }

        .purchase-cost{
            text-align: right;
            font-size: 16px;
            color: black;
        }
        .purchase-remain{
            text-align: right;
            font-size: 14px;
        }

        .consume-kong{
            display: none;

        }
        .consume-kong-div{
            position:absolute;
            text-align: center;
        }




        /* } */

    </style>
@endsection

