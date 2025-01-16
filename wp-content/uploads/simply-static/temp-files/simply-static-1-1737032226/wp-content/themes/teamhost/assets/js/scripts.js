jQuery.noConflict()(function ($) {

    var dark_dark = getCookie('dark');
    if(dark_dark === 'enable'){
        $('body').addClass('dark-theme');
    } else {
        if($('#dark_default').val() !== 'dark'){
            $('body').removeClass('dark-theme');
        }
    }

    if( $('#toggle').length > 0) {
        $('#toggle').click(function (e) {
            if($('body').hasClass('dark-theme')){
                $('body').addClass('dark-theme');
                setCookie('dark', 'enable');
            } else {
                $('body').removeClass('dark-theme');
                setCookie('dark', 'disable');
            }
        })
    }

    function setCookie(key, value) {
        var expires = new Date();
        expires.setTime(expires.getTime() + (24 * 60 * 60 * 1000));
        document.cookie = key + '=' + value + '; expires=' + expires.toUTCString() + '; path=/';
    }


    function getCookie(key) {
        var dark_dar;
        var keyValue = document.cookie.split("; ");
        delete keyValue[0];
        keyValue.forEach(function callback(elem, index) {
            elem = elem.split("=");
            if(elem[0] === key){
                dark_dar = elem[1];
            }
        });
        return dark_dar;
    }


    "use strict";
    var $window = window,
        offset = '90%',
        $doc = $(document),
        self = this,
        $body = $('body'),
        TweenMax = window.TweenMax,
        fl_theme = window.fl_theme || {};
    fl_theme.window = $(window);
    fl_theme.document = $(document);
    window.fl_theme = fl_theme;
    fl_theme.window = $(window);
    fl_theme.sameOrigin = true;

    const mediaHeader = window.matchMedia('(max-width: 959px)');

    function handleHeader(e) {
        if (e.matches) {
            $('.menu-btn').removeClass('is-active');
            $('.sidebar').removeClass('is-show');
            $(document).on('click', '.menu-btn', function () {
                $('body').toggleClass('no-scroll');
            });
        } else {
            $('.menu-btn').addClass('is-active');
            $('.sidebar').addClass('is-show');
            $('body').removeClass('no-scroll');
        }
    }


    mediaHeader.addListener(handleHeader);
    handleHeader(mediaHeader);




    $(".youzify-search-landing-image-container,.youzify-header-cover ").append('<span class="decore-lt"></span><span class="decore-rt"></span><span class="decore-rb"></span><span class="decore-lb"></span>');



    $(".sidebar-hider .icon-arrow-left").click(function () {
        $(".sidebar").removeClass("is-show");
        $(".sidebar").addClass("is-hide");
        $(document).on('click', '.menu-btn', function () {
            $('body').toggleClass('no-scroll');
        });
    });


    $(".sidebar-hider .icon-arrow-right").click(function () {
        $(".sidebar").removeClass("is-hide");
        $(".sidebar").addClass("is-show");
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
        autoplay: {
            delay: 5000
        },
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


    if($('.js-popular .swiper .swiper-wrapper .swiper-slide').length > 0){
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
                    slidesPerView: 2,
                    spaceBetween: 25
                },
                1199: {
                    slidesPerView: 3,
                    spaceBetween: 25
                },
                1599: {
                    slidesPerView: 4,
                    spaceBetween: 25
                }
            }
        });

    }

    if($('.js-popular2 .swiper .swiper-wrapper .swiper-slide').length > 0){
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
                    slidesPerView: 2,
                    spaceBetween: 25
                },
                1199: {
                    slidesPerView: 3,
                    spaceBetween: 25
                },
                1599: {
                    slidesPerView: 3,
                    spaceBetween: 25
                }
            }
        });

    }

    if($('.js-store .swiper .swiper-wrapper .swiper-slide').length > 0) {
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

    }


    const gallerySmall = new Swiper('.js-gallery-small .swiper', {
        slidesPerView: 1,
        spaceBetween: 20,
        loop: true,
        watchOverflow: true,
        observeParents: true,
        observeSlideChildren: true,
        observer: true,
        speed: 800,
        breakpoints: {
            575: {
                slidesPerView: 2,
                spaceBetween: 20
            },
            767: {
                slidesPerView: 3,
                spaceBetween: 20
            },
            1599: {
                slidesPerView: 4,
                spaceBetween: 20
            }
        }
    });

    const galleryBig = new Swiper('.js-gallery-big .swiper', {
        slidesPerView: 1,
        spaceBetween: 20,
        loop: true,
        watchOverflow: true,
        observeParents: true,
        observeSlideChildren: true,
        observer: true,
        speed: 800,
        thumbs: {
            swiper: gallerySmall
        }
    });


    $(function () {
        $('#dl-menu').dlmenu();
    });
    fl_theme.mobile_menu_init = function () {

        $('.page-main.nav_style_two .sidebar-box .uk-nav .widget_nav_menu ul.menu li.nav-item.has-submenu').append("<span class='open_submenu'><i class='fa fa-angle-right' aria-hidden='true'></i></span>");

        $('.page-main.nav_style_two .sidebar-box .uk-nav .widget_nav_menu ul.menu .sub-menu').prepend('<li class="close_submenu dl-back"><a href="#">Back</a></li>');


        $('.page-main.nav_style_two .sidebar-box .uk-nav .widget_nav_menu ul.menu .open_submenu').click(function (e) {
            $(this).parents('.has-submenu').addClass('submenu_open');
        });

        $('.close_submenu').click(function (e) {
            $(this).parents('.has-submenu').removeClass('submenu_open');
        });


        // global
        var Modernizr = window.Modernizr,
            $body = $('body');

        $.DLMenu = function (options, element) {
            this.$el = $(element);
            this._init(options);
        };

        // the options
        $.DLMenu.defaults = {
            // classes for the animation effects
            animationClasses: {
                classin: 'dl-animate-in-1',
                classout: 'dl-animate-out-1'
            },
            // callback: click a link that has a sub menu
            // el is the link element (li); name is the level name
            onLevelClick: function (el, name) {
                return false;
            },
            // callback: click a link that does not have a sub menu
            // el is the link element (li); ev is the event obj
            onLinkClick: function (el, ev) {
                return false;
            },
            backLabel: 'Back',
            // Change to "true" to use the active item as back link label.
            useActiveItemAsBackLabel: false,
            // Change to "true" to add a navigable link to the active item to its child
            // menu.
            useActiveItemAsLink: false,
            // On close reset the menu to root
            resetOnClose: true
        };

        $.DLMenu.prototype = {
            _init: function (options) {

                // options
                this.options = $.extend(true, {}, $.DLMenu.defaults, options);
                // cache some elements and initialize some variables
                this._config();

                var animEndEventNames = {
                        'WebkitAnimation': 'webkitAnimationEnd',
                        'OAnimation': 'oAnimationEnd',
                        'msAnimation': 'MSAnimationEnd',
                        'animation': 'animationend'
                    },
                    transEndEventNames = {
                        'WebkitTransition': 'webkitTransitionEnd',
                        'MozTransition': 'transitionend',
                        'OTransition': 'oTransitionEnd',
                        'msTransition': 'MSTransitionEnd',
                        'transition': 'transitionend'
                    };
                // animation end event name
                this.animEndEventName = animEndEventNames[Modernizr.prefixed('animation')] + '.dlmenu';
                // transition end event name
                this.transEndEventName = transEndEventNames[Modernizr.prefixed('transition')] + '.dlmenu';
                // support for css animations and css transitions
                this.supportAnimations = Modernizr.cssanimations;
                this.supportTransitions = Modernizr.csstransitions;

                this._initEvents();

            },
            _config: function () {
                this.open = false;
                this.$trigger = this.$el.children('.dl-trigger');
                this.$menu = this.$el.children('ul.menu');
                this.$menuitems = this.$menu.find('li:not(.dl-back)');
                this.$el.find('ul.sub-menu').prepend('<li class="dl-back"><a href="#">' + this.options.backLabel + '</a></li>');
                this.$back = this.$menu.find('li.dl-back');

                // Set the label text for the back link.
                if (this.options.useActiveItemAsBackLabel) {
                    this.$back.each(function () {
                        var $this = $(this),
                            parentLabel = $this.parents('li:first').find('a:first').text();

                        $this.find('a').html(parentLabel);
                    });
                }
                // If the active item should also be a clickable link, create one and put
                // it at the top of our menu.
                if (this.options.useActiveItemAsLink) {
                    this.$el.find('ul.sub-menu').prepend(function () {
                        var parentli = $(this).parents('li:not(.dl-back):first').find('a:first');
                        return '<li class="dl-parent"><a href="' + parentli.attr('href') + '">' + parentli.text() + '</a></li>';
                    });
                }

            },
            _initEvents: function () {

                var self = this;

                this.$trigger.on('click.dlmenu', function () {
                    if (self.open) {
                        self._closeMenu();
                    } else {
                        self._openMenu();
                        // clicking somewhere else makes the menu close
                        $body.off('click').children().on('click.dlmenu', function () {
                            self._closeMenu();
                        });

                    }
                    return false;
                });

                this.$menuitems.on('click.dlmenu', function (event) {

                    event.stopPropagation();

                    var $item = $(this),
                        $submenu = $item.children('ul.sub-menu');

                    // Only go to the next menu level if one exists AND the link isn't the
                    // one we added specifically for navigating to parent item pages.
                    if (($submenu.length > 0) && !($(event.currentTarget).hasClass('dl-subviewopen'))) {

                        var $flyin = $submenu.clone().css('opacity', 0).insertAfter(self.$menu),
                            onAnimationEndFn = function () {
                                self.$menu.off(self.animEndEventName).removeClass(self.options.animationClasses.classout).addClass('dl-subview');
                                $item.addClass('dl-subviewopen').parents('.dl-subviewopen:first').removeClass('dl-subviewopen').addClass('dl-subview');
                                $flyin.remove();
                            };

                        setTimeout(function () {
                            $flyin.addClass(self.options.animationClasses.classin);
                            self.$menu.addClass(self.options.animationClasses.classout);
                            if (self.supportAnimations) {
                                self.$menu.on(self.animEndEventName, onAnimationEndFn);
                            } else {
                                onAnimationEndFn.call();
                            }

                            self.options.onLevelClick($item, $item.children('a:first').text());
                        });

                        return false;

                    } else {
                        self.options.onLinkClick($item, event);
                    }

                });

                this.$back.on('click.dlmenu', function (event) {

                    var $this = $(this),
                        $submenu = $this.parents('ul.sub-menu:first'),
                        $item = $submenu.parent(),

                        $flyin = $submenu.clone().insertAfter(self.$menu);

                    var onAnimationEndFn = function () {
                        self.$menu.off(self.animEndEventName).removeClass(self.options.animationClasses.classin);
                        $flyin.remove();
                    };

                    setTimeout(function () {
                        $flyin.addClass(self.options.animationClasses.classout);
                        self.$menu.addClass(self.options.animationClasses.classin);
                        if (self.supportAnimations) {
                            self.$menu.on(self.animEndEventName, onAnimationEndFn);
                        } else {
                            onAnimationEndFn.call();
                        }

                        $item.removeClass('dl-subviewopen');

                        var $subview = $this.parents('.dl-subview:first');
                        if ($subview.is('li')) {
                            $subview.addClass('dl-subviewopen');
                        }
                        $subview.removeClass('dl-subview');
                    });

                    return false;

                });

            },
            closeMenu: function () {
                if (this.open) {
                    this._closeMenu();
                }
            },
            _closeMenu: function () {
                var self = this,
                    onTransitionEndFn = function () {
                        self.$menu.off(self.transEndEventName);
                        if (self.options.resetOnClose) {
                            self._resetMenu();
                        }
                    };

                this.$menu.removeClass('dl-menuopen');
                this.$menu.addClass('dl-menu-toggle');
                this.$trigger.removeClass('is-active');

                if (this.supportTransitions) {
                    this.$menu.on(this.transEndEventName, onTransitionEndFn);
                } else {
                    onTransitionEndFn.call();
                }

                this.open = false;
            },
            openMenu: function () {
                if (!this.open) {
                    this._openMenu();
                }
            },
            _openMenu: function () {
                var self = this;
                // clicking somewhere else makes the menu close
                $body.off('click').on('click.dlmenu', function () {
                    self._closeMenu();
                });
                this.$menu.addClass('dl-menuopen dl-menu-toggle').on(this.transEndEventName, function () {
                    $(this).removeClass('dl-menu-toggle');
                });
                this.$trigger.addClass('is-active');
                this.open = true;
            },
            // resets the menu to its original state (first level of options)
            _resetMenu: function () {
                this.$menu.removeClass('dl-subview');
                this.$menuitems.removeClass('dl-subview dl-subviewopen');
            }
        };

        var logError = function (message) {
            if (window.console) {
                window.console.error(message);
            }
        };

        $.fn.dlmenu = function (options) {
            if (typeof options === 'string') {
                var args = Array.prototype.slice.call(arguments, 1);
                this.each(function () {
                    var instance = $.data(this, 'dlmenu');
                    if (!instance) {
                        logError("cannot call methods on dlmenu prior to initialization; " +
                            "attempted to call method '" + options + "'");
                        return;
                    }
                    if (!$.isFunction(instance[options]) || options.charAt(0) === "_") {
                        logError("no such method '" + options + "' for dlmenu instance");
                        return;
                    }
                    instance[options].apply(instance, args);
                });
            } else {
                this.each(function () {
                    var instance = $.data(this, 'dlmenu');
                    if (instance) {
                        instance._init();
                    } else {
                        instance = $.data(this, 'dlmenu', new $.DLMenu(options, this));
                    }
                });
            }
            return this;
        };
    };

    fl_theme.voice_speech_init = function () {
        //Voice Search
        /* setup vars for our trigger, form, text input and result elements */
        var $voiceTrigger = $("#voice-trigger");
        var $searchForm = $("#search-global-form");
        var $searchInput = $("#search-field");
        var $result = $("#result");


        /*  set Web Speech API for Chrome or Firefox */
        window.SpeechRecognition = window.SpeechRecognition || window.webkitSpeechRecognition;

        /* Check if browser support Web Speech API, remove the voice trigger if not supported */
        if (window.SpeechRecognition) {

            /* setup Speech Recognition */
            var recognition = new SpeechRecognition();
            recognition.interimResults = true;
            recognition.lang = 'en-EN';
            recognition.addEventListener('result', _transcriptHandler);
            recognition.onerror = function (event) {
                console.log(event.error);

                /* Revert input and icon CSS if no speech is detected */
                if (event.error == 'no-speech') {
                    $voiceTrigger.removeClass('active');
                    $searchInput.attr("placeholder", "Search...");
                }
            }
        } else {
            $voiceTrigger.remove();
        }

        jQuery(document).ready(function () {

            /* Trigger listen event when our trigger is clicked */
            $voiceTrigger.on('click touch', listenStart);
        });

        /* Our listen event */
        function listenStart(e) {
            e.preventDefault();
            /* Update input and icon CSS to show that the browser is listening */
            $searchInput.attr("placeholder", "Speek...");
            $voiceTrigger.addClass('active');
            /* Start voice recognition */
            recognition.start();
        }

        /* Parse voice input */
        function _parseTranscript(e) {
            return Array.from(e.results).map(function (result) {
                return result[0]
            }).map(function (result) {
                return result.transcript
            }).join('')
        }

        /* Convert our voice input into text and submit the form */
        function _transcriptHandler(e) {
            var speechOutput = _parseTranscript(e)
            $("#search-field").val(speechOutput);
            $result.html(speechOutput);
            if (e.results[0].isFinal) {
                $searchForm.submit();
            }
        }
    };

    $('.js-select').niceSelect();
    $('form.woocommerce-ordering .orderby').niceSelect();
    $('.dropdown_product_cat').niceSelect();
    $('.woocommerce-widget-layered-nav-dropdown').niceSelect();
    $('.wpfMainWrapper .wpfFilterWrapper select').niceSelect();



    // Open Close Mobile Navigation
    fl_theme.initMobileWidgetNavigationOpenClose = function () {
        var $navbar_wrapper = $('.fl-hamburger-sidebar-wrapper'),
            $navbar_menu_sidebar = $('.fl--hamburger-sidebar-navigation-wrapper'),
            $hamburgerbars = $('.fl--hamburger-sidebar'),
            $social_profiles = $('.fl-hamburger-sidebar-wrapper ul.fl-sidebar-social-profiles li a'),
            OpenNavBar = void 0;

        self.fullscreenNavbarIsOpened = function () {
            return OpenNavBar;
        };

        self.toogleOpenCloseMobileMenu = function () {
            self[OpenNavBar ? 'closeFullscreenNavbar' : 'openFullscreenNavbar']();
        };
        self.openFullscreenNavbar = function () {
            if (OpenNavBar || !$navbar_wrapper.length) {
                return;
            }
            OpenNavBar = 1;

            var $navbarMenuItems = $navbar_wrapper.find('.fl--mobile-menu >li >a,.fl--mobile-menu li.opened .sub-menu >li >a');
            if (!$navbar_wrapper.find('.fl--mobile-menu >li.opened').length) {
                $navbarMenuItems = $navbar_wrapper.find('.fl--mobile-menu >li >a');
            }

            $hamburgerbars.addClass('opened');
            $hamburgerbars.removeClass('closed');

            // NavBarMenu Items Animation
            TweenMax.set($navbarMenuItems, {
                opacity: 0,
                x: '-20%',
                force3D: true
            });

            TweenMax.staggerTo($navbarMenuItems, 0.2, {
                opacity: 1,
                x: '0%',
                delay: 0.4
            }, 0.04);

            // Social Profiles Animation
            TweenMax.set($social_profiles, {
                opacity: 0,
                y: '-100%',
                force3D: true
            });

            TweenMax.staggerTo($social_profiles, 0.2, {
                opacity: 1,
                y: '0%',
                delay: 0.6
            }, 0.04);

            // NavBarMenu wrapper Animation
            TweenMax.set($navbar_wrapper, {
                display: 'none',
                force3D: true
            });

            TweenMax.to($navbar_wrapper, 0.4, {
                opacity: 1,
                display: 'block'
            }, 0.04);

            // NavBarMenu menu sidebar Animation
            TweenMax.set($navbar_menu_sidebar, {
                opacity: 0,
                x: '-100%',
                force3D: true
            });

            TweenMax.to($navbar_menu_sidebar, 0.4, {
                opacity: 1,
                x: '0%',
                display: 'flex'
            }, 0.04);

            $navbar_wrapper.addClass('open');

        };

        self.closeFullscreenNavbar = function (dontTouchBody) {
            if (!OpenNavBar || !$navbar_wrapper.length) {
                return;
            }
            OpenNavBar = 0;


            // disactive all togglers
            $hamburgerbars.removeClass('opened');
            $hamburgerbars.addClass('closed');


            var $navbarMenuItems = $navbar_wrapper.find('.fl--mobile-menu >li >a');


            // set top position and animate
            TweenMax.to($navbar_wrapper, 0.4, {
                force3D: true,
                opacity: 0,
                display: 'none',
                delay: 0.1
            });

            TweenMax.to($navbar_menu_sidebar, 0.2, {
                opacity: 0,
                x: '-100%',
                force3D: true,
                delay: 0.3
            }, 0.1);

            TweenMax.to($navbarMenuItems, 0.2, {
                opacity: 0,
                x: '-20%',
                delay: 0.2
            }, 0.1);



            // open navbar block
            $navbar_wrapper.removeClass('open');

        };

        $doc.on('click', '.fl--hamburger-menu-wrapper, .fl--hamburger-sidebar-icon, .fl--hamburger-sidebar', function (e) {
            self.toogleOpenCloseMobileMenu();
            e.preventDefault();
        });
    };

    //End teamhots html code



    const heroSlider = new Swiper('.js-hero-slider .swiper', {
        slidesPerView: 1,
        spaceBetween: 0,
        loop: true,
        watchOverflow: true,
        observeParents: true,
        observeSlideChildren: true,
        observer: true,
        speed: 800,
        autoplay: {
            delay: 5000
        },
        pagination: {
            el: '.js-hero-slider .swiper-pagination',
            type: 'fraction',
            // 'bullets', 'fraction', 'progressbar'
            clickable: true
        }
    });

    const solutionSlider = new Swiper('.js-solution-slider .swiper', {
        slidesPerView: 1,
        spaceBetween: 10,
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
            nextEl: '.js-solution-slider .swiper-button-next',
            prevEl: '.js-solution-slider .swiper-button-prev'
        },
        breakpoints: {
            639: {
                slidesPerView: 2,
                spaceBetween: 15
            },
            959: {
                slidesPerView: 3,
                spaceBetween: 15
            }
        }
    });

    const reviewsSlider = new Swiper('.js-reviews-slider .swiper', {
        slidesPerView: 1,
        spaceBetween: 10,
        loop: true,
        watchOverflow: true,
        observeParents: true,
        observeSlideChildren: true,
        observer: true,
        speed: 800,
        autoplay: {
            delay: 5000
        },
        pagination: {
            el: '.js-reviews-slider .swiper-pagination',
            type: 'bullets',
            // 'bullets', 'fraction', 'progressbar'
            clickable: true
        },
        breakpoints: {
            639: {
                slidesPerView: 2,
                spaceBetween: 15
            },
            959: {
                slidesPerView: 3,
                spaceBetween: 15
            }
        }
    });

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
            // 'bullets', 'fraction', 'progressbar'
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

    const teamSlider = new Swiper('.js-team-slider .swiper', {
        slidesPerView: 1,
        spaceBetween: 10,
        loop: true,
        watchOverflow: true,
        observeParents: true,
        observeSlideChildren: true,
        observer: true,
        speed: 800,
        pagination: {
            el: '.js-team-slider .swiper-pagination',
            type: 'bullets',
            // 'bullets', 'fraction', 'progressbar'
            clickable: true
        },
        breakpoints: {
            639: {
                loop: false,
                slidesPerView: 2,
                spaceBetween: 15
            },
            959: {
                slidesPerView: 4,
                spaceBetween: 15
            }
        }
    });


    if (($("a.tm_login_btn").length > 0)) {
        new VenoBox({
            selector: 'a.tm_login_btn',
            navigation: false,
            bgcolor: '#fff',
            overlayColor: '#fff'
        });
    }

    // Stiky Sidebar
    fl_theme.initStikySidebar = function () {
        var sidebar_stiky = $('.sidebar-sticky');
        if (sidebar_stiky.length) {
            sidebar_stiky.theiaStickySidebar({
                additionalMarginTop: 76,
                additionalMarginBottom: 76,
            });
        }
    };


    // Resize iframe video
    fl_theme.initResponsiveIframe = function () {
        var resizeitem = $('iframe');
        resizeitem.height(
            resizeitem.attr("height") / resizeitem.attr("width") * resizeitem.width()
        );
    };

    //Image Popups
    fl_theme.initImagePopup = function () {
        $('.fl-gallery-image-popup').magnificPopup({
            delegate: 'a',
            type: 'image',
            removalDelay: 500,
            image: {
                markup: '<div class="mfp-figure">' +
                    '<div class="mfp-img"></div>' +
                    '<div class="mfp-bottom-bar">' +
                    '<div class="mfp-title"></div>' +
                    '</div>' +
                    '</div>' +
                    '<div class="mfp-close"></div>' +
                    '<div class="mfp-counter"></div>'
            },
            callbacks: {
                beforeOpen: function () {
                    this.st.image.markup = this.st.image.markup.replace('mfp-figure', 'mfp-figure mfp-with-anim');
                    this.st.mainClass = 'fl-zoom-in-popup-animation';
                }
            },
            closeOnContentClick: true,
            midClick: true,
            gallery: {
                enabled: true,
                arrowMarkup: '<button title="%title%" type="button" class="mfp-arrow mfp-arrow-%dir%">' +
                    '<svg viewBox="0 0 40 40">' +
                    '<path d="M10,20 L30,20 M22,12 L30,20 L22,28"></path>' +
                    '</svg>' +
                    '</button>', // markup of an arrow button

                tPrev: 'Previous', // title for left button
                tNext: 'Next', // title for right button

                tCounter: '<span class="mfp-counter">%curr% of %total%</span>' // markup of counter
            }
        });
    };
    // Gallery Popups
    fl_theme.initGalleryPopup = function () {
        $('.fl-magic-popup').each(function () {
            var popup_gallery_custom_class = $(this).attr('data-custom-class'),
                gallery_enable = true,
                popup_type = 'image';
            if ($(this).hasClass('fl-single-popup')) {
                gallery_enable = false;
                popup_gallery_custom_class = 'fl-single-popup';
            } else if ($(this).hasClass('fl-video-popup')) {
                popup_type = 'iframe';
                gallery_enable = false;
                popup_gallery_custom_class = 'fl-video-popup';
            }

            $("." + popup_gallery_custom_class).magnificPopup({
                delegate: 'a',
                type: popup_type,
                gallery: {
                    enabled: gallery_enable,
                    tPrev: 'Previous',
                    tNext: 'Next',
                    tCounter: '<span class="mfp-counter">%curr% / %total%</span>' // markup of counter
                },
                image: {
                    markup: '<div class="mfp-figure">' +
                        '<div class="mfp-img"></div>' +
                        '</div>' +
                        '<div class="mfp-close"></div>' +
                        '<div class="mfp-bottom-bar">' +
                        '<div class="mfp-title"></div>' +
                        '<div class="mfp-counter"></div>' +
                        '</div>'
                },
                iframe: {
                    markup: '<div class="mfp-iframe-scaler">' +
                        '<iframe class="mfp-iframe" frameborder="0" allowfullscreen></iframe>' +
                        '</div>' +
                        '<div class="mfp-close"></div>'
                },
                mainClass: 'mfp-zoom-in',
                removalDelay: 300,
                callbacks: {
                    open: function () {
                        $.magnificPopup.instance.next = function () {
                            var self = this;
                            self.wrap.removeClass('mfp-image-loaded');
                            setTimeout(function () {
                                $.magnificPopup.proto.next.call(self);
                            }, 120);
                        };
                        $.magnificPopup.instance.prev = function () {
                            var self = this;
                            self.wrap.removeClass('mfp-image-loaded');
                            setTimeout(function () {
                                $.magnificPopup.proto.prev.call(self);
                            }, 120);
                        }
                    },
                    imageLoadComplete: function () {
                        var self = this;
                        setTimeout(function () {
                            self.wrap.addClass('mfp-image-loaded');
                        }, 16);
                    }
                }
            });

        });
    };
    // Contact Form Pupup
    fl_theme.initContactPopup = function () {
        $('.pixba_contact_modal_btn').magnificPopup({
            type: 'inline',
            preloader: false,
            focus: '#name',
        });
    };
    // Var
    fl_theme.initCustomSelect = function () {
        var jelect = $('.jelect');
        if (jelect.length) {
            jelect.jelect();
        }
    };
    // Isotope Indicator
    fl_theme.initIsotopeCustomFunction = function () {
        var $grid = $('.fl-isotope-wrapper');
        $grid.isotope({
            itemSelector: '.fl-grid-item',
            isAnimated: true,
            percentPosition: true,
            masonry: {
                columnWidth: '.fl-grid-item'
            }
        });

        $grid.imagesLoaded().progress(function () {
            $grid.isotope('layout');
        });
    };


    //Search Form Navigatop
    fl_theme.initHeaderSearchForm = function () {
        var $SearchForm = $('.header-search-form'),
            OpenSearchForm = void 0,
            search_form = $('form.search_global'),
            $searchformicon = $('.header-search');



        self.toggleFullscreenSearchForm = function () {
            self[OpenSearchForm ? 'closeFullscreenSearchForm' : 'openFullscreenSearchForm']();
        };




        self.openFullscreenSearchForm = function () {
            if (OpenSearchForm || !$SearchForm.length) {
                return;
            }
            OpenSearchForm = 1;
            //Default
            // Search form Wrapper
            TweenMax.set($SearchForm, {
                opacity: 0,
                force3D: true
            });
            // Search form search_form
            TweenMax.set(search_form, {
                opacity: 0,
                y: '-100%',
                force3D: true
            });


            $searchformicon.addClass('opened');
            $searchformicon.removeClass('closed');

            // set top position and animate
            TweenMax.to($SearchForm, 0.4, {
                opacity: 1,
                display: 'block'
            });
            // Search form search_form
            TweenMax.to(search_form, 0.5, {
                opacity: 1,
                y: '0%',
                delay: 0.4
            });

            $SearchForm.addClass('open');
            $('body').addClass('stop-scrolling');
        };

        self.closeFullscreenSearchForm = function () {
            if (!OpenSearchForm || !$SearchForm.length) {
                return;
            }
            OpenSearchForm = 0;
            // disactive all togglers
            $searchformicon.removeClass('opened');
            $searchformicon.addClass('closed');


            // Search form search_form
            TweenMax.to(search_form, 0.4, {
                opacity: 0,
                y: '-100%'
            });

            // set top position and animate
            TweenMax.to($SearchForm, 0.4, {
                force3D: true,
                display: 'none',
                delay: 0.4
            });


            // open search form wrapper block
            $SearchForm.removeClass('open');

            $('body').removeClass('stop-scrolling');



        };

        $doc.on('click', '.header-search', function (e) {
            self.toggleFullscreenSearchForm();
            e.preventDefault();
        });

    };
    // Fixed Nav Bar
    fl_theme.initNavBarFixed = function () {

        var c, currentScrollTop = 0;
        var body = $('body'),
            nav_bar = $('.page-header'),
            nav_bar_height = nav_bar.height();

        if (nav_bar.hasClass("fixed-navbar")) {
            body.find('.header-padding').css("padding-top", nav_bar_height + "px");

            $(window).scroll(function () {
                var a = $(window).scrollTop();
                var b = nav_bar.height();
                var d = nav_bar.find('.page-header__top-line').height();
                currentScrollTop = a;
                if (nav_bar.hasClass("auto-hide-navbar")) {
                    if (c < currentScrollTop && a > b + 500) {
                        nav_bar.addClass("scrollUp");
                    } else if (c > currentScrollTop && !(a <= b)) {
                        nav_bar.removeClass("scrollUp");
                    }
                }

                if (c < currentScrollTop && a > b) {
                    nav_bar.addClass("fixed-enable");
                } else if (c > currentScrollTop && a < d) {
                    nav_bar.removeClass("fixed-enable");
                }


                c = currentScrollTop;

            });
        }
    };

    // Car slider
    fl_theme.initCarsSlider = function () {

        $('.auto-slider .slides').slick({
            dots: false,
            infinite: false,
            speed: 500,
            slidesToShow: 1,
            slidesToScroll: 1,
            draggable: true,
            focusOnSelect: true,
            nextArrow: '.fl-slider-arrow-right',
            prevArrow: '.fl-slider-arrow-left',
            asNavFor: '.auto-carousel .slides'
        });

        $('.auto-carousel .slides').slick({
            dots: false,
            infinite: false,
            draggable: true,
            speed: 500,
            slidesToShow: 5,
            slidesToScroll: 1,
            focusOnSelect: true,
            arrows: false,
            swipeToSlide: true,
            asNavFor: '.auto-slider .slides',
            responsive: [
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                }
            ]
        });

    };
    // About Us Tabs
    fl_theme.initCustomTabs = function () {
        var $tabs = $('.wrap-nav-table-content');

        $tabs.on('click', 'li', function () {
            var tab_id = $(this).attr('data-tab'),
                $tabs_content = $('.tab-content'),
                $tabs_clicked = $("#" + tab_id);
            $tabs.find('li').removeClass('active');
            $(this).addClass('active');
            $tabs_content.removeClass('active');
            $tabs_clicked.addClass('active');
        });



    };
    // Car Google Maps
    fl_theme.initCarGoogleMaps = function () {
        var car_maps = $('#contact-map'),
            lat = car_maps.attr('data-location-lat'),
            long = car_maps.attr('data-location-long');

        if (car_maps.length) {
            car_maps.gmap3({
                marker: {
                    options: {
                        position: [lat, long],
                        //icon: "'.$image_done[0].'"
                    }
                },
                map: {
                    options: {
                        center: [lat, long],
                        zoom: 11,
                        scrollwheel: false,
                        draggable: true,
                        mapTypeControl: true,
                        styles: [{
                            "featureType": "administrative",
                            "elementType": "all",
                            "stylers": [{
                                "visibility": "on"
                            }, {
                                "saturation": -100
                            }, {
                                "lightness": 20
                            }]
                        }, {
                            "featureType": "road",
                            "elementType": "all",
                            "stylers": [{
                                "visibility": "on"
                            }, {
                                "saturation": -100
                            }, {
                                "lightness": 40
                            }]
                        }, {
                            "featureType": "water",
                            "elementType": "all",
                            "stylers": [{
                                "visibility": "on"
                            }, {
                                "saturation": -10
                            }, {
                                "lightness": 30
                            }]
                        }, {
                            "featureType": "landscape.man_made",
                            "elementType": "all",
                            "stylers": [{
                                "visibility": "simplified"
                            }, {
                                "saturation": -60
                            }, {
                                "lightness": 10
                            }]
                        }, {
                            "featureType": "landscape.natural",
                            "elementType": "all",
                            "stylers": [{
                                "visibility": "simplified"
                            }, {
                                "saturation": -60
                            }, {
                                "lightness": 60
                            }]
                        }, {
                            "featureType": "poi",
                            "elementType": "all",
                            "stylers": [{
                                "visibility": "off"
                            }, {
                                "saturation": -100
                            }, {
                                "lightness": 60
                            }]
                        }, {
                            "featureType": "transit",
                            "elementType": "all",
                            "stylers": [{
                                "visibility": "off"
                            }, {
                                "saturation": -100
                            }, {
                                "lightness": 60
                            }]
                        }]
                    }
                }
            });

        }
    };
    // Change Grid Switch Car Page
    fl_theme.initGridSwitchCar = function () {
        if ($('#pixad-listing').hasClass('grid')) {
            $('.sorting__item.view-by .grid').addClass('active')
        } else {
            $('.sorting__item.view-by .list').addClass('active')
        }
    };

    fl_theme.initCustomWidgetRange = function () {
        /////////////////////////////////////////////////////////////////
        //PRICE RANGE
        /////////////////////////////////////////////////////////////////

        if ($('#slider-price').length > 0) {
            var slider = document.getElementById('slider-price');
            var min_price = document.getElementById('pix-min-price').value;
            var max_price = document.getElementById('pix-max-price').value;
            var max_slider_price = document.getElementById('pix-max-slider-price').value;

            var pix_thousand = document.getElementById('pix-thousand').value;
            var pix_decimal = document.getElementById('pix-decimal').value;
            var pix_decimal_number = document.getElementById('pix-decimal_number').value;

            //var symbol_price = document.getElementById('pix-currency-symbol').value;
            min_price = min_price == '' ? 0 : min_price;
            max_price = max_price == '' ? max_slider_price : max_price;

            noUiSlider.create(slider, {
                start: [min_price, max_price],
                step: 1000,
                connect: true,
                range: {
                    'min': 0,
                    'max': Number(max_slider_price)
                },


                format: wNumb({
                    decimals: pix_decimal_number,
                    mark: pix_decimal,
                    thousand: pix_thousand
                })

            });

            var pValues_price = [
                document.getElementById('slider-price_min'),
                document.getElementById('slider-price_max')
            ];

            slider.noUiSlider.on('update', function (values, handle) {
                pValues_price[handle].value = values[handle];
            });

            slider.noUiSlider.on('change', function (values, handle) {
                $(pValues_price[handle]).trigger('change');
            });

        }

        /////////////////////////////////////////////////////////////////
        //YEAR RANGE
        /////////////////////////////////////////////////////////////////

        if ($('#slider-year').length > 0) {
            var slider_year = document.getElementById('slider-year');
            var min_year = document.getElementById('pix-min-year').value;
            var max_year = document.getElementById('pix-max-year').value;
            var max_slider_year = document.getElementById('pix-max-slider-year').value;
            min_year = min_year == '' ? 1950 : min_year;
            max_year = max_year == '' ? max_slider_year : max_year;

            noUiSlider.create(slider_year, {
                start: [min_year, max_year],
                step: 1,
                connect: true,
                range: {
                    'min': 1950,
                    'max': Number(max_slider_year)
                },

                format: {
                    to: function (value) {
                        return value;
                    },
                    from: function (value) {
                        return value;
                    }
                }

            });

            var pValues_year = [
                document.getElementById('slider-year_min'),
                document.getElementById('slider-year_max')
            ];

            slider_year.noUiSlider.on('update', function (values, handle) {
                pValues_year[handle].value = values[handle];
            });

            slider_year.noUiSlider.on('change', function (values, handle) {
                $(pValues_year[handle]).trigger('change');
            });

        }



        /////////////////////////////////////////////////////////////////
        //   MILEAGE RANGE
        /////////////////////////////////////////////////////////////////

        if ($('#slider-mileage').length > 0) {
            var slider_mileage = document.getElementById('slider-mileage');
            var min_mileage = document.getElementById('pix-min-mileage').value;
            var max_mileage = document.getElementById('pix-max-mileage').value;
            var max_slider_mileage = document.getElementById('pix-max-slider-mileage').value;
            min_mileage = min_mileage == '' ? 0 : min_mileage;
            max_mileage = max_mileage == '' ? max_slider_mileage : max_mileage;

            noUiSlider.create(slider_mileage, {
                start: [min_mileage, max_mileage],
                step: 10000,
                connect: true,
                range: {
                    'min': 0,
                    'max': Number(max_slider_mileage)
                },

                format: {
                    to: function (value) {
                        return value;
                    },
                    from: function (value) {
                        return value;
                    }
                }

            });

            var pValues_mileage = [
                document.getElementById('slider-mileage_min'),
                document.getElementById('slider-mileage_max')
            ];

            slider_mileage.noUiSlider.on('update', function (values, handle) {
                pValues_mileage[handle].value = values[handle];
            });

            slider_mileage.noUiSlider.on('change', function (values, handle) {
                $(pValues_mileage[handle]).trigger('change');
            });

        }

        /////////////////////////////////////////////////////////////////
        //   ENGINE RANGE
        /////////////////////////////////////////////////////////////////

        if ($('#slider-engine').length > 0) {
            var slider_engine = document.getElementById('slider-engine');
            var min_engine = document.getElementById('pix-min-engine').value;
            var max_engine = document.getElementById('pix-max-engine').value;
            var max_slider_engine = document.getElementById('pix-max-slider-engine').value;
            min_engine = min_engine == '' ? 0 : min_engine;
            max_engine = max_engine == '' ? max_slider_engine : max_engine;

            noUiSlider.create(slider_engine, {
                start: [min_engine, max_engine],
                step: 0.1,
                connect: true,
                range: {
                    'min': 0,
                    'max': Number(max_slider_engine)
                },

                // Full number format support.

            });

            var pValues_engine = [
                document.getElementById('slider-engine_min'),
                document.getElementById('slider-engine_max')
            ];

            slider_engine.noUiSlider.on('update', function (values, handle) {
                pValues_engine[handle].value = values[handle];
            });

            slider_engine.noUiSlider.on('change', function (values, handle) {
                $(pValues_engine[handle]).trigger('change');
            });

        }

    };

    fl_theme.initCustomHeidthIframeSlider = function () {
        var slider_iframe = $('.transport-details .auto-slider .slides li iframe'),
            slider_iframe_parent = $('.transport-details .auto-slider .slides li').height();

        if (slider_iframe.length) {
            slider_iframe.css({
                'height': '' + slider_iframe_parent + 'px'
            });
        }



    };

    fl_theme.initCustomWidgetFunction = function () {
        /*Widgets*/
        $('.widget.widget_categories .children').parent('.cat-item').addClass('has-sub-category');
    };

    //Login Form
    fl_theme.initLoginFormOptionFunction = function () {
        var $loginForm = $('.login-form');
        var OpenLoginForm = void 0;
        var login_form = $('.fl-login_form');
        var $header_login_icon = $('.header-login');



        self.toggleLoginForm = function () {
            self[OpenLoginForm ? 'closeHeaderLoginForm' : 'openHeaderLoginForm']();
        };




        self.openHeaderLoginForm = function () {
            if (OpenLoginForm || !$loginForm.length) {
                return;
            }
            OpenLoginForm = 1;
            //Default
            // Search form Wrapper
            TweenMax.set($loginForm, {
                opacity: 0,
                force3D: true
            });
            // Search form search_form
            TweenMax.set(login_form, {
                opacity: 0,
                y: '-100%',
                force3D: true
            });


            $header_login_icon.addClass('opened');
            $header_login_icon.removeClass('closed');

            // set top position and animate
            TweenMax.to($loginForm, 0.4, {
                opacity: 1,
                display: 'block'
            });
            // Search form search_form
            TweenMax.to(login_form, 0.5, {
                opacity: 1,
                y: '0%',
                delay: 0.4
            });

            $loginForm.addClass('open');
            $('body').addClass('stop-scrolling');
        };

        self.closeHeaderLoginForm = function () {
            if (!OpenLoginForm || !$loginForm.length) {
                return;
            }
            OpenLoginForm = 0;
            // disactive all togglers
            $header_login_icon.removeClass('opened');
            $header_login_icon.addClass('closed');


            // Search form search_form
            TweenMax.to(login_form, 0.4, {
                opacity: 0,
                y: '-100%'
            });
            // set top position and animate
            TweenMax.to($loginForm, 0.4, {
                force3D: true,
                display: 'none',
                delay: 0.4
            });


            // open search form wrapper block
            $loginForm.removeClass('open');

            $('body').removeClass('stop-scrolling');



        };

        $doc.on('click', '.header-login .fl-flipper-icon', function (e) {
            self.toggleLoginForm();
            e.preventDefault();
        });

    };

    // Open Close Mobile Navigation
    fl_theme.initMobileNavigationOpenClose = function () {
        var $navbar_wrapper = $('.fl-mobile-menu-wrapper'),
            $navbar_menu_sidebar = $('.fl--mobile-menu-navigation-wrapper'),
            $hamburgerbars = $('.fl--hamburger-menu-wrapper,.fl--hamburger-menu'),
            $social_profiles = $('.fl-mobile-menu-wrapper ul.fl-sidebar-social-profiles li a'),
            OpenNavBar = void 0;

        self.fullscreenNavbarIsOpened = function () {
            return OpenNavBar;
        };

        self.toogleOpenCloseMobileMenu = function () {
            self[OpenNavBar ? 'closeFullscreenNavbar' : 'openFullscreenNavbar']();
        };
        self.openFullscreenNavbar = function () {
            if (OpenNavBar || !$navbar_wrapper.length) {
                return;
            }
            OpenNavBar = 1;

            var $navbarMenuItems = $navbar_wrapper.find('.fl--mobile-menu >li >a,.fl--mobile-menu li.opened .sub-menu >li >a');
            if (!$navbar_wrapper.find('.fl--mobile-menu >li.opened').length) {
                $navbarMenuItems = $navbar_wrapper.find('.fl--mobile-menu >li >a');
            }

            $hamburgerbars.addClass('opened');
            $hamburgerbars.removeClass('closed');

            // NavBarMenu Items Animation
            TweenMax.set($navbarMenuItems, {
                opacity: 0,
                x: '-20%',
                force3D: true
            });

            TweenMax.staggerTo($navbarMenuItems, 0.2, {
                opacity: 1,
                x: '0%',
                delay: 0.4
            }, 0.04);

            // Social Profiles Animation
            TweenMax.set($social_profiles, {
                opacity: 0,
                y: '-100%',
                force3D: true
            });

            TweenMax.staggerTo($social_profiles, 0.2, {
                opacity: 1,
                y: '0%',
                delay: 0.6
            }, 0.04);

            // NavBarMenu wrapper Animation
            TweenMax.set($navbar_wrapper, {
                display: 'none',
                force3D: true
            });

            TweenMax.to($navbar_wrapper, 0.4, {
                opacity: 1,
                display: 'block'
            }, 0.04);

            // NavBarMenu menu sidebar Animation
            TweenMax.set($navbar_menu_sidebar, {
                opacity: 0,
                x: '-100%',
                force3D: true
            });

            TweenMax.to($navbar_menu_sidebar, 0.4, {
                opacity: 1,
                x: '0%',
                display: 'block'
            }, 0.04);

            $navbar_wrapper.addClass('open');

        };

        self.closeFullscreenNavbar = function (dontTouchBody) {
            if (!OpenNavBar || !$navbar_wrapper.length) {
                return;
            }
            OpenNavBar = 0;


            // disactive all togglers
            $hamburgerbars.removeClass('opened');
            $hamburgerbars.addClass('closed');


            var $navbarMenuItems = $navbar_wrapper.find('.fl--mobile-menu >li >a');


            // set top position and animate
            TweenMax.to($navbar_wrapper, 0.4, {
                force3D: true,
                opacity: 0,
                display: 'none',
                delay: 0.1
            });

            TweenMax.to($navbar_menu_sidebar, 0.2, {
                opacity: 0,
                x: '-100%',
                force3D: true,
                delay: 0.3
            }, 0.1);

            TweenMax.to($navbarMenuItems, 0.2, {
                opacity: 0,
                x: '-20%',
                delay: 0.2
            }, 0.1);



            // open navbar block
            $navbar_wrapper.removeClass('open');

        };

        $doc.on('click', '.fl--hamburger-menu-wrapper,.fl--mobile-menu-icon,.fl--hamburger-menu', function (e) {
            self.toogleOpenCloseMobileMenu();
            e.preventDefault();
        });
    };

    fl_theme.initWPMLDemoClickLink = function () {

        $body.on('click', '.demo-language-selector a', function (e) {

            alert('The language switcher requires WPML plugin to be installed and activated.If you don\'t need this option do not install the plugin');

            e.preventDefault();
        });
    };

    fl_theme.initVelocityAnimationSave = function () {
        var animated_velocity = $('.fl-animated-item-velocity');

        // Hided item if animated not complete
        animated_velocity.each(function () {
            var $this = $(this),
                $item;

            if ($this.data('item-for-animated')) {
                $item = $this.find($this.data('item-for-animated'));
                $item.each(function () {
                    if (!$(this).hasClass('animation-complete')) {
                        $(this).css('opacity', '0');
                    }
                });
            } else {
                if (!$this.hasClass('animation-complete')) {
                    $this.css('opacity', '0');
                }
            }
        });

        // animated Function
        animated_velocity.each(function () {
            var $this_item = $(this),
                $item, $animation;
            $animation = $this_item.data('animate-type');
            if ($this_item.data('item-for-animated')) {
                $item = $this_item.find($this_item.data('item-for-animated'));
                $item.each(function () {
                    var $this = $(this);
                    var delay = '';
                    if ($this_item.data('item-delay')) {
                        delay = $this_item.data('item-delay');
                    } else {
                        if ($this.data('item-delay')) {
                            delay = $this.data('item-delay');
                        }
                    }
                    $this.waypoint(function () {
                        if (!$this.hasClass('animation-complete')) {
                            $this.addClass('animation-complete')
                                .velocity('transition.' + $animation, {
                                    delay: delay,
                                    display: 'undefined',
                                    opacity: 1
                                });
                        }
                    }, {
                        offset: offset
                    });
                });
            } else {
                $this_item.waypoint(function () {
                    var delay = '';
                    if ($this_item.data('item-delay')) {
                        delay = $this_item.data('item-delay');
                    }

                    if (!$this_item.hasClass('animation-complete')) {
                        $this_item.addClass('animation-complete')
                            .velocity('transition.' + $animation, {
                                delay: delay,
                                display: 'undefined',
                                opacity: 1
                            });
                    }

                }, {
                    offset: offset
                });
            }
        });
    };

    // Post Archive And Single Slider Post
    fl_theme.initPostSlider = function () {
        $('.post-gallery-slider').each(function () {
            $(this).slick({
                dots: false,
                infinite: false,
                draggable: true,
                speed: 600,
                nextArrow: '.slider-arrow-right',
                prevArrow: '.slider-arrow-left',
            });
        });
    };

    fl_theme.initSharePostArchive = function () {
        $('body').on('click', '.share-post', function (e) {

            if ($(this).hasClass('closed')) {
                $(this).removeClass('closed').addClass('opened');
                $(this).parent().find('.post-share-icon').removeClass('closed').addClass('opened');
            } else {
                $(this).removeClass('opened').addClass('closed');
                $(this).parent().find('.post-share-icon').removeClass('opened').addClass('closed');
            }

            e.preventDefault();
        });
    };
    // Venobox
    fl_theme.initVenoBoxFunction = function () {
        var venobox = $('.venobox');
        if (venobox.length) {
            venobox.each(function () {
                $(this).venobox();
            });
        }
    };

    fl_theme.initVcCustomFunction = function () {

        var initVcShortcodeFunction = function () {
                initVelocityAnimation();
                initCounterFunction();
                initHotspot();
                initTestimonialSlider();
                initProgressBarFunction();
                initAccordionFunction();
                initTabsVCFunction();
                initProgressBar();
                initGallerySlider();
                initAutoHomePageSlider();
            },

            // Velocity Animation
            initVelocityAnimation = function () {
                var animated_velocity = $('.fl-animated-item-velocity');

                // Hided item if animated not complete
                animated_velocity.each(function () {
                    var $this = $(this),
                        $item;

                    if ($this.data('item-for-animated')) {
                        $item = $this.find($this.data('item-for-animated'));
                        $item.each(function () {
                            if (!$(this).hasClass('animation-complete')) {
                                $(this).css('opacity', '0');
                            }
                        });
                    } else {
                        if (!$this.hasClass('animation-complete')) {
                            $this.css('opacity', '0');
                        }
                    }
                });

                // animated Function
                animated_velocity.each(function () {
                    var $this_item = $(this),
                        $item, $animation;
                    $animation = $this_item.data('animate-type');
                    if ($this_item.data('item-for-animated')) {
                        $item = $this_item.find($this_item.data('item-for-animated'));
                        $item.each(function () {
                            var $this = $(this);
                            var delay = '';
                            if ($this_item.data('item-delay')) {
                                delay = $this_item.data('item-delay');
                            } else {
                                if ($this.data('item-delay')) {
                                    delay = $this.data('item-delay');
                                }
                            }
                            $this.waypoint(function () {
                                if (!$this.hasClass('animation-complete')) {
                                    $this.addClass('animation-complete')
                                        .velocity('transition.' + $animation, {
                                            delay: delay,
                                            display: 'undefined',
                                            opacity: 1
                                        });
                                }
                            }, {
                                offset: offset
                            });
                        });
                    } else {
                        $this_item.waypoint(function () {
                            var delay = '';
                            if ($this_item.data('item-delay')) {
                                delay = $this_item.data('item-delay');
                            }

                            if (!$this_item.hasClass('animation-complete')) {
                                $this_item.addClass('animation-complete')
                                    .velocity('transition.' + $animation, {
                                        delay: delay,
                                        display: 'undefined',
                                        opacity: 1
                                    });
                            }

                        }, {
                            offset: offset
                        });
                    }
                });
            },
            // Counter
            initCounterFunction = function () {
                var fl_counter = $('.fl-counter');
                fl_counter.each(function () {
                    var $this = $(this);
                    $this.waypoint(function () {
                        $this.countTo();
                    }, {
                        offset: offset
                    });
                });
            },
            // Hot Spot
            initHotspot = function () {
                var initOffsets = function () {
                    $('.fl-hotspot-shortcode').each(function () {
                        $(this).find('.HotspotPlugin_Hotspot').each(function (index) {
                            var $self = $(this);
                            if (!$self.parents('.fp-scroller').length) {
                                if (!$self.hasClass('animation-done')) {
                                    $self.css('opacity', '0');
                                }
                                $self.waypoint(function () {
                                    if (!$self.hasClass('animation-done')) {
                                        $self.addClass('animation-done')
                                            .velocity('transition.slideUpBigIn', {
                                                display: 'block',
                                                opacity: '1',
                                                delay: index * 20,
                                                complete: function (el) {
                                                    $(el).css({
                                                        '-webkit-transform': 'none',
                                                        '-moz-transform': 'none',
                                                        '-o-transform': 'none',
                                                        'transform': 'none'
                                                    });
                                                }
                                            });
                                    }
                                }, {
                                    offset: offset
                                });
                            }
                        });
                    });

                };
                $('.fl-hotspot-shortcode').each(function () {
                    var $self = $(this),
                        hotspotContent = $self.data('hotspot-content') ? $self.data('hotspot-content') : '';

                    if (hotspotContent != '' && !$self.find('.fl-hotspot-image-cover').hasClass('fl-htospot-inited')) {
                        $self.find('.fl-hotspot-image-cover').addClass('fl-htospot-inited').hotspot({
                            hotspotClass: 'HotspotPlugin_Hotspot',
                            interactivity: 'hover',
                            data: decodeURIComponent(hotspotContent)
                        });
                    }
                });
                $('body').on('fl-hotspot-inited', initOffsets);
                initOffsets();
                window.fl_theme.window.on('resize', initOffsets);
            },
            // Testimonial Slider
            initTestimonialSlider = function () {
                var testimonial_slider = $('.testimonial-slider');
                if (testimonial_slider.length) {
                    testimonial_slider.each(function () {
                        var $this = $(this);
                        if ($this.hasClass('testimonial-style-two')) {
                            $this.not('.slick-initialized').slick({
                                dots: true,
                                infinite: true,
                                prevArrow: null,
                                nextArrow: null,
                                autoplay: true,
                                autoplaySpeed: 6000,
                                speed: 500,
                                slidesToShow: 1,
                                slidesToScroll: 1,
                                draggable: true,
                                swipeToSlide: true,
                            });
                        } else {
                            $this.not('.slick-initialized').slick({
                                dots: true,
                                infinite: true,
                                prevArrow: null,
                                nextArrow: null,
                                autoplay: true,
                                autoplaySpeed: 6000,
                                speed: 500,
                                slidesToShow: 3,
                                slidesToScroll: 1,
                                draggable: true,
                                centerMode: true,
                                swipeToSlide: true,
                                centerPadding: '10px',
                                responsive: [
                                    {
                                        breakpoint: 993,
                                        settings: {
                                            slidesToShow: 2,
                                            slidesToScroll: 1
                                        }
                                    },
                                    {
                                        breakpoint: 769,
                                        settings: {
                                            slidesToShow: 1,
                                            slidesToScroll: 1
                                        }
                                    },
                                ]
                            });
                        }

                    });
                }

            },
            // Progress Bar
            initProgressBarFunction = function () {
                var fl_progress_bar = $('.fl-progress-bar');
                fl_progress_bar.each(function () {
                    var $this = $(this);
                    $this.waypoint(function () {
                        var duration_progress = Number($this.attr("data-duration"));
                        $this.find('.fl-tracking-progress-bar__item').animate({
                            width: $this.attr('data-progress-width')
                        }, duration_progress);
                        $this.find('.fl-progress-wrapper').animate({
                            text: $this.attr('data-progress-width')
                        }, {
                            duration: duration_progress,
                            step: function (now) {
                                var data = Math.round(now);
                                $this.find('.fl-progress-bar__number .fl-animated-number').html(data + '%');
                            }
                        });
                    }, {
                        offset: offset
                    });
                });
            },
            // Accordion
            initAccordionFunction = function () {
                var fl_accordion = $('.fl-accordion');
                fl_accordion.each(function () {
                    var $this = $(this);
                    $this.find('.vc_tta-panel-heading .vc_tta-panel-title a').prepend("<span class='fl-tta-panel-icon'><i class='fa fa-reply'></i></span>");
                });
            },
            // Tabs
            initTabsVCFunction = function () {
                var tabs = $(".fl-vc-tabs");
                tabs.each(function () {
                    var customClass = $(this).attr('data-custom-tabs-class');
                    if ($(customClass).hasClass('active-on-hover')) {
                        $(customClass).on('click mouseenter', '.nav-tabs li', function (e) {
                            var $this = $(this),
                                parrent = $this.parent(),
                                data = $this.attr('data-tab');
                            $(customClass).find('.nav-tabs li').removeClass('active');
                            $this.addClass('active');
                            $(customClass).find('.tab-content .tab-pane').removeClass('active');
                            $(customClass).find('.' + data).addClass('active');
                            e.preventDefault();
                        });
                    } else {
                        $(customClass).on('click', '.nav-tabs li', function (e) {
                            var $this = $(this),
                                parrent = $this.parent(),
                                data = $this.attr('data-tab');
                            $(customClass).find('.nav-tabs li').removeClass('active');
                            $this.addClass('active');
                            $(customClass).find('.tab-content .tab-pane').removeClass('active');
                            $(customClass).find('.' + data).addClass('active');
                            e.preventDefault();
                        });
                    }

                })
            },
            // Progress Bar
            initProgressBar = function () {
                $(".vc-semi-circle-progress-bar").each(function () {
                    var bar = $(this).find(".bar"),
                        val = $(this).find("span"),
                        per = parseInt(val.text(), 10),
                        $this = $(this);
                    $this.waypoint(function () {
                        if (!$this.hasClass('animation-progress-complete')) {
                            $({
                                p: 0
                            }).animate({
                                p: per
                            }, {
                                duration: 1500,
                                step: function (p) {
                                    bar.css({
                                        transform: "rotate(" + (45 + (p * 1.8)) + "deg)"
                                    });
                                    val.text(p | 0);
                                }
                            }).delay(200);
                            $this.addClass('animation-progress-complete');
                        }
                    }, {
                        offset: offset
                    });

                });
            },

            // Gallery Slider
            initGallerySlider = function () {
                var Gallery_slider = $('.fl-gallery-slider');
                if (Gallery_slider.length) {
                    Gallery_slider.each(function () {
                        var $this = $(this),
                            normal_count_slider = $this.attr('data-count-item'),
                            table_count_slider = $this.attr('data-count-table-item'),
                            mobile_count_slider = $this.attr('data-count-mobile-item');
                        $this.not('.slick-initialized').slick({
                            dots: false,
                            infinite: true,
                            prevArrow: null,
                            nextArrow: null,
                            autoplay: true,
                            autoplaySpeed: 6000,
                            speed: 500,
                            slidesToShow: normal_count_slider,
                            slidesToScroll: 1,
                            draggable: true,
                            swipeToSlide: true,
                            responsive: [
                                {
                                    breakpoint: 993,
                                    settings: {
                                        slidesToShow: table_count_slider,
                                        slidesToScroll: 1
                                    }
                                }, {
                                    breakpoint: 769,
                                    settings: {
                                        slidesToShow: mobile_count_slider,
                                        slidesToScroll: 1
                                    }
                                },
                            ]
                        });
                    });
                }

            },
            // Auto Slider Home Page
            initAutoHomePageSlider = function () {
                var Auto_slider = $('.cars-slider');
                if (Auto_slider.length) {
                    Auto_slider.each(function () {
                        var $this = $(this);
                        if ($this.hasClass('slider_style_one')) {
                            $this.not('.slick-initialized').slick({
                                dots: false,
                                infinite: true,
                                autoplay: true,
                                autoplaySpeed: 6000,
                                speed: 500,
                                slidesToShow: 3,
                                slidesToScroll: 1,
                                draggable: true,
                                swipeToSlide: true,
                                prevArrow: $this.parent().find('.slider-arrow-left'),
                                nextArrow: $this.parent().find('.slider-arrow-right'),
                                responsive: [
                                    {
                                        breakpoint: 993,
                                        settings: {
                                            slidesToShow: 2,
                                            slidesToScroll: 1
                                        }
                                    }, {
                                        breakpoint: 400,
                                        settings: {
                                            slidesToShow: 1,
                                            slidesToScroll: 1
                                        }
                                    },
                                ]
                            });
                        } else {
                            $this.not('.slick-initialized').slick({
                                dots: false,
                                infinite: true,
                                autoplay: true,
                                autoplaySpeed: 6000,
                                speed: 500,
                                slidesToShow: 5,
                                slidesToScroll: 1,
                                draggable: true,
                                swipeToSlide: true,
                                prevArrow: $('.transport-slider-arrow-style-two-wrap .slider-arrow-left'),
                                nextArrow: $('.transport-slider-arrow-style-two-wrap .slider-arrow-right'),
                                responsive: [
                                    {
                                        breakpoint: 1500,
                                        settings: {
                                            slidesToShow: 4,
                                            slidesToScroll: 1
                                        }
                                    }, {
                                        breakpoint: 1140,
                                        settings: {
                                            slidesToShow: 3,
                                            slidesToScroll: 1
                                        }
                                    }, {
                                        breakpoint: 991,
                                        settings: {
                                            slidesToShow: 2,
                                            slidesToScroll: 1
                                        }
                                    }, {
                                        breakpoint: 530,
                                        settings: {
                                            slidesToShow: 1,
                                            slidesToScroll: 1
                                        }
                                    },
                                ]
                            });
                        }

                    });
                }

            };
        fl_theme.document.ready(function () {
            initVcShortcodeFunction();
        });
        $('body').on('post-load', initVcShortcodeFunction);

    };

    // Line Height Check
    fl_theme.initLineHeightСheck = function () {
        var $element = $('.post-inner_content >p ,.single-page-wrapper >p');
        $element.each(function () {
            if ($(this).css("font-size") >= "20px") {
                $(this).css('line-height', '1.6');
            }
        });
    };
    fl_theme.initSellCar = function () {
        $('#step01').waypoint(function () {


            $(".b-submit__aside-step").removeClass('m-active');
            $(".b-submit__aside-step-inner").removeClass('m-active');
            $(".step01").addClass('m-active');
            $(".step01 .b-submit__aside-step-inner").addClass('m-active');



        }, {
            triggerOnce: false,
            offset: '55%'
        });

        $('#step02').waypoint(function () {




            $(".b-submit__aside-step").removeClass('m-active');
            $(".b-submit__aside-step-inner").removeClass('m-active');
            $(".step02").addClass('m-active');
            $(".step02 .b-submit__aside-step-inner").addClass('m-active');



        }, {
            triggerOnce: false,
            offset: '55%'
        });

        $('#step03').waypoint(function () {





            $(".b-submit__aside-step").removeClass('m-active');
            $(".b-submit__aside-step-inner").removeClass('m-active');
            $(".step03").addClass('m-active');
            $(".step03 .b-submit__aside-step-inner").addClass('m-active');



        }, {
            triggerOnce: false,
            offset: '55%'
        });

        $('#step04').waypoint(function () {

            $(".b-submit__aside-step").removeClass('m-active');
            $(".b-submit__aside-step-inner").removeClass('m-active');
            $(".step04").addClass('m-active');
            $(".step04 .b-submit__aside-step-inner").addClass('m-active');



        }, {
            triggerOnce: false,
            offset: '55%'
        });

        $('#step05').waypoint(function () {





            $(".b-submit__aside-step").removeClass('m-active');
            $(".b-submit__aside-step-inner").removeClass('m-active');
            $(".step05").addClass('m-active');
            $(".step05 .b-submit__aside-step-inner").addClass('m-active');



        }, {
            triggerOnce: false,
            offset: '55%'
        });
    };

    fl_theme.initDataUkNavbar = function () {
        $('.uk-navbar-nav').attr('data-uk-navbar', '');
        $('.uk-nav-parent-icon').attr('data-uk-nav', '');
        $('#offcanvas .has-submenu').addClass('uk-parent');
        $('#offcanvas .has-submenu').removeClass('has-submenu');
        $('#offcanvas .uk-navbar-dropdown').addClass('uk-nav-sub');
        $('#offcanvas .uk-navbar-dropdown').removeClass('uk-navbar-dropdown');
        $('#offcanvas .sub-menu').addClass('uk-nav-sub');
        $('#offcanvas .sub-menu').unwrap();

        $('.widget_media_gallery').attr('data-uk-lightbox', '');

    };

    /* 16. Animation of statistics */
    fl_theme.initCounter = function () {
        var statistics = $('.stat-item');
        var numbers = $('.__js_number');
        var animationIsDone = false;
        var scroll = $(window).scrollTop() + $(window).height();
        if ($('*').is('.stat-item')) {

            var offset = statistics.offset().top;

            if (!animationIsDone && scroll >= offset) {
                animateNumbers();
            }
            $(window).on('scroll', function () {
                scroll = $(window).scrollTop() + $(window).height();

                if (!animationIsDone && scroll >= offset) {
                    animateNumbers();
                }
            });
        }

        function animateNumbers() {
            numbers.each(function () {
                var endValue = parseInt($(this).attr('data-end-value'), 10);
                $(this).easy_number_animate({
                    start_value: 0,
                    end_value: endValue,
                    duration: 2500
                });
            });
            animationIsDone = true;
        }
    };

    fl_theme.initPreloader = function () {
        var $preloader = $('#page-preloader'),
            $spinner = $preloader.find('.spinner-loader');
        $spinner.fadeOut();
        $preloader.delay(50).fadeOut('slow');
    };



    fl_theme.initCustomFunction = function () {
        //Counter
        fl_theme.initCounter();
        //Preloader
        fl_theme.initPreloader();

        fl_theme.initDataUkNavbar();
        // Sidebar
        fl_theme.initStikySidebar();
        // Resize iframe video
        fl_theme.initResponsiveIframe();
        // Image Popup
        fl_theme.initImagePopup();
        // Gallery Popups
        fl_theme.initGalleryPopup();
        // Contact Popups
        fl_theme.initContactPopup();
        // Select
        fl_theme.initCustomSelect();
        // FullscreenSearch
        fl_theme.initHeaderSearchForm();
        // Header Login Form
        fl_theme.initLoginFormOptionFunction();
        //Navbar fixed
        fl_theme.initNavBarFixed();
        // Car slider
        fl_theme.initCarsSlider();
        // Custom Tabs
        fl_theme.initCustomTabs();
        // Car Google Maps
        fl_theme.initCarGoogleMaps();
        // Change Grid Switch Car Page
        fl_theme.initGridSwitchCar();
        // Widget Range
        fl_theme.initCustomWidgetRange();
        //
        fl_theme.initCustomWidgetFunction();
        //  Custom Iframe Slider Function
        fl_theme.initCustomHeidthIframeSlider();
        //  WPML Demo Click Link
        fl_theme.initWPMLDemoClickLink();
        //
        fl_theme.initVcCustomFunction();
        // Share Post
        fl_theme.initSharePostArchive();
        // Post Slider
        fl_theme.initPostSlider();
        // Venobox
        fl_theme.initVenoBoxFunction();
        //Sell transport
        fl_theme.initSellCar();

        //Mibile menu
        fl_theme.mobile_menu_init();

        //Voice Speech
        fl_theme.voice_speech_init();
    };


    fl_theme.initCustomFunction();


    $($window).resize(function () {
        fl_theme.initResponsiveIframe();
        fl_theme.initNavBarFixed();
        // Resize iframe video
        fl_theme.initResponsiveIframe();
        // Custom Iframe Slider Function
        fl_theme.initCustomHeidthIframeSlider();
        setTimeout(fl_theme.initCustomHeidthIframeSlider, 200);
    });

    var Izotop_container = $('.tm_archive_posts_contain_in');
    if( $('.tm_archive_posts_contain_in img').length > 0) {
        Izotop_container.imagesLoaded().progress(function () {
            Izotop_container.isotope({
                itemSelector: '.article-intro',
                layoutMode: 'masonry',
                percentPosition: true,
                resizesContainer: true,
                resizable: true,
            });
        });
    } else {
        Izotop_container.isotope({
            itemSelector: '.article-intro',
            layoutMode: 'masonry',
            percentPosition: true,
            resizesContainer: true,
            resizable: true,
        });
    }



});
