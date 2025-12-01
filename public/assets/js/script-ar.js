/**
 * Arabic RTL Fixes
 * This file contains fixes for Arabic language display issues
 */

(function ($) {
    "use strict";

    /*=============================================
        Tg Title Animation - Arabic Override
    =============================================*/

    gsap.registerPlugin(ScrollTrigger, SplitText);
    gsap.config({
        nullTargetWarn: false,
        trialWarn: false,
    });

    // Override the title animation for Arabic to use words instead of chars
    function tg_title_animation_arabic() {
        var tg_var = jQuery(".tg-heading-subheading");
        if (!tg_var.length) {
            return;
        }
        const quotes = document.querySelectorAll(".tg-heading-subheading .tg-element-title");

        quotes.forEach((quote) => {
            //Reset if needed
            if (quote.animation) {
                quote.animation.progress(1).kill();
                quote.split.revert();
            }

            var getclass = quote.closest(".tg-heading-subheading").className;
            var animation = getclass.split("animation-");
            if (animation[1] == "style4") return;

            // Use 'words' instead of 'chars' for Arabic to prevent letter separation
            quote.split = new SplitText(quote, {
                type: "words",
                linesClass: "split-line",
            });

            gsap.set(quote, {
                perspective: 400,
            });

            // Simplified animation for words - make sure elements are visible
            gsap.set(quote.split.words, {
                opacity: 0,
                y: "30px",
            });

            quote.animation = gsap.to(quote.split.words, {
                scrollTrigger: {
                    trigger: quote,
                    start: "top 90%",
                },
                y: "0",
                opacity: 1,
                duration: 0.6,
                ease: "power2.out",
                stagger: 0.03,
            });
        });
    }

    // Fix WOW.js animations for RTL
    if ($(".wow").length) {
        // Re-initialize WOW for Arabic
        var wow = new WOW({
            boxClass: "wow",
            animateClass: "animated",
            mobile: true,
            live: true,
            offset: 100, // Trigger animations earlier
        });
        wow.init();
    }

    // Ensure all animated elements are visible initially
    function ensureVisibility() {
        // Make sure tg-element-title elements are visible
        $(".tg-element-title").css({
            "visibility": "visible",
            "opacity": "1"
        });

        // Fix any elements that might be hidden by animations
        $(".wow").each(function () {
            if ($(this).css("visibility") === "hidden") {
                $(this).css("visibility", "visible");
            }
        });
    }

    // Run on page load
    $(window).on("load", function () {
        ensureVisibility();
        tg_title_animation_arabic();

        // Refresh ScrollTrigger after a short delay
        setTimeout(function () {
            ScrollTrigger.refresh();
        }, 500);
    });

    // Run immediately for elements already in viewport
    $(document).ready(function () {
        ensureVisibility();
        tg_title_animation_arabic();
    });

    ScrollTrigger.addEventListener("refresh", tg_title_animation_arabic);

    // Fix Owl Carousel RTL
    if ($(".owl-carousel").length) {
        $(".owl-carousel").each(function () {
            var $carousel = $(this);
            // Add RTL option to all carousels
            if ($carousel.data('owl.carousel')) {
                $carousel.data('owl.carousel').settings.rtl = true;
                $carousel.trigger('refresh.owl.carousel');
            }
        });
    }

})(jQuery);
