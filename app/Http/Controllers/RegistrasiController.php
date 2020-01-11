<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\UserInfo;
use Session;
use Redirect;
use Illuminate\Support\Facades\Mail;  
use App\Mail\Registrasi;
use App\Mail\lupaPassword;
Use Helper;

class RegistrasiController extends Controller
{
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

        //Check the $model completely saved
        if ($model->save())
        {
            $model_ext = new UserInfo();
            $model_ext->firstname = $request->fname;
            $model_ext->lastname = $request->lname;
            $model_ext->user_id = $model->id;

            //Check the $model_ext completely saved
            if ($model_ext->save()) {
                Mail::to($request->email)->send(new Registrasi($model));
                
                session([
                    'idTemp' => $model->id,
                    'emailTemp' => $request->email
                ]);
                return redirect('login')->with('status', 'registration sukses');
            }
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
     * Update the specified resouse App\Mail\SendMailable;urce in storage.
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
                session()->put('user', $model);
                if (session()->has('urlTemp')) {
                    return redirect(session('urlTemp'));
                } else {
                    if (Helper::getUser(session('user')->id)->info == null) {
                        return redirect('/admin/master');
                    } else {
                        return redirect('/dashboard');
                    }
                }
            } else {
                return redirect('/login')->with('status', false);
            }
        } else {
            return redirect('/login')->with('status', null);
        }
    }

    public function verifyEmail($vkey)
    {
        $email = decrypt($vkey);
        $model = User::where('email', '=', $email)->first();
        $model->email_verified_at = now();
        $model->save();
        
        return redirect('/login')->with('status', 'verifikasi sukses');
    }

    public function resend()
    {
        return view('registrasi.resend');
    }

    public function resendAction(Request $request)
    {

        $model = User::where('id', $request->id)->first();
        if ($model->email != $request->email) {
            $model->email = $request->email;
            $model->save();
        }
        Mail::to($model->email)->send(new Registrasi($model));
        
        return redirect('login')->with('status', 'email verifikasi terkirim');
    }

    public function checkMail()
    {
        $model = User::find(15);
        dd($model->info);
    }

    public function lupaPassword()
    {
        return view('registrasi.lupapassword');
    }

    public function lupaPasswordAction(Request $request)
    {
        $email = $request->email;

        $model = User::where('email', $email)->first();

        Mail::to($email)->send(new lupaPassword($model));

        if (Mail::failures()) {
            return 'Gagal';
        } else return view('registrasi.emailterkirim');
    }

    public function pemulihanKataSandi($encryptedId)
    {
        $decryptedId = decrypt($encryptedId);

        $user = User::find($decryptedId);

        return view('registrasi.pemulihankatasandi', [
            'user' => $user
        ]);
    }

    public function pemulihanKataSandiAction(Request $request)
    {
        $user = User::find($request->id);
        $user->password = Hash::make($request->password);
        if ($user->save()) {
            return view('registrasi.katasandiberhasildiubah');
        } else return 'Password gagal diubah';
    }
}
