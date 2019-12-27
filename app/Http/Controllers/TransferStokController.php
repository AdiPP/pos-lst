<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use App\Product;
use App\StockTransferTemp;
use App\Outlet;
use App\StockTransfer;
use App\StockTransferInfo;

class TransferStokController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Transfer Stok';

        $transfer = StockTransfer::where('user_id', session('user')->id)->get();

        return view('inventori.transferstok.index', ['title' => $title, 'transfers' => $transfer]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Tambah Transfer Stok';

        $outlet = Outlet::where('user_id', session('user')->id)->get();

        $produk = Product::where('user_id', session('user')->id)->get();

        return view('inventori.transferstok.tambah', ['title' => $title, 'produks' => $produk, 'outlets' => $outlet]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $model = new StockTransfer();
        $model->user_id = session('user')->id;
        $model->outlet_asal_id = $request->outletAsal;
        $model->outlet_tujuan_id = $request->outletTujuan;
        $model->tanggal = \App\Helpers\AppHelper::tanggalToMysql($request->tanggal);
        $model->description = $request->catatan;
        $model->save();

        $produkLength = count($request->produk);

        for ($i=0; $i < $produkLength; $i++) { 
            $model_info = new StockTransferInfo();
            $model_info->stock_transfer_id = $model->id;
            $model_info->product_id = $request->produk[$i];
            $model_info->jumlah = $request->jumlah[$i];
            $model_info->save();
        }

        return redirect('/inventori/transferstok');
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

    public function tambahProduk(Request $request)
    {   
        $produk = Product::where('user_id', session('user')->id)->get();
        return view('inventori.transferstok.tambah_produk', [
            'produks' => $produk,
        ]);
    }
}
