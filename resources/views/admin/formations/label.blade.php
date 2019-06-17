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
    <tr>
        <td>Label</td>
        <td>Logo</td>
        <td>Site</td>
    </tr>
    <tr>
    @if(!empty($data))
        @foreach($data as $item)
            <td>{{ $item->name }}</td>
            <td>{{ $item->logo }}</td>
            <td>{{ $item->website }}</td>
        @endforeach
    @endif
    </tr>
</table>
@endsection