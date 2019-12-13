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
                                <a href="{{ url()->previous() }}" class="btn btn-primary btn-cons">Batal</a>
                                <input type="submit" id="buttonFormUtama" class="btn btn-primary btn-cons" value="Simpan">
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
        <div class="col-lg-5 m-b-10 d-flex flex-column">
        <!-- START card -->
            <div class="card card-default">
                <div class="card-block">
                    <form action="/inventori/transferstok" method="post" id="formUtama">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12 padding-10">
                            <div class="form-group">
                                <label>Outlet</label>
                                <span class="help"></span>
                                <select class="full-width" data-init-plugin="select2" name="outletAsal">
                                    <option disabled selected>Pilih Outlet</option>
                                    {{-- @foreach ($outlets as $outlet)
                                        <option value="{{ $outlet->id }}">{{ $outlet->outlet_name }}</option>
                                    @endforeach --}}
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12 padding-10">
                            <div class="form-group">
                                <label>Catatan</label>
                                <span class="help"></span>
                                <textarea class="form-control" name="catatan"></textarea>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
            <!-- END card -->
        </div>
        <div class="col-lg-7 m-b-10 d-flex flex-column">
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
                                <select onchange="cariProduk()" class="full-width" data-init-plugin="select2" id="cariproduk">
                                    <option selected disabled>Pilih Produk</option>
                                    @foreach ($produks as $produk)
                                        <option value="{{ $produk->id }}">{{ $produk->product_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <form action="" id="formTambahProduk">
                            <table class="table table-hover demo-table-search table-responsive-block">
                                <thead>
                                    <tr>
                                        <th class="w-50">Nama Produk</th>
                                        <th class="text-center w-25" >Jumlah Barang (Sistem)</th>
                                        <th class="text-center w-25" >Jumlah Barang (Aktual)</th>
                                        <th class="invisible" style="width: 1%"><button class="btn btn-sm"><i class="fa fa-plus"></i></button></th>
                                    </tr>
                                </thead>
                                <tbody id="infoproduk">
                                    <tr>
                                        <td colspan="4" class="text-center v-align-middle">
                                            <button class="btn disabled">Silahkan Pilih Produk</button>
                                        </td>
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
            <div data-pages="card" class="card card-default" id="card-basic">
                <div class="card-header ">
                    <div class="card-title">
                        Produk
                    </div>
                </div>
                <div class="card-block">
                    <form action="/inventori/transferstok" method="post">
                        @csrf
                        <table class="table table-hover demo-table-search table-responsive-block" id="tableWithSearch">
                            <thead>
                            <tr>
                                <th>Nama Produk</th>
                                <th>Jumlah</th>
                                <th class="invisible" style="width: 1%;"></th>
                            </tr>
                            </thead>
                            <tbody id="tampilTemp">
                            </tbody>
                        </table>
                    </form>
                    <div>
                        <br>
                    </div>
                </div>
            </div>
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

        $(document).ready(function(){
            tampilTemps();
            $("#buttonFormUtama").click(function() {
                $("#formUtama").submit();
            });
        })

        function cariProduk(){

            var e = document.getElementById("cariproduk");
            var selected = e.options[e.selectedIndex].value;

            $.ajax({
                url: '/inventori/stokopname/infoproduk',
                type: 'GET',
                data: {idProduk: selected},
                success: function(response){
                    // console.log(response);
                    $('#infoproduk').html(response);
                }
            })
        }

        $('#formTambahProduk').submit(function(e){
            e.preventDefault();
            
            $.ajaxSetup({
                headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
            });

            var input = $('#formTambahProduk').serialize();

            $.ajax({
                url: '/inventori/stokopname/tambahproduk',
                method: 'POST',
                data: input,
                success: function(response){
                    console.log(response);
                    // tampilTemps();
                },

            })
        })

        function tampilTemps(){
            $.ajax({
                url: '/inventori/transferstok/tampiltemp',
                type: 'GET',
                success: function(response){
                    $('#tampilTemp').html(response);
                }
            })
        }

        function hapusTemp(idTemp)
        {
            $.ajax({
                url: '/inventori/transferstok/hapustemp',
                type: 'GET',
                data: {id: idTemp},
                success: function(response)
                {
                    console.log(response);
                    tampilTemps();
                }
            })
        }
    </script>
@endsection

@section('myjsfile')
<!-- BEGIN PAGE LEVEL JS -->
<script src="{{ asset('assets/js/form_elements.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/scripts.js') }}" type="text/javascript"></script>
<!-- END PAGE LEVEL JS -->
@endsection