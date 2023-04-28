<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AdminKategoriController extends Controller
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

        $kategori = Kategori::latest()->paginate(10);

        if ($cari) {
            $kategori = Kategori::where('name', 'like', '%' . $cari . '%')->latest()->paginate(10);
        } else {
            $kategori = Kategori::latest()->paginate(10);
        }


        $data = [
            'title'   => 'Manajemen Kategori',
            'kategori' => $kategori,
            'content' => 'admin/kategori/index'
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
            'title'   => 'Tambah Kategori',
            'content' => 'admin/kategori/add'
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
            'name'          => 'required|unique:kategoris|min:3',
        ]);
        Kategori::create($data);
        toast()->success('Sukses', 'Kategori telah ditambahkan');
        return redirect('/admin/kategori/create');
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
        $kategori = Kategori::find($id);
        $data = [
            'title'   => 'Tambah Kategori',
            'kategori' => $kategori,
            'content' => 'admin/kategori/add'
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
        $kategori = Kategori::find($id);
        $data = $request->validate([
            'name'          => 'required|min:3|unique:kategoris,name,' . $kategori->id,
        ]);



        $kategori->update($data);
        toast()->success('Sukses', 'Kategori telah diedit');
        return redirect('/admin/kategori/' . $kategori->id . '/edit');
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
        $kategori = Kategori::find($id);
        $kategori->delete();
        toast()->success('Sukses', 'Kategori telah dihapus');
        return redirect('/admin/kategori');
    }
}
