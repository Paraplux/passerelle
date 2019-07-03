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
        @foreach($data as $item)
        <tr>
            <td>{{ $item->name }}</td>
            <td>{{ $item->website }}</td>
            <td><a href="" class="text-info">Editer</a> - 
                <a onclick="if(confirm('Souhaitez vous réellement supprimer cette élément de la base de données ?')){return true;}else{return false;}" href="/governator/delete/" class="text-danger">Supprimer</a></td>
        </tr>
        @endforeach
        @endif
    </tbody>
</table>