@extends('layouts.az', [
    'village_id' => $village->id,
    'villages' => $villages ])

@section('main-view')
    @livewire('main-view', [
            'item'  => $village,
        ])
@endsection

@section('main-panel')

    @foreach($village->buildings as $building)
        @if($building)
            @livewire('action-button', [
                    'item'  => $building,
                    'level' => $building->pivot->level,
                ])
        @endif
    @endforeach

@endsection
