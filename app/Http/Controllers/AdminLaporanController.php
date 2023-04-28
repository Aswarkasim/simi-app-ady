<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Produk;
use App\Models\Stok;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class AdminLaporanController extends Controller
{
    //




    function transaksi()
    {
        $data = [
            'title'   => 'Laporan Transaksi',
            'content' => 'admin/laporan/transaksi'
        ];
        return view('admin/layouts/wrapper', $data);
    }

    function transaksiCetak()
    {
        $tanggalAwal = request('tanggal_awal');
        $tanggalAkhir = request('tanggal_akhir');
        $transaksi = Transaksi::whereBetween('created_at', [$tanggalAwal, $tanggalAkhir])->get();
        $data = [
            'title'     => 'Laporan Transaksi',
            'transaksi' => $transaksi,
        ];
        return view('admin/transaksi/cetak', $data);
    }


    function produk()
    {
        $data = [
            'title'   => 'Laporan Produk',
            'kategori' => Kategori::get(),
            'content' => 'admin/laporan/produk'
        ];
        return view('admin/layouts/wrapper', $data);
    }

    function produkCetak()
    {

        $kategori_id = request('kategori_id');

        if ($kategori_id != 'semua') {
            $produk = Produk::whereKategoriId($kategori_id)->get();
        } else {
            $produk = Produk::get();
        }
        $data = [
            'title'     => 'Laporan Transaksi',
            'produk' => $produk,
        ];
        return view('admin/produk/cetak', $data);
    }


    function stok()
    {


        $kategori_id = request('kategori_id');

        if ($kategori_id != 'semua') {
            $produk = Produk::whereKategoriId($kategori_id)->get();
        } else {
            $produk = Produk::get();
        }

        $data = [
            'title'   => 'Laporan Stok Gudang',
            'content' => 'admin/laporan/stok'
        ];
        return view('admin/layouts/wrapper', $data);
    }

    function stokCetak()
    {
        $tanggalAwal = request('tanggal_awal');
        $tanggalAkhir = request('tanggal_akhir');
        $keterangan = request('keterangan');

        if ($keterangan != 'semua') {
            $stok = Stok::whereKeterangan($keterangan)->whereBetween('created_at', [$tanggalAwal, $tanggalAkhir])->get();
        } else {
            $stok = Stok::whereBetween('created_at', [$tanggalAwal, $tanggalAkhir])->get();
        }

        $data = [
            'title'     => 'Laporan Transaksi',
            'stok' => $stok,
        ];
        return view('admin/stok/cetak', $data);
    }
}
