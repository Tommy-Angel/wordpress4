(function ($, root, undefined) {
	"use strict";

	$('.tm-fonts__item-view').click(function () {
		var $this = $(this);
		var $wrap = $this.closest('.tm-fonts__item').find('.tm-fonts__wrap');
		$wrap.slideToggle(500, function () {
			$this.toggleClass('dashicons-arrow-down-alt2').toggleClass('dashicons-arrow-up-alt2');
		});
	});

	$('.js-tm-fonts-font').click(function (e) {
		e.stopPropagation();
		e.preventDefault();
		$(this).closest('.tm-fonts__item').find('.tm-fonts__item-view').trigger('click');
	});

	$('.tm-fonts__expand-all').click(function () {
		$('.tm-fonts__item-view.dashicons-arrow-down-alt2').trigger('click');
	});

	$('.tm-fonts__collapse-all').click(function () {
		$('.tm-fonts__item-view.dashicons-arrow-up-alt2').trigger('click');
	});

	$('.js-tm-fonts-icon').click(function (e) {
		var $this = $(this);
		e.stopPropagation();
		e.preventDefault();
		$('.tm-fonts__code').html($this.data('class'));
		$('.tm-fonts__popup-img').attr('class', 'tm-fonts__popup-img').addClass($this.data('class'));
		$('.tm-fonts__popup').addClass('tm-fonts__popup--active');
	});

	$('.tm-fonts__popup-close').click(function () {
		$('.tm-fonts__popup--active').removeClass('tm-fonts__popup--active');
	});

})(jQuery, this);