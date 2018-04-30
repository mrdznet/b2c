$(function(){
    getlist()
})

 function getlist(){
    var order = $("#order").val();
    var sort = $("#sort").val();
    var min_price = $("#min_price").val();
    var max_price = $("#max_price").val();
    var attr = $("#attr").val();
    var spec = $("#spec").val();
    var brand_id = $("#brand_id").val();
        var page = 1, pageSize = 8;
        var loadMore = function (callback) {
            $.ajax({
                type:"post",
                url:__URL(APPMAIN+'/Goods/groupBuyingArea'),
                async : true,
                data: {
                    category_id:$("#category_id").val(),
                    brand_id:brand_id,
                    obyzd:order,
                    st:sort, 
                    mipe : min_price,
                    mape : max_price,
                    attr : attr,
                    spec : spec,
                    page: page,
                    pagesize: pageSize
                },
                success: function (ret) {
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
                    if (list.length>0) {
                        for (var i = 0; i < list.length; i++) {
                        var html = html+'<a href="'+__URL(APPMAIN+'/goods/grouppurchase?id='+list[i]['goods_id'])+'" class="list-item">'
                                        +'<div class="list-img">'
                                        +'<img src="'+__IMG(list[i].picture.pic_cover_small)+'">'
                                        +'</div>'
                                        +'<div class="list-mes">'
                                        +'<h3 class="list-title">'+list[i].goods_name+'</h3>'
                                        +' <div class="list-mes-item">'
                                        +'<div>'
                                        +'<span class="list-price"><em>¥</em>'+list[i].group_price+'</span>'
                                        +'</div>'
                                        +'<div><span class="badge badge-radius badge-danger">团购价</span></div>'
                                        +'</div>'
                                        +'</div>'
                                        +'</a>'
                        }
                        $('#J_ListContent').append(html);
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

