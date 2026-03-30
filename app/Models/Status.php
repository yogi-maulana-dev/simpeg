<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;

    protected $table = 'statuses';
    protected $primaryKey = 'id_status';

    protected $fillable = [
        'nama_status',
    ];

    // Relasi: 1 Status punya banyak Pegawai
    public function pegawai()
    {
        return $this->hasMany(Pegawai::class, 'id_status', 'id_status');
    }
}