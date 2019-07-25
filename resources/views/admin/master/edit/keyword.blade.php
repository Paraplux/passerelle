<form action="/governator/master/label/add" method="POST" enctype="multipart/form-data">
{{ csrf_field() }}
    <div class="form-group">
        <label for="name">Nom du verbe d'action</label>
        <input value="{{ $data['keyword']->name }}" type="text" name="name" placeholder="Verbe d'action..." id="name">
    </div>
    <div class="form-group">
        <label for="survol">Texte de survol</label>
        <input value="{{ $data['keyword']->survol }}" type="text" name="survol" placeholder="Petit texte de survol.." id="survol">
    </div>
    <div class="form-group">
            <label for="clique">Texte de clique</label>
            <input value="{{ $data['keyword']->clique }}" type="text" name="clique" placeholder="Texte de clique.." id="clique">
        </div>
    <div class="form-group">
        <label for="thumb">Illustration du verbe d'action à utiliser pour les fiches : </label>
        <input type="file" name="thumb" id="thumb">
    </div>
    <button type="submit">Modifier</button>
</form>