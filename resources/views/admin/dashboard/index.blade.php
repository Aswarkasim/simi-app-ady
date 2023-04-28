<div class="alert alert-info">Selamat datang admin {{ auth()->user()->name }} di halaman {{ auth()->user()->role }}</div>

<div class="row mt-2">
    <div class="col-md-3">
      <div class="info-box">
        <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-file"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Total Produk</span>
          <span class="info-box-number">
            {{$produk}}
            <small>Produk</small>
          </span>
  
        </div>
      </div>
      <!-- /.info-box -->
    </div>

    <div class="col-md-3">
        <div class="info-box">
          <span class="info-box-icon bg-success elevation-1"><i class="fas fa-users"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Total Kategori Produk</span>
            <span class="info-box-number">
              {{$kategori}}
              <small>Kategori</small>
            </span>
    
          </div>
        </div>
        <!-- /.info-box -->
    </div>


    <div class="col-md-3">
        <div class="info-box">
          <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Jumlah Transaksi</span>
            <span class="info-box-number">
              {{$transaksi}}
              <small>Transaksi</small>
            </span>
    
          </div>
        </div>
        <!-- /.info-box -->
    </div>

    <div class="col-md-3">
        <div class="info-box">
          <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Aliran Gudang</span>
            <span class="info-box-number">
              {{$stok}}
              <small>Aliran</small>
            </span>
    
          </div>
        </div>
        <!-- /.info-box -->
    </div>

</div>  