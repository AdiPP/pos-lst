@extends('layouts.daftar')

{{-- @section('title', $title) --}}

@section('content')
<div class="register-container full-height sm-p-t-30">
    <div class="d-flex justify-content-center flex-column full-height ">
        @if (session('error'))
            <div class="alert alert-warning" role="alert">
                <button class="close" data-dismiss="alert"></button>
                <strong>Perhatian: </strong>{{ session('error') }}
            </div>
        @endif
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
                    <div class="form-group form-group-default input-group">
                        <div class="form-input-group">
                            <label>Password Baru</label>    
                            <input type="password" id="password-field" name="password" placeholder="" class="form-control" required>
                        </div>
                        <a onclick="showPassword()" class="input-group-addon btn">
                            <i class="fa fa-eye"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group form-group-default input-group">
                        <div class="form-input-group">
                            <label>Ulangi Password</label>
                            <input type="password" id="retype" name="retype" placeholder="" class="form-control" required>
                        </div>
                        <a onclick="showRetype()" class="input-group-addon btn">
                            <i class="fa fa-eye"></i>
                        </a>
                    </div>
                </div>
            </div>
            <button class="btn btn-primary btn-block m-t-15" type="submit">Kirim</button>
        </form>
    </div>
</div>
<script>
    function showPassword()
    {
        var input = document.getElementById('password-field');
        if (input.type == 'password') {
            input.type = 'text';
        } else {
            input.type = 'password';
        }
    }

    function showRetype()
    {
        var input = document.getElementById('retype');
        if (input.type == 'password') {
            input.type = 'text';
        } else {
            input.type = 'password';
        }
    }
</script>
@endsection