$(document).ready(function(){


    //
    // ──────────────────────────────────────────────────────────────── I ──────────
    //   :::::: I N F O R M A T I O N S : :  :   :    :     :        :          :
    // ──────────────────────────────────────────────────────────────────────────
    //
 
    $('.informations-navigation span').on('click', function(){
        /*Variables*/
        const target = $(this).attr('data-target')
        const targetElem = $('.informations div[target=' + target + ']')
        
        /*Reset propreties*/
        $('.informations div').hide()
        $('.informations-navigation span').removeClass('is-active')

        /*Setting new properties*/
        $(this).addClass('is-active')
        targetElem.show()
    })

    $a = $('.mosaic-item').width();
    $('.mosaic-item').height($a);

    $(window).resize(function () {
        $a = $('.mosaic-item').width();
        $('.mosaic-item').height($a);
    });


    //
    // ────────────────────────────────────────────── II ──────────
    //   :::::: M A P : :  :   :    :     :        :          :
    // ────────────────────────────────────────────────────────
    //

    /*Showing the map*/
    $('.map-button').on('click', function(){
        $('.map').css('display', 'block')
        $('.map').animate({
            'right': '10%'
        }, 400)
        setTimeout(() => {
            $('.map').animate({
                'right': '-5%'
            }, 100)
        }, 400)
        setTimeout(() => {
            $('.map').animate({
                'right': '0'
            }, 100)
            $('.map-close').css('display', 'block')
        }, 500)
        
        /*Animation bouton map*/
        $(this).animate({
            'top' : '100px'
        }, 100)
        setTimeout(() => {
            $(this).animate({
                'top': '120px'
            }, 100)
        }, 100)
        setTimeout(() => {
            $(this).animate({
                'top': '110px'
            }, 100)
        }, 200)
    })
    
    /*Hiding the map*/
    $('.map-close').on('click', function(){
        $('.map').animate({
            'right': '-10%'
        }, 100)
        $('.map-close').css('display', 'none')
        setTimeout(() => {
            $('.map').animate({
                'right': '5%'
            }, 100)
        }, 100);
        setTimeout(() => {
            $('.map').animate({
                'right': '-200%'
            }, 400)
        }, 200)
        setTimeout(() => {
            $('.map').css('display', 'none')
        }, 700);
    })
    setTimeout(() => {
        $('.map').css('display', 'none')
    }, 50);
})

