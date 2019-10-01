$(function(){
    var result = window.matchMedia('(max-width:980px)');
    if(result.matches){
        //$('body').append(baseStr);
    }
    $('.app-tip-container').css({
        'position': 'fixed',
        'bottom': '55px',
        'width':'100%',
        'z-index':'1000',

    })
    $('.app-tip').css({
        'display': 'flex',
        'align-items': 'center',
        'justify-content': 'space-between',
        'width': '100%',
        'padding-bottom': '5px',
        'padding-top':'5px',
        'padding-left':' 5px',
        'border-top':'0.5px solid rgba(0,0,0,0.2)',
        'border-left':'0.5px solid rgba(0,0,0,0.2)',
        'box-shadow': '4px 4px 2px rgba(0,0,0,0.3)',
        'border-radius': '5px',
        'background-color':'white',
    })
    $('.app-left').css({
        'display': 'flex',
        'align-items': 'center',
        'justify-content': 'space-between',
        'padding-left': '10px',
    })
    $('.app-icon').css({
        'width': '60px',
        'height': '60px',
        'border-radius': '15px',
        'border': '1px solid rgba(0,0,0,0.3)',

    })

    $('.app-desc').css({
        'font-size': '16px',
        'color': '#9664D5',
        'line-height': '24px',
        'margin-left': '20px',
        'margin-bottom': '0px',
    })

    $('.app-right-btn').css({
        'margin-right': '10px',
        'background-color':'#9664D5',
        'color':'white',

    })

    $('.app-close').css({
        'width':'24px',
        'height':'24px',
        'display': 'inline-block',
        'position': 'absolute',
        'right': '0px',
        'top':'-12px',
        'background': 'rgba(0,0,0,0) url("http://47.97.112.180/static/images/app_close.png") no-repeat',
        'background-size':'24px 24px'
    })

    $('.app-close').click(function(){
        $('.app-tip-container').hide();
        localStorage.setItem('blcomics_app_download_flag',Date.parse(new Date())/1000);
    })

    var old=localStorage.getItem('blcomics_app_download_flag');
    var time = Date.parse(new Date())/1000;
    if((time-old)>1*60*60){
        $('.app-tip-container').show();

    }else{
        $('.app-tip-container').hide();
    }

});
var baseStr='<div class="container app-tip-container">'+
    '<div class="row">'+
    '<div class="col-md-6 col-md-offset-4 col-xs-12">'+
    '	<div class="app-tip">'+
    '		<div class="app-left">'+
    '			<img class="app-icon" alt="appicon" src="http://47.97.112.180/static/images/app_icon.png">'+
    '			<p class="app-desc">下载app畅快阅读</p>'+
    '		</div>'+
    '		<div class="app-right">'+
    '			<a class="btn btn-default app-right-btn" href="/page/app_down.html">下载</a>'+
    '			<span class="app-close">'+
    '			</span>'+
    '		</div>'+
    '		</div>'+
    '	</div>'+
    '</div>	'+
    '</div>';