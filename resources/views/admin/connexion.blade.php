@extends('administration-layout')


@section('content')

<div class="connexion-container">
    <form action="/governator/connexion" method="POST">
        {{ csrf_field() }}
    
        <h1 class="title-1">Connexion</h1>
            
        <div class="form-group">
            <label for="">Votre login ou votre adresse mail : </label>
            <input value="" type="text" name="login">
        </div>
        <div class="form-group">
                <label for="">Votre mot de passe : </label>
                <input value="" type="password" name="password">
        </div>
    
        <button type="submit">Envoyer</button>
    
    </form>
</div>
@endsection