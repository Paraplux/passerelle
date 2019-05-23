/**
 * Ajoute la navigation tactile sur les carousels
 */

class CarouselTouchPlugin {

    /**
     * 
     * @param {Carousel} carousel 
     */
    constructor(carousel) {
        carousel.container.addEventListener('dragstart', e => e.preventDefault())
        carousel.container.addEventListener('mousedown', this.startDrag.bind(this))
        carousel.container.addEventListener('touchstart', this.startDrag.bind(this))
        window.addEventListener('mousemove', this.drag.bind(this))
        window.addEventListener('touchmove', this.drag.bind(this))
        window.addEventListener('touchend', this.endDrag.bind(this))
        window.addEventListener('mouseup', this.endDrag.bind(this))
        window.addEventListener('touchcancel', this.endDrag.bind(this))
        this.carousel = carousel

    }

    /**
     * Démarre le déplacement au touché
     * @param {MouseEvent|TouchEvent} e 
     */
    startDrag(e) {
        if (e.touches) {
            if (e.touches.length > 1) {
                return
            } else {
                e = e.touches[0]
            }
        }
        this.origin = {
            x: e.screenX,
            y: e.screenY
        }
        this.width = this.carousel.containerWidth
        this.carousel.disableTransition()
    }

    /**
     * Gérer le déplacement
     * @param {MouseEvent|TouchEvent} e 
     */
    drag(e) {
        if (this.origin) {
            let point = e.touches ? e.touches[0] : e
            let translate = {
                x: point.screenX - this.origin.x,
                y: point.screenY - this.origin.y
            }
            if (e.touches && Math.abs(translate.x) > Math.abs(translate.y)) {
                e.preventDefault()
                e.stopPropagation()
            }
            let baseTranslate = this.carousel.currentItem * -100 / this.carousel.items.length
            this.lastTranslate = translate
            this.carousel.translate(baseTranslate + 100 * translate.x / this.width)
        }
    }

    /**
     * Gérer la fin du déplacement
     * @param {MouseEvent|TouchEvent} e
     */
    endDrag(e) {
        if (this.origin && this.lastTranslate) {
            this.carousel.enableTransition()
            if (Math.abs(this.lastTranslate.x / this.carousel.carouselWidth) > 0.2) {
                if (this.lastTranslate.x < 0) {
                    this.carousel.next()
                } else {
                    this.carousel.prev()
                }
            } else {
                this.carousel.gotoItem(this.carousel.currentItem)
            }
        }
        this.origin = null
    }
}

class Carousel {

    /**
     * 
     * @callback moveCallback
     * @param {number} index 
     */

    /**
     * 
     * @param {HTMLElement} element 
     * @param {Object} options 
     * @param {Object} [options.slidesToScroll = 2] Nombre d'éléments à faire défiler
     * @param {Object} [options.slidesVisible = 2] Nombre d'éléments visible dans un slide
     * @param {boolean} [options.loop = false] Doit-on boucler en fin de carousel ?
     * @param {boolean} [options.infinite = true] Est ce que le carousel doit défiler à l'infini ?
     * @param {boolean} [options.pagination = false] Doit-on afficher une pagination ?
     * @param {boolean} [options.navigation = true] Doit-on activer la navigation ?
     * @param {boolean} [options.touch = false] Doit-on activer la navigation ?
     */
    constructor(element, options = {}) {
        //
        this.element = element
        //Object.assign nous permet de fusionner les tableaux d'options, si les options ne sont pas définies, elles auront comme valeur celles par défaut
        this.options = Object.assign({}, {
            slidesToScroll: 1,
            slidesVisible: 1,
            loop: false,
            infinite: true,
            pagination: false,
            navigation: true,
            touch: false
        }, options)
        if (this.options.loop && this.options.infinite) {
            throw new Error("Un carousel ne peut être en loop et infinite")
        }
        let children = [].slice.call(element.children)
        this.isMobile = false
        this.currentItem = 0
        this.moveCallbacks = []
        this.offset = 0

        //Modification du DOM
        this.root = this.createDivWithClass('carousel')
        this.container = this.createDivWithClass('carouselContainer')
        this.root.setAttribute('tabindex', '0')
        this.root.appendChild(this.container)
        this.element.appendChild(this.root)
        this.items = children.map((child) => {
            let item = this.createDivWithClass('carouselItem')
            item.appendChild(child)
            return item
        })
        if (this.options.infinite) {
            this.offset = this.options.slidesToScroll + this.options.slidesVisible - 1
            if (this.offset > children.length) {
                throw new Error("Vous n'avez pas assez d'élément dans le carousel")
            }
            this.items = [
                ...this.items.slice(this.items.length - this.offset).map(item => item.cloneNode(true)),
                ...this.items,
                ...this.items.slice(0, this.offset).map(item => item.cloneNode(true))
            ]
            this.gotoItem(this.offset, false)
        }
        this.items.forEach(item => this.container.appendChild(item))
        this.setStyle()
        if (this.options.navigation) {
            this.createNavigation()
        }
        if (this.options.pagination) {
            this.createPagination()
        }

        //Evenements
        this.moveCallbacks.forEach(cb => cb(this.currentItem))
        this.onWindowResize()
        window.addEventListener('resize', this.onWindowResize.bind(this))
        this.root.addEventListener('keyup', (e) => {
            if (e.key === 'ArrowRight' || e.key === 'Right') {
                this.next()
            } else if (e.key === 'ArrowLeft' || e.key === 'Left') {
                this.prev()
            }
        })
        if (this.options.infinite) {
            this.container.addEventListener('transitionend', this.resetInfinite.bind(this))
        }
        if (this.options.touch) {
            new CarouselTouchPlugin(this)
        }
    }

