<form action="/governator/master/{{ $model }}/edit/{{ $id }}" method="POST">
{{ csrf_field() }}
    <div class="form-group">
        <label for="reponse_ckeditor">Réponse</label>
        <textarea name="reponse" id="reponse_ckeditor">{{ $data['reponse']->reponse    }}</textarea>
    </div>
    <div class="form-group">
        <label for="pseudo">Pseudo</label>
        <input name="pseudo" value="{{ $data['reponse']->pseudo }}" type="text" id="pseudo">
    </div>
    <div class="form-group">
        <label for="mail">E-mail</label>
        <input name="mail" value="{{ $data['reponse']->mail }}" type="text" id="mail">
    </div>
    <button type="submit">Mettre à jour</button>
</form>