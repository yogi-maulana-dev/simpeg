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
     Schema::create('sks', function (Blueprint $table) {
    $table->id('id_sk');
    $table->foreignId('id_pegawai')->constrained('pegawais', 'id_pegawai')->cascadeOnDelete();
    $table->string('nomor_sk');
    $table->date('tanggal_sk');
    $table->string('jenis_sk'); // Kenaikan Gaji / Jabatan
    $table->string('file_sk')->nullable();
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sks');
    }
};
