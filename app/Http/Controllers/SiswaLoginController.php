<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Pembayaran;
use Illuminate\Http\Request;

class SiswaLoginController extends Controller
{
    public function index(Request $request)
    {
        $siswa = Pembayaran::query();
        $siswa->when($request->nama_siswa, function ($query) use ($request){
            return $query->where('siswa.nama_siswa', 'like', '%'.$request->nama_siswa.'%');
        });
        $bayar = Pembayaran::orderBy('id', 'desc')->get();
        return view('history', compact('bayar'));
    }
}
