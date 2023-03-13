@extends('layout.layout')
@section('title')
    Edit Siswa
@endsection

@section('subtitle')
    Edit
@endsection

@section('page')
    <a href="{{ url('siswa') }}">Siswa</a>
@endsection

@section('content')
    <form action="{{ url('siswa', $siswa->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row pb-3">
            <div class="col-sm-3"><label>NISN <span class="text-danger">*</span></label></div>
            <div class="col-sm-5">
                <input type="number"  value="{{ $siswa->nisn }}" name="nisn" class="form-control" placeholder="NISN">
                @error('nisn')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-3"><label>NIS <span class="text-danger">*</span></label></div>
            <div class="col-sm-5">
                <input type="number" value="{{ $siswa->nis }}" name="nis" class="form-control" placeholder="NIS">
                @error('nis')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-3"><label>Nama Siswa <span class="text-danger">*</span></label></div>
            <div class="col-sm-5">
                <input type="text" value="{{ $siswa->nama }}" name="nama" class="form-control" placeholder="Nama Siswa">
                @error('nama')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-3"><label>Kelas <span class="text-danger">*</span></label></div>
            <div class="col-sm-5">
            <select name="id_kelas" id="id_kelas" class="form-control">
                <option class="col-sm-5" value="{{ $siswa->id_kelas }}">{{ $siswa->kelas->nama_kelas }}</option>
            </select>
                @error('id_kelas')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-3"><label>Alamat <span class="text-danger">*</span></label></div>
            <div class="col-sm-5">
                <textarea name="alamat"id="" cols="54" rows="10">{{ $siswa->alamat }}</textarea>
                @error('alamat')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-3"><label>No. Telepon <span class="text-danger">*</span></label></div>
            <div class="col-sm-5">
                <input type="number" value="{{ $siswa->no_telp }}" name="no_telp" class="form-control" placeholder="No Telepon">
                @error('nis')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-3">Tahun Tagihan SPP<label> <span class="text-danger">*</span></label></div>
            <div class="col-sm-5">
            <select name="id_spp" id="id_spp" class="form-control">
                <option value="{{ $siswa->id_spp }}">{{ $siswa->spp->tahun }}</option>
            </select>
                @error('id_spp')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-3"></div>
            <div class="col-sm-5">
                <button class="btn btn-primary" type="submit">Add</button>
                <a href="{{ url('siswa') }}" class="btn btn-danger">Cancel</a>
            </div>
        </div>
    </form>
@endsection