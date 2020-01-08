@extends('layouts.login')

{{-- @section('title', $title) --}}

@section('content')
<div class="login-container bg-white">
  <div class="p-l-50 m-l-20 p-r-50 m-r-20 p-t-50 m-t-30 sm-p-l-15 sm-p-r-15 sm-p-t-40">
    <h4 class="bold">Sade POS</h4>
    {{-- <img src="assets/img/logo.png" alt="logo" data-src="assets/img/logo.png" data-src-retina="assets/img/logo_2x.png" width="78" height="22"> --}}
    <div class="p-t-35">
      <h6 class="bold">Selamat Datang Kembali</h6>
      <p>Silahkan Login dengan akun Anda</p>
    </div>
    @if (session()->exists('status'))
      @if (session('status') === 'email verifikasi terkirim')
          <div class="alert alert-success m-b-0" role="alert">
            <button class="close" data-dismiss="alert"></button>
            Email verifikasi berhasil dikirim! Silahkan periksa email anda.
          </div>
      @elseif (session('status') === 'email not verified')
        <div class="alert alert-danger m-b-0" role="alert">
          <button class="close" data-dismiss="alert"></button>
          Email belum terverifikasi! <a href="/email/resend">Kirim ulang email verifikasi?</a>
        </div>
      @elseif (session('status') === 'verifikasi sukses')
        <div class="alert alert-success m-b-0" role="alert">
          <button class="close" data-dismiss="alert"></button>
          Verifikasi berhassil. Silahkan masuk ke akun anda.
        </div>
      @elseif (session('status') === 'registration sukses')
        <div class="alert alert-success m-b-0" role="alert">
          <button class="close" data-dismiss="alert"></button>
          Pendaftaran berhasil! Silahkan verifikasi email anda untuk masuk atau <a href="/email/resend">kirim ulang email verifikasi?</a>
        </div>
      @elseif (session('status') === false)
        <div class="alert alert-warning m-b-0" role="alert">
          <button class="close" data-dismiss="alert"></button>
          Kombinasi username dan password tidak sesuai.
        </div>
      @else
        <div class="alert alert-warning m-b-0" role="alert">
          <button class="close" data-dismiss="alert"></button>
          User tidak ditemukan.
        </div>
      @endif
    @endif
    <!-- START Login Form -->
    <form id="form-login" class="p-t-15" role="form" action="/login/action" method="POST">
      @csrf
      <!-- START Form Control-->
      <div class="form-group form-group-default required">
        <label>Username</label>
        <div class="controls">
          <input type="text" name="username" class="form-control" required>
        </div>
      </div>
      <!-- END Form Control-->
      <!-- START Form Control-->
      <div class="form-group form-group-default required">
        <label>Password</label>
        <div class="controls">
          <input type="password" class="form-control" name="password" required>
        </div>
      </div>
      <!-- START Form Control-->
      <div class="row m-t-10">
        <div class="col-md-7 no-padding sm-p-l-10">
          <div class="checkbox no-margin d-flex align-items-center">
            <input type="checkbox" value="1" id="checkbox1">
            <label for="checkbox1" class="text-info">Biarkan Saya Tetap Masuk</label>
          </div>
        </div>
        <div class="col-md-5 d-flex align-items-center justify-content-end">
          <p class="no-margin"><a href="/lupapassword" class="text-info">Lupa Password</a></p>
        </div>
      </div>
      <!-- END Form Control-->
      <div class="row m-t-10">
        <div class="col-lg-12">
          <button class="btn btn-primary btn-block" type="submit">Masuk</button>
        </div>
      </div>
      <div class="row m-t-10">
        <div class="col-lg-12 text-center">
          <p class="no-margin">Belum Punya Akun? <span><a href="/registrasi">Daftar Sekarang!</a></span></p>
        </div>
      </div>
    </form>
    <!--END Login Form-->
    {{-- <div class="pull-bottom sm-pull-bottom">
      <div class="m-b-30 p-r-80 sm-m-t-20 sm-p-r-15 sm-p-b-20 clearfix">
        <div class="col-sm-3 col-md-2 no-padding">
          <img alt="" class="m-t-5" data-src="assets/img/demo/pages_icon.png" data-src-retina="assets/img/demo/pages_icon_2x.png" height="60" src="assets/img/demo/pages_icon.png" width="60">
        </div>
        <div class="col-sm-9 no-padding m-t-10">
          <p>
              <small>
                  Create a pages account. If you have a facebook account, log into it for this
                  process. Sign in with <a href="#" class="text-info">Facebook</a> or <a href="#" class="text-info">Google</a>
              </small>
          </p>
        </div>
      </div>
    </div> --}}
  </div>
</div>
@endsection