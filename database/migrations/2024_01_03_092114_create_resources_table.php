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
        Schema::create('resources', function (Blueprint $table) {
            $table->id();
            $table->float('wood')->unsigned()->default(0);
            $table->float('clay')->unsigned()->default(0);
            $table->float('ore')->unsigned()->default(0);
            $table->float('stone')->unsigned()->default(0);
            $table->float('food')->unsigned()->default(0);
            $table->float('wood_inc')->unsigned()->default(0);
            $table->float('clay_inc')->unsigned()->default(0);
            $table->float('ore_inc')->unsigned()->default(0);
            $table->float('stone_inc')->unsigned()->default(0);
            $table->float('food_inc')->unsigned()->default(0);
            $table->string('comment')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resources');
    }
};
