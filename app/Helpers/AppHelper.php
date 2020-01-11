<?php
namespace App\Helpers;

use Redirect;
use Helper;
use App\Wilayah;
use App\User;
use Carbon\Carbon;
use App\UserPegawai;
use App\Sale;

class AppHelper
{

    public function __construct(){
        date_default_timezone_set('Asia/Bangkok');
    }

    # User Validation
    public static function userCheck() 
    {
        session([
            'urlTemp' => request()->path(),
        ]);
        //Check the user session available
        if (!session()->has('user'))
        {   
            return Redirect::to('/login')->send();
        }

        //Check the user email verified status
        if (session('user')->getTable() != 'user_pegawais') {
            if(session('user')->email_verified_at === null)
            {
                return Redirect::to('/login')->with('status', 'email not verified')->send();
            }
        }
    }

    # Date Helper
    // Tanggal
    public static function tanggalToMysql($tanggal)
    {
        return date("Y-m-d", strtotime(str_replace('/', '-', $tanggal)));
    }

    // Msyql
    public static function mysqlToTanggal($tanggal)
    {
        return date('d-m-Y', strtotime($tanggal));
    }

    public static function mysqlToTanggalVer2($tanggal)
    {
        return date('d/m/Y', strtotime($tanggal));
    }

    // Timestamp
    public static function timestampToTanggal($timestamp)
    {
        return date('d M Y', strtotime($timestamp));
    }

    # Rupiah Helper
    public static function numberToRupiah($number)
    {
        if ($number == null) {
            $number = 0;
        }
        
        $result = number_format($number, 2, ",", ".");
        return 'Rp. '.$result;
    }

    # Location Helper
    public static function getProvinsi($kode)
    {
        return Wilayah::where('KODE_WILAYAH', $kode)->first()->NAMA;
    }

    public static function getKota($kode)
    {
        if (($result = Wilayah::where('KODE_WILAYAH', $kode)->first()) != null) {
            return $result->NAMA;
        } else {
            return 'Tidak Diisi';
        }
    }

    public static function getUser($id)
    {
        if (session('user')->getTable() == 'user_pegawais') {
            return UserPegawai::find($id);
        } else {
            return User::find($id);
        }
    }

    public static function getName($id)
    {
        if (session('user')->getTable() == 'user_pegawais') {
            return Helper::getUser($id)->nama_depan." ".Helper::getUser($id)->nama_belakang;
        } else {
            if (Helper::getUser($id)->info == null) {
                return Helper::getUser($id)->name;
            } else {
                return Helper::getUser($id)->info->firstname." ".Helper::getUser($id)->info->lastname;
            }  
        }
    }

    # Inventori Helper
    public static function getStokAwal($produk, $outlet = "", $tanggal)
    {
        // $tanggal = '2019-12-31';
        // Stok Masuk
        if ($outlet == "") {
            if (($result = $produk->stokmasuks->where('user_id', session('user')->id)->where('created_at', '<', $tanggal)->reduce(function($carry, $item){
                return $carry + $item->pivot->jumlah;
            })) != null) {
                $stokmasuk = $result;
            } else {
                $stokmasuk = 0;
            }
        } else {
            if (($result = $produk->stokmasuks->where('user_id', session('user')->id)->where('outlet_id', $outlet)->where('created_at', '<', $tanggal)->reduce(function($carry, $item){
                return $carry + $item->pivot->jumlah;
            })) != null) {
                $stokmasuk = $result;
            } else {
                $stokmasuk = 0;
            }
        }

        // Stok Keluar
        if ($outlet == "") {
            if (($result = $produk->stokkeluars->where('user_id', session('user')->id)->where('created_at', '<', $tanggal)->reduce(function($carry, $item){
                return $carry + $item->pivot->jumlah;
            })) != null) {
                $stokkeluar = $result;
            } else {
                $stokkeluar = 0;
            }
        } else {
            if (($result = $produk->stokkeluars->where('user_id', session('user')->id)->where('outlet_id', $outlet)->where('created_at', '<', $tanggal)->reduce(function($carry, $item){
                return $carry + $item->pivot->jumlah;
            })) != null) {
                $stokkeluar = $result;
            } else {
                $stokkeluar = 0;
            }
        }

        // Penjualan
        if ($outlet == "") {
            if (($result = $produk->sales->where('user_id', session('user')->id)->where('created_at', '<', $tanggal)->reduce(function($carry, $item){
                return $carry + $item->pivot->jumlah;
            })) != null) {
                $penjualan = $result;
            } else {
                $penjualan = 0;
            }
        } else {
            if (($result = $produk->sales->where('user_id', session('user')->id)->where('outlet_id', $outlet)->where('created_at', '<', $tanggal)->reduce(function($carry, $item){
                return $carry + $item->pivot->jumlah;
            })) != null) {
                $penjualan = $result;
            } else {
                $penjualan = 0;
            }
        }

        // Transfer
        if ($outlet == "") {
            $transfer = 0;
        } else {
            // Transfer Keluar
            if (($model = $produk->transfers->where('user_id', session('user')->id)->where('outlet_asal_id', $outlet)->where('created_at', '<', $tanggal)->reduce(function($carry, $item){
                return $carry + $item->pivot->jumlah;
            })) != null) {
                $transferKeluar = $model;
            } else {
                $transferKeluar = 0;
            }

            // Transfer Masuk
            if (($model = $produk->transfers->where('user_id', session('user')->id)->where('outlet_tujuan_id', $outlet)->where('created_at', '<', $tanggal)->reduce(function($carry, $item){
                return $carry + $item->pivot->jumlah;
            })) != null) {
                $transferMasuk = $model;
            } else {
                $transferMasuk = 0;
            }

            $transfer = $transferMasuk - $transferKeluar;
        }

        // Stok Opname
        if ($outlet == "") {
            if (($result = $produk->stokopnames->where('user_id', session('user')->id)->where('created_at', '<', $tanggal)->reduce(function($carry, $item){
                return $carry + $item->pivot->selisih;
            })) != null) {
                $stokopname = $result;
            } else {
                $stokopname = 0;
            }
        } else {
            if (($result = $produk->stokopnames->where('user_id', session('user')->id)->where('outlet_id', $outlet)->where('created_at', '<', $tanggal)->reduce(function($carry, $item){
                return $carry + $item->pivot->selisih;
            })) != null) {
                $stokopname = $result;
            } else {
                $stokopname = 0;
            }
        }

        return $stokmasuk - $stokkeluar - $penjualan - $transfer + $stokopname;
    }

