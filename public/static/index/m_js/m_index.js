//字体自适应
! function(n) {
	var e = n.document,
		t = e.documentElement,
		i = 750,
		d = i / 100,
		o = "orientationchange" in n ? "orientationchange" : "resize",
		a = function() {
			var n = t.clientWidth || 320;
			n > 750 && (n = 750), t.style.fontSize = n / d + "px";
			pageHeight = document.documentElement.clientHeight;

			$(".m-maincont").css({
				"height": pageHeight / (t.style.fontSize = n / d) - (0.9 + 1.6) + "rem",
				"width": "100%"
			});
			$(".imageList").css({
				"height": pageHeight / (t.style.fontSize = n / d) - (0.9 + 1.6) + "rem",
				"width": "100%"
			});
			$(".menccont").css({
				"height": pageHeight / (t.style.fontSize = n / d) - 0.9 + "rem",
				"width": "100%"
			});
		};
	e.addEventListener && (n.addEventListener(o, a, !1), e.addEventListener("DOMContentLoaded", a, !1))
}(window);



$(function(){
	var locati=window.location.href;
	var locaZfcC=locati.substring(locati.length-10);
	console.log(locaZfcC);
	switch (locaZfcC){
		case "zh.tt.com/":
		    $(".headnav .navul .navli").eq(0).children("a").css("color","white");
		break;
		case "uanjs.html":
		    $(".headnav .navul .navli").eq(1).children("a").css("color","white");
		break;
		case "uzhai.html":
			$(".headnav .navul .navli").eq(5).children("a").css("color","white");
		break;
		case "angpu.html":
		    $(".headnav .navul .navli").eq(5).children("a").css("color","white");
		break;
		case "/rxhx.html":
		    $(".headnav .navul .navli").eq(5).children("a").css("color","white");
		break;
		case "fid/2.html":
		    $(".headnav .navul .navli").eq(9).children("a").css("color","white");
		break;
		case "women.html":
		    $(".headnav .navul .navli").eq(11).children("a").css("color","white");
		break;
		case "uanzp.html":
		    $(".headnav .navul .navli").eq(10).children("a").css("color","white");
		break;
	};
})
