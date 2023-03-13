@extends('layout.layout')
@section('title')
Siswa
@endsection

@section('subtitle')
Home
@endsection

@section('content')
    @section('page')
    <a href="{{ url('siswa') }}">Siswa</a>
@endsection

@if(auth()->user()->level == "admin")
<div class="d-flex pb-3">
    <a href="{{ url('siswa/create') }}" class="btn btn-success my-2">Create New</a>
</div>
@endif
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Data Siswa</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body" style="overflow-x:auto;">
        <table id="example1"  class="table table-bordered table-striped">

            <thead >
                <tr>
                    <th class="text-center" style="width: 25px;">No</th>
                    @if (auth()->user()->level == "admin")
                    <th class="text-center"style="width: 100px;">Action</th>
                    @endif
                    <th class="text-center">NISN</th>
                    <th class="text-center">NIS</th>
                    <th class="text-center">Nama Siswa</th>
                    <th class="text-center">Nama Kelas</th>
                    <th class="text-center">Alamat</th>
                    <th class="text-center">No. Telepon</th>
                    <th class="text-center">Tahun Masuk</th>
                    <th class="text-center">Nominal Tagihan SPP</th>
                    <th class="text-center">Sisa Tagihan SPP</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($siswa as $item)                    
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        @if (auth()->user()->level == "admin")
                        <td class="d-flex" style="justify-content: center">
                            <div><a href="{{ url('siswa/'.$item->id.'/edit') }}" class="btn btn-warning btn-sm text-white ms-1"><i class="fas fa-pen"></i></a></div>
                            <div><a href="{{ url('siswa/'.$item->id) }}" class="btn btn-info btn-sm text-white ms-1"><i class="fas fa-eye"></i></a></div>
                            <form action="{{ url('siswa',$item->id) }}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-sm btn-danger delete ms-1" data-name="{{ $item->nisn }}"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                        @endif
                        <td>00{{ $item->nisn }}</td>
                        <td>{{ $item->nis }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->kelas->nama_kelas }}</td>
                        <td>{{ $item->alamat }}</td>
                        <td>0{{ $item->no_telp }}</td>
                        <td>{{ $item->spp->tahun }}</td>
                        <td>{{ $item->spp->nominal }}</td>
                        <td>{{ $item->sisa_tagihan }}</td>
                    </tr>
                    
                @endforeach
        </table>
    </div>
    <!-- /.card-body -->
</div>
@endsection
