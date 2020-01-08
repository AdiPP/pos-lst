@extends('layouts.casual')

@section('title', $title)

@section('content')

@foreach ($transfers as $transfer)
    <div class="modal fade slide-up disable-scroll" id="modalLihat{{ $transfer->id }}" tabindex="-1" role="dialog" aria-hidden="false">
        <div class="modal-dialog">
            <div class="modal-content-wrapper">
                    <div class="modal-content">
                    <div class="modal-header clearfix text-left">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i>
                    </button>
                    <h5>Informasi <span class="semi-bold">Transfer Stok</span></h5>
                    <p class="p-b-10">Berikut informasi mengenai Transfer Stok <strong>#TFS{{ $transfer->id }}</strong></p>
                    </div>
                    <div class="modal-body">
                        <div class="form-group-attached">
                            <div class="row">
                                <div class="col-md-4">
                                <div class="form-group form-group-default">
                                    <label>Outlet Asal</label>
                                    <p>{{ $transfer->outletAsal->outlet_name }}</p>
                                </div>
                                </div>
                                <div class="col-md-4">
                                <div class="form-group form-group-default">
                                    <label>Outlet Tujuan</label>
                                    <p>{{ $transfer->outletTujuan->outlet_name }}</p>
                                </div>
                                </div>
                                <div class="col-md-4">
                                <div class="form-group form-group-default">
                                    <label>Tanggal</label>
                                    <p>{{ Helper::mysqlToTanggal($transfer->tanggal) }}</p>
                                </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                <div class="form-group form-group-default">
                                    <label>Deskripsi</label>
                                    <p>{{ $transfer->description }}</p>
                                </div>
                                </div>
                            </div>
                        </div>

                        <table class="table table-hover demo-table-search table-responsive-block">
                            <thead>
                                <tr>
                                <th class="">Nama Produk</th>
                                <th class="text-right">Jumlah</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($transfer->infos as $produk)
                                    <tr>
                                        <td class="v-align-middle">
                                            {{ $produk->produk->product_name }}
                                        </td>
                                        <td class="v-align-middle text-right">
                                            {{ $produk->jumlah }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="row">
                            <div class="col-md-4 m-t-10 sm-m-t-10">
                            <button type="button" class="btn btn-primary btn-block m-t-5">Selesai</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
@endforeach

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
                                <a href="/inventori/transferstok/create" class="btn btn-primary btn-cons">Tambah Transfer Stok</a>
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
                    <div class="card-title">
                        Daftar Transfer Stok
                    </div>
                    <div class="padding-10">
                        <div class="row">
                        <div class="col-lg-12">
                            <input type="text" id="search-table" class="form-control pull-right" placeholder="Cari Stok Masuk">
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
                        <th class="w-25">ID Transfer Stok</th>
                        <th class="w-25">Outlet Asal</th>
                        <th class="w-25">Outlet Tujuan</th>
                        <th class="w-25">Tanggal</th>
                        <th class="invisible" style="width: 1%;"></th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($transfers as $transfer)
                            <tr>
                                <td class="v-align-middle">
                                    #TFS{{ $transfer->id }}
                                </td>
                                <td class="v-align-middle">
                                    {{ $transfer->outletAsal->outlet_name }}
                                </td>
                                <td class="v-align-middle">
                                    {{ $transfer->outletTujuan->outlet_name }}
                                </td>
                                <td class="v-align-middle">
                                    {{ Helper::mysqlToTanggal($transfer->tanggal) }}
                                </td>
                                <td>
                                    <div class="d-flex justify-content-center">
                                        <button class="btn btn-xs btn-complete mx-1" data-target="#modalLihat{{ $transfer->id }}" data-toggle="modal" id=""><i class="fa fa-eye"></i></button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
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
<script src="{{ asset('assets/js/form_elements.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/demo.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/datatables.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/scripts.js') }}" type="text/javascript"></script>
<!-- END PAGE LEVEL JS -->
@endsection