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
                            {{-- <div class="ml-auto">
                                <a href="{{ url('/produk/kategori') }}" class="btn btn-primary btn-cons">Kategori</a>
                                <a href="{{ url('/produk/create') }}" class="btn btn-primary btn-cons">Tambah Produk</a>
                            </div> --}}
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
        <div class="col-lg-4">
            <!-- START card -->
            <a href="/laporan/penjualanperproduk">
                <div class="card-block no-padding">
                    <div id="card-advance" class="card card-default btn btn-primary">
                        <div class="card-block m-t-10 m-b-10 text-center">
                            <div class="col-lg-12 m-b-10">
                                <i class="fa fa-gift" style="font-size: 50px;"></i>
                            </div>
                            <span class="bold font-montserrat text-uppercase">Penjualan Per Produk</span>
                        </div>
                    </div>
                </div>
            </a>
            <!-- END card -->
        </div>
        <div class="col-lg-4">
            <!-- START card -->
            <a href="/laporan/penjualanharian">
                <div class="card-block no-padding">
                    <div id="card-advance" class="card card-default btn btn-primary">
                        <div class="card-block m-t-10 m-b-10 text-center">
                            <div class="col-lg-12 m-b-10">
                                <i class="fa fa-bar-chart" style="font-size: 50px;"></i>
                            </div>
                            <span class="bold font-montserrat text-uppercase">Penjualan Harian</span>
                        </div>
                    </div>
                </div>
            </a>
            <!-- END card -->
        </div>
        <div class="col-lg-4">
            <!-- START card -->
            <a href="/laporan/stok">
                <div class="card-block no-padding">
                    <div id="card-advance" class="card card-default btn btn-primary">
                        <div class="card-block m-t-10 m-b-10 text-center">
                            <div class="col-lg-12 m-b-10">
                                <i class="fa fa-inbox" style="font-size: 50px;"></i>
                            </div>
                            <span class="bold font-montserrat text-uppercase">Stok</span>
                        </div>
                    </div>
                </div>
            </a>
            <!-- END card -->
        </div>
    </div>
</div>
@endsection
