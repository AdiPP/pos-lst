<?php
namespace App\Helpers;

use Redirect;
use Helper;
use App\Wilayah;
use App\User;

class AppHelper
{
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
        if(session('user')->email_verified_at === null)
        {
            return Redirect::to('/login')->with('status', 'email not verified')->send();
        }
    }

    public static function tanggalToMysql($tanggal)
    {
        return date("Y-m-d", strtotime(str_replace('/', '-', $tanggal)));
    }

    public static function mysqlToTanggal($tanggal)
    {
        return date('d-m-Y', strtotime($tanggal));
    }

    public static function mysqlToTanggalVer2($tanggal)
    {
        return date('d/m/Y', strtotime($tanggal));
    }

    public static function timestampToTanggal($timestamp)
    {
        return date('d M Y', strtotime($timestamp));
    }

    public static function stokMasuk($produk, $outlet = 0)
    {
        if ($outlet == 0) {
            $stokmasuk = $produk
                        ->stokmasuks
                        ->reduce(function($carry, $item){
                        return $carry + $item->infos[0]->jumlah;
                        });
        } else {
            $stokmasuk = $produk
                        ->stokmasuks
                        ->where('outlet_id', $outlet)
                        ->reduce(function($carry, $item){
                        return $carry + $item->infos[0]->jumlah;
                        });
        }

        if (is_null($stokmasuk)) {
            $stokmasuk = 0;
        }

        return $stokmasuk;
    }

    public static function stokKeluar($produk, $outlet = 0)
    {
        if ($outlet == 0) {
            $stokkeluar = $produk
                        ->stokkeluars
                        ->reduce(function($carry, $item){
                            return $carry + $item->infos[0]->jumlah;
                        });   
        } else {
            $stokkeluar = $produk
                        ->stokkeluars
                        ->where('outlet_id', $outlet)
                        ->reduce(function($carry, $item){
                            return $carry + $item->infos[0]->jumlah;
                        });
        }

        if (is_null($stokkeluar)) {
            $stokkeluar = 0;
        }

        return $stokkeluar;
    }

    public static function penjualan($produk, $outlet = 0)
    {
        $total = 0;

        if ($outlet == 0) {
            foreach ($produk->sales as $sale) {
                foreach ($sale->infos as $info) {
                    if ($info->product_id == $produk->id) {
                        $total = $total + $info->jumlah;
                    }
                }
            }
        } else {
            foreach ($produk->sales as $sale) {
                if ($sale->outlet_id == $outlet) {
                    foreach ($sale->infos as $info) {
                        if ($info->product_id == $produk->id) {
                            $total = $total + $info->jumlah;
                        }
                    }
                }
            }
        }

        $penjualan = $total;

        if (is_null($penjualan)) {
            $penjualan = 0;
        }

        return $penjualan;
    }

    public static function stokAkhir($produk, $outlet = 0)
    {
        if ($outlet == 0) {
            $stokmasuk = Helper::stokMasuk($produk);

            $stokkeluar = Helper::stokKeluar($produk);

            $penjualan = Helper::penjualan($produk);
        } else {
            $stokmasuk = Helper::stokMasuk($produk, $outlet);

            $stokkeluar = Helper::stokKeluar($produk, $outlet);

            $penjualan = Helper::penjualan($produk, $outlet);
        }

        $stokakhir = $stokmasuk - $stokkeluar - $penjualan;

        return $stokakhir;
    }

    public static function getProvinsi($kode)
    {
        return Wilayah::where('KODE_WILAYAH', $kode)->first()->NAMA;
    }

    public static function getKota($kode)
    {
        return Wilayah::where('KODE_WILAYAH', $kode)->first()->NAMA;
    }

    public static function getUser($id)
    {
        return User::find($id);
    }

    # Inventori Helper
    public static function getStokMasuk($produk, $outlet = "")
    {
        if ($outlet == "") {
            if (($result = $produk->stokmasuks->reduce(function($carry, $item){
                return $carry + $item->pivot->jumlah;
            })) != null) {
                return $result;
            } else {
                return 0;
            }
        } else {
            if (($result = $produk->stokmasuks->where('outlet_id', $outlet)->reduce(function($carry, $item){
                return $carry + $item->pivot->jumlah;
            })) != null) {
                return $result;
            } else {
                return 0;
            }
        }
    }

    public static function getStokKeluar($produk, $outlet = "")
    {
        if ($outlet == "") {
            if (($result = $produk->stokkeluars->reduce(function($carry, $item){
                return $carry + $item->pivot->jumlah;
            })) != null) {
                return $result;
            } else {
                return 0;
            }
        } else {
            if (($result = $produk->stokkeluars->where('outlet_id', $outlet)->reduce(function($carry, $item){
                return $carry + $item->pivot->jumlah;
            })) != null) {
                return $result;
            } else {
                return 0;
            }
        }
    }

    public static function getPenjualan($produk, $outlet = "")
    {
        if ($outlet == "") {
            if (($result = $produk->sales->reduce(function($carry, $item){
                return $carry + $item->pivot->jumlah;
            })) != null) {
                return $result;
            } else {
                return 0;
            }
        } else {
            if (($result = $produk->sales->where('outlet_id', $outlet)->reduce(function($carry, $item){
                return $carry + $item->pivot->jumlah;
            })) != null) {
                return $result;
            } else {
                return 0;
            }
        }
    }

    public static function getTransfer($produk, $outlet = "")
    {
        if ($outlet == "") {
            return 0;
        } else {
            // Transfer Keluar
            if (($model = $produk->transfers->where('outlet_asal_id', $outlet)->reduce(function($carry, $item){
                return $carry + $item->pivot->jumlah;
            })) != null) {
                $transferKeluar = $model;
            } else {
                $transferKeluar = 0;
            }

            // Transfer Masuk
            if (($model = $produk->transfers->where('outlet_tujuan_id', $outlet)->reduce(function($carry, $item){
                return $carry + $item->pivot->jumlah;
            })) != null) {
                $transferMasuk = $model;
            } else {
                $transferMasuk = 0;
            }

            return $transferMasuk - $transferKeluar;
        }
    }

    public static function getStokAkhir($produk, $outlet = "")
    {
        if ($outlet == "") {
            $stokmasuk = Helper::getStokMasuk($produk);
            $stokkeluar = Helper::getStokKeluar($produk);
            $penjualan = Helper::getPenjualan($produk);
            $transfer = Helper::getTransfer($produk);
        } else {
            $stokmasuk = Helper::getStokMasuk($produk, $outlet);
            $stokkeluar = Helper::getStokKeluar($produk,$outlet);
            $penjualan = Helper::getPenjualan($produk, $outlet);
            $transfer = Helper::getTransfer($produk, $outlet);
        }

        return $stokmasuk - $stokkeluar - $penjualan - $transfer;
    }
}   