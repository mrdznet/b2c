$(function(){
        $("#tab .tab-nav-item").click(function(){
            $("#tab .tab-nav-item").removeClass("tab-active");
            $(this).addClass("tab-active"); 
            var status_hidden=$('#status_hidden').val();
            $('#tab .tab-nav-item').each(function(){
                if($(this).attr("statusid") == status_hidden){
                    $(this).addClass('tab-active');
                }
            });
        })
})