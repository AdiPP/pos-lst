<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\UserInfo;
use App\UserPegawai;
use Illuminate\Support\Facades\Hash;

class PegawaiController extends Controller
{
    public function __construct()
    {  
        \Config::set('global.active_nav', 'bisnis');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pegawai = UserPegawai::where('user_master', session('user')->id)->get();
        $outlet = User::find(session('user')->id)->outlets;

        return view('pegawai.index', [
            'title' => 'Pegawai',
            'pegawais' => $pegawai,
            'outlets' => $outlet,
        ]);
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

        $pegawai = new UserPegawai();
        $pegawai->nama_depan = $request->namaDepan;
        $pegawai->nama_belakang = $request->namaBelakang;
        $pegawai->username = $request->username;
        $pegawai->password = Hash::make($request->password);
        $pegawai->outlet_id = $request->outlet;
        $pegawai->user_master = session('user')->id;
        $pegawai->save();

        return redirect('/pegawai');
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
        $pegawai = UserPegawai::find($id);
        $pegawai->nama_depan = $request->namaDepan;
        $pegawai->nama_belakang = $request->namaBelakang;
        $pegawai->username = $request->username;
        if (!Hash::check($request->password, $pegawai->password)) {
            $pegawai->password = Hash::make($request->password);
        }
        $pegawai->outlet_id = $request->outlet;
        $pegawai->save();

        return redirect('/pegawai');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pegawai = UserPegawai::find($id);
        $pegawai->delete();

        return redirect('/pegawai');
    }

    # Login
    public function login()
    {
        return view('pegawai.center.login');
    }

    public function loginProses(Request $request)
    {
        $pegawai = UserPegawai::where('username', $request->username)->first();

        if (($pegawai = UserPegawai::where('username', $request->username)->first())) {
            if (Hash::check($request->password, $pegawai->password)) {
                session()->put('user', $pegawai);

                return redirect('/pos');
            } else {
                return back()->withErrors(['Username atau Password tidak sesuai.']);
            }
        } else {
            return back()->withErrors(['Username atau Password tidak sesuai.']);
        }
    }
}
