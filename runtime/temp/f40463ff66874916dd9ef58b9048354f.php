<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:49:"template/wap\default_new\Member\myCollection.html";i:1525091987;s:34:"template/wap\default_new\base.html";i:1525091987;s:38:"template/wap\default_new\urlModel.html";i:1525091988;}*/ ?>
<!DOCTYPE html>
<html>
<head>
<meta name="renderer" content="webkit" />
<meta http-equiv="X-UA-COMPATIBLE" content="IE=edge,chrome=1"/>
<meta content="text/html; charset=UTF-8">
<meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="format-detection" content="telephone=no">
<title><?php if($title_before != ''): ?><?php echo $title_before; ?>&nbsp;-&nbsp;<?php endif; ?><?php echo $platform_shopname; if($seoconfig['seo_title'] != ''): ?>-<?php echo $seoconfig['seo_title']; endif; ?></title>
<meta name="keywords" content="<?php echo $seoconfig['seo_meta']; ?>" />
<meta name="description" content="<?php echo $seoconfig['seo_desc']; ?>"/>
<link rel="shortcut  icon" type="image/x-icon" href="__TEMP__/<?php echo $style; ?>/public/images/favicon.ico" media="screen"/>
<link rel="stylesheet" type="text/css" href="__TEMP__/<?php echo $style; ?>/public/css/pre_foot.css">
<link rel="stylesheet" type="text/css" href="__TEMP__/<?php echo $style; ?>/public/css/pro-detail.css">
<link rel="stylesheet" type="text/css" href="__TEMP__/<?php echo $style; ?>/public/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="__TEMP__/<?php echo $style; ?>/public/css/showbox.css">
<link rel="stylesheet" href="__TEMP__/<?php echo $style; ?>/public/css/layer.css" id="layuicss-skinlayercss">
<script src="__TEMP__/<?php echo $style; ?>/public/js/showBox.js"></script>
<script src="__TEMP__/<?php echo $style; ?>/public/js/jquery.js"></script>
<script src="__TEMP__/<?php echo $style; ?>/public/js/jquery.lazyload.js"></script>
<script type="text/javascript" src="__TEMP__/<?php echo $style; ?>/public/js/layer.js"></script>
<script src="__STATIC__/js/load_task.js" type="text/javascript"></script>
<script src="__STATIC__/js/load_bottom.js" type="text/javascript"></script>
<script src="__STATIC__/js/time_common.js" type="text/javascript"></script>
<script type="text/javascript">
var CSS = "__TEMP__/<?php echo $style; ?>/public/css";
var APPMAIN='APP_MAIN';
var UPLOADAVATOR = 'UPLOAD_AVATOR';//存放用户头像
var UPLOADCOMMON = 'UPLOAD_COMMON';
var SHOPMAIN = "SHOP_MAIN";
var UPLOADCOMMENT = '<?php echo UPLOAD_COMMENT; ?>';// 存放评论
var temp = "__TEMP__/";//外置JS调用
var STATIC = "__STATIC__";
$(function(){
	img_lazyload();
});

//页面底部选中
function bottomActive(event){
	clearButton();
	if(event == "#bottom_home"){
		$("#bottom_home").find("img").attr("src","__TEMP__/<?php echo $style; ?>/public/images/home_check.png");
	}else if(event == "#bottom_classify"){
		$("#bottom_classify").find("img").attr("src","__TEMP__/<?php echo $style; ?>/public/images/classify_check.png");
	}else if(event == "#bottom_stroe"){
		$("#bottom_stroe").find("img").attr("src","__TEMP__/<?php echo $style; ?>/public/images/store_check.png");
	}else if(event == "#bottom_cart"){
		$("#bottom_cart").find("img").attr("src","__TEMP__/<?php echo $style; ?>/public/images/cart_check.png");
	}else if(event == "#bottom_member"){
		$("#bottom_member").find("img").attr("src","__TEMP__/<?php echo $style; ?>/public/images/user_check.png");
	}
}

