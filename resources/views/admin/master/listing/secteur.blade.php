<div class="listing-container">
    
        <a href="/governator/master/{{ $model }}/create">Soumettre une entrée</a>
    <table>
        <tr>
            <td>Branche</td>
            <td>Actions</td>
        </tr>
        @if(!empty($data))
        @foreach($data['secteur'] as $item)
            <tr>
                <td>{{ $item->name }}</td>
                <td>
                    <a href="/governator/master/{{ $model }}/edit/{{ $item->id }}" class="text-info">Editer</a> -
                    <a onclick="if(confirm('Souhaitez vous réellement supprimer cette entrée de la base de données ?')){return true;}else{return false;}" href="/governator/delete/{{ $model }}/{{ $item->id }}" class="text-danger">Supprimer</a>
                </td>
            </tr>
            @endforeach
        @endif
    </table>
</div>
