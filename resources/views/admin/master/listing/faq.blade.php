<table>
    <tr>
        <td>Question</td>
        <td>Réponse</td>
        <td>Posée le</td>
    </tr>
    @if(!empty($data))
    @foreach($data as $item)
    <tr>
            <td>{{ $item->question }}</td>
            <td>{{ $item->reponse }}</td>
            <td>{{ $item->created_at }}</td>
    </tr>
    @endforeach
    @endif
</table>