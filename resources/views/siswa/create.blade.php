@extends('layout.layout')
@section('title')
    Create Siswa
@endsection

@section('subtitle')
    Add
@endsection

@section('page')
    <a href="{{ url('siswa') }}">Siswa</a>
@endsection

@section('content')
    <form action="{{ url('siswa') }}" method="POST">
        @csrf
        <div class="row pb-3">
            <div class="col-sm-3"><label>NISN <span class="text-danger">*</span></label></div>
            <div class="col-sm-5">
                <input type="number" name="nisn" class="form-control" placeholder="NISN">
                @error('nisn')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-3"><label>NIS <span class="text-danger">*</span></label></div>
            <div class="col-sm-5">
                <input type="number" name="nis" class="form-control" placeholder="NIS">
                @error('nis')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-3"><label>Nama Siswa <span class="text-danger">*</span></label></div>
            <div class="col-sm-5">
                <input type="text" name="nama" class="form-control" placeholder="Nama Siswa">
                @error('nama')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-3"><label>Kelas <span class="text-danger">*</span></label></div>
            <div class="col-sm-5">
            <select name="id_kelas" id="id_kelas" class="form-control">
                <option class="col-sm-5"></option>
                @foreach ($kelas as $item)
                <option value="{{ $item->id }}">{{ $item->nama_kelas }} </option>
                @endforeach
            </select>
                @error('id_kelas')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-3"><label>Alamat <span class="text-danger">*</span></label></div>
            <div class="col-sm-5">
                <textarea name="alamat" id="" cols="54" rows="10"></textarea>
                @error('alamat')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-3"><label>No. Telepon <span class="text-danger">*</span></label></div>
            <div class="col-sm-5">
                <input type="number" name="no_telp" class="form-control" placeholder="No Telepon">
                @error('nis')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-3">Tahun Tagihan SPP<label> <span class="text-danger">*</span></label></div>
            <div class="col-sm-5">
            <select name="id_spp" id="id_spp" class="form-control">
                <option></option>
                @foreach ($spp as $item)
                <option value="{{ $item->id }}">{{ $item->tahun }} -- {{ $item->nominal }} </option>
                @endforeach
            </select>
                @error('id_spp')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-3"><label>Sisa Tagihan <span class="text-danger">*</span></label></div>
            <div class="col-sm-5">
                <input type="number" name="sisa_tagihan" class="form-control" placeholder="Sisa Tagihan">
                @error('siss_tagihan')
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