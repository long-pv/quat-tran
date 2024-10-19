(function ($, window) {
	// Open and close the mobile menu
	$(".header .header__toggleItem").on("click", function () {
		menu_open_sp();
	});

	$(".mainBodyContent").on("click", function () {
		if (!$(this).hasClass("menu__openSp")) return;
		menu_open_sp();
	});

	function menu_open_sp() {
		$("body").toggleClass("mobile-menu-open");
		$(".header__menusp").toggleClass("active");
		$(".header__toggleItem").toggle();
		$(".mainBodyContent").toggleClass("menu__openSp");
	}
	// end mobile menu

	// wpadminbar
	if ($("#wpadminbar").length > 0) {
		$(".header").css("margin-top", $("#wpadminbar").outerHeight(true));
	}

	// Back to top
	var backTop = $("#back-top");
	$(window).scroll(function () {
		if ($(this).scrollTop() > 100) {
			backTop.fadeIn();
		} else {
			backTop.fadeOut();
		}
	});
	backTop.click(function () {
		$("html, body").animate({ scrollTop: 0 }, 800);
		return false;
	});

	// Banner
	$("#sectionBanner__slider").slick({
		dots: false,
		arrows: false,
		autoplay: true,
		autoplaySpeed: 5000,
		adaptiveHeight: false,
	});

	//
	$(".product-slider").slick({
		slidesToShow: 4,
		slidesToScroll: 1,
		infinite: true,
		autoplay: false,
		autoplaySpeed: 2000,
	});

	// Kích hoạt slide cho ảnh chính và gallery thu nhỏ
	$(".thumbnail-gallery-for").slick({
		slidesToShow: 1,
		slidesToScroll: 1,
		arrows: false,
		fade: true,
		asNavFor: ".thumbnail-gallery-nav",
	});

	$(".thumbnail-gallery-nav").slick({
		slidesToShow: 3,
		slidesToScroll: 1,
		asNavFor: ".thumbnail-gallery-for",
		dots: false,
		arrows: true,
		focusOnSelect: true,
	});

	// Menu Filter Click Event
	$(".menu-filter .menu-filter__nav .menu li.menu-item").on("click", function () {
		$(this).find("ul.sub-menu").toggle();
	});

	//

	$(".readmore_content").readmore({
		moreLink: '<div class="readmore_content_exists rm_down"><button>Đọc thêm <i class="fas fa-caret-down"></i></button></div>',
		lessLink: '<div class="readmore_content_exists rm_up"><button>Thu gọn <i class="fas fa-caret-up"></i></button></div>',
		collapsedHeight: 150,
		afterToggle: function (trigger, element, expanded) {
			if (!expanded) {
				// The "Close" link was clicked
				$("html, body").animate({ scrollTop: element.offset().top }, { duration: 100 });
			}
		},
	});

	// $(".readmore_content_ab").readmore({
	// 	moreLink:
	// 		'<div class="readmore_content_exists rm_down"><button>Đọc thêm <i class="fas fa-caret-down"></i></button></div>',
	// 	lessLink:
	// 		'<div class="readmore_content_exists rm_up"><button>Thu gọn <i class="fas fa-caret-up"></i></button></div>',
	// 	collapsedHeight: 340,
	// 	afterToggle: function (trigger, element, expanded) {
	// 		if (!expanded) {
	// 			// The "Close" link was clicked
	// 			$("html, body").animate(
	// 				{ scrollTop: element.offset().top },
	// 				{ duration: 100 }
	// 			);
	// 		}
	// 	},
	// });
	// $(".readmore_content_dt").readmore({
	// 	moreLink:
	// 		'<div class="readmore_content_exists rm_down"><button>Đọc thêm <i class="fas fa-caret-down"></i></button></div>',
	// 	lessLink:
	// 		'<div class="readmore_content_exists rm_up"><button>Thu gọn <i class="fas fa-caret-up"></i></button></div>',
	// 	collapsedHeight: 700,
	// 	afterToggle: function (trigger, element, expanded) {
	// 		if (!expanded) {
	// 			// The "Close" link was clicked
	// 			$("html, body").animate(
	// 				{ scrollTop: element.offset().top },
	// 				{ duration: 100 }
	// 			);
	// 		}
	// 	},
	// });
	// $(".readmore_content_dt2").readmore({
	// 	moreLink:
	// 		'<div class="readmore_content_exists rm_down"><button>Đọc thêm <i class="fas fa-caret-down"></i></button></div>',
	// 	lessLink:
	// 		'<div class="readmore_content_exists rm_up"><button>Thu gọn <i class="fas fa-caret-up"></i></button></div>',
	// 	collapsedHeight: 500,
	// 	afterToggle: function (trigger, element, expanded) {
	// 		if (!expanded) {
	// 			// The "Close" link was clicked
	// 			$("html, body").animate(
	// 				{ scrollTop: element.offset().top },
	// 				{ duration: 100 }
	// 			);
	// 		}
	// 	},
	// });
})(jQuery, window);
