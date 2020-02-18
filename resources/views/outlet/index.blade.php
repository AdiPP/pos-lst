@extends('layouts.casual')

@section('title', $title)

@section('content')
<!-- Modal -->
@foreach ($outlets as $outlet)
    <div class="modal fade slide-up disable-scroll" id="modalView{{ $outlet->id }}" tabindex="-1" role="dialog" aria-hidden="false">
        <div class="modal-dialog">
            <div class="modal-content-wrapper">
                    <div class="modal-content">
                    <div class="modal-header clearfix text-left">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i>
                    </button>
                    <h5>Informasi <span class="semi-bold">Outlet</span></h5>
                    <p class="p-b-10">Berikut informasi mengenai Outlet <strong>{{ $outlet->outlet_name }}</strong>.</p>
                    </div>
                    <div class="modal-body">
                        <div class="form-group-attached">
                        <div class="row">
                            <div class="col-md-12">
                            <div class="form-group form-group-default">
                                <label>Nama Outlet</label>
                                <input type="text" class="form-control" name="nama" value="{{ $outlet->outlet_name }}" readonly>
                            </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                            <div class="form-group form-group-default">
                                <label>Nomor Telepon</label>
                                <input type="text" class="form-control" id="phone" name="telepon" value="{{ $outlet->outlet_phone }}" readonly>
                            </div>
                            </div>
                            <div class="col-md-4">
                            <div class="form-group form-group-default">
                                <label>Kota</label>
                                <input type="text" class="form-control" name="kota" value="{{ $outlet->outlet_address }}" readonly>
                            </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                            <div class="form-group form-group-default">
                                <label>Alamat</label>
                                <textarea class="form-control" name="alamat" readonly>{{ $outlet->outlet_address }}</textarea>
                            </div>
                            </div>
                        </div>
                        </div>
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

    <div class="modal fade slide-up disable-scroll" id="modalEdit{{ $outlet->id }}" tabindex="-1" role="dialog" aria-hidden="false">
        <div class="modal-dialog">
            <div class="modal-content-wrapper">
                <div class="modal-content">
                    <div class="modal-header clearfix text-left">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i>
                        </button>
                        <h5>Perbarui <span class="semi-bold">Outlet</span></h5>
                        <p class="p-b-10">Silahkan mengisi form berikut, untuk memperbarui Outlet <strong>{{ $outlet->outlet_name }}</strong>.</p>
                    </div>
                    <form role="form" action="/outlet/{{ $outlet->id }}" method="POST">
                        <div class="modal-body">
                            @csrf
                            <input name="_method" type="hidden" value="PUT">
                            <div class="form-group-attached">
                            <div class="row">
                                <div class="col-md-12">
                                <div class="form-group form-group-default">
                                    <label class="required-symbol">Nama Outlet</label>
                                    <input type="text" class="form-control" name="nama" value="{{ $outlet->outlet_name }}" required>
                                </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                <div class="form-group form-group-default">
                                    <label class="required-symbol">Nomor Telepon</label>
                                    <input type="text" class="form-control" id="phoneEdit" name="telepon" value="{{ $outlet->outlet_phone }}" required>
                                </div>
                                </div>
                                <div class="col-md-4">
                                <div class="form-group form-group-default">
                                    <label class="required-symbol">Kota</label>
                                    <input type="text" class="form-control" name="kota" value="{{ $outlet->outlet_city }}" required>
                                </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                <div class="form-group form-group-default">
                                    <label class="required-symbol">Alamat</label>
                                    <textarea class="form-control" id="name" placeholder="" name="alamat" required>{{ $outlet->outlet_address }}</textarea>
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default btn-cons pull-left inline" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary btn-cons pull-left inline" >Selesai</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <div class="modal fade slide-up disable-scroll" id="modalDelete{{ $outlet->id }}" tabindex="-1" role="dialog" aria-hidden="false">
        <div class="modal-dialog modal-sm">
            <div class="modal-content-wrapper">
                <div class="modal-content">
                <div class="modal-header clearfix text-left">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i>
                    </button>
                    <h5>Perhatian</h5>
                </div>
                <div class="modal-body">
                    <p class="no-margin">Apakah anda yakin ingin menghapus Outlet <span class="bold">{{ $outlet->outlet_name }}</span> dari sistem?</p>
                </div>
                <div class="modal-footer">
                    <form action="/outlet/{{ $outlet->id }}" method="POST">
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
            <h5>Tambah <span class="semi-bold">Outlet</span></h5>
            <p class="p-b-10">Silahkan mengisi form berikut, untuk menambah outlet.</p>
            </div>
            <div class="modal-body">
            <form role="form" action="/outlet" method="POST">
                @csrf
                <div class="form-group-attached">
                <div class="row">
                    <div class="col-md-12">
                    <div class="form-group form-group-default">
                        <label class="required-symbol">Nama Outlet</label>
                        <input type="text" class="form-control" name="nama" required>
                    </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8">
                    <div class="form-group form-group-default">
                        <label class="required-symbol">Nomor Telepon</label>
                        <input type="text" class="form-control" name="telepon" id="phoneTambah" required>
                    </div>
                    </div>
                    <div class="col-md-4">
                    <div class="form-group form-group-default">
                        <label class="required-symbol">Kota</label>
                        <input type="text" class="form-control" name="kota" required>
                    </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                    <div class="form-group form-group-default">
                        <label class="required-symbol">Alamat</label>
                        <textarea class="form-control" id="name" placeholder="" name="alamat" required></textarea>
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
                                <button data-target="#modalTambah" data-toggle="modal" class="btn btn-primary btn-cons">Tambah Outlet</button>
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
                        Daftar Outlet
                    </div>
                    <div class="padding-10">
                        <div class="row">
                        <div class="col-lg-12">
                            <input type="text" id="search-table" class="form-control pull-right" placeholder="Cari Outlet">
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
                        <th class="w-50">Nama Outlet</th>
                        <th>Kota</th>
                        <th>Telepon</th>
                        <th class="invisible" style="width: 1%;">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($outlets as $outlet)
                            <tr>
                              <td class="v-align-middle semi-bold">
                                    {{ $outlet->outlet_name }}
                              </td>
                              <td class="v-align-middle">
                                    {{ $outlet->outlet_city }}
                              </td>
                              <td class="v-align-middle semi-bold">
                                    {{ $outlet->outlet_phone }}
                              </td>
                              <td class="v-align-middle">
                                <div class="d-flex justify-content-center">
                                    <button class="btn btn-xs btn-complete mx-1" data-target="#modalView{{  $outlet->id }}" data-toggle="modal" id=""><i class="fa fa-eye"></i></button>
                                    <button class="btn btn-xs btn-success mx-1" data-target="#modalEdit{{  $outlet->id }}" data-toggle="modal" id=""><i class="fa fa-pencil"></i></button>
                                    <button class="btn btn-xs btn-danger mx-1" data-target="#modalDelete{{  $outlet->id }}" data-toggle="modal" id=""><i class="fa fa-trash-o"></i></button>
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
