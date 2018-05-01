<?php if (!defined('THINK_PATH')) exit(); /*a:9:{s:40:"template/wap\anthony163\Index\index.html";i:1525100227;s:33:"template/wap\anthony163\base.html";i:1525091987;s:32:"template/wap\anthony163\url.html";i:1525091987;s:47:"template/wap\anthony163\Index\index_slider.html";i:1525091987;s:44:"template/wap\anthony163\Index\index_nav.html";i:1525091987;s:47:"template/wap\anthony163\Index\index_coupon.html";i:1525091987;s:49:"template/wap\anthony163\Index\index_discount.html";i:1525091987;s:46:"template/wap\anthony163\Index\index_topic.html";i:1525099818;s:46:"template/wap\anthony163\Index\index_floor.html";i:1525091987;}*/ ?>
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
    
<link rel="stylesheet" href="__TEMP__/<?php echo $style; ?>/public/css/index.css">

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

<!-- 头部-->
    <header class="m-navbar navbar-fixed" style="background-color: #fff;z-index: 10; padding: 0 0.1rem;">
        <div class="box1">
            <div class="logo">
                <a>
                    <img src="__TEMP__/<?php echo $style; ?>/public/images/index_logo.png" alt="">
                </a>
            </div>
            <div class="line">
                <i class="icon_one">
                    <img src="__TEMP__/<?php echo $style; ?>/public/images/one.png" alt="">
                </i>
                <input type="text" placeholder="<?php echo lang('search_goods'); ?>" id="text_ico">
                <input type="hidden" value="<?php echo $shop_id; ?>" id="hidden_shop_id"/>
                <span class="icon_tow">取 消</span>
            </div>
        </div>
    </header>
<div class="g-view">
    <!-- 轮播-->
            <div class="m-slider" data-ydui-slider="{autoplay: 3000}">
            <div class="slider-wrapper">
<?php if($plat_adv_list['is_use'] == 1): if($plat_adv_list['adv_list'][0]['adv_image'] != ''): if(is_array($plat_adv_list['adv_list']) || $plat_adv_list['adv_list'] instanceof \think\Collection || $plat_adv_list['adv_list'] instanceof \think\Paginator): if( count($plat_adv_list['adv_list'])==0 ) : echo "" ;else: foreach($plat_adv_list['adv_list'] as $key=>$v): ?>
                <div class="slider-item">
                    <a href="<?php echo $v['adv_url']; ?>">
                        <img src="<?php echo __IMG($v['adv_image']); ?>" alt="<?php echo lang('carousel_figure'); ?>">
                    </a>
                </div>
    <?php endforeach; endif; else: echo "" ;endif; endif; endif; ?>
            </div>
            <div class="slider-pagination"></div>
        </div>
    <div class="icon_text">
        <ul>
            <li><i class="icon-checkoff" style="color:#FF685D;font-size: .26rem;"></i>网易自营品牌</li>
            <li><i class="icon-like" style="color:#FF685D;font-size: .26rem;"></i>只为挑剔的你</li>
            <li><i class="icon-phone2" style="color:#FF685D;font-size: .26rem;"></i>只为挑剔的你</li>
        </ul>
     </div>
    <!-- 导航 -->
            <div class="m-grids-3" style="margin-top: 2%;">
            <a href="<?php echo __URL('APP_MAIN/goods/groupBuyingArea'); ?>" class="grids-item">
                <div class="grids-icon"><img src="__TEMP__/<?php echo $style; ?>/public/images/platform_nav_category1.png"></div>
                <div class="grids-txt"><span>团购</span></div>
            </a>
            <a href="<?php echo __URL('APP_MAIN/index/discount'); ?>" class="grids-item">
                <div class="grids-icon"><img src="__TEMP__/<?php echo $style; ?>/public/images/discount.png"></div>
                <div class="grids-txt"><span>限时折扣</span></div>
            </a>
            <a href="<?php echo __URL('APP_MAIN/Articlecenter/index'); ?>" class="grids-item">
                <div class="grids-icon"><img src="__TEMP__/<?php echo $style; ?>/public/images/articlecenter.png"></div>
                <div class="grids-txt"><span>文章中心</span></div>
            </a>
            <a href="<?php echo __URL('APP_MAIN/goods/brandlist'); ?>" class="grids-item">
                <div class="grids-icon"><img src="__TEMP__/<?php echo $style; ?>/public/images/platform_nav_cart.png"></div>
                <div class="grids-txt"><span>品牌专区</span></div>
            </a>
            <a href="<?php echo __URL('APP_MAIN/goods/promotionTopic'); ?>" class="grids-item">
                <div class="grids-icon"><img src="__TEMP__/<?php echo $style; ?>/public/images/promotion_topic.png"></div>
                <div class="grids-txt"><span>专题活动</span></div>
            </a>
            <a href="<?php echo __URL('APP_MAIN/goods/promotionzone'); ?>" class="grids-item">
                <div class="grids-icon"><img src="__TEMP__/<?php echo $style; ?>/public/images/platform_nav_member1.png"></div>
                <div class="grids-txt"><span>标签专区</span></div>
            </a>
        </div>
    <!-- 优惠券-->
    <div class="index_yhq" style="margin-top: 3%;">
            <div class="hd">
                <span>优惠券</span>
                <div style="font-size: .3rem;color:#333;display: inline-block;"><i class="icon-play"></i></div>
            </div>
            <div class="index_yhq_list">
                <ul>
                	<?php if(is_array($coupon_list) || $coupon_list instanceof \think\Collection || $coupon_list instanceof \think\Paginator): $i = 0; $__LIST__ = $coupon_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                    <li onclick="getCoupon(this,<?php echo $vo['coupon_type_id']; ?>)" data-max-fetch="<?php echo $vo['max_fetch']; ?>" data-received-num="<?php if(!empty($uid)): ?><?php echo $vo['received_num']; else: ?>0<?php endif; ?>">
                        <a href="javascript:;">
                            <div class="yhq_content">
                            	<?php 
                            		$num =  (int)$vo['money'];
                            	 ?>
                                    <p class="yhq_price"><?php echo $num; ?></p>
                                    <p class="yhq_explain">满<?php echo $vo['at_least']; ?>使用</p>
                            </div>
                        </a>
                    </li>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </div>
