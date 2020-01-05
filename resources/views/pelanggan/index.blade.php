@extends('layouts.casual')

@section('title', $title)

@section('content')
<!-- Modal -->
@foreach ($models as $model)
    <div class="modal fade slide-up disable-scroll" id="modalView{{ $model->id }}" tabindex="-1" role="dialog" aria-hidden="false">
        <div class="modal-dialog modal-lg">
            <div class="modal-content-wrapper">
                    <div class="modal-content">
                    <div class="modal-header clearfix text-left">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i>
                    </button>
                    <h5>Informasi <span class="semi-bold">Pelanggan</span></h5>
                    <p class="p-b-10">Berikut informasi mengenai Pelanggan <strong>{{ $model->nama }}</strong></p>
                    </div>
                    <div class="modal-body">
                    <form role="form">
                        @csrf
                        <div class="form-group-attached">
                        <div class="row">
                            <div class="col-md-12">
                            <div class="form-group form-group-default">
                                <label>Nama</label>
                                <p>{{ $model->nama }}</p>
                            </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>Telepon</label>
                                <p>{{ $model->telepon }}</p>
                            </div>
                            </div>
                            <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>Email</label>
                                <p>{{ $model->email }}</p>
                            </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>Jenis Kelamin</label>
                                <input type="text" class="form-control" name="jnsKelamin" readonly>
                            </div>
                            </div>
                            <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>Tanggal Lahir</label>
                                <input type="text" class="form-control" name="tglLahir" readonly>
                            </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                            <div class="form-group form-group-default">
                                <label>Alamat</label>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione consectetur maiores quia dolorum possimus, harum doloribus dolor reiciendis eum! Fugiat, aliquam consectetur facilis ab velit cumque quaerat autem optio saepe!</p>
                            </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>Kota</label>
                                <input type="text" class="form-control" id="phone" name="telepon" readonly>
                            </div>
                            </div>
                            <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>Kode pos</label>
                                <input type="text" class="form-control" name="kota" readonly>
                            </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                            <div class="form-group form-group-default">
                                <label>Catatan</label>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione consectetur maiores quia dolorum possimus, harum doloribus dolor reiciendis eum! Fugiat, aliquam consectetur facilis ab velit cumque quaerat autem optio saepe!</p>
                            </div>
                            </div>
                        </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                            </div>
                            <div class="col-md-4 m-t-10 sm-m-t-10">
                            <button type="button" class="btn btn-primary btn-block m-t-5" data-dismiss="modal">Selesai</button>
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
    <div class="modal fade slide-up disable-scroll" id="modalDelete{{ $model->id }}" tabindex="-1" role="dialog" aria-hidden="false">
        <div class="modal-dialog modal-sm">
            <div class="modal-content-wrapper">
                <div class="modal-content">
                <div class="modal-header clearfix text-left">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i>
                    </button>
                    <h5>Perhatian</h5>
                </div>
                <div class="modal-body">
                    <p class="no-margin">Apakah anda yakin ingin menghapus Customer <span class="bold">{{ $model->nama }}</span> dari sistem?</p>
                </div>
                <div class="modal-footer">
                    <form action="/pelanggan/{{ $model->id }}" method="POST">
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
                                <a href="pelanggan/create" class="btn btn-primary btn-cons">Tambah Pelanggan</a>
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
                    <div class="padding-10">
                        <div class="row">
                        <div class="col-lg-12">
                            <label for="">Cari</label>
                            <input type="text" id="search-table" class="form-control pull-right" placeholder="Search">
                        </div>
                    </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="card-block">
                    <table class="table table-hover demo-table-search table-responsive-block" id="tableWithSearch">
                    <thead>
                      <tr>
                        <th class="w-50">Nama</th>
                        <th>Telepon</th>
                        <th>Email</th>
                        <th class="invisible" style="width: 1%;">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($models as $model)
                            <tr>
                              <td class="v-align-middle semi-bold">
                                    {{ $model->nama }}
                              </td>
                              <td class="v-align-middle">
                                    {{ $model->telepon }}
                              </td>
                              <td class="v-align-middle">
                                    {{ $model->email }}
                              </td>
                              <td class="v-align-middle">
                                <div class="d-flex justify-content-center">
                                    <a href="/pelanggan/{{ $model->id }}" class="btn btn-xs btn-complete mx-1"><i class="fa fa-eye"></i></a>
                                    <a href="/pelanggan/{{ $model->id }}/edit" class="btn btn-xs btn-success mx-1"><i class="fa fa-pencil"></i></a>
                                    {{-- <button class="btn btn-xs btn-danger mx-1" data-target="#modalDelete{{ $model->id }}" data-toggle="modal" id=""><i class="fa fa-trash-o"></i></button> --}}
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