    public static function getStokMasuk($produk, $outlet = "", $tanggal)
    {
        if ($outlet == "") {
            if (($result = $produk->stokmasuks->where('user_id', session('user')->id)->where('created_at', '>', $tanggal)->where('created_at', '<', date('Y-m-d', strtotime('+1 day', strtotime($tanggal))))->reduce(function($carry, $item){
                return $carry + $item->pivot->jumlah;
            })) != null) {
                return $result;
            } else {
                return 0;
            }
        } else {
            if (($result = $produk->stokmasuks->where('user_id', session('user')->id)->where('outlet_id', $outlet)->where('created_at', '>', $tanggal)->where('created_at', '<', date('Y-m-d', strtotime('+1 day', strtotime($tanggal))))->reduce(function($carry, $item){
                return $carry + $item->pivot->jumlah;
            })) != null) {
                return $result;
            } else {
                return 0;
            }
        }
    }

    public static function getStokKeluar($produk, $outlet = "", $tanggal)
    {
        if ($outlet == "") {
            if (($result = $produk->stokkeluars->where('user_id', session('user')->id)->where('created_at', '>', $tanggal)->where('created_at', '<', date('Y-m-d', strtotime('+1 day', strtotime($tanggal))))->reduce(function($carry, $item){
                return $carry + $item->pivot->jumlah;
            })) != null) {
                return $result;
            } else {
                return 0;
            }
        } else {
            if (($result = $produk->stokkeluars->where('user_id', session('user')->id)->where('outlet_id', $outlet)->where('created_at', '>', $tanggal)->where('created_at', '<', date('Y-m-d', strtotime('+1 day', strtotime($tanggal))))->reduce(function($carry, $item){
                return $carry + $item->pivot->jumlah;
            })) != null) {
                return $result;
            } else {
                return 0;
            }
        }
    }

    public static function getPenjualan($produk, $outlet = "", $tanggal)
    {
        if ($outlet == "") {
            if (($result = $produk->sales->where('user_id', session('user')->id)->where('created_at', '>', $tanggal)->where('created_at', '<', date('Y-m-d', strtotime('+1 day', strtotime($tanggal))))->reduce(function($carry, $item){
                return $carry + $item->pivot->jumlah;
            })) != null) {
                return $result;
            } else {
                return 0;
            }
        } else {
            if (($result = $produk->sales->where('user_id', session('user')->id)->where('outlet_id', $outlet)->where('created_at', '>', $tanggal)->where('created_at', '<', date('Y-m-d', strtotime('+1 day', strtotime($tanggal))))->reduce(function($carry, $item){
                return $carry + $item->pivot->jumlah;
            })) != null) {
                return $result;
            } else {
                return 0;
            }
        }
    }

