<?php

namespace App\Models;

use App\Models\Village;
use App\Models\Building;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class BuildingVillage extends Model
{
    use HasFactory;
    public $table = "building_village";
    protected $fillable = [
        'id', 'village_id', 'building_id', 'level', 'finished_at'];

    public function isLocked()
    {
        return $this->level < 0;
    }

    static function getBuildingsCount()
    {
        return BuildingVillage::where('village_id', session('curr_village_id'))
                              ->where('level', '>', -1)->count();
    }

    public function canBeUpgraded(Building $new_building=NULL)
    {
        // TODO: Check other requirements if any.
        return
            ! $this->isUnderConstruction() &&
            $this->hasResourcesForUpgrade($new_building);
    }

    public function isUnderConstruction(Building $new_building=NULL)
    {
        return $this->finished_at > Carbon::now();
    }

    public function hasResourcesForUpgrade(Building $new_building=NULL)
    {
        if( $new_building )
            $building = $new_building;
        else
            $building = Building::find($this->building_id);

        $level = $this->level + 1;
        $village = Village::find($this->village_id);

        return
            $village->resource->wood  >= $building->getRequiredResource('wood',  $level) &&
            $village->resource->clay  >= $building->getRequiredResource('clay',  $level) &&
            $village->resource->ore   >= $building->getRequiredResource('ore',   $level) &&
            $village->resource->stone >= $building->getRequiredResource('stone', $level) &&
            $village->resource->food  >= $building->getRequiredResource('food',  $level);
    }

    public function upgrade(Building $new_building=NULL)
    {
        if( !$this->canBeUpgraded($new_building) ) {
            return FALSE;
        }

        if( !$new_building ){
            $new_building = Building::find(1); # Construction field.
        }

        $this->level += 1;
        $this->building_id = $new_building->id;
        $this->finished_at = Carbon::now()->addSeconds(
            $new_building->getTimeToUpgrade($this->level) );
        $this->save();

        $village = Village::find($this->village_id);
        $village->resource->subtract(
            $new_building->getRequiredResources($this->level));

        return Carbon::createFromFormat('Y-m-d H:i:s', $this->finished_at)->timestamp;
    }
}
