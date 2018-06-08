$(function() {

	resizewindow();
	$('.topnavli a').each(function() {
		if ($($(this))[0].href == String(window.location)) {
			$(this).css({
				'background-image':'url(http://www.yhjtcity.com/static/index/img/navhover.png)',
			}).attr('href', 'javascript:void(0);')
		}
	})
	var zGoodLe=$(".z_good_one").offset().left
	            $(".z_good_circle .z_circle").css("transform","translateX("+(zGoodLe+14)+"px)");
	            $(".z_good_one").children("a").css("color","#BCAB7A"); 
	function resizewindow(){
		
		var contHeight = document.documentElement.scrollHeight;
		
		var pageHeight = document.documentElement.clientHeight;
		
		var sHeight = Math.max(pageHeight, contHeight);
		
        var zCenterHe=$(".center_word").height();
		
		var zGoodTopWi=$(".z_good_top_ul").width();
		var zCenLineWi=$(".center_center_word").width();
	    var winhd=$(window).height();
		
		
		$(".t-main").css({
			"height": winhd-100+"px",
			"width": "100%"
		})
		$(".center_word").css("marginTop",0-zCenterHe/2-18+"px");
		$(".center_line_box").css("width",(1146-zCenLineWi-40)/2+"px");
		$(".z_good_top_ul").css("marginLeft",0-zGoodTopWi/2+"px")
	};
    $("#zGoodness .z_good_top_ul li").click(function(){
        var topUlLiLe=$(this).offset().left;
        $("#zGoodness .z_good_top_ul li").children("a").css("color","");
        $(this).children("a").css("color","#BCAB7A");       
        var zCircle=$(".z_good_circle .z_circle").offset().left;
        $(".z_good_circle .z_circle").addClass("z_circle guoduLeft")
        $(".z_good_circle .z_circle").css("transform","translateX("+(topUlLiLe+14)+"px)")        
    })

	$(window).resize(function() {
		resizewindow();
		
	})
	
	$(".weixin").mouseover(function(){
	    $(".weixinhao").css("opacity",1);
	})
	$(".weixin").mouseout(function(){
	    $(".weixinhao").css("opacity",0);
	})
	$(".weixinhao").mouseover(function(){
	    $(".weixinhao").css("opacity",1);
	})
	$(".weixinhao").mouseout(function(){
	    $(".weixinhao").css("opacity",0);
	});
	$(window).scroll(function(){
		var sctop=$(window).height()/2+$(this).scrollTop();
		$(".baoname").css("top",sctop+"px");
	})
});

