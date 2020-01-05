<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Supplier;

class SupplierController extends Controller
{
    public function __construct()
    {
        \App\Helpers\AppHelper::userCheck();   
        \Config::set('global.active_nav', 'inventori');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $supplier = Supplier::where('user_id', session('user')->id)->get();

        return view('inventori.supplier.index', ['title' => 'Supplier', 'suppliers' => $supplier]);
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
        $model = new Supplier();
        $model->nama = $request->nama;
        $model->alamat = $request->alamat;
        $model->telepon = $request->telepon;
        $model->email = $request->email;
        $model->user_id = session('user')->id;
        if ($model->save()) {
            return redirect('/supplier');
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
        // dd($request, $id);

        $model = Supplier::find($id);
        $model->nama = $request->nama;
        $model->telepon = $request->telepon;
        $model->email = $request->email;
        $model->alamat = $request->alamat;
        if ($model->save()) {
            return redirect('/supplier');
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
        $model = Supplier::find($id);
        if ($model->delete())
        {
            return redirect('/supplier');
        }
    }
}
