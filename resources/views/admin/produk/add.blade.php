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
            <input type="text" class="form-control  @error('kode') is-invalid @enderror"  name="kode"  value="{{isset($produk) ? $produk->kode : old('kode')}}" placeholder="Kode">
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




          <a href="/admin/produk" class="btn btn-info "><i class="fa fa-arrow-left"></i> Kembali</a>
         <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
        
        </form>
      </div>
    </div>
  </div>
</div>



<form>
  <div class="form-group">
      <label for="code">Code:</label>
      <input type="text" name="kode" id="code" class="form-control">
      <span id="error-code" class="text-danger"></span>
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>


<div class="mb-3">
  <label for="slug" class="form-label">Slug</label>
  <input type="text"  value="{{old('slug')}}" class="form-control  @error('slug') is-invalid @enderror" name="slug" id="slug">
   @error('slug')
      <div class="invalid-feedback">
        {{$message}}
      </div>
  @enderror
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
