/*首页脚本*/

/*全局变量定义*/

//var app = angular.module('app',[]);
//app.controller('indexCtl', function($scope,$http) {
//	 $scope.loadMore=function(){
//	    	$http({
//	    		method:'post',
//		    	url:'/book/get_section',
//		    	params:{"sectionId":sectionId,"index":pageIndex,"size":pageSize}
//	    	}).then(function successCallback(res){
//			    	if (res.data.code==200) {
//			    		if (res.data.data.books.length>0) {
//			    			$scope.books.push(res.data.data.books);
//			    		}
//					}
//			    },function errorCallback(res) {
//			        // 请求失败执行代码
//			    });
//	 }
//
//});
//
//app.directive ('whenScrolled', function () {
//    return function ( scope, elm, attr ) {
//
//        var raw = $(window);
//        elm.bind ('scroll', function () {
//            if ( raw.scrollTop + raw.offsetHeight >= raw.scrollHeight ) {
//            	if(flag==flase){
//            		flag=true;
//            		pageIndex+=1;
//            		scope.$apply (attr.whenScrolled);
//            	}
//
//            }
//        });
//    };
//});






var pageIndex=1;
var pageSize=6;
var sectionId=3;
var flag=false;
$(function(){
    checkLogin();
    init();
    $(window).scroll(function () {
        var scrollTop = $(this).scrollTop();
        var docHeight = $(document).height();
        var windowHeight = $(this).height();
        var leftHeight=docHeight-scrollTop-windowHeight;
        if((leftHeight)<(windowHeight*0.4)){
            if(flag==false){
                flag=true;
                pageIndex=pageIndex+1;
                loadRankingData(sectionId,pageIndex,pageSize);
            }

        }
    });
    $('#home-tabbar-img-new').attr('src',"http://47.97.112.180/static/images/tabbar_home_selected.png");
})

function init(){
    $("#nav-search-new").autosuggest({
        url: '/book/search',
        minLength: 1,
        maxNum: 10,
        highlight:true,
        align: 'left',
        menuClass:'searchMenu',
        queryParamName: 'bookName',
        method: 'post',
        nextStep: function (e) {
        },
        split: ' '
    });

    $(document).click(function(e){
        if($(e.target).attr('id')!='nav-search-new'){
            $('.searchMenu').hide();
        }
    });
    $('.carousel-inner-active:eq(0)').addClass('active');
    $('.carousel').carousel({
        interval: 4000,

    })

}






function loadRankingData(sectionId,pageIndex,pageSize){
    $.ajax({
        url:"/cartoons/get_section",
        data:{"sectionId":sectionId,"page":pageIndex,"size":pageSize},
        type:'get',
        cache:true,
        dataType:'JSON',
        success:function(result){
            if(result.code!="200"){
                alert(result.msg);
            }else{
                //console.log(result.data.books);
                if(result.data.books.length>0){
                    createpage(result.data.books);
                }
            }
        }

    });
}

var baseBook='<div class="sessions-books-list-item-end-new">'+
    '	<a class="sessions-books-list-item-link-new" href="/book/webBookDetail/t_bookId">'+
    '		<img class="img-placeholder book-cover-new" alt="t_bookName封面图片" src="t_portraitIcon">'+
    '		<span class="sessions-books-list-item-link-name">t_bookName</span>'+
    '	</a>'+
    '</div>';

function createpage(data){

    var temps="";
    for(var i in data){
        var temp=baseBook;
        temp=temp.replace(/t_bookId/,data[i].id);
        temp=temp.replace(/t_portraitIcon/,data[i].cover);
        temp=temp.replace(/t_bookName/g,data[i].title);
        temps+=temp;
    }
    $('#end-scrolled-new').append(temps);
    flag=false;

}
function formSearch(bookId){

    window.location.href='/book/webBookDetail/'+bookId;
}