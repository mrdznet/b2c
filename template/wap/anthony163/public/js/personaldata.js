!function (win, $) {
 	var dialog = win.YDUI.dialog;
 	var value = '';
 	win.nickname=function(){
 		var html = $('#update_nickname').html();
 		var pageii = layer.open({
		  type: 1
		  ,content: html
		  ,anim: 'up'
		  ,style: 'position:fixed; left:0; top:0; width:100%; height:100%; border: none; -webkit-animation-duration: .5s; animation-duration: .5s;'
			});
 	}
 	win.xg_nickname=function(){
		var nickname = $("#nickname").text();
		 value = $.trim($("#input_nick_name").val());
 		if (nickname == value ) {
 			dialog.toast('与原昵称一致,无需修改', 'none', 1000);
 			return false;
 		}
 		if (nickname == '') {
 			dialog.toast('昵称不能为空', 'error', 1000);
 			return false;
 		}
 		$.ajax({
 			type:"post",
 			url: __URL(APPMAIN+'/member/modifynickname'),
 			data: { "nickname": value },
 			success:function(res){
 				if (res.code > 0) {
 					dialog.toast('修改成功', 'success', 1000);
 					$("#input_nick_name").text(value);
 				}else{
 					dialog.toast('修改失败', 'error', 1000);
 				}
 			}
 		});
 	}
}(window, jQuery);

