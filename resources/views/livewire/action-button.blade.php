<div wire:click="click" class="action-button"
    @if ($item->image1) style="background-image: url({{ asset('img/' . $item->image1) }})" @endif>
    @if ($mid_table_item->isLocked())
        <div class="locked">
            <img src="{{ asset('img/padlock.png') }}" alt="Padlock">
        </div>
    @endif
    <div id="timer-{{ $item->id }}" class="timer" end="{{ $mid_table_item->finished_at }}"></div>
    <div class="level">{{ $mid_table_item->level <= 0 ? 0 : $mid_table_item->level }}</div>
</div>

@if ($mid_table_item->finished_at > $now)
    @push('az-scripts')
    <script type="text/javascript">
        countdownTimer("timer-{{ $item->id }}");
    </script>
    @endpush
@endif
