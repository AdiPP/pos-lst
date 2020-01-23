@extends('layouts.casual')

@section('title', $title)

@section('content')
<!-- Modal -->
@foreach ($produks as $produk)
    <div class="modal fade slide-up disable-scroll" id="modalSlideUp{{$produk->id}}" tabindex="-1" role="dialog" aria-hidden="false">
        <div class="modal-dialog modal-sm">
            <div class="modal-content-wrapper">
                <div class="modal-content">
                <div class="modal-header clearfix text-left">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i>
                    </button>
                    <h5>Perhatian</h5>
                </div>
                <div class="modal-body">
                    <p class="no-margin">Apakah anda yakin ingin menghapus Produk <span class="bold">{{ $produk->product_name }}</span> dari sistem?</p>
                </div>
                <div class="modal-footer">
                    <form action="/produk/{{ $produk->id }}" method="POST">
                        @csrf
                        <input name="_method" type="hidden" value="DELETE">
                        <button type="submit" class="btn btn-primary btn-cons  pull-left inline">Iya</button>
                    </form>
                    <button type="button" class="btn btn-default btn-cons no-margin pull-left inline" data-dismiss="modal">Tidak</button>
                </div>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <div class="modal fade slide-up disable-scroll" id="modalLihat{{$produk->id}}" tabindex="-1" role="dialog" aria-hidden="false">
        <div class="modal-dialog modal-lg">
            <div class="modal-content-wrapper">
                <div class="modal-content">
                    <div class="modal-header clearfix text-left">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i>
                        </button>
                        <h5>Informasi <span class="semi-bold">Produk</span></h5>
                        <p class="p-b-10">Berikut informasi mengenai Produk <strong>{{ $produk->product_name }}</strong>.</p>
                    </div>
                    <div class="modal-body">
                        <div class="form-group-attached">
                            <div class="row">
                                <div class="col-lg-8 no-gutters">
                                    <div class="col-md-12">
                                    <div class="form-group form-group-default">
                                        <label>Nama Produk</label>
                                        @if (is_null($produk->product_name))
                                            <p><cite>Belum diisi.</cite></p>
                                        @else
                                            <p>{{ $produk->product_name }}</p>
                                        @endif
                                    </div>
                                    </div>
                                    <div class="col-md-12">
                                    <div class="form-group form-group-default">
                                        <label>Satuan</label>
                                        @if (is_null($produk->unit_id))
                                            <p><cite>Belum diisi.</cite></p>
                                        @else
                                            <p>{{ $produk->unit->nama }}</p>
                                        @endif
                                    </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-group-default d-flex justify-content-center align-items-center">
                                        <div style="height: 100px">
                                            <img src="{{ asset('storage/img/product/'.$produk->product_pict) }}" alt="" height="100%">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                <div class="form-group form-group-default">
                                    <label>Kategori</label>
                                    @if (is_null($produk->category_id))
                                        <p><cite>Belum diisi.</cite></p>
                                    @else
                                        <p>{{ $produk->category->category_name }}</p>
                                    @endif
                                </div>
                                </div>
                                <div class="col-md-6">
                                <div class="form-group form-group-default">
                                    <label>Harga</label>
                                    @if (is_null($produk->product_price))
                                        <p><cite>Belum diisi.</cite></p>
                                    @else
                                        <p>{{ Helper::numberToRupiah($produk->product_price) }}</p>
                                    @endif
                                </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                <div class="form-group form-group-default">
                                    <label>SKU</label>
                                    @if (is_null($produk->product_sku))
                                        <p><cite>Belum diisi.</cite></p>
                                    @else
                                        <p>{{ $produk->product_sku }}</p>
                                    @endif
                                </div>
                                </div>
                                <div class="col-md-6">
                                <div class="form-group form-group-default">
                                    <label>Barcode</label>
                                    @if (is_null($produk->product_barcode))
                                        <p><cite>Belum diisi.</cite></p>
                                    @else
                                        <p>{{ $produk->product_barcode }}</p>
                                    @endif
                                </div>
                                </div>
                            </div>
                        </div>
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
                                <a href="{{ url('/produk/kategori') }}" class="btn btn-primary btn-cons">Kategori</a>
                                <a href="{{ url('/produk/create') }}" class="btn btn-primary btn-cons">Tambah Produk</a>
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
                        Daftar Produk
                    </div>
                    <div class="padding-10">
                        <div class="row">
                        <div class="col-lg-12">
                            {{-- <label for="">Cari Produk</label> --}}
                            <input type="text" id="search-table" class="form-control pull-right" placeholder="Cari Produk">
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
                            <th class="w-50">Nama Produk</th>
                            <th>Kategori</th>
                            <th class="text-right w-25">Harga</th>
                            <th class="invisible" style="width: 1%;">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($produks as $produk)
                                <tr>
                                {{-- <td class="v-align-middle">
                                    <div class="checkbox text-center">
                                        <input type="checkbox" value="3" id="checkbox4">
                                        <label for="checkbox4" class="no-padding no-margin"></label>
                                    </div>
                                </td> --}}
                                <td class="v-align-middle semi-bold">
                                    {{ $produk->product_name }}
                                </td>
                                <td class="v-align-middle">
                                    {{-- {{ $produk->category->category_name }} --}}
                                    {!! Helper::getKategoriProduk($produk->id) !!}
                                </td>
                                <td class="v-align-middle text-right semi-bold">
                                    Rp. {{ number_format($produk->product_price, 2,',','.') }}
                                </td>
                                <td class="v-align-middle">
                                    <div class="d-flex justify-content-center">
                                        <a href="/produk/{{ $produk->id }}/edit" class="btn btn-xs btn-success mx-1"><i class="fa fa-pencil"></i></a>
                                        <button class="btn btn-xs btn-complete mx-1" data-target="#modalLihat{{ $produk->id }}" data-toggle="modal" id=""><i class="fa fa-eye"></i></button>
                                        <button class="btn btn-xs btn-danger mx-1" data-target="#modalSlideUp{{ $produk->id }}" data-toggle="modal" id=""><i class="fa fa-trash-o"></i></button>
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
<script src="{{ asset('assets/js/demo.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/datatables.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/scripts.js') }}" type="text/javascript"></script>
<!-- END PAGE LEVEL JS -->
@endsection
