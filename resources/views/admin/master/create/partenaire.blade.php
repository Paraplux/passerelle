<form action="/governator/master/partenaire/add" method="POST">
    {{ csrf_field() }}
    <br>
    <h1 class="title-3">Ajoutez des signataires ou des partenaires grâce à ce formulaire</h1>
    <div class="form-group">
        <label for="name">Nom du partenaire</label>
        <input type="text" name="name" placeholder="Entrez le nom...">
    </div>
    <div class="form-group">
        <label for="website">Site web du partenaire</label>
        <input type="text" name="website" placeholder="Entrez l'url..." id="website">
    </div>
    <div class="form-group">
        <label for="email">Adresse Mail</label>
        <input type="text" name="mail" placeholder="Entrez le mail..." id="email">
    </div>
    <div class="form-group">
        <label for="phone">Téléphone</label>
        <input type="tel" name="phone" placeholder="01-02-03-04-05" id="phone">
    </div>
    <div class="form-group">
        <label for="adress">Adresse Postale</label>
        <input type="text" name="adress" placeholder="Entrez l'adresse" id="adress">
    </div>
    <div class="form-group">
        <label for="city">Ville & Code Postal</label>
        <input type="text" name="city" placeholder="Ville - 62000" id="city">
    </div>
    <div class="form-group">
        <p>Signataire <input type="radio" name="type" value="signataire"></p>
        <p>Partenaire <input type="radio" name="type" value="partenaire"></p>
    </div>
    <div class="form-group">
        <label for="logo">Logo du partenaire</label>
        <input type="file" name="logo" id="logo"><br>
    </div>
    
    <button type="submit">Ajouter</button>
</form>