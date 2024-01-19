<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Resource extends Model
{
   use HasFactory;
   protected $fillable = [
      'wood', 'clay', 'ore', 'stone', 'food',
      'wood_inc', 'clay_inc', 'ore_inc', 'stone_inc', 'food_inc',
      'type'
   ];

   protected static function boot(): void
   {
      parent::boot();
      DB::statement(
         "UPDATE resources SET ".
         "wood  = wood  + wood_inc  * TIMESTAMPDIFF(SECOND, updated_at, NOW()) / 3600, ".
         "clay  = clay  + clay_inc  * TIMESTAMPDIFF(SECOND, updated_at, NOW()) / 3600, ".
         "ore   = ore   + ore_inc   * TIMESTAMPDIFF(SECOND, updated_at, NOW()) / 3600, ".
         "stone = stone + stone_inc * TIMESTAMPDIFF(SECOND, updated_at, NOW()) / 3600, ".
         "food  = food  + food_inc  * TIMESTAMPDIFF(SECOND, updated_at, NOW()) / 3600, ".
         "updated_at = NOW() ".
         "WHERE `type` IN ('v')" );
   }

   public function gte(Resource $resource)
   {
      return $this->wood  >= $resource->wood  &&
             $this->clay  >= $resource->clay  &&
             $this->ore   >= $resource->ore   &&
             $this->stone >= $resource->stone &&
             $this->food  >= $resource->food;
   }

   public function subtract(Resource $resource)
   {
      $this->wood  -= $resource->wood;
      $this->clay  -= $resource->clay;
      $this->ore   -= $resource->ore;
      $this->stone -= $resource->stone;
      $this->food  -= $resource->food;
      $this->save();
   }
}
