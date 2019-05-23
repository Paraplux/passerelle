/**
 * Display the text of div like a type machine
 * @param {number} speed the speed of the animation
 */

function typewritter(speed) {

    //
    // ─── SETTING THE HTML CONTENT ───────────────────────────────────────────────────
    //


    //HTML Elements
    const typewriterElem = document.querySelector('.typewriter')
    const typewriterParent = typewriterElem.parentElement
    const typewriterContainer = createDivWithClass('typewriter-container')

    //Variables
    const string = typewriterElem.innerHTML
    const stringByWords = string.split(" ")

    //Setting the container
    typewriterParent.insertBefore(typewriterContainer, typewriterElem)

    //Putting each word in each div.word
    stringByWords.forEach(function (word) {
        //Creating the div.word
        let wordDiv = createDivWithClass('word')
        //Insert the word in the div.word
        typewriterContainer.appendChild(wordDiv).innerHTML = word
    })

    //Creating div.letter for each cut word 
    document.querySelectorAll('.word').forEach(function (parent) {
        //Cutting the word
        let letters = parent.innerHTML.split("")
        //Removing the word himself
        parent.innerHTML = ""
        //Putting each letter in div.letter in each div.word
        letters.forEach(function (child) {
            //Creating the div.letter
            let letterDiv = createDivWithClass('letter')
            //Insert the letter in the div.letter
            parent.appendChild(letterDiv).innerHTML = child
        })
    })

    //Removing the div.typewriter
    typewriterElem.remove()



    //
    // ─── SETTING THE STYLE ──────────────────────────────────────────────────────────
    //

    //Setting the display of each div and animate the "cursor"
    document.querySelectorAll('.letter').forEach(function (letter, index) {
        //Setting the display block of each letter and adding a border
        setTimeout(() => {
            letter.style.display = 'block'
            letter.style.borderRight = '1px solid #FFFFFF'
        }, speed * index)
        //Removing the border of the previous letter
        setTimeout(() => {
            letter.style.borderRight = '1px solid transparent'
        }, speed * (index + 1))
    })
    //Launche the animation of the blink when the typing has been done
    setTimeout(() => {
        document.querySelector('.word:last-of-type').style.animationPlayState = 'running'
    }, speed * document.querySelectorAll('.letter').length);
}

//Calling the function
typewritter(100)