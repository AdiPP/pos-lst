<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Config;
use App\ProductCategory as Category;

class KategoriProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        \App\Helpers\AppHelper::userCheck();
        Config::set('global.active_nav', 'produk');
    }

    public function index()
    {
        $title = 'Kategori Produk';

        $model = Category::where('user_id', '=', session('user')->id)->withCount('produk')->get();

        // $model = Category::find(6);
        // dd($model[2]->produk_count);

        return view('produk.kategoriProduk', ['title' => $title, 'models' => $model]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Tambah Kategori';
        return view('produk.tambahKategori', ['title' => $title]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model = new Category();
        $model->category_name = $request->nama_kategori;
        $model->category_description = $request->deskripsi_kategori;
        $model->user_id = session('user')->id;
        $model->save();

        return redirect('/produk/kategori');
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
        $title = 'Ubah Kategori';

        $model = Category::find($id);

        return view('produk.ubahKategori', ['title' => $title, 'model' => $model]);
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
        $model = Category::find($id);
        $model->category_name = $request->nama_kategori;
        $model->category_description = $request->deskripsi_kategori;
        $model->save();

        return redirect('/produk/kategori');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Category::find($id);
        $model->delete();
        
        return redirect('/produk/kategori');
    }
}
