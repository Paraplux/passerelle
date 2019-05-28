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

/*
 * CAROUSEL INIT
 */

new Carousel(document.querySelector('#carousel-apprendre'), {
    slidesVisible: 1,
    slidesToScroll: 1,
    touch: true
})


/*
 * CALENDAR INIT 
 */
let cardElement = document.querySelector(".card");

cardElement.addEventListener("click", flip);

function flip() {
    cardElement.classList.toggle("flipped")
}

function startTime() {
    var weekday = new Array();
    weekday[0] = "Sunday";
    weekday[1] = "Monday";
    weekday[2] = "Tuesday";
    weekday[3] = "Wednesday";
    weekday[4] = "Thursday";
    weekday[5] = "Friday";
    weekday[6] = "Saturday";
    var month = new Array();
    month[0] = "January";
    month[1] = "February";
    month[2] = "March";
    month[3] = "April";
    month[4] = "May";
    month[5] = "June";
    month[6] = "July";
    month[7] = "August";
    month[8] = "September";
    month[9] = "October";
    month[10] = "November";
    month[11] = "December";
    var today = new Date();
    var h = today.getHours();
    var m = today.getMinutes();
    var s = today.getSeconds();
    var d = today.getDate();
    var y = today.getFullYear();
    var wd = weekday[today.getDay()];
    var mt = month[today.getMonth()];

    m = checkTime(m);
    s = checkTime(s);
    document.getElementById('date').innerHTML =
        d;
    document.getElementById('day').innerHTML =
        wd;
    document.getElementById('month').innerHTML =
        mt + "/" + y;

    var t = setTimeout(startTime, 500);
}

function checkTime(i) {
    if (i < 10) {
        i = "0" + i
    };
    return i;
}


$(function () {
    startTime();
})
