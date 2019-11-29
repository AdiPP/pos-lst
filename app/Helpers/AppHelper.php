<?php
namespace App\Helpers;

use Redirect;

class AppHelper
{
    public static function userCheck() 
    {
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
}