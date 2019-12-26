@extends('layouts.casual')

@section('title', $title)

@section('content')
<!-- START JUMBOTRON -->
<div class="modal fade slide-up disable-scroll" id="modalAkun" tabindex="-1" role="dialog" aria-hidden="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content-wrapper">
            <div class="modal-content">
                <div class="modal-header clearfix text-left">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i>
                </button>
                <h5>Informasi <span class="semi-bold">Akun</span></h5>
                <p class="p-b-10">Berikut informasi mengenai Akun <strong>{{ $user->info->firstname }}</strong></p>
                </div>
                <div class="modal-body">
                    <form role="form" action="/pengaturan/perbaruiinfoakun" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $user->id }}">
                        <div class="form-group-attached">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group form-group-default">
                                        <label>Nama Depan</label>
                                        <input type="text" class="form-control" name="namaDepan" value="{{ $user->info->firstname }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group form-group-default">
                                        <label>Nama Belakang</label>
                                        <input type="text" class="form-control" name="namaBelakang" value="{{ $user->info->lastname }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group form-group-default">
                                        <label>Email</label>
                                        <input type="email" class="form-control" name="email" value="{{ $user->email }}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-group-default">
                                        <label>Tanggal Registrasi</label>
                                        <input type="text" class="form-control" name="tanggalRegistrasi" value="{{ Helper::timestampToTanggal($user->created_at) }}" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                            </div>
                            <div class="col-md-4 m-t-10 sm-m-t-10">
                                <button type="submit" class="btn btn-primary btn-block m-t-5">Perbarui</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div class="modal fade slide-up disable-scroll" id="modalPassword" tabindex="-1" role="dialog" aria-hidden="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content-wrapper">
            <div class="modal-content">
                <div class="modal-header clearfix text-left">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i>
                </button>
                <h5>Ubah <span class="semi-bold">Password</span></h5>
                <p class="p-b-10">Silahkan mengisi form berikut.</p>
                </div>
                <div class="modal-body">
                    <form role="form" action="/pengaturan/perbaruipassword" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $user->id }}">
                        <div class="form-group-attached">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group form-group-default">
                                        <label>Password Lama</label>
                                        <input type="password" class="form-control" name="passwordLama" value="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group form-group-default">
                                        <label>Password Baru</label>
                                        <input type="password" class="form-control" name="password" value="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group form-group-default">
                                        <label>Ulangi Password Baru</label>
                                        <input type="password" class="form-control" name="password_confirmation" value="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                            </div>
                            <div class="col-md-4 m-t-10 sm-m-t-10">
                                <button type="submit" class="btn btn-primary btn-block m-t-5">Perbarui</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div class="jumbotron">
    <div class=" container p-l-0 p-r-0 container-fixed-lg sm-p-l-0 sm-p-r-0">
        <div class="inner">
            <div class="container-md-height">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-top">
                    <!-- START card -->
                    <div class="card card-transparent">
                        <div style="display:flex; align-items:center;">
                            <div class="pull-left">
                                <h5>{{ $title }}</h5>
                            </div>
                            <div class="ml-auto">
                                
                            </div>
                            <div class="clearfix"></div>
                        </div>  
                    </div>
                    <!-- END card -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END JUMBOTRON -->
