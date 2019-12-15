@extends('layouts.daftar')

{{-- @section('title', $title) --}}

@section('content')
<div class="register-container full-height sm-p-t-30">
  <div class="d-flex justify-content-center flex-column full-height ">
    <h4 class="bold no-margin">Sade POS</h4>
    {{-- <img src="assets/img/logo.png" alt="logo" data-src="assets/img/logo.png" data-src-retina="assets/img/logo_2x.png" width="78" height="22"> --}}
    <h3>Tumbuhkan Bisnis Anda</h3>
    <p>
        Nikmati kebebasan mengelola bisnis dari mana saja dengan aplikasi kasir online Sade.
        {{-- Sign in with <a href="#" class="text-info">Facebook</a> or <a href="#" class="text-info">Google</a> --}}
    </p>
    <form id="form-register" class="p-t-15" role="form" action="/registrasi" method="POST">
    @csrf
      <div class="row">
        <div class="col-md-6">
          <div class="form-group form-group-default required">
            <label>Nama Depan</label>
            <input type="text" name="fname" placeholder="" class="form-control" required>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group form-group-default required">
            <label>Nama Belakang</label>
            <input type="text" name="lname" placeholder="" class="form-control" required>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="form-group form-group-default required">
            <label>Username</label>
            <input type="text" name="uname" placeholder="" class="form-control" required>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="form-group form-group-default required">
            <label>Password</label>
            <input type="password" name="pass" placeholder="" class="form-control" required>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="form-group form-group-default required">
            <label>Email</label>
            <input type="email" name="email" placeholder="" class="form-control" required>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12 col-md-12 d-flex justify-content-start">
          <div class="checkbox no-margin d-flex align-items-center">
            <input type="checkbox" value="1" id="checkbox1">
            <label for="checkbox1" class="text-info">Saya menyetujui <a href="#" class="text-info">Syarat dan Ketentuan</a>, serta <a href="#" class="text-info">Kebijakan Privasi</a> Sade.</label>
          </div>
        </div>
      </div>
      <button class="btn btn-primary btn-block m-t-10" type="submit">Daftar</button>
      <div class="row m-t-10">
        <div class="col-lg-12 text-center">
          <p class="no-margin">Sudah Punya Akun? <span><a href="/login">Login!</a></span></p>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection