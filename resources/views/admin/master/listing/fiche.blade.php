<div class="listing-container">
    
        <a href="/governator/master/{{ $model }}/create">Soumettre une entrée</a>
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
                @foreach($data['fiche'] as $item)
                <tr>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->date_start }}</td>
                    <td>{{ $item->date_end }}</td>
                    <td>{{ $item->structure->name }} - {{ $item->structure->commune->nom_commune }}</td>
                    <td><a href="/governator/master/{{ $model }}/edit/{{ $item->id }}" class="text-info">Editer</a> -
                        <a onclick="if(confirm('Souhaitez vous réellement supprimer cette fiche de la base de données ?')){return true;}else{return false;}" href="/governator/delete/{{ $model }}/{{ $item->id }}" class="text-danger">Supprimer</a></td>
                </tr>
                @endforeach

            </tbody>
        </table>
</div>