<div class="container sm-padding-10 p-l-0 p-r-0">
    @if (session('status'))
        <div class="alert alert-danger" role="alert">
            <button class="close" data-dismiss="alert"></button>
            {{ session('status') }}
        </div>
    @endif
    @if (session('success'))
        <div class="alert alert-success" role="alert">
            <button class="close" data-dismiss="alert"></button>
            {{ session('success') }}
        </div>
    @endif
    <div class="row">
        <div class="col-lg-6 m-b-10 d-flex flex-column">
        <!-- START card -->
            <div class="card card-default">
                <div class="card-header">
                    <div class="card-title">
                        Informasi Akun
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="card-block">
                    <div class="padding-10">
                        {{-- <form id="form-work" class="form-horizontal" role="form" autocomplete="off"> --}}
                            <div id="form-work" class="form-horizontal">
                                <div class="form-group row">
                                    <label for="fname" class="col-md-5 control-label">Nama Depan</label>
                                    <div class="col-md-7">
                                        {{ $user->info->firstname }}
                                        {{-- <input type="text" class="form-control" id="fname" placeholder="Full name" name="name" required> --}}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="fname" class="col-md-5 control-label">Nama Belakang</label>
                                    <div class="col-md-7">
                                        {{ $user->info->lastname }}
                                        {{-- <input type="text" class="form-control" id="fname" placeholder="Full name" name="name" required> --}}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="fname" class="col-md-5 control-label">Email</label>
                                    <div class="col-md-7">
                                        {{ $user->email }}
                                        {{-- <input type="text" class="form-control" id="fname" placeholder="Full name" name="name" required> --}}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="fname" class="col-md-5 control-label">Tanggal Registrasi</label>
                                    <div class="col-md-7">
                                        {{ Helper::timestampToTanggal($user->created_at) }}
                                        {{-- <input type="text" class="form-control" id="fname" placeholder="Full name" name="name" required> --}}
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <button class="btn btn-primary pull-right btn-cons" data-target="#modalAkun" data-toggle="modal">Ubah Informasi Akun</button>
                                        <button class="btn btn-primary pull-right btn-cons" data-target="#modalPassword" data-toggle="modal">Ubah Password</button>
                                    </div>
                                </div>
                            </div>
                        {{-- </form> --}}
                    </div>
                </div>
            </div>
        <!-- END card -->
        </div>
        <div class="col-lg-6 m-b-10 d-flex flex-column">
        <!-- START card -->
            <div class="card card-default">
                <div class="card-header">
                    <div class="card-title">
                        Informasi Bisnis
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="card-block">
                    <div class="padding-10">
                        <div class="form-horizontal">
                            <div class="form-group row">
                                <label for="fname" class="col-md-5 control-label">Nama Bisnis</label>
                                <div class="col-md-7">
                                    @php
                                        if (is_null($user->bisnis)) {
                                            echo '<cite>Belum Diisi.</cite>';
                                        } else {
                                            echo $user->bisnis->namaBisnis;
                                        }
                                    @endphp
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="fname" class="col-md-5 control-label">Provinsi</label>
                                <div class="col-md-7">
                                    @php
                                        if (is_null($user->bisnis)) {
                                            echo '<cite>Belum Diisi.</cite>';
                                        } else {
                                            echo Helper::getProvinsi($user->bisnis->provinsi);
                                        }
                                    @endphp
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="fname" class="col-md-5 control-label">Kota / Kabupaten</label>
                                <div class="col-md-7">
                                    @php
                                        if (is_null($user->bisnis)) {
                                            echo '<cite>Belum Diisi.</cite>';
                                        } else {
                                            echo Helper::getProvinsi($user->bisnis->kota);
                                        }
                                    @endphp
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="fname" class="col-md-5 control-label">Alamat</label>
                                <div class="col-md-7">
                                    @php
                                        if (is_null($user->bisnis)) {
                                            echo '<cite>Belum Diisi.</cite>';
                                        } else {
                                            echo $user->bisnis->alamat;
                                        }
                                    @endphp
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="fname" class="col-md-5 control-label">Nomor Telepon</label>
                                <div class="col-md-7">
                                    @php
                                        if (is_null($user->bisnis)) {
                                            echo '<cite>Belum Diisi.</cite>';
                                        } else {
                                            echo $user->bisnis->telepon;
                                        }
                                    @endphp
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-12">
                                    <a class="btn btn-primary pull-right btn-cons" href="/pengaturan/perbaruiinfobisnis">Ubah Informasi Bisnis</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <!-- END card -->
        </div>
    </div>
</div>
@endsection

@section('myjsfile')
<!-- BEGIN PAGE LEVEL JS -->
<script src="{{ asset('assets/js/form_layouts.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/datatables.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/demo.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/scripts.js') }}" type="text/javascript"></script>
<!-- END PAGE LEVEL JS -->
@endsection