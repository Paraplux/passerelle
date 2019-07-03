<table>
    <thead> 
        <tr>
            <th>Structure</th>
            <th>Adresse Mail</th>
            <th>Site Internet</th>
            <th>Téléphone</th>
            <th>Adresse</th>
            <th>Ville</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tfoot> 
        <tr>
            <th>Structure</th>
            <th>Adresse Mail</th>
            <th>Site Internet</th>
            <th>Téléphone</th>
            <th>Adresse</th>
            <th>Ville</th>
            <th>Actions</th>
        </tr>
    </tfoot>
    <tbody>
        @if(!empty($data))
        @foreach($data as $item)
        <tr>
            <td>{{ $item->name }}</td>
            <td>{{ $item->mail }}</td>
            <td>{{ $item->website }}</td>
            <td>{{ $item->phone }}</td>
            <td>{{ $item->adress }}</td>
            <td>{{ $item->commune->nom_commune }}</td>
            <td><a href="" class="text-info">Editer</a> - 
                <a onclick="if(confirm('Souhaitez vous réellement supprimer cette fiche de la base de données ?')){return true;}else{return false;}" href="" class="text-danger">Supprimer</a></td>
        </tr>
        @endforeach
        @endif
    </tbody>
</table>