<form action="/governator/master/user/add" method="POST">
    {{ csrf_field() }}
    <br>
    <h1 class="title-3">Ajoutez des membres grâce à ce formulaire</h1>
    <div class="form-group">
        <label for="name">Nom</label>
        <input type="text" name="nom" placeholder="Entrez un nom...">
    </div>
    <div class="form-group">
        <label for="prenom">Prénom</label>
        <input type="text" name="prenom" placeholder="Entrez un prénom..." id="prenom">
    </div> 
    <div class="form-group">
        <label for="login">Login</label>
        <input type="text" name="login" placeholder="Entrez un login..." id="login">
    </div>
    <div class="form-group">
        <label for="password">Mot de Passe</label>
        <input type="password" name="password" placeholder="Entrez un mot de passe..." id="password">
    </div>
    <div class="form-group">
        <label for="email">Adresse Mail</label>
        <input type="email" name="mail" placeholder="Entrez le mail..." id="email">
    </div>
    <div class="form-group">
        <label for="phone">Téléphone</label>
        <input type="text" name="phone" placeholder="Entrez un numéro de téléphone..." id="phone">
    </div>
    <p class="text-muted text-danger"><i class="fas fa-exclamation-circle"></i> Attention ! Le rôle &laquo;maître&raquo; offre la possibilité de gérer l'entièreté du site, utilisez le avec précaution.</p>
    <div class="form-group choice">
        <p>Maitre <input type="radio" name="role" value="master"></p>
        <p>Classique <input type="radio" name="role" value="manager"></p>
    </div>
    
    <button type="submit">Ajouter</button>
</form>