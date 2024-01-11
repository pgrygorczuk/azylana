<div wire:click="click" class="action-button"
    @if ($item->image1)
        style="background-image: url({{ asset('img/'.$item->image1) }})"
    @endif >
    <div class="level">{{ $level }}</div>
</div>

