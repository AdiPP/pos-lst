@extends('layouts.casual')

@section('title', $title)

@section('content')
<form action="/produk" method="POST" enctype="multipart/form-data">
    @csrf
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
                                    <a href="{{ url()->previous() }}" class="btn btn-primary btn-cons">Batal</a>
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
                            <div class="col-lg-6 padding-10">
                                <div class="form-group">
                                    <label class="required-symbol">Nama Produk</label>
                                    <span class="help"></span>
                                    <input type="text" class="form-control" name="nama_produk" required>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Kategori</label>
                                            <span class="help"></span>
                                            <select class="full-width required" data-init-plugin="select2" name="kategori_produk">
                                                <option selected value="">Kosong</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="required-symbol">Harga</label>
                                            <span class="help"></span>
                                            <input type="text" data-a-sign="Rp " class="autonumeric form-control" name="harga_produk" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="required-symbol">Foto Produk</label>
                                    <span class="help"></span>
                                    <input type="file" class="form-control-file" name="foto_produk" required>
                                </div>
                            </div>
                            <div class="col-lg-6 padding-10">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>SKU</label>
                                            <span class="help"></span>
                                            <input type="text" class="form-control" name="sku_produk">
                                        </div>  
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Barcode</label>
                                            <span class="help"></span>
                                            <input type="text" class="form-control" name="barcode_produk">
                                        </div>  
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="required-symbol">Satuan</label>
                                    <span class="help"></span>
                                    <select class="full-width required" data-init-plugin="select2" name="satuan_produk" required>
                                            <option selected disabled value="">Pilih Salah Satu</option>
                                            @foreach ($units as $unit)
                                                <option value="{{ $unit->id }}">{{ $unit->singkatan }} - {{ $unit->nama }}</option>
                                            @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END card -->
            </div>
        </div>
    </div>
</form>
@endsection

@section('myjsfile')
<!-- BEGIN PAGE LEVEL JS -->
<script src="{{ asset('assets/js/form_elements.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/scripts.js') }}" type="text/javascript"></script>
<!-- END PAGE LEVEL JS -->
@endsection
