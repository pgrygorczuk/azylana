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
        Schema::create('buildings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('resource_id')->references('id')->on('resources')->onDelete('cascade');
            $table->string('name');
            $table->string('image1')->nullable();
            $table->string('description', 511)->nullable();
            $table->integer('seconds')->default(5)->comment('Time required for first level');
            $table->float('seconds_mul')->default(1.66)->comment('Time multiplier per level');
            $table->tinyInteger('max_level')->unsigned()->default(100);
            $table->tinyInteger('max_workers')->unsigned()->default(0)->comment('Max number of workers on first level');
            $table->mediumInteger('min_pop')->unsigned()->default(1)->comment('Free population required to start upgrade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buildings');
    }
};
