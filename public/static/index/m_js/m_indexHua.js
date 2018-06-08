$(function() {
	function indxHua(idxe, nexte, preve, imgNum) {
		var carousel = document.getElementById("carousel");
		var imageLis = document.querySelectorAll("#carousel .imageList li");
		var idx = idxe;
		var next = nexte;
		var prev = preve;
		var windowWidth;
		init();
		window.onresize = init;
		idx > 0 ? $(".indboridu").fadeIn(500) : $(".indboridu").css("display", "none");

		function init() {
			windowWidth = document.documentElement.clientWidth;
			for (var i = nexte; i < imageLis.length; i++) {
				imageLis[i].style.webkitTransform = "translateX(" + windowWidth + "px)";
			}
			imageLis[idx].style.transition = "none";
			imageLis[next].style.transition = "none";
			imageLis[prev].style.transition = "none";
			imageLis[idx].style.webkitTransform = "translateX(0px)";
			imageLis[next].style.webkitTransform = "translateX(" + windowWidth + "px)";
			imageLis[prev].style.webkitTransform = "translateX(" + -windowWidth + "px)";
		}
		carousel.addEventListener("touchstart", touchstartHandler, false);
		carousel.addEventListener("touchmove", touchmoveHandler, false);
		carousel.addEventListener("touchend", touchendHandler, false);
		var deltaX;
		var startX;
		var startTime;
		function touchstartHandler(event) {
			if (event.touches.length > 1) {
				return;
			};
			deltaX = event.touches[0].clientX;
			startX = event.touches[0].clientX;
			imageLis[idx].style.transition = "none";
			imageLis[next].style.transition = "none";
			imageLis[prev].style.transition = "none";
			startTime = new Date();
			imageLis[idx].style.webkitTransform = "translateX(0px)";
			imageLis[next].style.webkitTransform = "translateX(" + windowWidth + "px)";
			imageLis[prev].style.webkitTransform = "translateX(" + -windowWidth + "px)";
		}

		function touchmoveHandler(event) {
			if (event.touches.length > 1) {
				return;
			}
			var clientX = event.touches[0].clientX;
			imageLis[idx].style.webkitTransform = "translateX(" + (clientX - deltaX) + "px)";
			imageLis[next].style.webkitTransform = "translateX(" + (windowWidth + clientX - deltaX) + "px)";
			imageLis[prev].style.webkitTransform = "translateX(" + (-windowWidth + clientX - deltaX) + "px)";
		}
		$("#carousel .imageList ul li").css("z-index", "1");

		function touchendHandler(event) {
			var distance = event.changedTouches[0].clientX - startX;
			var time = new Date() - startTime;
			if (distance >= windowWidth / 2 || (distance > 30 && time < 300)) {

				var aqq = idx;
				aqq--;
				if (aqq < 0) {
					aqq = 4;
				}
				$("#carousel .imageList ul li").css("display", "none");
				$("#carousel .imageList ul li").eq(aqq).css("display", "block");
				next = idx;
				idx = prev;
				prev--;
				if (prev < 0) {
					prev = imgNum;
				};
				var libdwidth = $(".indbtitem").eq(idx).offset().left + 15;
				var ribdwidth = $(window).width() - libdwidth;
				$(".bordresile").css({
					"width": libdwidth + "px"
				})
				$(".bordresil").css({
					"width": ribdwidth + "px"
				});
				idx > 0 ? $(".indboridu").fadeIn(500) : $(".indboridu").css("display", "none");
				imageLis[idx].style.transition = "all 0.3s ease 0s";
				imageLis[next].style.transition = "all 0.3s ease 0s";
				imageLis[idx].style.webkitTransform = "translateX(0px)";
				imageLis[next].style.webkitTransform = "translateX(" + windowWidth + "px)";
			} else if (distance <= -windowWidth / 2 || (distance < -30 && time < 300)) {
				showNext();
			} else {
				imageLis[prev].style.transition = "all 0.3s ease 0s";
				imageLis[idx].style.transition = "all 0.3s ease 0s";
				imageLis[next].style.transition = "all 0.3s ease 0s";
				imageLis[prev].style.webkitTransform = "translateX(" + -windowWidth + "px)";
				imageLis[idx].style.webkitTransform = "translateX(0px)";
				imageLis[next].style.webkitTransform = "translateX(" + windowWidth + "px)";
			}
		}
		function showNext() {
			prev = idx;
			idx = next;
			next++;
			if (next > imgNum) {
				next = 0;
			};
			$("#carousel .imageList ul li").css("display", "none");
			$("#carousel .imageList ul li").eq(idx).css("display", "block");
			var libdwidth = $(".indbtitem").eq(idx).offset().left + 15;
			var ribdwidth = $(window).width() - libdwidth;
			$(".bordresile").css({
				"width": libdwidth + "px"
			})
			$(".bordresil").css({
				"width": ribdwidth + "px"
			});
			idx > 0 ? $(".indboridu").fadeIn(500) : $(".indboridu").css("display", "none");
			imageLis[next].style.transition = "none";
			imageLis[next].style.webkitTransform = "translateX(" + windowWidth + "px)";
			imageLis[prev].style.transition = "all 0.3s ease 0s";
			imageLis[idx].style.transition = "all 0.3s ease 0s";
			imageLis[prev].style.webkitTransform = "translateX(" + -windowWidth + "px)";
			imageLis[idx].style.webkitTransform = "translateX(0px)";
		}
	};
	indxHua(0, 1, 4, 4);

	$(".indbtitem").click(function() {
		idxs = $(this).index();
		qq = idxs;
		qq++;
		nexts = qq;
		if (nexts > 3) {
			nexts = 0;
		};
		pp = idxs;
		pp--;
		prevs = pp
		if (prevs < 0) {
			prevs = 3;
		};
		var libdwidth = $(this).offset().left + 15;
		var ribdwidth = $(window).width() - libdwidth;
		$(".bordresile").css({
			"width": libdwidth + "px"
		})
		$(".bordresil").css({
			"width": ribdwidth + "px"
		});
		var imageLis = document.querySelectorAll("#carousel .imageList  ul li");
		windowWidth = document.documentElement.clientWidth;
		for (var i = nexts; i < imageLis.length; i++) {
			imageLis[i].style.webkitTransform = "translateX(" + windowWidth + "px)";
		}
		imageLis[idxs].style.transition = "none";
		imageLis[nexts].style.transition = "none";
		imageLis[prevs].style.transition = "none";
		imageLis[idxs].style.webkitTransform = "translateX(0px)";
		imageLis[nexts].style.webkitTransform = "translateX(" + windowWidth + "px)";
		imageLis[prevs].style.webkitTransform = "translateX(" + -windowWidth + "px)";
		$("#carousel .imageList ul li").css("z-index", "1");
		$("#carousel .imageList ul li").css("display","none");
		$("#carousel .imageList ul li").eq(idxs).css({
			"z-index": "123",
			"display": "block"
		});
		indxHua(idxs, nexts, prevs, 4);
	})
});
