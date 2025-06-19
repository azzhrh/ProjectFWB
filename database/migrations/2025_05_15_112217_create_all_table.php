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
       // 1. Categories
    Schema::create('categories', function (Blueprint $table) {
        $table->id();
        $table->string('name', 100);
        $table->text('description');
        $table->timestamps();
    });

    // 2. Plants (relasi ke categories)
    Schema::create('plants', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->text('description');
        $table->integer('price');
        $table->integer('stock');
        $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
        $table->string('image');
        $table->timestamps();
    });

    // 3. Transactions (relasi ke users dan plants)
    Schema::create('transactions', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
        $table->foreignId('plant_id')->constrained('plants')->onDelete('cascade');
        $table->integer('quantity');
        $table->integer('total_price');
        $table->timestamps();
    });
}
    public function down(): void
    {
     
        Schema::dropIfExists('transactions');
        Schema::dropIfExists('plants');
        Schema::dropIfExists('categories');

    }
};
