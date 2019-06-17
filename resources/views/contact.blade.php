@extends('public-layout')

@section('title')
Nous contacter
@endsection

@section('style')
    <link rel="stylesheet" href="/css/contact.css">
    <link rel="stylesheet" href="/css/navigation.no-transparent.css">
@endsection

@section('content')
<form action="" method="POST">
<h1 class="title-1">Nous contacter</h1>
{{ csrf_field() }}

    <div class="form-group">
        <label for="">Votre prénom : </label>
        <input value="" type="text" name="lastname" placeholder="Jean">
    </div>
    <div class="form-group">
        <label for="">Votre nom : </label>
        <input value="" type="text" name="firstname" placeholder="Dupont">
    </div>
    <div class="form-group">
        <label for="">Votre adresse mail : </label>
        <input value="" type="email" name="mail" placeholder="votre@mail.fr">
    </div>
    <div class="form-group">
        <label for="">Vous êtes ?</label>
        <select name="" id="">
            <option value="">-- Choisissez --</option>
            <option value="">Professionel</option>
            <option value="">Particulier</option>
            <option value="">Etudiant</option>
            <option value="">Autre</option>
        </select>
    </div>
    <div class="form-group">
        <p class="pointer"><i class="fas fa-exclamation-circle"></i> Vous souhaitez contacter un ou des organisme(s) en particulier ?</p>
        <label for="">Organisme(s)</label>
        <select multiple name="" id="">
            <optgroup label="Fondateurs">
                @foreach($fondateurs as $fondateur)
                <option style="padding:10px 0 10px 50px; background-image: url({{ $fondateur->logo }});" value="">{{ $fondateur->name }}</option>
                @endforeach
            </optgroup>
            <optgroup label="Signataires">
                @foreach($signataires as $signataire)
                <option style="padding:10px 0 10px 50px; background-image: url({{ $signataire->logo }});"  value="">{{ $signataire->name }}</option>
                @endforeach
            </optgroup>
            <optgroup label="Partenaires">
                @foreach($partenaires as $partenaire)
                <option style="padding:10px 0 10px 50px; background-image: url({{ $partenaire->logo }});"  value="">{{ $partenaire->name }}</option>
                @endforeach
            </optgroup>
        </select>
    </div>
    <div class="form-group">
        <label for="">Votre message : </label>
        <textarea value="test" name="message"></textarea>
    </div>
    <button type="submit">Envoyer</button>
    <br><br>
    <p class="text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt neque amet nobis molestias. Ipsa, necessitatibus doloremque? Tempora quisquam, doloribus repellat quos iste molestiae deleniti dolores fugit, nisi velit vitae iure! Lorem, ipsum dolor sit amet consectetur adipisicing elit. Corporis quisquam explicabo deleniti deserunt mollitia nostrum ab quasi minus reiciendis obcaecati esse amet porro, aliquid, ducimus architecto veritatis dicta cumque voluptas!</p>
</form>
@endsection

@section('script')
<script src="/js/contact.js"></script>
@endsection