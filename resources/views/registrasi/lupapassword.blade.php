@extends('layouts.daftar')

{{-- @section('title', $title) --}}

@section('content')
<div class="register-container full-height sm-p-t-30">
  <div class="d-flex justify-content-center flex-column full-height ">
    <h3>Lupa Password</h3>
    <p>
        Masukkan email yang terdaftar. Kami akan mengirimkan link untuk mengatur ulang kata sandi.
    </p>
    <form id="form-register" class="p-t-15" role="form" action="/lupapassword/kirimemail" method="POST">
    @csrf
      <div class="row">
        <div class="col-md-12">
          <div class="form-group form-group-default required">
            <label>Email</label>
            <input type="email" name="email" placeholder="" class="form-control" required>
          </div>
        </div>
      </div>
      <button class="btn btn-primary btn-block m-t-15" type="submit">Kirim</button>
    </form>
  </div>
</div>
@endsection