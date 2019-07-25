$(function() {
    function addTag() {
        var tag = $('#taginput').val()
        if (tag != '') {
            $('.validated-tags').append('<span>' + tag + '<i class="fas fa-times removetag"></i></span>')
            $('<input name="tags[]" type="hidden" value="' + tag + '" multiple>').insertAfter('.validated-tags')
            $('#taginput').val('')
        }
    }
    $(document).on('click', '#addtag', function (e) {
        addTag()
        e.preventDefault();
    })
    $(document).on('keypress', '.form-group.tags', function (e) {
        if (e.which == 13 || e.which == 44) {
            addTag()
            e.preventDefault()
        }
    })
    $(document).on('click', '.removetag', function () {
        var tag = $(this).parent().text()
        $(this).parent().remove()
        $('input[value="' + tag + '"]').remove()
    })
})