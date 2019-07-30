@extends('public-layout')

@section('title')
Nous contacter
@endsection

@section('style')
    <link rel="stylesheet" href="/css/contact.css">
    <link rel="stylesheet" href="/css/navigation.no-transparent.css">
@endsection

@section('content')
<form action="/nous-contacter" method="POST">
<h1 class="title-1">Nous contacter</h1>
{{ csrf_field() }}

    <div class="form-group">
        <label for="">Votre prénom : </label>
        <input type="text" name="lastname" placeholder="Jean">
    </div>
    <div class="form-group">
        <label for="">Votre nom : </label>
        <input type="text" name="firstname" placeholder="Dupont">
    </div>
    <div class="form-group">
        <label for="">Votre adresse mail : </label>
        <input type="email" name="mail" placeholder="votre@mail.fr">
    </div>
    <div class="form-group">
        <label for="">Vous êtes ?</label>
        <select name="category" id="">
            <option value="">-- Choisissez --</option>
            <option value="Professionel">Professionel</option>
            <option value="Particulier">Particulier</option>
            <option value="Etudiant">Etudiant</option>
            <option value="Autre">Autre</option>
        </select>
    </div>
    <div class="form-group">
        <p class="pointer"><i class="fas fa-exclamation-circle"></i> Vous souhaitez contacter un ou des organisme(s) en particulier ?</p>
        <label for="">Organisme(s)</label>
        <select multiple name="destinataire[]" id="">
            <optgroup label="Fondateurs">
                @foreach($fondateurs as $fondateur)
                <option style="padding:10px 0 10px 50px; background-image: url({{ $fondateur->logo }});" value="{{ $fondateur->mail }}">{{ $fondateur->name }}</option>
                @endforeach
            </optgroup>
            <optgroup label="Signataires">
                @foreach($signataires as $signataire)
                <option style="padding:10px 0 10px 50px; background-image: url({{ $signataire->logo }});"  value="{{ $signataire->mail }}">{{ $signataire->name }}</option>
                @endforeach
            </optgroup>
            <optgroup label="Partenaires">
                @foreach($partenaires as $partenaire)
                <option style="padding:10px 0 10px 50px; background-image: url({{ $partenaire->logo }});"  value="{{ $partenaire->mail }}">{{ $partenaire->name }}</option>
                @endforeach
            </optgroup>
        </select>
    </div>
    <div class="form-group">
        <label for="">Votre message : </label>
        <textarea name="message"></textarea>
    </div>
    <button type="submit">Envoyer</button>
    <br><br>
    <p class="text-muted">{{ $content->contact_text }}</p>
</form>
@endsection

@section('script')
<script src="/js/contact.js"></script>
@endsection