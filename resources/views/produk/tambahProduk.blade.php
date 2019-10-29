@extends('layouts.casual')

@section('title', $title)

@section('content')
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
                                <h5>{{ $title }}</h5>
                            </div>
                            <div class="ml-auto">
                                <a href="{{ url('/produk', []) }}" class="btn btn-primary btn-cons">Batal</a>
                                <a href="#" class="btn btn-primary btn-cons">Simpan</a>
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
                        <div class="col-lg-6 padding-10">
                            <div class="form-group">
                                <label>Nama Produk</label>
                                <span class="help"></span>
                                <input type="email" class="form-control" required="">
                            </div>
                            <div class="form-group">
                                <label>Kategori</label>
                                <span class="help"></span>
                                <input type="email" class="form-control" required="">
                            </div>
                            <div class="padding-20 bg-master-lighter">
                                <p>Harga</p>  
                                <div class="form-group">
                                    <label>Harga</label>
                                    <span class="help"></span>
                                    <input type="email" class="form-control" required="">
                                </div>
                                <div class="form-group">
                                    <label>Grosir</label>
                                    <span class="help"></span>
                                    <div class="row">
                                        <div class="col-lg-2">
                                            <input type="email" class="form-control" required="">
                                        </div>
                                        <div class="col-lg-1 d-flex align-items-center justify-content-center">
                                            <h4 class="m-0">-</h4>
                                        </div>
                                        <div class="col-lg-9">
                                            <input type="email" class="form-control" required="">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Anggota</label>
                                    <span class="help"></span>
                                    <input type="email" class="form-control" required="">
                                </div>                              
                            </div>
                            <div class="form-group">
                                <label>Foto Produk</label>
                                <span class="help"></span>
                                <input type="file" class="form-control" required="">
                            </div>
                        </div>
                        <div class="col-lg-6 padding-10">
                            <div class="form-group">
                                <label>SKU</label>
                                <span class="help"></span>
                                <input type="email" class="form-control" required="">
                            </div>
                            <div class="form-group">
                                <label>Satuan</label>
                                <span class="help"></span>
                                <input type="email" class="form-control" required="">
                            </div>
                            <div class="form-group">
                                <label>Varian</label>
                                <span class="help"></span>
                                <p class="hint-text small">Apakah produk ini memiliki varian seperti warna dan ukuran?</p>
                                <input type="checkbox" data-init-plugin="switchery" data-size="small" data-color="primary" />
                                <div class="m-t-10">
                                    <button class="btn btn-primary btn-cons">Kelola Varian Produk</button>
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
<script src="{{ asset('assets/js/form_elements.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/scripts.js') }}" type="text/javascript"></script>
<!-- END PAGE LEVEL JS -->
@endsection