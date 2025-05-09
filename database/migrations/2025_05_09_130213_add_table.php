<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        // Tabel roles
        Schema::create('roles', function (Blueprint $table) {
            $table->id(); // INT AUTO_INCREMENT
            $table->enum('name', ['admin', 'petugas', 'user']);
            $table->timestamps();
        });

        // Tabel users
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // INT AUTO_INCREMENT
            $table->string('name'); // VARCHAR(255)
            $table->string('email')->unique(); // VARCHAR(255) UNIQUE
            $table->string('password'); // VARCHAR(255)
            $table->unsignedBigInteger('role_id'); // INT (relasi ke roles)
            $table->timestamps();

            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
        });

        // Tabel categories
        Schema::create('categories', function (Blueprint $table) {
            $table->id(); // INT AUTO_INCREMENT
            $table->string('name', 100); // VARCHAR(100)
            $table->text('description'); // TEXT
            $table->timestamps();
        });

        // Tabel plants
        Schema::create('plants', function (Blueprint $table) {
            $table->id(); // INT AUTO_INCREMENT
            $table->string('name'); // VARCHAR(255)
            $table->text('description'); // TEXT
            $table->integer('price'); // INT
            $table->integer('stock'); // INT
            $table->unsignedBigInteger('category_id'); // INT (relasi ke categories)
            $table->string('image'); // VARCHAR(255)
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });

        // Tabel transactions
        Schema::create('transactions', function (Blueprint $table) {
            $table->id(); // INT AUTO_INCREMENT
            $table->unsignedBigInteger('user_id'); // INT (relasi ke users)
            $table->unsignedBigInteger('plant_id'); // INT (relasi ke plants)
            $table->integer('quantity'); // INT
            $table->integer('total_price'); // INT
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('plant_id')->references('id')->on('plants')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('transactions');
        Schema::dropIfExists('plants');
        Schema::dropIfExists('categories');
        Schema::dropIfExists('users');
        Schema::dropIfExists('roles');
    }
};
