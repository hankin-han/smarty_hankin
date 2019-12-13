
$('a[data-toggle="tooltip"]').tooltip();
function hljsLoad(){
//幻灯片	
if(IS_SLIDER == '1'){
	var swiper = new Swiper('.swiper-container', {
	    pagination: '.swiper-pagination',
	    nextButton: '.swiper-button-next',
	    prevButton: '.swiper-button-prev',
	    paginationClickable: true,
	    loop : true,
	    autoplay : 5000,
	    lazyLoading: true,
	    zoom: true,
	    effect: 'slide',
    });
}
$('#view-content').viewer();
$('.gallery').viewer();
$("#hankin_qq").blur(function(){
var _this = $(this);
var url = '/wp-admin/admin-ajax.php?action=get_ajax_qq&qq='+_this.val();
if(_this.val() !==""){
	$("#comment-loader").show();
	$.get(url, function(result){
		$("#comment-loader").hide();
		if(result.result.code == '1000')
		{
			faAjax.createButterbar(result.result.msg);
			return false;
		}
	   	var avatar = result.data.avatar;
	   	var qq = result.data.id;
	   	var name = result.data.name;
	   	$("#avatar_img").attr("src",avatar);
	   	$("#email").val(qq+'@qq.com');
	   	$("#hankin_avatar").val(avatar);
	   	$("#hankin_username").val(name);
	   	$("#avatar").val(name);
	   	_this.val(qq);
	   	$("#clear-qq").find("font").text(name);
	   	$.cookie('hankin-avatar', avatar, { expires: 7 });
	   	$.cookie('hankin-qq', qq, { expires: 7 });
	   	$.cookie('hankin-username', name, { expires: 7 });
	});
}
})

$("#clear-qq").on("click",function(){
	$("#qqShow").toggle(100);
});

	hljs.initHighlightingOnLoad();
      $('pre code').each(function(j, block) {
        hljs.highlightBlock(block);
        var lines = $(this).text().split('\n').length - 1;
          if (lines < 4) return;  // 当行数小于4时不显示行号
          var $numbering = $('<ol/>').addClass('pre-numbering');
          $(this)
              .addClass('has-numbering')
              .parent()
              .append($numbering);
          for(i=1;i<=lines;i++) {
              $numbering.append($('<li/>').text(i));
          }
      });
      //弹出垂直菜单
	$(".menu").click(function() {
	    if ($(this).hasClass("cura")) {
	        $(this).children(".new-sub").hide(); //当前菜单下的二级菜单隐藏
	        $(".menu").removeClass("cura"); //同一级的菜单项
	    } else {
	        $(".menu").removeClass("cura"); //移除所有的样式
	        $(this).addClass("cura"); //给当前菜单添加特定样式
	        $(".menu").children(".new-sub").slideUp("fast"); //隐藏所有的二级菜单
	        $(this).children(".new-sub").slideDown("fast"); //展示当前的二级菜单
	    }
	});
	if(window.IS_PAGE_SINGLE == 0){
		$(document).ready(function(){          
			$("#list-home").infinitescroll({
			    loading: {
			        img: THEME_URL+'/assets/images/loading.svg',
			        msgText: "加载中...",
			        finishedMsg: "—— 我是有底线的 ——"
			    },
			    nextSelector:".pagenavi a",
			    navSelector:".pagenavi",
			    itemSelector:"#list-home .list-box",
			    animate: false,
			    extraScrollPx: 30, //离网页底部多少像素时触发ajax 
			});
			$("#list-grid").infinitescroll({
			    loading: {
			        img: THEME_URL+'/assets/images/loading.svg',
			        msgText: "加载中...",
			        finishedMsg: "—— 我是有底线的 ——"
			    },
			    nextSelector:".pagenavi a",
			    navSelector:".pagenavi",
			    itemSelector:"#list-grid .list-box",
			    animate: false,
			    extraScrollPx: 30, //离网页底部多少像素时触发ajax 
			});
		});
	}

/** 公告栏 */
(function (win){
     var callboarTimer;
     var callboard = $('#notice');
     var callboardUl = callboard.find('ul');
     var callboardLi = callboard.find('li');
     var liLen = callboard.find('li').length;
     var initHeight = callboardLi.first().outerHeight(true);
 
     win.autoAnimation = function (){
         if (liLen <= 1) return;
         var self = arguments.callee;
         var callboardLiFirst = callboard.find('li').first();
         callboardLiFirst.animate({
             marginTop:-initHeight
         }, 500, function (){
             clearTimeout(callboarTimer);
             callboardLiFirst.appendTo(callboardUl).css({marginTop:0});
             callboarTimer = setTimeout(self, 5000);
         });
     }
 
     callboard.mouseenter(
         function (){
             clearTimeout(callboarTimer);
         }).mouseleave(function (){
             callboarTimer = setTimeout(win.autoAnimation, 5000);
         });
 }(window));
 setTimeout(window.autoAnimation, 5000);
}
hljsLoad();



