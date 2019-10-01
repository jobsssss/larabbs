@extends('cartoon.partials._layout')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3 col-xs-12 user-info">
                <div class="user-header user-bookcoin">
                    <div class="user-bookcoin-desc user-bookcoin-desc-text">
                        <img class="user-header-img" alt="usercoin" src="{{asset('static/images/coin_user.png')}}">
                        <span >漫币</span>
                    </div>
                    <div class="user-bookcoin-desc-2">
                        <p class="user-bookcoin-desc-text-2"><span class="user-coin-remain">0</span><span class="">(剩余数量)</span></p>
                    </div>
                </div>
                <div class="user-header-sp">
                </div>
                <div class="user-header user-svip">
                    <div class="user-bookcoin-desc user-bookcoin-desc-text">
                        <img class="user-header-img" alt="usercoin" src="{{asset('static/images/svip_user.png')}}">
                        <span>会员</span>
                    </div>
                    <div class="user-bookcoin-desc-2 ">
                        <p class="user-bookcoin-desc-text-2"><span class="svip-info">未开通</span><span class="svip-info-date">(-到期)</span></p>
                    </div>
                </div>

            </div>

        </div>
    </div>
    <!-- 导航 结束-->
    <div class="container ">
        <div class="row ">
            <div class="col-md-6 col-md-offset-3 col-xs-12 pay-type-main-new">
                <div class="pay-type-new">
                    <label class='col-xs-12 charge-pay-check-new charge-pay-check-ali-new charge-pay-check-ali-active'>
                        <input id="ali-check-new"  type="radio" name="radio-pay" value="ali" checked>
                        <span class="pay-modal-body-bottom-autoby" ><img src="{{asset('static/images/ic_alipay.png')}}">支付宝</span>
                    </label>
                    <label class='col-xs-12 charge-pay-check-new charge-pay-check-wx-new '>
                        <input id="wx-check-new"  type="radio" name="radio-pay" value="wx">
                        <span class="pay-modal-body-bottom-autoby" ><img src="{{asset('static/images/ic_weixin.png')}}">微信</span>
                    </label>

                </div>
            </div>
            <div class="col-md-6 col-md-offset-3 col-xs-12 charge-meal">

                <!-- <div class="col-md-6 col-xs-6 charge-meal-span" onclick="payAction('9.99')">
                    <div class="charge-meal-item">
                        <div class="charge-meal-item-first">
                            <img class="charge-meal-item-img" src="http://47.97.112.180/static/images/recharge_coin.png">
                            <span class="charge-meal-coin">100</span>
                        </div>
                        <div class="charge-meal-item-send">
                            <p class="">+无优惠</p>
                        </div>
                        <span class="charge-meal-item-thr">¥9.99</span>
                    </div>
                </div> -->

                <div class="col-md-6 col-xs-6 charge-meal-span" onclick="payAction('30.00')">
                    <div class="charge-meal-item">
                        <div class="charge-meal-item-first">
                            <img class="charge-meal-item-img" src="{{asset('static/images/recharge_coin.png')}}">
                            <span class="charge-meal-coin">300</span>
                        </div>
                        <div class="charge-meal-item-send">
                            <p class="">无优惠<!-- <span class="first-charge ">+首充再送100币</span> --></p>
                        </div>
                        <span class=" charge-meal-item-thr">¥30</span>
                    </div>
                </div>

                <div class="col-md-6 col-xs-6 charge-meal-span" onclick="payAction('66.00')">
                    <div class="charge-meal-item charge-meal-item-66">
                        <div class="charge-meal-item-first">
                            <img class="charge-meal-item-img" src="{{asset('static/images/recharge_coin.png')}}">
                            <span class="charge-meal-coin">660</span>
                        </div>
                        <div class="charge-meal-item-send">
                            <p class="">+送300币</p>
                        </div>
                        <span class=" charge-meal-item-thr">¥66</span>

                    </div>
                    <img class="charge-hot" src="{{asset('static/images/recharge_hot.png')}}">
                </div>
                <div class="col-md-6 col-xs-6 charge-meal-span" onclick="payAction('100.00')">
                    <div class="charge-meal-item ">
                        <div class="charge-meal-item-first">
                            <img class="charge-meal-item-img" src="{{asset('static/images/recharge_coin.png')}}">
                            <span class="charge-meal-coin">1000</span>
                        </div>
                        <div class="charge-meal-item-send">
                            <p class="">+送500币<span class="first-charge ">+首充再送500币</span></p>
                        </div>
                        <span class=" charge-meal-item-thr">¥100</span>
                    </div>
                </div>
                <div class="col-md-6 col-xs-6 charge-meal-span" onclick="payAction('200.00')">
                    <div class="charge-meal-item ">
                        <div class="charge-meal-item-first">
                            <img class="charge-meal-item-img" src="{{asset('static/images/recharge_coin.png')}}">
                            <span class="charge-meal-coin">2000</span>
                        </div>
                        <div class="charge-meal-item-send">
                            <p class="">+送1000币<span class="first-charge ">+首充再送1000币</span></p>
                        </div>
                        <span class=" charge-meal-item-thr">¥200</span>
                    </div>
                </div>
                <!--<div class="col-md-6 col-xs-6 charge-meal-span" onclick="payAction('0.01')">-->
                <!--<div class="charge-meal-item ">-->
                <!--<div class="charge-meal-item-first">-->
                <!--<img class="charge-meal-item-img" src="http://47.97.112.180/static/images/recharge_coin.png">-->
                <!--<span class="charge-meal-coin">0.01</span>-->
                <!--</div>-->
                <!--<div class="charge-meal-item-send">-->
                <!--<p class="">+送1000币<span class="first-charge ">+首充再送1000币</span></p>-->
                <!--</div>-->
                <!--<span class=" charge-meal-item-thr">¥0.01</span>-->
                <!--</div>-->
                <!--</div>-->
                <div class="col-md-12 col-xs-12 charge-meal-span" onclick="payAction('365.00')">
                    <div class="charge-meal-item">
                        <div class="charge-meal-item-first">
                            <img class="charge-meal-item-img" src="{{asset('static/images/recharge_coin.png')}}">
                            <span class="charge-meal-coin">年度会员</span>
                        </div>
                        <div class="charge-meal-item-send">
                            <p class="">+全年全部漫画免费观看</p>
                        </div>
                        <span class="charge-meal-item-thr">¥365</span>
                    </div>
                </div>
                <div class="col-md-12 col-xs-12 charge-meal-span">
                    <div class="alert alert-warning charge-alert" role="alert">
                        <p>温馨提示：</p>
                        购买后，账户余额若长时间无变化，请及时联系漫画客服，我们将第一时间为你解决，客服QQ：2462450809。
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div>

        <form id="alipay" action="https://mapi.alipay.com/gateway.do" method="get" style="display: none">
            <input type="text" id="ali_service" name="service">
            <input type="text" id="ali_partner" name="partner">
            <input type="text" id="ali_input_charset" name="_input_charset">
            <input type="text" id="ali_notify_url" name="notify_url">
            <input type="text" id="ali_return_url" name="return_url">
            <input type="text" id="ali_out_trade_no" name="out_trade_no">
            <input type="text" id="ali_subject" name="subject">
            <input type="text" id="ali_total_fee" name="total_fee">
            <input type="text" id="ali_seller_id" name="seller_id">
            <input type="text" id="ali_payment_type" name="payment_type">
            <input type="text" id="ali_show_url" name="show_url">
            <input type="text" id="ali_sign_type" name="sign_type">
            <input type="text" id="ali_sign" name="sign">
            <input type="submit" id="alipay_submit">
        </form>
        <form id="jtpay" action="https://www.fengbaopay.com/recharge" method="post" style="display: none">
            <input type="text" id="jt_pid" name="pid">
            <input type="text" id="jt_type" name="type">
            <input type="text" id="jt_out_trade_no" name="out_trade_no">
            <input type="text" id="jt_total_fee" name="total_fee">
            <input type="text" id="jt_subject" name="subject">
            <input type="text" id="jt_notify_url" name="notify_url">
            <input type="text" id="jt_return_url" name="return_url">
            <input type="text" id="jt_sign" name="sign">
            <input type="text" id="jt_sign_type" name="sign_type" value="MD5">
            <input type="text" id="jt_sitename" name="sitename" value="MuMu">
            <input type="submit" id="jtpay_submit">
        </form>

    </div>

