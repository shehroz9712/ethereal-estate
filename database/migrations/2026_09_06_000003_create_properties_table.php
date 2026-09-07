<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->foreignId('category_id')->nullable()->constrained('categories')->nullOnDelete();
            $table->foreignId('location_id')->nullable()->constrained('locations')->nullOnDelete();
            $table->string('city')->default('Bowmanville');
            $table->string('address')->nullable();
            $table->decimal('price', 12, 2)->nullable();
            $table->string('price_label')->nullable();
            $table->string('status')->default('selling_fast'); // for_sale, selling_fast, sold_out, upcoming
            $table->string('property_type')->default('Single Detached'); // Bungalow, Single Detached, Townhome, Condo
            $table->unsignedSmallInteger('bedrooms')->default(4);
            $table->decimal('bathrooms', 3, 1)->default(4.0);
            $table->unsignedSmallInteger('garage')->default(2);
            $table->unsignedInteger('sqft')->default(2000);
            $table->unsignedSmallInteger('balcony')->default(1);
            $table->text('short_description')->nullable();
            $table->longText('full_description')->nullable();
            $table->string('feature_line')->nullable();
            $table->json('specifications')->nullable();
            $table->decimal('latitude', 10, 7)->nullable();
            $table->decimal('longitude', 10, 7)->nullable();
            $table->string('developer')->nullable();
            $table->string('model_home_address')->nullable();
            $table->string('sales_centre_phone')->nullable();
            $table->string('completion_year')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_preconstruction')->default(true);
            $table->boolean('is_mls')->default(false);
            $table->boolean('is_active')->default(true);
            $table->integer('sort_order')->default(0);
            $table->timestamps();

            $table->index(['city', 'is_preconstruction', 'is_featured']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
