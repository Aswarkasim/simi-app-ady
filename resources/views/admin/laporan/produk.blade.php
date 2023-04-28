<div class="row">
  <div class="col-md-6">

      <div class="card">
        <div class="card-body">
          <form action="/admin/laporan/produk/cetak" target="blank">
            
            <div class="form-group">
              <label for="">Kategori</label>
              <select name="kategori_id" class="form-control  @error('kategori_id') is-invalid @enderror" id="">
                <option value="">-- Kategori --</option>
                <option value="semua"><b>Semua</b></option>
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

            <button type="submit" class="btn btn-primary"><i class="fa fa-print"></i> Cetak</button>

          </form>
        </div>
      </div>

  </div>
</div>

<!-- /.card-body -->


