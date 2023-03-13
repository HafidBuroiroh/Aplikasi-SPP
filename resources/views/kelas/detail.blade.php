@extends('layout.layout')
@section('title')
    Detail Kelas
@endsection

@section('subtitle')
    Detail
@endsection

@section('page')
    <a href="{{ url('kelas') }}">Kelas</a>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row pb-3">
            <div class="col-sm-4"><label>Nama Kelas</label></div>
            <div class="col-sm-8">: {{ $nama_kelas->nama_kelas }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Kompetensi Keahlian</label></div>
            <div class="col-sm-8">: {{ $nama_kelas->kompetensi_keahlian }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"></div>
            <div class="col-sm-8">
                <a href="{{ url('kelas/'.$nama_kelas->id.'/edit') }}" class="btn btn-warning text-white" type="submit">Edit</a>
                <a href="{{ url('kelas') }}" class="btn btn-default">Cancel</a>
            </div>
        </div>
    </div>
</div>
@endsection