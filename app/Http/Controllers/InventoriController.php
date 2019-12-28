<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StockEntry as StokMasuk;
use App\Product as Produk;
use App\Sale;
use App\Outlet;

class InventoriController extends Controller
{
    public function __construct()
    {
        \App\Helpers\AppHelper::userCheck();   
        // Config::set('global.active_nav', 'produk');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Kartu Stok';

        $produk = Produk::where('user_id', '=', session('user')->id)->get();

        $outlet = Outlet::where('user_id', '=', session('user')->id)->get();

        return view('inventori.index', ['title' => $title, 'produks' => $produk, 'outlets' => $outlet]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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

    public function tampilKartuStok()
    {
        $outlet = $_GET['outlet'];
        $produk = Produk::where('user_id', '=', session('user')->id)->get();

        return view('inventori.tampilKartuStok', [
            'produks' => $produk,
            'outlet' => $outlet
        ]);
    }
}
