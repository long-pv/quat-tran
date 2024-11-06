(function ($, window) {
	let isMenuOpen = false;
	let isFilterOpen = false;

	// Open and close the mobile menu
	$(".header .header__toggleItem").on("click", function () {
		isMenuOpen = !isMenuOpen;
		menu_open_sp();
	});

	$(".mainBodyContent").on("click", function () {
		if ($(this).hasClass("menu__openSp") && isMenuOpen) {
			isMenuOpen = false;
			menu_open_sp();
		} else if ($(this).hasClass("menu__openSp") && isFilterOpen) {
			isFilterOpen = false;
			fiter_open_sp();
		}
	});

	function menu_open_sp() {
		$("body").toggleClass("mobile-menu-open", isMenuOpen);
		$(".header__menusp").toggleClass("active", isMenuOpen);
		$(".header__toggleItem").toggle();
		$(".mainBodyContent").toggleClass("menu__openSp", isMenuOpen);
	}

	// Open and close the filter
	$(".filter_mobile").on("click", function (e) {
		e.stopPropagation();
		return;
	});

	$(".filter-pro").on("click", function (e) {
		e.stopPropagation();
		isFilterOpen = !isFilterOpen;
		fiter_open_sp();
	});

	function fiter_open_sp() {
		$("body").toggleClass("mobile-menu-open", isFilterOpen);
		$(".filter_mobile").toggleClass("active", isFilterOpen);
		$(".mainBodyContent").toggleClass("menu__openSp", isFilterOpen);
	}

	// wpadminbar
	if ($("#wpadminbar").length > 0) {
		$(".header").css("margin-top", $("#wpadminbar").outerHeight(true));
	}

	// Back to top
	var backTop = $("#back-top");

	function handleBackTop() {
		if ($(window).width() >= 768) {
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
		} else {
			backTop.hide();
		}
	}

	handleBackTop();

	$(window).resize(function () {
		backTop.off("click");
		$(window).off("scroll");
		handleBackTop();
	});

	$(".floating_mobile_top").click(function () {
		$("html, body").animate({ scrollTop: 0 }, "slow");
		return false;
	});

	$(".product-gallery, .product-thumbnails, .sectionBanner__slider, .featured_projects, .product_list_slider").on("init", function (event, slick) {
		$(this).css("visibility", "visible");
	});

	// Banner
	$(".sectionBanner__slider").slick({
		dots: true,
		arrows: true,
		autoplay: true,
		autoplaySpeed: 5000,
	});

	//
	$(".featured_projects").slick({
		slidesToShow: 4,
		slidesToScroll: 2,
		autoplay: false,
		autoplaySpeed: 5000,
		arrows: true,

		responsive: [
			{
				breakpoint: 1200,
				settings: {
					slidesToShow: 2,
					slidesToScroll: 1,
				},
			},
			{
				breakpoint: 768,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 1,
				},
			},
		],
	});

	$(".product_list_slider").slick({
		slidesToShow: 4,
		slidesToScroll: 2,
		autoplay: false,
		autoplaySpeed: 5000,
		arrows: true,

		responsive: [
			{
				breakpoint: 1200,
				settings: {
					slidesToShow: 2,
					slidesToScroll: 1,
				},
			},
			{
				breakpoint: 768,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 1,
				},
			},
		],
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

	$(".readmore_content").readmore({
		moreLink: '<div class="readmore_content_exists rm_down"><button>Đọc thêm</button></div>',
		lessLink: '<div class="readmore_content_exists rm_up"><button>Thu gọn</button></div>',
		collapsedHeight: 150,
		afterToggle: function (trigger, element, expanded) {
			if (!expanded) {
				$("html, body").animate({ scrollTop: element.offset().top }, { duration: 100 });
			}
		},
	});

	$(".readmore_eidtor_content").readmore({
		moreLink: '<div class="readmore_content_exists rm_down"><button>Đọc thêm</button></div>',
		lessLink: '<div class="readmore_content_exists rm_up"><button>Thu gọn</button></div>',
		collapsedHeight: 700,
		afterToggle: function (trigger, element, expanded) {
			if (!expanded) {
				$("html, body").animate({ scrollTop: element.offset().top }, { duration: 100 });
			}
		},
	});

	$(".product-gallery").slick({
		slidesToShow: 1,
		slidesToScroll: 1,
		arrows: true,
		dots: false,
		infinite: true,
		asNavFor: ".product-thumbnails",
	});

	$(".product-thumbnails").slick({
		slidesToShow: 5,
		slidesToScroll: 1,
		asNavFor: ".product-gallery",
		focusOnSelect: true,
		arrows: false,
		dots: false,
	});

	$(".menu-item-has-children > .dropdown-arrow").click(function (e) {
		e.preventDefault();
		var $submenu = $(this).siblings(".sub-menu");

		if ($submenu.length) {
			$submenu.stop(true, true).slideToggle();
			$(this).parent().toggleClass("open");
			$(".sub-menu").not($submenu).slideUp();
			$(".menu-item-has-children").not($(this).parent()).removeClass("open");
		}
	});
})(jQuery, window);
