<div class="row">
  <div class="col-md-12">

<div class="card">
<div class="card-body">
  <a href="/admin/produk/create" class="btn btn-primary mb-3"><i class="fa fa-plus"></i> Tambah</a>

  <div class="float-right">
    <form action="" method="get">
    <div class="input-group input-group-sm">
        <input type="text" name="cari" class="form-control" placeholder="Cari..">
        <span class="input-group-append">
          <button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-search"></i></button>
          <a href="/admin/produk" class="btn btn-info btn-flat"><i class="fa fa-sync-alt"></i></a>
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
      <th>Kategori</th>
      <th>Harga Satuan</th>
      <th>Stok Toko</th>
      <th>Stok Gudang</th>
      <th>Action</th>
    </tr>
  </thead>

  <tbody>
    @foreach ($produk as $row)
        
    <tr>
      <td width="50px">{{$produk->firstItem() + $loop->index}}</td>
      <td>{{$row->kode}} </td>
      <td>{{$row->name}} </td>
      <td>{{isset($row->kategori) ? $row->kategori->name : 'Kategori kosong'}} </td>
      <td>{{ format_rupiah($row->harga)}} </td>
      <td>{{ format_angka($row->stok)}} </td>
      <td>{{ format_angka($row->stok_gudang)}} </td>
      <td>
        <div class="btn-group">
            <button type="button" class="btn btn-primary"><i class="fa fa-cogs"></i></button>
            <button type="button" class="btn btn-primary dropdown-toggle dropdown-icon" data-toggle="dropdown" aria-expanded="true">
              <span class="sr-only">Toggle Dropdown</span>
            </button>
            <div class="dropdown-menu" role="menu" x-placement="bottom-start">
              <a class="dropdown-item" href="/admin/produk/{{$row->id}}/edit"><i class="fa fa-edit"></i> Edit</a>
              <a class="dropdown-item tombol-hapus" href="/admin/produk/delete/{{$row->id}}"><i class="fa fa-trash"></i> Hapus</a>
                {{-- <div class="dropdown-divider"></div>
                <form action="/admin/produk/{{$row->id}}" method="post" id="delete-form">
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
    {{$produk->links()}}
  </div>
</div>
</div>

  </div>
</div>

<!-- /.card-body -->


