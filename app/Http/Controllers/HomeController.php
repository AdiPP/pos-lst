<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Config;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailable;  
use App\Mail\Registrasi; 

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
        return view('home');
    }

    public function mail()
    {
        $name = 'Krunal';
        Mail::to('adiputrapermana@gmail.com')->send(new SendMailable($name));
        
        return 'Email was sent';
    }
}
