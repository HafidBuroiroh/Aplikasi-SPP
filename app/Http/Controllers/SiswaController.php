<?php

namespace App\Http\Controllers;

use App\Models\SPP;
use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siswa = Siswa::orderBy('id', 'desc')->get();;
        return view('siswa.index', compact('siswa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $spp = SPP::all();
        $kelas = Kelas::all();
        $siswa = Siswa::all();
        return view('siswa.create', compact('spp', 'kelas', 'siswa'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nisn' => 'required',
            'nis' => 'required',
            'nama' => 'required',
            'id_kelas' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
            'id_spp' => 'required',
        ],[
            'nisn' => 'Input NISN!',
            'nis' => 'Input NIS!',
            'nama' => 'Input Nama Siswa!',
            'id_kelas' => 'Input Kelas!',
            'alamat' => 'Input Alamat!',
            'no_telp' => 'Input No. Telepon!',
            'id_spp' => 'Input Tahun!',
            'id_spp' => 'Input Nominal Tagihan!',
        ]);
        foreach ($tagihan as $val) {
            $sisa = $val->nominal;
            $pay->sisa_tagihan = $sisa - $request->jumlah_bayar;
        }
        Siswa::create([
            'nisn' => $request->nisn,
            'nis' => $request->nis,
            'nama' => $request->nama,
            'id_kelas' => $request->id_kelas,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
            'id_spp' => $request->id_spp,
            'sisa_tagihan' => $request->$pay,
        ]);

        return redirect('siswa');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $siswa = Siswa::findorfail($id);
        return view('siswa.detail', compact('siswa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $siswa = Siswa::findorfail($id);
        $spp = SPP::all();
        $kelas = Kelas::all();
        return view('siswa.edit', compact('spp', 'kelas', 'siswa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nisn' => 'required',
            'nis' => 'required',
            'nama' => 'required',
            'id_kelas' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
            'id_spp' => 'required',
        ],[
            'nisn' => 'Input NISN!',
            'nis' => 'Input NIS!',
            'nama' => 'Input Nama Siswa!',
            'id_kelas' => 'Input Kelas!',
            'alamat' => 'Input Alamat!',
            'no_telp' => 'Input No. Telepon!',
            'id_spp' => 'Input Nominal Tagihan!',
        ]);
        $siswa = Siswa::findorfail($id);
        $siswa->update([
            'nisn' => $request->nisn,
            'nis' => $request->nis,
            'nama' => $request->nama,
            'id_kelas' => $request->id_kelas,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
            'id_spp' => $request->id_spp,
        ]);

        return redirect('siswa');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $siswa = Siswa::findorfail($id);
        $siswa->delete();
        return redirect('siswa');
    }
}
