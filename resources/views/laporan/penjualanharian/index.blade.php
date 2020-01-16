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
                                <a href="{{ url()->previous() }}" class="btn btn-primary btn-cons">Kembali</a>
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
                        Laporan
                    </div>
                    <div class="padding-10">
                        <div class="row">
                            <div class="col-lg-6">
                                <label for="">Pilih Outlet</label>
                                <div class="form-group ">
                                    <select class="full-width" data-init-plugin="select2" onchange="pilihOutlet()" id="pilihOutlet">
                                        <option value="" selected>Semua Outlet</option>
                                        @foreach ($outlets as $outlet)
                                            <option value="{{ $outlet->id }}">{{ $outlet->outlet_name }}</option>
                                        @endforeach
                                        </optgroup>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <label for="">Pilih Tanggal</label>
                                <div class="form-group">
                                    {{-- <input type="text" class="form-control" name="tanggal" id="datepicker-component" autocomplete="off" onchange="pilihTanggal()" placeholder="Hari Ini"> --}}
                                    <div class="input-daterange input-group" id="datepicker-range">
                                        <input type="text" class="form-control" name="start" id="tanggalAwal" placeholder="Tanggal Awal"/>
                                        <div class="input-group-addon">to</div>
                                        <input type="text" class="form-control" name="end" id="tanggalAkhir" placeholder="Tanggal Akhir"/>
                                        <div class="m-l-10">
                                            <button class="btn btn-primary btn-sm" onclick="pilihTanggal()">Set</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="card-block" id="tampilLaporan">
                </div>
            </div>
            <!-- END card -->
        </div>
    </div>
</div>
<script>
    var tanggalAwal;
    var tanggalAkhir;

    $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        pilihOutlet();
    })

    function getTodayDate() {
        var today = new Date();
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
        var yyyy = today.getFullYear();

        tanggalAwal = dd + '/' + mm + '/' + yyyy;
        tanggalAkhir = tanggalAwal;
    }

    function pilihOutlet(){

        var e = document.getElementById("pilihOutlet");
        var selected = e.options[e.selectedIndex].value;
        
        if (tanggalAwal == null && tanggalAkhir == null) {
            getTodayDate();   
        }

        $.ajax({
            url: '/laporan/penjualanharian/tampil',
            type: 'GET',
            data: {outlet: selected, tanggalAwal: tanggalAwal, tanggalAkhir: tanggalAkhir },
            success: function(response)
            {
                // console.log(response);
                $('#tampilLaporan').html(response);
            }
        });
    }

    // function pilihTanggal(){
    //     tanggal = document.getElementById("datepicker-component").value;
    //     pilihOutlet();
    // }

    function pilihTanggal (){
        tanggalAwal = document.getElementById('tanggalAwal').value;
        tanggalAkhir = document.getElementById('tanggalAkhir').value;

        if (tanggalAwal == "" || tanggalAkhir == "" || tanggalAwal > tanggalAkhir) {
            alert('Tanggal belum di set dengan lengkap.');
        } else {
            pilihOutlet();
        }
    }
    
</script>
@endsection

@section('myjsfile')
<!-- BEGIN PAGE LEVEL JS -->
<script src="{{ asset('assets/js/demo.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/datatables.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/form_elements.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/scripts.js') }}" type="text/javascript"></script>
<!-- END PAGE LEVEL JS -->
@endsection
