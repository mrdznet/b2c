<?php if (!defined('THINK_PATH')) exit(); /*a:8:{s:39:"template/adminblue\Goods\goodsList.html";i:1525091986;s:28:"template/adminblue\base.html";i:1525091986;s:45:"template/adminblue\controlCommonVariable.html";i:1525091986;s:32:"template/adminblue\urlModel.html";i:1525091986;s:48:"template/adminblue\Goods\goodsThreeCategory.html";i:1525091986;s:50:"template/adminblue\Goods\batchProcessingModal.html";i:1525091986;s:34:"template/adminblue\pageCommon.html";i:1525091986;s:34:"template/adminblue\openDialog.html";i:1525091986;}*/ ?>
<!DOCTYPE html>
<html>
	<head>
	<meta name="renderer" content="webkit" />
	<meta http-equiv="X-UA-COMPATIBLE" content="IE=edge,chrome=1"/>
	<?php if($frist_menu['module_name']=='首页'): ?>
	<title><?php echo $title_name; ?> - 商家管理</title>
	<?php else: ?>
		<title><?php echo $title_name; ?> - <?php echo $frist_menu['module_name']; ?>管理</title>
	<?php endif; ?>
	<link rel="shortcut icon" type="image/x-icon" href="ADMIN_IMG/admin_icon.ico" media="screen"/>
	<link rel="stylesheet" type="text/css" href="__STATIC__/blue/bootstrap/css/bootstrap.css" />
	<link rel="stylesheet" type="text/css" href="__STATIC__/blue/css/ns_blue_common.css" />
	<link rel="stylesheet" type="text/css" href="__STATIC__/font-awesome/css/font-awesome.min.css" />
	<link rel="stylesheet" type="text/css" href="__STATIC__/simple-switch/css/simple.switch.three.css" />
	<link rel="stylesheet" type="text/css" href="ADMIN_CSS/selectric.css" />
	<style>
	.Switch_FlatRadius.On span.switch-open{background-color: #126AE4;border-color: #126AE4;}
	#copyright_meta a{color:#333;}
	</style>
	<script src="__STATIC__/js/jquery-1.8.1.min.js"></script>
	<script src="__STATIC__/blue/bootstrap/js/bootstrap.js"></script>
	<script src="__STATIC__/bootstrap/js/bootstrapSwitch.js"></script>
	<script src="__STATIC__/simple-switch/js/simple.switch.js"></script>
	<script src="__STATIC__/js/jquery.unobtrusive-ajax.min.js"></script>
	<script src="__STATIC__/js/common.js"></script>
	<script src="__STATIC__/js/seller.js"></script>
	<script src="__STATIC__/js/load_task.js"></script>
	<script src="__STATIC__/js/load_bottom.js" type="text/javascript"></script>
	<script src="ADMIN_JS/layer/layer.js"></script>
	<script src="ADMIN_JS/jquery-ui.min.js"></script>
	<script src="ADMIN_JS/ns_tool.js"></script>
	<script src="ADMIN_JS/jquery.selectric.js"></script>
	<link rel="stylesheet" type="text/css" href="__STATIC__/blue/css/ns_table_style.css">
	
	<script>
	/**
	 * Niushop商城系统 - 团队十年电商经验汇集巨献!
	 * ========================================================= Copy right
	 * 2015-2025 山西牛酷信息科技有限公司, 保留所有权利。
	 * ---------------------------------------------- 官方网址:
	 * http://www.niushop.com.cn 这不是一个自由软件！您只能在不用于商业目的的前提下对程序代码进行修改和使用。
	 * 任何企业和个人不允许对程序代码以任何形式任何目的再发布。
	 * =========================================================
	 * 
	 * @author : 小学生王永杰 
	 * @date : 2016年12月16日 16:17:13
	 * @version : v1.0.0.0 商品发布中的第二步，编辑商品信息
	 */
	var PLATFORM_NAME = "<?php echo $title_name; ?>";
	var ADMINIMG = "ADMIN_IMG";//后台图片请求路径
	var ADMINMAIN = "ADMIN_MAIN";//后台请求路径
	var SHOPMAIN = "SHOP_MAIN";//PC端请求路径
	var APPMAIN = "APP_MAIN";//手机端请求路径
	var UPLOAD = "__UPLOAD__";//上传文件根目录
	var PAGESIZE = "<?php echo $pagesize; ?>";//分页显示页数
	var ROOT = "__ROOT__";//根目录
	var ADDONS = "__ADDONS__";
	var STATIC = "__STATIC__";
	
	//上传文件路径
	var UPLOADGOODS = 'UPLOAD_GOODS';//存放商品图片
	var UPLOADGOODSSKU = 'UPLOAD_GOODS_SKU';//存放商品SKU
	var UPLOADGOODSBRAND = 'UPLOAD_GOODS_BRAND';//存放商品品牌图
	var UPLOADGOODSGROUP = 'UPLOAD_GOODS_GROUP';////存放商品分组图片
	var UPLOADGOODSCATEGORY = 'UPLOAD_GOODS_CATEGORY';////存放商品分类图片
	var UPLOADCOMMON = 'UPLOAD_COMMON';//存放公共图片、网站logo、独立图片、没有任何关联的图片
	var UPLOADAVATOR = 'UPLOAD_AVATOR';//存放用户头像
	var UPLOADPAY = 'UPLOAD_PAY';//存放支付生成的二维码图片
	var UPLOADADV = 'UPLOAD_ADV';//存放广告位图片
	var UPLOADEXPRESS = 'UPLOAD_EXPRESS';//存放物流图片
	var UPLOADCMS = 'UPLOAD_CMS';//存放文章图片
	var UPLOADVIDEO = 'UPLOAD_VIDEO';//存放视频文件
	var UPLOADGOODSVIDEO = "<?php echo constant('GOODS_VIDEO_PATH'); ?>";//存放商品视频
	var UPLOADFILE = "<?php echo constant('UPLOAD_FILE'); ?>";//存放文件
	var UPLOADWATERMARK = "<?php echo constant('UPLOAD_WATERMARK'); ?>";//存放水印图片
</script>
	
<link rel="stylesheet" type="text/css" href="ADMIN_CSS/product.css">
<script type="text/javascript" src="__STATIC__/My97DatePicker/WdatePicker.js"></script>
<style type="text/css">
#productTbody td{padding:5px;font-size:12px;}
#productTbody td:first-child{border-left: 1px solid #E1E6F0;}
#productTbody td:last-child{border-right: 1px solid #E1E6F0;}
#productTbody tr:last-child td{border-bottom:1px solid #E1E6F0;}
.tr-title td{border-top: 1px solid #E1E6F0;}
.a-pro-view-img {float: left;}
.thumbnail-img {width: 60px;margin-right: 10px;height: 60px;}
.cell i {display: block;}
.remodal-bg.with-red-theme.remodal-is-opening,.remodal-bg.with-red-theme.remodal-is-opened {filter: none;}
.remodal-overlay.with-red-theme {background-color: #f44336;}
.remodal.with-red-theme {background: #fff;}
input[type="radio"], input[type="checkbox"] {margin: -1px 5px 0 0;}
.edit-group{border-bottom: 1px solid #ebebeb;margin-bottom:10px;}
.edit-group label{font-weight:normal;}
.edit-group-title{height:15px;line-height:15px;width:140px;margin-top:3px;margin-bottom:3px;color:#126AE4;}
.edit-group-button{border-color: #3283fa;border: 1px solid #bbb;height: 26px;line-height: 24px;padding: 0 5px;}
.group-button-bg{background: #3283fa;color: #fff;}
.div-pro-view-name {width: 100%;min-height: 60px;}
i.hot,i.recommend,i.new{font-size:12px;margin-right:5px;font-style:normal;color:#fff;background-color:#FF6600;border-radius:2px;padding:1px 4px;position: relative;top:-5px;}
.icon-qrcode:before {content: "\f029";}
[class^="icon-"]:before, [class*=" icon-"]:before {text-decoration: inherit;display: inline-block;speak: none;}
[class^="icon-"], [class*=" icon-"] {font-family: FontAwesome;font-weight: normal;font-style: normal;text-decoration: inherit;-webkit-font-smoothing: antialiased;}

input[type=number] {-moz-appearance:textfield;}
input[type=number]::-webkit-inner-spin-button,
input[type=number]::-webkit-outer-spin-button {-webkit-appearance: none;margin: 0;}
input, textarea, .uneditable-input {width: 147px;}
.table th, .table td {vertical-align: middle;}
.recommendBox{width: 360px;display: inline-block;float: right;}
.introduction_box{width: 360px;display: inline-block;float: right;}
.tab-content{overflow: visible;}
.editGoodsIntroduction{display: inline-block;border:1px dashed #fff;padding: 0;width: 350px;line-height: 25px;max-height: 60px;overflow: hidden;text-overflow: ellipsis;height: 25px;}
.editGoodsIntroduction:hover{border-color: #ddd;cursor: pointer;}
.editGoodsIntroduction + input{display: inline-block;padding: 0 5px;width: 350px;line-height: 25px;height: 25px;background: #EEF7FF;display: none;margin:0 0 10px !important;}
.editGoodsIntroduction>a{margin-left:0 !important;}
.goods-fields-sort{cursor:pointer;}
.goods-fields-sort span{background: url('ADMIN_IMG/goods_sort.png') no-repeat;width:20px;height:20px;display: inline-block;margin-left:5px;vertical-align: middle;position: absolute;}
.goods-fields-sort span.asc{background-position: 0 5px;}
.goods-fields-sort span.selected.asc{background-position: -30px 5px;}
.goods-fields-sort span.desc{background-position: 0 -24px;}
.goods-fields-sort span.selected.desc{background-position: -30px -24px;}
.more-search{line-height: 20px;background: #fff;outline: none}
.interval{width: 2px;display: inline-block;}
.ns-main{margin-top: 0;}
.btn-common-white,.btn-common{outline: none;line-height: 20px;display: inline-block;}
@media screen and (max-width:1260px) {
	a.btn-common{margin-bottom:5px !important;}
}
</style>

	</head>
<body>
<input type="hidden" id="niushop_rewrite_model" value="<?php echo rewrite_model(); ?>">
<input type="hidden" id="niushop_url_model" value="<?php echo url_model(); ?>">
<input type="hidden" id="niushop_admin_model" value="<?php echo admin_model(); ?>">
<script>
function __URL(url){
	url = url.replace('SHOP_MAIN', '');
	url = url.replace('APP_MAIN', 'wap');
	url = url.replace('ADMIN_MAIN', $("#niushop_admin_model"));
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
		if(url_model==1 || url_model==true){
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

//处理图片路径
function __IMG(img_path){
	var path = "";
	if(img_path != undefined && img_path != ""){
		if(img_path.indexOf("http://") == -1 && img_path.indexOf("https://") == -1){
			path = UPLOAD+"\/"+img_path;
		}else{
			path = img_path;
		}
	}
	return path;
}
</script>
<article class="ns-base-article">

	<header class="ns-base-header">
		<div class="ns-logo" onclick="location.href='<?php echo __URL('ADMIN_MAIN'); ?>';"></div>
		<div class="ns-search">
			<div class="nav-menu js-nav">
				<img src="__STATIC__/blue/img/nav_menu.png" title="导航管理" />
			</div>
			<div class="ns-navigation-management">
				<div class="ns-navigation-title">
					<h4>导航管理</h4>
					<span>x</span>
				</div>
				<div style="height:40px;"></div>
				<?php if(is_array($nav_list) || $nav_list instanceof \think\Collection || $nav_list instanceof \think\Paginator): if( count($nav_list)==0 ) : echo "" ;else: foreach($nav_list as $key=>$nav): ?>
				<dl>
					<dt><?php echo $nav['data']['module_name']; ?></dt>
					<?php if(is_array($nav['sub_menu']) || $nav['sub_menu'] instanceof \think\Collection || $nav['sub_menu'] instanceof \think\Paginator): if( count($nav['sub_menu'])==0 ) : echo "" ;else: foreach($nav['sub_menu'] as $key=>$nav_sub): ?>
					<dd>
						<a href="<?php echo __URL('ADMIN_MAIN/'.$nav_sub['url']); ?>"><?php echo $nav_sub['module_name']; ?></a>
					</dd>
					<?php endforeach; endif; else: echo "" ;endif; ?>
				</dl>
				<?php endforeach; endif; else: echo "" ;endif; ?>
			</div>
			<div class="ns-search-block">
				<i class="fa fa-search" title="搜索"></i>
				<span>搜索</span>
				<div class="mask-layer-search">
					<input type="text" id="search_goods" placeholder="搜索" />
					<a href="javascript:search();"><img src="__STATIC__/blue/img/enter.png"/></a>
				</div>
			</div>
		</div>
		<nav>
			<ul>
				<?php if(is_array($headlist) || $headlist instanceof \think\Collection || $headlist instanceof \think\Paginator): if( count($headlist)==0 ) : echo "" ;else: foreach($headlist as $key=>$per): if(strtoupper($per['module_id']) == $headid): ?>
				<li class="selected" onclick="location.href='<?php echo __URL('ADMIN_MAIN/'.$per['url']); ?>';">
					<span><?php echo $per['module_name']; ?></span>
					<?php if($per['module_id'] == 10000): ?>
						<span class="is-upgrade"></span>
					<?php endif; ?>
				</li>
				
				<?php else: ?>
				<li onclick="location.href='<?php echo __URL('ADMIN_MAIN/'.$per['url']); ?>';">
					<span><?php echo $per['module_name']; ?></span>
					<?php if($per['module_id'] == 10000): ?>
						<span class="is-upgrade"></span>
					<?php endif; ?>
				</li>
				<?php endif; endforeach; endif; else: echo "" ;endif; ?>
			</ul>
		</nav>
		<div class="ns-base-tool">
			<i class="i-home"  title="前台首页"><a href="<?php echo __URL('SHOP_MAIN'); ?>" target="_blank"></a></i>
			<i class="i-close" title="退出登录"><a href="<?php echo __URL('ADMIN_MAIN/login/logout'); ?>"></a></i>
			<i class="ns-vertical-bar"></i>
			<div class="ns-help">
				<div class="logo">
				<?php if($user_headimg != ''): ?>
				<img src="<?php echo __IMG($user_headimg); ?>"/>
				<?php else: ?>
				<img src="__STATIC__/blue/img/user_admin_blue.png" width="30" >
				<?php endif; ?>
				</div>
				<span><?php echo $user_name; ?></span>
				<i class="fa fa-angle-down"></i>
				<ul>
					<li>
						<img src="__STATIC__/blue/img/add_favorites.png" />
						<a href="#edit-password" data-toggle="modal" title="修改密码">修改密码</a>
					</li>
					<li title="清理缓存" onclick="delcache()">
						<img src="__STATIC__/blue/img/clear_the_cache.png"/>
						<a href="javascript:;">清理缓存</a>
					</li>
					<li title="加入收藏" onclick="addFavorite()">
						<img src="__STATIC__/blue/img/add_favorites.png" />
						<a href="javascript:;">加入收藏</a>
					</li>
				</ul>
			</div>
		</div>
	</header>
	
	<aside class="ns-base-aside">
		<div class="ns-main-block">
			
			<h3 style="margin-top:50px;">
				<?php if(is_array($headlist) || $headlist instanceof \think\Collection || $headlist instanceof \think\Paginator): if( count($headlist)==0 ) : echo "" ;else: foreach($headlist as $key=>$per): if(strtoupper($per['module_id']) == $headid): ?>
					<span class="<?php echo $per['module_name']; ?>"><?php echo $per['module_name']; ?></span>
					<i class="fa fa-caret-down"></i>
				<?php endif; endforeach; endif; else: echo "" ;endif; ?>
			</h3>
			
			<nav>
				<ul>
					<?php if(is_array($leftlist) || $leftlist instanceof \think\Collection || $leftlist instanceof \think\Paginator): if( count($leftlist)==0 ) : echo "" ;else: foreach($leftlist as $key=>$leftitem): if(strtoupper($leftitem['module_id']) == $second_menu_id): ?>
					<li class="selected" onclick="location.href='<?php echo __URL('ADMIN_MAIN/'.$leftitem['url']); ?>';" title="<?php echo $leftitem['module_name']; ?>"><?php echo $leftitem['module_name']; ?></li>
					<?php else: ?>
					<li onclick="location.href='<?php echo __URL('ADMIN_MAIN/'.$leftitem['url']); ?>';" title="<?php echo $leftitem['module_name']; ?>"><?php echo $leftitem['module_name']; ?></li>
					<?php endif; endforeach; endif; else: echo "" ;endif; ?>
					<!-- 快捷菜单列表 -->
					<?php if($is_show_shortcut_menu == 1): if(is_array($shortcut_menu_list) || $shortcut_menu_list instanceof \think\Collection || $shortcut_menu_list instanceof \think\Paginator): $i = 0; $__LIST__ = $shortcut_menu_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu): $mod = ($i % 2 );++$i;?>
					<li onclick="location.href='<?php echo __URL('ADMIN_MAIN/'.$menu['url']); ?>';" title="<?php echo $menu['module_name']; ?>"><?php echo $menu['module_name']; ?></li>
					<?php endforeach; endif; else: echo "" ;endif; endif; ?>
				</ul>
				<!-- 快捷菜单设置按钮 -->
				<?php if($is_show_shortcut_menu == 1): ?>
				<div class="shortcut-menu" onclick="show_shortcut_menu()">
					<span></span>
					常用功能
				</div>
				<?php endif; ?>
			</nav>
			
			<div style="height:50px;"></div>
			
			<div id="bottom_copyright">
				<footer>
					<img id="copyright_logo"/>
<!-- 					<p> -->
<!-- 						<span id="copyright_desc"></span> -->
<!-- 						<br/> -->
<!-- 						<a id="copyright_companyname" style="color: #333" target="_blank"></a> -->
<!-- 						<br/> -->
<!-- 						<span id="copyright_meta"></span> -->
<!-- 					</p> -->
				</footer>
			</div>
		</div>
	</aside>
	
	<section class="ns-base-section">
		
		
		
		<div style="position:relative;margin:0;">
			<!-- 面包屑导航 -->
			<?php if(!isset($is_index)): ?>
			<div class="breadcrumb-nav">
				<a href="<?php echo __URL('ADMIN_MAIN'); ?>"><?php echo $title_name; ?></a>
				<?php if($frist_menu['module_name'] != ''): ?>
					<i class="fa fa-angle-right"></i>
					<a href="<?php echo __URL('ADMIN_MAIN/'.$frist_menu['url']); ?>"><?php echo $frist_menu['module_name']; ?></a>
				<?php endif; if($secend_menu['module_name'] != ''): ?>
					<i class="fa fa-angle-right"></i>
					<!-- 需要加跳转链接用这个：ADMIN_MAIN/<?php echo $secend_menu['url']; ?> -->
					<a href="javascript:;" style="color:#999;"><?php echo $secend_menu['module_name']; ?></a>
				<?php endif; ?>
			</div>
			<?php endif; ?>
			<!-- 三级导航菜单 -->
			
				<?php if(count($child_menu_list) > 1): ?>
				<nav class="ns-third-menu">
					<ul>
					<?php if(is_array($child_menu_list) || $child_menu_list instanceof \think\Collection || $child_menu_list instanceof \think\Paginator): if( count($child_menu_list)==0 ) : echo "" ;else: foreach($child_menu_list as $k=>$child_menu): if($child_menu['active'] == '1'): ?>
							<li class="selected" onclick="location.href='<?php echo __URL('ADMIN_MAIN/'.$child_menu['url']); ?>';"><?php echo $child_menu['menu_name']; ?></li>
						<?php else: ?>
							<li onclick="location.href='<?php echo __URL('ADMIN_MAIN/'.$child_menu['url']); ?>';"><?php echo $child_menu['menu_name']; ?></li>
						<?php endif; endforeach; endif; else: echo "" ;endif; ?>
					</ul>
				</nav>
				<?php endif; ?>
			
			<div class="right-side-operation">
				<ul>
					
					
<!-- 					<?php if($warm_prompt_is_show == 'show'): ?>style="display:none;"<?php endif; ?> style="display:block;" -->
					<li>
						<a class="js-open-warmp-prompt" href="javascript:;" data-menu-desc=''><i class="fa fa-question-circle"></i>&nbsp;提示</a>
						<div class="popover">
							<div class="arrow"></div>
							<div class="popover-content">
								<div>
									<?php if($secend_menu['desc']): ?>
									<h4>操作提示</h4>
									<p><?php echo $secend_menu['desc']; ?></p>
									<hr/>
									<?php endif; ?>
									<h4>功能提示</h4>
									<p class="function-prompts"></p>
								</div>
							</div>
						</div>
					</li>
					
				</ul>
			</div>
		</div>
		
		<!-- 操作提示 -->
		
<!-- 		<?php if($warm_prompt_is_show == 'hidden'): ?>style="display:none;"<?php endif; ?> -->
		<div class="ns-warm-prompt" style="display:none;">
			<div class="alert alert-info">
				<button type="button" class="close">&times;</button>
				<h4>
<!-- 					{1block name="alert_info"} -->
<!-- 					<i class="fa fa-info-circle"></i> -->
<!-- 					<span class="operating-hints">操作提示</span> -->
<!-- 						<?php if($secend_menu['desc']): ?> -->
<!-- 						<span><?php echo $secend_menu['desc']; ?></span> -->
<!-- 						<?php endif; ?> -->
<!-- 					{1/block} -->
				</h4>
			</div>
		</div>
		
		
		<div class="ns-main">
			
<div class="js-mask-category" style="display:none;background: rgba(0,0,0,0);position:fixed;width:100%;height:100%;top:0;left:0;right:0;bottom:0;z-index:90;"></div>
<table class="mytable">
	<tr>
		<th align="left">
			<a class="btn-common" href="<?php echo __URL('ADMIN_MAIN/goods/addgoods'); ?>">发布商品</a>
			<a class="btn-common-white" href="javascript:batchDelete()">批量删除</a>
			<a class="btn-common-white upstore" href="javascript:goodsIdCount('online')">上架</a>
			<a class="btn-common-white downstore" href="javascript:goodsIdCount('offline')">下架</a>
			<a class="btn-common-white recommend" href="javascript:ShowRecommend()" data-html="true" id="setRecommend" title="推荐"
			data-container="body" data-placement="bottom"  data-trigger="manual"
			data-content="<div class='edit-group' id='recommendType'>
				<label class='checkbox-inline'><i class='checkbox-common'><input type='checkbox' value='1' /></i> 热卖 </label>
				<label class='checkbox-inline'><i class='checkbox-common'><input type='checkbox' value='2' /></i> 精品 </label>
				<label class='checkbox-inline'><i class='checkbox-common'><input type='checkbox' value='3' /></i> 新品 </label>
				</div>
				<button class='btn-common btn-small' onclick='setRecommend();'>保存</button>
				<button class='btn btn-small' onclick='hideSetRecommend()'>取消</button>
				"
			>推荐</a>
			<a data-html="true" class="btn-common-white fun-a category" href="javascript:goodsGroupIdCount();" id="editGroup" title="修改商品标签" data-container="body" data-placement="bottom"  data-trigger="manual"
				data-content="<div class='edit-group' id='goodsChecked' style='max-width:auto;'>
					<?php foreach($goods_group as $vo): ?>
					<label class='checkbox-inline'>
					<i class='checkbox-common'><input type='checkbox' value='<?php echo $vo['group_id']; ?>'></i>
					<span><?php echo $vo['group_name']; ?></span>&nbsp;&nbsp;&nbsp;
				</label>
				<?php foreach($vo['sub_list']['data'] as $vs): ?>
				<label style='display:inline-block;'>
					<input type='checkbox' value='<?php echo $vs['group_id']; ?>'><?php echo $vs['group_name']; ?>
					</label>
					<?php endforeach; endforeach; ?>
				</div>
				<button class='btn-common btn-small' onclick='goodsGroupUpdate();'>保存</button>
				<button class='btn btn-small' onclick='hideEditGroup()'>取消</button>
				">
				商品标签</a>
			<a href="javascript:batchUpdateGoodsQrcode();;" class="btn-common-white fun-a category" title="更新二维码">更新二维码</a>
			<a href="javascript:;" id="batchProcessing"  class="btn-common-white" title="批量处理">批量处理</a>
			<input type='hidden' id='goods_type_ids'/>
		</th>
		<th style="position: relative;">
			<style>
.goodsCategory{width: 148px;height: 300px;border: 1px solid #CCCCCC;position: absolute;z-index: 100;background: #fff;right: 0;display: none;overflow-y: auto;top: 31px;}
.goodsCategory::-webkit-scrollbar{width: 3px;}
.goodsCategory::-webkit-scrollbar-track{-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);border-radius: 10px;background-color: #fff;}
.goodsCategory::-webkit-scrollbar-thumb{height: 20px;border-radius: 10px;-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);background-color: #ccc;}
.goodsCategory ul{height: 280px;margin-top: -2px;margin-left: 0;}
.goodsCategory ul li{text-align: left;padding:0 10px;line-height: 30px;}
.goodsCategory ul li i{float: right;line-height: 30px;}
.goodsCategory ul li:hover{cursor: pointer;}
.goodsCategory ul li:hover,.goodsCategory ul li.selected{background: #0059d6;color: #fff;}
.goodsCategory ul li span{width: 110px;display: inline-block;white-space: nowrap;text-overflow: ellipsis;overflow: hidden;vertical-align: middle;font-size:12px;}
.two{left: 150px;border-left:0;}
.three{left: 299px;width: 148px;border-left:0;}
.selectGoodsCategory{width: 218px;height: 45px;border:1px solid #CCCCCC;position: absolute;z-index: 100;left: 0;margin-top: 299px;border-collapse: collapse;background: #fff;display: none;}
.selectGoodsCategory a{display: block;height: 30px;width: 100px;text-align: center;color: #fff;line-height: 30px;margin:8px;background: #126AE4;text-decoration:none;}
</style>

商品分类：
<div style="display: inline-block;position: relative;">
<input type="text" placeholder="请选择商品分类" id="goodsCategoryOne" is_show="false" class="input-common middle">
	<div class="goodsCategory one">
		<ul>
			<?php if(is_array($oneGoodsCategory) || $oneGoodsCategory instanceof \think\Collection || $oneGoodsCategory instanceof \think\Paginator): $i = 0; $__LIST__ = $oneGoodsCategory;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
			<li class="js-category-one" category_id="<?php echo $vo['category_id']; ?>">
				<span><?php echo $vo['category_name']; ?></span>
				<?php if($vo['is_parent'] == 1): ?>
					<i class="fa fa-angle-right fa-lg"></i>
				<?php endif; ?>
			</li>
			<?php endforeach; endif; else: echo "" ;endif; ?>
		</ul>
	</div>
	<div class="goodsCategory two" style="border-left:0;">
		<ul id="goodsCategoryTwo"></ul>
	</div>
	<div class="goodsCategory three">
		<ul id="goodsCategoryThree"></ul>
	</div>
	<div class="selectGoodsCategory">
		<a href="javascript:;" id="confirmSelect" style="float:right;">确认选择</a>
	</div>
	<input type="hidden" id="category_id_1">
	<input type="hidden" id="category_id_2">
	<input type="hidden" id="category_id_3">
</div>

<script>
$("#goodsCategoryOne").click(function(){
	var isShow = $("#goodsCategoryOne").attr('is_show');
	if(isShow == "false"){
		$(".one").show();
		$(".selectGoodsCategory").css({
			'width' : 148,
			'right' : 580
		});
		$(".selectGoodsCategory").show();
		$("#goodsCategoryOne").attr('is_show','true');
		$(".js-mask-category").show();
	}else{
		$(".one").hide();
		$(".two").hide();
		$(".three").hide();
		$(".selectGoodsCategory").css({
			'width' : 148,
			'right' : 580
		});
		$(".selectGoodsCategory").hide();
		$("#goodsCategoryOne").attr('is_show','false');
	}
});

$(".js-mask-category").click(function(){
	$(".one").hide();
	$(".selectGoodsCategory").hide();
	$(".two").hide();
	$(".three").hide();
	$("#goodsCategoryOne").attr('is_show', 'false');
	$(this).hide();
});

$(".js-category-one").click(function(){
	parentId = $(this).attr("category_id");
	category_name = $(this).text();
	$(".one ul li").not($(this)).removeClass("selected");
	$(this).addClass("selected");
	$("#goodsCategoryOne").val($.trim(category_name)+">");
	$("#category_id_1").val(parentId);
	$("#category_id_2").val('');
	$("#category_id_3").val('');
	$.ajax({
		type : 'post',
		url : "<?php echo __URL('ADMIN_MAIN/goods/getcategorybyparentajax'); ?>",
		data : {"parentId":parentId},
		success : function(data){
			if(data.length>0){
				var html = '';
				for (var i = 0; i < data.length; i++) {
					html += '<li class="js-category-two" category_id="'+data[i]['category_id']+'">'+data[i]['category_name'];
					if(data[i]['is_parent'] == 1){
						html += '<i class="fa fa-angle-right fa-lg"></i>';
					}
					html += '</li>';
				}
				$("#goodsCategoryTwo").html(html);
				$(".two").show();
				$(".selectGoodsCategory").css({
					'width' : 297,
					'right' : 361
				});
			}else{
				$(".one").hide();
				$(".two").hide();
				$(".js-mask-category").hide();
				$(".selectGoodsCategory").hide();
				$("#goodsCategoryOne").attr('is_show', 'false');
			}
			$(".three").hide();
		}
	});
	return false;
});

$(".js-category-two").live("click",function(event){
	var parentId = $(this).attr("category_id");
	var category_name = $(this).text();
	$(".two ul li").not($(this)).removeClass("selected");
	$(this).addClass("selected");
	var goodsCategoryOne = $("#goodsCategoryOne").val();
	$("#goodsCategoryOne").val(goodsCategoryOne+''+category_name+'>');
		$("#category_id_2").val(parentId);
	$("#category_id_3").val('');
	$.ajax({
		type : 'post',
		url : "<?php echo __URL('ADMIN_MAIN/goods/getcategorybyparentajax'); ?>",
		data : {"parentId":parentId},
		success : function(data){
			if(data.length>0){
				var html = '';
				for (var i = 0; i < data.length; i++) {
					html += '<li onclick="goodsCategoryThree(this);" category_id="'+data[i]['category_id']+'">'+data[i]['category_name']+'<i class="fa fa-angle-right fa-lg"></i></li>';
				}
				$("#goodsCategoryThree").html(html);
				$(".three").show();
				$(".selectGoodsCategory").css({
					'width' : 446,
					'right' : 162
				});
			}else{
				$(".one").hide();
				$(".two").hide();
				$(".three").hide();
				$(".selectGoodsCategory").hide();
				$(".js-mask-category").hide();
				$("#goodsCategoryOne").attr('is_show', 'false');
			}
		}
	})
	event.stopPropagation();
});

function goodsCategoryThree(obj){
	var parentId = $(obj).attr("category_id");
	var category_name = $(obj).text();
	$(".three ul li").not($(obj)).removeClass("selected");
	$(obj).addClass("selected");
	var goodsCategoryOne = $("#goodsCategoryOne").val();
	$("#goodsCategoryOne").val(goodsCategoryOne+''+category_name);
		$("#category_id_3").val(parentId);
	$(".one").hide();
	$(".two").hide();
	$(".three").hide();
	$(".selectGoodsCategory").hide();
	$(".js-mask-category").hide();

	$(".selectGoodsCategory").css({
		'width' : 218,
		'right' : 580
	});
	$("#goodsCategoryOne").attr('is_show','false');
}

$("#confirmSelect").click(function(){
	$(".one").hide();
	$(".two").hide();
	$(".three").hide();
	$(".selectGoodsCategory").hide();
	$(".selectGoodsCategory").css({
		'width' : 218,
		'right' : 580
	});
})
</script>
			<span class="interval"></span>
			<span>商品名称：</span>
			<input id="goods_name" class="input-medium input-common middle" type="text" value="<?php echo $search_info; ?>" placeholder="要搜索的商品名称" >	
			<span class="interval"></span>
			<button class="btn-common-white more-search"><i class="fa fa-chevron-down"></i></button>
			<span class="interval"></span>
			<button onclick="searchData()" class="btn-common">搜索</button>
			
			<!-- 更多搜索 -->
			<div class="more-search-container">
				<dl>
					<dt>商品编码：</dt>
					<dd>
						<input id="goods_code" class="input-medium input-common middle" type="text" placeholder="要搜索的商品编码"/>
					</dd>
				</dl>
				<dl>
					<dt>供货商：</dt>
					<dd>
						<select id="supplier_id" class="select-common middle">
							<option value="">全部</option>
							<?php if(!(empty($supplier_list) || (($supplier_list instanceof \think\Collection || $supplier_list instanceof \think\Paginator ) && $supplier_list->isEmpty()))): if(is_array($supplier_list) || $supplier_list instanceof \think\Collection || $supplier_list instanceof \think\Paginator): $i = 0; $__LIST__ = $supplier_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
							<option value="<?php echo $vo['supplier_id']; ?>"><?php echo $vo['supplier_name']; ?></option>
							<?php endforeach; endif; else: echo "" ;endif; endif; ?>
						</select>
					</dd>
				</dl>
<!-- 				<dl> -->
<!-- 					<dt>上下架：</dt> -->
<!-- 					<dd> -->
<!-- 						<select id="state" cl	ass="select-common middle" > -->
<!-- 							<option value="" <?php if($state != ''): ?>selected<?php endif; ?>>全部</option> -->
<!-- 							<option value="1" <?php if($state == '1'): ?>selected<?php endif; ?>>上架</option> -->
<!-- 							<option value="0" <?php if($state == '0'): ?>selected<?php endif; ?>>下架</option> -->
<!-- 						</select> -->
<!-- 					</dd> -->
<!-- 				</dl> -->
				<dl>
					<dt>商品类型：</dt>
					<dd>
						<select id="goods_type" class="select-common middle" >
							<option value="all">全部</option>
							<option value="1">实物商品</option>
							<option value="0">虚拟商品</option>
						</select>
					</dd>
				</dl>
				<dl>
					<dt>商品标签：</dt>
					<dd>
						<input type="text" placeholder="请选择商品标签" id="selectGoodsLabel"  onfocus="selectGoodsLabel();" is_show="false" data-html="true" class="input-common middle" title="<h6 class='edit-group-title'>选择商品标签</h6>" data-container="body" data-placement="bottom"  data-trigger="manual" data-content="<div class='edit-group' style='max-width:auto;'>
							<?php foreach($goods_group as $vo): ?>
							<p>
							<label class='checkbox-inline' style='display:inline-block;'>
							<input type='checkbox' value='<?php echo $vo['group_id']; ?>' onchange='clickGoodsLabel(this);'><span><?php echo $vo['group_name']; ?></span>&nbsp;&nbsp;&nbsp;
							</label>
						<?php endforeach; ?>
						</div>
						<button class='btn-common btn-small' onclick='confirm();'>确认</button>
						<button class='btn btn-small' onclick='hideGroup()'>取消</button>
						">
					</dd>
				</dl>
				<dl>
					<dt></dt>
					<dd>
						<a href="javascript:;" onclick="searchData()" class="btn-common">完成</a>
					</dd>
				</dl>
			</div>
		</th>
	</tr>
</table>
<div id="myTabContent" class="tab-content">
	<div class="tab-pane active">
		<table class="table-class">
			<colgroup>
				<col style="width: 2%;">
				<col style="width: 25%;">
				<col style="width: 15%;">
				
				<col style="width: 15%;">
				<col style="width: 11%;">
				<col style="width: 11%;">
				<col style="width: 4%;">
				<col style="width: 15%;">
			</colgroup>
			<thead>
				<tr>
					<th>
						<i class="checkbox-common">
							<input onclick="CheckAll(this)" type="checkbox" id="chek_all">
						</i>
					</th>
					<th align="left">商品名称</th>
					<th class="goods-fields-sort" data-field="price" style="text-align: right;">价格(元)<span class="desc"></span></th>
					<th class="goods-fields-sort" data-field="stock" style="text-align: right;">总库存<span class="desc"></span></th>
					<th class="goods-fields-sort" data-field="sales" style="text-align: right;">销量<span class="desc"></span></th>
<!-- 					<th>上下架</th> -->
					<th>实物类型</th>
					<th class="goods-fields-sort" data-field="sort" style="text-align: center;">排序<span class="desc"></span></th>
					<th>操作</th>
				</tr>
				<!-- <tr>
					<td colspan="9" style="padding:10px 6px;border-left:1px solid #E1E6F0;border-right:1px solid #E1E6F0;">
						<a class="btn-common-child" href="<?php echo __URL('ADMIN_MAIN/goods/addgoods'); ?>">+发布商品</a>
						<a class="btn-common-child" href="javascript:batchDelete()">批量删除</a>
						<a class="btn-common-child upstore" href="javascript:goodsIdCount('online')">上架</a>
						<a class="btn-common-child downstore" href="javascript:goodsIdCount('offline')">下架</a>
						<a class="btn-common-child recommend" href="javascript:ShowRecommend()" data-html="true" id="setRecommend" title="推荐"
						data-container="body" data-placement="bottom"  data-trigger="manual"
						data-content="<div class='edit-group' id='recommendType'>
							<label class='checkbox-inline'><input type='checkbox' value='1'>热卖 </label>
							<label class='checkbox-inline'><input type='checkbox' value='2'>精品 </label>
							<label class='checkbox-inline'><input type='checkbox' value='3'>新品 </label>
							</div>
							<button class='btn-common btn-small' onclick='setRecommend();'>保存</button>
							<button class='btn btn-small' onclick='hideSetRecommend()'>取消</button>
							"
						>推荐</a>
						<a data-html="true" class="btn-common-child fun-a category" href="javascript:goodsGroupIdCount();" id="editGroup" title="修改商品标签" data-container="body" data-placement="bottom"  data-trigger="manual"
							data-content="<div class='edit-group' id='goodsChecked' style='max-width:auto;'>
 							<?php foreach($goods_group as $vo): ?>
 							<p>
 							<label class='checkbox-inline' style='display:inline-block;' >
								<input type='checkbox' value='<?php echo $vo['group_id']; ?>'><span><?php echo $vo['group_name']; ?></span>&nbsp;&nbsp;&nbsp;
							</label>
							<?php foreach($vo['sub_list']['data'] as $vs): ?>
							<label style='display:inline-block;'>
								<input type='checkbox' value='<?php echo $vs['group_id']; ?>'><?php echo $vs['group_name']; ?>
								</label>
								<?php endforeach; ?>
							</p>
							<?php endforeach; ?>
							</div>
							<button class='btn-common btn-small' onclick='goodsGroupUpdate();'>保存</button>
							<button class='btn btn-small' onclick='hideEditGroup()'>取消</button>
							">
							商品标签</a>
						<a href="javascript:batchUpdateGoodsQrcode();;" class="btn-common-child fun-a category" title="更新二维码">更新二维码</a>
						<a href="javascript:;" id="batchProcessing"  class="btn-common-child" title="批量处理">批量处理</a>
						<input type='hidden' id='goods_type_ids'/>
					</td>
				</tr> -->
			</thead>
			<tbody id="productTbody" style="border: 0;"></tbody>
		</table>
	</div>
	<input type="hidden" id="state" value="<?php echo $state; ?>"/>
	<input type="hidden" id="selectGoodsLabelId">
	<input type="hidden" id="stock_warning" value="<?php echo $stock_warning; ?>">
</div>
<input type="hidden" id="hidden_sort_rule" />

<!-- 批量处理弹出框 -->
<!-- 功能说明：批量处理弹出框 -->
<link rel="stylesheet" type="text/css" href="ADMIN_CSS/plugin/jquery.searchableSelect.css"/>
<style type="text/css">
	.modal{
		border-radius: 0;
		width: 700px;
	}
	#batch_processing .modal .modal-body{
		padding: 15px 10px!important;
		height:400px;
		overflow-y: visible;
	}
	#batch_processing .modal-header h3 {
	    font-size: 16px;
	}
	#batch_processing .tip_info{
		padding: 5px;
	    color: #3a87ad;
		background-color: #d9edf7;
    	border: 1px solid #bce8f1;
	}
	#batch_processing .tip_info p{
		margin:0;
		line-height: 1.5;
		font-size: 13px;
	}
	#batch_processing .setting-item{
		margin: 10px 0;
		width: 100%;
	}
	#batch_processing .setting-item dl{
		width: 100%;
	    margin: 0;
	}
	#batch_processing .setting-item dl dt,#batch_processing .setting-item dl dd{
	    line-height: 45px;
	    display: inline-block;
	    float: left;
	    margin: 0;
	    text-align: left;
	    font-weight: normal;
	    font-size: 13px;
	}
	#batch_processing .setting-item dl dt{
		width: 20%;
	}
	#batch_processing .setting-item dl dd{
	    width: 80%;
	}
	#batch_processing .setting-item dl dd label{
		display: inline-block;
		margin-right: 20px;
	}
	#batch_processing .setting-item dl dd .num{
		width: 60px;
		border-radius: 0;
		margin-bottom: 0;
	}
	#batch_processing .setting-item dl dd .info{
		color: #BBB;
	}
	#batch_processing .setting-item dl dd .select{
	    border-radius: 0;
	    width: 30%;
	    margin-right: 4%;
	    margin-bottom: 0;
	    outline: none;
	}
	#batch_processing .setting-item dl dd .select:last-child{
		margin-right: 0;
	}
	.searchable-select-holder{
		border-radius: 0;
		padding: 4px 20px 4px 6px;
	}
</style>
<div class="modal fade hide" id="batch_processing" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h3>批量处理</h3>
			</div>
			<div class="modal-body">
				<div class="tip_info">
					<p>1、如果未设置任何选择，则商品保持原状不变。</p>
					<p>2、设置商品库存，将作用于所选商品的所有规格项。</p>
				</div>
				<div class="setting-item">
					<dl>
						<dt>商品分类</dt>
						<dd id="Js_goods_category">
							<select class="select-common middle" id="batch_catrgory_one">
								<option value="0">请选择一级分类</option>
								<?php if(is_array($oneGoodsCategory) || $oneGoodsCategory instanceof \think\Collection || $oneGoodsCategory instanceof \think\Paginator): $i = 0; $__LIST__ = $oneGoodsCategory;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
									<option value="<?php echo $vo['category_id']; ?>"><?php echo $vo['category_name']; ?></option>
								<?php endforeach; endif; else: echo "" ;endif; ?>
							</select>
							<select class="select-common middle" id="batch_catrgory_two">
								<option value="0">请选择二级分类</option>
							</select>
							<select class="select-common middle" style="width: 150px;" id="batch_catrgory_three">
								<option value="0">请选择三级分类</option>	
							</select>
						</dd>
					</dl>
					<dl>
						<dt>销售价:</dt>
						<dd id="price">
							<label>
								<i class="radio-common selected">
									<input type="radio" checked name="price" value="1">
								</i>
								<span>增加</span>
							</label>
							<label>
								<i class="radio-common">
									<input type="radio" name="price" value="0">
								</i>
								<span>减少</span>
							</label>
							<input type="number" name="" value="0" class="num input-common short" min='0'>
							<span class="info">销售价增加N元或减少N元</span>
						</dd>
					</dl>
					<dl>
						<dt>市场价:</dt>
						<dd id="market_price">
							<label>
								<i class="radio-common selected">
									<input type="radio" checked name="market_price" value="1">
								</i>
								<span>增加</span>
							</label>
							<label>
								<i class="radio-common">
									<input type="radio" name="market_price" value="0">
								</i>
								<span>减少</span>
							</label>
							<input type="number" name="" value="0" class="num input-common short" min='0'>
							<span class="info">市场价增加N元或减少N元</span>
						</dd>
					</dl>
					<dl>
						<dt>成本价:</dt>
						<dd id="cost_price">
							<label>
								<i class="radio-common selected">
									<input type="radio" checked name="cost_price" value="1">
								</i>
								<span>增加</span>
							</label>
							<label>
								<i class="radio-common">
									<input type="radio" name="cost_price" value="0">
								</i>
								<span>减少</span>
							</label>
							<input type="number" name="" value="0" class="num input-common short" min='0'/>
							<span class="info">成本价增加N元或减少N元</span>
						</dd>
					</dl>
					<dl>
						<dt>库存:</dt>
						<dd id="stock">
							<label>
								<i class="radio-common selected">
									<input type="radio" checked name="stock" value="1">
								</i>
								<span>增加</span>
							</label>
							<label>
								<i class="radio-common">
									<input type="radio" name="stock" value="0">
								</i>
								<span>减少</span>
							</label>
							<input type="number" name="" value="0" class="num input-common short" min='0'>
							<span class="info">库存增加N件或减少N件</span>
						</dd>
					</dl>
					<dl>
						<dt>商品品牌:</dt>
						<dd id="stock" class="js-brand-block">
							<div>
							<select id="brand_id" style="display: none;" class="middle"></select>
							</div>
						</dd>
					</dl>
				</div>
			</div>
			
			<div class="modal-footer">
				<button class="btn-common btn-big" onclick="save();">保存</button>
				<button class="btn-common-cancle btn-big" data-dismiss="modal">关闭</button>
			</div>
		</div>
	</div>
	
</div>

<script src="ADMIN_JS/plugin/jquery.searchableSelect.js"></script>
<script type="text/javascript">
var curr_searchable_select = null;
$(function(){
	//可搜索的商品品牌下拉选项框
	curr_searchable_select = $('#brand_id').searchableSelect();
	getGoodsBrandList();

	$(".searchable-select-input").live("keyup",function(){
		if($(this).val().length>100){
			showTip("查询限制在100个字符以内","warning");
			return;
		}
		if($(this).attr("data-value") != $(this).val()){
			$(this).attr("data-value",$(this).val());
			getGoodsBrandList($(".searchable-select-holder").text(),$(this).val());
		}
	});
})
//查询商品品牌列表
function getGoodsBrandList(brand_name,search_name){
	var page_index = 1;
	var page_size = 20;
	$.ajax({
		type : "post",
		url : "<?php echo __URL('ADMIN_MAIN/goods/getGoodsBrandList'); ?>",
		data : { "page_index" : page_index, "page_size" : page_size, "brand_name" : brand_name, "search_name" : search_name, "brand_id" : $("#hidden_goods_brand_id").val() },
		success : function(res){
			var html = '<option value="0">请选择商品品牌</option>';
			if(res.total_count>0){
				for(var i=0;i<res['data'].length;i++){
					html += '<option value="' + res['data'][i].brand_id + '">' + res['data'][i].brand_name + '</option>';
				}
			}
			$("#brand_id").html(html);
			//更新搜索结果
			$(".js-brand-block .searchable-select-items .searchable-select-item").remove();
			curr_searchable_select.buildItems();
		}
	});
}

$("#Js_goods_category select").change(function(){
	var parentId = $(this).val();
	var _this = $(this);
	$.ajax({
		type : 'post',
		url : "<?php echo __URL('ADMIN_MAIN/goods/getcategorybyparentajax'); ?>",
		data : {"parentId":parentId},
		success : function(data){
			if(data.length>0){
				var html = '';
				for (var i = 0; i < data.length; i++) {
					html += '<option value="'+ data[i]['category_id'] +'">' + data[i]['category_name'] + '</option>';
				}
				$(_this).parents(".selectric-wrapper").next(".selectric-wrapper").find("select").find("option[value !='0']").remove();
				$(_this).parents(".selectric-wrapper").next(".selectric-wrapper").find("select").find("option:first-child").after(html);
				$(_this).parents(".selectric-wrapper").next(".selectric-wrapper").find("select").selectric();
			}
		}
	})
})


var is_click = false;
function save(){
	var price = 0,
		market_price = 0,
		cost_price  = 0,
		stock = 0,
		catrgory_one = $("#batch_catrgory_one").val(),
		catrgory_two = $("#batch_catrgory_two").val(),
		catrgory_three = $("#batch_catrgory_three").val(),
		brand_id = $("#brand_id").val();
	//销售价
	if($("input[name='price']:checked").val() == 0){
		price -= parseFloat(parseFloat($("#price .num").val()).toFixed(2));
	}else{
		price += parseFloat(parseFloat($("#price .num").val()).toFixed(2));
	}
	//市场价
	if($("input[name='market_price']:checked").val() == 0){
		market_price -= parseFloat(parseFloat($("#market_price .num").val()).toFixed(2));
	}else{
		market_price += parseFloat(parseFloat($("#market_price .num").val()).toFixed(2));
	}
	//成本价
	if($("input[name='cost_price']:checked").val() == 0){
		cost_price -= parseFloat(parseFloat($("#cost_price .num").val()).toFixed(2));
	}else{
		cost_price += parseFloat(parseFloat($("#cost_price .num").val()).toFixed(2));
	}
	//库存
	if($("input[name='stock']:checked").val() == 0){
		stock -= parseInt($("#stock .num").val());
	}else{
		stock += parseInt($("#stock .num").val());
	}

	var goods_ids= new Array();
	$("#productTbody input[type='checkbox']:checked").each(function() {
		if (!isNaN($(this).val())) {
			goods_ids.push($(this).val());
		}
	});
	
	if(!is_click){
		is_click = true;
		$.ajax({
			type : "post",
			url : '<?php echo __URL("ADMIN_MAIN/goods/batchProcessingGoods"); ?>',
			async : false,
			data : {
				"price" : price,
				"market_price" : market_price,
				"cost_price" : cost_price,
				"stock" : stock,
				"catrgory_one" : catrgory_one,
				"catrgory_two" : catrgory_two,
				"catrgory_three" : catrgory_three,
				"brand_id" : brand_id,
				"goods_ids" : goods_ids.toString()
			},
			success : function(data){
				if(data["code"] > 0){
					$("#batch_processing").modal("hide");
					showMessage("success",data["message"],location.href);
				}else{
					is_click = false;
					showMessage("error",data["message"]);
				}
			}
		})
	}
	
}
</script>

			<script type="text/javascript" src="__STATIC__/js/jquery.cookie.js"></script>
<script src="__STATIC__/js/page.js"></script>
<div class="page" id="turn-ul" style="display: none;">
	<div class="pagination">
		<ul>
			<li class="total-data">共0有条数据</li>
			<li class="according-number">每页显示<input type="text" class="input-medium" id="showNumber" value="<?php echo $pagesize; ?>" data-default="<?php echo $pagesize; ?>" autocomplete="off"/>条</li>
			<li><a id="beginPage" class="page-disable" style="border: 1px solid #dddddd;">首页</a></li>
			<li><a id="prevPage" class="page-disable">上一页</a></li>
			<li id="pageNumber"></li>
			<li><a id="nextPage">下一页</a></li>
			<li><a id="lastPage">末页</a></li>
			<li class="page-count">共0页</li>
		</ul>
	</div>
</div>
<input type="hidden" id="page_count" />
<input type="hidden" id="page_size" />
<script>
/**
 * 保存当前的页面
 * 创建时间：2017年8月30日 19:29:20
 */
function savePage(index){
	var json = { page_index : index, show_number : $("#showNumber").val(), url :  window.location.href };
	$.cookie('page_cookie',JSON.stringify(json),{ path: '/' });
 	//console.log(json);
}

$(function() {
	try{
		
		$("#turn-ul").show();//显示分页
		var history_url = "";
		var json = { page_index : 1, show_number : <?php echo $pagesize; ?>, url :  window.location.href };
		var history_json = "";//用于临时保存分页数据
		if($.cookie('page_cookie') != undefined && $.cookie('page_cookie') != "" && $.cookie('page_cookie') != '""'){
			
			var cookie = eval("(" + $.cookie('page_cookie') + ")");
			if(cookie !=undefined && cookie != ""){
				json.page_index = cookie.page_index;
				if(cookie.show_number != undefined && cookie.show_number != "") json.show_number = cookie.show_number;
				else json.show_number = <?php echo $pagesize; ?>;
				history_url = cookie.url;
				history_json = cookie;
			}
			
		}else{
			
			savePage(json.page_index);
			
		}
		if(history_url != undefined && history_url != "" && history_url != json.url && json.page_index != 1){
			
			//如果页面发生了跳转，还原操作
			json.page_index = 1;
			json.show_number = <?php echo $pagesize; ?>;
			json.url = history_url;
 			//console.log("如果页面发生了跳转，还原操作");
			$.cookie('page_cookie',JSON.stringify(json),{ path: '/' });
		}

 		//console.log($.cookie('page_cookie'));
		$("#showNumber").val(json.show_number);
		if(json.page_index != 1) jumpNumber = json.page_index;
		LoadingInfo(json.page_index);//通过此方法调用分页类
		
	}catch(e){
		
		$("#turn-ul").hide();
		//当前页面没有分页，进行还原操作
		$.cookie('page_cookie',JSON.stringify(history_json),{ path: '/' });
//		console.error(e);
 		//console.log("当前页面没有分页，进行还原操作");
 		//console.log($.cookie('page_cookie'));
	}
	
	//首页
	$("#beginPage").click(function() {
		if(jumpNumber!=1){
			jumpNumber = 1;
			LoadingInfo(1);
			savePage(1);
			changeClass("begin");
		}
		return false;
	});

	//上一页
	$("#prevPage").click(function() {
		var obj = $(".currentPage");
		var index = parseInt(obj.text()) - 1;
		if (index > 0) {
			obj.removeClass("currentPage");
			obj.prev().addClass("currentPage");
			jumpNumber = index;
			LoadingInfo(index);
			savePage(index);
			//判断是否是第一页
			if (index == 1) {
				changeClass("prev");
			} else {
				changeClass();
			}
		}
		return false;
	});

	//下一页
	$("#nextPage").click(function() {
		var obj = $(".currentPage");
		//当前页加一（下一页）
		var index = parseInt(obj.text()) + 1;
		if (index <= $("#page_count").val()) {
			jumpNumber = index;
			LoadingInfo(index);
			savePage(index);
			obj.removeClass("currentPage");
			obj.next().addClass("currentPage");
			//判断是否是最后一页
			if (index == $("#page_count").val()) {
				changeClass("next");
			} else {
				changeClass();
			}
		}
		return false;
	});

	//末页
	$("#lastPage").click(function() {
		jumpNumber = $("#page_count").val();
		if(jumpNumber>1){
			LoadingInfo(jumpNumber);
			savePage(jumpNumber);
			$("#pageNumber a:eq("+ (parseInt($("#page_count").val()) - 1) + ")").text($("#page_count").val());
			changeClass("next");
		}
		return false;
	});

	//每页显示页数
	$("#showNumber").blur(function(){
		if(isNaN($(this).val())){
			$("#showNumber").val(20);
			jumpNumber = 1;
			LoadingInfo(jumpNumber);
			savePage(jumpNumber);
			return;
		}
		if($(this).val().indexOf(".") != -1){
			var index = $(this).val().indexOf(".");
			$("#showNumber").val($(this).val().substr(0,index));
			jumpNumber = 1;
			LoadingInfo(jumpNumber);
			savePage(jumpNumber);
			return;
		}
		if(parseInt($(this).val())<=0){
			jumpNumber = 1;
			LoadingInfo(jumpNumber);
			savePage(jumpNumber);
			return;
		}
		//页数没有变化的话，就不要再执行查询
		if(parseInt($(this).val()) != $(this).attr("data-default")){
// 			jumpNumber = 1;//设置每页显示的页数，并且设置到第一页
			$(this).attr("data-default",$(this).val());
			LoadingInfo(jumpNumber);
			savePage(jumpNumber);
		}
		return false;
	}).keyup(function(event){
		if(event.keyCode == 13){
			if(isNaN($(this).val())){
				$("#showNumber").val(20);
				jumpNumber = 1;
				LoadingInfo(jumpNumber);
				savePage(jumpNumber);
			}
			//页数没有变化的话，就不要再执行查询
			if(parseInt($(this).val()) != $(this).attr("data-default")){
// 				jumpNumber = 1;//设置每页显示的页数，并且设置到第一页
				$(this).attr("data-default",$(this).val());
				//总数据数量
				var total_count = parseInt($(".total-data").attr("data-total-count"));
				//计算用户输入的页数是否超过当前页数
				var curr_count = Math.ceil(total_count/parseInt($(this).val()));
				if( curr_count !=0 && curr_count < jumpNumber){
					jumpNumber = curr_count;//输入的页数超过了，没有那么多
				}
				LoadingInfo(jumpNumber);
				savePage(jumpNumber);
			}
		}
		return false;
	});
});

//跳转页面
function JumpForPage(obj) {
	jumpNumber = $(obj).text();
	LoadingInfo($(obj).text());
	savePage($(obj).text());
	$(".currentPage").removeClass("currentPage");
	$(obj).addClass("currentPage");
	if (jumpNumber == 1) {
		changeClass("prev");
	} else if (jumpNumber < parseInt($("#page_count").val())) {
		changeClass();
	} else if (jumpNumber == parseInt($("#page_count").val())) {
		changeClass("next");
	}
}
</script>
		</div>
		
	</section>
	
</article>

<!-- 公共的操作提示弹出框 common-success：成功，common-warning：警告，common-error：错误，-->
<div class="common-tip-message js-common-tip">
	<div class="tip-container">
		<span class="inner"></span>
	</div>
</div>

<!--修改密码弹出框 -->
<div id="edit-password" class="modal hide fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" style="width:562px;top:50%;margin-top:-180.5px;">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<h3>修改密码</h3>
	</div>
	<div class="modal-body">
		<form class="form-horizontal">
			<div class="control-group">
				<label class="control-label" for="pwd0" style="width: 160px;"><span class="color-red">*</span>原密码</label>
				<div class="controls" style="margin-left: 180px;">
					<input type="password" id="pwd0" placeholder="请输入原密码" class="input-common" />
					<span class="help-block"></span>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="pwd1" style="width: 160px;"><span class="color-red">*</span>新密码</label>
				<div class="controls" style="margin-left: 180px;">
					<input type="password" id="pwd1" placeholder="请输入新密码" class="input-common" />
					<span class="help-block"></span>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="pwd2" style="width: 160px;"><span class="color-red">*</span>再次输入密码</label>
				<div class="controls" style="margin-left: 180px;">
					<input type="password" id="pwd2" placeholder="请输入确认密码" class="input-common" />
					<span class="help-block"></span>
				</div>
			</div>
			<div style="text-align: center; height: 20px;" id="show"></div>
		</form>
	</div>
	<div class="modal-footer">
		<button class="btn-common btn-big" onclick="submitPassword()" style="display:inline-block;">保存</button>
		<button class="btn-common-cancle btn-big" data-dismiss="modal" aria-hidden="true">关闭</button>
	</div>
</div>

<link rel="stylesheet" type="text/css" href="ADMIN_CSS/jquery-ui-private.css">
<script>
var platform_shopname= '<?php echo $web_popup_title; ?>';
</script>
<script type="text/javascript" src="ADMIN_JS/jquery-ui-private.js" charset="utf-8"></script>
<script type="text/javascript" src="ADMIN_JS/jquery.timers.js"></script>
<div id="dialog"></div>
<script type="text/javascript">
function showMessage(type, message,url,time){
	if(url == undefined){
		url = '';
	}
	if(time == undefined){
		time = 2;
	}
	//成功之后的跳转
	if(type == 'success'){
		$( "#dialog").dialog({
			buttons: {
				"确定,#0059d6,#fff": function() {
					$(this).dialog('close');
				}
			},
			contentText:message,
			time:time,
			timeHref: url,
			msgType : type
		});
	}
	//失败之后的跳转
	if(type == 'error'){
		$( "#dialog").dialog({
			buttons: {
				"确定,#0059d6,#fff": function() {
					$(this).dialog('close');
				}
			},
			time:time,
			contentText:message,
			timeHref: url,
			msgType : type
		});
	}
}

function showConfirm(content){
	$( "#dialog").dialog({
		buttons: {
			"确定": function() {
				$(this).dialog('close');
				return 1;
			},
			"取消,#f5f5f5,#666": function() {
				$(this).dialog('close');
				return 0;
			}
		},
		contentText:content,
	});
}
</script>
<script src="ADMIN_JS/ns_common_base.js"></script>
<script src="__STATIC__/blue/js/ns_common_blue.js"></script>
<script>
	window.onload = function(){

	}
$(function(){
	
	$(".ns-third-menu ul .btn-more").toggle(
		function(){
			$(".ns-third-menu ul").animate({height:"84px"},300);
		},
		function(){
			$(".ns-third-menu ul").animate({height:"42px"},300);
		}
	);
	
	//公共下拉框
	$('.select-common').selectric();
	
	//公共复选框点击切换样式
	$(".checkbox-common").live("click",function(){
		var checkbox = $(this).children("input");
		if(checkbox.is(":checked")) $(this).addClass("selected");
		else $(this).removeClass("selected");
	});
	
	//鼠标浮上查看预览上传的图片
	$(".upload-btn-common>img,#preview_adv").live("mouseover",function(){
		var curr = $(this);
		var src = curr.attr("data-src");
		if(src){
			//alert(src);
			var contents = '<img src="'+src+'" style="width: 100px;height: auto;display:block;margin:0 auto;">';
			//鼠标每次浮上图片时，要销毁之前的事件绑定
			curr.popover("destroy");
			
			//重新配置弹出框内容
			curr.popover({ content : contents });

			//显示
			curr.popover("show");
		}
	});
	
	//鼠标离开隐藏预览上传的图片
	$(".upload-btn-common>img,#preview_adv").live("mouseout",function(){
		var curr = $(this);
		//隐藏
		if($(".popover.top").is(":visible") && curr.attr("data-src")) curr.popover("hide");
	});

	//公共单选框点击切换样式
	$(".radio-common").live("click",function(){
		var radio = $(this).children("input");
		var name = radio.attr("name");
		if(radio.is(":checked")){
			$(".radio-common>input[type='radio'][name='" + name + "']").parent().removeClass("selected");
			$(this).addClass("selected");
		}else{
			$(this).removeClass("selected");
		}
	});

	//顶部导航管理显示隐藏
	$(".ns-navigation-title>span").click(function(){
		$(".ns-navigation-management").slideUp(400);
	});
	
	$(".js-nav").toggle(function(){
		$(".ns-navigation-management").slideDown(400);
	},function(){
		$(".ns-navigation-management").slideUp(400);
	});
	
	//搜索展开
	$(".ns-search-block").hover(function(){
		if($(this).children(".mask-layer-search").is(":hidden")) $(this).children(".mask-layer-search").fadeIn(300);
	},function(){
		if($(this).children(".mask-layer-search").is(":visible")) $(this).children(".mask-layer-search").fadeOut(300);
	});
	
	$(".ns-base-tool .ns-help").hover(function(){
		if($(this).children("ul").is(":hidden")) $(this).children("ul").fadeIn(250);
	},function(){
		if($(this).children("ul").is(":visible")) $(this).children("ul").fadeOut(250);
	});
	
});

function addFavorite() {
	var url = window.location;
	var title = document.title;
	var ua = navigator.userAgent.toLowerCase();
	if (ua.indexOf("360se") > -1) {
		alert("由于360浏览器功能限制，请按 Ctrl+D 手动收藏！");
	}else if (ua.indexOf("msie 8") > -1) {
		window.external.AddToFavoritesBar(url, title); //IE8
	}
	else if (document.all) {
		try{
			window.external.addFavorite(url, title);
		}catch(e){
			alert('您的浏览器不支持,请按 Ctrl+D 手动收藏!');
		}
	}else if (window.sidebar) {
		window.sidebar.addPanel(title, url, "");
	}else {
		alert('您的浏览器不支持,请按 Ctrl+D 手动收藏!');
	}
}

</script>

<script type="text/javascript">
$(function(){
	$(".js-update-goods-name,.js-update-introduction").live("blur",function(){
		var up_type = $(this).attr("data-up-type");
		var goods_id = $(this).attr("data-goods-id");
		var editContent = $(this).val();
		if(editContent == ""){
			if(up_type == "goods_name"){
				showTip("商品名不可为空","warning");
				$(this).focus();
				return false;
			}
		}
		var $self = $(this);
		$.ajax({
			type : "post",
			url : "<?php echo __URL('ADMIN_MAIN/goods/ajaxEditGoodsNameOrIntroduction'); ?>",
			data : {
				"goods_id" : goods_id,
				"up_type" : up_type,
				"up_content" : editContent
			},
			success : function(data){
				if(data['code'] > 0){
					$self.prev(".editGoodsIntroduction").children("a").text(editContent);
				}
				$self.hide();
				$self.prev(".editGoodsIntroduction").show();
			}
		});
	}).live("keyup",function(event){
		if(event.keyCode == 13) $(this).blur();
	});
	
	//排序规则
	$(".goods-fields-sort").click(function(){
		
		var field = $(this).attr("data-field");
		var sort_rule = $(this).attr("data-field");
		$(this).siblings().css("color","#333333").find("span").removeClass("desc selected").addClass("desc");
		$(this).css("color","#126AE4");
		if($(this).find("span").hasClass("desc") && $(this).find("span").hasClass("selected")){
			$(this).find("span").removeClass("desc").addClass("selected asc");
			sort_rule += ",a";
		}else if(($(this).find("span").hasClass("asc") && $(this).find("span").hasClass("selected")) || $(this).find("span").hasClass("desc")){
			$(this).find("span").removeClass("asc").addClass("selected desc");
			sort_rule += ",d";
		}
		$("#hidden_sort_rule").val(sort_rule);
		LoadingInfo(1);
	});

});

function searchData(){
	$(".more-search-container").slideUp();
	LoadingInfo(1);
}

//隐藏商品分组
function hideEditGroup(){
	$("#editGroup").popover("hide");
}

function hideSetRecommend(){
	$("#setRecommend").popover("hide");
}

function LoadingInfo(page_index) {
	
	var start_date = $("#startDate").val();
	var end_date = $("#endDate").val();
	var state = $("#state").val();
	var goods_name =$("#goods_name").val();
	var goods_code = $("#goods_code").val();
	var category_id_1 = $("#category_id_1").val();
	var category_id_2 = $("#category_id_2").val();
	var category_id_3 = $("#category_id_3").val();
	var selectGoodsLabelId = $("#selectGoodsLabelId").val();
	var supplier_id = $("#supplier_id").val();
	var stock_warning = $("#stock_warning").val();
	var goods_type = $("#goods_type").val();
	$.ajax({
		type : "post",
		url : "<?php echo __URL('ADMIN_MAIN/goods/goodslist'); ?>",
		data : {
			"page_index" : page_index,
			"page_size" : $("#showNumber").val(),
			"start_date":start_date,
			"end_date":end_date,
			"state":state,
			"goods_name":goods_name,
			"code":goods_code,
			"category_id_1" : category_id_1,
			"category_id_2" : category_id_2,
			"category_id_3" : category_id_3,
			"selectGoodsLabelId" : selectGoodsLabelId,
			"supplier_id" : supplier_id,
			"stock_warning" : stock_warning,
			'sort_rule' : $("#hidden_sort_rule").val(),
			'goods_type' : goods_type
		},
		success : function(data) {

			if (data["data"].length > 0) {
				$("#productTbody").empty();
				for (var i = 0; i < data["data"].length; i++) {

					var html = '';
					html += '<tr class="tr-title">';
						html += '<td class="td-'+ data["data"][i]["goods_id"]+'" style="border-bottom:0;">';
// 							html += '<label style="text-align: center;vertical-align: middle;margin: 0 0 0 -1px;">';
// 								html += '<i class="checkbox-common"><input value="' + data["data"][i]["goods_id"] + '" name="sub" data-state="'+data["data"][i]["state"]+'" type="checkbox"></i>';
// 							html += '</label>';
						html += '</td>';

						html += '<td colspan="9" style="border-bottom:0;">';
							html += '<div style="display: inline-block; width: 100%;font-size:12px;color:#666;" class="pro-code">';
								html += '<span>商家编码'+'：' + data["data"][i]["code"] + '</span>';
								html += '<span class="pro-code" style="margin-left:10px;">创建时间：'+timeStampTurnTime(data["data"][i]["create_time"]);
									html += '<span class="div-flag-style" style="display: inline-block;margin:0 20px;position:relative">';
										html += '<i class="icon-qrcode"style="background: none; color: #555; font-size: 20px; margin-right: 0;"></i>';
										html += '<div class="QRcode" style="display: none; position: absolute;width:110px;top:28px;left:0;z-index:10;"id="qrcode">';
											html += '<p><img src="'+ __IMG(data["data"][i]["QRcode"])+'" style="width:110px;"></p>';
										html += '</div>';
									html += '</span>';
								html += '</span>';
							html += '</div>';
						html += '</td>';
					html += '</tr>';

					html += '<tr>';
						html += '<td align="center">';
							html += '<i class="checkbox-common"><input value="' + data["data"][i]["goods_id"] + '" name="sub" data-state="'+data["data"][i]["state"]+'" type="checkbox"></i>';
						html += '</td>';
						html += '<td colspan="1">';
							html += '<div style="width:450px;">';
								html += '<a class="a-pro-view-img" href="'+__URL('SHOP_MAIN/goods/goodsinfo?goodsid='+data["data"][i]["goods_id"])+'" target="_blank" style="height:70px;line-height:70px;text-align:center;">';
									html += '<img class="thumbnail-img" src="'+__IMG(data["data"][i]["pic_cover_micro"])+'">';
								html += '</a>';
								html += '<div class="div-pro-view-name">';
// 									html += '<span class="thumbnail-name" title='+ data["data"][i]["goods_name"]+'">';
										html += '<div class="editGoodsIntroduction" ondblclick="editGoodsInfo(this)">';
											html += '<a target="_blank" style="word-break:break-all;" href="'+__URL('SHOP_MAIN/goods/goodsinfo?goodsid='+data["data"][i]["goods_id"])+'">' + data["data"][i]["goods_name"] + '</a>';
										html += '</div>';
										html += '<input class="js-update-goods-name input-common" data-goods-id ="' + data['data'][i]['goods_id'] + '" data-up-type="goods_name" type="text" value="'+data["data"][i]['goods_name']+'"/>';
// 									html += '</span>';
									html += '<br/>';

									if(data["data"][i]['introduction'] != '' && data["data"][i]['introduction'] != undefined){

									html += '<div class="editGoodsIntroduction" ondblclick="editGoodsInfo(this)">';
										html += '<span style="color:#999;font-size:12px;display:block;height:25px;overflow:hidden;text-decoration: none;">'+data["data"][i]['introduction']+'</span>';
									html += '</div>';
									html += '<input data-goods-id ="' + data['data'][i]['goods_id'] + '" data-up-type="introduction" class="js-update-introduction" type="text" maxlength="60" value="'+data["data"][i]['introduction']+'" />';

									}
									html += '<div style="position: relative;margin-left: 75px;">';
										html += data["data"][i]["is_hot"] == 1 ? '<i class="hot">热</i>' : '';
										html += data["data"][i]["is_recommend"] == 1 ? '<i class="recommend">精</i>' : '';
										html += data["data"][i]["is_new"] == 1 ? '<i class="new">新</i>' : '';
										if(data["data"][i]['goods_group_name'] != '' && data["data"][i]['goods_group_name'] != undefined){
											var tmp_array = data["data"][i]['goods_group_name'].split(",");
											$.each(tmp_array,function(k,v){	
												if(v != ""){
													html += '<i style="color:#999;font-size:12px;margin-top:5px;padding:1px 4px;border-radius:3px;display:inline-block;color:#FFF;background-color:#FF6600;text-decoration: none;height:16px;line-height: 16px;overflow:hidden;margin-right:5px;text-align:center;font-style:normal;">'+v+'</i>';
												}
											});
										}
									html += '</div>';
								html += '</div>';
							html += '</div>';
						html += '</td>';

						html += '<td style="text-align: right;">';
// 							if(data["data"][i]["price"] != data["data"][i]["promotion_price"]){
// 								html += '<div class="priceaddactive">';
// 									html += '<span class="price-lable">原&nbsp;&nbsp;&nbsp;价：</span>';
// 									html += '<span class="price-numble" style="color: #666;"id="moreChangePrice'+ data["data"][i]["goods_id"]+'">' + data["data"][i]["price"] + '</span>';
// 								html += '</div>';
// 							}
							html += '<div>';
								html += '<span class="price-numble"id="moreChangePrice'+ data["data"][i]["goods_id"]+'" style="color:#FF6600;">' + data["data"][i]["promotion_price"] + '</span>';
							html += '</div>';
						html += '</td>';

						html += '<td style="text-align: right;">';
							html += '<div class="cell">';
								html += '<span class="pro-stock" style="color: #666;" id="moreChangeStock'+ data["data"][i]["goods_id"] + '">' + data["data"][i]["stock"] + '</span>';
							html += '</div>';
						html += '</td>';

						html += '<td style="text-align: right;">';
							html += '<div class="cell">';
								html += '<span class="pro-stock" style="color: #666;" id="moreChangeStock'+ data["data"][i]["goods_id"]+'">' + data["data"][i]["real_sales"] + '</span>';
							html += '</div>';
						html += '</td>';
						
						html += '<td style="text-align: center;">';
						if(data['data'][i]['goods_type'] == 1){
							html += '<span>实物类</span>';
						}else{
							html += '<span>虚拟类</span>';
						}
						html += '</td>';

						html += '<td style="text-align: center;">';
							html += '<div class="cell">';
								html += '<input class="input-common input-common-sort" goods_id="' + data["data"][i]["goods_id"] + '"  value="' + data["data"][i]["sort"] + '" onchange="changeSort(this)"' + 'type="number" title="排序号数值越大，商城商品列表显示越靠前">';
							html += '</div>';
						html += '</td>';

						html += '<td>';
							html += '<div class="bs-docs-example tooltip-demo"style="text-align: center;">';
								html += '<a href="' + __URL("ADMIN_MAIN/goods/addgoods?step=2&goodsId="+ data["data"][i]["goods_id"]) + '" title="编辑商品" >编辑</a>';
								html += '<a href="javascript:copyGoodsDetail(' + data["data"][i]["goods_id"] + ');" title="复制商品" >复制</a>';
								html += '<a href="javascript:deleteGoods(' + data["data"][i]["goods_id"] + ')" title="删除商品">删除</a>';
								if(data["data"][i]["state"] == 1){
									html += '<br/><a href="javascript:modifyGoodsOnline('+data["data"][i]["goods_id"]+',\'offline\')">下架</a>';
								}else{
									html += '<br/><a href="javascript:modifyGoodsOnline('+data["data"][i]["goods_id"]+',\'online\')" style="color:#999;">上架</a>';
								}
								if(data['data'][i]['goods_type'] == 0){
									html += '<br/><a href="' + __URL("ADMIN_MAIN/goods/virtualGoodsList?goods_id="+ data["data"][i]["goods_id"]) + '" title="虚拟商品管理" target="_blank" >虚拟商品管理</a>';
								}
							html += '</div>';
						html += '</td>';
					html += '</tr>';
					$("#productTbody").append(html);
				}
			} else {
				var html = '<tr align="center"><td colspan="9" style="text-align: center;font-weight: normal;color: #999;">暂无符合条件的数据记录</td></tr>';
				$("#productTbody").html(html);
			}
			initPageData(data["page_count"],data['data'].length,data['total_count']);
			$("#pageNumber").html(pagenumShow(jumpNumber,$("#page_count").val(),<?php echo $pageshow; ?>));
			code();
		}
	});
}

//二维码
function code(){
	$(".div-flag-style").mouseover(function(){
		$(this).children('.QRcode').show();
	});
	$(".div-flag-style").mouseout(function(){
		$(this).children('.QRcode').hide();
	});
} 

//把值传过去即可
function updateGoodsDetail(goods_id) {
	window.location = __URL("ADMIN_MAIN/goods/addgoods?step=2&goodsId="+ goods_id);
}

//全选
function CheckAll(event){
	var checked = event.checked;
	$("#productTbody input[type = 'checkbox']").prop("checked",checked);
	if(checked) $(".table-class tbody input[type = 'checkbox']").parent().addClass("selected");
	else $(".table-class tbody input[type = 'checkbox']").parent().removeClass("selected");
}

//商品上架id合计
function goodsIdCount(line){
	var goods_ids= "";
	$("#productTbody input[type='checkbox']:checked").each(function() {
		if (!isNaN($(this).val())) {
			var state = $(this).data("state");
//			if(line == "online"){
//				if(state == 1){
//					$( "#dialog" ).dialog({
//						buttons: {
//							"确定": function() {
//								$(this).dialog('close');
//							}
//						},
//						contentText:"记录中包含已上架记录",
//						title:"消息提醒",
//					});
//					return false;
//				}
//			}else{
//				if(state == 0){
//					$( "#dialog" ).dialog({
//						buttons: {
//							"确定": function() {
//								$(this).dialog('close');
//							}
//						},
//						contentText:"记录中包含已下架记录",
//						title:"消息提醒",
//					});
//				return false;
//				}
//			}
			goods_ids = $(this).val() + "," + goods_ids;
		}
	});
	goods_ids = goods_ids.substring(0, goods_ids.length - 1);
	if(goods_ids == ""){
		showTip("请选择需要操作的记录","warning");
		return false;
	}
	modifyGoodsOnline(goods_ids,line);
}

//商品上下架
function modifyGoodsOnline(goods_ids,line){
	if(line == "online"){
		var url = "<?php echo __URL('ADMIN_MAIN/Goods/modifygoodsonline'); ?>";
		var lingStr = "上架";
	}else{
		var url = "<?php echo __URL('ADMIN_MAIN/Goods/modifygoodsoffline'); ?>";
		var lingStr = "下架";
	}
	$.ajax({
		type : "post",
		url : url,
		data : { "goods_ids" : goods_ids },
		success : function(data) {
			if(data["code"] > 0 ){
				LoadingInfo(getCurrentIndex(goods_ids,'#productTbody','tr[class="tr-title"]'));
				showTip("商品"+lingStr+"成功","success");
			}
		}
	})
}

function batchDelete() {
	var goods_ids= new Array();
	$("#productTbody input[type='checkbox']:checked").each(function() {
		if (!isNaN($(this).val())) {
			goods_ids.push($(this).val());
		}
	});
	if(goods_ids.length ==0){
		showTip("请选择需要操作的记录","warning");
		return false;
	}
	deleteGoods(goods_ids);
}

function deleteGoods(goods_ids){
	$( "#dialog" ).dialog({
		buttons: {
			"确定": function() {
				$.ajax({
					type : "post",
					url : "<?php echo __URL('ADMIN_MAIN/goods/deletegoods'); ?>",
					data : { "goods_ids" : goods_ids.toString() },
					dataType : "json",
					success : function(data) {
						if(data["code"] > 0 ){
							LoadingInfo(getCurrentIndex(goods_ids,'#productTbody','tr[class="tr-title"]'));
							showTip(data['message'],"success");
							$("#chek_all").prop("checked", false);
						}
					}
				});
				$(this).dialog('close');
			},
			"取消,#f5f5f5,#666": function() {
				$(this).dialog('close');
			},
		},
		contentText:"确定要删除吗？",
	});
}

//商品修改分组id合计
function goodsGroupIdCount(){
	var goods_ids= "";
	$("#productTbody input[type='checkbox']:checked").each(function() {
		if (!isNaN($(this).val())) {
			goods_ids = $(this).val() + "," + goods_ids;
		}
	});
	goods_ids = goods_ids.substring(0, goods_ids.length - 1);
	if(goods_ids == ""){
		showTip("请选择需要操作的记录","warning");
		return false;
	}
	$("#goods_type_ids").val(goods_ids);
	$("#editGroup").popover("show");
	$(".popover").css("max-width",'1000px');
}

//商品修改分组
function goodsGroupUpdate(){
	var goods_type = "";
	var goods_ids = $("#goods_type_ids").val();
	$("#goodsChecked input[type='checkbox']:checked").each(function(){
		if (!isNaN($(this).val())) {
			goods_type = $(this).val() + "," + goods_type;
		}
	})
	// if(goods_type == ""){
	//	showTip("请选择需要操作的记录","warning");
	// 	$( "#dialog" ).dialog({
	// 		buttons: {
	// 			"确定": function() {
	// 				$(this).dialog('close');
	// 			}
	// 		},
	// 		contentText:"请选择需要操作的记录",
	// 		title:"消息提醒",
	// 	});
	// 	return false;
	// }
	goods_type = goods_type.substring(0, goods_type.length - 1);
	$.ajax({
		type : "post",
		url : "<?php echo __URL('ADMIN_MAIN/goods/modifygoodsgroup'); ?>",
		data : { "goods_id" : goods_ids, "goods_type" : goods_type },
		success : function(data) {
			if(data["code"] > 0 ){
				$("#editGroup").popover("hide");
				LoadingInfo(getCurrentIndex(goods_ids,'#productTbody','tr[class="tr-title"]'));
				showTip(data['message'],"success");
			}
		}
	})
}

//显示 推荐选项
function ShowRecommend(){
	var goods_ids= "";
	$("#productTbody input[type='checkbox']:checked").each(function() {
		if (!isNaN($(this).val())) {
			goods_ids = $(this).val() + "," + goods_ids;
		}
	});
	goods_ids = goods_ids.substring(0, goods_ids.length - 1);
	if(goods_ids == ""){
		showTip("请选择需要操作的记录","warning");
		return false;
	}
	$("#goods_type_ids").val(goods_ids);
	$("#setRecommend").popover("show");
}

$("#recommendType label,#recommendType label input").live("click",function(){
// 	if($(this).children("input").is(":checked")){
// 		$(this).children("input").prop("checked",false);
// 	}else{
// 		$("#recommendType label input").prop("checked",false);
// 		$(this).children("input").prop("checked",true);
// 	}
})

//修改为  推荐 商品
function setRecommend(){
	var recommend_type = '';
	var goods_ids = $("#goods_type_ids").val();
	$("#recommendType input[type='checkbox']").each(function(){
		if ($(this).attr("checked") == 'checked') {
			var recommend_type_new = 1;
		}else{
			var recommend_type_new = 0;
		}
		recommend_type = recommend_type_new + "," + recommend_type;
	})
	if(recommend_type == ""){
		showTip("请选择需要操作的记录","warning");
		return false;
	}
	recommend_type = recommend_type.substring(0, recommend_type.length - 1);
	$.ajax({
		type : "post",
		url : "<?php echo __URL('ADMIN_MAIN/goods/modifygoodsrecommend'); ?>",
		data : {
			"goods_id" : goods_ids,
			"recommend_type" : recommend_type
		},
		success : function(data) {
			if(data["code"] > 0 ){
				$("#setRecommend").popover("hide");
				LoadingInfo(getCurrentIndex(goods_ids,'#productTbody','tr[class="tr-title"]'));
				showTip(data['message'],"success");
			} 
		}
	})
}

function copyGoodsDetail(goods_id){
	$( "#dialog" ).dialog({
		buttons: {
			"确定": function() {
				$.ajax({
					type : "post",
					url : "<?php echo __URL('ADMIN_MAIN/goods/copygoods'); ?>",
					data : {"goods_id":goods_id},
					dataType : "json",
					success : function(data) {
						if(data["code"] > 0 ){
							LoadingInfo(getCurrentIndex(goods_id,'#productTbody','tr[class="tr-title"]'));
							showTip(data["message"],"success");
							$("#chek_all").prop("checked", false);
						}else{
							showTip(data["message"],"error");
						}
					}
				});
				$(this).dialog('close');
			},
			"取消,#f5f5f5,#666": function() {
				$(this).dialog('close');
			},
		},
		contentText:"确定要复制一条新的商品信息吗？",
	});
}

function changeSort(event){
	var sort = parseInt($(event).val());
	$(event).val(sort);
	var goods_id = $(event).attr("goods_id");
	$.ajax({
		type : "post",
		url : "<?php echo __URL('ADMIN_MAIN/goods/updateGoodsSortAjax'); ?>",
		data : { "sort" : sort, "goods_id" : goods_id },
		success : function(data){
			if(data.code>0){
				LoadingInfo(getCurrentIndex(goods_id,'#productTbody','tr[class="tr-title"]'));
				showTip(data.message,"success");
			}else{
				showTip(data.message,"error");
			}
		}
	})
}

//更新二维码
function batchUpdateGoodsQrcode(){
	var goods_ids= new Array();
	$("#productTbody input[type='checkbox']:checked").each(function() {
		if (!isNaN($(this).val())) {
			goods_ids.push($(this).val());
		}
	});
	if(goods_ids.length == 0){
		showTip("请至少选择一件商品","warning");
		return false;
	}
	$.ajax({
		type : "post",
		url : "<?php echo __URL('ADMIN_MAIN/goods/updateGoodsQrcode'); ?>",
		data : { "goods_id" : goods_ids.toString() },
		success : function(data){
			if (data["code"] > 0) {
				LoadingInfo(getCurrentIndex(goods_ids,'#productTbody','tr[class="tr-title"]'));
				showTip('二维码更新成功',"success");
			}else{
				showTip(data['message'],"error");
			}
		}
	})
}

function selectGoodsLabel(){
	$("#selectGoodsLabel").popover("show");
	$("#selectGoodsLabelId").val('');
	$("#selectGoodsLabel").val('');
}

function hideGroup(){
	$("#selectGoodsLabel").popover("hide");
	$("#selectGoodsLabel").val('');
}

function clickGoodsLabel(event){
	var goods_label_id = $(event).val();
	var goods_label_name = $(event).next("span").text();
	var selectGoodsLabelVal = $("#selectGoodsLabel").val();
	var selectGoodsLabelId = $("#selectGoodsLabelId").val();
	if($(event).is(":checked")){
		$("#selectGoodsLabelId").val(selectGoodsLabelId+goods_label_id+',');
		$("#selectGoodsLabel").val(selectGoodsLabelVal+goods_label_name+';');
	}else{
		selectGoodsLabelVal = selectGoodsLabelVal.replace(goods_label_name+';','');
		selectGoodsLabelId = selectGoodsLabelId.replace(goods_label_id+',','');
		$("#selectGoodsLabelId").val(selectGoodsLabelId);
		$("#selectGoodsLabel").val(selectGoodsLabelVal);
	}
}

function confirm(){
	$("#selectGoodsLabel").popover("hide");
}

function editGoodsInfo(event){
	$(event).hide();
	$(event).next("input").show().focus();
}
// 点击显示更多搜索
$(".more-search").click(function(){
	$(".more-search-container").slideToggle();
})

// 批量处理弹出框
$("#batchProcessing").click(function(){
	var goods_ids= new Array();
	$("#productTbody input[type='checkbox']:checked").each(function() {
		if (!isNaN($(this).val())) {
			goods_ids.push($(this).val());
		}
	});
	if(goods_ids.length == 0){
		showTip("请至少选择一件商品","warning");
		return false;
	}
	$("#batch_processing").modal("show");
})
</script>

</body>
</html>