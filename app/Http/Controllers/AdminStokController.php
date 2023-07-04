<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Stok;
use Illuminate\Http\Request;

class AdminStokController extends Controller
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

        $stok = Stok::latest()->paginate(10);

        if ($cari) {
            $stok = Stok::where('nama_produk', 'like', '%' . $cari . '%')->latest()->paginate(10);
        } else {
            $stok = Stok::latest()->paginate(10);
        }


        $data = [
            'title'   => 'Manajemen Stok',
            'stok' => $stok,
            'content' => 'admin/stok/index'
        ];
        return view('admin/layouts/wrapper', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data = [
            'title'   => 'Tambah Stok',
            'produk' => Produk::get(),
            'content' => 'admin/stok/add'
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
        $data = $request->validate([
            'kode_produk'       => 'required',
            'tanggal'       => 'required',
            'keterangan'    => 'required',
            'jumlah'        => 'required',
        ]);
        $produk = Produk::whereKode($request->kode_produk)->first();
        // dd($produk);
        $data['produk_id'] = $produk->id;
        $data['nama_produk'] = $produk->name;

        if ($request->keterangan == 'Masuk') {
            $dp = [
                'stok_gudang'  => $produk->stok + $request->jumlah
            ];
        } else {
            $dp = [
                'stok_gudang'  => $produk->stok - $request->jumlah
            ];
        }

        $produk->update($dp);
        Stok::create($data);
        toast()->success('Sukses', 'Stok telah ditambahkan');
        return redirect('/admin/stok/create');
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
        $stok = Stok::find($id);
        $data = [
            'title'   => 'Tambah Stok',
            'stok' => $stok,
            'produk' => Produk::get(),
            'content' => 'admin/stok/add'
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
        $stok = Stok::find($id);
        $data = $request->validate([
            'kode_produk'       => 'required',
            'tanggal'       => 'required',
            'keterangan'    => 'required',
            'jumlah'        => 'required',
        ]);

        $produk = Produk::whereKode($request->kode_produk)->first();
        // dd($produk);
        $data['produk_id'] = $produk->id;
        $data['nama_produk'] = $produk->name;

        if ($request->keterangan == 'Masuk') {
            $dp = [
                'stok_gudang'  => $produk->stok + $request->jumlah
            ];
        } else {
            $dp = [
                'stok_gudang'  => $produk->stok - $request->jumlah
            ];
        }

        $produk->update($dp);

        $stok->update($data);
        toast()->success('Sukses', 'Stok telah diedit');
        return redirect('/admin/stok/' . $stok->id . '/edit');
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
        $stok = Stok::find($id);
        $stok->delete();
        toast()->success('Sukses', 'Stok telah dihapus');
        return redirect('/admin/stok');
    }
}
