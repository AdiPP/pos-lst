<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Config;
use App\Product;
use App\ProductCategory as Category;
use App\Unit;
use Redirect;

class ProdukController extends Controller
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
        $title = 'Produk';

        $produks = Product::where('user_id', '=', session('user')->id)->get();

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
        $units = Unit::all();

        return view('produk.tambahProduk', ['title' => $title, 'categories' => $categories, 'units' => $units]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        // File Uploads
        ($request->file('foto_produk')) ? $path = $request->file('foto_produk')->store('', 'product') : $path = null;

        // Inserting Models
        $produk = new Product();
        $produk->product_name = $request->nama_produk;
        $produk->product_pict = $path;
        $produk->product_barcode = $request->barcode_produk;
        $produk->product_sku = $request->sku_produk;
        $produk->category_id = $request->kategori_produk;
        $produk->product_price = $this->pricetoint($request->harga_produk);
        $produk->unit_id = $request->satuan_produk;
        $produk->user_id = session('user')->id;
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
        $categories = Category::all();
        $units = Unit::all();

        return view('produk.ubahProduk', ['title' => $title, 'produk' => $model, 'categories' => $categories, 'units' => $units]);
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

        // File Uploads
        if ($request->file('foto_produk') !== null)
        {
            $path = $request->file('foto_produk')->store('', 'product');
            $model->product_pict = $path;
        }

        $model->product_name = $request->nama_produk;
        $model->product_barcode = $request->barcode_produk;
        $model->product_sku = $request->sku_produk;
        $model->category_id = $request->kategori_produk;
        $model->product_price = $this->pricetoint($request->harga_produk);
        $model->unit_id = $request->satuan_produk;
        
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
