<div class="row">
  <div class="col-md-6">
    <div class="p-3  card">
      <div class="card-body">

        @if (Request::is('admin/produk/create'))
          <form action="/admin/produk" method="POST">  
        @else
          <form action="/admin/produk/{{$produk->id}}" method="POST">  
            @method('PUT')
        @endif
          @csrf

          <div class="form-group">
            <label for="">Kode Produk</label>
            <input type="text" class="form-control  @error('kode') is-invalid @enderror"  name="kode"  value="{{isset($produk) ? $produk->kode : $random_number}}" placeholder="Kode">
             @error('kode')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
             @enderror
          </div>


          <div class="form-group">
            <label for="">Nama</label>
            <input type="text" class="form-control  @error('name') is-invalid @enderror"  name="name"  value="{{isset($produk) ? $produk->name : old('name')}}" placeholder="Nama">
             @error('name')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
             @enderror
          </div>

          <div class="form-group">
            <label for="">Kategori</label>
            <select name="kategori_id" class="form-control  @error('kategori_id') is-invalid @enderror" id="">
              <option value="">-- Kategori --</option>
              @foreach ($kategori as $item)
                  <option value="{{ $item->id }}" {{ isset($produk) ? $item->id == $produk->kategori_id ? 'selected' : '' : '' }}>{{ $item->name }}</option>
              @endforeach
            </select>
             @error('kategori_id')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
             @enderror
          </div>

          <div class="form-group">
            <label for="">Harga</label>
            <input type="text" class="form-control  @error('harga') is-invalid @enderror"  name="harga"  value="{{isset($produk) ? $produk->harga : old('harga')}}" placeholder="Harga">
             @error('harga')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
             @enderror
          </div>

          <div class="form-group">
            <label for="">Stok</label>
            <input type="text" class="form-control  @error('stok') is-invalid @enderror"  name="stok"  value="{{isset($produk) ? $produk->stok : old('stok')}}" placeholder="Stok">
             @error('stok')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
             @enderror
          </div>


          @if (auth()->user()->role == 'manager')
              

          <div class="form-group">
            <label for="">Promo Diskon (Dalam Persen)</label>
            <input type="number" class="form-control  @error('promo_diskon') is-invalid @enderror"  name="promo_diskon"  value="{{isset($produk) ? $produk->promo_diskon : old('promo_diskon')}}" placeholder="Promo Diskon">
             @error('promo_diskon')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
             @enderror
          </div>

          @endif





          <a href="/admin/produk" class="btn btn-info "><i class="fa fa-arrow-left"></i> Kembali</a>
         <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
        
        </form>
      </div>
    </div>
  </div>
</div>




<script src="/plugins/jquery/jquery.min.js"></script>

<script>
  const title = document.querySelector('#title')
  const kode = document.querySelector('#kode');

  title.addEventListener('change', function() {
    fetch('/admin/produk/checkKode?kode='+kode)
    .then(response => response.json())
    .then(data => kode.value = data.kode)
  })

  document.addEventListener('trix-file-accept', function(e){
    e.preventDefault();
  })
</script>
