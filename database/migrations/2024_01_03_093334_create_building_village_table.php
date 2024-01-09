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
        Schema::create('building_village', function (Blueprint $table) {
            $table->id();
            $table->foreignId('village_id')->references('id')->on('villages')->onDelete('cascade');
            $table->foreignId('building_id')->references('id')->on('buildings')->onDelete('cascade');
            $table->tinyInteger('level')->unsigned()->default(0);
            $table->timestamp('finished_at')->useCurrent();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('building_village');
    }
};
