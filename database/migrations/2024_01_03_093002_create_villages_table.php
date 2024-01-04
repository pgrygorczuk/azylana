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
        Schema::create('villages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('resource_id')->references('id')->on('resources')->onDelete('cascade');
            $table->string('name');
            $table->mediumInteger('x')->unsigned();
            $table->mediumInteger('y')->unsigned();
            $table->float('population')->unsigned()->default(1.0);
            $table->float('popularity')->unsigned()->default(100.0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('villages');
    }
};
