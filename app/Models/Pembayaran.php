<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;
    protected $table = 'pembayarans';
    protected $fillable = [
        'id_petugas', 'nisn', 'tgl_bayar', 'bulan_bayar', 'id_spp', 'jumlah_bayar' 
    ];
    public $timestamps = false;

    public function nisnsiswa()
    {
        return $this->belongsTo(Siswa::class, 'nisn');
    }

    public function petugas()
    {
        return $this->belongsTo(Petugas::class, 'id_petugas');
    }

    public function filter($model, Request $request) {
        $siswa = Siswa::all();
        if ($request->has('nama_siswa')) {
            $siswa->where('nama_siswa', '>', $request->get('nama_siswa'));
        }

        return $siswa;
    }
}
