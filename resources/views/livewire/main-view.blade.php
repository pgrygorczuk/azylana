<div class="item-view-component">
    <div class="item-name">{{ $item->name }}</div>
    <div class="item-image">
        @if ($item->image1)
            <img src="{{ asset('img/'.$item->image1) }}" alt="">
        @endif
    </div>
    <div class="item-info">
        @if( $item::class == 'App\Models\Village' )
            {{-- Village info --}}
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
        @else
            {{ $item->description }}
            <a href="" class="button button-right">
                {{ $level > 0 ? 'Upgrade' : 'Add new building' }}
            </a>
        @endif
    </div>
</div>
