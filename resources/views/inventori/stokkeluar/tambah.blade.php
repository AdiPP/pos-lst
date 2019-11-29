@extends('layouts.casual')

{{-- @section('title', $title) --}}

@section('content')
<form action="/inventori/stokkeluar" method="POST" enctype="multipart/form-data">
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
            <div class="col-lg-12 m-b-10 d-flex flex-column">
            <!-- START card -->
                <div class="card card-default">
                    <div class="card-block">
                        <div class="row">
                            <div class="col-lg-3 padding-10">
                                <div class="form-group">
                                    <label>Outlet</label>
                                    <span class="help"></span>
                                    <select class="full-width" data-init-plugin="select2" name="outlet">
                                        @foreach ($outlets as $outlet)
                                            <option value="{{ $outlet->id }}">{{ $outlet->outlet_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3 padding-10">
                                <div class="form-group">
                                    <label>Tanggal</label>
                                    <span class="help"></span>
                                    <input autocomplete="off" type="text" class="form-control" name="tanggal" id="datepicker-component">
                                </div>
                            </div>
                            <div class="col-lg-6 padding-10">
                                <div class="form-group">
                                    <label>Catatan</label>
                                    <span class="help"></span>
                                    <textarea class="form-control" name="catatan"></textarea>
                                </div>
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
                        <table class="table table-hover demo-table-search table-responsive-block" id="tableWithSearch">
                            <thead>
                            <tr>
                                {{-- <th style="width:1%" class="text-center sorting_disabled" rowspan="1" colspan="1" aria-label="">
                                    <button class="btn btn-link"><i class="pg-trash"></i></button>
                                </th> --}}
                                <th>Nama Produk</th>
                                <th>Jumlah</th>
                                {{-- <th style="width: 1%;" class="text-center"> --}}
                                    {{-- <a href="#" id="addRow"><i class="fa fa-plus"></i></button></a> --}}
                                {{-- </th> --}}
                            </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="v-align-middle">
                                        <select class="full-width" data-init-plugin="select2" name="produk">
                                            @foreach ($produks as $produk)
                                                <option value="{{ $produk->id }}">{{ $produk->product_name }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td class="v-align-middle">
                                        <input type="text" class="form-control input-sm text-right" name="jumlah" placeholder="0">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection

@section('inpagejs')
@endsection

@section('myjsfile')
<!-- BEGIN PAGE LEVEL JS -->
<script src="{{ asset('assets/js/form_elements.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/scripts.js') }}" type="text/javascript"></script>
<!-- END PAGE LEVEL JS -->
@endsection
