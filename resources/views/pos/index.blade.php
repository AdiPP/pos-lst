@extends('layouts.casual')

{{-- @section('title', $title) --}}

@section('content')
<div class="modal fade slide-up disable-scroll" id="modalBayar" tabindex="-1" role="dialog" aria-hidden="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content-wrapper">
            <div class="modal-content">
                <div class="modal-header clearfix text-left">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i></button>
                    <h5>Informasi <span class="semi-bold">Pembayaran</span></h5>
                    <p>Berikut informasi mengenai Pembayaran Order #ABCD</p>
                </div>
                <div class="modal-body">
                <form action="#" id="formBayar">
                    <div class="form-group-attached">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group form-group-default">
                                    <label>Outlet</label>
                                    ABCD
                                    <input type="hidden" name="outletid" value=25>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group form-group-default">
                                    <label>Pelanggan</label>
                                    <span id="pelangganbayar">Default</span>
                                    <input type="hidden" name="pelangganid" id="pelangganid" value=0>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-group-default">
                                    <label>Admin</label>
                                    Adi Pepe
                                    <input type="hidden" name="adminid" value=25>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group form-group-default">
                                    <label>Total</label>
                                    Rp <span id="totalpembayaran">0</span>
                                    <input type="hidden" value="0" name="total" id="totalpembayaraninput">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-group-default">
                                    <label>Cash</label>
                                    <input type="text" name="cash" value="0" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 m-t-10 sm-m-t-10">
                            {{-- <button type="submit" class="btn btn-primary btn-block m-t-5" data-target="#modalBayar2" data-toggle="modal" data-dismiss="modal">Bayar</button> --}}
                            <button type="submit" class="btn btn-primary btn-block m-t-5">Bayar</button>
                        </div>
                        <div class="col-md-6 m-t-10 sm-m-t-10">
                            <button type="button" class="btn btn-block m-t-5" data-dismiss="modal">Kembali</button>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div class="modal fade slide-up disable-scroll" id="modalSukses" tabindex="-1" role="dialog" aria-hidden="false">
    <div class="modal-dialog modal-sm">
        <div class="modal-content-wrapper">
            <div class="modal-content">
                <div class="modal-body text-center m-t-20">
                    <div class="p-b-10">
                        <h4 class="no-margin">Transaksi Berhasil</h4>
                        <h5>Kembali: Rp <span id="kembali">0</span></h5>
                    </div>
                    <button type="button" class="btn btn-primary btn-cons" data-dismiss="modal">Continue</button>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

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
                                <button data-target="#modalBayar" data-toggle="modal" class="btn btn-primary btn-cons">Bayar</button>
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
                {{-- <div class="card-header">
                    <div class="card-title">
                        Total
                    </div>
                </div> --}}
                <div class="card-block">
                    <div class="row">
                        <div class="table-responsive table-invoice">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td class="">
                                            <p class="text-black">Outlet</p>
                                        </td>
                                        <td class="">Outlet 1</td>
                                    </tr>
                                    <tr>
                                        <td class="">
                                            <p class="text-black">Pelanggan</p>
                                        </td>
                                        <td class="w-75">
                                            <select onchange="pelanggan()" class="full-width" data-init-plugin="select2" id="pelanggan">
                                                <option selected value="0">Default</option>
                                                @foreach ($pelanggans as $pelanggan)
                                                    <option value="{{ $pelanggan->id }}">{{ $pelanggan->id }} - {{ $pelanggan->nama }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="">
                                            <p class="text-black">Total</p>
                                        </td>
                                        <td class="">
                                            Rp <span id="totalbelanja">0</span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
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
                                <select onchange="cariproduk()" class="full-width" data-init-plugin="select2" id="cariproduktampil">
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
        <!-- START card -->
            <div class="card card-default">
                <div class="card-header">
                    <div class="card-title">
                        Penjualan
                    </div>
                </div>
                <div class="card-block">
                    <table class="table table-hover demo-table-search table-responsive-block">
                        <thead>
                            <tr>
                                <th class="w-50">Nama Produk</th>
                                <th class="text-right">Harga</th>
                                <th class="text-right">Jumlah</th>
                                <th class="text-right">Total</th>
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
        
        $(document).ready(function () {

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
                        reloadable();
                    }
                });

            });

            $('#formBayar').submit(function (e) {
                e.preventDefault();  // prevent the form from 'submitting'

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                var input = $('#formBayar').serialize();

                $('#modalBayar').modal('hide');

                $.ajax({
                    url: 'pos/bayar',
                    type: 'POST',
                    data: input,
                    success: function(response)
                    {
                        console.log(response);
                        reloadable();
                        $("[data-dismiss=modal]").trigger({ type: "click" });
                        $('#kembali').html(response);
                        $('#modalSukses').modal('show');
                    },
                    error: function()
                    {
                        console.log('error');
                    }
                });

            });
        });

        function reloadable() {
            totalBelanja();
            keranjangTampil();
            console.log('reloadable function reloaded');
        }

        function totalBelanja() {
            $.ajax({
                url: '/pos/infototal',
                type: 'GET',
                success: function(response)
                {
                    // console.log(response);
                    $('#totalbelanja').html(response);
                    $('#totalpembayaran').html(response);
                    document.getElementById("totalpembayaraninput").value = response;
                }
            })
        }

        function cariproduk() {
            var e = document.getElementById("cariproduktampil");
            var idProduk = e.options[e.selectedIndex].value;
            
            $.ajax({
                url: '/pos/infoproduk',
                type: 'GET',
                data: { id: idProduk },
                success: function(response)
                {
                    $('#infoproduk').html(response);
                }
            });
        }

        function pelanggan() {
            var e = document.getElementById("pelanggan");
            var pelanggan = e.options[e.selectedIndex].text;
            var pelangganid = e.options[e.selectedIndex].value;

            document.getElementById("pelangganid").value = pelangganid;
            $('#pelangganbayar').html(pelanggan);
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

        function kurangiProduk(cart) {
            $.ajax({
                url: '/pos/keranjang/kurang',
                type: 'GET',
                data: { id: cart },
                success: function(response)
                {
                    console.log(response);
                    reloadable();
                },
                error: function()
                {
                    console.log('💩');
                }
            });
        }

        function tambahProduk(cart) {
            $.ajax({
                url: '/pos/keranjang/tambah',
                type: 'GET',
                data: { id: cart },
                success: function(response)
                {
                    console.log(response);
                    reloadable();
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