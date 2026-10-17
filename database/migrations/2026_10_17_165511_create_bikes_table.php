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
        Schema::create('bikes', function (Blueprint $table) {
            $table->id();
            $table->string('brand');
            $table->string('type');
            $table->unsignedInteger('rent_price');
            $table->unsignedTinyInteger('gear_count');
            $table->string('image');
            $table->boolean('available')->default(true);
        });
    }

    
    public function down(): void
    {
        Schema::dropIfExists('bikes');
    }
};
