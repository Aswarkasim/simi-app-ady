<!DOCTYPE html>
<html lang="en">
<head>
  <title>{{ $title }}</title>
  <link rel="stylesheet" href="/dist/css/adminlte.min.css">


  <style>
    @page{
            size: landscape;
            margin: 20px;
        }
  </style>
</head>
<body>
  

  <div class="text-center">
    <h3><b>LAPORAN PRODUK</b></h3>
    <h4><b>SISTEN INFORMASI MINIMARKET UNM</b></h4>
</div>
  
<table id="example1" class="table table-striped">
  <thead>
    <tr>
      <th>No</th>
      <th>Kode</th>
      <th>Nama</th>
      <th>Keterangan</th>
      <th>Jumlah</th>
    </tr>
  </thead>

  <tbody>
    @foreach ($stok as $row)
        
    <tr>
      <td width="50px">{{$loop->iteration}}</td>
      <td>{{$row->kode_produk}} </td>
      <td>{{$row->nama_produk}} </td>
      <td>
        @if ($row->keterangan == 'Masuk')
        <span class="badge bg-success"><i class="fas fa-download"></i> Masuk</span>
        @else
        <span class="badge bg-danger"><i class="fas fa-upload"></i> Keluar</span>
        @endif
      </td>
      <td>{{ format_angka($row->jumlah)}} </td>

    </tr>

    @endforeach

  </tbody>
</table>


  <script>
    window.print()
  </script>

</body>
</html>

