!function (win, $) {
    var dialog = win.YDUI.dialog;

    win.login=function(){
    var username = $("#username").val();
    var password = $("#password").val();
        if (username == '') {
            dialog.toast('请输入账号', 'error', 1000);
            return false;
        }else if (password == '') {
            dialog.toast('请输入密码', 'error', 1000);
            return false;
        }
        $.ajax({
            type:"post",
            url:__URL(APPMAIN+'/Login/index'),
            async : true,
            data:{
                "username" : username,
                "password" : password
            },
            success:function(data){
                if (data['code']>0) {
                    if (data["code"] == 1) {
                        var tag = "findPasswd";
                        if (data['url'].indexOf(tag) ==-1 ) {
                            dialog.toast('登录成功！', 'success', 1000);
                            setTimeout(function(){location.href = data['url']},1000);   
                        }else{
                            dialog.toast('登录成功！!', 'success', 1000);
                            setTimeout(function(){location.href = __URL(APPMAIN+'/member/index')},1000);
                        }
                    }else{
                        dialog.toast('登录成功！！！', 'success', 1000);
                         setTimeout(function(){location.href = __URL(APPMAIN+'/member/index')},1000);
                    }
                }else{
                    dialog.toast(data["message"], 'error', 1000);
                }
            }
        })
    }
}(window, jQuery);
