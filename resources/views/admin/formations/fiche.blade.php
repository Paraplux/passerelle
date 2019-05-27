@extends('administration')

@section('create')
<h1 class="title-1">Formations</h1>

<h2 class="title-2">Ajout d'une fiche formation</h2>

<form action="/governator/formations/fiche/create" method="POST">
{{ csrf_field() }}
    <div class="form-group">
        <input value="" type="text" name="name" placeholder="Libellé de l'action">
        <input value="2" type="text" name="branche_id">
    </div>
    <div class="form-group">
        <h2 class="title-4">Description</h2>
        <textarea value="test" name="content"></textarea>
    </div>
    <div class="form-group">
        <h2 class="title-4">Programme</h2>
        <textarea value="test" name="program"></textarea>
    </div>
    <div class="form-group">
        <h2 class="title-4">Pré-requis</h2>
        <textarea value="test" name="pre_requisite"></textarea>
    </div>
    <div class="form-group">
        <h2 class="title-4">Dates des actions / Début et Fin</h2>
        <input value="test" type="date" name="date_start"><br>
        <input value="test" type="date" name="date_end"><br>
    </div>
    <div class="form-group">
        <input value="" type="text" name="location" placeholder="Localisation de l'action"><br>
        <input value="3" type="text" name="level"><br>
    </div>
    <button type="submit">Ajouter</button>
</form>
@endsection

@section('edit')
<table>
    <tr>
        <td>Libellé</td>
        <td>Description</td>
        <td>Programme</td>
        <td>Début</td>
        <td>Fin</td>
        <td>Lieu</td>
        <td>Pré requis</td>
        <td>Niveau obtenu</td>
        <td>Branche</td>
    </tr>
    <tr>
    @if(!empty($data))
        @foreach($data as $item)
            <td>{{ $item->name }}</td>
            <td>{{ $item->content }}</td>
            <td>{{ $item->program }}</td>
            <td>{{ $item->date_start }}</td>
            <td>{{ $item->date_end }}</td>
            <td>{{ $item->location }}</td>
            <td>{{ $item->pre_requisite }}</td>
            <td>{{ $item->level }}</td>
            <td>{{ $item->branche->name }}</td>
        @endforeach
    @endif
    </tr>
</table>
@endsection