<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Cart;

class PosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produk = Product::all();
        return view('pos.index', [
            'produks' => $produk,
        ]);
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

    public function infoproduk()
    {
        $id = $_GET['id'];

        return view('pos.infoproduk', [
            'produk' => Product::where('id', '=', $id)->first()
        ]);
    }

    public function keranjang(Request $request)
    {
        if ($model = Cart::where('user_id', '=', 25)->where('product_id', '=', $request->input('id'))->first()) { // update jumlah produk
            $model->jumlah = $model->jumlah + 1;
            if ($model->save()) {
                return 'Data berhasil ditambah';
            } else 'Data gagal ditambah';
        } else { // tambah produk
            $model = new Cart();
            $model->product_id = $request->input('id');
            $model->user_id = 25;
            $model->jumlah = 1;
            if ($model->save()) {
                return 'Data berhasil disimpan';
            } else return 'Data gagal disimpan';
        }
    }

    public function keranjangTampil()
    {
        $model = Cart::all();
        
        return view('pos.keranjangTampil', [
            'models' => $model
        ]);
    }

    public function keranjangKurang(Request $request)
    {
        $model = Cart::where('user_id', '=', 25)->where('id', '=', $request->input('id'))->first();
        $model->jumlah = $model->jumlah - 1;
        if ($model->save()) {
            return 'Data berhasil dikurangi';
        } else 'Data gagal dikurangi';
    }
}
