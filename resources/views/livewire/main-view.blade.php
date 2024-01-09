<div>
    <div class="item-name">{{ $item->name }}</div>
    @if($item->image1)
        <div class="item-image">
            <img src="{{ asset('img/'.$item->image1) }}" alt="">
        </div>
    @endif
    <div class="item-info">
        <table>
            <tr>
                <td>Population:</td>
                <td class="courier-new">{{ $item->population }}</td>
            </tr>
            <tr>
                <td>Growth:</td>
                <td class="courier-new">
                    {{ $item->growth }}
                </td>
            </tr>
            <tr>
                <td>Popularity:</td>
                <td class="courier-new">{{ $item->popularity }}%</td>
            </tr>
        </table>
    </div>
</div>