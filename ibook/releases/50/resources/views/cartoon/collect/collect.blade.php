@extends('cartoon.partials._layout')

@section('content')

<div class="mycontainer ">
    @include('cartoon.partials._bookcase_nav')
</div>
<div class="novel-section-header">

</div>

<div class="mycontainer novel-main">
    <div class="novel-main-left">
        <section>
            <div class="novel-section-list">
                @foreach ($infos as $value)
                    <div class="novel-section-list-item" id="book-list-{{$value->cartoon_id}}">
                        <span class="novel-section-list-item-cover">
                            <a href="{{route('cartoon.detail',[$value->cartoon_id])}}"><img class="global-img-cover img-placeholder" alt="" src="{{\helpers\img_url($value->cartoon->cover ?? '')}}"></a>
                        </span>
                        <span class="novel-section-list-item-info">
                            <span class="item-info-name">
                                <span class="item-info-novel-name ">{{$value->cartoon->title ?? ''}}</span>
                                <span class="item-info-author hide">
                                <span>{{$value->cartoon->author ?? ''}}</span>
                                </span>
                                <span class="item-info-author">
                                    <span class="item-info-hit">{{$value->cartoon->tags ?? ''}}&nbsp;&nbsp;&nbsp;</span>
                                </span>
                                <span class="item-info-author">
                                    <span class="item-info-desc item-info-novel-name item-info-novel-fixed">{{$value->cartoon->intro ?? ''}}</span>
                                </span>
                                <span class="item-info-author">
                                    <span class="item-info-desc item-info-novel-name item-info-novel-fixed">
                                        <button class="detail-book-other-item-btn continue" data-cartoon="{{$value->cartoon_id}}" data-chapter="{{$value->history->chapter_id ?? 0}}">继续阅读</button>
                                        <button class="detail-book-other-item-btn delete" data-cartoon="{{$value->cartoon_id}}">删除</button>
                                    </span>
                                </span>
                            </span>
                        </span>
                    </div>
                @endforeach
            </div>
        </section>
    </div>
</div>

@include('cartoon.partials._footer')

@endsection


@section('scripts')

	<script>

        // $(function(){
        //     init();
        // });
        //
        //
        // function init(){
        //     $("#nav-search-new").autosuggest({
        //         url: '/book/search',
        //         minLength: 1,
        //         maxNum: 10,
        //         highlight:true,
        //         align: 'left',
        //         menuClass:'searchMenu',
        //         queryParamName: 'bookName',
        //         method: 'post',
        //         nextStep: function (e) {
        //         },
        //         split: ' '
        //     });
        //
        //     $(document).click(function(e){
        //         if($(e.target).attr('id')!='nav-search-new'){
        //             $('.searchMenu').hide();
        //         }
        //     });
        //
        //     $('#novel-tabbar-img-new').attr('src',"https://static.mina360.com/images/tabbar_novel_selected.png");
        //
        //     $('.global-img-cover').mouseenter(function(){
        //         $(this).removeClass('book-cover-anim-out-new').addClass('book-cover-anim-in-new');
        //     })
        //     $('.global-img-cover').mouseleave(function(){
        //         $(this).removeClass('book-cover-anim-in-new').addClass('book-cover-anim-out-new');
        //     })
        // }
        $('.continue').on('click',function(){
            var cartoonId = $(this).data('cartoon');
            var chapterId = $(this).data('chapter');
            window.location = "/chapters/" + cartoonId + "/" + chapterId
        })

        $('.delete').on('click',function(){
            var cartoonId = $(this).data('cartoon');
            var conf = confirm('确认删除?');
            if (!conf) {
                return false;
            }
            $.ajax({
                url:'/collect/delete',
                type:'post',
                data:{'cartoonId':cartoonId},
                success:function(result){
                    if(result.code=='200'){
                        $('#book-list-' + cartoonId).remove();
                        showToastr(result.msg);
                    }
                },
            })
        });

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
        .detail-book-other-item-btn {
            font-size: 14px;
            color: white;
            background-color: #9664D5;
            padding: 8px 12px;
            border-radius: 8px;
        }
    </style>
@endsection