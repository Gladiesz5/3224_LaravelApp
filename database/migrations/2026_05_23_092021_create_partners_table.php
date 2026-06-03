<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    #method up digunakan untuk membuat tabel baru di database dengan nama 'partners' yang memiliki kolom id, name, logo_url, dan timestamps.
    public function up(): void
    {
        Schema::create('partners', function (Blueprint $table) {

            $table->id();

            $table->string('name');

            $table->string('logo_url');

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    #method down digunakan untuk menghapus tabel 'partners' dari database jika migrasi dibatalkan atau di-rollback.
    public function down(): void
    {
        Schema::dropIfExists('partners');
    }
};