    /**
     * Applique les bonnes dimensions aux éléments du carousel
     */
    setStyle() {
        let ratio = this.items.length / this.slidesVisible
        this.container.style.width = (ratio * 100) + '%'
        this.items.forEach(item => item.style.width = ((100 / this.slidesVisible) / ratio) + "%")
    }

    /**
     * Nous permet de gérer la navigation du carousel
     */
    createNavigation() {
        let nextButton = this.createDivWithClass('carouselNext')
        nextButton.innerHTML = ''
        let prevButton = this.createDivWithClass('carouselPrev')
        this.root.appendChild(nextButton)
        this.root.appendChild(prevButton)
        nextButton.addEventListener('click', this.next.bind(this))
        prevButton.addEventListener('click', this.prev.bind(this))
        if (this.options.loop === true) {
            return
        }
        this.onMove(index => {
            if (index === 0) {
                prevButton.classList.add('carouselPrev-hidden')
            } else {
                prevButton.classList.remove('carouselPrev-hidden')
            }
            if (this.items[this.currentItem + this.slidesVisible] === undefined) {
                nextButton.classList.add('carouselNext-hidden')
            } else {
                nextButton.classList.remove('carouselNext-hidden')
            }
        })
    }

    /**
     * Nous permet de créer un système de pagination sur le carousel
     */
    createPagination() {
        let pagination = this.createDivWithClass('carouselPagination')
        let buttons = []
        this.root.appendChild(pagination)
        for (let i = 0; i < (this.items.length - 2 * this.offset); i = i + this.options.slidesToScroll) {
            let button = this.createDivWithClass('carouselPaginationButton')
            button.addEventListener('click', () => this.gotoItem(i + this.offset))
            pagination.appendChild(button)
            buttons.push(button)
        }
        this.onMove(index => {
            let count = this.items.length - 2 * this.offset
            let activeButton = buttons[Math.floor((index - this.offset) % count / this.options.slidesToScroll)]
            if (activeButton) {
                buttons.forEach(button => button.classList.remove('carouselPaginationButton-active'))
                activeButton.classList.add('carouselPaginationButton-active')
            }
        })
    }

    translate(percent) {
        this.container.style.transform = 'translate3d(' + percent + '%, 0, 0)'
    }

    /**
     * Aller à l'item suivant
     */
    next() {
        this.gotoItem(this.currentItem + this.slidesToScroll)
    }

    /**
     * Aller à l'item précédant
     */
    prev() {
        this.gotoItem(this.currentItem - this.slidesToScroll)
    }

    /**
     * Déplace le carousel vers l'élement ciblé
     * @param {number} index 
     * @param {boolean} [animation = true] Veux t'on une animation ? 
     */
    gotoItem(index, animation = true) {
        if (index < 0) {
            if (this.options.loop) {
                if (index === 0 - this.slidesToScroll) {
                    index = this.items.length - this.slidesVisible
                } else {
                    index = 0
                }
                // 1 (-2) -> 0
                // 2 (-3) -> 0
            } else {
                return
            }
        } else if (index >= this.items.length || (this.items[this.currentItem + this.slidesVisible] === undefined) && index > this.currentItem) {
            if (this.options.loop) {
                index = 0
            } else {
                return
            }
        }
        let translateX = index * -100 / this.items.length
        if (animation === false) {
            this.disableTransition()
        }
        this.translate(translateX)
        this.container.offsetHeight //force le repaint
        if (animation === false) {
            this.enableTransition()
        }
        this.currentItem = index
        this.moveCallbacks.forEach(cb => cb(index))

    }

    /**
     * Déplace les items pour simuler un défilement infini
     */

    resetInfinite() {
        if (this.currentItem <= this.options.slidesToScroll) {
            this.gotoItem(this.currentItem + this.items.length - 2 * this.offset, false)
        } else if (this.currentItem >= this.items.length - this.offset) {
            this.gotoItem(this.currentItem - (this.items.length - 2 * this.offset), false)
        }
    }

    /**
     * Désactive les transitions
     */
    disableTransition() {
        this.container.style.transition = 'none'
    }

    /**
     * Active les transitions
     */
    enableTransition() {
        this.container.style.transition = ''
    }

    /**
     * 
     * @param {moveCallback} cb
     */
    onMove(cb) {
        this.moveCallbacks.push(cb)
    }

    onWindowResize() {
        let mobile = window.innerWidth < 800
        if (mobile !== this.isMobile) {
            this.isMobile = mobile
            this.setStyle()
            this.moveCallbacks.forEach(cb => cb(this.currentItem))
        }
    }

    /**
     * 
     * @param {string} className 
     * @returns {HTMLElement}
     */
    createDivWithClass(className) {
        let div = document.createElement('div')
        div.setAttribute('class', className)
        return div
    }

    /**
     * @returns {number}
     */
    get slidesToScroll() {
        return this.isMobile ? 1 : this.options.slidesToScroll
    }
    /**
     * @returns {number}
     */
    get slidesVisible() {
        return this.isMobile ? 1 : this.options.slidesVisible
    }
    /**
     * @returns {number}
     */
    get containerWidth() {
        return this.container.offsetWidth
    }

    /**
     * @returns {number} 
     */
    get carouselWidth() {
        return this.root.offsetWidth
    }
}


