@extends('layouts.casual')

{{-- @section('title', $title) --}}

@section('content')
{{-- <form action="/pelanggan/{{ $model->id }}" method="POST"> --}}
    @csrf
    <input name="_method" type="hidden" value="PUT">
    <!-- START JUMBOTRON -->
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
                                    {{-- <h5>{{ $title }}</h5> --}}
                                </div>
                                <div class="ml-auto">
                                    <a href="{{ url('/produk', []) }}" class="btn btn-primary btn-cons">Batal</a>
                                    <input type="submit" class="btn btn-primary btn-cons" value="Simpan">
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
        <div class="row">
            <div class="col-lg-12 m-b-10 d-flex flex-column">
            <!-- START card -->
                <div class="card card-default">
                    <div class="card-block">
                        <div class="row">
                            <div class="col-lg-6 p-l-10 p-r-10 p-t-10">
                                <div class="form-group">
                                    <label>Nama</label>
                                    <span class="help"></span>
                                    <p>{{ $model->nama }}</p>
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <label>Telepon</label>
                                        <span class="help"></span>
                                        <p>{{ $model->telepon }}</p>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label>Email</label>
                                        <span class="help"></span>
                                        <p>{{ $model->email }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <label>Jenis Kelamin</label>
                                        <span class="help"></span>
                                        <p><cite>Belum diisi.</cite></p>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label>Tanggal Lahir</label>
                                        <span class="help"></span>
                                        <p><cite>Belum diisi.</cite></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 p-l-10 p-r-10 p-t-10">
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <span class="help"></span>
                                    <p><cite>Belum diisi.</cite></p>
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <label>Kota</label>
                                        <span class="help"></span>
                                        <p><cite>Belum diisi.</cite></p>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label>Kode Pos</label>
                                        <span class="help"></span>
                                        <p><cite>Belum diisi.</cite></p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Catatan</label>
                                    <span class="help"></span>
                                    <p><cite>Belum diisi.</cite></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END card -->
            </div>
        </div>
    </div>
{{-- </form> --}}
@endsection

@section('myjsfile')
<!-- BEGIN PAGE LEVEL JS -->
<script src="{{ asset('assets/js/form_elements.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/scripts.js') }}" type="text/javascript"></script>
<!-- END PAGE LEVEL JS -->
@endsection