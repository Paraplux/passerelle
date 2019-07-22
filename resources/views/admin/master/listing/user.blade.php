<div class="listing-container">
    
        <a href="/governator/master/{{ $model }}/create">Soumettre une entrée</a>
    <table>
        <tr>
            <td>Nom</td>
            <td>Prénom</td>
            <td>Login</td>
            <td>Adresse Mail</td>
            <td>Rôle</td>
            <td>Actions</td>
        </tr>
        @if(!empty($data))
        @foreach($data['user'] as $item)
        <tr>
            <td>{{ $item->nom }}</td>
            <td>{{ $item->prenom }}</td>
            <td>{{ $item->login }}</td>
            <td>{{ $item->mail }}</td>
            <td>{{ $item->role }}</td>
            <td>
                <a href="/governator/master/{{ $model }}/edit/{{ $item->id }}" class="text-info">Editer</a> -
                <a onclick="if(confirm('Souhaitez vous réellement supprimer cette entrée de la base de données ?')){return true;}else{return false;}" href="/governator/delete/{{ $model }}/{{ $item->id }}" class="text-danger">Supprimer</a>
            </td>
        </tr>
        @endforeach
        @endif
    </table>
</div>
