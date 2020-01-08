@extends('layouts.casual')

@section('title', $title)

@section('content')
<!-- START JUMBOTRON -->
<form action="/produk/kategori/{{ $model->id }}" method="POST">
    @csrf
    <input name="_method" type="hidden" value="PUT">
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
                                    <button type="submit" class="btn btn-primary btn-cons">Simpan</button>
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
                                    <label>Nama Kategori</label>
                                    <span class="help"></span>
                                    <input type="text" class="form-control" name="nama_kategori" value="{{ $model->category_name }}">
                                </div>
                            </div>
                            <div class="col-lg-6 padding-10">
                                <div class="form-group">
                                    <label>Deskripsi</label>
                                    <span class="help"></span>
                                    <textarea class="form-control" placeholder="" name="deskripsi_kategori">{{ $model->category_description }}</textarea>
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