<form action="/governator/master/{{ $model }}/edit/{{ $id }}" method="POST" enctype="multipart/form-data">
{{ csrf_field() }}
    <div class="form-group">
        <label for="name">Nom du label</label>
        <input value="{{ $data['label']->name }}" type="text" name="name" placeholder="Entrez le nom..." id="name">
    </div>
    <div class="form-group">
        <label for="website">Site web du label</label>
        <input value="{{ $data['label']->website }}" type="text" name="website" placeholder="Entrez l'url..." id="website">
    </div>
    <div class="form-group">
        <label for="logo">Logo du label</label>
        <input type="file" name="logo" id="logo">
    </div>
    <button type="submit">Mettre à jour</button>
</form>