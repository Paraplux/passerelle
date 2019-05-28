/*
* CAROUSEL INIT
*/


new Carousel(document.querySelector('#carousel-communication'), {
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
    weekday[0] = "Dimanche";
    weekday[1] = "Lundi";
    weekday[2] = "Mardi";
    weekday[3] = "Mercredi";
    weekday[4] = "Jeudi";
    weekday[5] = "Vendredi";
    weekday[6] = "Samedi";
    var month = new Array();
    month[0] = "Janvier";
    month[1] = "Fevrier";
    month[2] = "Mars";
    month[3] = "Avril";
    month[4] = "Mai";
    month[5] = "Juin";
    month[6] = "Juillet";
    month[7] = "Août";
    month[8] = "Septembre";
    month[9] = "Octobre";
    month[10] = "Novembre";
    month[11] = "Decembre";
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
