<form action="/governator/master/{{ $model }}/edit/{{ $id }}" method="POST">
{{ csrf_field() }}
    <div class="form-group">
        <label for="question">Question</label>
        <input name="question" value="{{ $data['question']->question }}" type="text" id="question">
    </div>
    <div class="form-group">
        <label for="pseudo">Pseudo</label>
        <input name="pseudo" value="{{ $data['question']->pseudo }}" type="text" id="pseudo">
    </div>
    <div class="form-group">
        <label for="mail">E-mail</label>
        <input name="mail" value="{{ $data['question']->mail }}" type="text" id="mail">
    </div>
    <div class="form-group">
        <label for="question_ckeditor">Détail</label>
        <textarea name="more" id="question_ckeditor">{{ $data['question']->more    }}</textarea>
    </div>
    <button type="submit">Mettre à jour</button>
</form>