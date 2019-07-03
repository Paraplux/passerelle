
/*
 * CAROUSEL INIT
 */

new Carousel(document.querySelector('#carousel-communication'), {
    slidesVisible: 1,
    slidesToScroll: 1,
    touch: true
})

/*
 * DRAWING MODULE
 */

$('#pencil').on('click', function() {
     $('.title').css('display', 'none');
     $('.header img').css('display', 'none');
    $('#drawButtons').css('display', 'flex');
    $('#canvasDiv').css('display', 'block');
})
$('#undo').on('click', function () {
    $('.title').css('display', 'block');
    $('.header img').css('display', 'block');
    $('#drawButtons').css('display', 'none');
    $('#canvasDiv').css('display', 'none');
})

$y = $('.header').height();
$x = $('.header').width();
$('#canvasDiv').height($y);
$('#canvasDiv').width($x);

$(window).resize(function () {
    $y = $('.header').height();
    $x = $('.header').width();
    $('#canvasDiv').height($y);
    $('#canvasDiv').width($x);
});

var canvasDiv = document.getElementById('canvasDiv');
canvas = document.createElement('canvas');
canvasWidth = $('#canvasDiv').width();
canvasHeight = $('#canvasDiv').height();
canvas.setAttribute('width', canvasWidth);
canvas.setAttribute('height', canvasHeight);
canvas.setAttribute('id', 'canvas');
canvasDiv.appendChild(canvas);
if (typeof G_vmlCanvasManager != 'undefined') {
    canvas = G_vmlCanvasManager.initElement(canvas);
}
context = canvas.getContext("2d");

$('#canvas').mousedown(function (e) {
    var mouseX = e.pageX - this.offsetLeft;
    var mouseY = e.pageY - this.offsetTop - 80;

    paint = true;
    addClick(mouseX, mouseY);
    redraw();
});

$('#canvas').mousemove(function (e) {
    if (paint) {
        var mouseX = e.pageX - this.offsetLeft;
        var mouseY = e.pageY - this.offsetTop - 80;
        addClick(mouseX, mouseY, true);
        redraw();
    }
});

$('#canvas').mouseup(function (e) {
    paint = false;
});

$('#canvas').mouseleave(function (e) {
    paint = false;
});

var clickX = new Array();
var clickY = new Array();
var clickDrag = new Array();
var paint;

function addClick(x, y, dragging) {
    clickX.push(x);
    clickY.push(y);
    clickDrag.push(dragging);
}

function redraw() {
    context.clearRect(0, 0, context.canvas.width, context.canvas.height); // Clears the canvas

    context.strokeStyle = "#EEEEEE";
    context.lineJoin = "round";
    context.lineWidth = 10;

    for (var i = 0; i < clickX.length; i++) {
        context.beginPath();
        if (clickDrag[i] && i) {
            context.moveTo(clickX[i - 1], clickY[i - 1]);
        } else {
            context.moveTo(clickX[i] - 1, clickY[i]);
        }
        context.lineTo(clickX[i], clickY[i]);
        context.closePath();
        context.stroke();
    }
}

$('#trash').on('click', function () {
    context.clearRect(0, 0, context.canvas.width, context.canvas.height);
    clickX = new Array();
    clickY = new Array();
    clickDrag = new Array();
})
