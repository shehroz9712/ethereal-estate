<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('floor_plans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('property_id')->constrained('properties')->cascadeOnDelete();
            $table->string('lot_collection')->default("33' Collection");
            $table->string('elevation')->nullable()->default('A / B');
            $table->string('name');
            $table->unsignedSmallInteger('beds')->default(4);
            $table->decimal('baths', 3, 1)->default(3.5);
            $table->unsignedInteger('sqft')->default(2240);
            $table->text('description')->nullable();
            $table->string('image_url')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('floor_plans');
    }
};
