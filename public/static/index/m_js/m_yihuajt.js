window.onload=function(){
	$("#fiveCom").scroll(function(event){
		var topUlLiCom=$(".z_fourWord li");
		for (var ss=0;ss<topUlLiCom.length;ss++) {
			if(topUlLiCom[ss].style.color=="rgb(188, 171, 122)"){;
				break;
			}
		};
		var wordWidth=$(".z_fourWord li").eq(ss).width();
		var thaLeft =$(".z_yihuafour  .z_fourWord li").eq(ss).offset().left;
	    z_fourcircle.style.left=thaLeft+wordWidth/2+"px";
	});
	var carousel = document.getElementById("carouselFour");
		var imageLis = document.querySelectorAll("#carouselFour ul li");
        var wordLis=document.querySelectorAll(".z_fourWord li");
        var zFourjtZp=document.getElementsByClassName("z_fourjtzp")[0];
        var zhaoPin=document.getElementsByClassName("z_jtzpxx")[0];
        var z_jituanzp=document.getElementById("z_jituanzp");
        var z_jtzpWo=document.getElementById("z_jtzpWo");
        var z_fourcircle=document.getElementById("z_fourcircle");
        wordLis[0].style.color="#BCAB7A";
        $("#carouselFour ul li").eq(0).css("display", "block");
	yihuajt(0, 1, 4);
	function yihuajt(idxe, nexe, pree){
		
        $("#carouselFour ul li").css("display", "block");
		var idx = idxe;	
		var next = nexe;	
		var prev = pree;	

		var windowWidth;
		init();
		window.onresize = init;

		function init(){
			windowWidth = document.documentElement.clientWidth;
			for(var i = nexe ; i < imageLis.length ; i++){
				imageLis[i].style.webkitTransform = "translateX(" + windowWidth + "px)";
			}
			imageLis[idx].style.transition = "none";
			imageLis[next].style.transition = "none";
			imageLis[prev].style.transition = "none";
			imageLis[idx].style.webkitTransform = "translateX(0px)";
			imageLis[next].style.webkitTransform = "translateX(" + windowWidth + "px)";
			imageLis[prev].style.webkitTransform = "translateX(" + -windowWidth + "px)";
		}
		carousel.addEventListener("touchstart",touchstartHandler,false);
		carousel.addEventListener("touchmove",touchmoveHandler,false);
		carousel.addEventListener("touchend",touchendHandler,false);
		var deltaX;
		var startX;
		var startTime;
		function touchstartHandler(event){
			if(event.touches.length > 1){
				return;
			}
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
		function touchmoveHandler(event){
			if(event.touches.length > 1){
				return;
			}
			var clientX = event.touches[0].clientX;
			imageLis[idx].style.webkitTransform = "translateX(" + (clientX - deltaX) + "px)";
			imageLis[next].style.webkitTransform = "translateX(" + (windowWidth + clientX - deltaX) + "px)";
			imageLis[prev].style.webkitTransform = "translateX(" + (-windowWidth + clientX - deltaX) + "px)";
		}
		//手指结束触摸的时候
		function touchendHandler(event){
			var distance = event.changedTouches[0].clientX - startX;
			var time = new Date() - startTime;
			if(distance >= windowWidth / 2 || (distance > 80 && time < 300)){
				var aqq = idx;
				aqq--;
				if(aqq < 0) {
					aqq = 4;
				};

				$("#carouselFour ul li").css("z-index", "1");
				$("#carouselFour ul li").eq(aqq).css("z-index", "123");
				next = idx;
				idx = prev;
				prev--;
				if(prev < 0){
					prev = 4;
				}
				imageLis[idx].style.transition = "all 0.3s ease 0s";
				imageLis[next].style.transition = "all 0.3s ease 0s";
				imageLis[idx].style.webkitTransform = "translateX(0px)";
				imageLis[next].style.webkitTransform = "translateX(" + windowWidth + "px)";
				var wordWidth=wordLis[idx].offsetWidth;
				var thaLeft =$(".z_yihuafour  .z_fourWord li").eq(idx).offset().left;
	            z_fourcircle.style.left=thaLeft+wordWidth/2+"px";
	            if(idx==3){
		        	carousel.style.height=2+"rem";
		        	carousel.style.marginBottom=0.2+"rem";
	                zhaoPin.style.display="block";
		        }else{
					carousel.style.height=9.2+"rem";
					zhaoPin.style.display="none";
				};
	            for(var re=0;re<wordLis.length;re++){
	            	wordLis[re].style.color="";
	            };
	            var imageLisFou = document.querySelectorAll("#carouselFour ul li")[1];
				var imageLisFouH=imageLisFou.offsetHeight;
				if(idx==1) {
					carousel.style.height = imageLisFouH+70+"px";
				};
	            wordLis[idx].style.color="#BCAB7A";
                z_fourcircle.style.transition = "all 0.3s ease 0s";
			}else if(distance <= -windowWidth / 2 || (distance < -80 && time < 300)){
				showNext();
			}else{
				imageLis[prev].style.transition = "all 0.3s ease 0s";
				imageLis[idx].style.transition = "all 0.3s ease 0s";
				imageLis[next].style.transition = "all 0.3s ease 0s";
				imageLis[prev].style.webkitTransform = "translateX(" + -windowWidth + "px)";
				imageLis[idx].style.webkitTransform = "translateX(0px)";
				imageLis[next].style.webkitTransform = "translateX(" + windowWidth + "px)";
			}
		}

		function showNext(){
			prev = idx;
			idx = next;
			//改变next
			next++;
			if(next > 4){
				next = 0;
			}
			$("#carouselFour ul li").css("z-index", "1");
			$("#carouselFour ul li").eq(idx).css("z-index", "123");
			var wordWidth=wordLis[idx].offsetWidth;
			var thaLeft =$(".z_yihuafour  .z_fourWord li").eq(idx).offset().left;
            z_fourcircle.style.left=thaLeft+wordWidth/2+"px";
            z_fourcircle.style.transition = "all 0.3s ease 0s";
            for(var re=0;re<wordLis.length;re++){
            	wordLis[re].style.color="";
            }
            wordLis[idx].style.color="#BCAB7A";
            var wordLeft3=wordLis[2].offsetLeft;  
	        if(idx==3){
	        	carousel.style.height=2+"rem";
                zhaoPin.style.display="block";
	        }else{
				carousel.style.height=9.2+"rem";
				zhaoPin.style.display="none";
			};
            var imageLisFou = document.querySelectorAll("#carouselFour ul li")[1];
			var imageLisFouH=imageLisFou.offsetHeight;
			if(idx==1) {
				carousel.style.height = imageLisFouH+70+"px";
			}; 
			imageLis[next].style.transition = "none";
			imageLis[next].style.webkitTransform = "translateX(" + windowWidth + "px)";
			imageLis[prev].style.transition = "all 0.3s ease 0s";
			imageLis[idx].style.transition = "all 0.3s ease 0s";
			imageLis[prev].style.webkitTransform = "translateX(" + -windowWidth + "px)";
			imageLis[idx].style.webkitTransform = "translateX(0px)";
		}
	};
	$(".z_yihuafour  .z_fourWord li").click(function() {
		$(".z_yihuafour .z_fourWord li").css("color", "black !important");
		$("#carouselFour ul li").css("display", "block");
		$(this).css("color", "#BCAB7A");
		var thaLeft = $(this).offset().left;
		var wordWidth1 = $(this).width();
		z_fourcircle.style.left = thaLeft + wordWidth1 / 2+4 + "px";
		z_fourcircle.style.transition = "all 0.3s ease 0s";
		if($(this).html() == "集团招聘") {
			carousel.style.height = 2 + "rem";
			zhaoPin.style.display = "block";
		} else {
			carousel.style.height = 9.5 + "rem";
			zhaoPin.style.display = "none";
		};
		var imageLisFou = document.querySelectorAll("#carouselFour ul li")[1];
		var imageLisFouH=imageLisFou.offsetHeight;
		if($(this).html() == "在建项目") {
			carousel.style.height = imageLisFouH+70+"px";
		} 
		idxs = $(this).index();
		qq = idxs;
		qq++;
		nexts = qq;
		if(nexts > 4) {
			nexts = 0;
		};
		pp = idxs;
		pp--;
		prevs = pp
		if(prevs < 0) {
			prevs = 4;
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
		yihuajt(idxs, nexts, prevs);
	})
}
