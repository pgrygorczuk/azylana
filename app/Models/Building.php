<?php

namespace App\Models;

use App\Models\Resource;
use App\Models\BuildingVillage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Building extends Model
{
    use HasFactory;

    public function villages(): BelongsToMany
    {
        return $this->belongsToMany(Village::class)
                    ->withPivot('id', 'level');
    }

    public function resource(): BelongsTo
    {
        return $this->belongsTo(Resource::class);
    }

    public function getRequiredResource($resource_type, $level=1)
    {
        return $this->resource->{$resource_type} *
            pow( $this->resource->{$resource_type.'_inc'}, $level);
    }

    public function getRequiredResources($level=1): Resource
    {
        if($this->id == 1)
        {
            // Cost of unlock empty slot depends on buildings count.
            $level = max(1, BuildingVillage::getBuildingsCount() - 1);
        }

        return $this->resource->replicate()->fill([
            'wood'  => $this->getRequiredResource('wood' , $level),
            'clay'  => $this->getRequiredResource('clay' , $level),
            'ore'   => $this->getRequiredResource('ore'  , $level),
            'stone' => $this->getRequiredResource('stone', $level),
            'food'  => $this->getRequiredResource('food' , $level),
        ]);
    }

    public function getTimeToUpgrade($level)
    {
        return $this->seconds * pow($this->seconds_mul, $level);
    }
}
