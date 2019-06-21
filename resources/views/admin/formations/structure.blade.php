@extends('administration')

@section('create')
<form action="/governator/formations/structure/create" method="POST" enctype="multipart/form-data">
{{ csrf_field() }}
    <div class="form-group">
        <label for="name">Nom de la structure</label>
        <input value="{{ $input->name ?? '' }}" type="text" name="name" placeholder="Entrez le nom..." id="name">
    </div>
    <div class="form-group">
        <label for="website">Site web de la structure</label>
        <input value="{{ $input->website ?? '' }}" type="text" name="website" placeholder="Entrez l'url..." id="website">
    </div>
    <div class="form-group">
        <label for="email">Adresse Mail</label>
        <input value="{{ $input->mail ?? '' }}" type="text" name="mail" placeholder="Entrez le mail..." id="email">
    </div>
    <div class="form-group">
        <label for="phone">Téléphone</label>
        <input value="{{ $input->phone ?? '' }}" type="text" name="phone" placeholder="01-02-03-04-05" id="phone">
    </div>
    <div class="form-group">
        <label for="adress">Adresse Postale</label>
        <input value="{{ $input->adress ?? '' }}" type="text" name="adress" placeholder="Entrez l'adresse...">
    </div>
    <div class="form-group">
        <label for="commune_id">Ville</label>
        <input  data-data="/json/communes.json"
                data-search-in='nom_commune'
                data-visible-properties='["nom_commune","code_postale"]'
                data-selection-required='true'
                data-value-property='id',
                data-text-property="{nom_commune}, {code_postale}"
                data-min-length="1"
                class="flexdatalist" type="text" name="commune_id" placeholder="Entrée le lieu où se déroulera la formation..." id="commune_id"><br>
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
    <thead> 
        <tr>
            <th>Structure</th>
            <th>Adresse Mail</th>
            <th>Site Internet</th>
            <th>Téléphone</th>
            <th>Adresse</th>
            <th>Ville</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tfoot> 
        <tr>
            <th>Structure</th>
            <th>Adresse Mail</th>
            <th>Site Internet</th>
            <th>Téléphone</th>
            <th>Adresse</th>
            <th>Ville</th>
            <th>Actions</th>
        </tr>
    </tfoot>
    <tbody>
        @if(!empty($data))
        @foreach($data['structures'] as $item)
        <tr>
            <td>{{ $item->name }}</td>
            <td>{{ $item->mail }}</td>
            <td>{{ $item->website }}</td>
            <td>{{ $item->phone }}</td>
            <td>{{ $item->adress }}</td>
            <td>{{ $item->commune->nom_commune }}</td>
            <td><a href="/governator/edit/{{ $category }}/{{ $model }}/{{ $item->id }}" class="text-info">Editer</a> - 
                <a onclick="if(confirm('Souhaitez vous réellement supprimer cette fiche de la base de données ?')){return true;}else{return false;}" href="/governator/delete/{{ $model }}/{{ $item->id }}" class="text-danger">Supprimer</a></td>
        </tr>
        @endforeach
        @endif
    </tbody>
</table>
@endsection