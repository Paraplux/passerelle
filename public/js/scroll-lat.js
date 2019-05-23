if(document.querySelectorAll('.scroll-anchor').length != 0) {
   /*Fonction de jump pour faire le scroll*/
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

   /*Création des éléments HTML*/
   const anchors = document.querySelectorAll('.scroll-anchor')
   const lateralContainer = createDivWithClass('lateral-container')
   const lateralLinks = createDivWithClass('lateral-links')
   const lateralBar = createDivWithClass('lateral-bar')
   const lateralHome = createDivWithClass('lateral-dot-home')
   lateralHome.innerHTML = '<i class="fas fa-home"></i>'
   lateralBar.appendChild(lateralHome)
   let k = 1;
   anchors.forEach(function (elem) {
       const lateralItem = createDivWithClass('lateral-item')
       const lateralDot = createDivWithClass('lateral-dot')
       elem.setAttribute('scroll-id', 'scroll-item-' + k)
       lateralItem.setAttribute('scroll-id', 'scroll-item-' + k)
       lateralItem.innerHTML = '<span>' + elem.innerHTML + '</span>'
       lateralDot.innerHTML = '<i scroll-id="scroll-item-' + k + '" class="far fa-circle"></i>'

       lateralLinks.appendChild(lateralItem)
       lateralBar.appendChild(lateralDot)
       k++
   })
   lateralContainer.appendChild(lateralLinks)
   lateralContainer.appendChild(lateralBar)
   document.body.appendChild(lateralContainer)

   /*Navigation sur les dots*/
   const lateralDots = document.querySelectorAll('.lateral-dot')
   lateralDots.forEach(function (elem) {
       const targetId = elem.children[0].getAttribute('scroll-id')
       const targetTop = elem.offsetTop - 40;
       const currentAnchor = document.querySelector('.lateral-item[scroll-id=' + targetId + ']')
       currentAnchor.style.top = targetTop + 'px'
       elem.addEventListener('click', function () {
           const targetId = this.children[0].getAttribute('scroll-id')
           const top = window.pageYOffset
           const left = window.pageXOffset
           jump('.scroll-anchor[scroll-id=' + targetId + ']', top, left)
       })
       elem.addEventListener('mouseenter', function () {
           const targetId = this.children[0].getAttribute('scroll-id')
           document.querySelector('.lateral-item[scroll-id=' + targetId + ']').style.display = "block"
           document.querySelector('.fa-circle[scroll-id=' + targetId + ']').style.color = "#FFFFFF"
       })
       elem.addEventListener('mouseleave', function () {
           const targetId = this.children[0].getAttribute('scroll-id')
           document.querySelector('.lateral-item[scroll-id=' + targetId + ']').style.display = "none"
           document.querySelector('.fa-circle[scroll-id=' + targetId + ']').style.color = "#FFFFFF60"
       })
   })

   /*Changement selon scroll de la page*/
   window.addEventListener('scroll', function () {
       anchors.forEach(function (elem) {
           const elemTop = elem.offsetTop
           const currentTop = window.pageYOffset
           const targetId = elem.getAttribute('scroll-id')
           const dots = document.querySelectorAll('.fa-circle')
           if (elemTop >= currentTop - 100 && elemTop <= currentTop + 300) {
               dots.forEach(function (elem) {
                   elem.style.color = "#FFFFFF60"
               })
               lateralHome.style.color = "#FFFFFF60"
               document.querySelector('i[scroll-id=' + targetId + ']').style.color = "#FFFFFF"
               
           }
           if (currentTop === 0) {
               lateralHome.style.color = "#FFFFFF"
               dots.forEach(function (elem) {
                   elem.style.color = "#FFFFFF60"
               })
           }
       })
   })

   lateralHome.style.color = "#FFFFFF"
   /*Gestion du bouton home*/
   lateralHome.addEventListener('click', function () {
       const top = window.pageYOffset
       const left = window.pageXOffset
       jump('.scroll-home', top, left)
   })

}
