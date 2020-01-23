@extends('layouts.casual')

@section('title', $title)

@section('content')
<style>
.select2-container{
    z-index:100000;
}
</style>
<!-- Modal -->
@foreach ($pegawais as $pegawai)
    <div class="modal fade slide-up disable-scroll" id="modalView{{ $pegawai->id }}" tabindex="-1" role="dialog" aria-hidden="false">
        <div class="modal-dialog">
            <div class="modal-content-wrapper">
                    <div class="modal-content">
                    <div class="modal-header clearfix text-left">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i>
                    </button>
                    <h5>Informasi <span class="semi-bold">Pegawai</span></h5>
                    <p class="p-b-10">Berikut informasi mengenai Pegawai <strong>{{ $pegawai->nama_depan }}</strong>.</p>
                    </div>
                    <div class="modal-body">
                    <form role="form">
                        @csrf
                        <div class="form-group-attached">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group form-group-default required">
                                        <label>Nama Depan</label>
                                        <input type="text" class="form-control" name="namaDepan" placeholder="Adi" value="{{ $pegawai->nama_depan }}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-group-default required">
                                        <label>Nama Belakang</label>
                                        <input type="text" class="form-control" name="namaBelakang" placeholder="Permana Putra" value="{{ $pegawai->nama_belakang }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group form-group-default required">
                                        <label>Username</label>
                                        <input type="text" class="form-control" name="username" placeholder="Username User" value="{{ $pegawai->username }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group form-group-default required">
                                        <label>Password</label>
                                        <input type="password" class="form-control" name="password" placeholder="Password User" value="{{ $pegawai->password }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group form-group-default required">
                                        <label>Outlet</label>
                                        <input type="text" class="form-control" name="password" placeholder="Password User" value="{{ $pegawai->outlet->outlet_name }}" readonly>
                                      </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary btn-cons no-margin pull-left inline" data-dismiss="modal">Selesai</button>
                    </div>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <div class="modal fade slide-up disable-scroll" id="modalEdit{{ $pegawai->id }}" tabindex="-1" role="dialog" aria-hidden="false">
        <div class="modal-dialog">
            <div class="modal-content-wrapper">
                <div class="modal-content">
                    <div class="modal-header clearfix text-left">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i>
                    </button>
                    <h5>Perbarui <span class="semi-bold">Pegawai</span></h5>
                    <p class="p-b-10">Silahkan mengisi form berikut, untuk menambah Pegawai <strong>{{ $pegawai->nama_depan }}</strong>.</p>
                    </div>
                    <form role="form" action="/pegawai/{{ $pegawai->id }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <input name="_method" type="hidden" value="PUT">
                            <div class="form-group-attached">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group form-group-default">
                                            <label>Nama Depan</label>
                                            <input type="text" class="form-control" name="namaDepan" placeholder="Adi" value="{{ $pegawai->nama_depan }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-group-default">
                                            <label>Nama Belakang</label>
                                            <input type="text" class="form-control" name="namaBelakang" placeholder="Permana Putra" value="{{ $pegawai->nama_belakang }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group form-group-default">
                                            <label>Username</label>
                                            <input type="text" class="form-control" name="username" placeholder="Username User" value="{{ $pegawai->username }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group form-group-default">
                                            <label>Password</label>
                                            <input type="password" class="form-control" name="password" placeholder="Password User" value="{{ $pegawai->password }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group form-group-default required">
                                            <label>Outlet</label>
                                            <select class="full-width" data-init-plugin="select2" name="outlet" required>
                                                <option value="" disabled selected>Pilih Outlet</option>
                                                @foreach ($outlets as $outlet)
                                                    <option value="{{ $outlet->id }}" @if ($outlet->id == $pegawai->outlet_id)
                                                        selected
                                                    @endif>{{ $outlet->outlet_name }}</option>
                                                @endforeach
                                            </select>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary btn-cons no-margin pull-left inline">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <div class="modal fade slide-up disable-scroll" id="modalDelete{{ $pegawai->id }}" tabindex="-1" role="dialog" aria-hidden="false">
        <div class="modal-dialog modal-sm">
            <div class="modal-content-wrapper">
                <div class="modal-content">
                <div class="modal-header clearfix text-left">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i>
                    </button>
                    <h5>Perhatian</h5>
                </div>
                <div class="modal-body">
                    <p class="no-margin">Apakah anda yakin ingin menghapus Peagwai <span class="bold">{{ $pegawai->nama_depan }}</span> dari sistem?</p>
                </div>
                <div class="modal-footer">
                    <form action="/pegawai/{{ $pegawai->id }}" method="POST">
                        @csrf
                        <input name="_method" type="hidden" value="DELETE">
                        <button type="submit" class="btn btn-primary btn-cons  pull-left inline">Iya</button>
                    </form>
                    <button type="button" class="btn btn-default btn-cons no-margin pull-left inline" data-dismiss="modal">Tidak</button>
                </div>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
