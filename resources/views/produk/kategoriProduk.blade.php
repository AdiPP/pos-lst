@extends('layouts.casual')

@section('title', $title)

@section('content')
@foreach ($models as $model)
    <div class="modal fade slide-up disable-scroll" id="modalEdit{{ $model->id }}" tabindex="-1" role="dialog" aria-hidden="false">
        <div class="modal-dialog ">
            <div class="modal-content-wrapper">
            <div class="modal-content">
                <div class="modal-header clearfix text-left">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i>
                </button>
                <h5>Tambah <span class="semi-bold">Kategori</span></h5>
                <p class="p-b-10">Silahkan mengisi form berikut, untuk menambah kategori</p>
                </div>
                <div class="modal-body">
                <form role="form" action="/produk/kategori/{{ $model->id }}" method="POST">
                    @csrf
                    <input name="_method" type="hidden" value="PUT">
                    <div class="form-group-attached">
                    <div class="row">
                        <div class="col-md-12">
                        <div class="form-group form-group-default">
                            <label>Nama Kategori</label>
                            <input type="text" class="form-control" name="nama_kategori" value="{{ $model->category_name }}">
                        </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                        <div class="form-group form-group-default">
                            <label>Deskripsi Kategori</label>
                            <textarea class="form-control" id="name" placeholder="Briefly Describe your Abilities" name="deskripsi_kategori">{{ $model->category_description }}</textarea>
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
                    <p class="no-margin">Apakah anda yakin ingin menghapus Kategori <span class="bold">{{ $model->category_name }}</span> dari sistem?</p>
                </div>
                <div class="modal-footer">
                    <form action="/produk/kategori/{{ $model->id }}" method="POST">
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
            <h5>Tambah <span class="semi-bold">Kategori</span></h5>
            <p class="p-b-10">Silahkan mengisi form berikut, untuk menambah kategori</p>
            </div>
            <div class="modal-body">
            <form role="form" action="/produk/kategori/" method="POST">
                @csrf
                <div class="form-group-attached">
                <div class="row">
                    <div class="col-md-12">
                    <div class="form-group form-group-default">
                        <label>Nama Kategori</label>
                        <input type="text" class="form-control" name="nama_kategori">
                    </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                    <div class="form-group form-group-default">
                        <label>Deskripsi Kategori</label>
                        <textarea class="form-control" id="name" placeholder="Briefly Describe your Abilities" name="deskripsi_kategori"></textarea>
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
                                {{-- <a href="{{ url('/produk/kategori/create') }}" class="btn btn-primary btn-cons">Tambah Kategori</a> --}}
                                <button data-target="#modalTambah" data-toggle="modal" class="btn btn-primary btn-cons">Tambah Kategori</button>
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
                        {{-- <th style="width:1%" class="text-center sorting_disabled" rowspan="1" colspan="1" aria-label="">
                            <button class="btn btn-link"><i class="pg-trash"></i></button>
                        </th> --}}
                        <th class="w-25">Nama Kategori</th>
                        <th class="w-50">Deskripsi Kategori</th>
                        <th class="text-right w-25">Jumlah Produk</th>
                        <th class="invisible" style="width: 1%;">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($models as $model)
                          <tr>
                            {{-- <td class="v-align-middle">
                                <div class="checkbox text-center">
                                    <input type="checkbox" value="3" id="checkbox4">
                                    <label for="checkbox4" class="no-padding no-margin"></label>
                                </div>
                            </td> --}}
                            <td class="v-align-middle semi-bold">
                              {{ $model->category_name }}
                            </td>
                            <td class="v-align-middle semi-bold">
                              {{ $model->category_description }}
                            </td>
                            <td class="v-align-middle text-right">
                              24
                            </td>
                            <td class="v-align-middle">
                                <div class="d-flex justify-content-center">
                                    <button class="btn btn-xs btn-success mx-1" data-target="#modalEdit{{ $model->id }}" data-toggle="modal" id=""><i class="fa fa-pencil"></i></button>
                                    <button class="btn btn-xs btn-danger mx-1" data-target="#modalDelete{{ $model->id }}" data-toggle="modal" id=""><i class="fa fa-trash-o"></i></button>
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
<script src="{{ asset('assets/js/datatables.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/scripts.js') }}" type="text/javascript"></script>
<!-- END PAGE LEVEL JS -->
@endsection