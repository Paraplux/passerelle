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
        <input list="tagList" class="flexdatalist" id="taginput" name="taginput" type="text" placeholder="Entrez vos tags...">
        <datalist id="tagList">
            @foreach($data['tags'] as $tag)
            <option value="{{ $tag->name }}"></option>
            @endforeach
        </datalist>    
        <button id="addtag">Ajouter un tag</button>
    </div>
    <button type="submit">Publier</button>
</form>


@endsection

@section('edit')
<table>
    <thead> 
        <tr>
            <th>Titre</th>
            <th>Auteur</th>
            <th>Publié le</th>
            <th>Edité le</th>
            <th>Dernier éditeur</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tfoot> 
        <tr>
            <th>Titre</th>
            <th>Auteur</th>
            <th>Publié le</th>
            <th>Edité le</th>
            <th>Dernier éditeur</th>
            <th>Actions</th>
        </tr>
    </tfoot>
    <tbody>
        @if(!empty($data))
        @foreach($data['articles'] as $item)
        <tr>
            <td>{{ $item->title }}</td>
            <td>{{ $item->author }}</td>
            <td>{{ $item->created_at }}</td>
            <td>{{ $item->updated_at == $item->created_at ? '-' : $item->updated_at}}</td>
            <td>{{ $item->updated_by ?? $item->author }}</td>
            <td><a href="#" class="text-info">Editer</a> - <a onclick="if(confirm('Souhaitez vous réellement supprimer cette fiche de la base de données ?')){return true;}else{return false;}" href="/governator/delete/{{ $model }}/{{ $item->id }}" class="text-danger">Supprimer</a></td>
        </tr>
        @endforeach
        @endif
    </tbody>
</table>
@endsection