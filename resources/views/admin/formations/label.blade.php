@extends('administration')

@section('create')
<h1 class="title-1">Formations</h1>

<h2 class="title-2">Ajout d'un nouveau label</h2>

<form action="/governator/formations/label/create" method="POST">
{{ csrf_field() }}
    <div class="form-group">
        <input value="" type="text" name="name" placeholder="Nom du label">
        <input value="" type="text" name="website" placeholder="Site web du label">
    </div>
    <input type="text" name="logo" value="">
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