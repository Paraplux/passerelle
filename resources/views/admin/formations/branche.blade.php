@extends('administration')

@section('create')

<form action="/governator/formations/branche/create" method="POST">
{{ csrf_field() }}
    <div class="form-group">
        <label for="name">Entrez une nouvelle branche</label>
        <input type="text" name="name" placeholder="Développement web, Web design, etc" id="name"><br>
        <p class="text-muted"><i class="fas fa-question-circle"></i> Si votre offre de formation se diversifie, n'hésitez pas à créer une nouvelle branche afin de la retrouver lors de la création de vos fiches actions !</p>
    </div>
    <button type="submit">Ajouter</button>
</form>
@endsection


@section('edit')
<table>
    <tr>
        <td>Branche</td>
    </tr>
    <tr>
    @if(!empty($data))
        @foreach($data as $item)
            <td>{{ $item->name }}</td>
        @endforeach
    @endif
    </tr>
</table>
@endsection