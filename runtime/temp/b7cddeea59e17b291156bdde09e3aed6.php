<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:54:"template/wap\anthony163\Goods\promotionTopicGoods.html";i:1525098601;s:33:"template/wap\anthony163\base.html";i:1525091987;s:32:"template/wap\anthony163\url.html";i:1525091987;s:37:"template/wap\anthony163\downMenu.html";i:1525091987;}*/ ?>
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
    
<link rel="stylesheet" href="__TEMP__/<?php echo $style; ?>/public/css/topic_details.css">
<link rel="stylesheet" type="text/css" href="__TEMP__/<?php echo $style; ?>/public/css/aui1.css" />

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
        <a href="index.html" class="navbar-item" style="font-size: 26px">
           <i class="back-ico"></i>
        </a>
        <div class="navbar-center">
            <span class="navbar-title">专题详情</span>
        </div>
        <a href="#" class="navbar-item" style="font-size: 26px" tapmode onclick="showPopup('top-right')">
           <i class="icon-more"></i>    
        </a>
    </header>
    <div class="g-scrollview">
        <div class="topic_details_adv">
            <img src="<?php echo __IMG($info['background_img']); ?>" width="100%">
        </div>
        <div class="topic_details_ms">
            <?php echo $info['desc']; ?>
        </div>
        <article class="m-list list-theme3" style="margin-top: 2%;">
            <?php if(is_array($info['goods_list']) || $info['goods_list'] instanceof \think\Collection || $info['goods_list'] instanceof \think\Paginator): if( count($info['goods_list'])==0 ) : echo "" ;else: foreach($info['goods_list'] as $key=>$v): ?>
            <a href="<?php echo __URL('APP_MAIN/goods/goodsinfo?goodsid='.$v['goods_id']); ?>" class="list-item">
                <div class="list-img">
                    <img src="<?php echo __IMG($v['picture_info']['pic_cover_small']); ?>" alt="<?php echo $v['goods_name']; ?>">
                </div>
                <div class="list-mes">
                    <h3 class="list-title"><?php echo $v['goods_name']; ?></h3>
                    <div class="list-mes-item">
                        <div>
                            <?php if(in_array(($v['point_exchange_type']), explode(',',"0,2"))): ?>
                            <span class="list-price"><em>¥</em><?php echo $v['price']; ?></span>
                            <?php else: if($v['point_exchange_type'] == 1 && $v['promotion_price'] > 0): ?>
                                <span class="list-price"><em>¥</em><?php echo $v['price']; ?></span>
                                <?php else: ?>
                                <span class="list-price"><?php echo $v['point_exchange']; ?>积分</span>
                                <?php endif; endif; ?>
                        </div>
                        
                    </div>
                </div>
            </a>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </article>
    </div>
</section>

<!--内容结束-->
<script src="__TEMP__/<?php echo $style; ?>/public/js/jquery214.min.js"></script>
<script src="__TEMP__/<?php echo $style; ?>/public/js/common.js"></script>
<script src="__TEMP__/<?php echo $style; ?>/public/js/ydui.js"></script>




<script type="text/javascript" src="__TEMP__/<?php echo $style; ?>/public/js/api.js" ></script>
<script type="text/javascript" src="__TEMP__/<?php echo $style; ?>/public/js/aui-popup-new.js" ></script>
<script type="text/javascript">
var popup = new auiPopup();
    function showPopup(location){
        popup.init({
            frameBounces:true,
            location:location,
            buttons:[{
                text:'首页',
                url:'<?php echo __URL('APP_MAIN'); ?>',
                icon:'icon-dingdan'
            },
            {
                text:'分类',
                url:'<?php echo __URL('APP_MAIN/goods/goodsclassificationlist'); ?>',
                icon:'icon-erweima'
            },
            {
                text:'购物车',
                url:'<?php echo __URL('APP_MAIN/goods/cart'); ?>',
                icon:'icon-xunipiaowu'
            },
            {
                text:'个人中心',
                url:'<?php echo __URL('APP_MAIN/member/index'); ?>',
                icon:'icon-dingdan'
            }],
        })
    }
</script>

</body>
</html>
