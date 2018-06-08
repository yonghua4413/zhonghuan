window, onload = function() {
	var carousel = document.getElementById("carouselFour");
	var imageLis = document.querySelectorAll("#carouselFour ul li");
	var wordLis = document.querySelectorAll(".z_fourWord li");
	var zFourjtZp = document.getElementsByClassName("z_fourjtzp")[0];
	var zhaoPin = document.getElementsByClassName("z_jtzpxx")[0];
	var z_jituanzp = document.getElementById("z_jituanzp");
	var z_jtzpWo = document.getElementById("z_jtzpWo");
	var z_fourcircle = document.getElementById("z_fourcircle");
	var z_xuexiaoLi1 = document.getElementById("z_xuexiaoLi1");
	var z_xuexiaoLi1Le = z_xuexiaoLi1.offsetLeft;
	z_fourcircle.style.left = z_xuexiaoLi1Le + 22 + "px";
	$(".z_yihuafour .z_fourWord li").eq(0).css("color", "#BCAB7A");
	
	for(var re = 0; re < wordLis.length; re++) {
		wordLis[re].style.color = "";
	}
	z_fourcircle.style.transition = "all 0.3s ease 0s";
	var locat=window.location.href;
	var locatXie=locat.indexOf("#!/");
	var locaCans=locat.substring(locatXie,locat.length);
	switch(locaCans){
		case "#!/school":
		    $("#carouselFour ul li").eq(0).css("display","block");
		    var wordLeft = wordLis[0].offsetLeft;
			var wordWidth = wordLis[0].offsetWidth;
			z_fourcircle.style.left = wordLeft + wordWidth / 2 - 6 + "px";
			wordLis[0].style.color = "#BCAB7A";
	        maidianHua(0, 1, 3);
		break;
		case "#!/jiaotong":
		    $("#carouselFour ul li").eq(1).css("display","block"); 
		    $(".z_jtzpxx").css("display","block");
		    carousel.style.height = 5 + "rem";
		    var wordLeft = wordLis[1].offsetLeft;
			var wordWidth = wordLis[1].offsetWidth;
			z_fourcircle.style.left = wordLeft + wordWidth / 2 - 6 + "px";
			wordLis[1].style.color = "#BCAB7A";
	        maidianHua(1, 2, 0);
		break;
		case "#!/peitao":
		    $("#carouselFour ul li").eq(2).css("display","block"); 
		    var wordLeft = wordLis[2].offsetLeft;
			var wordWidth = wordLis[2].offsetWidth;
			z_fourcircle.style.left = wordLeft + wordWidth / 2 - 6 + "px";
			wordLis[2].style.color = "#BCAB7A";
		    maidianHua(2, 3, 1);
		break;
		case "#!/huanjing":
		    $("#carouselFour ul li").eq(3).css("display","block"); 
		    var wordLeft = wordLis[3].offsetLeft;
			var wordWidth = wordLis[3].offsetWidth;
			z_fourcircle.style.left = wordLeft + wordWidth / 2 - 6 + "px";
			wordLis[3].style.color = "#BCAB7A";
		    maidianHua(3, 0, 2);
		break;
	}

	function maidianHua(idxe, nexe, pree) {
		var idx = idxe;
		var next = nexe;
		var prev = pree;

		var windowWidth;
		init();
		window.onresize = init;
        $("#carouselFour ul li").css({"z-index":"1","display":"block"});
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
		var startTime;

		function touchstartHandler(event) {
			if(event.touches.length > 1) {
				return;
			}
			deltaX = event.touches[0].clientX;
			startX = event.touches[0].clientX;
			startY = event.touches[0].clientY;
			deltaY = event.touches[0].clientY;
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
			imageLis[idx].style.webkitTransform = "translateX(" + (clientX - deltaX) + "px)";
			imageLis[next].style.webkitTransform = "translateX(" + (windowWidth + clientX - deltaX) + "px)";
			imageLis[prev].style.webkitTransform = "translateX(" + (-windowWidth + clientX - deltaX) + "px)";
		}

		function touchendHandler(event) {
			var distance = event.changedTouches[0].clientX - startX;
			var distanceY = event.changedTouches[0].clientY - startY;
			var time = new Date() - startTime;
			if(distance >= windowWidth / 2 || (distance > 80 && time < 300)) {
				var aqq = idx;
				aqq--;
				if(aqq < 0) {
					aqq = 3;
				};

				$("#carouselFour ul li").css("z-index", "1");
				$("#carouselFour ul li").eq(aqq).css("z-index", "123");
				next = idx;
				idx = prev;
				prev--;
				if(prev < 0) {
					prev = 3;
				};
				imageLis[idx].style.transition = "all 0.3s ease 0s";
				imageLis[next].style.transition = "all 0.3s ease 0s";
				imageLis[idx].style.webkitTransform = "translateX(0px)";
				imageLis[next].style.webkitTransform = "translateX(" + windowWidth + "px)";
				var wordLeft = wordLis[idx].offsetLeft;
				var wordWidth = wordLis[idx].offsetWidth;
				z_fourcircle.style.left = wordLeft + wordWidth / 2 - 6 + "px";
				for(var re = 0; re < wordLis.length; re++) {
					wordLis[re].style.color = "";
				}
				wordLis[idx].style.color = "#BCAB7A";
				z_fourcircle.style.transition = "all 0.3s ease 0s";
				var wordLeft3 = wordLis[0].offsetLeft;
				var wordLeft4 = wordLis[2].offsetLeft;
				var plau = parseInt(z_fourcircle.style.left);
				if(idx == 1) {
					carousel.style.height = 5 + "rem";
					zhaoPin.style.display = "block";
				} else {
					carousel.style.height = 9.0 + "rem";
					zhaoPin.style.display = "none";
				}
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
			if(next > 3) {
				next = 0;
			};
			$("#carouselFour ul li").css({"z-index":"1","display":"block"});
			$("#carouselFour ul li").eq(idx).css("z-index", "123");
			var wordLeft = wordLis[idx].offsetLeft;
			var wordWidth = wordLis[idx].offsetWidth;
			z_fourcircle.style.left = wordLeft + wordWidth / 2 - 6 + "px";
			z_fourcircle.style.transition = "all 0.3s ease 0s";
			for(var re = 0; re < wordLis.length; re++) {
				wordLis[re].style.color = "";
			}
			wordLis[idx].style.color = "#BCAB7A";
			var plau = parseInt(z_fourcircle.style.left);
			if(idx == 1) {
				carousel.style.height = 5 + "rem";
				zhaoPin.style.display = "block";
			} else {
				carousel.style.height = 9.0 + "rem";
				zhaoPin.style.display = "none";
			}
			imageLis[next].style.transition = "none";
			imageLis[next].style.webkitTransform = "translateX(" + windowWidth + "px)";
			imageLis[prev].style.transition = "all 0.3s ease 0s";
			imageLis[idx].style.transition = "all 0.3s ease 0s";
			imageLis[prev].style.webkitTransform = "translateX(" + -windowWidth + "px)";
			imageLis[idx].style.webkitTransform = "translateX(0px)";
		}
	};
	$(".z_yihuafour .z_fourWord li").click(function() {
		$(".z_yihuafour .z_fourWord li").css("color", "black !important");
		$(this).css("color", "#BCAB7A");
		var thaLeft = $(this).offset().left;
		var wordWidth1 = $(this).width();
		z_fourcircle.style.left = thaLeft + wordWidth1 / 2 +3 + "px";
		z_fourcircle.style.transition = "all 0.3s ease 0s";
		if($(this).html() == "交通") {
			carousel.style.height = 5 + "rem";
			zhaoPin.style.display = "block";
		} else {
			carousel.style.height = 9.0 + "rem";
			zhaoPin.style.display = "none";
		}
		idxs = $(this).index();
		qq = idxs;
		qq++;
		nexts = qq;
		if(nexts > 3) {
			nexts = 0;
		};
		pp = idxs;
		pp--;
		prevs = pp
		if(prevs < 0) {
			prevs = 3;
		};
		var imageLis = document.querySelectorAll("#carouselFour ul li");
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
		$("#carouselFour ul li").css("z-index", "1");
		$("#carouselFour ul li").eq(idxs).css({
			"z-index": "130"
		});
		maidianHua(idxs, nexts, prevs);
	})
}