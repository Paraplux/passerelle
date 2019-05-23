$(function() {

    //Récupérer le contenu
    const src = $('#second-picture').attr('src')
    $('#second-picture').remove()
    const content = $('#content').text().split(' ')
    const words = content.length
    const index = Math.round(words / 2)
    console.log(index)
    content.splice(index, 0, '<img id="second-picture" class="article-main-picture" src="' + src + '" alt="">')
    const newContent = content.join(' ')

    $('#second-picture').remove()
    $('#content').html(newContent)

})