<?php

namespace App\Http\Controllers;

use App\Models\Petugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $petugas = Petugas::orderBy('id', 'desc')->get();;
        return view('petugas.index', compact('petugas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('petugas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $val = $this->validate($request, [
            'username' => 'required',
            'nama_petugas' => 'required',
            'level' => 'required',
            'password' => 'required|confirmed|min:6',
        ],[
            'username' => 'Input Username!',
            'nama_petugas' => 'Input Nama Petugas!',
            'level' => 'Input Level',
            'password' => 'Must contain at least 6 or more characters!',
        ]);

        $val['password'] = Hash::make($val['password']);

        Petugas::create($val);
        return redirect('petugas');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Petugas  $petugas
     * @return \Illuminate\Http\Response
     */
    public function show(Petugas $petugas, $id)
    {
        $nama_petugas = Petugas::findorfail($id);
        return view('petugas.detail', compact('nama_petugas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Petugas  $petugas
     * @return \Illuminate\Http\Response
     */
    public function edit(Petugas $petugas, $id)
    {
        $petugas = Petugas::findorfail($id);
        return view('petugas.edit', compact('petugas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Petugas  $petugas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Petugas $petugas, $id)
    {
        $request->validate([
            'username' => 'required',
            'nama_petugas' => 'required',
            'level' => 'required',
            'current_password' => 'required|min:6',
            'password' => 'required|confirmed|min:6',
        ],[
            'username' => 'Input Username!',
            'nama_petugas' => 'Input Nama Petugas!',
            'level' => 'Input Level',
            'current_password' => 'Must contain at least 6 or more characters!',  
            'password' => 'Must contain at least 6 or more characters!',
        ]);
        
        $petugas->username = $request->username;
        $petugas->nama_petugas = $request->nama_petugas;
        if($request->current_password){
            $petugas->password = Hash::make($request->password);
        }
        $petugas->level = $request->level;
        $petugas->save();
        return redirect('petugas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Petugas  $petugas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Petugas $petugas, $id)
    {
        $petugas = Petugas::findorfail($id);
        $petugas->delete();

        return redirect('petugas');
    }
}
