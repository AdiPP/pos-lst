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

        $produk = Product::all();

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
        $model->description =  $request->catatan;
        if ($model->save()) {

            $temps = StockTransferTemp::where('user_id', session('user')->id)->get();

            foreach ($temps as $temp) {
                $modelInfo = new StockTransferInfo();
                $modelInfo->product_id = $temp->product_id;
                $modelInfo->jumlah = $temp->jumlah;
                $modelInfo->stock_transfer_id = $model->id;
                $modelInfo->save();
                StockTransferTemp::find($temp->id)->delete();
            }

            return redirect('/inventori/transferstok');
        } else return 'Data gagal ditambah';
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

    public function infoProduk()
    {
        $idProduk = $_GET['idProduk'];

        $produk = Product::find($idProduk);
        
        return view('inventori.transferstok.infoproduk', ['produk' => $produk]);
    }

    public function tambahProduk(Request $request)
    {
        $idProduk = $request->input('idProduk');
        $jumlahProduk = $request->input('jumlahProduk');

        if ($model = StockTransferTemp::where('product_id', $idProduk)->where('user_id', 25)->first()) {
            $model->jumlah = $model->jumlah + $jumlahProduk;
            if ($model->save()) {
                return 'Jumlah produk berhasil ditambah '.$jumlahProduk;
            } else return 'Jumlah produk gagal ditambah';
        } else {
            $model = new StockTransferTemp();
            $model->product_id = $idProduk;
            $model->jumlah = $jumlahProduk;
            $model->user_id = 25;
            if ($model->save()) {
                return 'Data berhasil disimpan ke tabel '.$model->getTable().' 👌';
            } else return 'Data gagal disimpan 🥺';
        }
    }

    public function tampilTemp()
    {
        $temp = StockTransferTemp::all();

        return view('inventori.transferstok.tampiltemp', ['temps' => $temp]);
    }

    public function hapusTemp()
    {
        $id = $_GET['id'];

        $model = StockTransferTemp::find($id);
        if ($model->delete()) {
            return 'Produk '.$model->produk->product_name.' berhasil dihapus dari tabel '.$model->getTable();
        } else return 'Produk '.$model->produk->product_name.' gagal dihapus';
    }
}
