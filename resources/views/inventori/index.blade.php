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
                        Kartu Stok
                    </div>
                    <div class="padding-10">
                        <div class="row">
                            <div class="col-lg-12">
                                <label for="">Pilih Outlet</label>
                                <div class="form-group ">
                                    <select class="full-width" data-init-plugin="select2" onchange="pilihOutlet()" id="pilihOutlet">
                                        <option value="0" selected>Semua Outlet</option>
                                        @foreach ($outlets as $outlet)
                                            <option value="{{ $outlet->id }}">{{ $outlet->outlet_name }}</option>
                                        @endforeach
                                        </optgroup>
                                    </select>
                                </div>
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
                        <th class="w-25">Nama Produk</th>
                        <th>Kategori</th>
                        <th>Stok Awal</th>
                        <th>Stok Masuk</th>
                        <th>Stok Keluar</th>
                        <th>Penjualan</th>
                        <th>Transfer</th>
                        <th>Penyesuaian</th>
                        <th>Stok Akhir</th>
                      </tr>
                    </thead>
                    <tbody id="tampilKartuStok"></tbody>
                  </table>
                </div>
            </div>
            <!-- END card -->
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        semuaOutlet();
    })

    // function pilihOutlet()
    // {

    // }

    function semuaOutlet(){
        $.ajaxSetup({
            headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
        });

        $.ajax({
            url: '/inventori/kartustok/tampil',
            type: 'GET',
            data: {outlet: 0},
            success: function(response)
            {
                $('#tampilKartuStok').html(response);
            }
        })
    }

    function pilihOutlet(){
        $.ajaxSetup({
            headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
        });

        var e = document.getElementById("pilihOutlet");
        var strUser = e.options[e.selectedIndex].value;

        $.ajax({
            url: '/inventori/kartustok/tampil',
            type: 'GET',
            data: {outlet: strUser},
            success: function(response)
            {
                $('#tampilKartuStok').html(response);
            }
        });
    }
</script>
@endsection

@section('myjsfile')
<!-- BEGIN PAGE LEVEL JS -->
<script src="{{ asset('assets/js/demo.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/datatables.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/scripts.js') }}" type="text/javascript"></script>
<!-- END PAGE LEVEL JS -->
@endsection
