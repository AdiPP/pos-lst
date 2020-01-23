@extends('layouts.casual')

@section('title', $title)

@section('content')
@foreach ($models as $model)
<div class="modal fade slide-up disable-scroll" id="modalEdit{{ $model->id }}" tabindex="-1" role="dialog"
    aria-hidden="false">
    <div class="modal-dialog ">
        <div class="modal-content-wrapper">
            <div class="modal-content">
                <div class="modal-header clearfix text-left">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i
                            class="pg-close fs-14"></i>
                    </button>
                    <h5>Informasi <span class="semi-bold">Produk</span></h5>
                    <p class="p-b-10">Berikut informasi mengenai Kategori <strong>{{ $model->category_name }}</strong>.</p>
                </div>
                <form role="form" action="/produk/kategori/{{ $model->id }}" method="POST">
                    <div class="modal-body">
                            @csrf
                            <input name="_method" type="hidden" value="PUT">
                            <div class="form-group-attached">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group form-group-default required">
                                            <label>Nama Kategori</label>
                                            <input type="text" class="form-control" name="nama_kategori"
                                                value="{{ $model->category_name }}" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group form-group-default">
                                            <label>Deskripsi Kategori</label>
                                            <textarea class="form-control" id="name"
                                                placeholder="Optional"
                                                name="deskripsi_kategori">{{ $model->category_description }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-cons inline pull-left" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary btn-cons inline pull-left">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
</div>
<div class="modal fade slide-up disable-scroll" id="modalDelete{{ $model->id }}" tabindex="-1" role="dialog"
    aria-hidden="false">
    <div class="modal-dialog modal-sm">
        <div class="modal-content-wrapper">
            <div class="modal-content">
                <div class="modal-header clearfix text-left">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i
                            class="pg-close fs-14"></i>
                    </button>
                    <h5>Perhatian</h5>
                </div>
                <div class="modal-body">
                    <p class="no-margin">Apakah anda yakin ingin menghapus Kategori <span
                            class="bold">{{ $model->category_name }}</span> dari sistem?</p>
                </div>
                <div class="modal-footer">
                    <form action="/produk/kategori/{{ $model->id }}" method="POST">
                        @csrf
                        <input name="_method" type="hidden" value="DELETE">
                        <button type="submit" class="btn btn-primary btn-cons pull-left inline">Iya</button>
                    </form>
                    <button type="button" class="btn btn-default btn-cons no-margin pull-left inline"
                        data-dismiss="modal">Tidak</button>
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
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i
                            class="pg-close fs-14"></i>
                    </button>
                    <h5>Tambah <span class="semi-bold">Kategori</span></h5>
                    <p class="p-b-10">Silahkan mengisi form berikut, untuk menambah kategori.</p>
                </div>
                <form role="form" action="/produk/kategori" method="POST">
                    <div class="modal-body">
                        @csrf
                        <div class="form-group-attached">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group form-group-default required">
                                        <label>Nama Kategori</label>
                                        <input type="text" class="form-control" name="nama_kategori" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group form-group-default">
                                        <label>Deskripsi Kategori</label>
                                        <textarea class="form-control" id="name" name="deskripsi_kategori"
                                            placeholder="Optional"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-cons inline pull-left" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary btn-cons inline pull-left">Simpan</button>
                    </div>
                </form>
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
                                    <button data-target="#modalTambah" data-toggle="modal"
                                        class="btn btn-primary btn-cons">Tambah Kategori</button>
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
            @if (session('status'))
            <div class="alert alert-success" role="alert">
                <button class="close" data-dismiss="alert"></button>
                {!! session('status') !!}
            </div>
            @endif
            <div class="card card-default">
                <div class="card-header">
                    <div class="card-title">
                        Daftar Kategori Produk
                    </div>
                    <div class="padding-10">
                        <div class="row">
                            <div class="col-lg-12">
                                <input type="text" id="search-table" class="form-control pull-right"
                                    placeholder="Cari Kategori">
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="card-block">
                    <table class="table table-hover demo-table-search table-responsive-block" id="tableWithSearch">
                        <thead>
                            <tr>
                                <th class="w-25">Nama Kategori</th>
                                <th class="w-50">Deskripsi</th>
                                <th class="text-right w-25">Jumlah</th>
                                <th class="invisible" style="width: 1%;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($models as $model)
                            <tr>
                                <td class="v-align-middle semi-bold">
                                    {{ $model->category_name }}
                                </td>
                                <td class="v-align-middle semi-bold">
                                    {!! Helper::cekNull($model->category_description) !!}
                                </td>
                                <td class="v-align-middle text-right">
                                    {{ $model->produk_count }}
                                </td>
                                <td class="v-align-middle">
                                    <div class="d-flex justify-content-center">
                                        <button class="btn btn-xs btn-success mx-1"
                                            data-target="#modalEdit{{ $model->id }}" data-toggle="modal" id=""><i
                                                class="fa fa-pencil"></i></button>
                                        <button class="btn btn-xs btn-danger mx-1"
                                            data-target="#modalDelete{{ $model->id }}" data-toggle="modal" id=""><i
                                                class="fa fa-trash-o"></i></button>
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