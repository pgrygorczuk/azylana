
<div class="item-view-component">
    <div class="item-name">{{ $building->name }}</div>
    <div class="item-image">
        @if ($building->image1)
            <img src="{{ asset('img/'.$building->image1) }}" alt="">
        @endif
    </div>
    <div class="item-info">
        {{ $building->description }}
        @if($buildingvillage)
            <a href="{{ url("/build/$buildingvillage->id/$building->id") }}" class="button button-right">
                {{ $buildingvillage->level > 0 ? 'Upgrade' : 'Add new building' }}
            </a>
        @endif
    </div>
</div>
