<form action="/governator/master/{{ $model }}/edit/{{ $id }}" method="POST">
{{ csrf_field() }}
    <div class="form-group">
        <label for="name">Entrez un nouveau secteur d'activité</label>
        <input value="{{ $data['secteur']->name }}" type="text" name="name" placeholder="Développement web, Web design, etc" id="name"><br>
        <p class="text-muted"><i class="fas fa-question-circle"></i> Si votre offre de formation se diversifie, n'hésitez pas à créer un secteur afin de la retrouver lors de la création de vos fiches actions !</p>
    </div>
    <button type="submit">Modifier</button>
</form>