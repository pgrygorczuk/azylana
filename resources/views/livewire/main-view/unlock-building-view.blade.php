<div class="item-view-component">
    <div class="item-name">{{ $item->name }}</div>
    <div class="item-image">
        @if ($item->image1)
            <img src="{{ asset('img/'.$item->image1) }}" alt="">
        @endif
    </div>
    <div class="item-info">
        <p>Here you can prepare a new field for construction. As the best fields run out,
        it becomes more and more expensive to adjust the next ones.</p>

        <x-resources :resource="$resource" />

        <a href="{{ url("/unlock/$mid_table_item->id") }}" class="button button-right">
            Unlock
        </a>
    </div>
</div>
