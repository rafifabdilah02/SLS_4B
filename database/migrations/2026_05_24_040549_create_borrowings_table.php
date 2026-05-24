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
        Schema::create('borrowings', function (Blueprint $table) {
            $table->id();
            
            // Mencatat ID Member yang meminjam (Terhubung ke tabel users)
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            
            // Mencatat ID Buku yang dipinjam (Terhubung ke tabel books)
            $table->foreignId('book_id')->constrained()->onDelete('cascade');
            
            // Mencatat status: apakah masih dipinjam atau sudah dikembalikan?
            $table->enum('status', ['dipinjam', 'dikembalikan'])->default('dipinjam');
            
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('borrowings');
    }
};
