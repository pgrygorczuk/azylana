<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BuildingVillage extends Model
{
    use HasFactory;
    public $table = "building_village";
    protected $fillable = ['level'];
}
