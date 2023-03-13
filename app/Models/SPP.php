<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SPP extends Model
{
    use HasFactory;
    protected $table = 'spps';
    protected $guarded = [];
    public $timestamps = false;

    public function siswapembayaran()
    {
        return $this->hasManyThrough(Siswa::class, Pembayaran::class, 'spp_id', 'siswa_id');
    }
}
