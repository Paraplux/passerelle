<div class="listing-container">
    
        <a href="/governator/master/{{ $model }}/create">Soumettre une entrée</a>
    <table>
        <thead>
            <tr>
                <th>Nom</th>
                <th>Site Internet</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Nom</th>
                <th>Site Internet</th>
                <th>Actions</th>
            </tr>
        </tfoot>
        <tbody>
            @if(!empty($data))
            @foreach($data['label'] as $item)
            <tr>
                <td>{{ $item->name }}</td>
                <td>{{ $item->website }}</td>
                <td><a href="/governator/master/{{ $model }}/edit/{{ $item->id }}" class="text-info">Editer</a> -
                    <a onclick="if(confirm('Souhaitez vous réellement supprimer cette élément de la base de données ?')){return true;}else{return false;}" href="/governator/delete/{{ $model }}/{{ $item->id }}" class="text-danger">Supprimer</a></td>
            </tr>
            @endforeach
            @endif
        </tbody>
    </table>
</div>
