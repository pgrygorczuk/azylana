<?php

namespace App\Http\Controllers;

use App\Models\Village;
use App\Models\Building;
use Illuminate\Http\Request;
use App\Models\BuildingVillage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class VillageController extends Controller
{
    public function index(Village $village=NULL)
    {
        $user = Auth::user();
        if( ! Village::where('user_id', $user->id)->exists() )
        {
            // Create a first village for user.
            $village = Village::createFirst($user);
        }
        elseif( ! $village )
        {
            if( session('curr_village_id') ){
                $village = Village::find(session('curr_village_id'));
            }
            else{
                $village = Village::where('user_id', $user->id)->first();
            }
        }

        if(!$village->hasBuildingSlot($locked = TRUE)){
            $village->addBuildingSlot($locked = TRUE);
        }

        session(['curr_village_id' => $village->id]);
        $villages = Village::where('user_id', $user->id)->orderBy('id')->get();
        return view('village.index')
            ->with('village', $village)
            ->with('villages', $villages)
            ->with('user', $user)
            ;
    }

    public function unlock(BuildingVillage $buildingvillage)
    {
        if( $buildingvillage->building_id == 1 )
        {
            $buildingvillage->level = 0;
            $buildingvillage->save();
            return redirect('/village/'.session('curr_village_id'));
        }
    }

    public function build(BuildingVillage $buildingvillage, Building $building=NULL)
    {
        if($building && $building->id > 1) # ID = 1 is for empty slot.
        {
            $result = $buildingvillage->upgrade($building);
            if($result)
                return redirect('/village/'.session('curr_village_id'));
            else
                return $this->index();
        }
        else
        {
            $user = Auth::user();
            $village = Village::where('id', $buildingvillage->village_id)->first();
            $villages = Village::where('user_id', $user->id)->orderBy('id')->get();
            $buildings = Building::where('id', '>', 1)->orderBy('id')->get();
            return view('village.build')
                ->with('village', $village)
                ->with('villages', $villages)
                ->with('building', $building)
                ->with('buildings', $buildings)
                ->with('buildingvillage', $buildingvillage);
        }
    }
}
