
/*
 * CAROUSEL INIT
 */

new Carousel(document.querySelector('#carousel-communication'), {
    slidesVisible: 1,
    slidesToScroll: 1,
    touch: true
})

// INPUT FIELD
$(document).on('click', '.input-field', function (e) {
    e.stopPropagation()

    $('.input-field').addClass('is-running')
    setTimeout(() => {
        $('.input-field').removeClass('is-running')
    }, 1000)
    
    $('.input-field img').addClass('is-active')
    setTimeout(() => {
        $('.input-field img').attr('src', '/images/icons/arrow-right.png')
    }, 250)
})

$(document).on('click', 'body', function(){
    $('.input-field img').removeClass('is-active')
    setTimeout(() => {
        $('.input-field img').attr('src', '/images/icons/search.png')
    }, 250)
})


// PARALLAX
$(function () {
    function monParallax() {
        var positionScroll = $(window).scrollTop()
        $('.search-background').css('transform', "translateY(" + -(positionScroll / 4) + "px)")
    }

    $(window).on('scroll', function () {
        monParallax();
    });
});