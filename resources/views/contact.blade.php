@extends('public-layout')

@section('title')
Nous contacter
@endsection

@section('style')
    <link rel="stylesheet" href="/css/contact.css">
    <link rel="stylesheet" href="/css/navigation.no-transparent.css">
@endsection

@section('content')
<h1 class="title-1">Nous contacter</h1>

<form action="" method="POST">
{{ csrf_field() }}
    <div class="form-group">
        <input value="" type="text" name="lastname" placeholder="Votre nom">
        <input value="" type="text" name="firstname" placeholder="Votre prénom">
    </div>
    <div class="form-group">
        <input value="" type="text" name="mail" placeholder="Votre mail">
        <input value="" type="text" name="status" placeholder="Vous êtes ?">
    </div>
    <div class="form-group">
        <textarea value="test" name="message"></textarea>
    </div>
    <button type="submit">Envoyer</button>
</form>
@endsection

@section('script')

@endsection