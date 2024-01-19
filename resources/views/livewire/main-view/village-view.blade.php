<div class="item-view-component">
    <div class="item-name">{{ $item->name }}</div>
    <div class="item-image"></div>
    <div class="item-info">
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
        <x-resources :resource="$item->resource" :autoincrement="TRUE" />
    </div>
</div>

