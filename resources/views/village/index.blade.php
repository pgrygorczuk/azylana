@extends('layouts.az', [
    'village_id' => $village->id,
    'villages' => $villages ])

@section('main-view')
    <div class="village-name">Name: {{ $village->name }}</div>
    <div class="village-info">
        <table>
            <tr>
                <td>Population:</td>
                <td class="courier-new">{{ $village->population }}</td>
            </tr>
            <tr>
                <td>Growth:</td>
                <td class="courier-new">
                    {{ $village->growth }}
                </td>
            </tr>
            <tr>
                <td>Popularity:</td>
                <td class="courier-new">{{ $village->popularity }}%</td>
            </tr>
        </table>
    </div>
@endsection

@section('main-panel')
    <div class="action-button" style="background-image: url({{asset('img/windmill1.jpg')}})">
        <div class="level">0</div>
    </div>
    <div class="action-button">
        <div class="level">0</div>
    </div>
    <div class="action-button">
        <div class="level">+</div>
    </div>
@endsection
