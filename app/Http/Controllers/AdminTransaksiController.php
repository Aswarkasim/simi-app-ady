<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class AdminTransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $cari = request('cari');

        $transaksi = Transaksi::latest()->paginate(10);

        if ($cari) {
            $transaksi = Transaksi::where('name', 'like', '%' . $cari . '%')->latest()->paginate(10);
        } else {
            $transaksi = Transaksi::latest()->paginate(10);
        }


        $data = [
            'title'   => 'Manajemen Transaksi',
            'transaksi' => $transaksi,
            'content' => 'admin/transaksi/index'
        ];
        return view('admin/layouts/wrapper', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    function makeTransaction()
    {
        $user_id = auth()->user()->id;
        $name = auth()->user()->name;
        $data = [
            'user_id'   => $user_id,
            'total'     => 0,
            'kasir_name'    => $name,
        ];
        $transaksi = Transaksi::create($data);
        return redirect('/admin/transaksi/' . $transaksi->id . '/edit');
    }
    public function create()
    {
        //
        $data = [
            'title'   => 'Tambah Transaksi',
            'content' => 'admin/transaksi/add'
        ];
        return view('admin/layouts/wrapper', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // dd($request->all());
        $user_id = auth()->user()->id;
        $data = $request->validate([
            'user_id'          => '',
        ]);
        Transaksi::create($data);
        toast()->success('Sukses', 'Transaksi telah ditambahkan');
        return redirect('/admin/transaksi/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $transaksi = Transaksi::with('transaksidetail')->find($id);
        $data = [
            'title'   => 'Tambah Transaksi',
            'transaksi' => $transaksi,
            'content' => 'admin/transaksi/add'
        ];
        return view('admin/layouts/wrapper', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $transaksi = Transaksi::find($id);
        $data = $request->validate([
            'name'          => 'required|min:3|unique:transaksis,name,' . $transaksi->id,
        ]);



        $transaksi->update($data);
        toast()->success('Sukses', 'Transaksi telah diedit');
        return redirect('/admin/transaksi/' . $transaksi->id . '/edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $transaksi = Transaksi::find($id);
        $transaksi->delete();
        toast()->success('Sukses', 'Transaksi telah dihapus');
        return redirect('/admin/transaksi');
    }

    function cariProduk(Request $request)
    {
        $produk = Produk::whereKode($request->kode)->first();
        return response()->json(['produk' => $produk]);
    }
}
