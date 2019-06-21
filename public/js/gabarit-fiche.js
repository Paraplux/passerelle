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

    $(document).on('click', '.accordion-title', function(evt) {
        evt.stopPropagation(); 
        if ($(this).parent().find('.accordion-content').css('display') === 'none') {
            $('.accordion-content').slideUp();
            $(this).parent().find('.accordion-content').slideDown();
        } else {
            $('.accordion-content').slideUp();
        }
    })
    
    $(document).on('click', 'body', function() {
        $('.accordion-content').slideUp();
    })

    $('.accordion-content').on('click', function(evt){
        evt.stopPropagation()
    })

})

