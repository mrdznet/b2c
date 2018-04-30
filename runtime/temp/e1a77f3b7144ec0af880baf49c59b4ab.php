<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:48:"template/wap\anthony163\Member\personalData.html";i:1524763931;s:33:"template/wap\anthony163\base.html";i:1524737077;s:32:"template/wap\anthony163\url.html";i:1524737061;}*/ ?>
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
    
<link rel="stylesheet" href="__TEMP__/<?php echo $style; ?>/public/css/personaldata.css">

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
            <span class="navbar-title">个人资料</span>
        </div>
    </header>
    <div class="g-scrollview">
        <div class="my_tx">
            <?php if($member_img != '' and $member_img != '0'): ?>
            <a href=""><img src="<?php echo __IMG($member_img); ?>" class="my_img"></a>
            <?php else: ?>
            <a href=""><img src="<?php echo __IMG($default_headimg); ?>" class="my_img"/></a>
            <?php endif; ?>
        </div>
            <div class="m-cell">
                <div class="cell-item">
                    <div class="cell-left">账号</div>
                    <div class="cell-right"><?php echo $member_info['user_info']['user_name']; ?></div>
                </div>
                <div class="cell-item">
                    <div class="cell-left">昵称</div>
                    <div class="cell-right cell-arrow" onclick="nickname()" id="nickname"><?php echo $member_info['user_info']['nick_name']; ?></div>
                </div>
                <div class="cell-item">
                    <div class="cell-left">密码</div>
                    <div class="cell-right cell-arrow">修改密码</a></div>
                </div>
                <div class="cell-item">
                    <div class="cell-left">手机</div>
                    <?php if($member_info['user_info']['user_tel'] != ''): ?>
                    <div class="cell-right cell-arrow"><?php echo $member_info['user_info']['user_tel']; ?></div>
                    <?php else: ?>
                    <div class="cell-right cell-arrow"><?php echo lang('bind_mobile_phone_number'); ?></div>
                    <?php endif; ?>
                </div>
                <div class="cell-item">
                    <div class="cell-left">QQ</div>
                    <?php if($member_info['user_info']['user_qq'] != ''): ?>
                    <div class="cell-right cell-arrow"><?php echo $member_info['user_info']['user_qq']; ?></div>
                    <?php else: ?>
                    <div class="cell-right cell-arrow">暂未填写</div>
                    <?php endif; ?>
                </div>
                <div class="cell-item">
                    <div class="cell-left">邮箱</div>
                    <?php if($member_info['user_info']['user_email'] != ''): ?>
                    <div class="cell-right cell-arrow"><?php echo $member_info['user_info']['user_email']; ?></div>
                    <?php else: ?>
                    <div class="cell-right cell-arrow">暂未填写</div>
                    <?php endif; ?>
                </div>
                <div class="cell-item">
                    <div class="cell-left">第三方绑定</div>
                    <div class="cell-right cell-arrow"><span style="font-size: 40px;color:#1C86EE;"><i class="icon-qq"></i></span></div>
                </div>
            </div>
    </div>
</section>
<div id="update_nickname" style="display: none;">
<div class="m-cell">
    <div class="cell-item">
        <div class="cell-left">昵称：</div>
        <div class="cell-right"><input type="text" class="cell-input" id="input_nick_name" placeholder="<?php echo lang('please_enter_your_nickname'); ?>" value='<?php echo $member_info['user_info']['nick_name']; ?>'/></div>
    </div>
</div>
    <div class="m-button">
        <a href="javascript:;" class="btn-block btn-primary" onclick="xg_nickname()">修改</a>
        <a href="javascript:;" class="btn-block btn-danger" onclick="layer.closeAll();">返回</a>
    </div>
</div>

<!--内容结束-->
<script src="__TEMP__/<?php echo $style; ?>/public/js/jquery214.min.js"></script>
<script src="__TEMP__/<?php echo $style; ?>/public/js/ydui.js"></script>

<script src="__TEMP__/<?php echo $style; ?>/public/js/layer.js"></script>
<script src="__TEMP__/<?php echo $style; ?>/public/js/personaldata.js"></script>




</body>
</html>
