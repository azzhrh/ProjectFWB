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
        // Tabel users (Pengguna)
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->unsignedBigInteger('role_id');  // Foreign key to 'roles' table
            $table->timestamps();

            // Foreign Key ke roles (dari tabel terpisah)
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
        });

        // Tabel categories (Kategori Tanaman)
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->text('description')->nullable();
            $table->timestamps();
        });

        // Tabel plants (Tanaman)
        Schema::create('plants', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->integer('price');
            $table->integer('stock');
            $table->unsignedBigInteger('category_id');
            $table->string('image')->nullable();
            $table->timestamps();

            // Foreign Key ke categories
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });

        // Tabel transactions (Transaksi Pembelian)
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('plant_id');
            $table->integer('quantity');
            $table->integer('total_price');
            $table->timestamps();

            // Foreign Key ke users dan plants
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('plant_id')->references('id')->on('plants')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
        Schema::dropIfExists('plants');
        Schema::dropIfExists('categories');
        Schema::dropIfExists('users');
    }
};
