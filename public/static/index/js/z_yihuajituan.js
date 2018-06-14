$(function() {

	resizewindow();
	$('.topnavli a').each(function() {
		if ($($(this))[0].href == String(window.location)) {
			$(this).css({
				'background-image':'url(http://www.yhjtcity.com/static/index/img/navhover.png)',
			}).attr('href', 'javascript:void(0);')
		}
	})
	var zGoodLeZ=$(".z_good_zero").offset().left
	$(".z_good_circle .z_circle").css("transform","translateX("+(zGoodLeZ+40.5)+"px)");

	function resizewindow(){
		
		var contHeight = document.documentElement.scrollHeight;
		
		var pageHeight = document.documentElement.clientHeight;
		
		var sHeight = Math.max(pageHeight, contHeight);
		
        var zCenterHe=$(".center_word").height();
		
		var zGoodTopWi=$(".z_good_top_ul").width();
		var zCenLineWi=$(".center_center_word").width();
	    var winhd=$(window).height();
		
		
		$(".t-main").css({
			"height": 320+"px",
			"width": "100%"
		})
		$(".center_word").css("marginTop",0-zCenterHe/2-10+"px");
		$(".center_line_box").css("width",(1146-zCenLineWi-40)/2+"px");
		$(".z_good_top_ul").css("marginLeft",0-zGoodTopWi/2+"px")
	};
    $("#zGoodness .z_good_top_ul li").click(function(){
        var topUlLiLe=$(this).offset().left;
        $("#zGoodness .z_good_top_ul li").children("a").css("color","");
        var zCircle=$(".z_good_circle .z_circle").offset().left;
        $(".z_good_circle .z_circle").addClass("z_circle guoduLeft");
        $(".z_good_circle .z_circle").css("transform","translateX("+(topUlLiLe+62)+"px)");
        if($(this).children("a").html()==="集团各分子公司"){
        	$(".z_good_circle .z_circle").css("transform","translateX("+(topUlLiLe+80)+"px)");
        };
        if($(this).children("a").html()==="集团介绍"){
        	$(".z_good_circle .z_circle").css("transform","translateX("+(topUlLiLe+42)+"px)");
        };
        if($(this).children("a").html()==="集团招聘"){
        	$(".z_good_circle .z_circle").css("transform","translateX("+(topUlLiLe+44)+"px)");
        	$(".z_zhaoping_msg").css("display","block");
        }else{
        	$(".z_zhaoping_msg").css("display","none");
        }
        if($(this).children("a").html()==="在建项目(简介)"){
            $(".z_good_circle .z_circle").css("transform","translateX("+(topUlLiLe+80)+"px)");
        }
    })
	$(window).resize(function() {
		resizewindow();
		
	});
	$(window).scroll(function(){
		var sctop=$(window).height()/2+$(this).scrollTop();
		$(".baoname").css("top",sctop+"px");
	})
	$(".weixin").hover(function(){
	    $(".weixinhao").css("opacity",1);
	},function(){
		$(".weixinhao").css("opacity",0);
	})
	$(".weixinhao").hover(function(){
	    $(".weixinhao").css("opacity",1);
	},function(){
		$(".weixinhao").css("opacity",0);
	});
	$(".z_zhaoping_zhiwei ul li").hover(function(){
		$(this).children("a").css("color","white");
		$(this).removeClass("bubianse guoduLeft");
		$(this).addClass("bianse guoduLeft");
	},function(){
		$(this).children("a").css("color","");
		$(this).removeClass("bubianse guoduLeft");
		$(this).addClass("bubianse guoduLeft");
	})
});
// window.onload=function(){
//     (function(){
//     	var Jituanyj=Vue.extend({
//             template:"#zjituanyj",
//             data:function(){
//                 return{
//                     "msg":"集团介绍",
//                     "introduce1":"成立于2005年12月，清镇最具影响力的企业集团之一。",
//                     "introduce2":"是一家多元化集团公司，以当地产开发为主，集绿化、装修物业等为一体的多元化、现代化企业。",
//                     "introduce3":"旗下有8家公司：贵州益华房地产开发有限责任公司、贵州倾城物业管理 有限公司、清镇市翠竹园林绿化有限公司、清镇月半湾经济发展有限责任公司、 一品禾装饰装潢公司、贵州纳川商业管理有限公司、贵阳市翠枫园赛鸽中心、商混公司等企业。 集团总资产33亿元，现有员工400余人。",
//                     "introduce01":"2006至2015年期间获得中国清镇市委清镇市人民政府颁发的二十强纳税企业奖项。",
//                     "introduce02":"2008年、2009获得清镇市青龙街道办事处颁发的文明企业奖项。",
//                     "introduce03":"2009年获得贵阳市绿化模范单位。",
//                     "introduce04":"2011年至2015年获得中国清镇市委清镇市人民政府颁发的诚信房开企业。",
//                     "introduce05":"2011年获得贵阳市环境保护局颁发的贵阳市绿色社区奖项。",
//                     "introduce06":"2012年获得清镇市住建系统先进房开奖项2013年获得清镇撤县建市20周年大型群众文化活动和献礼工程特别贡献单位奖项。",
//                     "introduce07":"2015年被评为贵阳市二十五家重点房地产企业之一。"
//                 }
//             }
//         });
//         var School=Vue.extend({
//             template:"#zGoodShool",
//             data:function(){
//                 return{
//                     "msg":"公司人才体系",
//                     "introduce":"益华集团始终秉承人才发展战略，加强专业人才队伍建设。在内部优化提升用人机制、人才培养体系、薪酬激励机制等，加快从内部培养和提拔优秀经营管理人才；积极创新和完善人才引进评价机制，通过多种渠道和方式，大力引进国内外的金融人才、管理人才和专业技术人才，全力构建国际化、高层次的专业人才团队。",
//                     "imgSrc":"http://www.yhjtcity.com/static/index/img/rencaitixi.jpg"
//                 }
//             }
//         });
//         var JiaoTong=Vue.extend({
//             template:"#zGoodJiao",
//             data:function(){
//                 return{
//                     "msg":"集团各分子公司",
//                     "introduce1":"成立于2005年12月，清镇最具影响力的企业集团之一。",
//                     "introduce2":"是一家多元化集团公司，以当地产开发为主，集绿化、装修物业等为一体的多元化、现代化企业。",
//                     "introduce3":"旗下有8家公司：贵州益华房地产开发有限责任公司、贵州倾城物业管理 有限公司、清镇市翠竹园林绿化有限公司、清镇月半湾经济发展有限责任公司、 一品禾装饰装潢公司、贵州纳川商业管理有限公司、贵阳市翠枫园赛鸽中心、商混公司等企业。 集团总资产33亿元，现有员工400余人。"
//                 }
//             }
//         });
//         var HuanJing=Vue.extend({
//             template:"#zGoodHuan",
//             data:function(){
//                 return{
//                     "msg":"集团招聘",
//                     "introduce":"我们需要人才，但是我们宁缺毋滥。只要你有坦诚精神、有高效率的工作状态、愿意挑战高于现在水平20%的事情。超越自我意识的屏障，你就来加入迎接我们的挑战！",
//                     "imgSrc":""
//                 }
//             }
//         });
//         var ZaiJian=Vue.extend({
//             template:"#zGoodZaiJian"
//         });
//         var router=new VueRouter();
//         router.map({
//         	"/jituanyj":{
//         		component:Jituanyj
//         	},
//             "/school":{
//                 component:School
//             },
//             "/jiaotong":{
//                 component:JiaoTong
//             },
//             "/huanjing":{
//                 component:HuanJing
//             },
//             "/goodZaiJian":{
//             	component:ZaiJian
//             }
//         });
//         router.redirect({
//             "/":"/jituanyj"
//         });
//         var zGood=Vue.extend({});
//         router.start(zGood,"#zGoodness");
//         var goodMsg=$(".good_msg").html();
// 	    switch (goodMsg){
// 	    	case "集团介绍":
// 	    	    var zGoodLeZ=$(".z_good_zero").offset().left;
// 	            $(".z_good_circle .z_circle").css("transform","translateX("+(zGoodLeZ+40.5)+"px)");
// 	            $(".z_good_zero").children("a").css("color","#BCAB7A");
// 	        break;
// 	    	case "公司人才体系":
// 	    	    var zGoodLe=$(".z_good_one").offset().left;
// 	    	    $(".z_good_zero").children("a").css("color","");
// 	            $(".z_good_circle .z_circle").css("transform","translateX("+(zGoodLe+53.5)+"px)");
// 	            $(".z_good_one").children("a").css("color","#BCAB7A");
//             break;
//             case "集团各分子公司":
// 	    	    var zGoodLetwo=$(".z_good_two").offset().left;
// 	    	    $(".z_good_zero").children("a").css("color","");
// 	            $(".z_good_circle .z_circle").css("transform","translateX("+(zGoodLetwo+78.5)+"px)");
// 	            $(".z_good_two").children("a").css("color","#BCAB7A");
//             break;
//             case "集团招聘":
// 	    	    var zGoodLethree=$(".z_good_three").offset().left
// 	    	    $(".z_good_zero").children("a").css("color","");
// 	            $(".z_good_circle .z_circle").css("transform","translateX("+(zGoodLethree+44)+"px)");
// 	            $(".z_good_three").children("a").css("color","#BCAB7A");
// 	            $(".z_zhaoping_msg").css("display","block");
//             break;
//             case "在建项目(简介)":
// 	    	    var zGoodLeFour=$(".z_good_four").offset().left
// 	    	    $(".z_good_zero").children("a").css("color","");
// 	            $(".z_good_circle .z_circle").css("transform","translateX("+(zGoodLeFour+44)+"px)");
// 	            $(".z_good_three").children("a").css("color","#BCAB7A");
//             break;
// 	    }
//     })()
// }
