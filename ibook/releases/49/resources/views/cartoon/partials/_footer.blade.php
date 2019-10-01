<div class="mycontainer home-tabbar-new ">

    <div class="home-tabbar-item-new">
        <a href="{{url('/')}}">
            <img id="home-tabbar-img-new" class="home-tabbar-icon-new" alt="" src="{{asset(Request::is('/') ? 'static/images/tabbar_home_selected.png' : 'static/images/tabbar_home.png')}}">
        </a>
    </div>
    <div class="home-tabbar-item-new">
        {{--<a href="javascript:showToastr('正在建设尽请期待')">--}}
        <a href="{{route('history')}}">
            <img class="home-tabbar-icon-new" alt="" src="{{asset('static/images/tabbar_bookshelf.png')}}">
        </a>
    </div>
    <div class="home-tabbar-item-new">
        <a href="{{route('mine')}}">
            <img class="home-tabbar-icon-new" alt="" src="{{asset(Request::is('mine') ? 'static/images/tabbar_mine_selected.png' : 'static/images/tabbar_mine.png')}}">
        </a>
    </div>

</div>