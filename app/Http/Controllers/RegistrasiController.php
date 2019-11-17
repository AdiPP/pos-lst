<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\UserInfo;
use Session;
use Redirect;

class RegistrasiController extends Controller
{
    public function __construct()
    {
        // dd(session('user'));
        if (session('user') === null)
        {
            // dd();
            return Redirect::to('/login')->send();

        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('registrasi.daftar');
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
        $model = new User();
        $model->name = $request->uname;
        $model->password = Hash::make($request->pass);
        $model->email = $request->email;
        $model->save();

        $model_ext = new UserInfo();
        $model_ext->firstname = $request->fname;
        $model_ext->lastname = $request->lname;
        $model_ext->user_id = $model->id;
        $model_ext->save();

        return redirect('login');
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

    public function login(Request $request) 
    {
        if ($model = User::where('name', '=', $request->username)->first())
        {
            if (Hash::check($request->password, $model->password))
            {
                session(['user' => '$model']);
                // dd('User ditemukan');

                return redirect('/dashboard');
            } else {
                dd('Password salah');
            }
        } else {
            dd('User tidak ditemukan');
        }
        // dd($model); 
    }
}
