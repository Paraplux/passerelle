<form action="/governator/master/{{ $model }}/edit/{{ $id }}" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    <br>
    <h1 class="title-3">Ajoutez des signataires ou des partenaires grâce à ce formulaire</h1>
    <div class="form-group">
        <label for="name">Nom du partenaire</label>
        <input value="{{ $data['partenaire']->name }}" type="text" name="name" placeholder="Entrez le nom...">
    </div>
    <div class="form-group">
        <label for="website">Site web du partenaire</label>
        <input value="{{ $data['partenaire']->website }}" type="text" name="website" placeholder="Entrez l'url..." id="website">
    </div>
    <div class="form-group">
        <label for="email">Adresse Mail</label>
        <input value="{{ $data['partenaire']->mail }}" type="text" name="mail" placeholder="Entrez le mail..." id="email">
    </div>
    <div class="form-group">
        <label for="phone">Téléphone</label>
        <input value="{{ $data['partenaire']->phone }}" type="tel" name="phone" placeholder="01-02-03-04-05" id="phone">
    </div>
    <div class="form-group">
        <label for="adress">Adresse Postale</label>
        <input value="{{ $data['partenaire']->adress }}" type="text" name="adress" placeholder="Entrez l'adresse" id="adress">
    </div>
    <div class="form-group">
        <label for="city">Ville & Code Postal</label>
        <input type="hidden"
        name="commune_edit_value" 
        id="commune_edit_value"
        data-placeholder="{{ $data['partenaire']->commune->nom_commune }}, {{ $data['partenaire']->commune->code_postale }}"
        data-value="{{ $data['partenaire']->commune->id }}"
        value="{{ $data['partenaire']->commune->id }}">
        <input  data-data="/json/communes.json"
                data-search-in='nom_commune'
                data-visible-properties='["nom_commune","code_postale"]'
                data-selection-required='true'
                data-value-property='id',
                data-text-property="{nom_commune}, {code_postale}"
                data-min-length="1"
                class="flexdatalist" type="text" name="commune_id" placeholder="Ville, CP..." id="commune_id"><br>
    </div>
    <div class="form-group choice">
        <p>Signataire <input {{ $data['partenaire']->type === "signataire" ? 'checked' : '' }} type="radio" name="type" value="signataire"></p>
        <p>Partenaire <input {{ $data['partenaire']->type === "partenaire" ? 'checked' : '' }} type="radio" name="type" value="partenaire"></p>
    </div>
    <div class="form-group">
        <label for="logo">Logo du partenaire</label>
        <input type="file" name="logo" id="logo"><br>
    </div>
    
    <button type="submit">Modifier</button>
</form>