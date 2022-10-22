@foreach($item->chunk(4) as $chunk)
    <tr>
        @foreach($chunk as $item)
            <td>
                <img
                    alt=""
                    src="{{ $item->logo }}"
                />
            </td>
        @endforeach
        @for($i = 4 - $chunk->count(); $i > 0; $i--)
            <td>&nbsp;</td>
        @endfor
    </tr>
@endforeach
