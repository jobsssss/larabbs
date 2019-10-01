@extends('cartoon.partials._layout')
@section('content')

    <div class="container issue-content">

        <div class="row">
            <h1 class="issue-title">问题反馈</h1>
            <div class="issue-form">
                <div class="issue-form-line">
                    <p class="issue-form-line-left ">问题类型<span class="issue-form-required">*</span></p>
                    <!-- <input type="text" class="form-control issue-form-line-input" required="required"  placeholder="如：充值异常，功能异常，网络异常"/> -->
                    <select class="form-control issue-form-line-input" id="issue-type">
                        <option></option>
                        <option>充值异常</option>
                        <option>项目合作</option>
                        <option>其他</option>
                    </select>
                </div>
                <div class="issue-form-line" >
                    <font class="issue-form-line-left">问题描述<span class="issue-form-required">*</span></font>
                    <textarea id="issue-discription" class="form-control issue-form-line-input" rows="6" placeholder="字数不大于200字！"></textarea>
                </div>
                <div class="issue-form-line">
                    <font class="issue-form-line-left">联系方式</font>
                    <input id="issue-contact" type="text" class="form-control issue-form-line-input" placeholder="请输入你的联系方式，方便我们通知"/>
                </div>
                <div class="issue-submit-feet">
                    <button class="issue-submit" onclick="submitIssue();">提交</button>
                </div>
            </div>
        </div>




    </div>

    <div class="alert issue-info">
        欢迎使用问题反馈，我们会在收到消息后24小时内处理，谢谢你的反馈！
    </div>

@endsection

@section('scripts')
    <script>

        var contact='';

        $(function(){
            initToastr();
            contact=getParamvalue("contact");

            if(contact) {
                $('#issue-contact').val(contact);
            }

        })

        function submitIssue(){
            var discription=$('#issue-discription').val();
            if(!discription){
                toastr.info("问题描述不能为空");
                return;
            }
            if(discription.length>200){
                toastr.info("字数太大，请重新修改！");
                return;
            }
            var type=$('#issue-type option:selected').text();

            if(!type){
                toastr.info("问题类型不能为空");
                return;
            }
            var contact2=$('#issue-contact').val();
            $.ajax({
                url:'/message/issue_collect',
                type:'post',
                data:{'type':type,'discription':discription,'contact':contact2},
                success:function(result){
                    if(result.code=='200'){
                        setInterval(function(){
                            window.location.href="/myinfo.html"
                        }, 2000);
                    }
                    toastr.info(result.msg);
                }
            })

        }

    </script>
@endsection

@section('styles')
    <link href="{{asset('css/base.css')}}" rel="stylesheet" />
    <style>
        /* @media screen and (max-width: 680px) { */
        body{
            background-color: white;
        }
        .issue-content{
            background-color: white;

        }
        .issue-title{
            text-align: center;
            font-size: 20px;
            color: white;
            padding: 15px 10px;
            margin-bottom:10px;
            background-color: rgba(150,100,213,1);
        }
        .issue-form{
            padding: 10px 15px;
        }
        .issue-form-line{
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 15px;
        }
        .issue-form-line-input{
            width: 75%;
        }
        .issue-form-line-left{
            font-size: 16px;
            padding-right: 8px;
        }
        .issue-form-required{
            color: red;
            line-height: 16px;
            font-size:16px;
            text-align: center;
            font-weight: 500;
        }
        .issue-info{
            font-size: 16px;
            line-height: 22px;
            margin-left: 15px;
            margin-right: 15px;
            background-color: rgba(150,100,213,1);
            color:white;
            position: absolute;
            bottom: 5px;
            z-index: -1000;
            /* margin-top: 70px; */
        }
        .issue-submit-feet{
            text-align: right;
            margin-top: 30px;
        }
        .issue-submit{
            background-color: #9664D5;
            color:white;
            padding: 10px 16px;
            font-size: 18px;
            line-height: 1.3333333;
            border-radius: 6px;
            width: 30%;

        }



        /* } */

    </style>
@endsection

