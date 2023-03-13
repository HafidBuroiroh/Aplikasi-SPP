@extends('layout.layout')
@section('title')
Detail Siswa
@endsection

@section('subtitle')
Home
@endsection

@section('content')
@section('page')
<a href="{{ url('siswa') }}">Siswa</a>
@endsection

<div class="card">
    <div class="card-body">
        <div class="row pb-3">
            <div class="col-sm-4"><label>NISN</label></div>
            <div class="col-sm-8">: {{ $siswa->nisn }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>NIS</label></div>
            <div class="col-sm-8">: {{ $siswa->nis }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Nama Siswa</label></div>
            <div class="col-sm-8">: {{ $siswa->nama }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Kelas</label></div>
            <div class="col-sm-8">: {{ $siswa->kelas->nama_kelas }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Alamat</label></div>
            <div class="col-sm-8">: {{ $siswa->alamat }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>No. Telepon</label></div>
            <div class="col-sm-8">: {{ $siswa->no_telp }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Nominal Tagihan SPP</label></div>
            <div class="col-sm-8">: {{ $siswa->spp->nominal }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"></div>
            <div class="col-sm-8">
                <a href="{{ url('kelas/'.$siswa->id.'/edit') }}" class="btn btn-warning text-white" type="submit">Edit</a>
                <a href="{{ url('kelas') }}" class="btn btn-default">Cancel</a>
            </div>
        </div>
    </div>
</div>
@endsection
