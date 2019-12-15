<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Cart;
use App\Customer;
use App\Sale;
use App\SaleInfo;
Use DB;

class PosController extends Controller
{
    public function __construct()
    {
        \App\Helpers\AppHelper::userCheck();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produk = Product::where('user_id', session('user')->id)->get();
        $pelanggan = Customer::where('user_id', session('user')->id)->get();
        return view('pos.index', [
            'produks' => $produk,
            'pelanggans' => $pelanggan
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
            $model->jumlah = $model->jumlah + $request->input('jumlahproduk');
            if ($model->save()) {
                return 'Jumlah produk berhasil ditambah '.$request->input('jumlahproduk');
            } else 'Data gagal ditambah';
        } else { // tambah produk
            $model = new Cart();
            $model->product_id = $request->input('id');
            $model->user_id = 25;
            $model->jumlah = $request->input('jumlahproduk');
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
        if ($model = Cart::where('user_id', '=', 25)->where('id', '=', $request->input('id'))->first()) {
            if ($model->jumlah === 1) {
                if ($model->forceDelete()) {
                    return 'Data berhasil dihapus';
                } else return 'Data gagal dihapus';
            } else  {
                $model->jumlah = $model->jumlah - 1;   
                if ($model->save()) {
                    return 'Data berhasil dikurangi';
                } else 'Data gagal dikurangi';
            }
        } else return 'Data tidak ditemukan pada keranjangKurang()';
    }

    public function keranjangTambah(Request $request)
    {
        $model = Cart::where('user_id', '=', 25)->where('id', '=', $request->input('id'))->first();
        $model->jumlah = $model->jumlah + 1;
        if ($model->save()) {
            return 'Data berhasil ditambah';
        } else return 'Data gagal ditambah';
    }

    public function infoTotal()
    {
        // $model = Cart::where('user_id', '=', 25)->sum('jumlah');

        // $model = Cart::where('carts.user_id', 25)->leftJoin('products', 'carts.product_id', '=', 'products.id')->select()->get();

        // $model  = Cart::where('carts.user_id', 25)->sum('');

        // $model = DB::table('carts')
        //             ->join('products', 'carts.product_id', '=', 'products.id')
        //             ->select(DB::raw('carts.jumlah * products.product_price AS total'))
        //             ->get();
        // return $model->sum('total');

        $model = Cart::with('Produk')
                    ->where('user_id', '=', 25)
                    ->get()
                    ->reduce(function($carry, $item) {
                        return $carry + ($item->jumlah * $item->produk->product_price);
                    });

        return $model;
    }

    public function bayar(Request $request)
    {
        $model = new Sale();
        $model->outlet_id = $request->input('outletid');
        $model->customer_id = $request->input('pelangganid');
        $model->admin_id = $request->input('adminid');
        $model->total = $request->input('total');
        $model->cash = $request->input('cash');
        $model->save();

        $carts = Cart::where('user_id', '=', 25)->get();

        foreach ($carts as $cart) {
            $model_info = new SaleInfo();
            $model_info->sale_id = $model->id;
            $model_info->product_id = $cart->product_id;
            $model_info->jumlah = $cart->jumlah;
            $model_info->save();
            Cart::where('id', '=', $cart->id)->delete();
        }

        // return $model_info;
        return $model->cash - $model->total;
    }

    public function reloadPelanggan()
    {
        $pelanggan = Customer::where('user_id', session('user')->id)->get();

        return view('pos.pelanggan', ['pelanggans' => $pelanggan]);
    }

    public function tambahPelanggan(Request $request)
    {
        $customer = new Customer();
        $customer->nama = $request->nama;
        $customer->telepon = $request->telepon;
        $customer->email = $request->email;
        $customer->user_id = session('user')->id;
        if ($customer->save()) {
            return 'Pelanggan berhasil ditambah';
        }
    }
}
