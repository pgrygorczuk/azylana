@extends('layouts.az', [
    'village_id' => $village->id,
    'villages' => $villages ])


@section('main-view')
    @livewire('main-view', [
            'item_id' => $buildings[0]->id,
            'item_class' => 'App\Models\Building',
            'mid_table_id' => $buildingvillage->id,
            'mid_table_class' => 'App\Models\BuildingVillage',
        ])
@endsection


@section('main-panel')

    {{-- Show available buildings. --}}
    @foreach($buildings as $building)
        @livewire('action-button', [
            'item_id' => $building->id,
            'item_class' => 'App\Models\Building',
            'mid_table_id' => $buildingvillage->id,
            'mid_table_class' => 'App\Models\BuildingVillage',
        ])
    @endforeach

@endsection
