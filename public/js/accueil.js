new Carousel(document.querySelector('#carousel-feature'), {
    slidesVisible: 1,
    slidesToScroll: 1,
    touch: true
})

//Delegate click on the feature header buttons and hiding the previous ones
$('#carousel-feature .carouselPrev').css('display', 'none')
$('#carousel-feature .carouselNext').css('display', 'none')

function triggerLeft() {
    $('#carousel-feature .carouselPrev').trigger('click')
}
function triggerRight() {
    $('#carousel-feature .carouselNext').trigger('click')
}

$('#feature-left').on('click', function () {
    triggerLeft()
})
$('#feature-right').on('click', function () {
    triggerRight()
})

new Carousel(document.querySelector('#carousel-communication'), {
    slidesVisible: 1,
    slidesToScroll: 1,
    touch: true,
    pagination: true,
    navigation: false
})


$a = $('.formations-tile').width();
$b = $('.feature-body').height();

$('.formations-tile').height($a);
$('.tile-info').height($a / 5);
$('.tile-body').css('margin-top', $a / 5);
$('.feature-body iframe').height($b)

$(window).resize(function () {
    $a = $('.formations-tile').width();
    $b = $('.feature-body').height();

    $('.formations-tile').height($a);
    $('.tile-info').height($a / 5);
    $('.tile-body').css('margin-top', $a / 5);
    $('.feature-body iframe').height($b)
});