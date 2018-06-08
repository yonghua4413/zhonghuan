window.onload = function() {
	$(".newborridu").css({
		"left": $(".clnewsitem span:eq(0)").offset().left + $(".clnewsitem span:eq(0)").width() / 2 + "px"
	});
	
	$("#carousel .imageListA ul li").eq(0).css("display", "block");
	$(".clnewsitem span").eq(0).css("color", "#BCAB7A");
	$(".clnewsitem span").click(function() {
		$(".newborridu").css({
			"left": $(this).offset().left + $(this).width() / 2 + "px"
		});
		$(".clnewsitem span").css("color", "");
		$(this).css("color", "#BCAB7A");

		$("#carousel .imageListA ul li").css("display", "block");
		idxs = $(this).index();
		qq = idxs;
		qq++;
		nexts = qq;
		if(nexts > 2) {
			nexts = 0;
		};
		pp = idxs;
		pp--;
		prevs = pp
		if(prevs < 0) {
			prevs = 2;
		};

		var fgitem = $(".hxtjitem:eq(" + 0 + ") .newilistwap").children(".listitem").height();
		var fgauto = Math.ceil($(".hxtjitem:eq(" + 0 + ") .newilistwap").children(".listitem").length / 2);

		$(".carousel").height("0px");
		$(".carousel").height((fgitem * fgauto / 50) + 4 + "rem");
		var imageLis = document.querySelectorAll("#carousel .imageListA  ul li");
		windowWidth = document.documentElement.clientWidth;
		for(var i = nexts; i < imageLis.length; i++) {
			imageLis[i].style.webkitTransform = "translateX(" + windowWidth + "px)";
		}
		imageLis[idxs].style.transition = "none";
		imageLis[nexts].style.transition = "none";
		imageLis[prevs].style.transition = "none";
		imageLis[idxs].style.webkitTransform = "translateX(0px)";
		imageLis[nexts].style.webkitTransform = "translateX(" + windowWidth + "px)";
		imageLis[prevs].style.webkitTransform = "translateX(" + -windowWidth + "px)";
		var idsHeight=$(".hxtjitem").eq(idxs).height();
		$(".carousel").height(idsHeight+"px");
		$("#carousel .imageListA ul li").css("z-index", "2");
		$("#carousel .imageListA ul li").eq(idxs).css({
			"z-index": "123",
			"display": "block",
			"transition": "all 0.3s ease"
		});
		mNewsWeb(idxs, nexts, prevs);

	});
	var fgitem = $(".hxtjitem:eq(" + 0 + ") .newilistwap").children(".listitem").height();
	var fgauto = Math.ceil($(".hxtjitem:eq(" + 0 + ") .newilistwap").children(".listitem").length / 2);
	//      console.log($(".hxtjitem:eq(" + 0 + ")"));
	var idsHeight=$(".hxtjitem").eq(0).height();
	$(".carousel").height(idsHeight+"px");
	mNewsWeb(0, 1, 2);
    
	function mNewsWeb(idxe, nexe, pree) {
		var carousel = document.getElementById("carousel");
		var imageLis = document.querySelectorAll("#carousel .imageListA ul li");
		var idx = idxe;
		var next = nexe;
		var prev = pree;
		var windowWidth;
		init();
		window.onresize = init;

		function init() {
			windowWidth = document.documentElement.clientWidth;
			for(var i = nexe; i < imageLis.length; i++) {
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
		var deltaY;
		var startY;
		var startTime;

		function touchstartHandler(event) {
			if(event.touches.length > 1) {
				return;
			}
			deltaX = event.touches[0].clientX;
			startX = event.touches[0].clientX;
			startY = event.touches[0].clientY;
			imageLis[idx].style.transition = "none";
			imageLis[next].style.transition = "none";
			imageLis[prev].style.transition = "none";
			startTime = new Date();
			imageLis[idx].style.webkitTransform = "translateX(0px)";
			imageLis[next].style.webkitTransform = "translateX(" + windowWidth + "px)";
			imageLis[prev].style.webkitTransform = "translateX(" + -windowWidth + "px)";
		}

		function touchmoveHandler(event) {
			if(event.touches.length > 1) {
				return;
			}
			var clientX = event.touches[0].clientX;
			var clientY = event.touches[0].clientY;
//			var changeX=clientX-startX;
//			var changeY=clientY-startY;
//			if(changeX<changeY){
//				return
//			}
			imageLis[idx].style.webkitTransform = "translateX(" + (clientX - deltaX) + "px)";
			imageLis[next].style.webkitTransform = "translateX(" + (windowWidth + clientX - deltaX) + "px)";
			imageLis[prev].style.webkitTransform = "translateX(" + (-windowWidth + clientX - deltaX) + "px)";
		}

		function touchendHandler(event) {
			var distance = event.changedTouches[0].clientX - startX;
			var time = new Date() - startTime;
			if(distance >= windowWidth / 2 || (distance > 80 && time < 300)) {
				var aqq = idx;
				aqq--;
				if(aqq < 0) {
					aqq = 2;
				};
               
				$("#carousel .imageListA ul li").css("display", "none");
				$("#carousel .imageListA ul li").eq(aqq).css("display", "block");
				next = idx;
				idx = prev;
				prev--;
				if(prev < 0) {
					prev = 2;
				};
				$(".newborridu").css({
					"left": $(".clnewsitem span").eq(idx).offset().left + $(".clnewsitem span").eq(idx).width() / 2 + "px"
				});
				$(".clnewsitem span").css("color", "");
				$(".clnewsitem span").eq(idx).css("color", "#BCAB7A");
				var fgitem = $(".hxtjitem:eq(" + idx + ") .newilistwap").children(".listitem").height();
				var fgauto = Math.ceil($(".hxtjitem:eq(" + idx + ") .newilistwap").children(".listitem").length / 2);
//				$(".carousel").height("0px");
//				$(".carousel").height((fgitem * fgauto / 50) + 4 + "rem");
				
				var idsHeight=$(".hxtjitem").eq(idx).height();
		        $(".carousel").height(idsHeight+"px");
				imageLis[idx].style.transition = "all 0.3s ease 0s";
				imageLis[next].style.transition = "all 0.3s ease 0s";
				imageLis[idx].style.webkitTransform = "translateX(0px)";
				imageLis[next].style.webkitTransform = "translateX(" + windowWidth + "px)";

			} else if(distance <= -windowWidth / 2 || (distance < -80 && time < 300)) {
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
			if(next > 2) {
				next = 0;
			};
			$("#carousel .imageListA ul li").css("display", "none");
			$("#carousel .imageListA ul li").eq(idx).css("display", "block");
			$(".newborridu").css({
				"left": $(".clnewsitem span").eq(idx).offset().left + $(".clnewsitem span").eq(idx).width() / 2 + "px"
			});
			$(".clnewsitem span").css("color", "");
			$(".clnewsitem span").eq(idx).css("color", "#BCAB7A");
			var fgitem = $(".hxtjitem:eq(" + idx + ") .newilistwap").children(".listitem").height();
			var fgauto = Math.ceil($(".hxtjitem:eq(" + idx + ") .newilistwap").children(".listitem").length / 2);
			var idsHeight=$(".hxtjitem").eq(idx).height();
		    $(".carousel").height(idsHeight+"px");
			$(".carousel").height((fgitem * fgauto / 50) + 4 + "rem");
			imageLis[next].style.transition = "none";
			imageLis[next].style.webkitTransform = "translateX(" + windowWidth + "px)";
			imageLis[prev].style.transition = "all 0.3s ease 0s";
			imageLis[idx].style.transition = "all 0.3s ease 0s";
			imageLis[prev].style.webkitTransform = "translateX(" + -windowWidth + "px)";
			imageLis[idx].style.webkitTransform = "translateX(0px)";
		}
	}
}