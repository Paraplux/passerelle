@extends('administration')

@section('create')

<form action="/governator/communications/partenaire/create" method="POST">
{{ csrf_field() }}
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
@endsection

@section('edit')
<table>
    <tr>
        <td>Nom</td>
        <td>Adresse Mail</td>
        <td>Site</td>
        <td>Logo</td>
        <td>Téléphone</td>
        <td>Adresse</td>
        <td>Ville</td>
    </tr>
    @if(!empty($data))
        @foreach($data as $item)
        <tr>
            <td>{{ $item->name }}</td>
            <td>{{ $item->mail }}</td>
            <td>{{ $item->website }}</td>
            <td>{{ $item->logo }}</td>
            <td>{{ $item->phone }}</td>
            <td>{{ $item->adress }}</td>
            <td>{{ $item->city }}</td>
        </tr>
        @endforeach
    @endif
</table>
@endsection