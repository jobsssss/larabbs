@extends('cartoon.partials._layout')

@section('content')

<div class="mycontainer ">
    {{--<div class="nav-navel-home">--}}
        {{--<ul style="display: flex;">--}}
            {{--<li><a href="{{route('history')}}">历史记录</a></li>--}}
            {{--&nbsp;&nbsp;&nbsp;&nbsp;--}}
            {{--<li><a onclick="javascript:showToastr('尽情期待')">收藏</a></li>--}}
        {{--</ul>--}}
    {{--</div>--}}
    <div class="row">
        <div class="col-md-6 col-md-offset-3 col-xs-12 user-info">
            <div>
                <span><a class="{{Request::is('history') ? 'active' :''}}" href="{{route('history')}}">历史记录</a></span>
            </div>
            <div class="user-header-sp">
            </div>
            <div>
                <span><a class="{{Request::is('collect') ? 'active' :''}}" onclick="javascript:showToastr('尽情期待')">收藏</a></span>
            </div>

        </div>

    </div>
</div>
<div class="novel-section-header">

</div>

<div class="mycontainer novel-main">
    <div class="novel-main-left">
        <section>
            <div class="novel-section-list">
                @foreach ($histories as $value)
                    <a href="{{route('chapter.index',[$value->cartoon_id,$value->chapter_id])}}" class="novel-section-list-item">
                    <span class="novel-section-list-item-cover">
                        <img class="global-img-cover img-placeholder" alt="" src="{{\helpers\img_url($value->cartoon->cover ?? '')}}">
                    </span>
                        <span class="novel-section-list-item-info">
                        <span class="item-info-name">
                            <span class="item-info-novel-name ">{{$value->cartoon->title ?? ''}}</span>
                            <span class="item-info-author hide">
                                <!-- <i class="material-icons novel-info-view">person</i> -->
                            <span>{{$value->cartoon->author ?? ''}}</span>
                            </span>
                            <span class="item-info-author">
                                <!-- <i class="material-icons novel-info-view">equalizer</i> -->
                                <span class="item-info-hit">{{$value->cartoon->tags ?? ''}}&nbsp;&nbsp;&nbsp;</span>
                            </span>
                            <span class="item-info-author">
                                <span class="item-info-desc item-info-novel-name item-info-novel-fixed">{{$value->cartoon->intro ?? ''}}</span>
                            </span>

                        </span>
                    </span>
                    </a>
                @endforeach
            </div>
        </section>
    </div>
</div>

@include('cartoon.partials._footer')

@endsection


@section('scripts')
	<script type="text/javascript"
	src="https://static.mina360.com/js/novel/novels.1.0.js?version=2019123894442323"></script>

	<script>


	</script>
@endsection

@section('styles')


	<style>
        body{
            background-color: #eee;
        }

        .user-info {
            background-color: white;
            display: flex;
            align-items: center;
            justify-content: space-around;
            padding-top: 20px;
            padding-bottom: 20px;
        }
        .user-info a {
            font-size: 16px;
        }
        .user-header-sp{
            position:absolute;
            left:50%;
            width: 1px;
            height: 15px;
            background-color: rgba(0,0,0,0.3);
        }




        .novel-main{
            display: flex;
            justify-content: space-between;
            margin-top: 8px;
        }
        .novel-main-left{

            width: 100%;
        }


        .novel-section-header{
            display: flex;
            justify-content: space-between;
            align-items:center;
            padding: 16px 0px 8px 0px;
        }


        .novel-section-list{
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
        }
        .novel-section-list-item{
            display: flex;
            justify-content: flex-start;
            align-items:center;
            /* border-bottom: 1px solid rgba(0, 0, 0, 0.1); */
            padding-bottom: 16px;
            padding-top: 8px;
        }
        .novel-section-list-item:hover{
            text-decoration: none;
        }
        .novel-section-list-item:visited{
            text-decoration: none;
        }
        .novel-section-list-item-cover{
            width: 7vw;
            height: 9.3vw;
            overflow: hidden;
            box-shadow: 0 1px 6px rgba(0,0,0,.35);
        }
        .novel-section-list-item-info{
            display: flex;
            justify-content: space-between;
            flex-direction: column;
            padding-left: 8px;
            padding-top: 4px;
            width: 18vw;
        }
        .item-info-name{
            font-size: 18px;
            color: #111;
            display: flex;
            justify-content: space-between;
            flex-direction: column;


        }
        .item-info-novel-name{
            overflow: hidden;
            /* text-overflow:ellipsis;
            white-space: nowrap; */
            width: 100%;
        }

        .item-info-author{
            display: flex;
            justify-content: flex-start;
            align-items: center;
            padding-top: 8px;
            font-size: 12px;
            color: #777;
        }
        .item-info-hit{
            color: #777;
            font-size: 12px;
        }

        .item-info-novel-fixed{
            height: 38px;

        }
        @media (max-width: 980px){
            .mycontainer{
                width: 100vw;
                margin-left: auto;
                margin-right: auto;
                padding-left: 0px;
                padding-right: 0px;

            }

            .novel-main{
                background-color: white;
                margin-top: 0px;
            }

            .novel-main-left{
                width: 100vw;
                padding-bottom: 60px;
            }
            section{
                padding-left: 12px;
                padding-right: 12px;
            }

            .novel-section-header {
                padding: 8px 0px 4px 0px;
            }

            .novel-section-list{
                flex-direction: column;
            }
            .novel-section-list-item-cover{
                width: 22vw;
                height: 29.3vw;
            }


            .novel-section-list-item-info{
                width: 70vw;
                padding-top: 0px;
            }


            .item-info-name{
                font-size: 16px;
            }
            .item-info-author{
                padding-top: 4px;
            }
            .item-info-desc{
                display: block;
            }
            .novel-section-list-item{

                border-bottom: 1px solid rgba(0, 0, 0, 0.1);
                overflow: visible;
                padding-left: 0px;
                padding-bottom: 8px;


            }
        }
    </style>
@endsection