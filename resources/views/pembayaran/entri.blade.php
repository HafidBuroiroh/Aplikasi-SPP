@extends('layout.layout')
@section('title')
   Entri pembayaran
@endsection

@section('subtitle')
    Add
@endsection

@section('page')
    <a href="{{ url('pembayaran') }}">Pembayaran</a>
@endsection

@section('content')
    <form action="{{ url('pay') }}" method="POST">
        @csrf
        <input type="number" style="display:none;" value="{{Auth::user()->id}}" name="id_petugas">
        <input type="number" style="display:none;" value="{{$siswa->id}}" name="nisn">


        <div class="row pb-3">
            <div class="col-sm-3"><label>Nama Siswa <span class="text-danger">*</span></label></div>
            <div class="col-sm-5">
                <input type="text" class="form-control" disabled value="{{$siswa->nama}}">
            </div>
        </div>

        <div class="row pb-3">
            <div class="col-sm-3"><label>Tanggal Bayar <span class="text-danger">*</span></label></div>
            <div class="col-sm-5">
                <input type="date" name="tgl_bayar" class="form-control" placeholder="Tanggal Bayar">
                @error('tgl_bayar')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-3">Tahun Bayar<label> <span class="text-danger">*</span></label></div>
            <div class="col-sm-5">
            <select name="bulan_bayar" id="bulan_bayar" class="form-control">
                <option>JAN</option>
                <option>FEB</option>
                <option>MAR</option>
                <option>APR</option>
                <option>MEI</option>
                <option>JUN</option>
                <option>JUL</option>
                <option>AGU</option>
                <option>SEP</option>
                <option>OKT</option>
                <option>NOV</option>
                <option>DES</option>
            </select>
                @error('bulan_bayar')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="row pb-3">
            <div class="col-sm-3">Nominal Yang Harus Dibayar<label> <span class="text-danger">*</span></label></div>
            <div class="col-sm-5">
                <select name="id_spp"  id="id_spp" class="form-control">
                @foreach ($siswas as $item)
                <option value="{{ $item->id }}">{{ $item->nominal }} </option>
                @endforeach
                </select>
                @error('id_spp')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="row pb-3">
                <div class="col-sm-3"><label>Jumlah Bayar <span class="text-danger">*</span></label></div>
                <div class="col-sm-5">
                    <input type="number" name="jumlah_bayar" value="600000" class="form-control" placeholder="Jumlah Bayar">
                    @error('jumlah_bayar')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>  
        <div class="row pb-3">
            <div class="col-sm-3"></div>
            <div class="col-sm-5">
                <button class="btn btn-primary" type="submit">Add</button>
                <a href="{{ url('pembayaran') }}" class="btn btn-danger">Cancel</a>
            </div>
        </div>
    </form>
@endsection