@endsection

@section('scripts')
    <script src="https://unpkg.com/callapp-lib@2.1.5/dist/index.umd.min.js"></script>
    <script>
        /*充值中心*/

        var user=null;
        var param=null;
        //var token=null;
        var isLogin="{{Auth::check()}}";
        var moneys;
        var loadFlag=false;
        var pageIndex=1;
        var pageSize=20;
        var hashordered=false;
        var selAli=true;


        var PAY_CHANNEL_WXQR = "wxpay_qr";
        var PAY_CHANNEL_WXH5 = "wxpay_h5";
        var PAY_CHANNEL_WX = "wxpay";
        var PAY_CHANNEL_WXJS = "wxpay_js";
        var PAY_CHANNEL_ALIH5 = "alipay_h5";
        var PAY_CHANNEL_ALIQR = "alipay_qr";
        var PAY_CHANNEL_ALI = "alipay";

        $(function(){





            //token=localStorage.getItem("blcomics_token");

            if(!isLogin){
                toastr.info("请先登录！");
                setTimeout(function(){
                    window.location.href="/login";
                }, 1000);
                return;
            }



            getuserinfo();


            initUserinfo();

            $('.charge-pay-check-wx-new').click(function(){
                if (selAli) {
                    $('.charge-pay-check-wx-new').addClass('charge-pay-check-wx-active');
                    $('.charge-pay-check-ali-new').removeClass('charge-pay-check-ali-active');
                    selAli=false;
                }
            })
            $('.charge-pay-check-ali-new').click(function(){
                if (!selAli) {
                    $('.charge-pay-check-wx-new').removeClass('charge-pay-check-wx-active');
                    $('.charge-pay-check-ali-new').addClass('charge-pay-check-ali-active');
                    selAli=true;
                }
            })



        })
        function payAction(coins){

            //token=localStorage.getItem("blcomics_token");
            if(!isLogin) {
                toastr.info("请先登录！");
                setTimeout(function(){
                    window.location.href="/login";
                }, 1000);
            }else{

                moneys=coins;

                token=localStorage.getItem("blcomics_token");
                mask();
                //getPayMsg(token,moneys*10,'wxpay');


                if(judgmentClient()=="m"){
                    var payValue = $("input[name='radio-pay']:checked").val()

                    if(payValue=="wx"){
                        jtpaypay(token,moneys,PAY_CHANNEL_WXJS);
                    }else{
                        officeAlipay(token,moneys,PAY_CHANNEL_ALI);
                    }
                }else{

                    jtpaypay(token,moneys,PAY_CHANNEL_WXQR);
                }



            }



        }

        function officeAlipay(token,moneys,payChannel){

            $.ajax({
                url:'/pays/pay',
                data:{'token':token,'amount':moneys,'payChannel':payChannel},
                type:'post',
                success:function(result){
                    if(result.code=='200'){
                        if(result.msg==PAY_CHANNEL_ALIQR){
                            //打开支付宝
                            openAlipay(result.data)
                        }else if(result.msg==PAY_CHANNEL_ALIH5){
                            $('#ali_service').val(result.data.service);
                            $('#ali_partner').val(result.data.partner);
                            $('#ali_input_charset').val(result.data._input_charset);
                            $('#ali_notify_url').val(result.data.notify_url);
                            $('#ali_return_url').val(result.data.return_url);
                            $('#ali_out_trade_no').val(result.data.out_trade_no);
                            $('#ali_subject').val(result.data.subject);
                            $('#ali_total_fee').val(result.data.total_fee);
                            $('#ali_seller_id').val(result.data.seller_id);
                            $('#ali_payment_type').val(result.data.payment_type);
                            $('#ali_show_url').val(result.data.show_url);
                            $('#ali_sign_type').val(result.data.sign_type);
                            $('#ali_sign').val(result.data.sign);
                            $('#alipay_submit').click();
                        }

                    }else{
                        toastr.info(result.msg);
                    }
                    unmask();
                }
            })

        }

        function jtpaypay(token,moneys,payChannel){

            $.ajax({
                url:'/pays/pay',
                data:{'token':token,'amount':moneys,'payChannel':payChannel},
                type:'post',
                success:function(result){
                    if(result.code=='200'){
                        if (result.msg==PAY_CHANNEL_WXJS) {
                            window.location.href="/page/wxpayjs_prepay.html?prepayUrl="+result.data;
                        }else if(result.msg==PAY_CHANNEL_WXQR){
                            window.location.href="/page/wcscanpay.html?redirect_url="+result.data;
                        }else if(result.msg==PAY_CHANNEL_WXH5){
                            $('#jt_pid').val(result.data.pid);
                            $('#jt_type').val(result.data.type);
                            $('#jt_out_trade_no').val(result.data.out_trade_no);
                            $('#jt_total_fee').val(result.data.total_fee);
                            $('#jt_subject').val(result.data.subject);
                            $('#jt_notify_url').val(result.data.notify_url);
                            $('#jt_return_url').val(result.data.return_url);
                            $('#jt_sign').val(result.data.sign);
                            $('#jt_sign_type').val(result.data.sign_type);
                            $('#jtpay_submit').click();
                        }


                    }else{
                        toastr.info(result.msg);
                    }
                    unmask();
                },
                error:function(){
                    unmask();
                    toastr.info("充值通道维护")
                }

            })

        }

        function initUserinfo(){

            initToastr();
            toastr.options = {timeOut: "1500" }

            // 47.99.79.245 120.33.39.105

            param=getUrlParam();
            $('title').text('充值中心');

            token=localStorage.getItem("blcomics_token");
            if(token){
                $.ajax({
                    url:'/purchased/first_recharge',
                    type:'post',
                    data:{'token':token},
                    success:function(result){
                        if(result.code=='200'){
                            hashordered=true;
                            $('.first-charge').show();
                        }else{
                            $('.first-charge').hide();
                        }
                    }
                })

            }else{

            }

//	pushHistory();
//	window.addEventListener("popstate", function(e) {
//		if(!localStorage.getItem("blcomics_token") || ( localStorage.getItem("blcomics_token")&&hashordered)){
//			window.location.href="/page/activity.jsp";
//		}else{
//			window.location.href="/myinfo.html"
//		}
//	}, false);





        }




        function getuserinfo(){

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
                            $('.user-coin-remain').text(result.data.bookCoin);
                            if(result.data.svip>0){
                                $('.svip-info').text('SVIP');
                                $('.svip-info-date').text('('+formatDateTimeYMD(result.data.svipExpire)+'到期)');
                            }else{
                                $('.svip-info').text('未开通');
                                $('.svip-info-date').text('(-到期)');
                            }
                        }
                    }
                });
                $.ajax({
                    url:'/purchase/isordered',
                    type:'post',
                    data:{'token':token},
                    success:function(result){
                        if(result.code=='200'){
                            hashordered=true;
                            $('.first-charge').show();
                        }else{
                            $('.first-charge').hide();
                        }
                    }
                })
            }
        }

        function openAlipay(url){
            window.location.href=url;
        }


        function pushHistory() {
            var state = {
                title: "title",
                url: "#"
            };
            window.history.pushState(state, "title", "#");
        }

        function formatDateTimeYMD(timeStamp) {
            var date = new Date();
            date.setTime(timeStamp * 1000);
            var y = date.getFullYear();
            var m = date.getMonth() + 1;
            m = m < 10 ? ('0' + m) : m;
            var d = date.getDate();
            d = d < 10 ? ('0' + d) : d;
            return y + '-' + m + '-' + d;
        };
    </script>
