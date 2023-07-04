<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Produk;
use Illuminate\Http\Request;

class AdminProdukController extends Controller
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

        $produk = Produk::latest()->paginate(10);

        if ($cari) {
            $produk = Produk::with('kategori')->where('name', 'like', '%' . $cari . '%')->latest()->paginate(10);
        } else {
            $produk = Produk::with('kategori')->latest()->paginate(10);
        }


        $data = [
            'title'   => 'Manajemen Produk',
            'produk' => $produk,
            'content' => 'admin/produk/index'
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
            'title'   => 'Tambah Produk',
            'kategori' => Kategori::get(),
            'random_number' => str_pad(mt_rand(1, 999999), 6, '0', STR_PAD_LEFT),
            'content' => 'admin/produk/add'
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
        // print_r($request);
        // die;
        // Re Password harusnya tidak masuk
        $data = $request->validate([
            'kode'          => 'required|unique:produks',
            'name'          => 'required',
            'kategori_id'          => 'required',
            'harga'          => 'required',
            'stok'          => 'required',
        ]);
        Produk::create($data);
        toast()->success('Sukses', 'Produk telah ditambahkan');
        return redirect('/admin/produk/create');
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
        $produk = Produk::find($id);
        $data = [
            'title'   => 'Tambah Produk',
            'produk' => $produk,
            'kategori' => Kategori::get(),
            'content' => 'admin/produk/add'
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
        $produk = Produk::find($id);
        $data = $request->validate([
            // 'name'          => 'required|min:3|unique:produks,name,' . $produk->id,
            'kode'              => 'required|unique:produks,kode,' . $produk->id,
            'name'              => 'required',
            'kategori_id'       => 'required',
            'harga'             => 'required',
            'stok'              => 'required',

        ]);

        $data_diskon = 0;
        $diskon =  $request->promo_diskon;

        dd($data_diskon);

        if ($diskon != null) {
            $data_diskon = $diskon;
        } else {
            $data_diskon   = $produk->diskon;
        }

        // $data['promo_diskon'] = $data_diskon;

        $produk->update($data);
        toast()->success('Sukses', 'Produk telah diedit');
        return redirect('/admin/produk/' . $produk->id . '/edit');
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
        $produk = Produk::find($id);
        $produk->delete();
        toast()->success('Sukses', 'Produk telah dihapus');
        return redirect('/admin/produk');
    }


    public function checkUniqueCode(Request $request)
    {
        $kode = $request->input('kode');
        $id = $request->input('id');

        $produk = Produk::where('kode', $kode)->first();

        if ($produk && $produk->id != $id) {
            return response()->json(['status' => 'error', 'message' => 'The code is not unique.']);
        } else {
            return response()->json(['status' => 'success']);
        }
    }

    public function checKode(Request $request)
    {
        $kode = Produk::whereKode($request->kode)->first();
        return response()->json(['kode' => $kode]);
    }
}
