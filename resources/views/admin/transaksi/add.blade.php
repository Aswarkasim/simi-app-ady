<div class="row">
  <div class="col-md-6">
    <div class="p-3  card">
      <div class="card-body">


            <form action="/admin/transaksi/detail/add" method="POST">  

            @csrf
  
            <div class="form-group">
              <div class="row">
                <div class="col-md-4">
                  <label for="">Kode Produk</label>
                </div>
                <div class="col-md-8">
                  <input type="text" id="kode-produk" required class="form-control  @error('kode') is-invalid @enderror"  name="kode"  value="{{isset($transaksi) ? $transaksi->kode : old('kode')}}" placeholder="Kode">
                  @error('kode')
                      <div class="invalid-feedback">
                        {{$message}}
                      </div>
                  @enderror
                </div>
              </div>
            </div>
  
            <div class="form-group">
              <div class="row">
                <div class="col-md-4">
                  <label for="">Nama Produk</label>
                </div>
                <div class="col-md-8">
                  <input type="text" id="nama-produk" class="form-control"  name="name"  value="{{isset($transaksi) ? $transaksi->name : old('name')}}" disabled placeholder="Nama Produk">
                </div>
              </div>
            </div>
  
            <div class="form-group">
              <div class="row">
                <div class="col-md-4">
                  <label for="">Harga Satuan</label>
                </div>
                <div class="col-md-8">
                  <input type="text" id="harga-produk" disabled class="form-control"  name="harga_satuan"  value="{{isset($transaksi) ? $transaksi->harga_satuan : old('harga_satuan')}}" placeholder="Harga Satuan">
                </div>
              </div>
            </div>
  
            <div class="form-group">
              <div class="row">
                <div class="col-md-4">
                  <label for="">QTY</label>
                </div>
                <div class="col-md-8">
                  {{-- <input type="number" id="qty" class="form-control  @error('quantity') is-invalid @enderror"  name="quantity"  value="{{isset($transaksi) ? $transaksi->quantity : old('quantity')}}" placeholder="0">
                  @error('quantity')
                      <div class="invalid-feedback">
                        {{$message}}
                      </div>
                  @enderror --}}

                  <div class="input-group mb-3">
                    <button class="btn btn-primary" onclick="funQty('min')" type="button">-</button>
                    <input type="number" name="qty" required id="count_qty" value="1" class="form-control text-center" width="100px">
                    <button class="btn btn-primary" type="button" onclick="funQty('plus')">+</button>
                    {{-- <input type="hidden" name="total" id="total" value=""> --}}
                  </div>

                  <input type="hidden" id="" name="transaksi_id" value="{{ $transaksi->id }}">
                  <input type="hidden" id="hidden_produk_id" name="hidden_produk_id">
                  <input type="hidden" id="hidden_produk_name" name="hidden_produk_name">
                  <input type="hidden" id="hidden_harga_satuan" name="hidden_harga_satuan">
                  <input type="hidden" id="hidden_subtotal" name="subtotal">

                  <h5 class="float-end" id="subtotal">Subtotal : 0</h5>
                  
                </div>
              </div>
            </div>
  
  
                <a href="/admin/transaksi" class="btn btn-secondary "><i class="fa fa-arrow-left"></i> Kembali</a>
              <button type="submit" class="btn btn-info"> Tambah <i class="fa fa-plus"></i></button>
          
            </form>
          
      </div>
    </div>
  </div>

  <div class="col-md-6">
  <div class="card">
    <div class="card-body">
        <table class="table">
          <tr>
            <th>#</th>
            <th>Produk</th>
            <th>Harga</th>
            <th>QTY</th>
            <th>Subtotal</th>
            <th>#</th>
          </tr>

          @foreach ($transaksi->transaksidetail as $item)
              
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->produk_name }}</td>
            <td>{{ format_rupiah($item->harga_satuan) }}</td>
            <td>{{ $item->quantity }}</td>
            <td>{{ format_rupiah($item->subtotal) }}</td>
            <td><a href="/admin/transaksi/detail/delete?id={{ $item->id }}"><i class="fas fa-times"></i></a></td>
          </tr>
          @endforeach

        </table>

        <div class="float-right">
          <h5><strong>Total : {{ format_rupiah($transaksi->total) }}</strong></h5>
        </div>

        @if ($transaksi->status == 'Pending')
        <a href="/admin/transaksi/detail/change-status?transaksi_id={{ $transaksi->id }}&status=Pending" class="btn btn-info btn-xl"><i class="fas fa-file"></i> Pending</a>
        @if (count($transaksi->transaksidetail) > 0)
        <a href="/admin/transaksi/detail/change-status?transaksi_id={{ $transaksi->id }}&status=Selesai" class="btn btn-success btn-xl"><i class="fas fa-check"></i> Selesai</a>
        @endif
        @endif
      </div>
    </div>
  </div>
  
