<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Outlet;
use Config;

class OutletController extends Controller
{
    public function __construct()
    {
        \App\Helpers\AppHelper::userCheck();   
        Config::set('global.active_nav', 'bisnis');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Outlet';

        $outlets = Outlet::where('user_id', '=', session('user')->id)->get();

        return view('outlet.index', ['title' => $title, 'outlets' => $outlets]);
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
        $model = new Outlet();
        $model->outlet_name = $request->nama;
        $model->outlet_phone = $request->telepon;
        $model->outlet_city = $request->kota;
        $model->outlet_address = $request->alamat;
        $model->user_id = session('user')->id;
        if ($model->save())
        {
            return redirect('/outlet');
        } else
        {
            dd('Gagal Menyimpan');
        }
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
        $model = Outlet::find($id);
        $model->outlet_name = $request->nama;
        $model->outlet_phone = str_replace(["(",")"," ","-"],"",$request->telepon);
        $model->outlet_city = $request->kota;
        $model->outlet_address = $request->alamat;
        if($model->save())
        {
            return redirect('/outlet');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Outlet::find($id);
        if ($model->delete())
        {
            return redirect('/outlet');
        }
    }
}