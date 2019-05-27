@extends('administration')

@section('create')
<h1 class="title-1">Communication</h1>

<h2 class="title-2">Ajout d'un article</h2>

<form action="/governator/communications/article/create" method="POST">
{{ csrf_field() }}
    <div class="form-group">
        <input value="" type="text" name="title" placeholder="Titre de l'article">
        <input value="" type="text" name="author" placeholder="Auteur de l'article">
    </div>
    <div class="form-group">
        <textarea value="test" name="content"></textarea>
    </div>
    <div class="form-group">
        <h2 class="title-4">Illustrations de l'article</h2>
        <input value="/images/landscape01.jpg" type="text" name="thumb_1">
        <input value="/images/landscape02.jpg" type="text" name="thumb_2">
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