// jQuery for page scrolling feature - requires jQuery Easing plugin
$(function() {

    var date = new Date();
    console.log(date.getTime());


    // equalize a responsive column
    $('.equalized').responsiveEqualHeightGrid();


    // scroll page
    $('a.page-scroll').bind('click', function(event) {
        var $anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: $($anchor.attr('href')).offset().top
        }, 1500, 'easeInOutExpo');
        event.preventDefault();
    });


    // owl carousel
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


    // owl carousel
    $("#owl-recommended").owlCarousel({
        autoPlay: 3000, //Set AutoPlay to 3 seconds

        items : 2,
        itemsDesktop : [1199,3],
        itemsDesktopSmall : [979,3],
    });

});

// Highlight the top nav as scrolling occurs
$('body').scrollspy({
    target: '.navbar-fixed-top'
})

// Closes the Responsive Menu on Menu Item Click
$('.navbar-collapse ul li a').click(function() {
    $('.navbar-toggle:visible').click();
});