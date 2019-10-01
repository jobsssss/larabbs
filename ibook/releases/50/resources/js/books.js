/*book list diplay sheet*/
var sectionId=-1;
var pageSize=16;
var totalpage;
var flag=false;
var mainurl='/cartoons/get_section';

$(function(){

    //初始化页面
    //sectionId= UrlParam.paramValues("sectionId");
    //var sectionName= UrlParam.paramValues("sectionName");

    sectionId=getParamvalue("sectionId");
    var sectionName=getParamvalue("sectionName");
    $('title').text(sectionName);
    $('.nav-books-header-1').text(sectionName);
    //默认加载第一页
    var pageindex=1;
    initpage(sectionId,pageindex,pageSize);

    //下拉加载
    $(window).scroll(function () {
        var scrollTop = $(this).scrollTop();
        var docHeight = $(document).height();
        var windowHeight = $(this).height();
        var leftHeight=docHeight-scrollTop-windowHeight;
        if((leftHeight)<(windowHeight*0.4)){
            if(flag==false){
                flag=true;
                pageindex=pageindex+1;
                initpage(sectionId,pageindex,pageSize);
            }

        }
    });


    //changeImg();
    //调整.img-update
    //resetUpdateInfo();

})



/*请求数据*/
function initpage(sectionId,page,pageSize){

    $.ajax({
        url:mainurl,
        data:{"sectionId":sectionId,"index":page,"size":pageSize},
        type:'post',
        cache:true,
        dataType:'JSON',
        success:function(result){
            if(result.code!="200"){
                alert(result.msg);
            }else{
                if(result.data.books.length>0){
                    createpage(result.data.books);
                }else{
                    $('#theend').show();
                }
            }
        }

    });
}
/*生成界面*/
function createpage(books){
    var currentIps=getAliveIps();
    var items="";
    for(var i in books){
        var temp=itemStr;
        temp=temp.replace(/t_bookId/g,books[i].id);
        temp=temp.replace(/t_picon/g,books[i].portraitIcon);
        temp=temp.replace(/t_bookName/g,books[i].bookName);
        temp=temp.replace(/t_words/g,books[i].keyWords);
        if(books[i].lastChapter<0){
            temp=temp.replace(/t_lastcpater/g,"完结");
        }else{
            temp=temp.replace(/t_lastcpater/g,books[i].lastChapter+"话");
        }

        temp=temp.replace(/t_summary/g,books[i].intro);
        temp=temp.replace(/t_author/g,books[i].authorName);
        items=items+temp;
    }
    $('.books-list-new').append(items);
    flag=false;

}


var itemStr='<a href="/book/webBookDetail/t_bookId" class="books-list-item-new">'+
    '	<div  class="books-list-item-cover">'+
    '		<img class="img-placeholder global-img-p" alt="t_bookName,韩国漫画封面" src="http://47.99.120.184/t_picon">'+
    '	</div>'+
    '	<div class="books-list-item-info-new grad-new">'+
    '		<h2 class="books-list-item-info-update">t_bookName</h2>'+
    '		<div class="books-list-item-info-name ">'+
    '			<span class="books-list-item-info-type">t_words</span>'+
    '			<span class="books-list-item-info-cps">t_lastcpater</span>'+
    '			<span class="hide">内容:t_summary</span>'+
    '			<span class="hide">作者:t_author</span>'+
    '		</div>'+
    '	</div>'+
    '</a>';
