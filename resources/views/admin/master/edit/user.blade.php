<form action="/governator/master/{{ $model }}/edit/{{ $id }}" method="POST">
    {{ csrf_field() }}
    <br>
    <h1 class="title-3">Ajoutez des membres grâce à ce formulaire</h1>
    <div class="form-group">
        <label for="name">Nom</label>
        <input value="{{ $data['user']->nom }}" type="text" name="nom" placeholder="Entrez un nom...">
    </div>
    <div class="form-group">
        <label for="prenom">Prénom</label>
        <input value="{{ $data['user']->prenom }}" type="text" name="prenom" placeholder="Entrez un prénom..." id="prenom">
    </div> 
    <div class="form-group">
        <label for="login">Login</label>
        <input value="{{ $data['user']->login }}" type="text" name="login" placeholder="Entrez un login..." id="login">
    </div>
    <div class="form-group">
        <label for="password">Mot de Passe</label>
        <input type="password" name="password" placeholder="Changez le mot de passe..." id="password">
    </div>
    <div class="form-group">
        <label for="email">Adresse Mail</label>
        <input value="{{ $data['user']->mail }}" type="email" name="mail" placeholder="Entrez le mail..." id="email">
    </div>
    <div class="form-group">
        <label for="phone">Téléphone</label>
        <input value="{{ $data['user']->phone }}" type="text" name="phone" placeholder="Entrez un numéro de téléphone..." id="phone">
    </div>
    <p class="text-muted text-danger"><i class="fas fa-exclamation-circle"></i> Attention ! Le rôle &laquo;maître&raquo; offre la possibilité de gérer l'entièreté du site, utilisez le avec précaution.</p>
    <div class="form-group choice">
        <p>Maitre <input {{ $data['user']->role === "master" ? 'checked' : '' }} type="radio" name="role" value="master"></p>
        <p>Classique <input {{ $data['user']->role === "manager" ? 'checked' : '' }} type="radio" name="role" value="manager"></p>
    </div>
    
    <button type="submit">Mettre à jour</button>
</form>