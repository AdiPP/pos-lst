@extends('layouts.casual')

{{-- @section('title', $title) --}}

@section('content')
<form action="/inventori/stokmasuk" method="POST" enctype="multipart/form-data">
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
                                        <option selected disabled>Pilih Outlet</option>
                                        @foreach ($outlets as $outlet)
                                            <option value="{{ $outlet->id }}" @if ($outlet->id == $stokmasuk->outlet_id)
                                                selected
                                            @endif>{{ $outlet->outlet_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3 padding-10">
                                <div class="form-group">
                                    <label>Tanggal</label>
                                    <span class="help"></span>
                                    <input type="text" class="form-control" name="tanggal" id="datepicker-component" value="{{ Helper::mysqlToTanggalVer2($stokmasuk->tanggal) }}">
                                </div>
                            </div>
                            <div class="col-lg-6 padding-10">
                                <div class="form-group">
                                    <label>Catatan</label>
                                    <span class="help"></span>
                                    <textarea class="form-control" name="catatan">{{ $stokmasuk->description }}</textarea>
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
                                <th>Nama Produk</th>
                                <th>Jumlah</th>
                                <th>Harga Beli Per Unit</th>
                                <th>Total Harga Beli</th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="v-align-middle">
                                        <input type="text" class="form-control" value="{{ $stokmasuk->infos[0]->produk->product_name }}" readonly>
                                    </td>
                                    <td class="v-align-middle">
                                        <input type="text" class="form-control input-sm text-right" value="{{ $stokmasuk->infos[0]->jumlah }}"  id="jumlah" name="jumlah" placeholder="0">
                                    </td>
                                    <td class="v-align-middle text-right">
                                        <input type="text" class="form-control input-sm text-right" value="{{ $stokmasuk->infos[0]->harga_beli_per_unit }}" id="harga" name="harga_beli" placeholder="0">
                                    </td>
                                    <td class="v-align-middle text-right">
                                        <input id="result" type="text" class="form-control input-sm text-right" placeholder="0" readonly>
                                        <input id="resultpost" type="hidden" class="form-control input-sm text-right" placeholder="0" name="total">
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
    <script type="text/javascript">
        $(document).ready(function(){
            var harga = document.getElementById('harga').value;
            var jumlah = document.getElementById('jumlah').value;   
            
            document.getElementById('result').value = harga * jumlah;
            document.getElementById('resultpost').value = harga * jumlah;
        })

        $('tbody').on('click', '.remove', function(){
            $(this).parent().parent().remove();
        });

        // total harga beli
        $(document).on('input', '#harga', function() {
            var harga = document.getElementById('harga').value;
            var jumlah = document.getElementById('jumlah').value;   
            
            document.getElementById('result').value = harga * jumlah;
            document.getElementById('resultpost').value = harga * jumlah;
        });
        $(document).on('input', '#jumlah', function() {
            var harga = document.getElementById('harga').value;
            var jumlah = document.getElementById('jumlah').value;
            document.getElementById('result').value = harga * jumlah;
            document.getElementById('resultpost').value = harga * jumlah;
        });
    
    </script>
@endsection

@section('myjsfile')
<!-- BEGIN PAGE LEVEL JS -->
<script src="{{ asset('assets/js/form_elements.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/scripts.js') }}" type="text/javascript"></script>
<!-- END PAGE LEVEL JS -->
@endsection