<div class="row">
    <div class="col-md-6 col-md-offset-3 col-xs-12 user-info">
        <div>
            <span><a class="{{Request::is('history') ? 'active' :''}}" href="{{route('history')}}">历史记录</a></span>
        </div>
        <div class="user-header-sp">
        </div>
        <div>
            <span><a class="{{Request::is('collect') ? 'active' :''}}" href="{{route('collect')}}">收藏</a></span>
        </div>
    </div>
</div>