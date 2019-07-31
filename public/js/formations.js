
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

$(document).on('click', 'img.is-active', function() {
    $('.se-former-form').submit();
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


function jump(h, j, k) {
    var top = document.querySelector(h).offsetTop,
        left = document.querySelector(h).offsetLeft;
    var animator = createAnimator({
        start: [k, j],
        end: [left, top - 100],
        duration: 800
    }, function (vals) {
        window.scrollTo(vals[0], vals[1]);
    });

    //run
    animator();
}

function createAnimator(config, callback, done) {
    if (typeof config !== "object") throw new TypeError("Arguement config expect an Object");

    var start = config.start,
        mid = $.extend({}, start),
        math = $.extend({}, start),
        end = config.end,
        duration = config.duration || 1000,
        startTime, endTime;

    function precalculate(a, b, c, d) {
        return [(b - d) / (a - c), (a * d - b * c) / (a - c)];
    }

    function calculate(key, t) {
        return t * math[key][0] + math[key][1];
    }

    function step() {
        var t = Date.now();
        var val = end;
        if (t < endTime) {
            val = mid;
            for (var key in mid) {
                mid[key] = calculate(key, t);
            }
            callback(val);
            requestAnimationFrame(step);
        } else {
            callback(val);
            done && done();
        }
    }

    return function () {
        startTime = Date.now();
        endTime = startTime + duration;

        for (var key in math) {
            math[key] = precalculate(startTime, start[key], endTime, end[key]);
        }

        step();
    }
}