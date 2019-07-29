<form action="/governator/master/{{ $model }}/edit/{{ $id }}" method="POST">
{{ csrf_field() }}
    <div class="form-group">
        <label for="question">Question</label>
        <input name="question" value="{{ $data['faq']->question }}" type="text" placeholder="Entrez la question..." id="question">
    </div>
    <div class="form-group">
        <label for="faq_ckeditor">Réponse</label>
        <textarea name="reponse" id="faq_ckeditor">{{ $data['faq']->reponse }}</textarea>
    </div>
    <button type="submit">Mettre à jour</button>
</form>