( function($) {
    $(document).ready(function(){

        /* Slider Intialize */
        $('.ct-slider').slick({
            slidesToScroll: 1,
            prevArrow: $('.post-slide-hor-arrow .prev'),
            nextArrow: $('.post-slide-hor-arrow .next'),
            autoplay: true,
            dots: true,
            autoplaySpeed: 235000,
        });

        /* Masonry */
        var $grid = $( '.grid' ).masonry( {
            // options
            itemSelector: '.grid-item',
            hiddenStyle: {
              opacity: 0
            },
            visibleStyle: {
              opacity:1
            },
            horizontalOrder: true
        } );

        // layout Masonry after each image loads
        $grid.imagesLoaded().progress( function() {
            $grid.masonry( 'layout' );
        });

        // Image Hover effecr
        $('.featured-image img').hover(function() {
            $( this ).addClass( 'ct-zoomed' );
        }, function() {
            $( this ).removeClass( 'ct-zoomed' );
        });

        $('.featured-image .ct-overlay').hover(function() {
            $( this ).siblings().addClass( 'ct-zoomed' );
            $( this ).siblings( 'a' ).children( 'img' ).addClass( 'ct-zoomed' );
        }, function() {
            $( this ).siblings().removeClass( 'ct-zoomed' );
            $( this ).siblings( 'a' ).children( 'img' ).removeClass( 'ct-zoomed' );
        });

        // Scroll Reading Bar
        $.fn.topProgressBar = function(options) {
            var opts = $.extend({}, {
                height: "3px"
            }, options);
            var bar = getTopProgressBar(opts);
            $(bar).prependTo(document.body);
            $(window).on("scroll", function() {
                var p = getScrollPercent();
                $(bar).css("width", p);
            });
        }

        function getTopProgressBar(opts) {
            var bar = document.createElement("div")
            bar.classList.add( "ct-scroll-bar" );
            bar.style.position = "fixed";
            bar.style.top = "0px";
            bar.style.backgroundColor = opts.bgColor;
            bar.style.height = opts.height;
            return bar;
        }

        function getScrollPercent() {
            var h = document.documentElement,
                b = document.body,
                st = 'scrollTop',
                sh = 'scrollHeight';
            return parseInt((h[st] || b[st]) / ((h[sh] || b[sh]) - h.clientHeight) * 100) + "%";
        }

        $(document).topProgressBar();

        /**
         * Keyboard Navigation
         */

        // If Tab key pressed
        $( '.menu-item-has-children' ).on( {
            keyup: function( e ) {
                var keyCode = e.keyCode || e.which;
                if (keyCode == 9) {
                    $( this ).children( 'ul' ).addClass( 'is-focused' );
                }
            }
        } );

        // If Tab key pressed
        $( '.menu-item-has-children' ).keydown(function(e) {
            if( e.which  == 9 ){ // Tab Press
                $( this ).children( '.sub-menu' ).removeClass( 'is-focused' );
                $(this).find( '.sub-menu li:last-child' ).addClass('is-focused');
            }
        } );

        // If Tab + Shift key pressed
        $( '.menu-item' ).keydown( function(e) {
            if( e.which  == 9 ){ // Tab Press
                if( e.shiftKey ) {
                   //Focus previous item
                   if( $( this ).prev().hasClass( 'menu-item-has-children' ) ) {
                       $(this).prev().find( '.sub-menu li:last-child' ).addClass('is-focused').focus();
                   }
                }
            }
        } );

        // If focus out
        $( '.menu-item-has-children .sub-menu' ).focusout(function( e ){
            if ( $( this ).children('.menu-item-has-children').length === 0 ) {
                $( this ).removeClass( 'is-focused' );
                $( this ).parents( '.is-focused' ).removeClass( 'is-focused' );
            }
        } );

        /**
         * Mobile Navigation
         */

        $shown = false;
        $plus_rotate = false;
        $( '.js-mobile-close-icon' ).on( 'keydown', function( e ){
            var key = e.which;

            // Tab KeyPress
            if( key == 9 ) {
                if ( e.shiftKey ) {
                    $( '.mobile-navigation' ).removeClass( 'mobile-navigation-open' );
                }
            }
        } );

        $( '.mobile-navigation .js-mobile-close-icon' ).focusout( function( e ){
            $( this ).parent().find( '.main-nav>li:first-child a' ).focus();
        });

        $( '.js-mobile-close-icon' ).on( 'click', function( e ){
            e.preventDefault();
            $( '.mobile-navigation' ).toggleClass( 'mobile-navigation-open' );
            $( '.js-mobile-icon' ).toggleClass( 'ct-icon-rotate-45' );
        } );

        // Caret rotate
        $caret_rotate = false;
        $( '.js-toggle-class' ).on( 'click', function(){
            $( this ).toggleClass( 'ct-icon-rotate-180 ct-expand' );
            $( this ).next().slideToggle();
        });

        // inside mobile mobile menu close icon
        $( '.js-menu-close-icon' ).on( 'click', function(){
            $( '.mobile-navigation' ).removeClass( 'mobile-navigation-open' );
            $( '.js-mobile-close-icon' ).removeClass( 'ct-icon-rotate-45' );
        } );

        // Header Search Form
        $( '.js-search-icon' ).on( 'click', function( e ) {
            e.preventDefault();
            $( this ).siblings( '.header-search-form' ).addClass( 'header-search-form-open' );
            $( this ).siblings( '.header-search-form' ).find( '.search-field' ).css( "visibility", 'visible' ).focus();
            $( this ).siblings( '.search-overlay' ).addClass( 'search-overlay-open' );
        } );

        // Header Search Form: If Tab + Shift key pressed
        $( '.search-field' ).keydown( function(e) {
            if( e.which  == 9 ){ // Tab Press
                if( e.shiftKey ) {
                    $( '.header-search-form' ).removeClass( 'header-search-form-open' );
                    $( '.search-overlay' ).removeClass( 'search-overlay-open' );
                }
            }
        } );

        // On Close Key Press
        $( '#close' ).on( 'click', function( e ){
            e.preventDefault();
            $( this ).parent().removeClass( 'header-search-form-open' );
            $( this ).parent().siblings( '.search-overlay' ).removeClass( 'search-overlay-open' );
        } );

        // On Close Tab Key Press
        $( '#close' ).focusout( function( e ){
            // Tab KeyPress
            $( this ).siblings( '.search-form' ).find( 'input' ).focus();
        });

        // Change focus to input field after enter key press
        $( '.js-search-icon' ).keydown( function( e ){
            if ( e.which == 13 ) { // Enter Press
                $( this ).parents().find( '.container' ).siblings( '.header-search-form' ).find( '.search-submit' ).addClass( 'header-search-form-open' );
                $( this ).parents().find( '.container' ).siblings( '.header-search-form' ).find( '.search-submit' ).focus();
            }
        });

        // On Escape Key Press
        $( document ).keyup(function(e) {
             if (e.key === "Escape") { // escape key maps to keycode `27`
               $( '.header-search-form' ).removeClass( 'header-search-form-open' );
               $( '.search-overlay' ).removeClass( 'search-overlay-open' );

               $( '.mobile-navigation' ).removeClass( 'mobile-navigation-open' );
               $( '.js-mobile-icon' ).removeClass( 'ct-icon-rotate-45' );
            }
        });

    });
} )( jQuery );
