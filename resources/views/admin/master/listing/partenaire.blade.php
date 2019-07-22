<div class="listing-container">
    
        <a href="/governator/master/{{ $model }}/create">Soumettre une entrée</a>
    <table>
        <tr>
            <td>Nom</td>
            <td>Adresse Mail</td>
            <td>Site</td>
            <td>Téléphone</td>
            <td>Adresse</td>
            <td>Ville</td>
            <td>Actions</td>
        </tr>
        @if(!empty($data))
            @foreach($data['partenaire'] as $item)
            <tr>
                <td>{{ $item->name }}</td>
                <td>{{ $item->mail }}</td>
                <td>{{ $item->website }}</td>
                <td>{{ $item->phone }}</td>
                <td>{{ $item->adress }}</td>
                <td>{{ $item->commune->nom_commune }}</td>
                <td>
                    <a href="/governator/master/{{ $model }}/edit/{{ $item->id }}" class="text-info">Editer</a> -
                <a onclick="if(confirm('Souhaitez vous réellement supprimer cette entrée de la base de données ?')){return true;}else{return false;}" href="/governator/delete/{{ $model }}/{{ $item->id }}" class="text-danger">Supprimer</a>
                </td>
            </tr>
            @endforeach
        @endif
    </table>
</div>
