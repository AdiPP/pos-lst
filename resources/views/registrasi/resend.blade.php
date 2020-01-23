@extends('layouts.daftar')

@section('content')
<div class="register-container full-height sm-p-t-30">
    <div class="d-flex justify-content-center flex-column full-height">
        <h3>Masukan Email Anda</h3>
        <p>Kami akan mengirimkan email verifikasi ke email anda.</p>
        @if (session('status'))
        <div class="alert alert-warning m-b-0" role="alert">
            <button class="close" data-dismiss="alert"></button>
            {!! session('status') !!}
        </div>
        @endif
        <form id="form-register" class="p-t-15" role="form" action="/email/resend/action" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <input type="email" name="email" placeholder="emailanda@mail.com" class="form-control input-lg" required>
                    </div>
                </div>
            </div>
            <button class="btn btn-primary btn-cons m-t-10" type="submit">Kirim Ulang</button>
            <div class="row m-t-10">
                <div class="col-lg-6">
                    <p><small>Email sudah terverifikasi? <a href="/login" class="text-info">Masuk</a></small></p>
                </div>
                <div class="col-lg-6 text-right">
                    <a href="mailto:pos.lawangsewu@gmail.com" class="text-info small">Bantuan? Hubungi Kami</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection