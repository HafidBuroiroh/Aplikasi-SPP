@extends('layout.layout')
@section('title')
Kelas
@endsection

@section('subtitle')
Home
@endsection

@section('content')
@if(auth()->user()->level == "admin")
    @section('page')
    <a href="{{ url('kelas') }}">Kelas</a>
    @endsection
    @elseif(auth()->user()->level == "petugas")
    @section('page')
    <a href="{{ url('nama_kelas') }}">Kelas</a>
    @endsection
@endif

@if(auth()->user()->level == "admin")
<div class="d-flex pb-3">
    <a href="{{ url('kelas/create') }}" class="btn btn-success my-2">Create New</a>
</div>
@endif

<div class="card">
    <div class="card-header">
        <h3 class="card-title">List kelas</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th class="text-center" style="width: 25px;">No</th>
                    @if (auth()->user()->level == "admin")
                    <th class="text-center"style="width: 100px;">Action</th>
                    @endif
                    <th class="text-center">Nama Kelas</th>
                    <th class="text-center">Kompetensi Keahlian</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kelas as $item)                    
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        @if (auth()->user()->level == "admin")
                        <td class="d-flex" style="justify-content: center">
                            <div><a href="{{ url('kelas/'.$item->id.'/edit') }}" class="btn btn-warning btn-sm text-white ms-1"><i class="fas fa-pen"></i></a></div>
                            <div><a href="{{ url('kelas/'.$item->id) }}" class="btn btn-info btn-sm text-white ms-1"><i class="fas fa-eye"></i></a></div>
                            <form action="{{ url('kelas',$item->id) }}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-sm btn-danger delete ms-1" data-name="{{ $item->nama_kelas }}"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                        @endif
                        <td>{{ $item->nama_kelas }}</td>
                        <td>{{ $item->kompetensi_keahlian }}</td>
                    </tr>
                    
                @endforeach
        </table>
    </div>
    <!-- /.card-body -->
</div>
@endsection
