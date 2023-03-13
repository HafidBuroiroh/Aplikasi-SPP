@extends('layout.layout')
@section('title')
SPP
@endsection

@section('subtitle')
Home
@endsection

@section('content')
    @section('page')
    <a href="{{ url('spp') }}">SPP</a>
    @endsection

<div class="d-flex pb-3">
    <a href="{{ url('spp/create') }}" class="btn btn-success my-2">Create New</a>
</div>

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Data SPP</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th class="text-center" style="width: 25px;">No</th>
                    <th class="text-center"style="width: 100px;">Action</th>
                    <th class="text-center">Tahun Bayar</th>
                    <th class="text-center">Nominal Yang Harus Dibayar</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($spp as $item)                    
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td class="d-flex" style="justify-content: center">
                            <div><a href="{{ url('spp/'.$item->id.'/edit') }}" class="btn btn-warning btn-sm text-white ms-1"><i class="fas fa-pen"></i></a></div>
                            <div><a href="{{ url('spp/'.$item->id) }}" class="btn btn-info btn-sm text-white ms-1"><i class="fas fa-eye"></i></a></div>
                            <form action="{{ url('spp',$item->id) }}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-sm btn-danger delete ms-1" data-name="{{ $item->tahun }}"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                        <td>{{ $item->tahun }}</td>
                        <td class="number-separator">{{ $item->nominal }}</td>
                    </tr>
                    
                @endforeach
        </table>
    </div>
    <!-- /.card-body -->
</div>
@endsection
