<form action="/governator/master/faq/add" method="POST">
{{ csrf_field() }}
    <div class="form-group">
        <label for="question">Question</label>
        <input name="question" value="" type="text" placeholder="Entrez la question..." id="question">
    </div>
    <div class="form-group">
        <label for="faq_ckeditor">Réponse</label>
        <textarea name="reponse" id="faq_ckeditor"></textarea>
    </div>
    <button type="submit">Ajouter la question</button>
</form>