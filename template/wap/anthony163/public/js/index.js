!function (win, $) {
    var dialog = win.YDUI.dialog;
    var user_id =$('#uid').val();
    var is_have = true;
    // 领取优惠券
        win.getCoupon=function(event,coupon_type_id){
        var info = new Array();
            info['maxFetch'] = $(event).attr("data-max-fetch");
            info['receivedNum'] = $(event).attr("data-received-num");
            if (user_id == '') {
                dialog.toast('暂未登录！', 'error', 1000);
            }else if (is_have) {
                is_have = false;
                $.ajax({
                    type:'post',
                    url:__URL(APPMAIN+'/index/getCoupon'),
                    async: false,
                    dataType:"json",
                    data:{ 'coupon_type_id' : coupon_type_id },
                    success:function(data){
                        if (data['code']>0) {
                            dialog.toast('领取成功！', 'success', 1000);
                            is_have = true;
                            var received_num = parseInt(info['receivedNum']) + 1; // 该用户已领取数
                            $(event).attr("data-received-num", received_num);
                            if(info['maxFetch'] > 0 && received_num >= info['maxFetch']){
                                $(event).find(".get").text("已领取");
                                $(event).addClass("received");
                            }
                        }else{
                            dialog.toast(data['message'], 'none', 1000);
                            is_have = true;
                        }
                    }
                })
            }
        }
}(window, jQuery);

var end_time =$('#discount_end').val()
var time = new Date().getTime()/1000;
var discount_time = end_time - time;
var intDiff = parseInt(discount_time);
function timer(intDiff){
    window.setInterval(function(){
    var day=0,
        hour=0,
        minute=0,
        second=0;//时间默认值        
    if(intDiff > 0){
        day = Math.floor(intDiff / (60 * 60 * 24));
        hour = Math.floor(intDiff / (60 * 60)) - (day * 24);
        minute = Math.floor(intDiff / 60) - (day * 24 * 60) - (hour * 60);
        second = Math.floor(intDiff) - (day * 24 * 60 * 60) - (hour * 60 * 60) - (minute * 60);
    }
    if (minute <= 9) minute = '0' + minute;
    if (second <= 9) second = '0' + second;
    $('#day_show').html(day);
    $('#hour_show').html('<s id="h"></s>'+hour);
    $('#minute_show').html('<s></s>'+minute);
    $('#second_show').html('<s></s>'+second);
    intDiff--;
    }, 1000);
} 