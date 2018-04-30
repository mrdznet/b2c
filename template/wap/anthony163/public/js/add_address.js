!function (win, $) {
        var dialog = win.YDUI.dialog;
    //地址组件
        var $target = $('#J_Address');
            $target.citySelect();
            $target.on('click', function (event) {
                event.stopPropagation();
                $target.citySelect('open');
            });
            $target.on('done.ydui.cityselect', function (ret) {
                $(this).val(ret.provance + ' ' + ret.city + ' ' + ret.area);
            });
    win.showaddress=function(){
        $('#AddressInfo').on('click',function(){
            $("#AddressInfo").attr("value","");
            $("#ydaddress").show();
        })
    }
    win.saveAddress=function(){
        if (!Check_Consignee()) {
            return false;
        }
            var addressID = $("#AddressID").val();
            var province = 1;
            var city = 1;
            var district = 1;
            var name=$("#Name").val();
            var mobile=$("#Moblie").val();
            var $remark=$("#AddressInfo").val();
            var address_id=$("#adressid").val();
            var data_json='',ajax_url='';
            var phone = $("#phone").val();
            var addressinfo = $('#J_Address').val()+$("#AddressInfo").val();

            if(typeof(address_id)=='undefined'){
                data_json = {"consigner":name,"mobile":mobile,"province":province,"city":city,"district":district,"address":addressinfo,"phone":phone};
                ajax_url = __URL(APPMAIN+"/member/addmemberaddress");
            }else{
                data_json = {"id":address_id,"consigner":name,"mobile":mobile,"province":province,"city":city,"district":district,"address":addressinfo,"phone":phone};
                ajax_url = __URL(APPMAIN+"/member/updatememberaddress");
            }

            var flag = $("#hidden_flag").val();
            var ref_url = $("#ref_url").val();
            $.ajax({
                type: "post",
                url: ajax_url,
                data: data_json,
                success: function (txt) {
                    if (txt["code"] >0) {
                        if(flag == 1){
                            dialog.toast("success", 'success', 1000,function(){
                            location.href=__URL(APPMAIN+"/member/memberaddress?flag=1");
                            });
                        }else if(flag == 4){
                             dialog.toast("success", 'success', 1000,function(){
                               location.href=__URL(APPMAIN+"/PintuanOrder/paymentorder"); 
                           });
                        }else if(flag == 2){
                             dialog.toast("success", 'success', 1000,function(){
                                location.href=__URL(APPMAIN+"/member/toReceiveThePrize");
                            });
                        }else{
                            if(ref_url != ''){
                                dialog.toast("success", 'success', 1000,function(){
                                    location.href=__URL(APPMAIN+"/order/paymentorder");
                                });
                            }
                        }
                    } else {
                        dialog.toast(txt, 'error', 1000);
                    }
                }
            });

    }
     win.Check_Consignee=function(){
            var reg = /^1[34578]\d{9}$/;
            if ($("#Name").val() == "") {
                dialog.toast('姓名不能为空', 'error', 1000);
                $("#Name").focus();
                return false;
            } 
            if ($("#Moblie").val() == "") {
                dialog.toast('手机号码不能为空', 'error', 1000);
                $("#Moblie").focus();
                return false;
            } 
            if (!reg.test($("#Moblie").val())) {
               dialog.toast('请输入正确的手机号码', 'error', 1000);
                $("#Moblie").focus();
                return false;
            } 
            
            var phone = $("#phone").val();
            if(phone.length > 0){
                var pattern=/(^[0-9]{3,4}\-[0-9]{3,8}$)|(^[0-9]{3,8}$)|(^\([0-9]{3,4}\)[0-9]{3,8}$)|(^0{0,1}13[0-9]{9}$)/; 
                if(!pattern.test(phone)) { 
                    dialog.toast('请输入正确的固定电话', 'error', 1000);
                    $("#phone").focus();
                    return false; 
                } 
            }
            
            // if ($("#seleAreaFouth").val() < 0 || $("#seleAreaFouth").val() == "") {
            //     if ($("#seleAreaNext").val() == "" || $("#seleAreaNext").val() < 0) {
            //         showBox("请选择省份","warning");
            //         $("#seleAreaNext").focus();
            //         return false;
            //     }
            //     if ($("#seleAreaThird").val() == "" || $("#seleAreaThird").val() < 0) {
            //         showBox("请选择市","warning");
            //         $("#seleAreaThird").focus();
            //         return false;
            //     }
            //     if($("#seleAreaFouth option").length > 1){
            //         if ($("#seleAreaFouth").val() == "" || $("#seleAreaFouth").val() < 0) {
            //             showBox("请选择区/县","warning");
            //             $("#seleAreaFouth").focus();
            //             return false;
            //         }
            //     }
            // }

            if ($('#J_Address').val() == "") {
                dialog.toast('请选择省市区', 'error', 1000);
                $("#J_Address").focus();
                return false;
            } 

            if ($("#AddressInfo").val() == "") {
                dialog.toast('详细地址不能为空', 'error', 1000);
                $("#AddressInfo").focus();
                return false;
            } 
            
            return true;
    }
}(window, jQuery);