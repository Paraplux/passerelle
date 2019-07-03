<table>
        <thead> 
            <tr>
                <th>Libellé</th>
                <th>Début</th>
                <th>Fin</th>
                <th>Lieu</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tfoot> 
            <tr>
                <th>Libellé</th>
                <th>Début</th>
                <th>Fin</th>
                <th>Lieu</th>
                <th>Actions</th>
            </tr>
        </tfoot>
        <tbody>
            @foreach($data as $item)
            <tr>
                <td>{{ $item->name }}</td>
                <td>{{ $item->date_start }}</td>
                <td>{{ $item->date_end }}</td>
                <td>{{ $item->structure->name }} - {{ $item->structure->commune->nom_commune }}</td>
                <td><a href="/governator/edit" class="text-info">Editer</a> - 
                    <a onclick="if(confirm('Souhaitez vous réellement supprimer cette fiche de la base de données ?')){return true;}else{return false;}" href="/governator/delete" class="text-danger">Supprimer</a></td>
            </tr>
            @endforeach

        </tbody>
    </table>