@extends('layouts.daftar')

{{-- @section('title', $title) --}}

@section('content')
<div class="register-container full-height sm-p-t-30">
  <div class="d-flex justify-content-center flex-column full-height ">
    <h3>Pemulihan Kata Sandi</h3>
    <p class="no-margin">
        Halo, <span class="bold">{{$user->info->firstname}} {{$user->info->lastname}}</span>.
    </p>
    <p>
        Silahkan isi formulir dibawah untuk memulihkan kata sandi anda.
    </p>
    <form id="form-register" class="p-t-15" role="form" action="/pemulihan/katasandi/action" method="POST">
    @csrf
    <input type="hidden" name="id" value="{{ $user->id }}">
      <div class="row">
        <div class="col-md-12">
          <div class="form-group form-group-default required">
            <label>Password Baru</label>
            <input type="password" name="password" placeholder="" class="form-control" required>
          </div>
        </div>
      </div>
      <button class="btn btn-primary btn-block m-t-15" type="submit">Kirim</button>
    </form>
  </div>
</div>
@endsection