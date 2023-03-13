<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;
    protected $table = 'siswas';
    protected $guarded = [];
    public $timestamps = false;

    public function nisn()
    {
        return $this->hasMany(Pembayaran::class);
    }
    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas');
    }

    public function spp()
    {
        return $this->belongsTo(SPP::class, 'id_spp');
    }

}
