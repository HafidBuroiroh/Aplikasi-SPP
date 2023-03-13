<?php

namespace App\Http\Controllers;

use App\Models\SPP;
use Illuminate\Http\Request;

class SPPController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $spp = SPP::orderBy('id', 'desc')->get();
        return view('spp.index', compact('spp'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('spp.create');
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
            'tahun' => 'required',
            'nominal' => 'required',
        ],[
            'tahun' => 'Input tahun Pembelajaran!',
            'nominal' => 'Input Nominal Pembayaran!',
        ]);

        SPP::create([
            'tahun' => $request->tahun,
            'nominal' => $request->nominal,
        ]);

        return redirect('spp');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SPP  $sPP
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $jumlahspp = SPP::findorfail($id);
        return view('spp.detail', compact('jumlahspp'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SPP  $sPP
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $spp = SPP::findorfail($id);
        return view('spp.edit', compact('spp'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SPP  $sPP
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SPP $sPP, $id)
    {
        $this->validate($request, [
            'tahun' => 'required',
            'nominal' => 'required',
        ],[
            'tahun' => 'Input Tahun Bayar!',
            'nominal' => 'Input Kompetensi Keahlian!',
        ]);

        $spp = SPP::findorfail($id);
        $spp->update([
            'tahun' => $request->tahun,
            'nominal' => $request->nominal,
        ]);
        return redirect('spp');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SPP  $sPP
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $spp = SPP::findorfail($id);
        $spp->delete();

        return redirect('spp');
    }
}
