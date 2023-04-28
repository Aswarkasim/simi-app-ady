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
    <h3><b>LAPORAN TRANSAKSI PENJUALAN</b></h3>
    <h4><b>SISTEN INFORMASI MINIMARKET UNM</b></h4>
</div>
  
  <table id="example1" class="table table-striped">
    <thead>
      <tr>
        <th>No</th>
        <th>Tanggal</th>
        <th>Kasir</th>
        <th>Kode Transaksi</th>
        <th>Total</th>
        <th>Status</th>
      </tr>
    </thead>
  
    <tbody>
      @foreach ($transaksi as $row)
          
      <tr>
        <td width="50px">{{$loop->iteration}}</td>
        <td>{{format_indo($row->created_at)}} </td>
        <td>{{$row->kasir_name}} </td>
        <td>#{{$row->id}}</td>
        <td>{{ format_rupiah($row->total)}} </td>
        <td>
          @if ($row->status == 'Pending')
              <div class="badge bg-warning"><i class="fas fa-spinner"></i> {{ $row->status }}</div>
          @else
              <div class="badge bg-success"><i class="fas fa-check"></i> {{ $row->status }}</div>
          @endif
        </td>

      </tr>
  
      @endforeach
  
    </tbody>
  </table>


  <script>
    window.print()
  </script>

</body>
</html>

