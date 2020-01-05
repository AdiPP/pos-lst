<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Outlet;
use App\Product;
use App\StockEntry;
use App\StockEntryInfo;
use App\User;

class StokMasukController extends Controller
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
        $title = 'Stok Masuk';

        $model = StockEntry::where('user_id', session('user')->id)->get();

        return view('inventori.stokmasuk.index', ['title' => $title, 'models' => $model]);
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

        return view('inventori.stokmasuk.tambah', ['outlets' => $outlet, 'produks' => $produk]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Simpan stok masuk.
        $model = new StockEntry();
        $model->outlet_id = $request->outlet;
        $model->description = $request->catatan;
        $model->user_id = session('user')->id;
        $model->tanggal = \App\Helpers\AppHelper::tanggalToMysql($request->tanggal);
        $model->save();

        // Deklarasi panjang produk.
        $produkLength = count($request->produk);

        // Simpan informasi stok masuk.
        for ($i=0; $i < $produkLength; $i++) { 
            $model_info = new StockEntryInfo();
            $model_info->stock_entry_id = $model->id;
            $model_info->jumlah = $request->jumlah[$i];
            $model_info->harga_beli_per_unit = $request->hargaBeli[$i];
            $model_info->total_harga_beli = $request->total[$i];
            $model_info->product_id = $request->produk[$i];
            $model_info->save();
        }

        return redirect('/inventori/stokmasuk');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $outlet = Outlet::where('user_id', session('user')->id)->get();
        $produk = Product::where('user_id', session('user')->id)->get();
        $stokmasuk = StockEntry::find($id);

        return view('inventori.stokmasuk.perbarui', ['outlets' => $outlet, 'produks' => $produk, 'stokmasuk' => $stokmasuk]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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
        $model = StockEntry::find($id);
        $model->delete();

        return redirect('/inventori/stokmasuk');
    }

    public function tambahProduk()
    {
        $model = Product::where('user_id', session('user')->id)->get();
        return view('inventori.stokmasuk.tambah_produk', [
            'produks' => $model,
        ]);
    }

    public function infoProduk()
    {
        $id = $_GET['id'];

        return view('inventori.stokmasuk.infoproduk', [
            'produk' => Product::where('id', '=', $id)->first()
        ]);
    }
}
