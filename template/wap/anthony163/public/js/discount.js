$(function(){
    getlist();
    countDown();
})

 function getlist(){
        var page = 1, pageSize = 14;
        var loadMore = function (callback) {
            $.ajax({
               type : "get",
                url:__URL(APPMAIN+'/Index/discount'),
                dataType:'json',
                data: {
                    category_id:0,
                    page: page,
                    pagesize: pageSize
                },
                success: function (ret) {
                    console.log(ret);
                    typeof callback == 'function' && callback(ret.data);
                }
            });
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
                    if (list.length > 0) {
                        for (var i = 0; i < list.length; i++) {
                            var html = html+'<a href="'+__URL(APPMAIN+'/goods/goodsdetail?id='+list[i]['goods_id'])+'" class="list-item">'
                                        +'<div class="list-img">'
                                        +'<img src="'+__IMG(list[i].picture.pic_cover_small)+'">'
                                        +'</div>'
                                        +'<div class="list-mes">'
                                        +'<h3 class="list-title">'+list[i].goods_name+'</h3>'
                                        +' <div class="list-mes-item">'
                                        +'<div>'
                                        +'<span class="list-price"><em>¥</em>'+list[i].promotion_price+'</span>'
                                        +'<span class="list-del-price">¥'+list[i].price+'</span>'
                                        +'</div>'
                                        +'<div><i class="icon-time"></i><span class="settime" starttime="'+timeStampTurnTime(list[i].start_time)+'" endtime="'+timeStampTurnTime(list[i].end_time)+'"></span></div>'
                                        +'</div>'
                                        +'</div>'
                                        +'</a>'
                            
                        }
                        $('#J_ListContent').append(html);
                        countDown();
                        def.resolve(list);
                         ++page;
                    }else{
                        var html = html+'<div class="list-donetip">暂无数据</div>'
                        $('#J_ListContent').html(html);
                        def.resolve(html);
                    }

                });
                return def.promise();
            }
        });
    }

//倒计时函数
function countDown(){
    $(".settime").each(function(i) {
        var self = $(this);
        var end_date = this.getAttribute("endTime"); //结束时间字符串
        if(end_date != undefined && end_date != ''){
            var end_time = new Date(end_date.replace(/-/g,'/')).getTime();//月份是实际月份-1
            var sys_second = (end_time-$("#ms_time").val())/1000;
            if(sys_second>1){
                sys_second -= 1;
                var day = Math.floor((sys_second / 3600) / 24);
                var hour = Math.floor((sys_second / 3600) % 24);
                var minute = Math.floor((sys_second / 60) % 60);
                var second = Math.floor(sys_second % 60);
                self.html(day + "天" + ( hour<10 ? "0" + hour : hour ) + "秒" + (minute<10?"0"+minute:minute) + "分" + (second<10?"0"+second:second) + "秒");
            }
            var timer = setInterval(function(){
                if (sys_second > 1) {
                    sys_second -= 1;
                    var day = Math.floor((sys_second / 3600) / 24);
                    var hour = Math.floor((sys_second / 3600) % 24);
                    var minute = Math.floor((sys_second / 60) % 60);
                    var second = Math.floor(sys_second % 60);
                    self.html(day + "天" + (hour<10?"0"+hour:hour) + "小时" + (minute<10?"0"+minute:minute) + "分" + (second<10?"0"+second:second) + "秒"); 
                } else { 
                    self.html("活动已经结束啦！");
                    clearInterval(timer);
                }
            }, 1000);
        }
    });
}