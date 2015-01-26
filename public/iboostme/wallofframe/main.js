// jQuery for page scrolling feature - requires jQuery Easing plugin
$(function() {

    $('a.page-scroll').bind('click', function(event) {
        var $anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: $($anchor.attr('href')).offset().top
        }, 1500, 'easeInOutExpo');
        event.preventDefault();
    });

    $("#owl-related").owlCarousel({
        autoPlay: 3000, //Set AutoPlay to 3 seconds

        items : 4,
        itemsDesktop : [1199,3],
        itemsDesktopSmall : [979,3],
        navigation: true,
        navigationText: [
            "<i class='fa fa-angle-left'></i>",
            "<i class='fa fa-angle-right'></i>"
        ]
    });

    $("#owl-recommended").owlCarousel({
        autoPlay: 3000, //Set AutoPlay to 3 seconds

        items : 2,
        itemsDesktop : [1199,3],
        itemsDesktopSmall : [979,3],
    });

    /*$('.frames .item').hover(function(e){
        var content = $(this).find('.content');
        var detail = $(this).find('.detail');
        var isContentDisable = $(this).data('content');

        if( isContentDisable == undefined ){
            content.attr('style', 'opacity:1; transition: all ease .3s;');
            detail.attr('style', 'opacity:0; transition: all ease .3s;');
        }
    },function(e){
        var detail = $(this).find('.detail');
        var content = $(this).find('.content');

        content.attr('style', 'opacity:0; transition: all ease .3s;');
        detail.attr('style', 'opacity:1; transition: all ease .3s;');
    });*/
});

// Highlight the top nav as scrolling occurs
$('body').scrollspy({
    target: '.navbar-fixed-top'
})

// Closes the Responsive Menu on Menu Item Click
$('.navbar-collapse ul li a').click(function() {
    $('.navbar-toggle:visible').click();
});