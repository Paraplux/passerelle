$(function(){

    //CKEDITOR 

    function ckeditor(id) {
        if($('#' + id).length >= 1) {
            CKEDITOR.replace(id);
        }
    }

    ckeditor('fiche_ckeditor_1');
    ckeditor('fiche_ckeditor_2');
    ckeditor('fiche_ckeditor_3');
    ckeditor('fiche_ckeditor_4');
    ckeditor('faq_ckeditor');
    ckeditor('article_ckeditor');
    ckeditor('event_ckeditor');

    // RANDOM
    $('.alert .close').on('click', function() {
        $(this).parent().fadeOut();
    })

    //NAVIGATION
    function toggleNavigation(){
        if($('.master-navbar').css('left') == '-250px') {
            $('.master-navbar').animate({
                left : '0'
            });
            $('.toggle-navigation i').css({
                transform : 'rotate(180deg)'
            });
        } else {
            $('.master-navbar').animate({
                left : '-250px'
            });
            $('.toggle-navigation i').css({
                transform : 'rotate(0deg)'
            });
        }
    }
    $('.toggle-navigation').on('click', function(){
        toggleNavigation();
    })


    //KEYWORDS
    function toggleSecteur() {
        if($('.keyword-input').attr('value') == 2) {
            $('.form-group.secteur').slideDown();
        } else {
            $('.form-group.secteur').slideUp();
        }
    }

    function oldKeyword() {
        const keywordButtons = document.querySelectorAll('.keyword-button');
        const keywordInput = $('.input-keyword');
        let oldKeyword = $('.old-keyword-input').val();

        keywordButtons.forEach(function(elem) {
            if($(elem).attr('data-value') == oldKeyword) {
                $(elem).attr('checked', 'checked');
                $(elem).parent().find('.keyword-label').attr('checked', 'checked');
            }
        });

        keywordInput.value = oldKeyword;
    }

    $(document).on('click', '.keyword-button', function(){
        let value = $(this).attr('data-value');
        $('.keyword-input').val(value);

        $('.keyword-button').removeAttr('checked');
        $('.keyword-label').removeAttr('checked');

        $(this).attr('checked', 'checked');
        $(this).parent().find('.keyword-label').attr('checked', 'checked')

        toggleSecteur();
    })

    oldKeyword();
    toggleSecteur();


    //TAG

    let oldTag = "{{ old('taginput') ?? '' }}";

    if(oldTag != "") {
        $('.input[name="taginput"]').val(oldTag);

        oldTagArray = oldTag.split(',')
        oldTagArray.forEach(function(elem) {
            $('input[name="taginput"]').parent().insertBefore('<li class="value"><span class="text">' + elem + '</span><span class="remove">×</span></li>', $('input[name="taginput"]').parent().find('.input-container'))
        })
    }
})