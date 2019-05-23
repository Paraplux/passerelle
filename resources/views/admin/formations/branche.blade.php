@extends('administration')

@section('create')
<h1 class="title-1">Formations</h1>

<h2 class="title-2">Ajout d'une nouvelle branche</h2>

<form action="/governator/formations/branche/create" method="POST">
{{ csrf_field() }}
    <input value="Développement Web" type="text" name="name"><br>
    <button type="submit">Ajouter</button>
</form>
@endsection


@section('edit')
<table>
    <tr>
        <td>Branche</td>
    </tr>
    <tr>
        @foreach($data as $item)
            <td>{{ $item->name }}</td>
        @endforeach
    </tr>
</table>
@endsection