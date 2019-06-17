// let cards = Array.from($('.card'));
// cards.forEach(function (elem) {
//     let x = $(elem).width();
//     $(elem).height(x);
// })


// $('.card').on('click', function () {
//     if ($(':animated').length) {
//         return false;
//     }
//     let cardWidth = $(this).width();
//     let cardHeight = $(this).height();
//     if ($(this).attr('aria-expanded') === 'false') {
//         if ($('.cards-container').find('.card[aria-expanded=true').length != 0) {
//             $('.card').animate({
//                 width: cardWidth,
//                 height: cardWidth
//             }, 300);
//             $('.card').find('.body ul').hide();
//             $('.card').attr('aria-expanded', 'false');
//         }
//         $(this).animate({
//             width: cardWidth * 2,
//             height: cardHeight * 2.5
//         }, 300);
//         setTimeout(() => {
//             $(this).find('.body ul').show().animate({
//                 opacity: 1
//             });
//         }, 300);
//         $(this).attr('aria-expanded', 'true');
//     } else if ($(this).attr('aria-expanded') === 'true') {
//         $(this).animate({
//             width: cardWidth / 2,
//             height: cardHeight / 2.5
//         }, 300);
//         $(this).find('.body ul').animate({
//             opacity: 0
//         }).hide();
//         $(this).attr('aria-expanded', 'false');
//     }
// });

// let cards = Array.from(document.querySelectorAll(".card"));
// cards.forEach(a => {
//     a.addEventListener("click", function () {
//         let b = new Flip;
//         b.read(cards), a.classList.toggle('big'), b.play(cards), $(a).find('.body ul').classList.toggle('show')
//     })
// })
// class Flip {
//     constructor() {
//         this.duration = 500, this.positions = {}
//     }
//     read(a) {
//         a.forEach(a => {
//             const b = a.getAttribute("id");
//             this.positions[b] = a.getBoundingClientRect()
//         })
//     }
//     play(a) {
//         a.forEach(a => {
//             const b = a.getAttribute("id"),
//                 c = a.getBoundingClientRect(),
//                 d = this.positions[b];
//             if (void 0 === d) return void a.animate([{
//                 transform: `translate(0, 0)`,
//                 opacity: 0
//             }, {
//                 transform: "none",
//                 opacity: 1
//             }], {
//                 duration: this.duration,
//                 easing: "ease-in-out",
//                 fill: "both"
//             });
//             const e = d.x - c.x,
//                 f = d.y - c.y,
//                 g = d.width / c.width,
//                 h = d.height / c.height;
//             a.animate([{
//                 transform: `translate(${e}px, ${f}px) scale(${g}, ${h})`
//             }, {
//                 transform: "none"
//             }], {
//                 duration: this.duration,
//                 easing: "ease-in-out",
//                 fill: "both"
//             })
//         })
//     }
// }

let fondateurs = $('.cards-container.fondateurs .card');
let signataires = $('.cards-container.signataires .card');
let partenaires = $('.cards-container.partenaires .card');

let a = fondateurs.width();
fondateurs.height(a * 2);
let b = signataires.width();
signataires.height(b);
let c = partenaires.width();
partenaires.height(c);

$('.card').not('.cards-container.fondateurs .card').on('click', function(evt){
    console.log('ok')
    $('.card').not($(this)).removeClass('big');
    $(this).height('auto');
    $(this).toggleClass('big');
    evt.stopPropagation();
})

$(document).on('click', function () {
    cards.removeClass('big');
})