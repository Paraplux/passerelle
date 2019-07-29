<div class="create-container">

    <form action="/governator/master/engagement/edit" method="POST">
        {{ csrf_field() }}
        <br>
        <h1 class="title-3">Charte d'engagement Passerelle Numérique</h1>

        <h2 class="title-4">Introduction et conclusion : </h2>
        <div class="form-group">
            <label for="charte_ckeditor_1">Texte d'introduction : </label>
            <textarea id="charte_ckeditor_1" name="intro">{{ $data['engagement']->intro }}</textarea>
        </div>
        <div class="form-group">
            <label for="charte_ckeditor_2">Texte de conclusion : </label>
            <textarea id="charte_ckeditor_2" name="outro">{{ $data['engagement']->outro }}</textarea>
        </div>

        <button type="submit">Publier</button>
    </form>
</div>
