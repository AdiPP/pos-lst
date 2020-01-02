<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Cart;
use App\Customer;
use App\Sale;
use App\SaleInfo;
use App\Outlet;
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
        if (session('user')->getTable() == 'user_pegawais') {
            $produk = Product::where('user_id', session('user')->user_master)->get();
            $pelanggan = Customer::where('user_id', session('user')->user_master)->get();
            $outlet = Outlet::where('id', session('user')->outlet_id)->get();
        } else {
            $produk = Product::where('user_id', session('user')->id)->get();
            $pelanggan = Customer::where('user_id', session('user')->id)->get();
            $outlet = Outlet::where('user_id', session('user')->id)->get();
        }

        return view('pos.index', [
            'produks' => $produk,
            'pelanggans' => $pelanggan,
            'outlets' => $outlet
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
        if (session('user')->getTable() == 'user_pegawais') {
            if ($model = Cart::where('admin_id', session('user')->id)->where('product_id', '=', $request->input('id'))->first()) {
                $model->jumlah = $model->jumlah + $request->input('jumlahproduk');
                if ($model->save()) {
                    return 'Jumlah produk berhasil ditambah '.$request->input('jumlahproduk');
                } else 'Data gagal ditambah';
            } else {
                $model = new Cart();
                $model->product_id = $request->input('id');
                $model->admin_id = session('user')->id;
                $model->user_id = session('user')->user_master;
                $model->jumlah = $request->input('jumlahproduk');
                if ($model->save()) {
                    return 'Data berhasil disimpan';
                } else return 'Data gagal disimpan';
            }
        } else {
            if ($model = Cart::where('admin_id', 0)->where('user_id', '=', session('user')->id)->where('product_id', '=', $request->input('id'))->first()) { // update jumlah produk
                $model->jumlah = $model->jumlah + $request->input('jumlahproduk');
                if ($model->save()) {
                    return 'Jumlah produk berhasil ditambah '.$request->input('jumlahproduk');
                } else 'Data gagal ditambah';
            } else { // tambah produk
                $model = new Cart();
                $model->product_id = $request->input('id');
                $model->user_id = session('user')->id;
                $model->admin_id = 0;
                $model->jumlah = $request->input('jumlahproduk');
                if ($model->save()) {
                    return 'Data berhasil disimpan';
                } else return 'Data gagal disimpan';
            }
        }
    }

    public function keranjangTampil()
    {
        if (session('user')->getTable() == 'user_pegawais') {
            $model = Cart::where('admin_id', session('user')->id)->get();
        } else {
            $model = Cart::where('user_id', session('user')->id)->where('admin_id', 0)->get();
        }
        
        return view('pos.keranjangTampil', [
            'models' => $model
        ]);
    }

    public function keranjangKurang(Request $request)
    {
        if (session('user')->getTable() == 'user_pegawais') {
            if ($model = Cart::where('admin_id', session('user')->id)->where('id', '=', $request->input('id'))->first()) {
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
        } else {
            if ($model = Cart::where('user_id', session('user')->id)->where('admin_id', 0)->where('id', '=', $request->input('id'))->first()) {
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
    }

    public function keranjangTambah(Request $request)
    {
        if (session('user')->getTable() == 'user_pegawais') {
            $model = Cart::where('admin_id', session('user')->id)->where('id', '=', $request->input('id'))->first();
            $model->jumlah = $model->jumlah + 1;
            if ($model->save()) {
                return 'Data berhasil ditambah';
            } else return 'Data gagal ditambah';
        } else {
            $model = Cart::where('user_id', session('user')->id)->where('admin_id', 0)->where('id', '=', $request->input('id'))->first();
            $model->jumlah = $model->jumlah + 1;
            if ($model->save()) {
                return 'Data berhasil ditambah';
            } else return 'Data gagal ditambah';
        }
    }

    public function infoTotal()
    {
        if (session('user')->getTable() == 'user_pegawais') {
            $model = Cart::with('Produk')
                    ->where('admin_id', session('user')->id)
                    ->get()
                    ->reduce(function($carry, $item) {
                        return $carry + ($item->jumlah * $item->produk->product_price);
                    });
        } else {
            $model = Cart::with('Produk')
                    ->where('user_id', session('user')->id)->where('admin_id', 0)
                    ->get()
                    ->reduce(function($carry, $item) {
                        return $carry + ($item->jumlah * $item->produk->product_price);
                    });
        }

        return $model;
    }

    public function bayar(Request $request)
    {
        if (session('user')->getTable() == 'user_pegawais') {
            $model = new Sale();
            $model->outlet_id = $request->input('outletid');
            $model->customer_id = $request->input('pelangganid');
            $model->admin_id = $request->input('adminid');
            $model->user_id = session('user')->user_master;
            $model->total = $request->input('total');
            $model->cash = $request->input('cash');
            $model->save();

            $carts = Cart::where('admin_id', session('user')->id)->get();

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
        } else {
            $model = new Sale();
            $model->outlet_id = $request->input('outletid');
            $model->customer_id = $request->input('pelangganid');
            $model->admin_id = 0;
            $model->user_id = $request->input('adminid');
            $model->total = $request->input('total');
            $model->cash = $request->input('cash');
            $model->save();

            $carts = Cart::where('user_id', session('user')->id)->where('admin_id', 0)->get();

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
    }

    public function reloadPelanggan()
    {
        if (session('user')->getTable() == 'user_pegawais') {
            $pelanggan = Customer::where('user_id', session('user')->user_master)->get();
        } else {
            $pelanggan = Customer::where('user_id', session('user')->id)->get();
        }

        return view('pos.pelanggan', ['pelanggans' => $pelanggan]);
    }

    public function tambahPelanggan(Request $request)
    {
        if (session('user')->getTable() == 'user_pegawais') {
            $customer = new Customer();
            $customer->nama = $request->nama;
            $customer->telepon = $request->telepon;
            $customer->email = $request->email;
            $customer->user_id = session('user')->user_master;
            if ($customer->save()) {
                return 'Pelanggan berhasil ditambah';
            }
        } else {
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
}
