@extends('administration')

@section('create')

<form action="/governator/formations/label/create" method="POST" enctype="multipart/form-data">
{{ csrf_field() }}
    <div class="form-group">
        <label for="name">Nom du label</label>
        <input type="text" name="name" placeholder="Entrez le nom..." id="name">
    </div>
    <div class="form-group">
        <label for="website">Site web du label</label>
        <input type="text" name="website" placeholder="Entrez l'url..." id="website">
    </div>
    <div class="form-group">
        <label for="logo">Logo du label</label>
        <input type="file" name="logo" id="logo">
    </div>
    <button type="submit">Ajouter</button>
</form>
@endsection

@section('edit')
<table>
    <thead> 
        <tr>
            <th>Nom</th>
            <th>Site Internet</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tfoot> 
        <tr>
            <th>Nom</th>
            <th>Site Internet</th>
            <th>Actions</th>
        </tr>
    </tfoot>
    <tbody>
        @if(!empty($data))
        @foreach($data['labels'] as $item)
        <tr>
            <td>{{ $item->name }}</td>
            <td>{{ $item->website }}</td>
            <td><a href="/governator/edit/{{ $category }}/{{ $model }}/{{ $item->id }}" class="text-info">Editer</a> - 
                <a onclick="if(confirm('Souhaitez vous réellement supprimer cette élément de la base de données ?')){return true;}else{return false;}" href="/governator/delete/{{ $model }}/{{ $item->id }}" class="text-danger">Supprimer</a></td>
        </tr>
        @endforeach
        @endif
    </tbody>
</table>
@endsection