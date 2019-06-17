@extends('administration')

@section('create')

<form action="/governator/communications/article/create" method="POST">
{{ csrf_field() }}
        <div class="form-group">
            <label for="title">Titre de l'article</label>
            <input type="text" name="title" placeholder="Entrez un titre..." id="title">
        </div>
        <div class="form-group">
            <label for="author">Auteur</label>
            <input type="text" name="author" placeholder="Personne connectée" id="author">
        </div>
    <div class="form-group">
        <label for="article_ckeditor">Contenu de l'article</label>
        <textarea id="article_ckeditor" name="content"></textarea>
    </div>
    <div class="form-group">
        <label for="article_ckeditor">Illustration 1</label>
        <input type="file" name="thumb_1">
        <label for="article_ckeditor">Illustration 2</label>
        <input type="file" name="thumb_2">
        <p class="text-muted"><i class="fas fa-exclamation-circle"></i> Attention, l'utilisation de deux images d'illustrations nécessite un texte d'une longueur minimale de 1000 caractères</p>
    </div>
    <div class="tags form-group">
        <label for="taginput">Tags</label><br>
        <div class="validated-tags"></div>
        <input id="taginput" name="taginput" type="text" placeholder="Entrez vos tags...">
        <button id="addtag">Ajouter un tag</button>
    </div>
    <button type="submit">Publier</button>
</form>
@endsection

@section('edit')
<table>
    <tr>
        <td>Titre</td>
        <td>Contenu</td>
        <td>Auteur</td>
        <td>Illustration 1</td>
        <td>Illustration 2 (opt)</td>
        <td>Publié le</td>
        <td>Edité le</td>
        <td>Dernier éditeur</td>
    </tr>
    @if(!empty($data))
    @foreach($data as $item)
    <tr>
            <td>{{ $item->title }}</td>
            <td>{{ $item->getExtrait(50) }}</td>
            <td>{{ $item->author }}</td>
            <td>{{ $item->thumb_1 }}</td>
            <td>{{ $item->thumb_2 }}</td>
            <td>{{ $item->created_at }}</td>
            <td>{{ $item->edited_at }}</td>
            <td>{{ $item->edited_by }}</td>
    </tr>
    @endforeach
    @endif
</table>
@endsection