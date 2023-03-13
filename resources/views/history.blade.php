@extends('layout.layout')
@section('title')
Pembayaran
@endsection

@section('subtitle')
Home
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">History Pembayaran</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body" id="code">
        
        <div class="search-box">
              <button class="btn-search"><i class="mdi mdi-account-search"></i></button>
              <input type="text" id="myInput" onkeyup="myFunction()" class="input-search" placeholder="Type to Search...">
              
            </div>
       
        <table id="example1" class="table table-bordered table-responsive table-striped">
            <thead>
                <tr>
                    <th class="text-center">No</th>
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
                @foreach ($bayar as $item)                    
                    <tr class="tr">
                        <td class="text-center">{{ $loop->iteration }}</td>
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
      td = tr[i].getElementsByTagName("td")[3];
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
                    pdfMake.createPdf(docDefinition).download("cutomer-details.pdf");
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
