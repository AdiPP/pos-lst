@extends('layouts.casual')

{{-- @section('title', $title) --}}

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
                                {{-- <h5>{{ $title }}</h5> --}}
                            </div>
                            <div class="ml-auto">
                                
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
                        Informasi Bisnis
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="card-block">
                    <div class="padding-10">
                        <form action="/pengaturan/perbaruiinfobisnis/aksi" method="POST">
                            @csrf
                            <div class="form-horizontal">
                                @php
                                    if (is_null($user->bisnis)) {
                                        $namaBisnis = null;
                                        $alamat = null;
                                        $telepon = null;
                                    } else {
                                        $namaBisnis = $user->bisnis->namaBisnis;
                                        $alamat = $user->bisnis->alamat;
                                        $telepon = $user->bisnis->telepon;
                                    }
                                @endphp
                                <div class="form-group row">
                                    <label for="fname" class="col-md-3 control-label">Nama Bisnis</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="namaBisnis" value="{{ $namaBisnis }}" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="fname" class="col-md-3 control-label">Provinsi</label>
                                    <div class="col-md-9">
                                        <select class="full-width" data-placeholder="Select Country" data-init-plugin="select2" onchange="pilihProvinsi()" name="provinsi" id="provinsi">
                                            @if (is_null($user->bisnis))
                                                <option value="0" selected disabled>Pilih Provinsi</option>
                                                @foreach ($provinsis as $provinsi)
                                                    <option value="{{ $provinsi->KODE_WILAYAH }}">{{ $provinsi->NAMA }}</option>
                                                @endforeach
                                            @else
                                                <option disabled>Pilih Provinsi</option>
                                                @foreach ($provinsis as $provinsi)
                                                    <option value="{{ $provinsi->KODE_WILAYAH }}" @if ($user->bisnis->provinsi == $provinsi->KODE_WILAYAH)
                                                        selected
                                                    @endif>{{ $provinsi->NAMA }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="fname" class="col-md-3 control-label">Kota</label>
                                    <div class="col-md-9" id="pilihankota">
                                        <select class="full-width" data-placeholder="Select Country" data-init-plugin="select2" name="kota" id="kota" disabled>
                                            <option selected disabled>Pilih Provinsi Terlebih Dahulu</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="fname" class="col-md-3 control-label">Alamat</label>
                                    <div class="col-md-9">
                                        <textarea name="alamat" class="form-control">{{ $alamat }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="fname" class="col-md-3 control-label">Nomor Telepon</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="telepon" value="{{ $telepon }}" required>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="submit" class="btn btn-primary pull-right btn-cons" value="Selesai"/>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- END card -->
        </div>
    </div>
</div>
@endsection

@section('inpagejs')
<script>
    $('document').ready(function(){
        if (document.getElementById("provinsi").options[document.getElementById("provinsi").selectedIndex].value != 0){
            pilihProvinsi();
        }
    })

    function pilihProvinsi(){
        var e = document.getElementById("provinsi");
        var idProvinsi = e.options[e.selectedIndex].value;

        $.ajax({
            url: '/pengaturan/perbaruiinfobisnis/pilihprovinsi',
            type: 'GET',
            data: {id: idProvinsi},
            success: function(response){
                $('#pilihankota').html(response);
            }
        })

        document.getElementById('kota').disabled = false;
    }
</script>
@endsection

@section('myjsfile')
<!-- BEGIN PAGE LEVEL JS -->
<script src="{{ asset('assets/js/form_layouts.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/form_elements.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/datatables.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/demo.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/scripts.js') }}" type="text/javascript"></script>
<!-- END PAGE LEVEL JS -->
@endsection