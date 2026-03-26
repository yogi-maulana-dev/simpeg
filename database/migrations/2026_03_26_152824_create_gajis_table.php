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
  Schema::create('gajis', function (Blueprint $table) {
    $table->id('id_gaji');
    $table->foreignId('id_pegawai')->constrained('pegawais', 'id_pegawai')->cascadeOnDelete();
    $table->integer('bulan');
    $table->integer('tahun');
    $table->decimal('total_gaji', 15, 2)->default(0);
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gajis');
    }
};
