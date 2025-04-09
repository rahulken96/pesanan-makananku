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
        Schema::create('foods', function (Blueprint $table) {
            $table->id();
            $table->int('categories_id')->constrained('categories')->cascadeOnDelete();
            $table->string('name');
            $table->string('description');
            $table->string('image');
            $table->double('price');
            $table->double('price_afterdiscount')->nullable();
            $table->double('percent')->nullable();
            $table->tinyInteger('is_promo')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('foods');
    }
};
