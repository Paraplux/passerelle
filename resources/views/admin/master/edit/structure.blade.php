<form action="/governator/master/{{ $model }}/edit/{{ $id }}" method="POST" enctype="multipart/form-data">
{{ csrf_field() }}
    <div class="form-group">
        <label for="name">Nom de la structure</label>
        <input value="{{ $data['structure']->name }}" type="text" name="name" placeholder="Entrez le nom..." id="name">
    </div>
    <div class="form-group">
        <label for="website">Site web de la structure</label>
        <input value="{{ $data['structure']->website }}" type="text" name="website" placeholder="Entrez l'url..." id="website">
    </div>
    <div class="form-group">
        <label for="email">Adresse Mail</label>
        <input value="{{ $data['structure']->mail }}" type="text" name="mail" placeholder="Entrez le mail..." id="email">
    </div>
    <div class="form-group">
        <label for="phone">Téléphone</label>
        <input value="{{ $data['structure']->phone }}" type="text" name="phone" placeholder="01-02-03-04-05" id="phone">
    </div>
    <div class="form-group">
        <label for="adress">Adresse Postale</label>
        <input value="{{ $data['structure']->adress }}" type="text" name="adress" placeholder="Entrez l'adresse...">
    </div>
    <div class="form-group">
        <label for="commune_id">Ville</label>
        <input type="hidden"
        name="commune_edit_value" 
        id="commune_edit_value"
        data-placeholder="{{ $data['structure']->commune->nom_commune }}, {{ $data['structure']->commune->code_postale }}"
        data-value="{{ $data['structure']->commune->id }}"
        value="{{ $data['structure']->commune->id }}">
        <input  data-data="/json/communes.json"
                data-search-in='nom_commune'
                data-visible-properties='["nom_commune","code_postale"]'
                data-selection-required='true'
                data-value-property='id',
                data-text-property="{nom_commune}, {code_postale}"
                data-min-length="1"
                class="flexdatalist" type="text" name="commune_id" placeholder="Entrée le lieu où se déroulera la formation..." id="commune_id"><br>
    </div>
    <div class="form-group">
        <label for="logo">Logo de la structure</label>
        <input type="file" name="logo" id="logo">
    </div>
    <button type="submit">Mettre à jour</button>
</form>