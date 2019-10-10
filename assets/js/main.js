
function hljsLoad(){
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
		$(".search-bar input").focus()
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
		console.log(111);
		$("#recommended_posts").css({
		    "width":"100%"
		})
});
$("#mobile-collapse,#mobile-collapse1").click(function(b) {
	var a = $(window)[0].innerWidth;
	if (a < 992) {
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
	if ($("body").hasClass("box-layout")) {
		if ($(this).scrollTop() > 60) {
			$(".pcoded-navbar").css("position", "fixed");
			$(".pcoded-navbar").css("transition", "none");
			$(".pcoded-navbar").css("margin-top", "0px");
			$(".pcoded-navbar").css("border-radius", "0px")
		} else {
			$(".pcoded-navbar").removeAttr("style");
			$(".pcoded-navbar").css("position", "absolute");
			$(".pcoded-navbar").css("margin-top", "50px")
		}
	}
	if($(this).scrollTop() > 410)
	{
		$("#recommended_posts").css({
			"padding-top":"0px",
		    "padding-bottom":"1px",
		    "position":"fixed",
		    "top":"0px",
		    "width":$(".theiaStickySidebar").width()+"px"
		})
	}else{
		$("#recommended_posts").css({
		    "position":"static",
		    "width":$(".theiaStickySidebar").width()+"px"
		})
	}
});
$("#more-details").on("click", function() {
	$("#nav-user-link").slideToggle()
});
$(".mob-toggler").on("click", function() {
		$(".pcoded-header > .collapse,.pcoded-header > .container > .collapse").toggleClass("d-flex")
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