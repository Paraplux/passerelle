<form action="/governator/manager/event/add" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    <br>
    <h1 class="title-3">Ajoutez vos évènements grâce à ce formulaire</h1>
    <div class="form-group">
        <label for="title">Nom de l'évènement</label>
        <input value="{{ old('name') }}" type="text" name="name" placeholder="Entrez un nom..." id="title">
    </div>
    <div class="form-group">
        <label for="event_ckeditor">Description de l'évènement</label>
        <textarea id="event_ckeditor" name="content">{{ old('content') }}</textarea>
    </div>
    <div class="form-group">
        <label for="structure">Structure de l'action</label>
        <select name="structure_id" id="structure">
            <option value="">- Selectionnez une structure -</option>
            @foreach($structures as $structure)
            <option {{ old('structure_id') == $structure->id ? 'selected' : '' }} value="{{ $structure->id }}">{{ $structure->name }} - {{ $structure->commune->nom_commune }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <div class="form-small-group">
            <span><label for="date">Date et heure du début</label><input value="{{ old('date_start') }}" type="datetime-local" name="date_start" id="date"></span>
            <span><label for="date">Date et heure de la fin</label><input value="{{ old('date_end') }}" type="datetime-local" name="date_end" id="date"></span>
        </div>
    </div>
    <button type="submit">Publier</button>
</form>