$(".pcoded-navbar .close").on("click", function() {
	var a = $(this);
	a.parents(".card").fadeOut("slow").remove()
});
var c = $(window)[0].innerWidth;
$(".search-btn").on("click", function() {
		var d = $(this);
		$(".main-search").addClass("open");
		if (c <= 991) {
			$(".main-search .form-control").css({
				width: "90px"
			})
		} else {
			$(".main-search .form-control").css({
				width: "150px"
			})
		}
	});
	$(".search-close").on("click", function() {
		var d = $(this);
		$(".main-search").removeClass("open");
		$(".main-search .form-control").css({
			width: "0"
		})
	});
	$(".pop-search").on("click", function() {
		$(".search-bar").slideToggle("fast");
		$(".search-bar input").focus();
		$(".collapse").show();

	});

	$(".search-bar .close").on("click", function() {
		$(".search-bar").slideToggle("fast")
	});
	if (c <= 991) {
		$(".main-search").addClass("open");
		$(".main-search .form-control").css({
			width: "100px"
		})
	}
$("#mobile-collapse").on("click", function() {
		if (c > 991) {
			$(".pcoded-navbar:not(.theme-horizontal)").toggleClass("navbar-collapsed")
		}
		$("#recommended_posts").css({
		    "width":"100%"
		})
});
$("#mobile-collapse,#mobile-collapse1").click(function(b) {
	var a = $(window)[0].innerWidth;
	console.log(a);
	if (a < 992) {
		$(".pcoded-navbar").removeClass("navbar-collapsed");
		$(".pcoded-navbar").toggleClass("mob-open");
		b.stopPropagation()
	}
});
$(window).ready(function() {
	var a = $(window)[0].innerWidth;
	/*$(".pcoded-navbar").on("click tap", function(b) {
		b.stopPropagation()
	});*/
	$(".pcoded-main-container,.pcoded-header").on("click", function() {
		if (a < 992) {
			if ($(".pcoded-navbar").hasClass("mob-open") == true) {
				$(".pcoded-navbar").removeClass("mob-open");
				$("#mobile-collapse,#mobile-collapse1").removeClass("on")
			}
		}
	})
});
$(window).scroll(function() {
	if (!$(".pcoded-header").hasClass("headerpos-fixed")) {
		if ($(this).scrollTop() > 60) {
			$(".pcoded-navbar.menupos-fixed").css("position", "fixed");
			$(".pcoded-navbar.menupos-fixed").css("transition", "none");
			$(".pcoded-navbar.menupos-fixed").css("margin-top", "0px")
		} else {
			$(".pcoded-navbar.menupos-fixed").removeAttr("style");
			$(".pcoded-navbar.menupos-fixed").css("position", "absolute");
			$(".pcoded-navbar.menupos-fixed").css("margin-top", "60px")
		}
	}
	if ($("#body").hasClass("box-layout")) {
		if ($(this).scrollTop() > 60) {
			$(".pcoded-navbar").css("position", "fixed");
			$(".pcoded-navbar").css("transition", "none");
			$(".pcoded-navbar").css("margin-top", "0px");
			$(".pcoded-navbar").css("height", "100vh");
			$(".pcoded-navbar").css("border-radius", "0px")
		} else {
			$(".pcoded-navbar").removeAttr("style");
			$(".pcoded-navbar").css("position", "absolute");
			$(".pcoded-navbar").css("margin-top", "50px")
		}
	}
	
});
$("#more-details").on("click", function() {
	$("#nav-user-link").slideToggle()
});
$(".mob-toggler").on("click", function() {
		$(".pcoded-header > .collapse,.pcoded-header > .container > .collapse").toggleClass("d-flex");
	});
$(".pcoded-submenu-click").on("click",function(){
	if($(this).next().attr("data") == 'off'){
		$(this).next().slideDown()
		$(this).next().attr("data","on");
		$(this).addClass("has-ripple");
		$(this).parent().addClass("pcoded-trigger");
	}else{
		$(this).next().slideUp()
		$(this).next().attr("data","off");
		$(this).removeClass("has-ripple");
		$(this).parent().removeClass("pcoded-trigger");
	}
});
$(".menu-item-object-custom a , .pcoded-submenu a").on("click",function(){
	$(".pcoded-navbar").removeClass("mob-open");
})