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
      Schema::create('pegawais', function (Blueprint $table) {
    $table->id('id_pegawai');
  $table->string('nip', 30)->unique();
    $table->string('nama');
    $table->date('tanggal_lahir')->nullable();
    $table->enum('jenis_kelamin', ['L', 'P'])->nullable();
    $table->text('alamat')->nullable();
    $table->string('no_hp')->nullable();
    $table->string('email')->nullable();

    $table->foreignId('id_jabatan')->constrained('jabatans', 'id_jabatan');
    $table->foreignId('id_unit')->constrained('units', 'id_unit');
    $table->foreignId('id_status')->constrained('statuses', 'id_status');
    $table->foreignId('id_golongan')->constrained('golongans', 'id_golongan');

    $table->date('tanggal_masuk')->nullable();

      $table->softDeletes();

    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pegawais');
    }
};
