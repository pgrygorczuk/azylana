@extends('layouts.az', [
    'village' => $village,
    'villages' => $villages ])


@section('main-view')
    @livewire('main-view')
@endsection


@section('main-panel')

    @foreach($village->buildings as $building)
        @if($building)

            @livewire('action-button', [
                'item_id' => $building->id,
                'item_class' => 'App\Models\Building',
                'mid_table_id' => $building->pivot->id,
                'mid_table_class' => 'App\Models\BuildingVillage',
            ])

        @endif
    @endforeach

@endsection
