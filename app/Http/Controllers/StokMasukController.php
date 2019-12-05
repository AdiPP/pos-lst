<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Outlet;
use App\Product;
use App\StockEntry;
use App\StockEntryInfo;

class StokMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd('halo');
        $title = 'Stok Masuk';

        $model = StockEntry::all();

        return view('inventori.stokmasuk.index', ['title' => $title, 'models' => $model]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $outlet = Outlet::all();
        $produk = Product::all();

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
        $model = new StockEntry();
        $model->outlet_id = $request->outlet;
        $model->description = $request->outlet;
        $model->user_id = 25;
        // $model->stock_card_id = 1;
        $model->save();
        
        $model_info = new StockEntryInfo();
        $model_info->stock_entry_id = $model->id;
        $model_info->jumlah = $request->jumlah;
        $model_info->harga_beli_per_unit = $request->harga_beli;
        $model_info->total_harga_beli = $request->total;
        $model_info->product_id = $request->produk;
        $model_info->save();

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
        $model = Product::all();
        return view('inventori.stokmasuk.tambahProduk', ['produks' => $model]);
    }

    public function infoProduk()
    {
        $id = $_GET['id'];

        return view('inventori.stokmasuk.infoproduk', [
            'produk' => Product::where('id', '=', $id)->first()
        ]);
    }
}