</div>

<div class="row">
  <div class="col-md-6">
    <div class="card">
      <div class="card-body">
  
        <div class="form-group">
          <label for="total">Total Belanja:</label>
          <input type="number" class="form-control" id="total" value="{{ $transaksi->total }}">
        </div>

        <div class="form-group">
          <label for="bayar">Uang yang Dibayarkan:</label>
	        <input type="number" class="form-control" id="bayar">
        </div>

        <button onclick="hitung()" class="btn btn-primary btn-block">Hitung</button>

        <div class="form-group">
          <label for="kembalian">Uang Kembalian:</label>
	        <input type="number" class="form-control" id="kembalian" disabled>
        </div>

      </div>
    </div>
  </div>
</div>


<script>
  function hitung() {
    var total = parseInt(document.getElementById("total").value);
    var bayar = parseInt(document.getElementById("bayar").value);
    var kembalian = bayar - total;

    document.getElementById("kembalian").value = kembalian;
  }
</script>




<script src="/plugins/jquery/jquery.min.js"></script>

<script>


  const kode = document.querySelector('#kode-produk');
  const nama = document.querySelector('#nama-produk');
  const harga_satuan = document.querySelector('#harga-produk');
  const hidden_harga_satuan = document.querySelector('#hidden_harga_satuan');
  const hidden_satuan = document.querySelector('#hidden_satuan');
  const subtotal_sementara = document.querySelector('#subtotal');
  const produk_id = document.querySelector('#hidden_produk_id');
  const produk_name = document.querySelector('#hidden_produk_name');

  
  var satuan = 0;
  kode.addEventListener('change', function(){
    fetch('/admin/transaksi/cari-produk?kode='+kode.value)
    .then(response => response.json())
    .then(data => [
      nama.value = data.produk.name,
      harga_satuan.value = formatNumber(data.produk.harga), 
      hidden_harga_satuan.value = data.produk.harga, 
      hidden_subtotal.value = data.produk.harga, 
      subtotal_sementara.innerHTML = 'Subtotal : '+formatNumber(data.produk.harga), 
      hidden_produk_id.value = data.produk.id, 
      hidden_produk_name.value = data.produk.name, 
      satuan = data.produk.satuan])
  })




  function funQty(act){

    // console.log(window.satuan);
    var value = parseInt(document.getElementById('count_qty').value, 10)
    value = isNaN(value) ? 1 : value
    // value = 0
    if(act == 'plus'){
    value++
    }else{
      if(value <= 1){
        value = 1
      }else{
        value--
      }
    }

    var hargaSatuan =   document.querySelector('#hidden_harga_satuan').value;
    var total = hargaSatuan * value
    
    console.log(total);
    
    document.getElementById('count_qty').value = value
    // document.getElementById('total').value = total
    document.getElementById('subtotal').innerHTML = 'Subtotal : '+formatNumber(total)
    document.getElementById('hidden_subtotal').value = total
  }

  function formatNumber(x){
    return 'Rp. '+x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
  }

//   function formatNumber(x) {
//   // Menghapus tanda titik "." dalam format "Rp. 1.940.000"
//   x = x.replace(/\./g, "");
  
//   // Mengubah ke angka dan mengembalikan string dengan format yang diinginkan
//   return "Rp. " + parseInt(x).toLocaleString("id-ID");
// }


</script>



