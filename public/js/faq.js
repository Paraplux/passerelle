$(function(){

    $('.faq-item').on('click', function(){
        const target = $(this).attr('data-target');
        $('.faq-hidden-item[data-target=' + target + ']').slideToggle();
        $(this).find('.fa-chevron-down').toggleClass('active')
    });

});