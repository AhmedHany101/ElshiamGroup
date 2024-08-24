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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('price');
            $table->integer('quantity');
            $table->string('image');
            $table->date('production_date');
            $table->date('expiry_date');
            $table->text('long_details');
            $table->text('short_details');
            $table->boolean('status')->default(false);
            $table->boolean('featured_product')->default(false);
            $table->string('category');
            $table->string('subcategories');
            $table->text('usage_details');
            $table->string('country_of_origin');
            $table->string('effective_material');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
