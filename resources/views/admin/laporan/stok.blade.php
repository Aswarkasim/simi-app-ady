<div class="row">
  <div class="col-md-6">

      <div class="card">
        <div class="card-body">
          <form action="/admin/laporan/stok/cetak" target="blank">
            
            <div class="form-group">
              <label for="">Tanggal Awal</label>
              <input type="date" class="form-control  @error('tanggal_awal') is-invalid @enderror" required  name="tanggal_awal"  value="{{isset($produk) ? $produk->tanggal_awal : old('tanggal_awal')}}" placeholder="Stok">
               @error('tanggal_awal')
                  <div class="invalid-feedback">
                    {{$message}}
                  </div>
               @enderror
            </div>

            <div class="form-group">
              <label for="">Tanggal Akhir</label>
              <input type="date" class="form-control  @error('tanggal_akhir') is-invalid @enderror" required  name="tanggal_akhir"  value="{{isset($produk) ? $produk->tanggal_akhir : old('tanggal_akhir')}}" placeholder="Stok">
               @error('tanggal_akhir')
                  <div class="invalid-feedback">
                    {{$message}}
                  </div>
               @enderror
            </div>

            <div class="form-group">
              <label for="">Keterangan</label>
              <select name="keterangan" class="js-example-basic-single form-control  @error('keterangan') is-invalid @enderror" id="">
                <option value="">-- Keterangan --</option>
                <option value="semua">Semua</option>
                <option value="Masuk">Masuk</option>
                <option value="Keluar">Keluar</option>
              </select>
               @error('keterangan')
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


