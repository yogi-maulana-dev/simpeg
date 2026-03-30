<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pegawai extends Model
{
    use SoftDeletes;

    protected $table = 'pegawais';
    protected $primaryKey = 'id_pegawai';

    protected $fillable = [
        'nip',
        'nama',
        'tanggal_lahir',
        'jenis_kelamin',
        'alamat',
        'no_hp',
        'email',
        'id_jabatan',
        'id_unit',
        'id_status',
        'id_golongan',
        'tanggal_masuk',
    ];

    // RELASI MASTER
    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class, 'id_jabatan', 'id_jabatan');
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class, 'id_unit', 'id_unit');
    }

    public function status()
    {
        return $this->belongsTo(Status::class, 'id_status', 'id_status');
    }

    public function golongan()
    {
        return $this->belongsTo(Golongan::class, 'id_golongan', 'id_golongan');
    }

    // RELASI TRANSAKSI
    public function absensi()
    {
        return $this->hasMany(Absensi::class, 'id_pegawai', 'id_pegawai');
    }

    public function gaji()
    {
        return $this->hasMany(Gaji::class, 'id_pegawai', 'id_pegawai');
    }

    public function cuti()
    {
        return $this->hasMany(Cuti::class, 'id_pegawai', 'id_pegawai');
    }

    public function sk()
    {
        return $this->hasMany(Sk::class, 'id_pegawai', 'id_pegawai');
    }

    public function riwayatGaji()
    {
        return $this->hasMany(RiwayatGaji::class, 'id_pegawai', 'id_pegawai');
    }

    public function riwayatJabatan()
    {
        return $this->hasMany(RiwayatJabatan::class, 'id_pegawai', 'id_pegawai');
    }

    // LOGIKA KENAIKAN GAJI 3 TAHUN
    public function layakNaikGaji(): bool
    {
        $skTerakhir = $this->sk()
            ->where('jenis_sk', 'Kenaikan Gaji')
            ->latest('tanggal_sk')
            ->first();

        if (!$skTerakhir) {
            return true;
        }

        return Carbon::parse($skTerakhir->tanggal_sk)
            ->addYears(3)
            ->lte(Carbon::now());
    }
}