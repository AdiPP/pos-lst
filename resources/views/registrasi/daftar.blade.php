@extends('layouts.daftar')

{{-- @section('title', $title) --}}

@section('content')
<div class="modal fade slide-up disable-scroll" id="modalSyarat" tabindex="-1" role="dialog" aria-hidden="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content-wrapper">
            <div class="modal-content">
            <div class="modal-header clearfix text-left">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i>
                </button>
                <h5><strong>Syarat dan Ketentuan</strong></h5>
            </div>
            <div class="modal-body">
                <h6>Introduction</h6>
                <p>
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                </p>
                <h6>Intellectual Property Rights</h6>
                <p>
                    It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary btn-cons no-margin pull-left inline" data-dismiss="modal">Tutup</button>
            </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div class="modal fade slide-up disable-scroll" id="modalKebijakan" tabindex="-1" role="dialog" aria-hidden="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content-wrapper">
            <div class="modal-content">
            <div class="modal-header clearfix text-left">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i>
                </button>
                <h5><strong>Kebijakan Privasi</strong></h5>
            </div>
            <div class="modal-body">
                <h6>Introduction</h6>
                <p>
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                </p>
                <h6>Intellectual Property Rights</h6>
                <p>
                    It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary btn-cons no-margin pull-left inline" data-dismiss="modal">Tutup</button>
            </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div class="register-container full-height sm-p-t-30">
    <div class="d-flex justify-content-center flex-column full-height ">
        <h4 class="bold no-margin">Sade POS</h4>
        <h3>Tumbuhkan Bisnis Anda</h3>
        <p>
            Nikmati kebebasan mengelola bisnis dari mana saja dengan aplikasi kasir online Sade.
        </p>
        @if (session('status'))
            <div class="alert alert-warning m-b-0" role="alert">
                <button class="close" data-dismiss="alert"></button>
                {!! session('status') !!}
            </div>
        @endif
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
                        <input type="checkbox" value="1" id="checkbox1" onclick="checkBox()">
                        <label for="checkbox1" class="text-info">Saya menyetujui <a data-toggle="modal" data-target="#modalSyarat" class="text-info">Syarat
                                dan Ketentuan</a>, serta <a data-toggle="modal" data-target="#modalKebijakan" class="text-info">Kebijakan Privasi</a>
                            Sade.</label>
                    </div>
                </div>
            </div>
            <button class="btn btn-primary btn-block m-t-10" type="submit" id="daftarButton" disabled>Daftar</button>
            <div class="row m-t-10">
                <div class="col-lg-12 text-center">
                    <p class="no-margin">Sudah Punya Akun? <span><a href="/login">Login!</a></span></p>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    function checkBox() {
        var curr = !(document.getElementById('daftarButton').disabled);
        document.getElementById('daftarButton').disabled = curr;
    }
</script>
@endsection