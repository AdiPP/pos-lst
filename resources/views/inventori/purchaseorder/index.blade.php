@extends('layouts.casual')

@section('title', $title)

@section('content')
@foreach ($purchaseOrders as $po)
    <div class="modal fade slide-up disable-scroll" id="modalView{{ $po->id }}" tabindex="-1" role="dialog" aria-hidden="false">
        <div class="modal-dialog modal-lg">
            <div class="modal-content-wrapper">
                <div class="modal-content">
                    <div class="modal-header clearfix text-left">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i>
                        </button>
                        <h5>Informasi <span class="semi-bold">Purchase Order</span></h5>
                        <p class="p-b-10">Berikut informasi mengenai Purchase Order <strong>#PO{{ $po->id }}</strong>.</p>
                    </div>
                    <div class="modal-body">
                        @csrf
                        <div class="form-group-attached">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group form-group-default">
                                        <label>No. PO</label>
                                        <input type="text" class="form-control" value="{{ $po->nomor }}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-group-default">
                                        <label>Outlet</label>
                                        <input type="text" class="form-control" value="{{ $po->outlet->outlet_name }}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-group-default">
                                        <label>Supplier</label>
                                        <input type="text" class="form-control" value="{{ $po->supplier->nama }}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-group-default">
                                        <label>Tanggal</label>
                                        <input type="text" class="form-control" name="kota" value="{{ Helper::mysqlToTanggal($po->tanggal) }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group form-group-default">
                                        <label>Catatan</label>
                                        <textarea class="form-control" id="name" placeholder="Briefly Describe your Abilities" name="alamat" readonly>{{ $po->catatan }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <table class="table table-hover demo-table-search table-responsive-block">
                            <thead>
                                <tr>
                                    <th class="w-25">Nama Produk</th>
                                    <th class="text-right" style="width: 1%">Jumlah Pesanan</th>
                                    @if ($po->status == "Diterima")
                                    <th class="text-right" style="width: 1%">Jumlah Diterima</th>
                                    @endif
                                    <th class="text-right w-25">Harga Beli / Unit</th>
                                    <th class="text-right w-25">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($po->infos as $info)
                                <tr>
                                    <td class="v-align-middle">
                                        {{ $info->produk->product_name }}
                                    </td>
                                    <td class="v-align-middle text-right">
                                        {{ $info->jumlah }}
                                    </td>
                                    @if ($po->status == "Diterima")
                                    <td class="v-align-middle text-right">
                                        {{ $info->jumlah_diterima }}
                                    </td>
                                    @endif
                                    <td class="v-align-middle text-right">
                                        {{ Helper::numberToRupiah($info->harga_beli_per_unit) }}
                                    </td>
                                    <td class="v-align-middle text-right">
                                        {{ Helper::numberToRupiah($info->total_harga_beli) }}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary btn-cons no-margin pull-left inline" data-dismiss="modal">Selesai</button>
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
                                <a href="/purchaseorder/create" class="btn btn-primary btn-cons">Tambah Purchase Order</a>
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
                        Daftar Purchase Order
                    </div>
                    <div class="padding-10">
                        <div class="row">
                        <div class="col-lg-12">
                            <input type="text" id="search-table" class="form-control pull-right" placeholder="Cari Purchase Order">
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
                        <th class="">ID PO</th>
                        <th class="">Supplier</th>
                        <th class="">No. PO</th>
                        <th class="">Tanggal</th>
                        <th class="">Status</th>
                        <th class="invisible" style="width: 1%;"></th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($purchaseOrders as $po)
                            <tr>
                                <td class="v-align-middle">
                                    #PO{{ $po->id }}
                                </td>
                                <td class="v-align-middle">
                                    {{ $po->supplier->nama }}
                                </td>
                                <td class="v-align-middle">
                                    {{ $po->nomor }}
                                </td>
                                <td class="v-align-middle">
                                    {{ Helper::mysqlToTanggal($po->tanggal) }}
                                </td>
                                <td class="v-align-middle">
                                    {{ $po->status }}
                                </td>
                                <td class="v-align-middle">
                                    <div class="d-flex justify-content-center">
                                        <button class="btn btn-xs btn-complete mx-1" data-target="#modalView{{ $po->id }}" data-toggle="modal" id=""><i class="fa fa-eye"></i></button>
                                        @if ($po->status == "Dipesan")
                                            <a title="Penerimaan" href="/purchaseorder/penerimaan/{{ $po->id }}" class="btn btn-xs btn-primary mx-1" alt="ttest"><i class="fa fa-check"></i></a>
                                            <a title="Pembatalan" href="/purchaseorder/pembatalan/{{ $po->id }}" class="btn btn-xs btn-danger mx-1" alt="ttest"><i class="fa fa-close"></i></a>
                                        @endif
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