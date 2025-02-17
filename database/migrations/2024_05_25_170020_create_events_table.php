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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->string('judul');
            $table->string('tanggal');
            $table->string('waktu');
            $table->string('lokasi');
            $table->string('link_pendaftaran');
            $table->text('tentang');
            $table->text('hal');
            $table->text('narasumber');
            $table->text('syarat');
            $table->text('biaya');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
