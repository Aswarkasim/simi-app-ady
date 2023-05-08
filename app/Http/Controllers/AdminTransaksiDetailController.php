<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Transaksi;
use App\Models\TransaksiDetail;
use Illuminate\Http\Request;

class AdminTransaksiDetailController extends Controller
{
    //
    function add(Request $request)
    {
        $transaksi_id = $request->transaksi_id;
        $produk_id = $request->hidden_produk_id;

        $produk = Produk::find($produk_id);
        $transaksi = Transaksi::find($transaksi_id);
        $tr_detail = TransaksiDetail::whereTransaksiId($transaksi_id)->whereProdukId($produk_id)->first();


        $harga_diskon = $request->subtotal * $produk->promo_diskon / 100;
        $subtotal = $request->subtotal - $harga_diskon;
        if ($tr_detail == false) {
            $data = [
                'transaksi_id'      => $transaksi_id,
                'produk_id'         => $produk_id,
                'produk_name'         => $request->hidden_produk_name,
                'quantity'          => $request->qty,
                'harga_satuan'      => $request->hidden_harga_satuan,
                'promo_diskon'      => $produk->promo_diskon,
                'subtotal'          => $subtotal,
            ];
            $td = TransaksiDetail::create($data);
        } else {
            $data = [
                'quantity'          => $tr_detail->quantity + $request->qty,
                'subtotal'          => $tr_detail->subtotal + $subtotal,
            ];
            $tr_detail->update($data);
        }

        $total = TransaksiDetail::whereTransaksiId($transaksi_id)->sum('subtotal');
        $data_tr = [
            'total'     => $total
        ];
        $transaksi->update($data_tr);

        toast()->success('Produk telah ditambahkan');
        return redirect()->back();
    }

    function delete()
    {
        $id = request('id');
        $td = TransaksiDetail::find($id);
        $td->delete();
        toast()->success('Produk telah dihapus');
        return redirect()->back();
    }

    function changeStatus()
    {
        $transaksi_id = request('transaksi_id');
        $status = request('status');
        $transaksi = Transaksi::find($transaksi_id);
        $data_tr = [
            'status'     => $status
        ];
        $transaksi->update($data_tr);
        toast()->success('Data telah disimpan');
        return redirect('/admin/transaksi');
    }
}
