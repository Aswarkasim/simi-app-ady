<div class="row">
  <div class="col-md-12">

<div class="card">
<div class="card-body">
  <a href="/admin/stok/create" class="btn btn-primary mb-3"><i class="fa fa-plus"></i> Tambah</a>

  <div class="float-right">
    <form action="" method="get">
    <div class="input-group input-group-sm">
        <input type="text" name="cari" class="form-control" placeholder="Cari..">
        <span class="input-group-append">
          <button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-search"></i></button>
          <a href="/admin/stok" class="btn btn-info btn-flat"><i class="fa fa-sync-alt"></i></a>
        </span>
      </div>
      </form>
  </div>
<table id="example1" class="table table-striped">
  <thead>
    <tr>
      <th>No</th>
      <th>Kode</th>
      <th>Nama</th>
      <th>Keterangan</th>
      <th>Jumlah</th>
      <th>Action</th>
    </tr>
  </thead>

  <tbody>
    @foreach ($stok as $row)
        
    <tr>
      <td width="50px">{{$stok->firstItem() + $loop->index}}</td>
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
      <td>
        <div class="btn-group">
            <button type="button" class="btn btn-primary"><i class="fa fa-cogs"></i></button>
            <button type="button" class="btn btn-primary dropdown-toggle dropdown-icon" data-toggle="dropdown" aria-expanded="true">
              <span class="sr-only">Toggle Dropdown</span>
            </button>
            <div class="dropdown-menu" role="menu" x-placement="bottom-start">
              <a class="dropdown-item" href="/admin/stok/{{$row->id}}/edit"><i class="fa fa-edit"></i> Edit</a>
              <a class="dropdown-item tombol-hapus" href="/admin/stok/delete/{{$row->id}}"><i class="fa fa-trash"></i> Hapus</a>
                {{-- <div class="dropdown-divider"></div>
                <form action="/admin/stok/{{$row->id}}" method="post" id="delete-form">
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
    {{$stok->links()}}
  </div>
</div>
</div>

  </div>
</div>

<!-- /.card-body -->


