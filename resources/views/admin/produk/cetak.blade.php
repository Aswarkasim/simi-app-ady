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
      <th>Kategori</th>
      <th>Harga Satuan</th>
      <th>Stok</th>
      <th>Stok Gudang</th>
    </tr>
  </thead>

  <tbody>
    @foreach ($produk as $row)
        
    <tr>
      <td width="50px">{{$loop->iteration}}</td>
      <td>{{$row->kode}} </td>
      <td>{{$row->name}} </td>
      <td>{{isset($row->kategori) ? $row->kategori->name : 'Kategori kosong'}} </td>
      <td>{{ format_rupiah($row->harga)}} </td>
      <td>{{ format_angka($row->stok)}} </td>
      <td>{{ format_angka($row->stok_gudang)}} </td>
    </tr>

    @endforeach

  </tbody>
</table>


  <script>
    window.print()
  </script>

</body>
</html>

