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
        Schema::create('meal_kits', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->integer('servings')->default(2);
            $table->integer('prep_time')->default(30); // in minutes
            $table->decimal('price', 10, 2);
            $table->string('cuisine_type')->nullable();
            $table->longText('image_url')->nullable();
            $table->text('ingredients')->nullable();
            $table->text('instructions')->nullable();
            $table->boolean('is_available')->default(true);
            $table->integer('stock')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('meal_kits');
    }
};
