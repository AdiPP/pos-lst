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
                                {{-- <a href="{{ url('/produk/kategori') }}" class="btn btn-primary btn-cons">Kategori</a> --}}
                                <a href="{{ url('/inventori/stokmasuk/create') }}" class="btn btn-primary btn-cons">Tambah Stok Masuk</a>
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
                <div class="card-header">
                    <div class="padding-10">
                        <div class="row">
                        <div class="col-lg-3">
                            <label for="">Lokasi</label>
                            <input type="text" id="search-table" class="form-control pull-right" placeholder="Search">
                        </div>
                        <div class="col-lg-3">
                            <label for="">Kategori</label>
                            <input type="text" id="search-table" class="form-control pull-right" placeholder="Search">
                        </div>
                        <div class="col-lg-3">
                            <label for="">Status Dijual</label>
                            <input type="text" id="search-table" class="form-control pull-right" placeholder="Search">
                        </div>
                        <div class="col-lg-3">
                            <label for="">Cari</label>
                            <input type="text" id="search-table" class="form-control pull-right" placeholder="Search">
                        </div>
                    </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="card-block">
                    <table class="table table-hover demo-table-search table-responsive-block" id="tableWithSearch">
                    <thead>
                      <tr>
                        {{-- <th style="width:1%" class="text-center sorting_disabled" rowspan="1" colspan="1" aria-label="">
                            <button class="btn btn-link"><i class="pg-trash"></i></button>
                        </th> --}}
                        <th class="w-50">ID Stok Masuk</th>
                        <th class="w-25">Outlet</th>
                        <th class="w-25">Tanggal</th>
                      </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="v-align-middle">
                                Produk 1
                            </td>
                            <td class="v-align-middle">
                                Kategori 1
                            </td>
                            <td class="v-align-middle">
                                24-11-2019
                            </td>
                        </tr>
                    </tbody>
                  </table>
                </div>
            </div>
            <!-- END card -->
        </div>
    </div>
</div>
@endsection

@section('myjsfile')
<!-- BEGIN PAGE LEVEL JS -->
<script src="{{ asset('assets/js/demo.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/datatables.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/scripts.js') }}" type="text/javascript"></script>
<!-- END PAGE LEVEL JS -->
@endsection
