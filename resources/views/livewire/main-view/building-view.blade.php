<div class="item-view-component">
    <div class="item-name">{{ $item->name }}</div>
    <div class="item-image">
        @if ($item->image1)
            <img src="{{ asset('img/'.$item->image1) }}" alt="">
        @endif
    </div>
    <div class="item-info">
        <p>{{ $item->description }}</p>

        <x-resources :resource="$resource" />

        <a href="{{ url("/build/$mid_table_item->id/$item->id") }}" class="button button-right">
            {{ $mid_table_item->level > 0 ? 'Upgrade' : 'Select new building' }}
        </a>
    </div>
</div>
