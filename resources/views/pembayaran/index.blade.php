@extends('layout.layout')
@section('title')
Pembayaran
@endsection

@section('subtitle')
Home
@endsection

@section('content')
@if(auth()->user()->level == "admin")
    @section('page')
    <a href="{{ url('pembayaran') }}">Kelas</a>
    @endsection
    @elseif(auth()->user()->level == "petugas")
    @section('page')
    <a href="{{ url('entri') }}">Kelas</a>
    @endsection
@endif

<div class="card-body" style="overflow-x:auto;">
        <table class="table table-bordered table-striped">

            <thead >
                <tr>
                    <th class="text-center" style="width: 25px;">No</th>
                    <th class="text-center">NISN</th>
                    <th class="text-center">NIS</th>
                    <th class="text-center">Nama Siswa</th>
                    <th class="text-center">Nama Kelas</th>
                    <th class="text-center">Alamat</th>
                    <th class="text-center">No. Telepon</th>
                    <th class="text-center">Tahun Tagihan SPP</th>
                    <th class="text-center">Nominal Tagihan SPP</th>
                    <th class="text-center">Sisa Tagihan</th>
                    <th class="text-center">Entri Pembayaran</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($datasiswa as $item)                    
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td>00{{ $item->nisn }}</td>
                        <td>{{ $item->nis }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->kelas->nama_kelas }}</td>
                        <td>{{ $item->alamat }}</td>
                        <td>0{{ $item->no_telp }}</td>
                        <td>{{ $item->spp->tahun }}</td>
                        <td>{{ $item->spp->nominal }}</td>
                        <td>{{ $item->sisa_tagihan }}</td>
                        <td><a href="{{ url('/entri/'.$item->id) }}" class="btn btn-primary btn-sm">Entri Pembayaran</a></td>
                    </tr>
                @endforeach
        </table>
    </div>

<div class="card">
    <div class="card-header">
        <h3 class="card-title">List Pembayaran</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body" style="overflow-x : auto;">
    <div class="search-box">
              <button class="btn-search"><i class="mdi mdi-account-search"></i></button>
              <input type="text" id="myInput" onkeyup="myFunction()" class="input-search" placeholder="Type to Search...">
              
            </div>
        <table id="example1" class="table table-bordered table-responsive table-striped">
            <thead>
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Action</th>
                    <th class="text-center">Nama Petugas</th>
                    <th class="text-center">NISN</th>
                    <th class="text-center">Nama Siswa</th>
                    <th class="text-center">Tanggal Bayar</th>
                    <th class="text-center">Bulan Bayar</th>
                    <!-- <th class="text-center">Bulan Bayar</th> -->
                    <!-- <th class="text-center">Tahun Bayar</th> -->
                    <th class="text-center">Nominal Yang Harus Dibayar</th>
                    <th class="text-center">Jumlah Bayar</th>
                    <th class="text-center">Sisa Tagihan</th>
                </tr>
            </thead>
            <tbody id="myTable">
                @foreach ($pembayaran as $item)                    
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td class="d-flex" style="justify-content: center">
                            <div><a href="{{ url('pembayaran/'.$item->id) }}" class="btn btn-info btn-sm text-white ms-1"><i class="fas fa-eye"></i></a></div>
                            <form action="{{ url('pembayaran',$item->id) }}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-sm btn-danger delete ms-1" data-name="{{ $item->bulan_bayar }}"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                        <td class="text-center">{{ $item->petugas->nama_petugas }}</td>
                        <td class="text-center">{{ $item->nisnsiswa->nisn }}</td>
                        <td class="text-center">{{ $item->nisnsiswa->nama }}</td>
                        <td class="text-center">{{ $item->tgl_bayar }}</td>
                        <td class="text-center">{{ $item->bulan_bayar }}</td>
                        <td class="text-center">{{ $item->nisnsiswa->spp->nominal }}</td>
                        <td class="text-center">{{ $item->jumlah_bayar }}</td>
                            <td>{{ $item->nisnsiswa->sisa_tagihan}}</td>
                    </tr>
                @endforeach
        </table>
        
                
        <input type="button" id="btnExport" value="Export" />
    </div>
    <!-- /.card-body -->
</div>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.22/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
<script type="text/javascript">
  function myFunction() {
    // Declare variables
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");
  
    // Loop through all table rows, and hide those who don't match the search query
    for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td")[4];
      if (td) {
        txtValue = td.textContent || td.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
          tr[i].style.display = "";
        } else {
          tr[i].style.display = "none";
        }
      }
    }
  };
  $("body").on("click", "#btnExport", function () {
            html2canvas($('#example1')[0], {
                onrendered: function (canvas) {
                    var data = canvas.toDataURL();
                    var docDefinition = {
                        content: [{
                            image: data,
                            width: 500
                        }]
                    };
                    pdfMake.createPdf(docDefinition).download("History Pembayaran.pdf");
                }
            });
        });
  function Export() {
            html2canvas(document.getElementById('example1'), {
                onrendered: function (canvas) {
                    var data = canvas.toDataURL();
                    var docDefinition = {
                        content: [{
                            image: data,
                            width: 500
                        }]
                    };
                    pdfMake.createPdf(docDefinition).download("Table.pdf");
                }
            });
        };
  </script>
@endsection
