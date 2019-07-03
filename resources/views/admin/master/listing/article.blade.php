<table>
        <thead> 
            <tr>
                <th>Titre</th>
                <th>Auteur</th>
                <th>Publié le</th>
                <th>Edité le</th>
                <th>Dernier éditeur</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tfoot> 
            <tr>
                <th>Titre</th>
                <th>Auteur</th>
                <th>Publié le</th>
                <th>Edité le</th>
                <th>Dernier éditeur</th>
                <th>Actions</th>
            </tr>
        </tfoot>
        <tbody>
            @foreach($data as $item)
            <tr>
                <td title="{{ $item->title }}">{{ substr(strip_tags($item->title), 0, 35) . '...' }}</td>
                <td>{{ $item->author }}</td>
                <td>{{ $item->getDate('d-m-y') }}</td>
                <td>{{ $item->updated_at == $item->created_at ? '-' : $item->getUpdate('d-m-y')}}</td>
                <td>{{ $item->updated_by ?? $item->author }}</td>
                <td><a href="/governator/edit" class="text-info">Editer</a> - 
                    <a onclick="if(confirm('Souhaitez vous réellement supprimer cette fiche de la base de données ?')){return true;}else{return false;}" href="/governator/delete" class="text-danger">Supprimer</a></td>
            </tr>
            @endforeach
    
        </tbody>
    </table>