@endforeach

<div class="modal fade slide-up disable-scroll" id="modalTambah" tabindex="-1" role="dialog" aria-hidden="false">
    <div class="modal-dialog ">
        <div class="modal-content-wrapper">
        <div class="modal-content">
            <div class="modal-header clearfix text-left">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i>
            </button>
            <h5>Tambah <span class="semi-bold">Pegawai</span></h5>
            <p class="p-b-10">Silahkan mengisi form berikut, untuk menambah pegawai.</p>
            </div>
            <div class="modal-body">
                <form role="form" action="/pegawai" method="POST">
                    @csrf
                    <div class="form-group-attached">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group form-group-default required">
                                    <label>Nama Depan</label>
                                    <input type="text" class="form-control" name="namaDepan" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-group-default required">
                                    <label>Nama Belakang</label>
                                    <input type="text" class="form-control" name="namaBelakang" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group form-group-default required">
                                    <label>Username</label>
                                    <input type="text" class="form-control" name="username" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group form-group-default required">
                                    <label>Password</label>
                                    <input type="password" class="form-control" name="password" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group form-group-default required">
                                    <label>Outlet</label>
                                    <select class="full-width" data-init-plugin="select2" name="outlet" required>
                                        <option value="" disabled selected>Pilih Outlet</option>
                                        @foreach ($outlets as $outlet)
                                            <option value="{{ $outlet->id }}">{{ $outlet->outlet_name }}</option>
                                        @endforeach
                                    </select>
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
                                <button data-target="#modalTambah" data-toggle="modal" class="btn btn-primary btn-cons">Tambah Pegawai</button>
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
                        Daftar Pegawai
                    </div>
                    <div class="padding-10">
                        <div class="row">
                        <div class="col-lg-12">
                            <input type="text" id="search-table" class="form-control pull-right" placeholder="Cari Pegawai">
                        </div>
                    </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="card-block">
                    <table class="table table-hover demo-table-search table-responsive-block" id="tableWithSearch">
                    <thead>
                      <tr>
                        {{-- <th style="width:1%" class="text-center sorting_disabled" rowspan="1" colspan="1" aria-label="">
                            <button class="btn btn-link"><i class="pg-trash"></i></button>
                        </th> --}}
                        <th class="w-50">Nama</th>
                        <th class="w-50">Outlet</th>
                        <th class="invisible" style="width: 1%;">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($pegawais as $pegawai)
                            <tr>
                                <td class="v-align-middle semi-bold">
                                    {{ $pegawai->nama_depan }} {{ $pegawai->nama_belakang }}
                                </td>
                                <td class="v-align-middle">
                                    {{ $pegawai->outlet->outlet_name }}
                                </td>
                                <td class="v-align-middle">
                                <div class="d-flex justify-content-center">
                                    <button class="btn btn-xs btn-complete mx-1" data-target="#modalView{{ $pegawai->id }}" data-toggle="modal" id=""><i class="fa fa-eye"></i></button>
                                    <button class="btn btn-xs btn-success mx-1" data-target="#modalEdit{{ $pegawai->id }}" data-toggle="modal" id=""><i class="fa fa-pencil"></i></button>
                                    <button class="btn btn-xs btn-danger mx-1" data-target="#modalDelete{{ $pegawai->id }}" data-toggle="modal" id=""><i class="fa fa-trash-o"></i></button>
                                </div>
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

@section('myjsfile')
<!-- BEGIN PAGE LEVEL JS -->
<script src="{{ asset('assets/js/demo.js') }}" type="text/javascript"></script>
<script src=" {{ asset('assets/js/form_elements.js') }} "></script>
<script src="{{ asset('assets/js/datatables.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/scripts.js') }}" type="text/javascript"></script>
<!-- END PAGE LEVEL JS -->
@endsection
