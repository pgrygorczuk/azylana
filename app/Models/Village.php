<?php

namespace App\Models;

use App\Models\BuildingVillage;
use Illuminate\Foundation\Auth\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Village extends Model
{
    use HasFactory;

    public function buildings(): BelongsToMany
    {
        return $this->belongsToMany(Building::class)
                    ->withPivot('id', 'level', 'finished_at')
                    ->orderBy('building_village.id');
    }

    public function resource(): BelongsTo
    {
        return $this->belongsTo(Resource::class);
    }

    protected function growth(): Attribute
    {
        return Attribute::make(
            get: fn(mixed $value, array $attrs) => round(
                ($attrs['popularity']**2 - $attrs['population']) / 100.0, 2),
        );
    }

    public function hasBuildingSlot($locked = TRUE)
    {
        return BuildingVillage::where('village_id', $this->id)
            ->where('level', $locked ? -1 : 0)->exists();
    }

    public function addBuildingSlot($locked = TRUE)
    {
        $bv = new BuildingVillage();
        $bv->village_id = $this->id;
        $bv->building_id = 1; # Empty field
        $bv->level = $locked ? -1 : 0;
        $bv->save();
    }

    static function createFirst(User $user)
    {
        $resource = Resource::create([
            'wood' => 100, 'clay' => 100, 'ore' => 50, 'stone' => 50, 'food' => 50,
            'wood_inc' => 400, 'clay_inc' => 400, 'ore_inc' => 400,
            'stone_inc' => 200, 'food_inc' => 100, 'type' => 'v',
        ]);

        $village = new Village();
        $village->user_id = $user->id;
        $village->resource_id = $resource->id;
        $village->name = "$user->name's village";
        $village->x = rand(0, 100);
        $village->y = rand(0, 100);
        $village->popularity = 100;
        $village->population = 1;
        $village->save();

        $vbuilding = new BuildingVillage();
        $vbuilding->village_id = $village->id;
        $vbuilding->building_id = 2;
        $vbuilding->level = 1;
        $vbuilding->save();

        $vbuilding = new BuildingVillage();
        $vbuilding->village_id = $village->id;
        $vbuilding->building_id = 1;
        $vbuilding->level = 0;
        $vbuilding->save();

        $vbuilding->replicate()->fill([ 'level' => -1 ])->save();

        return $village;
    }
}
