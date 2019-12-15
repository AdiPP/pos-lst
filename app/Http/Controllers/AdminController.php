<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Unit;
use App\Wilayah;
use App\User;


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
    */
    public function index()
    {
        // return view('admin.index');
        return redirect('/admin/master');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function login()
    {
        return view('admin.login');
    }

    public function loginProses(Request $request) 
    {
        if ($model = User::where('name', '=', $request->username)->first())
        {
            if (Hash::check($request->password, $model->password))
            {
                session()->put('user', $model);
                if (session()->has('urlTemp')) {
                    return redirect(session('urlTemp'));
                } else return redirect('/admin');
            } else {
                return redirect('/admin/login')->with('status', false);
            }
        } else {
            return redirect('/admin/login')->with('status', null);
        }
    }

    public function modals()
    {
        $unit = Unit::all();
        return view('admin.mastering.modals', ['units' => $unit]);
    }

    public function masterIndex()
    {
        $title = 'Master Data';

        $wilayah = Wilayah::where('LEVEL', '1')->select('KODE_WILAYAH', 'NAMA')->get();

        $unit = Unit::all();

        return view('admin.mastering.index', ['units' => $unit, 'wilayahs' => $wilayah, 'title' => $title]);
    }

    public function unitTambah(Request $request)
    {
        $model = new Unit();
        $model->singkatan = $request->singkatan;
        $model->nama = $request->nama;
        $model->deskripsi = $request->deskripsi;
        if ($model->save()) {
            return 'Satuan berhasil ditambah 🙂 ';
        } else return 'Satuan gagal ditambah 💩 ';
    }

    public function unitTampil()
    {
        $model = Unit::all();

        return view('admin.mastering.tampilUnit', ['models' => $model]);
    }

    public function unitHapus()
    {
        $id = $_GET['id'];

        $model = Unit::find($id);
        if ($model->delete()) {
            return 'Satuan berhasil dihapus';
        } else return 'Satuan gagal dihapus';
    }
}
