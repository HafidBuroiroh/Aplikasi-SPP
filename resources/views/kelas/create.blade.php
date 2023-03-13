@extends('layout.layout')
@section('title')
   Create Kelas
@endsection

@section('subtitle')
    Add
@endsection

@section('page')
    <a href="{{ url('kelas') }}">Kelas</a>
@endsection

@section('content')
    <form action="{{ url('kelas') }}" method="POST">
        @csrf
        <div class="row pb-3">
            <div class="col-sm-3"><label>Nama Kelas <span class="text-danger">*</span></label></div>
            <div class="col-sm-5">
                <input type="text" name="nama_kelas" class="form-control" placeholder="Nama Kelas">
                @error('nama_kelas')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-3"><label>Kompetensi Keahlian <span class="text-danger">*</span></label></div>
            <div class="col-sm-5">
                <input type="text" name="kompetensi_keahlian" class="form-control" placeholder="Kompetensi Keahlian">
                @error('kompetensi_keahlian')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-3"></div>
            <div class="col-sm-5">
                <button class="btn btn-primary" type="submit">Add</button>
                <a href="{{ url('kelas') }}" class="btn btn-danger">Cancel</a>
            </div>
        </div>
    </form>
@endsection