    public static function getTransfer($produk, $outlet = "", $tanggal)
    {
        if ($outlet == "") {
            return 0;
        } else {
            // Transfer Keluar
            if (($model = $produk->transfers->where('user_id', session('user')->id)->where('outlet_asal_id', $outlet)->where('created_at', '>', $tanggal)->where('created_at', '<', date('Y-m-d', strtotime('+1 day', strtotime($tanggal))))->reduce(function($carry, $item){
                return $carry + $item->pivot->jumlah;
            })) != null) {
                $transferKeluar = $model;
            } else {
                $transferKeluar = 0;
            }

            // Transfer Masuk
            if (($model = $produk->transfers->where('user_id', session('user')->id)->where('outlet_tujuan_id', $outlet)->where('created_at', '>', $tanggal)->where('created_at', '<', date('Y-m-d', strtotime('+1 day', strtotime($tanggal))))->reduce(function($carry, $item){
                return $carry + $item->pivot->jumlah;
            })) != null) {
                $transferMasuk = $model;
            } else {
                $transferMasuk = 0;
            }

            return $transferMasuk - $transferKeluar;
        }
    }

    public static function getStokOpname($produk, $outlet = "", $tanggal)
    {
        if ($outlet == "") {
            if (($result = $produk->stokopnames->where('user_id', session('user')->id)->where('created_at', '>', $tanggal)->where('created_at', '<', date('Y-m-d', strtotime('+1 day', strtotime($tanggal))))->reduce(function($carry, $item){
                return $carry + $item->pivot->selisih;
            })) != null) {
                return $result;
            } else {
                return 0;
            }
        } else {
            if (($result = $produk->stokopnames->where('user_id', session('user')->id)->where('outlet_id', $outlet)->where('created_at', '>', $tanggal)->where('created_at', '<', date('Y-m-d', strtotime('+1 day', strtotime($tanggal))))->reduce(function($carry, $item){
                return $carry + $item->pivot->selisih;
            })) != null) {
                return $result;
            } else {
                return 0;
            }
        }
    }

    public static function getStokAkhir($produk, $outlet = "", $tanggal)
    {
        $stokmasuk = Helper::getStokMasuk($produk, $outlet, $tanggal);
        $stokkeluar = Helper::getStokKeluar($produk,$outlet, $tanggal);
        $penjualan = Helper::getPenjualan($produk, $outlet, $tanggal);
        $transfer = Helper::getTransfer($produk, $outlet, $tanggal);
        $stokopname = Helper::getStokOpname($produk, $outlet, $tanggal);
        $stokawal = Helper::getStokAwal($produk, $outlet, $tanggal);

        return $stokawal + $stokmasuk - $stokkeluar - $penjualan - $transfer + $stokopname;
    }

    # laporan Helper
    public static function getPenjualanAll($produk, $outlet = "", $tanggal)
    {
        if ($outlet == "") {
            if (($result = $produk->sales->where('user_id', session('user')->id)->where('created_at', '<', date('Y-m-d', strtotime('+1 day', strtotime($tanggal))))->reduce(function($carry, $item){
                return $carry + $item->pivot->jumlah;
            })) != null) {
                return $result;
            } else {
                return 0;
            }
        } else {
            if (($result = $produk->sales->where('user_id', session('user')->id)->where('outlet_id', $outlet)->where('created_at', '<', date('Y-m-d', strtotime('+1 day', strtotime($tanggal))))->reduce(function($carry, $item){
                return $carry + $item->pivot->jumlah;
            })) != null) {
                return $result;
            } else {
                return 0;
            }
        }
    }

    public static function getPenjualanHariIni()
    {
        $tanggal = date('Y-m-d');

        $penjualanHariIni = Sale::where('user_id', session('user')->id)
            ->where('created_at', '>', $tanggal)
            ->where('created_at', '<', date('Y-m-d', strtotime('+1 day', strtotime($tanggal))))
            ->get();

        $jumlahPenjualan = $penjualanHariIni->reduce(function ($carry, $item) {
                return $carry + $item->total;
            });
        
        if ($jumlahPenjualan == null) {
            return 0;
        } else return $jumlahPenjualan;
    }

    # Grafik Helper
    public static function getLaporanPenjualan()
    {
        $tanggal = date('Y-m-d');
        return Sale::select(\DB::Raw('DATE(created_at) day'), \DB::raw('COUNT(id) as jumlahTransaksi'), \DB::raw('SUM(total) as penjualan'))->where('user_id', session('user')->id)->where('created_at', '<', date('Y-m-d', strtotime('+1 day', strtotime($tanggal))))->groupBy('day')->get();
    }

    # User Helper
    public static function getAdmin($user)
    {
        if ($user->getTable() == 'user_pegawais') {
            return $user->username;
        } else {
            return $user->info->firstname;
        }
    }

    public static function getAdminID($user)
    {
        if ($user->getTable() == 'user_pegawais') {
            return $user->id;
        } else {
            return $user->id;
        }
    }
}   