@endsection

@section('styles')
    <link href="{{asset('css/base.css')}}" rel="stylesheet" />
    <style>
        /* @media screen and (max-width: 980px){ */

        .user-info{
            padding-bottom: 15px;
        }
        .user-header-sp{
            position:absolute;
            left:50%;
            width: 1px;
            height: 80px;
            background-color: rgba(0,0,0,0.3);
        }
        .user-header-img{
            width: 35px;
            height: 35px;
        }
        .user-bookcoin-desc{
            text-align: center;

        }
        .user-bookcoin-desc-text{
            font-size: 20px;
            color: black;

        }
        .user-bookcoin-desc-text-2{
            width:180px;
            font-size: 13px;
            text-align: center;
            padding-left: 10px;
            padding-left: 10px;
            overflow: hidden;
            text-overflow:ellipsis;
            white-space: nowrap;
            line-height: 20px;
            color: rgba(0,0,0,0.4);
        }
        .user-coin-remain{
            font-size: 17px;
        }
        .svip-info{
            font-size: 16px;
        }
        .user-info{
            background-color: white;
            display: flex;
            align-items: center;
            justify-content: space-around;
            padding-top: 20px;
        }

        .user-header{

        }
        .user-bookcoin-desc{
            padding-bottom: 20px;
        }

        .charge-meal{
            /* display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: space-around; */
            background-color: white;
            padding-bottom: 10px;

        }
        .charge-meal-item{
            display: flex;
            flex-direction:column;
            align-items: center;
            justify-content: center;
            padding: 8px 0px;
            border:1px solid rgba(0,0,0,0.3);
            position: relative;
            background-color: white;
            border-radius: 5px;
            margin-bottom: 15px;
            background-color: white;
        }
        .charge-meal-item:hover{
            cursor: pointer;
        }
        .charge-meal-item-66{
            border: 1px solid #9664D5;
        }
        .charge-hot{
            position: absolute;
            top:-28px;
            left: 0px;
            width: 44.8px;
            height: 58.4px;
        }
        .charge-meal-item-first{
            display: flex;
            align-items: center;
        }
        .charge-meal-coin{
            font-size: 22px;
            color: black;
        }
        .charge-meal-item-img{
            width: 42px;
            height: 31px;
            margin-right: 10px;
        }
        .charge-meal-item-send{
            width:190px;
            font-size: 13px;
            color: #9664D5;
            line-height: 22px;
            padding-bottom: 8px;
            padding-top: 8px;
            text-align: center;
        }
        .charge-meal-item-thr{
            padding: 5px 10px;
            background-color:#9664D5;
            color: white;
            border-radius: 5px;
            width: 100px;
            text-align: center;

        }
        .pay-type-new{
            display: flex;
            justify-content: space-around;
            align-items: center;
            background-color: white;
            padding-top:24px;
            padding-bottom: 24px;
        }
        .pay-type-main-new{
            background-color: white;
            margin-top: 8px;
        }

        .charge-pay-check-new{

            padding: 4px;
            font-size: 16px;
            border-radius: 4px;
            text-align: center;
            margin-bottom: 0px;
            border: 1px solid #eee;
            margin-left: 15px;
            margin-right: 15px;

        }

        .charge-pay-check-wx-active{
            border: 1px solid rgb(83,180,53);
        }
        .charge-pay-check-ali-active{
            border: 1px solid rgb(67,160,227);
        }

        input[type=checkbox],input[type=radio]{
            margin: 0px;
            width: 19px;
            height: 19px;
            display: none;
        }
        .pay-modal-body-bottom-autoby{
            font-size: 16px;
        }


        @media screen and (max-width: 980px){

            .user-header-img{
                width: 23px;
                height: 23px;
            }
            .charge-meal{
                margin-top: 0px;
            }
            .charge-meal-item-img{
                width: 38px;
                height: 28px;
            }
            .user-bookcoin-desc {
                padding-bottom: 10px;
            }
            .charge-meal{
                padding-left: 5px;
                padding-right: 5px;
                background-color: none;
            }
            .charge-meal-span{
                padding-left: 5px;
                padding-right: 5px;
            }
            .user-header-sp{
                height: 50px;

            }
            .pay-type-new{
                display: flex;
                justify-content: space-around;
                align-items: center;
                background-color: white;
                padding-top:24px;
                padding-bottom: 24px;
            }
            .pay-type-main-new{
                padding-left: 0px;
                padding-right: 0px;
            }


            .charge-pay-check-new{

                padding: 4px;
                font-size: 16px;
                border-radius: 4px;
                text-align: center;
                margin-bottom: 0px;
                border: 1px solid #eee;
                margin-left: 10px;
                margin-right: 10px;

            }
            .charge-pay-check-new:hover{
                cursor: pointer;
            }

            .charge-pay-check-wx-active{
                border: 1px solid rgb(83,180,53);
            }
            .charge-pay-check-ali-active{
                border: 1px solid rgb(67,160,227);
            }

            input[type=checkbox],input[type=radio]{
                margin: 0px;
                width: 19px;
                height: 19px;
                display: none;
            }
            .pay-modal-body-bottom-autoby{
                font-size: 16px;
            }




        }


        /* } */

    </style>
@endsection

