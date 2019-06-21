@extends('administration')

@section('create')

<form action="/governator/formations/fiche/create" method="POST">
{{ csrf_field() }}
    <br>
    <h1 class="title-3">Ajoutez vos fiches actions grâce à ce formulaire</h1>
    <p class="text-muted text-danger"><i class="fas fa-exclamation-circle"></i> Attention, pensez à créer vos branches, structures et labels s'ils ne sont pas déjà créés ! </p>
    <div class="form-group">
        <label for="name">Libellé de l'action</label>
        <input value="{{ $input->name ?? '' }}" type="text" name="name" placeholder="Entrez le libellé de l'action..." id="name">
    </div>
    <div class="form-group">
        <label for="branche">Branche de l'action</label>
        <select name="branche_id" id="branche">
            <option value="">- Selectionnez une branche -</option>
            @foreach($data['branches'] as $branche)
            <option {{ isset($input) && $branche->id == $input->branche_id ? 'selected' : '' }} value={{ $branche->id }}>{{ $branche->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="fiche_ckeditor_1">Description</label>
        <textarea name="content" id="fiche_ckeditor_1">{{ $input->content ?? '' }}</textarea>
    </div>
    <div class="form-group">
        <label for="fiche_ckeditor_2">Programme</label>
        <textarea name="program" id="fiche_ckeditor_2">{{ $input->program ?? '' }}</textarea>
    </div>
    <div class="form-group">
        <label for="fiche_ckeditor_3">Pré requis</label>
        <textarea name="pre_requisite" id="fiche_ckeditor_3">{{ $input->pre_requisite ?? '' }}</textarea>
    </div>
    <div class="form-group">
        <label for="structure">Structure de l'action</label>
        <select name="structure_id" id="structure">
            <option value="">- Selectionnez une structure -</option>
            @foreach($data['structures'] as $structure)
            <option {{ isset($input) && $structure->id == $input->structure_id ? 'selected' : '' }} value={{ $structure->id }}>{{ $structure->name }} - {{ $structure->commune->nom_commune }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="labels">Labels de l'action</label>
        <p class="text-muted"><i class="fas fa-exclamation-circle"></i> Vous pouvez selectionner plusieurs labels ! </p>
        <select multiple name="label_id" id="">
            @foreach($data['labels'] as $label)
            <option {{ isset($input) && $label->id == $input->label_id ? 'selected' : '' }} style="padding:10px 0 10px 50px; background-image: url({{ $label->logo }});" value={{ $label->id }}>{{ $label->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <div class="form-small-group">
            <span><label for="level">Niveau obtenu</label><input value="{{ $input->level ?? '' }}" placeholder="1, 2, 3, ..." type="number" name="level" id="level"><br></span>
            <span><label for="date">Début</label><input value="{{ $input->date_start ?? '' }}" type="date" name="date_start" id="date"></span>
            <span><label for="date">Fin</label><input value="{{ $input->date_end ?? ''}}" type="date" name="date_end" id="date"></span>
            <span><label for="duree">Durée (en heures)</label><input value="{{ $input->duree ?? ''}}" type="text" name="duree" id="duree"></span>
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
            <td>{{ $item->structure->name }} - {{ $item->structure->commune->nom_commune }}</td>
            <td><a href="/governator/edit/{{ $category }}/{{ $model }}/{{ $item->id }}" class="text-info">Editer</a> - 
                <a onclick="if(confirm('Souhaitez vous réellement supprimer cette fiche de la base de données ?')){return true;}else{return false;}" href="/governator/delete/{{ $model }}/{{ $item->id }}" class="text-danger">Supprimer</a></td>
        </tr>
        @endforeach
        @endif
    </tbody>
</table>
@endsection