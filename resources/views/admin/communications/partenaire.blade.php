@extends('administration')

@section('create')
<h1 class="title-1">Communication</h1>

<h2 class="title-2">Ajout d'un nouveau partenaire</h2>

<form action="/governator/communications/partenaire/create" method="POST">
{{ csrf_field() }}
    <div class="form-group">
        <input value="" type="text" name="name" placeholder="Nom de la structure">
        <input value="" type="text" name="website" placeholder="Site web de la structure">
    </div>
    <div class="form-group">
        <input value="" type="text" name="mail" placeholder="Adresse mail">
        <input value="" type="text" name="phone" placeholder="Téléphone">
    </div>
    <div class="form-group">
        <input value="" type="text" name="adress" placeholder="Adresse"><br> 
        <input value="" type="text" name="city" placeholder="Ville"><br> 
    </div>
    <input value="" type="text" name="logo"><br>
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