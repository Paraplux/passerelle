<table>
    <tr>
        <td>Nom</td>
        <td>Adresse Mail</td>
        <td>Site</td>
        <td>Logo</td>
        <td>Téléphone</td>
        <td>Adresse</td>
        <td>Ville</td>
    </tr>
    @if(!empty($data))
        @foreach($data as $item)
        <tr>
            <td>{{ $item->name }}</td>
            <td>{{ $item->mail }}</td>
            <td>{{ $item->website }}</td>
            <td>{{ $item->logo }}</td>
            <td>{{ $item->phone }}</td>
            <td>{{ $item->adress }}</td>
            <td>{{ $item->city }}</td>
        </tr>
        @endforeach
    @endif
</table>