</div>
    <!--限时折扣-->
    <?php if(is_array($discount_list) || $discount_list instanceof \think\Collection || $discount_list instanceof \think\Paginator): $k = 0; $__LIST__ = $discount_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;if($k < 2): ?>
        <div class="index_discount"  style="margin-top: 3%;">
            <div class="left_discount">
                <a href="<?php echo __URL('APP_MAIN/index/discount'); ?>">
                    <div class="discount_title"><p>严选限时折扣</p></div>
                    <div class="discount_time">
                        <span class="discount_time_h" id="hour_show"></span>
                        <span class="discount_time_mh" >:</span>
                        <span class="discount_time_f" id="minute_show"></span>
                        <span class="discount_time_mh">:</span>
                        <span class="discount_time_s" id="second_show"></span>
                    </div>
                    <div class="discount_more"><p>点我查看更多</p></div>
                </a>
            </div>
            <div class="right_discount">
                <a href="<?php echo __URL('APP_MAIN/goods/goodsdetail?id='.$vo['goods_id']); ?>">
                    <img  src="<?php echo __IMG($vo['picture']['pic_cover_small']); ?>" style="width: 100%;" class="lazy">
                    <div class="right_discount_text">
                        <p>￥<?php echo $vo['promotion_price']; ?></p>
                        <p style="text-decoration:line-through;">￥<?php echo $vo['price']; ?></p>
                    </div>
                </a>
            </div>
        </div>
        <input type="hidden" value="<?php echo $vo['end_time']; ?>" id="discount_end">
            <?php endif; endforeach; endif; else: echo "" ;endif; ?>
    <!--专题-->
            <div class="index_topic" style="margin-top: 3%;">
            <div class="hd">
                <span>专题列表</span>
                <div style="font-size: .3rem;color:#333;display: inline-block;"><i class="icon-play"></i></div>
            </div>
            <div class="index_topic_content">
                <ul>
                    <?php if(is_array($topic_info['data']) || $topic_info['data'] instanceof \think\Collection || $topic_info['data'] instanceof \think\Paginator): if( count($topic_info['data'])==0 ) : echo "" ;else: foreach($topic_info['data'] as $k=>$v): if($k < 5): 
                        $startdate=time();
                        $enddate=$v['end_time'];
                        $date=floor(($enddate-$startdate)/86400);
                     ?>
                    <li>
                        <a href="<?php echo __URL('APP_MAIN/goods/promotionTopicGoods?topic_id='.$v['topic_id']); ?>">
                            <div class="toipc_content">
                                <div class="toipc_content_img"><img  src="<?php echo __IMG($v['picture_img']); ?>" style="width: 100%" class="lazy"></div>
                                <div class="toipc_content_text">
                                    <p class="toipc_content_title"><?php echo $v['topic_name']; ?></p>
                                    <span class="toipc_content_time"><div style="font-size:0.26rem;color:#b4282d;display: inline-block;"><i class="icon-time"></i>剩下<?php echo $date; ?>天</div></span>
                                    <p class="toipc_content_ms"><?php echo $v['keyword']; ?></p>
                                </div>
                            </div>
                        </a>
                    </li>
                    <?php endif; endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </div>
        </div>
    <!-- 楼层-->
    <?php if(is_array($block_list) || $block_list instanceof \think\Collection || $block_list instanceof \think\Paginator): if( count($block_list)==0 ) : echo "" ;else: foreach($block_list as $key=>$class): if(!empty($class['goods_list'])): ?>        
        <div class="floor" style="margin-top: 2%;background-color: #fff">
            <div class="hd">
                <span><?php echo $class['category_alias']; ?></span>
                <div style="font-size: .3rem;color:#333;display: inline-block;"><i class="icon-play"></i></div>
            </div>
            <div class="floor_adv">
                <a href="<?php echo __URL('APP_MAIN/goods/goodslist?category_id='.$class['category_id']); ?>">
                    <?php 
                        $arr = json_decode($class['ad_picture'],true);
                     ?>
                    <img src="<?php echo __IMG($arr['picture']); ?>" class="floor_adv_img">
                </a>
            </div>
                <article class="m-list list-theme1">
                    <?php if(is_array($class['goods_list']) || $class['goods_list'] instanceof \think\Collection || $class['goods_list'] instanceof \think\Paginator): if( count($class['goods_list'])==0 ) : echo "" ;else: foreach($class['goods_list'] as $k=>$list): ?>
                    <a href="<?php echo __URL('APP_MAIN/goods/goodsdetail?id='.$list['goods_id']); ?>" class="list-item">
                        <div class="list-img" style="position: relative;">
                            <img src="<?php echo __IMG($list['pic_cover_small']); ?>" class="lazy">
                            <p class="list-img-text"><?php echo $list['introduction']; ?></p>
                        </div>
                        <div class="list-mes">
                            <h3 class="list-title"><?php echo $list['goods_name']; ?></h3>
                            <div class="list-mes-item">
                                <div>
                                    <span class="list-price"><em>¥</em><?php echo $list['promotion_price']; ?></span>
                                    <span class="list-del-price">¥<?php echo $list['price']; ?></span>
                                </div>
                                <div>
                                    <?php if($list['shipping_fee'] == 0): ?>
                                    <span class="badge badge-radius badge-danger">包邮</span>
                                    <?php endif; ?>
                                    <!-- <span class="badge badge-radius badge-danger">新品</span> -->
                                </div>
                            </div>
                        </div>
                    </a>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </article>
        </div>
        <?php endif; endforeach; endif; else: echo "" ;endif; ?>
    <!--底部版权-->
    <div class="footer_bottom">
        <div class="bottom_top">
            <a href="" class="go_login">去登录</a>
            <a href="" class="go_pc">电脑版</a>
        </div>
        <div class="bottom_bottom">
            <p>网易公司版权所有 © 1997-2099</p>
        </div>
    </div>
