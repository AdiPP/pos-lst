<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Config;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailable;  
use App\Mail\Registrasi; 
use App\Sale;
use App\SaleInfo;
use App\Product;
use Helper;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        \App\Helpers\AppHelper::userCheck();
        Config::set('global.active_nav', 'dashboard');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $tanggal = date('Y-m-d');

        $sale = Sale::where('user_id', session('user')->id)->where('created_at', '>', $tanggal)->where('created_at', '<', date('Y-m-d', strtotime('+1 day', strtotime($tanggal))))->get();

        $saleKemarin = Sale::where('user_id', session('user')->id)->where('created_at', '>', date('Y-m-d', strtotime('-1 day', strtotime($tanggal))))->where('created_at', '<', $tanggal)->get();

        $saleAll = Sale::select(\DB::Raw('DATE(created_at) day'), \DB::raw('COUNT(id) as jumlahTransaksi'), \DB::raw('SUM(total) as penjualan'))->where('created_at', '<', date('Y-m-d', strtotime('+1 day', strtotime($tanggal))))->groupBy('day')->get();

        $penjualanHariIni = $sale->reduce(function ($carry, $item) {
            return $carry + $item->total;
        });

        if (($penjualanKemarin = $saleKemarin->reduce(function ($carry, $item) {
            return $carry + $item->total;
        })) == null) {
            $penjualanKemarin = 0;
        }

        $transaksiHariIni = $sale->count();

        if (($transaksiKemarin = $saleKemarin->count()) == null) {
            $transaksiKemarin = 0;
        }

        // $produk = SaleInfo::select('product_id', \DB::Raw('SUM(jumlah) as penjualan'))
        //     ->join('sales', 'sale_infos.sale_id', '=', 'sales.id')
        //     // ->select('sales.id')
        //     ->groupBy('product_id')->orderBy('penjualan', 'DESC')->get();

        $produk = SaleInfo::whereHas('sale', function ($query) {
                $query->where('user_id', session('user')->id);
            })
            ->select('product_id', \DB::raw('SUM(jumlah) as penjualan'))
            ->groupBy('product_id')
            ->orderBy('penjualan', 'DESC')
            ->take(5)
            ->get();

        $kategori = DB::table('sale_infos')
            ->join('sales', 'sale_infos.sale_id', '=', 'sales.id')
            ->where('sales.user_id', session('user')->id)
            ->join('products', 'sale_infos.product_id', '=', 'products.id')
            ->join('product_categories', 'products.category_id', '=', 'product_categories.id')
            ->select('product_categories.category_name', DB::raw('SUM(sale_infos.jumlah) as penjualan'))
            ->groupBy('product_categories.category_name')
            ->orderBy('penjualan')
            ->get();

        // dd($kategori);

        // $kategori = DB::table('product_categories')
        //     ->join()

        // dd($kategori);

        // $kategori = SaleInfo::all();

        // dd($kategori);   
        
        return view('home', [
            'penjualan' => $penjualanHariIni,
            'transaksi' => $transaksiHariIni,
            'penjualanKemarin' => $penjualanKemarin,
            'transaksiKemarin' => $transaksiKemarin,
            'saleAll' => $saleAll,
            'produks' => $produk,
            'kategoris' => $kategori
        ]);
    }

    public function mail()
    {
        $name = 'Krunal';
        Mail::to('adiputrapermana@gmail.com')->send(new SendMailable($name));
        
        return 'Email was sent';
    }
    
    public function getGrafikPenjualan()
    {
        // Get data from database
        $saleAll = Helper::getLaporanPenjualan();

        // Prepare data to graphic
        $saleAllArr['tanggal'] = [];
        $saleAllArr['totalPenjualan'] = [];

        foreach ($saleAll as $sale) {
            array_push($saleAllArr["tanggal"], $sale->day);
            array_push($saleAllArr["totalPenjualan"], $sale->penjualan);
        }

        return $saleAllArr;
    }

    public function getGrafikTransaksi()
    {
        // Get data from database
        $saleAll = Helper::getLaporanPenjualan();

        // Prepare data to graphic
        $saleAllArr['tanggal'] = [];
        $saleAllArr['totalTransaksi'] = [];

        foreach ($saleAll as $sale) {
            array_push($saleAllArr["tanggal"], $sale->day);
            array_push($saleAllArr["totalTransaksi"], $sale->jumlahTransaksi);
        }

        return $saleAllArr;
    }
}
