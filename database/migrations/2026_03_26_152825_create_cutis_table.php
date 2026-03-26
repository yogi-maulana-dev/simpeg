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
      Schema::create('cutis', function (Blueprint $table) {
    $table->id('id_cuti');
    $table->foreignId('id_pegawai')->constrained('pegawais', 'id_pegawai')->cascadeOnDelete();
    $table->date('tanggal_mulai');
    $table->date('tanggal_selesai');
    $table->string('jenis_cuti');
    $table->string('status')->default('Menunggu'); // Menunggu/Disetujui/Ditolak
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cutis');
    }
};
