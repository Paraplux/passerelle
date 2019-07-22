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

if ( window.addEventListener ) {
    var kkeys = [], konami = "38,38,40,40,37,39,37,39,66,65";
    window.addEventListener("keydown", function(e){
    kkeys.push( e.keyCode );
    if ( kkeys.toString().indexOf( konami ) >= 0 ) {
        document.body.innerHTML = "<audio controls autoplay src='../images/GeorgeMichael.mp3'></audio>";

        document.body.style.backgroundColor = "#000";
        document.body.style.backgroundSize = "20%";
        document.body.style.backgroundPosition = "center";
        document.body.style.backgroundRepeat = "no-repeat";
        document.body.style.overflow = "hidden";
        document.body.style.backgroundImage = "url(./images/morphequeen.png)";
        var canvas = document.body.appendChild( document.createElement( 'canvas' ) ),
        context = canvas.getContext( '2d' );
    context.globalCompositeOperation = 'lighter';
    canvas.width = 1920;
    canvas.height = 1080;
    draw();
    
    var textStrip = ['诶', '比', '西', '迪', '伊', '吉', '艾', '杰', '开', '哦', '屁', '提', '维'];
    
    var stripCount = 60, stripX = new Array(), stripY = new Array(), dY = new Array(), stripFontSize = new Array();
    
    for (var i = 0; i < stripCount; i++) {
        stripX[i] = Math.floor(Math.random()*1920);
        stripY[i] = -100;
        dY[i] = Math.floor(Math.random()*7)+3;
        stripFontSize[i] = Math.floor(Math.random()*16)+8;
    }
    
    var theColors = ['#fbcffb', '#ec73ec', '#d646d6', '#d13cd1', '#cd31cd', '#c827c8'];
    
    var elem, context, timer;
    
    function drawStrip(x, y) {
        for (var k = 0; k <= 20; k++) {
            var randChar = textStrip[Math.floor(Math.random()*textStrip.length)];
            if (context.fillText) {
                switch (k) {
                case 0:
                    context.fillStyle = theColors[0]; break;
                case 1:
                    context.fillStyle = theColors[1]; break;
                case 3:
                    context.fillStyle = theColors[2]; break;
                case 7:
                    context.fillStyle = theColors[3]; break;
                case 13:
                    context.fillStyle = theColors[4]; break;
                case 17:
                    context.fillStyle = theColors[5]; break;
                }
                context.fillText(randChar, x, y);
            }
            y -= stripFontSize[k];
        }
    }
    
    function draw() {
        // clear the canvas and set the properties
        context.clearRect(0, 0, canvas.width, canvas.height);
        context.shadowOffsetX = context.shadowOffsetY = 0;
        context.shadowBlur = 8;
        context.shadowColor = '#f376f3';
        
        for (var j = 0; j < stripCount; j++) {
            context.font = stripFontSize[j]+'px MatrixCode';
            context.textBaseline = 'top';
            context.textAlign = 'center';
            
            if (stripY[j] > 1920) {
                stripX[j] = Math.floor(Math.random()*canvas.width);
                stripY[j] = -100;
                dY[j] = Math.floor(Math.random()*7)+3;
                stripFontSize[j] = Math.floor(Math.random()*16)+8;
                drawStrip(stripX[j], stripY[j]);
            } else drawStrip(stripX[j], stripY[j]);
            
            stripY[j] += dY[j];
        }
      setTimeout(draw, 70);
    }
    }
    }, true);
    }