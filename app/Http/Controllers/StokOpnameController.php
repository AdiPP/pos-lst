<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class StokOpnameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('inventori.stokopname.index', ['title' => 'Stok Opname']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $produk = Product::where('user_id', session('user')->id)->get();

        return view('inventori.stokopname.tambah', ['title' => 'Tambah Stok Opname', 'produks' => $produk]);
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

    public function infoProduk()
    {
        $idProduk = $_GET['idProduk'];

        $produk = Product::find($idProduk);

        $stokmasuk = $produk
                    ->stokmasuks
                    ->where('outlet_id', 2)
                    ->reduce(function($carry, $item){
                        return $carry + $item->infos[0]->jumlah;
                    });

        if (is_null($stokmasuk)) {
            $stokmasuk = 0;
        }

        $stokkeluar = $produk
                    ->stokkeluars
                    ->where('outlet_id', 2)
                    ->reduce(function($carry, $item){
                        return $carry + $item->infos[0]->jumlah;
                    });

        if (is_null($stokkeluar)) {
            $stokkeluar = 0;
        }

        $i = 0;

        foreach ($produk->sales as $sale) {
            if ($sale->outlet_id == 2) {
                foreach ($sale->infos as $info) {
                    if ($info->product_id == $produk->id) {
                        $i = $i + $info->jumlah;
                    }
                }
            }
        }

        $penjualan = $i;

        if (is_null($penjualan)) {
            $penjualan = 0;
        }

        $stokakhir = $stokmasuk - $stokkeluar - $penjualan;

        return view('inventori.stokopname.infoproduk', ['produk' => $produk, 'stokakhir' => $stokakhir]);
    }

    public function tambahProduk(Request $request)
    {
        return $request;
    }
}
