<div id="res-{{ $resource->id }}" class="resources">
    <span class="wood">
        <img src="{{ asset('img/wood.png') }}" alt="wood">
        <span
            @if ($autoincrement)
                class="autoincrement-wood"
                data-income="{{ $resource->wood_inc }}"
                data-value="{{ $resource->wood }}"
            @endif
            >
            {{ floor($resource->wood) }}
        </span>
    </span>
    <span class="clay">
        <img src="{{ asset('img/clay.png') }}" alt="clay">
        <span
            @if ($autoincrement)
                class="autoincrement-clay"
                data-income="{{ $resource->clay_inc }}"
                data-value="{{ $resource->clay }}"
            @endif
            >
            {{ floor($resource->clay) }}
        </span>
    </span>
    <span class="ore">
        <img src="{{ asset('img/ore.png') }}" alt="ore">
        <span
            @if ($autoincrement)
                class="autoincrement-ore"
                data-income="{{ $resource->ore_inc }}"
                data-value="{{ $resource->ore }}"
            @endif
            >
            {{ floor($resource->ore) }}
        </span>
    </span>
    <span class="stone">
        <img src="{{ asset('img/stone.png') }}" alt="stone">
        <span
            @if ($autoincrement)
                class="autoincrement-stone"
                data-income="{{ $resource->stone_inc }}"
                data-value="{{ $resource->stone }}"
            @endif
            >
            {{ floor($resource->stone) }}
        </span>
    </span>
    <span class="food">
        <img src="{{ asset('img/food.png') }}" alt="food">
        <span
            @if ($autoincrement)
                class="autoincrement-food"
                data-income="{{ $resource->food_inc }}"
                data-value="{{ $resource->food }}"
            @endif
            >
            {{ floor($resource->food) }}
        </span>
    </span>
</div>

@if ($autoincrement)
    @pushOnce('az-scripts')
    <script type="text/javascript">
        incrementResource(document.querySelectorAll('.autoincrement-wood'));
        incrementResource(document.querySelectorAll('.autoincrement-clay'));
        incrementResource(document.querySelectorAll('.autoincrement-ore'));
        incrementResource(document.querySelectorAll('.autoincrement-stone'));
        incrementResource(document.querySelectorAll('.autoincrement-food'));
    </script>
    @endPushOnce
@endif
