$(function() {
	(function() {
		var goodUlWid = $(".z_good_top_ul").width();
		$(".z_good_top_ul").css("marginLeft", 0 - goodUlWid / 2 + "px");
	})();
	var startLeft = $(".z_good_zero").offset().left;
	var thisLeft = $(".allnew").offset().left;
	$(".z_circle").addClass("z_circle guoduLeft");
	$(".z_good_top_ul li").eq(0).children("a").css("color", "#BCAB7A");
	$(".z_circle").css("left", thisLeft + 44 + "px");
	$("#z_login span").eq(0).css("display", "block");
	$(".z_good_top_ul li").click(function() {
		var thisLeft = $(this).offset().left;
		$(".z_circle").addClass("z_circle guoduLeft")
		$(".z_circle").css("left", thisLeft + 44 + "px");
		$(".z_good_top_ul li").children("a").css("color", "");
		$(this).children("a").css("color", "#BCAB7A");
	});

	var local = window.location.href;
	var localid = local.substr(local.length - 1, 1);
	$(".z_goodness .z_good_top_ul li ").children("a").css("color", "black");
	$(".weixin").hover(function() {
		$(".weixinhao").css("display", "block");
	}, function() {
		$(".weixinhao").css("display", "none");
	})
	$(".weixinhao").hover(function() {
		$(".weixinhao").css("display", "block");
	}, function() {
		$(".weixinhao").css("display", "none");
	});
	$(window).scroll(function() {
		var sctop = $(window).height() / 2 + $(this).scrollTop();
		$(".baoname").css("top", sctop + "px");
	})
});
$(function() {
	var locahref = window.location.toString();
	var str = locahref;
	var index = str.lastIndexOf("\/");
	str = str.substring(index + 1, str.length);
	switch(str) {
		case "allNews":
			var leftwidth = $(".allnew").offset().left + 40 + "px";
			$(".z_circle").css({
				"left": leftwidth
			});
			$(".z_good_zero").children("a").css("color", "#C1AB78");
			break;
		case "companyNews":
			$(".z_good_top_ul li").eq(0).children("a").css("color", "");
			var leftwidth = $(".companynew").offset().left + 40 + "px";
			$(".z_circle").css({
				"left": leftwidth
			});
			$(".z_good_one").children("a").css("color", "#C1AB78");

			break;
		case "hangyeNews":
			$(".z_good_top_ul li").eq(0).children("a").css("color", "");
			var leftwidth = $(".hangyenew").offset().left + 40 + "px";
			$(".z_circle").css({
				"left": leftwidth
			});
			$(".z_good_three").children("a").css("color", "#C1AB78");
			break;
	}
});
$(function() {
	for(var ss = 0; ss <= 8; ss++) {
		$(".bottom_router ul li").eq(ss).css("display", "block");
		if($(".bottom_router ul li").length == ss - 1) {
			break;
		};
	}
	var sq = 1;
	$(".ajiazaimore").click(function() {
		sq++;
		var sqq = sq * 9 - 1;
		for(var ssq = 0; ssq <= sqq; ssq++) {
			$(".bottom_router ul li").eq(ssq).css("display", "block");
			if($(".bottom_router ul li").length == ssq + 1) {
				$(".ajiazaimore").html("我们正在努力添加更多");
				$(".ajiazaimore").removeClass("ajiazaimore")
				break;
			};
		}
	});
});



$(function(){
	$(window).scroll(function(){
		$("#gotop").css("display","block");
		if($(document).scrollTop()===0){
			$("#gotop").css("display","none");
		};
	})
	$('#gotop').click(function(){
	    $('html,body').animate({scrollTop:0},'slow');
	    if($(document).scrollTop()===0){
			$("#gotop").css("display","none");
		};
	});
})
