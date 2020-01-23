@extends('layouts.casual')

@section('title', $title)

@section('content')

@foreach ($suppliers as $supplier)
    <div class="modal fade slide-up disable-scroll" id="modalLihat{{ $supplier->id }}" tabindex="-1" role="dialog" aria-hidden="false">
        <div class="modal-dialog">
            <div class="modal-content-wrapper">
                <div class="modal-content">
                    <div class="modal-header clearfix text-left">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i>
                        </button>
                        <h5>Informasi <span class="semi-bold">Supplier</span></h5>
                        <p class="p-b-10">Berikut informasi mengenai Supplier <strong>{{ $supplier->nama }}</strong>.</p>
                    </div>
                    <div class="modal-body">
                        <div class="form-group-attached">
                            <div class="row">
                                <div class="col-md-12">
                                <div class="form-group form-group-default">
                                    <label>Nama Supplier</label>
                                    <input type="text" class="form-control" value="{{ $supplier->nama }}" readonly>
                                </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                <div class="form-group form-group-default">
                                    <label>Email</label>
                                    <input type="email" class="form-control" value="{{ $supplier->email }}" readonly>
                                </div>
                                </div>
                                <div class="col-md-6">
                                <div class="form-group form-group-default">
                                    <label>Telepon</label>
                                    <input type="text" class="form-control" value="{{ $supplier->telepon }}" readonly>
                                </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                <div class="form-group form-group-default">
                                    <label>Alamat</label>
                                    <textarea class="form-control" readonly>{{ $supplier->alamat }}</textarea>
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

    <div class="modal fade slide-up disable-scroll" id="modalUbah{{ $supplier->id }}" tabindex="-1" role="dialog" aria-hidden="false">
        <div class="modal-dialog">
            <div class="modal-content-wrapper">
                <div class="modal-content">
                    <div class="modal-header clearfix text-left">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i>
                        </button>
                        <h5>Perbarui <span class="semi-bold">Supplier</span></h5>
                        <p class="p-b-10">Silahkan mengisi form berikut, untuk memperbarui Supplier <strong>{{ $supplier->nama }}</strong>.</p>
                    </div>
                    <form action="/supplier/{{ $supplier->id }}" method="post">
                    @csrf
                        <div class="modal-body">
                            <input name="_method" type="hidden" value="PUT">
                            <div class="form-group-attached">
                                <div class="row">
                                    <div class="col-md-12">
                                    <div class="form-group form-group-default">
                                        <label class="required-symbol">Nama Supplier</label>
                                        <input type="text" class="form-control" name="nama" value="{{ $supplier->nama }}" required>
                                    </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                    <div class="form-group form-group-default">
                                        <label class="required-symbol">Email</label>
                                        <input type="email" class="form-control" name="email" value="{{ $supplier->email }}" required>
                                    </div>
                                    </div>
                                    <div class="col-md-6">
                                    <div class="form-group form-group-default">
                                        <label class="required-symbol">Telepon</label>
                                        <input type="text" class="form-control" name="telepon" value="{{ $supplier->telepon }}" required>
                                    </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                    <div class="form-group form-group-default">
                                        <label class="required-symbol">Alamat</label>
                                        <textarea name="alamat" class="form-control" required>{{ $supplier->alamat }}</textarea>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary btn-cons no-margin pull-left inline">Selesai</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <div class="modal fade slide-up disable-scroll" id="modalHapus{{ $supplier->id }}" tabindex="-1" role="dialog" aria-hidden="false">
        <div class="modal-dialog modal-sm">
            <div class="modal-content-wrapper">
                <div class="modal-content">
                    <div class="modal-header clearfix text-left">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i>
                        </button>
                        <h5>Perhatian</h5>
                    </div>
                    <div class="modal-body">
                        <p class="no-margin">Apakah anda yakin ingin menghapus Supplier <span class="bold">{{ $supplier->nama }}</span> dari sistem?</p>
                    </div>
                    <div class="modal-footer">
                        <form action="/supplier/{{ $supplier->id }}" method="POST">
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
    <div class="modal-dialog">
        <div class="modal-content-wrapper">
            <div class="modal-content">
                <div class="modal-header clearfix text-left">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i>
                    </button>
                    <h5>Tambah <span class="semi-bold">Supplier</span></h5>
                    <p class="p-b-10">Silahkan mengisi form berikut, untuk menambah supplier.</p>
                </div>
                <div class="modal-body">
                    <form action="/supplier" method="post">
                        @csrf
                        <div class="form-group-attached">
                            <div class="row">
                                <div class="col-md-12">
                                <div class="form-group form-group-default">
                                    <label class="required-symbol">Nama Supplier</label>
                                    <input type="text" class="form-control" name="nama" required>
                                </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                <div class="form-group form-group-default">
                                    <label class="required-symbol">Email</label>
                                    <input type="email" class="form-control" name="email" required>
                                </div>
                                </div>
                                <div class="col-md-6">
                                <div class="form-group form-group-default">
                                    <label class="required-symbol">Telepon</label>
                                    <input type="text" class="form-control" name="telepon" required>
                                </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                <div class="form-group form-group-default">
                                    <label class="required-symbol">Alamat</label>
                                    <textarea name="alamat" class="form-control" required></textarea>
                                </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4 m-t-10 sm-m-t-10">
                            <button type="submit" class="btn btn-primary btn-block m-t-5">Selesai</button>
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
                                {{-- <a href="/supplier/create" class="btn btn-primary btn-cons">Tambah Supplier</a> --}}
                                <button class="btn btn-primary btn-cons" data-target="#modalTambah" data-toggle="modal" id="">Tambah Supplier</button>
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
                        Daftar Supplier
                    </div>
                    <div class="padding-10">
                        <div class="row">
                        <div class="col-lg-12">
                            <input type="text" id="search-table" class="form-control pull-right" placeholder="Cari Supplier">
                        </div>
                    </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="card-block">
                    <table class="table table-hover demo-table-search table-responsive-block" id="tableWithSearch">
                    <thead>
                      <tr>
                        <th class="">Nama Supplier</th>
                        <th class="">Alamat</th>
                        <th class="">Telepon</th>
                        <th class="">Email</th>
                        <th class="invisible" style="width: 1%;"></th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($suppliers as $supplier)
                            <tr>
                                <td class="v-align-middle">
                                    {{ $supplier->nama }}
                                </td>
                                <td class="v-align-middle">
                                    {{ $supplier->alamat }}
                                </td>
                                <td class="v-align-middle">
                                    {{ $supplier->telepon }}
                                </td>
                                <td class="v-align-middle">
                                    {{ $supplier->email }}
                                </td>
                                <td class="v-align-middle">
                                    <div class="d-flex justify-content-center">
                                        <button class="btn btn-xs btn-complete mx-1" data-target="#modalLihat{{ $supplier->id }}" data-toggle="modal" id=""><i class="fa fa-eye"></i></button>
                                        <button class="btn btn-xs btn-primary mx-1" data-target="#modalUbah{{ $supplier->id }}" data-toggle="modal" id=""><i class="fa fa-pencil"></i></button>
                                        <button class="btn btn-xs btn-danger mx-1" data-target="#modalHapus{{ $supplier->id }}" data-toggle="modal" id=""><i class="fa fa-trash"></i></button>
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
<script src="{{ asset('assets/js/form_elements.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/demo.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/datatables.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/scripts.js') }}" type="text/javascript"></script>
<!-- END PAGE LEVEL JS -->
@endsection