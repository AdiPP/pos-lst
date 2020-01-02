@extends('layouts.casual')

@section('title', $title)

@section('content')
<!-- Modal -->
<div id="modals">
    
</div>

{{-- Satuan Tambah --}}
<div class="modal fade slide-up disable-scroll" id="satuanTambah" tabindex="-1" role="dialog" aria-hidden="false">
<div class="modal-dialog ">
    <div class="modal-content-wrapper">
    <div class="modal-content">
        <div class="modal-header clearfix text-left">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i>
        </button>
        <h5>Tambah <span class="semi-bold">Jenis Satuan</span></h5>
        <p class="p-b-10">Silahkan mengisi form berikut, untuk menambah satuan</p>
        </div>
        <div class="modal-body">
        <form role="form" id="formSatuan">
            @csrf
            <div class="form-group-attached">
                <div class="row">
                    <div class="col-md-8">
                    <div class="form-group form-group-default">
                        <label>Nama Satuan</label>
                        <input type="text" class="form-control" name="nama">
                    </div>
                    </div>
                    <div class="col-md-4">
                    <div class="form-group form-group-default">
                        <label>Singkatan</label>
                        <input type="text" class="form-control" name="singkatan" id="phoneTambah">
                    </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                    <div class="form-group form-group-default">
                        <label>Deskripsi</label>
                        <textarea class="form-control" placeholder="Briefly Describe your Abilities" name="deskripsi"></textarea>
                    </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                </div>
                <div class="col-md-4 m-t-10 sm-m-t-10">
                <button type="submit" class="btn btn-primary btn-block m-t-5">Simpan</button>
                </div>
            </div>
        </form>
        </div>
    </div>
    </div>
    <!-- /.modal-content -->
</div>
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
        <div class="col-lg-6 m-b-10 d-flex flex-column">
        <!-- START card -->
            <div class="card card-default">
                <div class="card-header">
                    <div class="card-title">
                        Jenis Satuan
                    </div>
                    <div class="padding-10">
                        <div class="row">
                            <div class="col-lg-12">
                                <label for="">Cari Satuan</label>
                                <div class="row">
                                    <div class="col-lg-8">
                                        <input type="text" id="search-table" class="form-control pull-right">
                                    </div>
                                    <div class="col-lg-4 text-right">
                                        <button class="btn btn-primary btn-cons" data-target="#satuanTambah" data-toggle="modal">Tambah</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="card-block">
                    <div id="unitTampil">

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
                        Wilayah
                    </div>
                    <div class="padding-10">
                        <div class="row">
                        <div class="col-lg-12">
                            <label for="">Cari Wilayah</label>
                            <input type="text" id="search-table2" class="form-control pull-right">
                        </div>
                    </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="card-block">
                    <table class="table table-hover demo-table-search table-responsive-block" id="tableWithSearch2">
                        <thead>
                        <tr>
                            <th class="w-25">Kode</th>
                            <th class="w-75">Nama Kecamatan</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($wilayahs as $wilayah)
                                <tr>
                                    <td class="v-align-middle">
                                        {{ $wilayah->KODE_WILAYAH }}
                                    </td>
                                    <td class="v-align-middle">
                                        {{ $wilayah->NAMA }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
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
        
        unitTampil();
        modals();

        $(document).ready(function(){

            $('#formSatuan').submit(function(e){

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                var input = $('#formSatuan').serialize();

                $.ajax({
                    url: '/admin/master/unit/tambah',
                    type: 'POST',
                    data: input,
                    success: function(response) {
                        console.log(response);
                        unitTampil();
                    }
                })

                e.preventDefault();

                $('#satuanTambah').modal('hide');
                $("[data-dismiss=modal]").trigger({ type: "click" });
                modals();
                $('.modal-backdrop').remove();

            })

        })

        function unitTampil() {
            $.ajax({
                url: '/admin/master/unit/tampil',
                type: 'GET',
                success: function(response)
                {
                    $('#unitTampil').html(response);
                }
            })
        }

        function hapusSatuan(idSatuan) {
            $.ajax({
                url: '/admin/master/unit/hapus',
                type: 'GET',
                data: {id: idSatuan},
                success: function(response) {
                    $("[data-dismiss=modal]").trigger({ type: "click" });
                    console.log(response);
                    unitTampil();
                    modals();
                    $('.modal-backdrop').remove();
                }
            })
        }

        function modals() {
            $.ajax({
                url: '/admin/master/modals',
                type: 'GET',
                success: function(response)
                {
                    $('#modals').html(response);
                }
            })
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
