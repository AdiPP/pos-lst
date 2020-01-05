<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Outlet;
use App\Product;
use App\StockOut;
use App\StockOutInfo;

class StokKeluarController extends Controller
{
    public function __construct()
    {
        \App\Helpers\AppHelper::userCheck();   
        \Config::set('global.active_nav', 'inventori');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Stok Keluar';

        $model = StockOut::all();

        return view('inventori.stokkeluar.index', [
            'title' => $title,
            'models' => $model
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $outlet = Outlet::where('user_id', session('user')->id)->get();
        $produk = Product::where('user_id', session('user')->id)->get();

        return view('inventori.stokkeluar.tambah', ['outlets' => $outlet, 'produks' => $produk]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
        $model = new StockOut();
        $model->outlet_id = $request->outlet;
        $model->description = $request->catatan;
        $model->user_id = session('user')->id;
        $model->tanggal = \App\Helpers\AppHelper::tanggalToMysql($request->tanggal);
        $model->save();

        $produkLength = count($request->produk);

        for ($i=0; $i < $produkLength; $i++) { 
            $model_info = new StockOutInfo();
            $model_info->stock_out_id = $model->id;
            $model_info->product_id = $request->produk[$i];
            $model_info->jumlah = $request->jumlah[$i];
            $model_info->save();
        }

        return redirect('/inventori/stokkeluar');
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
    }

    public function tambahProduk()
    {
        $model = Product::where('user_id', session('user')->id)->get();
        return view('inventori.stokkeluar.tambah_produk', [
            'produks' => $model,
        ]);
    }
}
