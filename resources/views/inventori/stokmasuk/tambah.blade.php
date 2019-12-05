@extends('layouts.casual')

{{-- @section('title', $title) --}}

@section('content')
{{-- <form action="/inventori/stokmasuk" method="POST" enctype="multipart/form-data">
    @csrf --}}
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
            <div class="col-lg-3 m-b-10 d-flex flex-column">
            <!-- START card -->
                <div class="card card-default">
                    <div class="card-block">
                        <div class="row">
                            <div class="col-lg-12 padding-10">
                                <div class="form-group">
                                    <label>Outlet</label>
                                    <span class="help"></span>
                                    <select class="full-width" data-init-plugin="select2" name="outlet" id="outlet">
                                        <option disabled selected>Pilih Outlet</option>
                                        @foreach ($outlets as $outlet)
                                            <option value="{{ $outlet->id }}">{{ $outlet->outlet_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12 padding-10">
                                <div class="form-group">
                                    <label>Tanggal</label>
                                    <span class="help"></span>
                                    <input type="text" class="form-control" id="datepicker-component" required>
                                </div>
                            </div>
                            <div class="col-lg-12 padding-10">
                                <div class="form-group">
                                    <label>Catatan</label>
                                    <span class="help"></span>
                                    <textarea class="form-control" id="catatan" name="catatan"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-12 text-right">
                                <button class="btn btn-default btn-cons" onclick="setInfoUtama()">Selesai</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END card -->
            </div>
            <div class="col-lg-9 m-b-10 d-flex flex-column">
            <!-- START card -->
                <div class="card card-default">
                    <div class="card-block">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Cari Produk</label>
                                    <span class="help"></span>
                                    <select onchange="cariproduk()" class="full-width" data-init-plugin="select2" id="cariprodukpilih">
                                        <option selected disabled>Pilih Produk</option>
                                        {{-- <option value="1">ha</option> --}}
                                        @foreach ($produks as $produk)
                                            <option value="{{ $produk->id }}">{{ $produk->product_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <form action="#" id="formTambahProduk">
                                    @csrf
                                    <table class="table table-hover demo-table-search table-responsive-block">
                                        <thead>
                                            <tr>
                                                <th class="w-25">Nama Produk</th>
                                                <th class="text-center w-25">Harga Beli</th>
                                                <th class="text-center w-25">Jumlah</th>
                                                <th class="text-center w-25" >Total</th>
                                                <th class="invisible" style="width: 1%"><button class="btn btn-sm"><i class="fa fa-plus"></i></button></th>
                                            </tr>
                                        </thead>
                                        <tbody id="infoproduk">
                                            <tr>
                                                <td colspan="5" class="text-center v-align-middle">
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
                        <table class="table table-hover demo-table-search table-responsive-block" id="tableWithSearch2">
                            <thead>
                            <tr>
                                {{-- <th style="width:1%" class="text-center sorting_disabled" rowspan="1" colspan="1" aria-label="">
                                    <button class="btn btn-link"><i class="pg-trash"></i></button>
                                </th> --}}
                                <th class="w-25">Nama Produk</th>
                                <th class="w-25 text-right">Jumlah</th>
                                <th class="w-25 text-right">Harga Beli Per Unit</th>
                                <th class="w-25 text-right">Total Harga Beli</th>
                                {{-- <th style="width: 1%;" class="text-center"> --}}
                                    {{-- <a href="#" id="addRow"><i class="fa fa-plus"></i></button></a> --}}
                                {{-- </th> --}}
                            </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="v-align-middle">
                                        Produk 1
                                    </td>
                                    <td class="v-align-middle text-right">
                                        Jumlah 1
                                    </td>
                                    <td class="v-align-middle text-right">
                                        Harga 1
                                    </td>
                                    <td class="v-align-middle text-right">
                                        Total 1
                                    </td>
                                    {{-- <td class="v-align-middle">
                                        <a href="#" class="text-danger remove"><i class="fa fa-trash"></i></a>
                                    </td> --}}
                                </tr>
                            </tbody>
                        </table>
                        <div>
                            {{-- <br> --}}
                            {{-- <a href="#" id="addRow" class="btn">+ Tambah Produk</a> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
{{-- </form> --}}
@endsection

@section('inpagejs')
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
        });

        var outlet;
        var tanggal;
        var catatan;

        $(document).ready(function(){
            $('#formTambahProduk').submit(function (e) {
                e.preventDefault();  // prevent the form from 'submitting'

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                var input = $('#formTambahProduk').serialize() + "&moredata=" + 1;

                console.log(input);
                
                // $.ajax({
                //     url: 'pos/keranjang',
                //     type: 'POST',
                //     data: input,
                //     success: function(response)
                //     {
                //         console.log(response);
                //         reloadable();
                //     }
                // });

            });
        })

        function cariproduk() {
            var e = document.getElementById("cariprodukpilih");
            var idProduk = e.options[e.selectedIndex].value;

            $.ajax({
                url: '/inventori/stokmasuk/infoproduk',
                type: 'GET',
                data: { id: idProduk },
                success: function(response)
                {
                    // console.log('ok');
                    $('#infoproduk').html(response);
                }
            });
        }

        function setInfoUtama() {

            outlet = document.getElementById("outlet").value;
            tanggal = document.getElementById('datepicker-component').value;
            catatan = document.getElementById('catatan').value;


            console.log(outlet, tanggal, catatan);
        }

        // total harga beli
        $(document).on('input', '#harga', function() {
            var harga = document.getElementById('harga').value;
            var jumlah = document.getElementById('jumlah').value;   
            
            document.getElementById('result').textContent = harga * jumlah;
            // document.getElementById('resultpost').value = harga * jumlah;
        });

        $(document).on('input', '#jumlah', function() {
            var harga = document.getElementById('harga').value;
            var jumlah = document.getElementById('jumlah').value;

            document.getElementById('result').textContent = harga * jumlah;
            // document.getElementById('resultpost').value = harga * jumlah;
        });
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
