<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:48:"template/wap\anthony163\Member\myCollection.html";i:1525163017;s:33:"template/wap\anthony163\base.html";i:1525091987;s:32:"template/wap\anthony163\url.html";i:1525091987;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>首页</title>
    <meta content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0" name="viewport"/>
    <meta content="yes" name="apple-mobile-web-app-capable"/>
    <meta content="black" name="apple-mobile-web-app-status-bar-style"/>
    <meta content="telephone=no" name="format-detection"/>
    <link rel="stylesheet" href="__TEMP__/<?php echo $style; ?>/public/css/ydui.css"/>
    


    <script src="__TEMP__/<?php echo $style; ?>/public/js/ydui.flexible.js"></script>
</head>
<body>
<input type="hidden" value="<?php echo $uid; ?>" id="uid"/>
<input type="hidden" id="niushop_rewrite_model" value="<?php echo rewrite_model(); ?>">
<input type="hidden" id="niushop_url_model" value="<?php echo url_model(); ?>">
<script>
// 全局定义
var CSS = "__TEMP__/<?php echo $style; ?>/public/css";
var APPMAIN='APP_MAIN';
var UPLOADAVATOR = 'UPLOAD_AVATOR';//存放用户头像
var UPLOADCOMMON = 'UPLOAD_COMMON';
var SHOPMAIN = "SHOP_MAIN";
var UPLOADCOMMENT = '<?php echo UPLOAD_COMMENT; ?>';// 存放评论
var temp = "__TEMP__/";//外置JS调用
var STATIC = "__STATIC__";
function __URL(url)
{
    url = url.replace('SHOP_MAIN', '');
    url = url.replace('APP_MAIN', 'wap');
    if(url == ''|| url == null){
        return 'SHOP_MAIN';
    }else{
        var str=url.substring(0, 1);
        if(str=='/' || str=="\\"){
            url=url.substring(1, url.length);
        }
        if($("#niushop_rewrite_model").val()==1 || $("#niushop_rewrite_model").val()==true){
            return 'SHOP_MAIN/'+url;
        }
        var action_array = url.split('?');
        //检测是否是pathinfo模式
        url_model = $("#niushop_url_model").val();
        if(url_model==1 || url_model==true)
        {
            var base_url = 'SHOP_MAIN/'+action_array[0];
            var tag = '?';
        }else{
            var base_url = 'SHOP_MAIN?s=/'+ action_array[0];
            var tag = '&';
        }
        if(action_array[1] != '' && action_array[1] != null){
            return base_url + tag + action_array[1];
        }else{
             return base_url;
        }
    }
}
/**
 * 处理图片路径
 */
function __IMG(img_path){
    var path = "";
    if(img_path != undefined && img_path != ""){
        if(img_path.indexOf("http://") == -1 && img_path.indexOf("https://") == -1){
            path = "__UPLOAD__\/"+img_path;
        }else{
            path = img_path;
        }
    }
    return path;
}
</script>
<!--内容-->

<section class="g-flexview">
    <header class="m-navbar">
        <a href="javascript:window.history.go(-1)" class="navbar-item"><i class="back-ico"></i></a>
        <div class="navbar-center"><span class="navbar-title">我的收藏</span></div>
    </header>
    <section class="g-scrollview" id="J_List">
        <div class="m-tab">
            <ul class="tab-nav">
                <li class="tab-nav-item tab-active" data-type="0"><a href="javascript:;">全部</a></li>
                <li class="tab-nav-item" data-type="1"><a href="javascript:;">本周</a></li>
                <li class="tab-nav-item" data-type="2"><a href="javascript:;">本月</a></li>
                <li class="tab-nav-item" data-type="3"><a href="javascript:;">本年</a></li>
            </ul>
        </div>
        <div id="J_ListContent" class="m-list list-theme4"></div>
    </section>
</section>

<input type="hidden" id="page_count"><!-- 总页数 -->
<input type="hidden" id="page" value="1"><!-- 当前页数 -->
<input type="hidden" id="type" value="0">

<!--内容结束-->
<script src="__TEMP__/<?php echo $style; ?>/public/js/jquery214.min.js"></script>
<script src="__TEMP__/<?php echo $style; ?>/public/js/common.js"></script>
<script src="__TEMP__/<?php echo $style; ?>/public/js/ydui.js"></script>



<script>
$(function(){
    loadingInfo(0);
})
$(".tab-nav .tab-nav-item").click(function(){
    $(".tab-nav .tab-nav-item").removeClass("tab-active");
    $(this).addClass("tab-active");
    var type = $(this).attr("data-type");
    loadingInfo(type);
})
var is_load = false;//防止重复加载
var APPMAIN = "APP_MAIN";
function loadingInfo(type){
        var page = 1, pageSize = 14;
        var loadMore = function (callback) {
            if (is_load) {
                is_load = false;
                $.ajax({
                    type:"post",
                    url:__URL(APPMAIN + "/member/myCollection"),
                    async : true,
                    data: {
                        "type":type,
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
                        // for (var i = 0; i < list.length; i++) {
                        //     var html = html+'<a href="'+__URL(APPMAIN+'/Articlecenter/articlecontent?article_id='+list[i]['article_id'])+'" class="list-item">'
                        //                     +'<div class="list-img">'
                        //                     +'<img src="http://static.ydcss.com/uploads/ydui/goods_default.jpg" data-url="'+__IMG(list[i].image)+'" style="height:2rem;">'
                        //                     +'</div>'
                        //                     +'<div class="list-mes">'
                        //                     +'<h3 class="list-title">'+list[i].title+'</h3>'
                        //                     +' <div class="list-mes-item">'
                        //                     +'<div>'
                        //                     +'<span class="list-price" style="color:#ccc;">'+list[i].author+'</span>'
                        //                     +'</div>'
                        //                     +'<div>'+ timeStampTurnTime(list[i]['create_time']) +'</div>'
                        //                     +'</div>'
                        //                     +'</div>'
                        //                     +'</a>'
                        //     }
                        // $('#J_ListContent').append(html).find('img').lazyLoad({binder: '#J_List'});
                        // is_load =true;
                        // def.resolve(list);
                        // ++page;
                        console.log(list);
                    });

                    return def.promise();
                }
            });
}
</script>


</body>
</html>
