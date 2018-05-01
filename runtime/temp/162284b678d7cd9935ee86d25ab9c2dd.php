<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:50:"template/wap\anthony163\Member\memberIndexB2C.html";i:1525091987;s:33:"template/wap\anthony163\base.html";i:1525091987;s:32:"template/wap\anthony163\url.html";i:1525091987;}*/ ?>
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
    
<link rel="stylesheet" href="__TEMP__/<?php echo $style; ?>/public/css/member.css">

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
    <div class="g-scrollview">
        <div class="member_top">
            <div class="member_top_images">
                <?php if($member_info['user_info']['user_headimg'] == ''): ?>
                <img src="<?php echo __IMG($default_headimg); ?>" class="member_img">
                <?php else: ?>
                    <img src="<?php echo __IMG($member_info['user_info']['user_headimg']); ?>" class="member_img"/>
                <?php endif; ?>
            </div>
            <div class="member_top_text">
                <?php if($member_info['user_info']['nick_name'] == ''): ?>
                <p class="member_nickname"><?php echo $member_info["user_info"]['user_name']; ?></p>
                <?php else: ?>
                <p class="member_nickname"><?php echo $member_info["user_info"]['nick_name']; ?></p>
                <?php endif; ?>
                <p class="member_grade"><?php echo $member_info['level_name']; ?></p>
            </div>
        </div>
            <div class="m-grids-2">
                <a href="<?php echo __URL('APP_MAIN/member/balancewater?shop_id='.$shop_id); ?>" class="grids-item">
                    <div class="grids-icon"><i class="iconfont icon-yue"></i></div>
                    <div class="grids-txt"><span><?php echo $member_info['balance']; ?></span></div>
                </a>
                <a href="<?php echo __URL('APP_MAIN/member/integralwater?shop_id='.$shop_id); ?>" class="grids-item">
                    <div class="grids-icon"><i class="iconfont icon-tubiao301"></i></div>
                    <div class="grids-txt"><span><?php echo $member_info['point']; ?></span></div>
                </a>
            </div>
        <div class="m-grids-3" style="margin-top: 1%;">
            <a href="<?php echo __URL('APP_MAIN/order/myorderlist?status=0&shop_id='.$shop_id); ?>" class="grids-item">
                <div class="grids-icon"><i class="iconfont icon-dingdan"></i></div>
                <div class="grids-txt"><span>我的订单</span></div>
            </a>
            <a href="<?php echo __URL('APP_MAIN/Member/personaldata'); ?>" class="grids-item">
                <div class="grids-icon"><i class="iconfont icon-gerenziliao"></i></div>
                <div class="grids-txt"><span>个人资料</span></div>
            </a>
            <a href="<?php echo __URL('APP_MAIN/PresellOrder/myPresellOrderList'); ?>" class="grids-item">
                <div class="grids-icon"><i class="iconfont icon-yushou"></i></div>
                <div class="grids-txt"><span>预售订单</span></div>
            </a>
            <a href="<?php echo __URL('APP_MAIN/Member/memberAddress?flag=1'); ?>" class="grids-item">
                <div class="grids-icon"><i class="iconfont icon-shouhuodizhi"></i></div>
                <div class="grids-txt"><span>收货地址</span></div>
            </a>
            <a href="<?php echo __URL('APP_MAIN/Member/getWchatQrcode'); ?>" class="grids-item">
                <div class="grids-icon"><i class="iconfont icon-erweima"></i></div>
                <div class="grids-txt"><span>推广二维码</span></div>
            </a>
            <a href="<?php echo __URL('APP_MAIN/Member/memberCoupon'); ?>" class="grids-item">
                <div class="grids-icon"><i class="iconfont icon-youhuiquan"></i></div>
                <div class="grids-txt"><span>优惠券</span></div>
            </a>
            <a href="<?php echo __URL('APP_MAIN/Verification/myVirtualCode'); ?>" class="grids-item">
                <div class="grids-icon"><i class="iconfont icon-xunipiaowu"></i></div>
                <div class="grids-txt"><span>我的虚拟码</span></div>
            </a>
            <a href="<?php echo __URL('APP_MAIN/Member/myCollection'); ?>" class="grids-item">
                <div class="grids-icon"><i class="iconfont icon-shoucang"></i></div>
                <div class="grids-txt"><span>我的收藏</span></div>
            </a>
            <a href="<?php echo __URL('APP_MAIN/Member/newMyPath'); ?>" class="grids-item">
                <div class="grids-icon"><i class="iconfont icon-zuji"></i></div>
                <div class="grids-txt"><span>我的足迹</span></div>
            </a>
        </div>
        <div class="m-button">
            <a class="btn-block btn-hollow" id="logout">退出登录</a>
        </div>
    </div>
    <footer class="m-tabbar">
        <a href="<?php echo __URL('APP_MAIN'); ?>" class="tabbar-item">
            <span class="tabbar-icon">
                <i class="icon-home"></i>
            </span>
            <span class="tabbar-txt">首页</span>
        </a>
        <a href="<?php echo __URL('APP_MAIN/goods/goodsclassificationlist'); ?>" class="tabbar-item">
            <span class="tabbar-icon">
                <i class="icon-type"></i>
            </span>
            <span class="tabbar-txt">分类</span>
        </a>
        <a href="<?php echo __URL('APP_MAIN/goods/cart'); ?>" class="tabbar-item">
            <span class="tabbar-icon">
                <i class="icon-shopcart-outline"></i>
            </span>
            <span class="tabbar-txt">购物车</span>
        </a>
        <a href="<?php echo __URL('APP_MAIN/member/index'); ?>" class="tabbar-item tabbar-active">
            <span class="tabbar-icon">
                <i class="icon-ucenter-outline"></i>
            </span>
            <span class="tabbar-txt">个人中心</span>
        </a>
    </footer>
</section>

<!--内容结束-->
<script src="__TEMP__/<?php echo $style; ?>/public/js/jquery214.min.js"></script>
<script src="__TEMP__/<?php echo $style; ?>/public/js/common.js"></script>
<script src="__TEMP__/<?php echo $style; ?>/public/js/ydui.js"></script>




<script>
    !function (win, $) {
        var dialog = win.YDUI.dialog;
        $('#logout').on('click', function () {
            dialog.confirm('提示', '是否退出登录？', function () {
                $.ajax({
                    url: "<?php echo __URL('APP_MAIN/member/logout'); ?>",
                    type: "post",
                    success: function (res) {
                        if (res['code'] > 0) {
                            dialog.toast('退出成功', 'success', 2000,function (){
                                window.location.href=__URL("APP_MAIN/login/index");
                            });
                        } else if(res["message"]!=null){
                            dialog.toast(res["message"], 'error', 2000);
                        }
                    }
                })
            });
        });
    }(window, jQuery);
</script>

</body>
</html>
