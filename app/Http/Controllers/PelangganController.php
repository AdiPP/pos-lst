<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Wilayah;
use Helper;

class PelangganController extends Controller
{
    public function __construct()
    {
        \App\Helpers\AppHelper::userCheck();   
        \Config::set('global.active_nav', 'bisnis');
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

        return view('pelanggan.index', [
            'title' => $title,
            'models' => $models->sortByDesc('id')
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $wilayah = Wilayah::where('LEVEL', '2')->select('KODE_WILAYAH', 'MST_KODE_WILAYAH', 'NAMA')->get();

        return view('pelanggan.tambah', [
            'kotas' => $wilayah,
            'title' => 'Tambah Pelanggan'
        ]);
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
        $model->jenis_kelamin = $request->jenisKelamin;
        if ($request->tanggalLahir != null) {
            $model->tanggal_lahir = Helper::tanggalToMysql($request->tanggalLahir);
        }
        $model->alamat = $request->alamat;
        $model->kota = $request->kota;
        $model->kode_pos = $request->kodePos;
        $model->catatan = $request->catatan;
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

        return view('pelanggan.lihat', [
            'model' => $model,
            'title' => 'Lihat Pelanggan'
        ]);
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
        $wilayah = Wilayah::where('LEVEL', '2')->select('KODE_WILAYAH', 'MST_KODE_WILAYAH', 'NAMA')->get();

        return view('pelanggan.ubah', [
            'model' => $model,
            'kotas' => $wilayah,
            'title' => 'Perbarui Pelanggan'
        ]);
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
        $model->jenis_kelamin = $request->jenisKelamin;
        $model->tanggal_lahir = Helper::tanggalToMysql($request->tanggalLahir);
        $model->alamat = $request->alamat;
        $model->kota = $request->kota;
        $model->kode_pos = $request->kodePos;
        $model->catatan = $request->catatan;
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
