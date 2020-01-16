<?php
namespace App\Helpers;

use App\Sale;

class LaporanHelper
{

    public function __construct(){
        date_default_timezone_set('Asia/Bangkok');
    }

    public static function test() {
        return 'Worked';
    }

    public static function getPenjualanHarian($outlet, $tanggalAwal, $tanggalAkhir) {
        if ($outlet == "") {
            return Sale::select(\DB::Raw('DATE(created_at) day'), \DB::raw('COUNT(id) as jumlahTransaksi'), \DB::raw('SUM(total) as penjualan'))->where('created_at', '>', $tanggalAwal)->where('created_at', '<', date('Y-m-d', strtotime('+1 day', strtotime($tanggalAkhir))))->groupBy('day')->get();
        } else {
            return Sale::select(\DB::Raw('DATE(created_at) day'), \DB::raw('COUNT(id) as jumlahTransaksi'), \DB::raw('SUM(total) as penjualan'))->where('outlet_id', $outlet)->where('created_at', '>', $tanggalAwal)->where('created_at', '<', date('Y-m-d', strtotime('+1 day', strtotime($tanggalAkhir))))->groupBy('day')->get();
        }
    }

}   