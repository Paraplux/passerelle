@extends('administration')

@section('create')
<form action="/governator/formations/structure/create" method="POST">
{{ csrf_field() }}
    <div class="form-group">
        <label for="name">Nom de la structure</label>
        <input value="" type="text" name="name" placeholder="Entrez le nom..." id="name">
    </div>
    <div class="form-group">
        <label for="website">Site web de la structure</label>
        <input value="" type="text" name="website" placeholder="Entrez l'url..." id="website">
    </div>
    <div class="form-group">
        <label for="email">Adresse Mail</label>
        <input value="" type="text" name="mail" placeholder="Entrez le mail..." id="email">
    </div>
    <div class="form-group">
        <label for="phone">Téléphone</label>
        <input value="" type="text" name="phone" placeholder="01-02-03-04-05" id="phone">
    </div>
    <div class="form-group">
        <label for="adress">Adresse Postale</label>
        <input value="" type="text" name="adress" placeholder="Entrez l'adresse...">
    </div>
    <div class="form-group">
        <label for="city">Ville & Code Postale</label>
        <input value="" type="text" name="city" placeholder="Ville - 62000" id="city">
    </div>
    <div class="form-group">
        <label for="logo">Logo de la structure</label>
        <input type="file" name="logo" id="logo">
    </div>
    <button type="submit">Ajouter</button>
</form>
@endsection

@section('edit')
<table>
    <tr>
        <td>Structure</td>
        <td>Adresse Mail</td>
        <td>Site</td>
        <td>Logo</td>
        <td>Téléphone</td>
        <td>Adresse</td>
        <td>Ville</td>
    </tr>
    <tr>
    @if(!empty($data))
        @foreach($data as $item)
            <td>{{ $item->name }}</td>
            <td>{{ $item->mail }}</td>
            <td>{{ $item->website }}</td>
            <td>{{ $item->logo }}</td>
            <td>{{ $item->phone }}</td>
            <td>{{ $item->adress }}</td>
            <td>{{ $item->city }}</td>
        @endforeach
    @endif
    </tr>
</table>
@endsection