@extends('layout.layout')
@section('title')
   Detail SPP
@endsection

@section('subtitle')
    Detail
@endsection

@section('page')
    <a href="{{ url('spp') }}">SPP</a>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row pb-3">
            <div class="col-sm-4"><label>Tahun Bayar</label></div>
            <div class="col-sm-8">: {{ $jumlahspp->tahun }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"><label>Nominal Yang Harus Dinayar</label></div>
            <div class="col-sm-8">: {{ $jumlahspp->nominal }}</div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-4"></div>
            <div class="col-sm-8">
                <a href="{{ url('kelas/'.$jumlahspp->id.'/edit') }}" class="btn btn-warning text-white" type="submit">Edit</a>
                <a href="{{ url('kelas') }}" class="btn btn-default">Cancel</a>
            </div>
        </div>
    </div>
</div>
@endsection