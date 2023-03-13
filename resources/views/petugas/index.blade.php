@extends('layout.layout')
@section('title')
Petugas
@endsection

@section('subtitle')
Home
@endsection

@section('content')
    @section('page')
    <a href="{{ url('petugas') }}">Petugas</a>
    @endsection

<div class="d-flex pb-3">
    <a href="{{ url('petugas/create') }}" class="btn btn-success my-2">Create New</a>
</div>

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Data Petugas</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th class="text-center" style="width: 25px;">No</th>
                    <th class="text-center"style="width: 100px;">Action</th>
                    <th class="text-center">Nama Petugas</th>
                    <th class="text-center">Username</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($petugas as $item)                    
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td class="d-flex" style="justify-content: center">
                            <div><a href="{{ url('petugas/'.$item->id.'/edit') }}" class="btn btn-warning btn-sm text-white ms-1"><i class="fas fa-pen"></i></a></div>
                            <div><a href="{{ url('petugas/'.$item->id) }}" class="btn btn-info btn-sm text-white ms-1"><i class="fas fa-eye"></i></a></div>
                            <form action="{{ url('petugas',$item->id) }}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-sm btn-danger delete ms-1" data-name="{{ $item->nama_petugas }}"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                        <td>{{ $item->nama_petugas }}</td>
                        <td>{{ $item->username }}</td>
                        <td>{{ $item->level }}</td>
                    </tr>
                    
                @endforeach
        </table>
    </div>
    <!-- /.card-body -->
</div>
@endsection
