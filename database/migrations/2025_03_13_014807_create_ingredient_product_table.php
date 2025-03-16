<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ingredient_product', function (Blueprint $table) {
            $table->id(); // Optional: primary key for the pivot table
            $table->foreignId('ingredient_id')->constrained()->onDelete('cascade');
            $table->foreignId('product_id')->constrained()->onDelete('cascade');
            $table->timestamps(); // Optional: adds created_at and updated_at columns
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ingredient_product');
    }
};