</div>  
    <footer class="m-tabbar tabbar-fixed">
        <a href="<?php echo __URL('APP_MAIN'); ?>" class="tabbar-item tabbar-active">
            <span class="tabbar-icon">
                <i class="icon-home"></i>
            </span>
            <span class="tabbar-txt">首页</span>
        </a>
        <a href="<?php echo __URL('APP_MAIN/Goods/goodsclassificationlist'); ?>" class="tabbar-item">
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
        <a href="<?php echo __URL('APP_MAIN/member/index'); ?>" class="tabbar-item">
            <span class="tabbar-icon">
                <i class="icon-ucenter-outline"></i>
            </span>
            <span class="tabbar-txt">个人中心</span>
        </a>
    </footer>

<!--内容结束-->
<script src="__TEMP__/<?php echo $style; ?>/public/js/jquery214.min.js"></script>
<script src="__TEMP__/<?php echo $style; ?>/public/js/common.js"></script>
<script src="__TEMP__/<?php echo $style; ?>/public/js/ydui.js"></script>

<script src="__TEMP__/<?php echo $style; ?>/public/js/index.js"></script>


<script>
$(function () {
    timer(intDiff);
    $("#text_ico").focus(function () {
            $(".icon_tow").show();
        })
    $("#text_ico").blur(function () {
            $(".icon_tow").hide();
        })
    });
</script>

</body>
</html>
