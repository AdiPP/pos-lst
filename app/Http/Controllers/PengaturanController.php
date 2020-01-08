<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Wilayah;
use App\Business;
use Illuminate\Support\Facades\Hash;

class PengaturanController extends Controller
{
    private $user;

    public function __construct()
    {
        \App\Helpers\AppHelper::userCheck();   
        \Config::set('global.active_nav', 'pengaturan');

        $this->user = User::find(session('user')->id);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::find(session('user')->id);

        return view('pengaturan.index', [
            'title' => 'Akun',
            'user' => $user
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

    public function perbaruiInfoAkun(Request $request)
    {
        $user = User::find($request->id);
        $user->info->firstname = $request->namaDepan;
        $user->info->lastname = $request->namaBelakang;
        $user->info->save();

        return redirect('/pengaturan');
    }

    public function perbaruiInfoBisnis()
    {
        $user = User::find(session('user')->id);

        $provinsi = Wilayah::where('LEVEL', 1)->get();

        return view('pengaturan.perbaruiinfobisnis', ['user' => $user, 'provinsis' => $provinsi]);
    }

    public function pilihProvinsi()
    {

        $id = $_GET['id'];

        $kota = Wilayah::where('MST_KODE_WILAYAH', $id)->get();

        $user = User::find(session('user')->id);

        return view('pengaturan.daftarkota', ['kotas' => $kota, 'user' => $user]);
    }

    public function perbaruiInfoBisnisAksi(Request $request)
    {
        if (is_null(User::find(session('user')->id)->bisnis)) {
            $bisnis = new Business();
            $bisnis->namaBisnis = $request->namaBisnis;
            $bisnis->provinsi = $request->provinsi;
            $bisnis->kota =  $request->kota;
            $bisnis->alamat = $request->alamat;
            $bisnis->telepon = $request->telepon;
            $bisnis->user_id = session('user')->id;
            $bisnis->save();

            return redirect('/pengaturan');
        } else {
            $userBisnis = User::find(session('user')->id)->bisnis;
            $userBisnis->namaBisnis = $request->namaBisnis;
            $userBisnis->provinsi = $request->provinsi;
            $userBisnis->kota =  $request->kota;
            $userBisnis->alamat = $request->alamat;
            $userBisnis->telepon = $request->telepon;;
            $userBisnis->save();

            return redirect('/pengaturan');
        }
    }

    public function perbaruiPassword(Request $request)
    {
        if (Hash::check($request->passwordLama, User::find($request->id)->password)) {
            if ($request->password_confirmation != $request->password) {
                return redirect('/pengaturan')->with('status', 'Password baru tidak sama.');
            } else {
                $user = User::find($request->id);
                $user->password = Hash::make($request->password);
                $user->save();

                return redirect('/pengaturan')->with('success', 'Password berhasil diubah.');
            }
        } else return redirect('/pengaturan')->with('status', 'Password lama tidak sesuai.');
    }

    public function pengaturanHarga()
    {
        return view('pengaturan.harga', [
            'title' => 'Harga',
            'user' => $this->user,
        ]);
    }

    public function perbaruiHarga(Request $request)
    {
        $user = $this->user;
        $user->info->harga_pelanggan = $request->hargaPelanggan;
        $user->info->save();

        return redirect('/pengaturan/harga');
    }
}
