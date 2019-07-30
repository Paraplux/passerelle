<form name="fiche" action="/governator/master/{{ $model }}/edit/{{ $id }}" method="POST">
    {{ csrf_field() }}
    <br>
    <h1 class="title-3">Ajoutez vos fiches actions grâce à ce formulaire</h1>
    <p class="text-muted text-danger"><i class="fas fa-exclamation-circle"></i> Attention, pensez à créer vos branches, structures et labels s'ils ne sont pas déjà créés ! </p>
    <div class="form-group">
        <label for="name">Libellé de l'action</label>
        <input value="{{ $data['fiche']->name }}" type="text" name="name" placeholder="Entrez le libellé de l'action..." id="name">
    </div>
    <div class="form-group keyword">
        <label for="keyword">Verbe d'action</label>
        <div><i data-value="1" class="keyword-button fa fa-bullhorn"></i><div class="keyword-label">Sensibiliser</div></div>
        <div><i data-value="2" class="keyword-button fa fa-graduation-cap"></i><div class="keyword-label">Se former</div></div>
        <div><i data-value="3" class="keyword-button far fa-handshake"></i><div class="keyword-label">Accompagner</div></div>
        <div><i data-value="4" class="keyword-button far fa-lightbulb"></i><div class="keyword-label">Innover</div></div>
        <div><i data-value="5" class="keyword-button fas fa-brain"></i><div class="keyword-label">Apprendre</div></div>
        <div><i data-value="6" class="keyword-button far fa-hand-pointer"></i><div class="keyword-label">Utiliser</div></div>
        <div><i data-value="7" class="keyword-button fas fa-hands"></i><div class="keyword-label">Partager</div></div>
        <input class="old-keyword-input" value="{{ $data['fiche']->keyword_id }}" type="hidden">
        <input class="keyword-input" value="{{ $data['fiche']->keyword_id }}" type="hidden" name="keyword_id" id="keyword">
        <p class="text-muted"><i class="fas fa-exclamation-circle"></i> Choisissez le verbe d'action auquel votre fiche action se rapporte ! </p>
    </div>
    <div class="form-group secteur">
        <label for="secteur">Secteur d'activité de la formation</label>
        <select name="secteur_id" id="secteur">
            <option value="">- Selectionnez un secteur -</option>
            @foreach($data['secteur'] as $secteur)
            <option {{ $data['fiche']->secteur_id == $secteur->id ? 'selected' : '' }} value="{{ $secteur->id }}">{{ $secteur->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="fiche_ckeditor_1">Description</label>
        <textarea name="content" id="fiche_ckeditor_1">{{ $data['fiche']->content }}</textarea>
    </div>
    <div class="form-group">
        <label for="fiche_ckeditor_2">Programme</label>
        <textarea name="program" id="fiche_ckeditor_2">{{ $data['fiche']->program }}</textarea>
    </div>
    <div class="form-group">
            <label for="fiche_ckeditor_3">Outils</label>
            <textarea name="tools" id="fiche_ckeditor_3">{{ $data['fiche']->tools }}</textarea>
        </div>
    <div class="form-group">
        <label for="fiche_ckeditor_4">Pré requis</label>
        <textarea name="pre_requisite" id="fiche_ckeditor_4">{{ $data['fiche']->pre_requisite }}</textarea>
    </div>
    <div class="form-group">
        <label for="structure">Structure de l'action</label>
        <select name="structure_id" id="structure">
            <option value="">- Selectionnez une structure -</option>
            @foreach($data['structure'] as $structure)
            <option {{ $data['fiche']->structure_id == $structure->id ? 'selected' : '' }} value="{{ $structure->id }}">{{ $structure->name }} - {{ $structure->commune->nom_commune }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="labels">Labels de l'action</label>
        <p class="text-muted"><i class="fas fa-exclamation-circle"></i> Vous pouvez selectionner plusieurs labels ! </p>
        <select multiple name="label_id" id="">
            @foreach($data['label'] as $label)
            <option {{  in_array($label->id, $data['fiche_labels']) ? 'selected' : '' }} style="padding:10px 0 10px 50px; background-image: url({{ $label->logo }});" value="{{ $label->id }}">{{ $label->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="certification">Document de fin de formation</label>
        <input value="{{ $data['fiche']->certification }}" placeholder="Titre professionnel, Attestation de fin de formation, ..." type="text" name="certification" id="certification">
    </div>
    <div class="form-group">
        <div class="form-small-group">
            <span><label for="date">Début</label><input value="{{ $data['fiche']->date_start }}" type="date" name="date_start" id="date"></span>
            <span><label for="date">Fin</label><input value="{{ $data['fiche']->date_end }}" type="date" name="date_end" id="date"></span>
            <span><label for="duree">Durée (en heures)</label><input value="{{ $data['fiche']->duree }}" type="text" name="duree" id="duree"></span>
        </div>
    </div>
    <button type="submit">Mettre à jour</button>
</form>