function clearButton(){
	$("#bottom_home").find("img").attr("src","__TEMP__/<?php echo $style; ?>/public/images/home_uncheck.png");
	$("#bottom_classify").find("img").attr("src","__TEMP__/<?php echo $style; ?>/public/images/classify_uncheck.png");
	$("#bottom_stroe").find("img").attr("src","__TEMP__/<?php echo $style; ?>/public/images/store_uncheck.png");
	$("#bottom_cart").find("img").attr("src","__TEMP__/<?php echo $style; ?>/public/images/cart_uncheck.png");
	$("#bottom_member").find("img").attr("src","__TEMP__/<?php echo $style; ?>/public/images/user_uncheck.png");
}

//图片懒加载
function img_lazyload(){
	$("img.lazy_load").lazyload({
		threshold : 0,
		effect : "fadeIn", //淡入效果
		skip_invisible : false
	})
}
</script>
<style>
body{max-width: 640px;}
body .sub-nav.nav-b5 dd i {margin: 3px auto 5px auto;}
body .fixed.bottom {bottom: 0;}
.mask-layer-loading{position: fixed;width: 100%;height: 100%;z-index: 999999;top: 0;left: 0;text-align: center;display: none;}
.mask-layer-loading i,.mask-layer-loading img{text-align: center;color:#000000;font-size:50px;position: relative;top:50%;}
.sub-nav.nav-b5 dd{width:25%;font-size:14px;}
*{user-select: text;-webkit-user-select: text;-moz-user-select: text;}
</style>

    <link rel="stylesheet" type="text/css" href="__TEMP__/<?php echo $style; ?>/public/css/goodsCollection.css">

</head>
<input type="hidden" id="niushop_rewrite_model" value="<?php echo rewrite_model(); ?>">
<input type="hidden" id="niushop_url_model" value="<?php echo url_model(); ?>">
<script>
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
<body class="body-gray" style="margin:auto;">
	
<section class="head">
	<a class="head_back" id="backoutapp" href="<?php echo __URL('APP_MAIN/member/index?shop_id='.$shop_id); ?>"><i class="icon-back"></i></a>
	<div class="head-title"><?php echo lang('my_collection'); ?></div>
</section>

	
	<!-- showBox弹出框 -->
	<div class="motify" style="display: none;">
		<i class="show_type warning"></i>
		<div class="motify-inner"><?php echo lang('pop_up_prompt'); ?></div>
	</div>

	
<div class="cf-container" data-reactid="2">
	<div class="cf-edge" data-reactid="3"></div>
	<ul class="cf-content" data-reactid="4">
		<li class="cf-tab-item select" data-type="0"><a href="javascript:;">全部</a></li>
		<li class="cf-tab-item" data-type="1"><a href="javascript:;">本周</a></li>
		<li class="cf-tab-item" data-type="2"><a href="javascript:;">本月</a></li>
		<li class="cf-tab-item" data-type="3"><a href="javascript:;">本年</a></li>
	</ul>
</div>
<section class="collection_goods_list">
	
</section>
<input type="hidden" id="page_count"><!-- 总页数 -->
<input type="hidden" id="page" value="1"><!-- 当前页数 -->
<input type="hidden" id="type" value="0">

<script>
$(function(){
	loadingInfo(1,0);
})
$(".cf-content li").click(function(){
	$(".cf-content li").removeClass("select");
	$(this).addClass("select");
	var type = $(this).attr("data-type");
	loadingInfo(1,type);
})
var APPMAIN = "APP_MAIN";
var is_load = false;//防止重复加载
function loadingInfo(page,type){
	$("#page").val(page);//设置当前页
	$("#type").val(type);//保存当前状态
	if(is_load){
		return false;
	}
	is_load = true;
	$.ajax({
		type : "post",
		url : __URL(APPMAIN + "/member/myCollection"),
		data : {"page" : page, "type" : type},
		success : function(data){
			$("#page_count").val(data['page_count']);//总页数
			if(page == 1){
				var html="";
			}else if(page > 1){
				var html = $('.collection_goods_list').html();
			}
			$(".collection_goods_list").empty();
			if(data['data'].length > 0){
				for (var i = 0; i < data['data'].length; i++) {
					var item = data['data'][i];
					if(item['goods_id'] != "" && item['goods_id'] != null){
						html += '<div class="goods_info fav_id_'+item['fav_id']+'">';
						html +=	'<div class="collection_time">'+item['fav_time']+'</div>';
						html +=	'<div class="goods_img" onclick="location.href=\''+__URL('APP_MAIN/goods/goodsdetail?id='+item.goods_id)+'\'">';
						html += '<img src="'+__IMG(item.pic_cover_mid)+'" alt="" class="pic"  onerror="this.src=\'__TEMP__/<?php echo $style; ?>/public/images/goods_img_empty.png\'">';
						html += '</div>';
						html += '<div class="data_info">';
						html += '<p class="goods_name" onclick="location.href=\''+__URL('APP_MAIN/goods/goodsdetail?id='+item.goods_id)+'\'">'+item['goods_name']+'</p>';
						html += '<div class="price_share">';
						html += '<span class="price">'+item['display_price']+'</span>';
						html += '<span class="cancel_collection" onclick="javascript:cancelFavorites('+item['fav_id']+',\'goods\',this);">取消收藏</span>';
						html += '</div>';
						html += '</div>';
						html += '</div>';
						$(".collection_goods_list").append(html);
					}
				}
			}else{
				$(".collection_goods_list").html(html);
			}
			var goods_info_width = parseInt($(".goods_info").width());
			var	goods_img_width = parseInt($('.goods_img').width());
			var data_info_width = goods_info_width - goods_img_width -15;
			$(".data_info,.price_share").width(data_info_width);
			FavoritesGoodsIsEmpty();
			is_load = false;
		}
	})
}

function cancelFavorites(fav_id, fav_type, obj) {
	$.ajax({
		url : __URL(APPMAIN + "/member/cancelFavorites"),
		type : "post",
		data : {
			"fav_id" : fav_id,
			"fav_type" : fav_type
		},
		success : function(data) {
			$(".fav_id_"+fav_id).fadeOut();
			showBox("<?php echo lang('member_abolish_successful'); ?>","success");
			FavoritesGoodsIsEmpty();
		}
	});
}
// 判断收藏的商品是否为空
function FavoritesGoodsIsEmpty(){
	var favoritesGoodsNum = $('.goods_info').not(":hidden").length;
	if(favoritesGoodsNum == 0){
		var html = '<div class="collection_goods_empty">';
		html += '您还没有收藏记录';
		html += '</div>';
		$(".collection_goods_list").html(html);
	}
}
//滑动到底部加载
$(window).scroll(function(){
	var totalheight = parseFloat($(window).height()) + parseFloat($(window).scrollTop());
	var content_box_height = parseFloat($(".collection_goods_list").height());
	if(totalheight - content_box_height >= 80){
		if(!is_load){
			var page = parseInt($("#page").val()) + 1;//页数
			var total_page_count = $("#page_count").val(); // 总页数
			var type = $('#type').val();
			if(page > total_page_count){
				return false;
			}else{
				loadingInfo(page,type);
			}
		}
	}
})
</script>

	<!-- 微信登录弹出绑定手机号遮罩层 -->
	

	
	<input type="hidden" value="<?php echo $uid; ?>" id="uid"/>
	<!-- 加载弹出层 -->
	<div class="mask-layer-loading">
		<img src="__TEMP__/<?php echo $style; ?>/public/images/mask_load.gif"/>
	</div>
	
</body>
</html>