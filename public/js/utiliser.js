
$(document).ready(function(){

    function phoneSwitch() {
        if($('#b1').attr('src') === '../images/icons/smartphone-light-off.svg') {
            $('#b1').attr('src', '../images/icons/smartphone-light-on.svg')
        } else {
            $('#b1').attr('src', '../images/icons/smartphone-light-off.svg')
        }
    }

    function classSwitch() {
        if($('.utiliser-page').attr('class') === 'utiliser-page white') {
            $('.utiliser-page').attr('class', 'utiliser-page black');
        } else {
            $('.utiliser-page').attr('class', 'utiliser-page white')
        }
    }

    function lightSwitch() {
        if($('.light').attr('src') === '../images/icons/light-off.svg') {
            $('.light').attr('src', '../images/icons/light-on.svg')
        } else {
            $('.light').attr('src', '../images/icons/light-off.svg')
        }
    }


    $(document).on('click', '#b1', function(){
        phoneSwitch();
        lightSwitch();
        classSwitch();
    });
});

/*
* CAROUSEL INIT
*/


new Carousel(document.querySelector('#carousel-communication'), {
    slidesVisible: 1,
    slidesToScroll: 1,
    touch: true
})