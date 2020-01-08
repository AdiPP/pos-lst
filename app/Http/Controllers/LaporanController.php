<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Config;
use App\Product as Produk;
use App\Outlet;
use App\Sale;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        \App\Helpers\AppHelper::userCheck();
        Config::set('global.active_nav', 'laporan');
    }

    public function index()
    {
        $title = 'Laporan';
        return view('laporan.laporan', ['title' => $title]);
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

    public function penjualanPerProduk()
    {
        $title = 'Penjualan Per Produk';

        $produk = Produk::where('user_id', '=', session('user')->id)->get();

        $outlet = Outlet::where('user_id', '=', session('user')->id)->get();

        // dd($produk[0]->stokopnames->);

        return view('laporan.penjualan_per_produk', [
            'title' => $title,
            'produks' => $produk,
            'outlets' => $outlet
        ]);
    }

    public function penjualanPerProdukTampil()
    {
        $outlet = $_GET['outlet'];
        $tanggal = $_GET['tanggal'];

        if ($tanggal == "") {
            $tanggal = date('Y-m-d');
        } else {
            $tanggal = date("Y-m-d", strtotime(str_replace('/', '-', $_GET['tanggal'])));
        }

        // return $outlet.' '.$tanggal;

        $produk = Produk::where('user_id', '=', session('user')->id)->get();

        return view('laporan.tampil_laporan_penjualan_per_produk', [
            'produks' => $produk,
            'outlet' => $outlet,
            'tanggal' => $tanggal
        ]);
    }

    public function penjualanHarian()
    {
        $title = 'Penjualan Harian';

        $outlet = Outlet::where('user_id', '=', session('user')->id)->get();

        return view('laporan.penjualanharian.index', [
            'title' => $title,
            'outlets' => $outlet
        ]);
    }

    public function penjualanHarianTampil()
    {
        $outlet = $_GET['outlet'];
        $tanggal = $_GET['tanggal'];

        if ($tanggal == "") {
            $tanggal = date('Y-m-d');
        } else {
            $tanggal = date("Y-m-d", strtotime(str_replace('/', '-', $_GET['tanggal'])));
        }

        // return $outlet.' '.$tanggal;

        if ($outlet == "") {
            $sale = Sale::select(\DB::Raw('DATE(created_at) day'), \DB::raw('COUNT(id) as jumlahTransaksi'), \DB::raw('SUM(total) as penjualan'))->where('created_at', '>', $tanggal)->where('created_at', '<', date('Y-m-d', strtotime('+1 day', strtotime($tanggal))))->groupBy('day')->get();
        } else {
            $sale = Sale::select(\DB::Raw('DATE(created_at) day'), \DB::raw('COUNT(id) as jumlahTransaksi'), \DB::raw('SUM(total) as penjualan'))->where('outlet_id', $outlet)->where('created_at', '>', $tanggal)->where('created_at', '<', date('Y-m-d', strtotime('+1 day', strtotime($tanggal))))->groupBy('day')->get();
        }

        // $sales = Sale::groupBy('created_at')->get();

        return view('laporan.penjualanharian.tampil_penjualan_harian', [
            'sales' => $sale,
            'outlet' => $outlet,
            'tanggal' => $tanggal,
        ]);

    }

    public function stok()
    {
        $title = 'Stok';

        $outlet = Outlet::where('user_id', '=', session('user')->id)->get();

        return view('laporan.stok.index', [
            'title' => $title,
            'outlets' => $outlet
        ]);
    }

    public function stokTampil()
    {
        $outlet = $_GET['outlet'];
        $tanggal = $_GET['tanggal'];

        if ($tanggal == "") {
            $tanggal = date('Y-m-d');
        } else {
            $tanggal = date("Y-m-d", strtotime(str_replace('/', '-', $_GET['tanggal'])));
        }

        $produk = Produk::where('user_id', '=', session('user')->id)->get();

        return view('laporan.stok.tampil_stok', [
            'produks' => $produk,
            'outlet' => $outlet,
            'tanggal' => $tanggal
        ]);
    }
}
