<table>
    <thead> 
        <tr>
            <th>Nom</th>
            <th>Début</th>
            <th>Fin</th>
            <th>Lieu</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tfoot> 
        <tr>
            <th>Nom</th>
            <th>Début</th>
            <th>Fin</th>
            <th>Lieu</th>
            <th>Actions</th>
        </tr>
    </tfoot>
    <tbody>
        @foreach($data['event'] as $item)
        <tr>
            <td>{{ $item->name }}</td>
            <td>{{ $item->getDateStart('\L\e d-m-Y à H:i') }}</td>
            <td>{{ $item->getDateEnd('\L\e d-m-Y à H:i') }}</td>
            <td>{{ $item->structure->name }} - {{ $item->structure->commune->nom_commune }}</td>
        <td><a onclick="if(confirm('Souhaitez vous réellement supprimer cette fiche de la base de données ?')){return true;}else{return false;}" href="/governator/delete/{{ $model }}/{{ $item->id }}" class="text-danger">Supprimer</a></td>
        </tr>
        @endforeach

    </tbody>
</table>