<?php

namespace App\Http\Controllers;

use App\Models\SPP;
use App\Models\Siswa;
use App\Models\Pembayaran;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datasiswa = Siswa::paginate(5);
        $pembayaran = Pembayaran::orderBy('id', 'desc')->get();;
        return view('pembayaran.index', compact('pembayaran', 'datasiswa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    public function input($id)
    {
        $pembayaran = Pembayaran::all();
        $siswa = Siswa::findorfail($id);
        $siswas = SPP::all();
        return view('pembayaran.entri', compact('siswa', 'pembayaran', 'siswas'));
    }

    public function pay(Request $request){
        // $this->validate($request, [
        //     'tgl_bayar' => 'required',
        //     'bulan_bayar' => 'required',
        //     'tahun_bayar' => 'required',
        //     'id_spp' => 'required',
        //     'jumlah_bayar' => 'required',
        // ]);
        $pembayaran = Pembayaran::all();
        $pay = Siswa::all();
        $datasiswa = Siswa::all();
        $tagihan = SPP::select('nominal')
        ->where('spps.id', '=', $request->siswa_id)
        ->get();

        foreach ($tagihan as $val) {
            $sisa = $val->nominal;
            $pay->sisa_tagihan = $sisa - $request->jumlah_bayar;
        }
        // $pembayaran->id_petugas = $request->id_petugas;
        // $pembayaran->nisn = $request->nisn;
        // $pembayaran->tgl_bayar = $request->tgl_bayar;
        // $pembayaran->bulan_bayar = $request->bulan_bayar;
        // $pembayaran->jumlah_bayar = $tagihan;
        // $pembayaran->save();
        Pembayaran::create([
            'id_petugas' => $request->id_petugas,
            'nisn' => $request->nisn,
            'tgl_bayar' => $request->tgl_bayar,
            'bulan_bayar' => $request->bulan_bayar,
            'jumlah_bayar' => $request->jumlah_bayar,
            'id_spp' => $request->id_spp,
        ]);
        

        return redirect('pembayaran');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $siswa = Siswa::findorfail($id);
        $pembayaran = Pembayaran::findorfail($id);
        return view('pembayaranb.entri', compact('spp', 'kelas', 'siswa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pembayaran $pembayaran)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pembayaran = Pembayaran::findorfail($id);
        $pembayaran->delete();

        return redirect('pembayaran');
    }
}
