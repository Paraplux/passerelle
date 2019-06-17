@extends('administration')

@section('create')

<form action="/governator/formations/fiche/create" method="POST">
{{ csrf_field() }}
    <div class="form-group">
        <label for="name">Libellé de l'action</label>
        <input type="text" name="name" placeholder="Entrez le libellé de l'action..." id="name">
    </div>
    <div class="form-group">
        <label for="branche">Branche de l'action</label>
        <select name="branche_id" id="">
            <option value="">- Selectionnez une branche -</option>
            @foreach($data['branches'] as $branche)
            <option value={{ $branche->id }}>{{ $branche->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="fiche_ckeditor_1">Description</label>
        <textarea name="content" id="fiche_ckeditor_1"></textarea>
    </div>
    <div class="form-group">
        <label for="fiche_ckeditor_2">Programme</label>
        <textarea name="program" id="fiche_ckeditor_2"></textarea>
    </div>
    <div class="form-group">
        <label for="fiche_ckeditor_3">Pré requis</label>
        <textarea name="pre_requisite" id="fiche_ckeditor_3"></textarea>
    </div>
    <div class="form-group">
        <label for="location">Localisation de l'action</label>
        <input type="text" name="location" placeholder="Entrée le lieu où se déroulera la formation..." id="location"><br>
    </div>
    <div class="form-group">
        <label for="labels">Labels de l'action</label>
        <select multiple name="label_id" id="">
            @foreach($data['labels'] as $label)
            <option style="padding:10px 0 10px 50px; background-image: url({{ $label->logo }});" value={{ $label->id }}>{{ $label->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <div class="form-small-group">
            <span><label for="level">Niveau obtenu</label><input placeholder="1, 2, 3, ..." type="number" name="level" id="level"><br></span>
            <span><label for="date">Début</label><input type="date" name="date_start" id="date"></span>
            <span><label for="date">Fin</label><input type="date" name="date_end" id="date"></span>
        </div>
    </div>
    <button type="submit">Ajouter</button>
</form>
@endsection

@section('edit')
<table>
    <thead> 
        <tr>
            <th>Libellé</th>
            <th>Début</th>
            <th>Fin</th>
            <th>Lieu</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tfoot> 
        <tr>
            <th>Libellé</th>
            <th>Début</th>
            <th>Fin</th>
            <th>Lieu</th>
            <th>Actions</th>
        </tr>
    </tfoot>
    <tbody>
        @if(!empty($data))
        @foreach($data['fiches'] as $item)
        <tr>
            <td>{{ $item->name }}</td>
            <td>{{ $item->date_start }}</td>
            <td>{{ $item->date_end }}</td>
            <td>{{ $item->location }}</td>
            <td><a href="#" class="text-info">Editer</a> - <a onclick="if(confirm('Souhaitez vous réellement supprimer cette fiche de la base de données ?')){return true;}else{return false;}" href="/governator/delete/{{ $model }}/{{ $item->id }}" class="text-danger">Supprimer</a></td>
        </tr>
        @endforeach
        @endif
    </tbody>
</table>
@endsection