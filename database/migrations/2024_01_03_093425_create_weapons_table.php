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
        Schema::create('weapons', function (Blueprint $table) {
            $table->id();
            $table->foreignId('resource_id')->references('id')->on('resources')->onDelete('cascade');
            $table->string('name');
            $table->string('image1')->nullable();
            $table->string('description', 511)->nullable();
            $table->string('seconds')->default(30)->comment('Time required for production');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('weapons');
    }
};
