//
// ──────────────────────────────────────────────────────────  ──────────
//   :::::: F U N C T I O N S : :  :   :    :     :        :          :
// ────────────────────────────────────────────────────────────────────
//

/**
 * Create a div with the specified class name
 * @param {string} className 
 */
function createDivWithClass(className) {
    const div = document.createElement('div')
    div.setAttribute('class', className)
    return div
}


/**
 * Create a element with the specified tag and class name
 * @param {string} tagName 
 * @param {string} className
 */
function createElemWithClass(tagName, className) {
    const element = document.createElement(tagName)
    element.setAttribute('class', className)
    return element
}