$(function(){
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
	var userAgent=window.navigator.userAgent;
	if(userAgent.indexOf("Firefox")>=1){
		Findex=userAgent.indexOf("Chrome/");
		versionName=userAgent.substr(Findex+"Firefox/".length,3);
		$(".z_ysjs_smallcir").css("top","89.5px");
		$(".z_ysjs_title").css("bottom","15px")
//		document.write("你用的是google浏览器！版本是：google/"+versionName+"<br>");
	}
	function resizewindow(){
        var zCenterHe=$(".center_word").height();
	    var winhd=$(window).height();
		
		var keshikuan=$(window).width();
		if(keshikuan>=1450){
			$(".z_ysjs").css("left","14%")
		};
		if(keshikuan<1450&&keshikuan>=1200){
			$(".z_ysjs").css("left","8%")
		};
		if(keshikuan<1200){
			$(".z_ysjs").css("left","4%")
		};
		$(".t-main").css({
//			"height": winhd-100+"px",
			"height": 320 + "px",
			"width": "100%"
		})
		$(".center_word").css("marginTop",0-19+"px");
	};
	resizewindow();
	$(window).resize(function() {
		resizewindow();
		
	});
	$(".singleitem").on("click", function() {

			$(".mengceng").fadeIn(300);

			$(".autocont").css({"display":"none"});

			$(".autocont").eq($(this).index()).css({"display":"block"});



		})



	//	$(".mengceng").click(function(event) {

			// $(this).children().click(function(e) {
			//
			// 	if (e && e.stopPropagation) {
			//
			// 		e.stopPropagation();
			//
			// 	} else {
			// 		window.event.cancelBubble = true;
			// 	}
			// })

			//$(this).fadeOut(200);
		//})
		
		$(".colose").on("click", function() {
			$(".mengceng").fadeOut(200);
		})
})
