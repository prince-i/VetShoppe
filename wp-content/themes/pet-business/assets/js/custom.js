jQuery(document).ready(function($) {

/*------------------------------------------------
            DECLARATIONS
------------------------------------------------*/
    
    var loader              = $('#loader');
    var loader_container    = $('#preloader');
    var scroll              = $(window).scrollTop();  
    var scrollup            = $('.backtotop');
    var menu_toggle         = $('.menu-toggle');
    var dropdown_toggle     = $('.main-navigation button.dropdown-toggle');
    var nav_menu            = $('.main-navigation ul.nav-menu');
    var featured_slider     = $('#featured-slider');
    var project_slider      = $('.project-slider');
    var client_slider       = $('.client-slider');

/*------------------------------------------------
            PRELOADER
------------------------------------------------*/

    loader_container.delay(1000).fadeOut();
    loader.delay(1000).fadeOut("slow");

/*------------------------------------------------
            BACK TO TOP
------------------------------------------------*/

    $(window).scroll(function() {
        if ($(this).scrollTop() > 1) {
            scrollup.css({bottom:"25px"});
        } 
        else {
            scrollup.css({bottom:"-100px"});
        }
    });

    scrollup.click(function() {
        $('html, body').animate({scrollTop: '0px'}, 800);
        return false;
    });

/*------------------------------------------------
            MAIN NAVIGATION
------------------------------------------------*/

    $('#sidr-left-top-button').sidr({
        name: 'sidr-left-top',
        timing: 'ease-in-out',
        speed: 500,
        side: 'right',
        source: '.left'
    });

    $('#primary-menu .menu-item-has-children > a > svg').click(function(event) {
        event.preventDefault();
        $(this).parent().find('.sub-menu').first().slideToggle();
    })

    menu_toggle.click(function() {
        $(this).toggleClass('active');
    });

    $('.main-navigation ul li.search-menu a').click(function(event) {
        event.preventDefault();
        $(this).toggleClass('search-active');
        $('.main-navigation #search').fadeToggle();
        $('.main-navigation .search-field').focus();
    });

    $(document).keyup(function(e) {
        if (e.keyCode === 27) {
            $('.main-navigation ul li.search-menu a').removeClass('search-active');
            $('.main-navigation #search').fadeOut();
        }
    });

    $(document).click(function (e) {
        var container = $("#masthead");
        if (!container.is(e.target) && container.has(e.target).length === 0) {
            $('.main-navigation ul li.search-menu a').removeClass('search-active');
            $('.main-navigation #search').fadeOut();
        }
    });


/*--------------------------------------------------------------
 Keyboard Navigation
----------------------------------------------------------------*/
if( $(window).width() < 1024 ) {
    $('#primary-menu').find("li").last().bind( 'keydown', function(e) {
        if( e.which === 9 ) {
            e.preventDefault();
            $('#masthead').find('.menu-toggle').focus();
        }
    });
}
else {
    $( '#primary-menu li:last-child' ).unbind('keydown');
}

$(window).resize(function() {
    if( $(window).width() < 1024 ) {
        $('#primary-menu').find("li").last().bind( 'keydown', function(e) {
            if( e.which === 9 ) {
                e.preventDefault();
                $('#masthead').find('.menu-toggle').focus();
            }
        });
    }
    else {
        $( '#primary-menu li:last-child' ).unbind('keydown');
    }
});

/*------------------------------------------------
            SLICK SLIDER
------------------------------------------------*/
featured_slider.slick();
project_slider.slick({
    responsive: [
        {
        breakpoint: 1200,
            settings: {
                slidesToShow: 3
            }
        },
        {
        breakpoint: 992,
            settings: {
                slidesToShow: 2
            }
        },
        {
        breakpoint: 567,
            settings: {
                slidesToShow: 1
            }
        }
    ]
});
client_slider.slick();

/*------------------------------------------------
                END JQUERY
------------------------------------------------*/

});