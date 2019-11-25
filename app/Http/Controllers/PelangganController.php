<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;

class PelangganController extends Controller
{
    public function __cosntruct()
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
        $title = 'Pelanggan';

        $models = Customer::where('user_id', '=', session('user')->id)->get();

        return view('pelanggan.index', ['title' => $title, 'models' => $models]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pelanggan.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $model = new Customer();
        $model->nama = $request->nama;
        $model->telepon = $request->telepon;
        $model->email = $request->email;
        $model->user_id = session('user')->id;
        if ($model->save()) {
            return redirect('/pelanggan');
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
        $model = Customer::find($id);

        return view('pelanggan.lihat', ['model' => $model]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = Customer::find($id);

        return view('pelanggan.ubah', ['model' => $model]);
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
        $model = Customer::find($id);
        $model->nama = $request->nama;
        $model->telepon = $request->telepon;
        $model->email = $request->email;
        if ($model->save()) {
            return redirect('/pelanggan');
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
        $model = Customer::find($id);
        $model->delete();
        
        return redirect('/pelanggan');
    }
}
