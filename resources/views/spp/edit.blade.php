@extends('layout.layout')
@section('title')
   Edit SPP
@endsection

@section('subtitle')
    Add
@endsection

@section('page')
    <a href="{{ url('spp') }}">SPP</a>
@endsection

@section('content')
    <form action="{{ url('spp', $spp->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row pb-3">
            <div class="col-sm-3"><label>Tahun Bayar <span class="text-danger">*</span></label></div>
            <div class="col-sm-5">
                <input type="number" name="tahun" value="{{ $spp->tahun }}" class="form-control" placeholder="Tahun Bayar">
                @error('tahun')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-3"><label>Nominal Yang Harus Dibayar <span class="text-danger">*</span></label></div>
            <div class="col-sm-5">
                <input type="text" name="nominal" value="{{ $spp->nominal }}" class="form-control" placeholder="Nominal Yang Harus Dibayar">
                @error('nominal')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-3"></div>
            <div class="col-sm-5">
                <button class="btn btn-primary" type="submit">Add</button>
                <a href="{{ url('spp') }}" class="btn btn-danger">Cancel</a>
            </div>
        </div>
    </form>
@endsection