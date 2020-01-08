@extends('layouts.casual')

{{-- @section('title', $title) --}}

@section('content')
<form action="/pos/bayar/selesai" method="POST" id="formBayarSelesai">
@csrf
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
                                <a href="{{ url()->previous() }}" type="button" class="btn btn-primary btn-cons">Kembali</a>
                                <button type="submit" class="btn btn-primary btn-cons">Selesai</button>
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
            <div class="col-lg-6 m-b-10 d-flex flex-column">
                <!-- START card -->
                <div class="card card-default">
                    <div class="card-header">
                        <div class="card-title">
                            Informasi Pembayaran
                        </div>
                    </div>
                    <div class="card-block">
                        <div class="row">
                            <div class="table-responsive table-invoice">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td class="">
                                                <p class="text-black">Outlet</p>
                                            </td>
                                            <td class="">
                                                {{ $outlet->outlet_name }}
                                                <input type="hidden" name="outlet" value="{{ $outlet->id }}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="">
                                                <p class="text-black">Pelanggan</p>
                                            </td>
                                            <td class="w-75">
                                                @if ($pelanggan == null)
                                                    Default
                                                    <input type="hidden" name="pelanggan" value="0">
                                                @else
                                                    {{ $pelanggan->nama }}
                                                    <input type="hidden" name="pelanggan" value="{{ $pelanggan->id }}">
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Total
                                            </td>
                                            <td>
                                                {{ Helper::numberToRupiah($totalAkhir) }}
                                                <input type="hidden" name="total" value="{{ $totalAkhir }}">
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
            <div class="col-lg-6 m-b-10 d-flex flex-column">
                <!-- START card -->
                <div class="card card-default">
                    <div class="card-header">
                        <div class="card-title">
                            Informasi Transaksi
                        </div>
                    </div>
                    <div class="card-block">
                        <div class="row">
                            <div class="table-responsive table-invoice">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td class="">
                                                <p class="text-black">Admin</p>
                                            </td>
                                            <td class="">
                                                {{ Helper::getAdmin(session('user')) }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="v-align-middle">
                                                <p class="text-black">Uang Tunai</p>
                                            </td>
                                            <td class="w-75">
                                                <input type="text" name="uangTunai" class="form-control" required>
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
        </div>
        <div class="row">
            <div class="col-lg-12 m-b-10 d-flex flex-column">
            <!-- START card -->
                <div class="card card-default">
                    <div class="card-header">
                        <div class="card-title">
                            Daftar Barang
                        </div>
                    </div>
                    <div class="card-block">
                        <table class="table table-hover demo-table-search table-responsive-block">
                            <thead>
                                <tr>
                                    <th class="w-25">Nama Produk</th>
                                    <th class="text-right w-25">Harga</th>
                                    <th class="text-right">Jumlah</th>
                                    <th class="text-right w-50">Total</th>
                                </tr>
                            </thead>
                            <tbody id="keranjangTampil">
                                @foreach ($keranjang as $produk)
                                    <tr>
                                        <td class="v-align-middle">
                                            {{ $produk->produk->product_name }}
                                        </td>
                                        <td class="v-align-middle text-right">
                                            {{ Helper::numberToRupiah($produk->produk->product_price) }}
                                        </td>
                                        <td class="v-align-middle text-right">
                                            {{ $produk->jumlah }}
                                        </td>
                                        <td class="v-align-middle text-right">
                                            {{ Helper::numberToRupiah($produk->produk->product_price * $produk->jumlah) }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot id="keranjangFooter">
                                <tr>
                                    <td class="v-align-middle text-center" colspan="3"> <strong>Diskon Pelanggan</strong> <span class="hint-text small">({{ Helper::numberToRupiah($user->info->harga_pelanggan) }})</span></td>
                                    <td class="v-align-middle text-right" style="padding:20px;" id="diskonPelanggan">
                                        - {{ Helper::numberToRupiah($diskon) }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="v-align-middle text-center" colspan="3"> <strong>Total</strong></td>
                                    <td class="v-align-middle text-right" style="padding:20px;" id="diskonPelanggan">
                                        {{ Helper::numberToRupiah($totalAkhir) }}
                                    </td>
                                </tr>
                            </tfoot>
                    </table>
                    <br>
                    </div>
                </div>
                <!-- END card -->
            </div>
        </div>
    </div>
</form>
@endsection

@section('inpagejs')
<script>
function selesaiBayar(){
    $('#formBayarSelesai').submit();
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