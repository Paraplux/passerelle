@extends('administration')

@section('create')
<h1 class="title-1">Communication</h1>

<h2 class="title-2">Ajout une nouvelle question dans la Foire aux Questions</h2>

<form action="/governator/communications/faq/create" method="POST">
{{ csrf_field() }}
    <input name="question" value="" type="text" placeholder="Question">
    <div class="form-group">
        <h2 class="title-4">Entrez la réponse</h2>
        <textarea name="reponse"></textarea>
    </div>
    <button type="submit">Ajouter la question</button>
</form>
@endsection

@section('edit')
<table>
    <tr>
        <td>Question</td>
        <td>Réponse</td>
        <td>Posée le</td>
    </tr>
    @if(!empty($data))
    @foreach($data as $item)
    <tr>
            <td>{{ $item->question }}</td>
            <td>{{ $item->reponse }}</td>
            <td>{{ $item->created_at }}</td>
    </tr>
    @endforeach
    @endif
</table>
@endsection