<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('requirements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('building_id')->references('id')->on('buildings')->onDelete('cascade')->nullable();
            $table->foreignId('tech_id')->references('id')->on('techs')->onDelete('cascade')->nullable();
            $table->foreignId('req_building_id')->references('id')->on('buildings')->onDelete('cascade')->nullable()->comment('Required building');
            $table->foreignId('req_tech_id')->references('id')->on('techs')->onDelete('cascade')->nullable()->comment('Required technology');
            $table->tinyInteger('req_building_level')->unsigned()->default(1);
            $table->tinyInteger('req_tech_level')->unsigned()->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requirements');
    }
};
