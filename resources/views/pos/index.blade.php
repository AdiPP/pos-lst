@php
    use App\Product;
@endphp
@extends('layouts.casual')

{{-- @section('title', $title) --}}

@section('content')
{{-- @foreach ($models as $model)
    <div class="modal fade slide-up disable-scroll" id="modalView{{ $model->id }}" tabindex="-1" role="dialog" aria-hidden="false">
        <div class="modal-dialog modal-lg">
            <div class="modal-content-wrapper">
                    <div class="modal-content">
                    <div class="modal-header clearfix text-left">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i>
                    </button>
                    <h5>Informasi <span class="semi-bold">Stok Keluar</span></h5>
                    <p class="p-b-10">Berikut informasi mengenai Stok Keluar <strong>{{ $model->id }}</strong></p>
                    </div>
                    <div class="modal-body">
                        @csrf
                        <div class="form-group-attached">
                        <div class="row">
                            <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>Outlet</label>
                                <p>{{ $model->outlet->outlet_name }}</p>
                            </div>
                            </div>
                            <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>Tanggal</label>
                                <p>{{ Helper::mysqlToTanggal($model->tanggal) }}</p>
                            </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                            <div class="form-group form-group-default">
                                <label>Catatan</label>
                                <p>{{ $model->description }}</p>
                            </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>Nama Produk</label>
                                <p>{{ $model->produks[0]->product_name }}</p>
                            </div>
                            </div>
                            <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>Jumlah</label>
                                <p>{{ $model->infos[0]->jumlah }}</p>
                            </div>
                            </div>
                        </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                            </div>
                            <div class="col-md-4 m-t-10 sm-m-t-10">
                            <button type="button" class="btn btn-primary btn-block m-t-5" data-dismiss="modal">Selesai</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
@endforeach --}}

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
                                <a href="/inventori/stokkeluar/create" class="btn btn-primary btn-cons">Tambah Stok Keluar</a>
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
                        Produk
                    </div>
                </div>
                <div class="card-block">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Cari Produk</label>
                                <span class="help"></span>
                                <select onchange="cariproduk()" class="full-width" data-init-plugin="select2" id="cariproduk">
                                    <option selected disabled>Pilih Produk</option>
                                    @foreach ($produks as $produk)
                                        <option value="{{ $produk->id }}">{{ $produk->product_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <form action="#" id="formCoba">
                                @csrf
                                <table class="table table-hover demo-table-search table-responsive-block">
                                    <thead>
                                        <tr>
                                            <th class="w-50">Nama Produk</th>
                                            <th class="text-right">Harga</th>
                                            <th class="text-center w-25" >Jumlah</th>
                                            <th class="invisible" style="width: 1%"><button class="btn btn-sm"><i class="fa fa-plus"></i></button></th>
                                        </tr>
                                    </thead>
                                        <tbody id="infoproduk">
                                            <tr class="odd text-center">
                                                <td colspan="4">Silahkan Pilih Produk</td>
                                            </tr>
                                        </tbody>
                                </table>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END card -->
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 m-b-10 d-flex flex-column">
        <!-- START card -->
            <div class="card card-default">
                <div class="card-header">
                    <div class="card-title">
                        Penjualan
                    </div>
                </div>
                <div class="card-block">
                    <table class="table table-hover demo-table-search table-responsive-block" id="tableWithSearch">
                        <thead>
                            <tr>
                                <th class="w-50">Nama Produk</th>
                                <th class="">Harga</th>
                                <th class="">Jumlah</th>
                                <th class="">Total</th>
                                <th class="invisible" style="width: 1%;"></th>
                            </tr>
                        </thead>
                        <tbody id="keranjangTampil"></tbody>
                  </table>
                </div>
            </div>
            <!-- END card -->
        </div>
    </div>
</div>
@endsection

@section('inpagejs')
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
        });
        
        $(function () {

            keranjangTampil();

            $('#formCoba').submit(function (e) {
                e.preventDefault();  // prevent the form from 'submitting'

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                var input = $('#formCoba').serialize();
                
                $.ajax({
                    url: 'pos/keranjang',
                    type: 'POST',
                    data: input,
                    success: function(response)
                    {
                        console.log(response);
                        keranjangTampil();
                    }
                });

            });
        });

        function cariproduk() {
            var e = document.getElementById("cariproduk");
            var idProduk = e.options[e.selectedIndex].value;
            
            $.ajax({
                url: '/pos/infoproduk/{id}',
                type: 'GET',
                data: { id: idProduk },
                success: function(response)
                {
                    $('#infoproduk').html(response);
                }
            });
        }

        function keranjangTampil() {
            $.ajax({
                url: '/pos/keranjang/tampil',
                type: 'GET',
                success: function(response)
                {
                    // console.log(response);
                    $('#keranjangTampil').html(response);
                },
                error: function()
                {
                    console.log('💩');
                }
            });
        }

        function kurangiProduk(produk) {
            $.ajax({
                url: '/pos/keranjang/kurang',
                type: 'GET',
                data: { id: produk },
                success: function(response)
                {
                    console.log(response);
                    keranjangTampil();
                },
                error: function()
                {
                    console.log('💩');
                }
            });

        }
    </script>
@endsection

@section('myjsfile')
<!-- BEGIN PAGE LEVEL JS -->
<script src="{{ asset('assets/js/form_elements.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/demo.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/datatables.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/scripts.js') }}" type="text/javascript"></script>
<!-- END PAGE LEVEL JS -->
@endsection