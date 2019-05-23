$(function(){


    // GESTION DU MENU LATERAL
    function showLateral() {
        $('.navigation-lateral').animate({'left': '0'}, 300)
        $('.dark-background').fadeIn();
        $('#toggleLateral').html('<i class="fas fa-times"></i>')
    }
    function hideLateral() {
        $('.navigation-lateral').animate({'left': '-300px'}, 300)
        $('.dark-background').fadeOut();
        $('#toggleLateral').html('<i class="fas fa-bars"></i>')
    }

    $('#toggleLateral').on('click', function () {
        if($('.navigation-lateral').css('left') === '-300px') {
            showLateral()
        } else {
            hideLateral()
        }
    })

    // GESTION DU MENU QUICK ACTIONS

    $('#quickActionOpen').on('click', function () {
        if($('.quick-item').css('display') === 'none') {
            $('.quick-item').each(function (index) {
                $(this).delay(100 * index).show(100)
                $('#queryInput').focus()
            })
        } else {
            $('.quick-item').each(function (index) {
                $(this).delay(100 * index).hide(100)
            })
        }
    })

    // GESTION DE LA TRANSPARENCE EN FONCTION DU SCROLL
    function addTransparent(elem) {
        elem.addClass('transparent')
    }
    function removeTransparent(elem) {
        elem.removeClass('transparent')
    }

    let lastScrollTop = 0
    window.addEventListener('scroll', function() {
        let st = window.pageYOffset || document.documentElement.scrollTop;
        if(window.pageYOffset <= 50) {
            //Barre proche du haut de la page
           addTransparent($('.navigation-container'))
           addTransparent($('.logo'))
           addTransparent($('.btn-pins'))
           $('.navigation-container').removeClass('hidden')
        } else if (st > lastScrollTop) {
            //Scroll vers le bas
            $('.navigation-container').addClass('hidden')
        } else {
            //Scroll vers le haut
            removeTransparent($('.navigation-container'))
            removeTransparent($('.logo'))
            removeTransparent($('.btn-pins'))
            $('.navigation-container').removeClass('hidden')
        }
        lastScrollTop = st
    }, false)


    // POP UP DE RECHERCHE
    $(document).on('click', '#searchOpen', function (e) {
        e.stopPropagation()
        showSearch()
    })

    $('.search-modal').on('click', function (e) {
        e.stopPropagation()
    })

    $('.dark-background').on('click', function () {
        hideSearch()
        hideLateral()
    })

    $('#cancelSearch').on('click', function () {
        hideSearch()
    })

    $(document).on('keyup', function (e) {
        if (e.which == 27) {
            hideSearch()
            hideLateral()
        }
    })

    $('#searchClose').on('click', function () {
        hideSearch()
    })

    function showSearch() {
        $('.dark-background').fadeIn(400)
        $('.search-modal').show()
        $('.search-modal').animate({
            'top': '55%'
        }, 200).animate({
            'top': '45%'
        }, 100).animate({
            'top': '50%'
        }, 100)
    }

    function hideSearch() {
        if ($('.search-modal').css('display') === 'block') {
            $('.dark-background').fadeOut(400)
            $('.search-modal').animate({
                'top': '45%'
            }, 200).animate({
                'top': '55%'
            }, 100).animate({
                'top': '-20%'
            }, 100)
            setTimeout(() => {
                $('.search-modal').hide()
            }, 450)
        }
    }

})