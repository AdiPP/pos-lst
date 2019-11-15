<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Config;
use App\Product;
use App\ProductCategory as Category;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function __construct()
    {
        Config::set('global.active_nav', 'produk');
    }

    public function index()
    {
        $title = 'Produk';

        $produks = Product::all();

        return view('produk.produk', ['title' => $title, 'produks' => $produks]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Tambah Produk';

        $categories = Category::all();

        return view('produk.tambahProduk', ['title' => $title, 'categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $produk = new Product();
        $produk->product_name = $request->nama_produk;
        $produk->product_pict = '';
        $produk->product_sku = '';
        $produk->category_id = $request->kategori_produk;
        $produk->product_price = $this->pricetoint($request->harga_produk);
        $produk->save();

        return redirect('/produk');
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
        $title = 'Ubah Produk';

        $model = Product::find($id);

        return view('produk.ubahProduk', ['title' => $title, 'produk' => $model]);
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
        $model = Product::find($id);
        $model->product_name = $request->nama_produk;
        $model->product_sku = $request->sku_produk;
        $model->save();

        return redirect('/produk');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Product::find($id);
        $model->delete();
        
        return redirect('/produk');
    }

    private function pricetoint($price) 
    {
        return (int)str_replace(",", "",substr($price, 3, strlen($price)-6));
    }
}
