@extends('administration')

@section('create')

<form action="/governator/communications/faq/create" method="POST">
{{ csrf_field() }}
    <div class="form-group">
        <label for="question">Question</label>
        <input name="question" value="" type="text" placeholder="Entrez la question..." id="question">
    </div>
    <div class="form-group">
        <label for="faq_ckeditor">Réponse</label>
        <textarea name="reponse" id="faq_ckeditor"></textarea>
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