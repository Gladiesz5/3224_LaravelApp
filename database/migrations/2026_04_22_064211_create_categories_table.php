<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    #method up digunakan untuk membuat tabel baru di database dengan nama 'categories' yang memiliki kolom id, name, slug, dan timestamps.
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            #kolom slug digunakan untuk menyimpan versi URL-friendly dari nama kategori, dan memiliki constraint unique untuk memastikan bahwa setiap slug unik dalam tabel.
            $table->string('slug')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    #method down digunakan untuk menghapus tabel 'categories' dari database jika migrasi dibatalkan atau di-rollback.
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
