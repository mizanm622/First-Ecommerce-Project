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
            $table->string('productName');
            $table->text('productShortDescription');
            $table->text('productLongDescription');
            $table->integer('price');
            $table->string('productCategoryName');
            $table->string('productSubcategoryName');
            $table->integer('productCategoryId');
            $table->integer('producSubcategoryId');
            $table->string('productImage');
            $table->string('slug');
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
