<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\StockOpnameTemp;
use App\Outlet;
use App\StockOpname;
use App\StockOpnameInfo;
use Helper;

class StokOpnameController extends Controller
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
        $stokopname = StockOpname::where('user_id', session('user')->id)->get();

        return view('inventori.stokopname.index', ['title' => 'Stok Opname', 'stokopnames' => $stokopname]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $produk = Product::where('user_id', session('user')->id)->get();
        $outlet = Outlet::where('user_id', session('user')->id)->get();

        return view('inventori.stokopname.tambah', ['title' => 'Tambah Stok Opname', 'produks' => $produk, 'outlets' => $outlet]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        date_default_timezone_set("Asia/Bangkok");

        $model = new StockOpname();
        $model->outlet_id = $request->outlet;
        $model->user_id = session('user')->id;
        $model->tanggal = date('Y-m-d');
        $model->catatan = $request->catatan;
        $model->save();

        // Deklarasi panjang produk.
        $produkLength = count($request->produk);

        // Simpan informasi stok masuk.
        for ($i=0; $i < $produkLength; $i++) { 
            $model_info = new StockOpnameInfo();
            $model_info->stok_opname_id = $model->id;
            $model_info->product_id = $request->produk[$i];
            $model_info->selisih = $request->selisih[$i];
            $model_info->jumlah_sistem = $request->jumlahSistem[$i];
            $model_info->jumlah = $request->jumlah[$i];
            $model_info->save();
        }

        return redirect('/inventori/stokopname');
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
        $produk = Product::where('user_id', session('user')->id)->get();

        return view('inventori.stokopname.tambah_produk', [
            'produks' => $produk,
        ]);
    }

    public function pilihProduk()
    {
        $produkTemp = $_GET['produk'];
        $outlet = $_GET['outlet'];

        $produk = Product::find($produkTemp);

        return Helper::getStokAkhir($produk, $outlet);
    }
}
