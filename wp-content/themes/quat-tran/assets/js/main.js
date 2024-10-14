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
		adaptiveHeight: true,
		responsive: [
			{
				breakpoint: 992,
				settings: {
					dots: false,
					arrows: false,
				},
			},
		],
	});

	//

	$(".product-slider").slick({
		slidesToShow: 4,
		slidesToScroll: 1,
		autoplay: true,
		autoplaySpeed: 2000,
	});
})(jQuery, window);
