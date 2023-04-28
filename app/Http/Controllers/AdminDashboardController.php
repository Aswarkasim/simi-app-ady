<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Produk;
use App\Models\Stok;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    //

    function index()
    {
        $produk = Produk::count();
        $kategori = Kategori::count();
        $transaksi = Transaksi::count();
        $stok = Stok::count();
        $data = [
            'produk'    => $produk,
            'kategori'    => $kategori,
            'transaksi'    => $transaksi,
            'stok'    => $stok,
            'content'   => 'admin/dashboard/index'
        ];
        return view('admin/layouts/wrapper', $data);
    }

    function kasir()
    {
    }
}
