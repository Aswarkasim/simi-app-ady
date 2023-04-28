  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-primary elevation-2">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="/img/ktc_logo_line.png" alt="AdminLTE Logo" width="15px" class="" style="opacity: .8"> 
      <span class="brand-text font-weight-light">SIMI-APP</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
    


      @php
          $role = auth()->user()->role;
      @endphp
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

          <li class="nav-item">
            <a href="/admin/dashboard" class="nav-link {{Request::is('admin/dashboard*') ? 'active' : ''}}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

          @if ($role == 'kasir')
          <li class="nav-item">
            <a href="/admin/transaksi" class="nav-link {{Request::is('admin/transaksi*') ? 'active' : ''}}">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Transaksi
              </p>
            </a>
          </li>
          @endif

          <li class="nav-item">
            <a href="/admin/produk" class="nav-link {{Request::is('admin/produk*') ? 'active' : ''}}">
              <i class="nav-icon fas fa-file"></i>
              <p>
                Produk
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="/admin/kategori" class="nav-link {{Request::is('admin/kategori*') ? 'active' : ''}}">
              <i class="nav-icon fas fa-list"></i>
              <p>
                Kategori
              </p>
            </a>
          </li>


          @if ($role == 'manager' || $role == 'gudang')

          <li class="nav-item">
            <a href="/admin/stok" class="nav-link {{Request::is('admin/stok*') ? 'active' : ''}}">
              <i class="nav-icon fas fa-database"></i>
              <p>
                Stok Keluar/Masuk
              </p>
            </a>
          </li>

          @endif

          @if ($role == 'manager')

          <li class="nav-item {{Request::is('admin/laporan*') ? 'menu-open' : ''}}">
            <a href="#" class="nav-link {{Request::is('admin/laporan*') ? 'active' : ''}}">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Laporan
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/admin/laporan/transaksi" class="nav-link {{Request::is('admin/laporan/transaksi*') ? 'child-active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Transaksi</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="/admin/laporan/produk" class="nav-link {{Request::is('admin/laporan/produk*') ? 'child-active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Produk</p>
                </a>
              </li>


              <li class="nav-item">
                <a href="/admin/laporan/stok" class="nav-link {{Request::is('admin/laporan/stok*') ? 'child-active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Stok Keluar/Masuk</p>
                </a>
              </li>

              
            </ul>
          </li>


              
          <li class="nav-item">
            <a href="/admin/user" class="nav-link {{Request::is('admin/user*') ? 'active' : ''}}">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Users
              </p>
            </a>
          </li>

          
          {{-- <li class="nav-item">
            <a href="/admin/konfigurasi" class="nav-link {{Request::is('admin/konfigurasi*') ? 'active' : ''}}">
              <i class="nav-icon fas fa-cogs"></i>
              <p>
                Konfigurasi
              </p>
            </a>
          </li> --}}

          @endif

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>


