jQuery(document).ready(function() {
    'use strict'

    jQuery(".dropdown>a").after("<button type='button' class='caret'> <i class='fas fa-chevron-down'></i> </button>");


    jQuery(document).ready(function() {

        /* add active class on focused menu */
        jQuery('.caret').on("click", function() {
            jQuery('li.dropdown').removeClass("active");
            jQuery(this).parents('.dropdown').addClass("active");
        });


        if (jQuery(window).width() > 1024) {
            jQuery('.navbar li.dropdown, li.dropdown-submenu').hover(function() {
                jQuery(this).addClass('open');
            }, function() {
                jQuery(this).removeClass('open');
            });
            jQuery('.navbar li.dropdown, li.dropdown-submenu').hover(function() {
                jQuery(this).addClass('open');
            }, function() {
                jQuery(this).removeClass('open');
            });
        }
        jQuery('li.dropdown, li.dropdown-submenu').find('.caret').each(function() {
            jQuery(this).on('click', function() {
                if (jQuery(window).width() < 1024) {
                    jQuery(this).after().next().slideToggle();
                }
                return false;
            });
        });
    });
    jQuery('.navbar-nav > li > ul.dropdown > li > button.caret').on('click', function() {
        if (jQuery(window).width() < 1024) {
            var active_li_id = jQuery(this).parent('li').attr('id');
            var ele = jQuery(this).parents('ul.dropdown > li');
            jQuery(ele).parent('ul').children('li').not('#' + active_li_id).find('ul').css('display', 'none');
        }
    });

    jQuery('.navbar-nav > li.dropdown > button.caret').on('click', function() {
        if (jQuery(window).width() < 1024) {
            var active_li_id = jQuery(this).parent('li').attr('id');
            jQuery('.navbar-nav>.menu-item').not('#' + active_li_id).children('ul').css('display', 'none');

            jQuery('.navbar-nav>.menu-item').not('#' + active_li_id).find('ul').css('display', 'none');
        }


    });

    jQuery('.navigation').find('.last-tab').last().addClass('nav-tab');

    jQuery(document).on('blur', ' button.last-tab.nav-tab', function() {
        jQuery('button.navbar-toggler').focus();

    });



    jQuery(document).on('blur', '.close-search-btn', function() {
        jQuery('.search__wrapper .form-control').focus();
    });

    jQuery(".navbar-nav li a").first().addClass("first-tap");

    jQuery(document).on('blur', '.navbar-toggler-close', function() {
        jQuery('.first-tap').focus();
    });


    jQuery(".dropdown a").removeClass('dropdown-toggle');

    jQuery(window).scroll(function() {
        if (jQuery(this).scrollTop() > 50) {
            jQuery('#back-to-top').fadeIn();
        } else {
            jQuery('#back-to-top').fadeOut();
        }
    });



    jQuery('#back-to-top').click(function() {
        jQuery('body,html').animate({
            scrollTop: 0
        }, 400);
        return false;
    });

    jQuery('#preloader').delay('10').fadeOut(2000);
    setTimeout(page_anim_remove_preloader, '11000');

    function page_anim_remove_preloader() {
        jQuery('#preloader').remove();
    }
});



(function($) {
    'use strict';


    $(window).scroll(function() {
        if ($('.navigation').offset().top > 100) {
            $('.navigation').addClass('nav-bg');
        } else {
            $('.navigation').removeClass('nav-bg');
        }
    });


    var windows = $(window);
    var sticky = $('.header-fixed');
    windows.on('scroll', function() {
        var scroll = windows.scrollTop();
        if (scroll < 50) {
            sticky.removeClass('stick');
        } else {
            sticky.addClass('stick');
        }
    });

    try {

        var Shuffle = window.Shuffle;
        var jQuery = window.jQuery;
        var myShuffle = new Shuffle(document.querySelector('.shuffle-wrapper'), {
            itemSelector: '.shuffle-item',
            buffer: 1
        });

        $('input[name="shuffle-filter"]').on('change', function(evt) {
            var input = evt.currentTarget;
            if (input.checked) {
                myShuffle.filter(input.value);
            }
        });
    } catch (e) {}
})(jQuery);