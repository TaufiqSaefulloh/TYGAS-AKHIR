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
        Schema::create('kategoridetails', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_kategori')->references('id')->on('categories');
            $table->string('judul');
            $table->string('video');
            $table->string('video1');
            $table->string('video2');
            $table->string('video3');
            $table->text('deskripsi');
            $table->text('file_pdf');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kategoridetails');
    }
};
