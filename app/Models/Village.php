<?php

namespace App\Models;

use App\Models\BuildingVillage;
use Illuminate\Foundation\Auth\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Village extends Model
{
    use HasFactory;

    public function buildings(): BelongsToMany
    {
        return $this->belongsToMany(Building::class)
                    ->withPivot('level');
    }

    protected function growth(): Attribute
    {
        return Attribute::make(
            get: fn(mixed $value, array $attrs) => round(
                ($attrs['popularity']**2 - $attrs['population']) / 100.0, 2),
        );
    }

    static function createFirst(User $user)
    {
        $resource = new Resource();
        $resource->save();

        $village = new Village();
        $village->user_id = $user->id;
        $village->resource_id = $resource->id;
        $village->name = "$user->name's village";
        $village->x = rand(0, 100);
        $village->y = rand(0, 100);
        $village->save();

        $vbuilding = new BuildingVillage();
        $vbuilding->village_id = $village->id;
        $vbuilding->building_id = 1;
        $vbuilding->level = 1;
        $vbuilding->save();

        return $village;
    }
}
