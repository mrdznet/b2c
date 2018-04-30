!function (win, $) {
    var dialog = win.YDUI.dialog;

   function login(username,password){
        $.ajax({
            type : "post",
            url : __URL(APPMAIN+'/login/index'),
            async : true,
            data : {
                "username" : username,
                "password" : password
            },
            success : function(data) {
                setTimeout(function(){
                    dialog.toast('登录成功', 'success', 1000); 
                    location.href=__URL(APPMAIN+'/member/index')},1000);
            }
        });
    }
    function login_mobile(mobile,password){
        $.ajax({
            type : "post",
            url : __URL(APPMAIN+'/login/index'),
            async : true,
            data : {
                "mobile" : mobile,
                "password" : password
            },
            success : function(data) {
                setTimeout(function(){
                    dialog.toast('登录成功', 'success', 1000);
                    location.href=__URL(APPMAIN+'/member/index')},1000);
            }
        });
    }
    function check_mobile_is_has(){
        var mobile = $("#mobile").val();
        $.ajax({
            type: "post",
            url:__URL(APPMAIN+'/login/checkMobileIsHas'),
            data: {"mobile":mobile},
            async: false,
            success: function(data){
                if(data > 0){
                    $("#mobile_is_has").val(0);
                    return false;
                }else{
                    $("#mobile_is_has").val(1);
                    return false;
                }
            } 
        });
    }

win.register_mobile=function(){
        var mobile = $("#mobile").val();
        var vertification = $("#captcha").val();
        var password_mobile = $("#password_mobile").val();
        var cfpassword_mobile = $("#cfpassword_mobile").val();
        var verify_code = $("#verify_code").val();
        var reg = /^.{6,}$/;
        var mobile_is_has = $("#mobile_is_has").val();
        if (mobile == '') {
             dialog.toast('请输入手机号码！', 'error', 1000);
            return false;
        }else if (!(/^1[34578]\d{9}$/.test(mobile))) {
            dialog.toast('您输入的手机号码有误！', 'error', 1000);
            return false; 
        }else if (mobile_is_has == 0) {
            dialog.toast('该手机号已注册！', 'error', 1000);
            return false;
        }

        if (vertification == '') {
            dialog.toast('验证码不能为空！', 'error', 1000);
            return false;
        }
        var is_password_true = verifyPassword(password_mobile);
        if(is_password_true > 0){
            return false;
        }
        if(password_mobile != cfpassword_mobile){
             dialog.toast('两次密码输入不一致！', 'error', 1000);
            $("#cfpassword_mobile").focus();
            return false;
        }
        if(verify_code == ''){
            dialog.toast('手机验证码不能为空！', 'error', 1000);
            return false;
        }

        $.ajax({
            type : "post",
            url : __URL(APPMAIN+'/Login/register_check_code'),
            data:{'send_param':verify_code},
            async : true,
            dataType:'json',
            success:function(data){
                if (data['code'] == 0){
                    $.ajax({
                        type : "post",
                        url : __URL(APPMAIN+'/login/register'),
                        async : true,
                        data:{'mobile': mobile,'password': password_mobile},
                        success:function(data){
                            if(data["code"] > 0 ){
                                dialog.toast(data["message"], 'success', 1000);
                                login_mobile(mobile,password_mobile);
                            }else{
                                dialog.toast(data["message"], 'none', 1000);
                            }
                        }
                    })
                }else{
                    dialog.toast('手机验证码错误！', 'error', 1000);
                    return false;
                }
            }
        });
    }

    var $getCode = $('#sendOutCode');
    /* 定义参数 */
    $getCode.sendCode({
        disClass: 'btn-disabled',
        secs: 60,
        run: false,
        runStr: '{%s}秒后重新获取',
        resetStr: '重新获取验证码'
    });

    $getCode.on('click', function () {
        YDUI.dialog.loading.open('发送中');
        setTimeout(function(){
            var mobile = $("#mobile").val();
            var vertification = $("#captcha").val();
            if (mobile.search(/^1[34578]\d{9}$/) == -1) {
                $("#mobile").trigger("focus");
                YDUI.dialog.loading.close();
                 dialog.toast('手机号码有误！', 'error', 1000);
                 return false;
            }
            $.ajax({
                type: "post",
                url: __URL(APPMAIN+'/login/mobile'),
                data: {"mobile":mobile},
                async: false,
                success: function(data){
                    if (data) {
                        YDUI.dialog.loading.close();
                        dialog.toast('请填写手机号码', 'error', 1000);
                        return false;
                    }else{
                        //判断输入的验证码是否正确 
                        $.ajax({
                            type: "post",
                            url: __URL(APPMAIN+'/Login/sendSmsRegisterCode'),
                            data:{"mobile":mobile,"vertification":vertification},
                            success:function(data){
                                if (data['code']==0) {
                                    YDUI.dialog.loading.close();
                                    $getCode.sendCode('start');
                                    YDUI.dialog.toast('已发送', 'success', 1500);
                                }else{
                                     YDUI.dialog.loading.close();
                                    dialog.toast(data["message"], 'error', 2000);
                                    $(".verifyimg").attr("src",__URL('SHOP_MAIN/captcha'));
                                    return false;
                                }
                            }
                        });
                    }
                }
            });           
        }, 1500);
    });

    function verifyUsername(username){
    var is_true =0;
    if(/.*[\u4e00-\u9fa5]+.*$/.test(username) ){
        is_true = 1;
         dialog.toast('用户名不能包含汉字', 'error', 1000); 
        return is_true;
    }
    if(/\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/.test(username) ){
        is_true = 1;
         dialog.toast('用户名不能是邮箱', 'error', 1000); 
        return is_true;
    }
    if(/^1(3|4|5|7|8)\d{9}$/.test(username) ){
        is_true = 1;
        dialog.toast('用户名不能是手机号', 'error', 1000); 
        return is_true;
    }
    var name_keyword = $('#name_keyword').val();
    var username_verify = name_keyword;
    var usernme_verify_array = new Array();
    if($.trim(username_verify) != "" && username_verify != undefined){
        usernme_verify_array  = username_verify.split(",");
    }
    usernme_verify_array.push(",");
    $.each(usernme_verify_array,function(k,v){
        if($.trim(v) != ""){
            if(username.indexOf(v) >= 0){
                is_true = 1;
                dialog.toast('用户名中不能包含汉字', 'error', 1000);
                return false;
            }
        }
    });
    return is_true;
}
//验证密码
function verifyPassword(password){
    var is_true = 0;
    var length_num = $('#pwd_len').val();
    var min_length_str = length_num;
    if($.trim(min_length_str) != "" ){
        var min_length = parseInt(min_length_str);  
    }else{
        var min_length = 5;
    }
    if($.trim(password) == ""){
        is_true = 1;
        dialog.toast('密码不能为空', 'error', 1000);                     
        return is_true;
    }
    if(min_length  > 0){
        if(password.length < min_length){
            is_true = 1;
            dialog.toast('密码最小长度为'+min_length, 'error', 1000);                    
            return is_true;
        }
        
    }
    if(/.*[\u4e00-\u9fa5]+.*$/.test(password) ){
        is_true = 1;
        dialog.toast('密码不得有汉字！', 'error', 1000); 
        return is_true;
    }
    var fzd = $('#pwd_complexity').val();
    var regex_str = fzd;
    if($.trim(regex_str) != "" && regex_str != undefined){
        //验证是否包含数字
        if(regex_str.indexOf("number") >= 0){
            var number_test =  /[0-9]/;
            if(!number_test.test(password)){
                is_true = 1;
                 dialog.toast('密码中必须包含数字', 'error', 1000);                                  
                return is_true;
            }
        }
        //验证是否包含小写字母
        if(regex_str.indexOf("letter") >= 0){
            var letter_test =  /[a-z]/;
            if(!letter_test.test(password)){
                is_true = 1;
                dialog.toast('密码中必须包含小写字母', 'error', 1000);                                
                return is_true;
            }
        }
        //验证是否包含大写字母
        if(regex_str.indexOf("upper_case") >= 0){
            var upper_case_test =  /[A-Z]/;
            if(!upper_case_test.test(password)){
                is_true = 1;
                dialog.toast('密码中必须包含大写字母', 'error', 1000);                     
                return is_true;
            }
        }
        //验证是否包含特殊字符
        if(regex_str.indexOf("symbol") >= 0){
            var symbol_test =  /[^A-Za-z0-9]/;
            if(!symbol_test.test(password)){
                is_true = 1;
                dialog.toast('密码中必须包含符号', 'error', 1000);                      
                return is_true;
            }
        } 
    }
    return is_true;
}
}(window, jQuery);
