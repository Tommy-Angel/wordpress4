(function ($) {

    'use strict';

    $(window).on('elementor/frontend/init', function () {
        elementorFrontend.hooks.addAction('frontend/element_ready/tm-blog.default', function ($scope) {
            const newsSlider = new Swiper('.js-news-slider .swiper', {
                slidesPerView: 1,
                spaceBetween: 10,
                loop: true,
                watchOverflow: true,
                observeParents: true,
                observeSlideChildren: true,
                observer: true,
                speed: 800,
                pagination: {
                    el: '.js-news-slider .swiper-pagination',
                    type: 'bullets',
                    clickable: true
                },
                breakpoints: {
                    639: {
                        loop: false,
                        slidesPerView: 2,
                        spaceBetween: 15
                    },
                    959: {
                        slidesPerView: 3,
                        spaceBetween: 15
                    }
                }
            });

            const recommendSlider = new Swiper('.js-recommend .swiper', {
                slidesPerView: 1,
                spaceBetween: 40,
                loop: true,
                watchOverflow: true,
                observeParents: true,
                observeSlideChildren: true,
                observer: true,
                speed: 800,

                navigation: {
                    nextEl: '.js-recommend .swiper-button-next',
                    prevEl: '.js-recommend .swiper-button-prev'
                },
                pagination: {
                    el: '.js-recommend .swiper-pagination',
                    type: 'bullets',
                    // 'bullets', 'fraction', 'progressbar'
                    clickable: true
                }
            });

            const trendingSlider = new Swiper('.js-trending .swiper', {
                slidesPerView: 1,
                spaceBetween: 40,
                loop: true,
                watchOverflow: true,
                observeParents: true,
                observeSlideChildren: true,
                observer: true,
                speed: 800,
                autoplay: {
                    delay: 5000
                },
                navigation: {
                    nextEl: '.js-trending .swiper-button-next',
                    prevEl: '.js-trending .swiper-button-prev'
                },
                pagination: {
                    el: '.js-trending .swiper-pagination',
                    type: 'bullets',
                    // 'bullets', 'fraction', 'progressbar'
                    clickable: true
                }
            });

            const popularSlider = new Swiper('.js-popular .swiper', {
                slidesPerView: 1,
                spaceBetween: 25,
                loop: true,
                watchOverflow: true,
                observeParents: true,
                observeSlideChildren: true,
                observer: true,
                speed: 800,
                autoplay: {
                    delay: 5000
                },
                navigation: {
                    nextEl: '.js-popular .swiper-button-next',
                    prevEl: '.js-popular .swiper-button-prev'
                },
                pagination: {
                    el: '.js-popular .swiper-pagination',
                    type: 'bullets',
                    // 'bullets', 'fraction', 'progressbar'
                    clickable: true
                },
                breakpoints: {
                    575: {
                        slidesPerView: 1,
                        spaceBetween: 25
                    },
                    1199: {
                        slidesPerView: 2,
                        spaceBetween: 25
                    },
                    1599: {
                        slidesPerView: 4,
                        spaceBetween: 25
                    }
                }
            });

            const popularSlider2 = new Swiper('.js-popular2 .swiper', {
                slidesPerView: 1,
                spaceBetween: 25,
                loop: true,
                watchOverflow: true,
                observeParents: true,
                observeSlideChildren: true,
                observer: true,
                speed: 800,
                autoplay: {
                    delay: 5000
                },
                navigation: {
                    nextEl: '.js-popular2 .swiper-button-next',
                    prevEl: '.js-popular2 .swiper-button-prev'
                },
                pagination: {
                    el: '.js-popular2 .swiper-pagination',
                    type: 'bullets',
                    // 'bullets', 'fraction', 'progressbar'
                    clickable: true
                },
                breakpoints: {
                    575: {
                        slidesPerView: 1,
                        spaceBetween: 25
                    },
                    1199: {
                        slidesPerView: 2,
                        spaceBetween: 25
                    },
                    1599: {
                        slidesPerView: 3,
                        spaceBetween: 25
                    }
                }
            });

            const popularStore = new Swiper('.js-store .swiper', {
                slidesPerView: 1,
                spaceBetween: 25,
                loop: true,
                watchOverflow: true,
                observeParents: true,
                observeSlideChildren: true,
                observer: true,
                speed: 800,
                autoplay: {
                    delay: 5000
                },
                navigation: {
                    nextEl: '.js-store .swiper-button-next',
                    prevEl: '.js-store .swiper-button-prev'
                },
                pagination: {
                    el: '.js-store .swiper-pagination',
                    type: 'bullets',
                    // 'bullets', 'fraction', 'progressbar'
                    clickable: true
                },
                breakpoints: {
                    575: {
                        slidesPerView: 1,
                        spaceBetween: 25
                    },
                    1199: {
                        slidesPerView: 4,
                        spaceBetween: 25
                    },
                    1599: {
                        slidesPerView: 5,
                        spaceBetween: 25
                    }
                }
            });
        });
    });

})(jQuery);


