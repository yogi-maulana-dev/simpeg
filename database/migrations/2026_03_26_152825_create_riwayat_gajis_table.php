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
        Schema::create('riwayat_gajis', function (Blueprint $table) {
    $table->id('id_riwayat_gaji');
    $table->foreignId('id_pegawai')->constrained('pegawais', 'id_pegawai')->cascadeOnDelete();
    $table->foreignId('id_sk')->constrained('sks', 'id_sk')->cascadeOnDelete();

    $table->decimal('gaji_lama', 15, 2);
    $table->decimal('gaji_baru', 15, 2);
    $table->date('tanggal_berlaku');

    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('riwayat_gajis');
    }
};
