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
        Schema::create('plants', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('scientific_name')->nullable(); // Optional
            $table->text('description');
            $table->string('image_path')->nullable(); // Lebih deskriptif
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->integer('stock')->default(0);
            $table->decimal('price', 10, 2)->nullable(); // Optional
            $table->boolean('is_available')->default(true); // Status tersedia
            $table->timestamps();
            $table->softDeletes(); // Jika ingin fitur hapus sementara
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plants');
    }
};
