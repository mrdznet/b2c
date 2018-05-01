 
 $(document).ready(function(){
        getlist(1)
        $("#tab li").on("click",function(){
            $('#J_ListContent').empty();
            var id=$(this).data("class-id");
            $('.list-donetip').css('display','none')
            getlist(id)
            $("#tab li").removeClass("avtive");
            $(this).addClass("avtive"); 
            var article_class_id = $(this).data("class-id");
        })
    })

$(function(){
   
})
var is_load =true;

 function getlist(val){
        var page = 1, pageSize = 14;
        var loadMore = function (callback) {
            if (is_load) {
                is_load = false;
                $.ajax({
                    type:"post",
                    url:__URL(APPMAIN+'/Articlecenter/getArticleList'),
                    async : true,
                    data: {
                        class_id:val,
                        page: page,
                        pagesize: pageSize
                    },
                    success: function (ret) {
                        console.log(ret);   
                        typeof callback == 'function' && callback(ret.data);
                    }
                });
            }
        };

        $('#J_List').infiniteScroll({
            binder: '#J_List',
            pageSize: pageSize,
            initLoad: true,
            loadingHtml: '<img src="http://static.ydcss.com/uploads/ydui/loading/loading10.svg"/>',
            loadListFn: function () {
                var def = $.Deferred();
                loadMore(function (list) {
                    html = "";
                    if (list.length>0){
                    for (var i = 0; i < list.length; i++) {
                        var html = html+'<a href="'+__URL(APPMAIN+'/Articlecenter/articlecontent?article_id='+list[i]['article_id'])+'" class="list-item">'
                                        +'<div class="list-img">'
                                        +'<img src="http://static.ydcss.com/uploads/ydui/goods_default.jpg" data-url="'+__IMG(list[i].image)+'" style="height:2rem;">'
                                        +'</div>'
                                        +'<div class="list-mes">'
                                        +'<h3 class="list-title">'+list[i].title+'</h3>'
                                        +' <div class="list-mes-item">'
                                        +'<div>'
                                        +'<span class="list-price" style="color:#ccc;">'+list[i].author+'</span>'
                                        +'</div>'
                                        +'<div>'+ timeStampTurnTime(list[i]['create_time']) +'</div>'
                                        +'</div>'
                                        +'</div>'
                                        +'</a>'
                        }
                    $('#J_ListContent').append(html).find('img').lazyLoad({binder: '#J_List'});
                    is_load =true;
                    def.resolve(list);
                    ++page;
                    }else{
                        var html = html+'<div class="list-donetip">暂无数据</div>';
                        is_load =true;
                        $('#J_ListContent').html(html);
                        def.resolve(html);
                    }
                });

                return def.promise();
            }
        });
    }

//时间戳转时间类型
function timeStampTurnTime(timeStamp){
    if(timeStamp > 0){
        var date = new Date();  
        date.setTime(timeStamp * 1000);  
        var y = date.getFullYear();      
        var m = date.getMonth() + 1;      
        m = m < 10 ? ('0' + m) : m;      
        var d = date.getDate();      
        d = d < 10 ? ('0' + d) : d;      
        var h = date.getHours();    
        h = h < 10 ? ('0' + h) : h;    
        var minute = date.getMinutes();    
        var second = date.getSeconds();    
        minute = minute < 10 ? ('0' + minute) : minute;      
        second = second < 10 ? ('0' + second) : second;     
        return y + '-' + m + '-' + d+' '+h+':'+minute+':'+second;       
    }else{
        return "";
    }       
}
