<form action="/governator/master/article/add" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    <br>
    <h1 class="title-3">Ajoutez vos articles grâce à ce formulaire</h1>
    <div class="form-group">
        <label for="title">Titre de l'article</label>
        <input value="{{ old('title') }}" type="text" name="title" placeholder="Entrez un titre..." id="title">
    </div>
    <div class="form-group">
        <label for="author">Auteur</label>
        <input value="{{ old('author') }}" type="text" name="author" placeholder="Personne connectée" id="author">
    </div>
    <div class="form-group">
        <label for="article_ckeditor">Contenu de l'article</label>
        <textarea id="article_ckeditor" name="content">{{ old('content') }}</textarea>
    </div>
    <div class="form-group">
        <label for="keyword_id">Verbe d'action traité par l'article</label>
        <select name="keyword_id" id="keyword_id">
            <option value="">- Selectionnez un verbe d'action -</option>
            @foreach($data['keyword'] as $keyword)
            <option {{ old('keyword_id') == $keyword->id ? 'selected' : '' }} value="{{ $keyword->id }}">{{ $keyword->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="thumb_1">Illustration 1</label>
        <input type="file" name="thumb_1">
        <label for="thumb_2">Illustration 2</label>
        <input type="file" name="thumb_2">
        <p class="text-muted"><i class="fas fa-exclamation-circle"></i> Attention, l'utilisation de deux images d'illustrations nécessite un texte d'une longueur minimale de <span class="text-danger">3000</span> caractères pour un rendu optimal.</p>
    </div>
    <div class="tags form-group">
        <label for="taginput">Tags</label><br>
        <div class="validated-tags"></div>
        <input list="tagList" class="flexdatalist" id="taginput" name="taginput" type="text" placeholder="Entrez vos tags...">
        <datalist id="tagList">
            @foreach($data['tag'] as $tag)
            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
            @endforeach
        </datalist>    
        <button id="addtag">Ajouter un tag</button>
    </div>
    <button type="submit">Publier</button>
</form>