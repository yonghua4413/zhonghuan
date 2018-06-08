$(function() {

	resizewindow();
	$('.topnavli a').each(function() {
		if ($($(this))[0].href == String(window.location)) {
			// $(this).css({
			// 	'background-image': 'url(http://www.yhjtcity.com/static/index/img/navhover.jpg)'
			// }).attr('href', 'javascript:void(0);')
			$(this).addClass("ahref").parent().siblings().children().removeClass("ahref");
		}
	})

	function resizewindow() {
		var contHeight = document.documentElement.scrollHeight;
		var pageHeight = document.documentElement.clientHeight;
		var sHeight = Math.max(pageHeight, contHeight);
		var winhd = $(window).height();
		$(".t-main").css({
			"height": pageHeight - 155 + "px",
			"width": "100%"
		})
		$(".t-hxmain").css({
			"height": 320 + "px",
			"width": "100%"
		});
	}
	$(window).resize(function() {
		resizewindow();
	})

	$(".weixin").hover(function() {
		$(".weixinhao").css("display", "block");
	}, function() {
		$(".weixinhao").css("display", "none");
	})
	$(".weixinhao").hover(function() {
		$(".weixinhao").css("display", "block");
	}, function() {
		$(".weixinhao").css("display", "none");
	})

	// /*********首页轮播**********/
	// var imgfaster = "http://www.yhjtcity.com/static/index/img/";
	// var bannerbj = ["shouye.jpg", "shcoll.jpg", "jiaot.jpg", "peitao.jpg", "huanjing.jpg"];
	// var flage = 0,
	// 	xc = 0,
	// 	rthis = null,
	// 	sthis = null,
	// 	timer = null,
	// 	leftwidth = null,
	// 	rightwidth = null;
    //
	// $(".indicon img").click(function() {
	// 	rthis = $(this);
	// 	ggfn(rthis)
	// });
    //
	// $(".indtext span").click(function() {
	// 	sthis = $(this);
	// 	ggfn(sthis)
	// });
    //
	// $(".clickLF").click(function() {
	// 	flage >= (bannerbj.length - 1) ? flage = 0 : flage++;
	// 	lickrl(flage);
	// })
	// $(".clickRI").click(function() {
	// 	flage <= 0 ? flage = (bannerbj.length - 1) : flage--;
	// 	lickrl(flage);
	// })
    //
	// function lickrl(flage) {
	// 	clearInterval(timer);
	// 	$(".t-main").css({
	// 		"background-image": "url(" + imgfaster + bannerbj[flage] + ")"
	// 	});
	// 	$(".tlecenter").eq(flage).fadeIn(2000).siblings(".tlecenter").hide();
	// 	fn(flage)
	// }
    //
	// function ggfn(rthis) {
	// 	$this = rthis
	// 	xc >= (bannerbj.length - 1) ? xc = 0 : xc = $this.index() + 1;
    //
	// 	if (xc >= 4) {
	// 		xc = 0;
	// 	}
	// 	clearInterval(timer);
	// 	leftwidth = $this.offset().left + 22;
	// 	rightwidth = $(window).width() - leftwidth;
	// 	$(".t-main").css({
	// 		"background-image": "url(" + imgfaster + bannerbj[$this.index()] + ")"
	// 	});
	// 	$(".tlecenter").eq($this.index()).fadeIn(2000).siblings(".tlecenter").hide();
	// 	$(".ridusitem").css({
	// 		"left": leftwidth + "px",
	// 		"display": "block"
	// 	});
	// 	$(".borderridus").css({
	// 		"width": leftwidth + "px"
	// 	});
	// 	$(".borderright").css({
	// 		"width": rightwidth + "px"
	// 	});
	// 	fn(xc)
	// }
	// fn(0);
    //
	// function fn(xc) {
	// 	timer = setInterval(function() {
	// 		$(".tlecenter").eq(flage).fadeIn(2000).siblings(".tlecenter").hide();
    //
	// 		$(".t-main").css({
	// 			"background-image": "url(" + imgfaster + bannerbj[flage] + ")"
	// 		});
	// 		var leftwidth = $(".indicon img").eq(flage).offset().left + 22;
	// 		var rightwidth = $(window).width() - leftwidth;
    //
	// 		if (flage >= 1) {
	// 			$(".ridusitem").fadeIn();
	// 		} else {
	// 			$(".ridusitem").css({
	// 				"display": "none"
	// 			});
	// 		}
	// 		$(".borderridus").css({
	// 			"width": leftwidth + "px"
	// 		});
	// 		$(".borderright").css({
	// 			"width": rightwidth + "px"
	// 		});
	// 		flage >= (bannerbj.length - 1) ? flage = 0 : flage++;
	// 	}, 6000)
	// }
})

$(window).scroll(function() {
	var sctop = $(window).height() / 2 + $(this).scrollTop();
	$(".baoname").css("top", sctop + "px");
})