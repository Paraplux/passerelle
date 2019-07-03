<table>
    <tr>
        <td>Branche</td>
    </tr>
    @if(!empty($data))
    @foreach($data as $item)
        <tr>
            <td>{{ $item->name }}</td>
        </tr>
        @endforeach
    @endif
</table>