<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<div class="row">
  <div class="col-md-6">
    <div class="p-3  card">
      <div class="card-body">

        @if (Request::is('admin/stok/create'))
          <form action="/admin/stok" method="POST">  
        @else
          <form action="/admin/stok/{{$stok->id}}" method="POST">  
            @method('PUT')
        @endif
          @csrf

          <div class="form-group">
            <label for="">Kode Produk</label>
            <select name="kode_produk" class="js-example-basic-single form-control  @error('kode_produk') is-invalid @enderror" id="">
              <option value="">-- Kode Produk --</option>
              @foreach ($produk as $item)
                  <option value="{{ $item->kode }}" {{ isset($stok) ? $item->kode == $stok->kode_produk ? 'selected' : '' : '' }}>{{ $item->kode.' - '.$item->name }}</option>
              @endforeach
            </select>
             @error('kode_produk')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
             @enderror
          </div>

          

          <div class="form-group">
            <label for="">Tanggal</label>
            <input type="date" class="form-control  @error('tanggal') is-invalid @enderror"  name="tanggal"  value="{{isset($stok) ? $stok->tanggal : old('tanggal')}}" placeholder="Tanggal">
             @error('tanggal')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
             @enderror
          </div>

          <div class="form-group">
            <label for="">Keterangan</label>
            <select name="keterangan" class="js-example-basic-single form-control  @error('keterangan') is-invalid @enderror" id="">
              <option value="">-- Keterangan --</option>
              <option value="Masuk" {{ isset($stok) ? $stok->keterangan == 'Masuk' ? 'selected' : '' : '' }}>Masuk</option>
              <option value="Keluar" {{ isset($stok) ? $stok->keterangan == 'Keluar' ? 'selected' : '' : '' }}>Keluar</option>
            </select>
             @error('keterangan')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
             @enderror
          </div>

          <div class="form-group">
            <label for="">Jumlah Masuk</label>
            <input type="number" class="form-control  @error('jumlah') is-invalid @enderror"  name="jumlah"  value="{{isset($stok) ? $stok->jumlah : old('jumlah')}}" placeholder="0">
             @error('jumlah')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
             @enderror
          </div>



          <a href="/admin/stok" class="btn btn-info "><i class="fa fa-arrow-left"></i> Kembali</a>
         <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
        
        </form>
      </div>
    </div>
  </div>
</div>

<script src="/plugins/jquery/jquery.min.js"></script>
<script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
  // In your Javascript (external .js resource or <script> tag)
$(document).ready(function() {
    $('.js-example-basic-single').select2();
});
</script>