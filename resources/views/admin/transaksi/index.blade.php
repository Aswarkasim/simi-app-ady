<div class="row">
  <div class="col-md-12">

<div class="card">
<div class="card-body">
  <a href="/admin/transaksi/make-transaction" class="btn btn-primary mb-3"><i class="fa fa-plus"></i> Tambah</a>

  <div class="float-right">
    <form action="" method="get">
    <div class="input-group input-group-sm">
        <input type="date" name="cari" class="form-control" placeholder="Cari..">
        <span class="input-group-append">
          <button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-search"></i></button>
          <a href="/admin/transaksi" class="btn btn-info btn-flat"><i class="fa fa-sync-alt"></i></a>
        </span>
      </div>
      </form>
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
        <th>Action</th>
      </tr>
    </thead>
  
    <tbody>
      @foreach ($transaksi as $row)
          
      <tr>
        <td width="50px">{{$transaksi->firstItem() + $loop->index}}</td>
        <td><a href="/admin/transaksi/{{ $row->id }}/edit"><b>{{format_indo($row->created_at)}}</b></a> </td>
        <td>{{$row->kasir_name}} </td>
        <td><a href="/admin/transaksi/{{ $row->id }}/edit"><b>#{{$row->id}}</b></a></td>
        <td>{{ format_rupiah($row->total)}} </td>
        <td>
          @if ($row->status == 'Pending')
              <div class="badge bg-warning"><i class="fas fa-spinner"></i> {{ $row->status }}</div>
          @else
              <div class="badge bg-success"><i class="fas fa-check"></i> {{ $row->status }}</div>
          @endif
        </td>
        <td>
          <div class="btn-group">
              <button type="button" class="btn btn-primary"><i class="fa fa-cogs"></i></button>
              <button type="button" class="btn btn-primary dropdown-toggle dropdown-icon" data-toggle="dropdown" aria-expanded="true">
                <span class="sr-only">Toggle Dropdown</span>
              </button>
              <div class="dropdown-menu" role="menu" x-placement="bottom-start">
                <a class="dropdown-item" href="/admin/transaksi/{{$row->id}}/edit"><i class="fa fa-edit"></i> Edit</a>
                <a class="dropdown-item tombol-hapus" href="/admin/transaksi/delete/{{$row->id}}"><i class="fa fa-trash"></i> Hapus</a>
                  {{-- <div class="dropdown-divider"></div>
                  <form action="/admin/transaksi/{{$row->id}}" method="post" id="delete-form">
                    @method('delete')
                    @csrf
                    <button type="submit" id="delete" class="dropdown-item tombol-hapus"><i class="fa fa-trash"></i> Hapus</button>
                  </form> --}}
              </div>
            </div>
        </td>
      </tr>
  
      @endforeach
  
    </tbody>
  </table>

  <div class="float-right">
    {{$transaksi->links()}}
  </div>
</div>
</div>

  </div>
</div>

<!-- /.card-body -->


