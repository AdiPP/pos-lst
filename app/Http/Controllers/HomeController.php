<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Config;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailable;  
use App\Mail\Registrasi; 
use App\Sale;

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

        $test = ['January', 'February', 'March', 'April', 'May', 'June', 'July'];
        
        return view('home', [
            'penjualan' => $penjualanHariIni,
            'transaksi' => $transaksiHariIni,
            'penjualanKemarin' => $penjualanKemarin,
            'transaksiKemarin' => $transaksiKemarin,
            'saleAll' => $saleAll,
            'test' => $test
        ]);
    }

    public function mail()
    {
        $name = 'Krunal';
        Mail::to('adiputrapermana@gmail.com')->send(new SendMailable($name));
        
        return 'Email was sent';
    }
}
