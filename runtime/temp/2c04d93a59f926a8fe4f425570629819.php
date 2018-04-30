<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:40:"template/wap\anthony163\Login\login.html";i:1524740533;s:33:"template/wap\anthony163\base.html";i:1525008965;s:32:"template/wap\anthony163\url.html";i:1524737061;}*/ ?>
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
    
<link rel="stylesheet" href="__TEMP__/<?php echo $style; ?>/public/css/login.css">

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
        <a href="<?php echo __URL('APP_MAIN'); ?>" class="navbar-item" style="font-size: 26px">
            <i class="icon-home-outline"></i>
        </a>
        <div class="navbar-center">
            <span class="navbar-title">登录</span>
        </div>
        <div class="navbar-item">
            <a href="<?php echo __URL('APP_MAIN/Login/register'); ?>" class="search" >注册</a>        
        </div>
    </header>
    <div class="g-scrollview">
        <div class="content">
             <div class="logo_wrap">
                <img  class="logo_img lazy" src="__TEMP__/<?php echo $style; ?>/public/images/logoWrap.png"/>           
             </div>
             <div class="m-cell">
                <div class="cell-item">
                    <div class="cell-right">
                        <input class="cell-input" name="username" id="username" placeholder="<?php echo lang("enter_your_account_number"); ?>">
                    </div>
                </div>
                <div class="cell-item">
                    <div class="cell-right"><input class="cell-input" type="password" name="password" id="password" placeholder="<?php echo lang("please_input_password"); ?>"></div>
                </div>                  
            </div>
            <div class="m-button">
                <input type="submit" class="btn-block btn-primary" onclick="login()" value="登录">
            </div>
            <div class="third_wrap_title">
                <h3 class="title"><span>其他登录方式</span></h3>
            </div>
            <div class="third_wrap">
                <span style="font-size: 50px;color:#1C86EE;"><i class="icon-qq"></i></span>
            </div>
        </div>
    </div>
</section>

<!--内容结束-->
<script src="__TEMP__/<?php echo $style; ?>/public/js/jquery214.min.js"></script>
<script src="__TEMP__/<?php echo $style; ?>/public/js/common.js"></script>
<script src="__TEMP__/<?php echo $style; ?>/public/js/ydui.js"></script>

<script src="__TEMP__/<?php echo $style; ?>/public/js/login.js"></script>




</body>
</html>
