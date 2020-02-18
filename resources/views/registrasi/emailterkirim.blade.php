@extends('layouts.daftar')

{{-- @section('title', $title) --}}

@section('content')
<div class="register-container full-height sm-p-t-30">
  <div class="d-flex justify-content-center flex-column full-height ">
    <h3>Email Terkirim</h3>
    <p>
        Silahkan periksa email yang bersangkutan.
    </p>
    <div class="row">
      <div class="col-lg-10">
        <a href="/login" class="btn btn-primary">Kembali</a>
      </div>
    </div>
  </div>
</div>
@endsection