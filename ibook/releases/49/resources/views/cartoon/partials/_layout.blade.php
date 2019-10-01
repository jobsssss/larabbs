@php
$qd_version = Cache::rememberForever('qd_version',function() {
    return date('YmdHis') . \Illuminate\Support\Str::random(6);
});
@endphp
<!DOCTYPE html>
<html>
<head>
    <title>@section('title')韩漫-韩国漫画在线阅读 @show</title>
    <meta charset="UTF-8">
    <meta name="keyword" content="@section('keyword')韩漫,韩国漫画,无修无删减,免费，喔喔漫画@show">
    <meta name="description" content="@section('description') 韩漫-无修无删减韩国漫画在线阅读 @show">
    <meta property="og:description" content="@section('description') 韩漫-无修无删减韩国漫画在线阅读 @show">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name=”applicable-device”content=”pc,mobile”>
    <meta name="shenma-site-verification" content="72c1b228d84081ba0a19deda99943728_1550456257">
    {{--<meta name="csrf-token" content="{{ csrf_token() }}">--}}
    <link href="{{asset('css/app.css')}}?version={{$qd_version}}" rel="stylesheet" />
    @yield('styles')
</head>

<body>
    @yield('content')
<script type="text/javascript" src="{{asset('js/app.js')}}?version={{$qd_version}}"></script>
@yield('scripts')
<script>
    // $.ajaxSetup({
    //     headers: {
    //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //     }
    // });

    var _hmt = _hmt || [];
    (function() {
        var hm = document.createElement("script");
        hm.src = "https://hm.baidu.com/hm.js?f2aea6a505bd506d792f34f03a3fae84";
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(hm, s);
    })();
</script>
</body>
</html>