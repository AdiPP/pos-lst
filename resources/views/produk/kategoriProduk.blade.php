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
                                {{-- <a href="#" class="btn btn-primary btn-cons">Kategori</a> --}}
                                <a href="{{ url('/produk/kategori/create') }}" class="btn btn-primary btn-cons">Tambah Kategori</a>
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
                        <th class="w-50">Nama Kategori</th>
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
                            <td class="v-align-middle text-right">
                              24
                            </td>
                            <td class="v-align-middle">
                                <div class="d-flex justify-content-center">
                                    <a   href="/produk/kategori/{{ $model->id }}/edit" class="btn btn-xs btn-success mx-1"><i class="fa fa-pencil"></i></a>
                                    <form action="/produk/kategori/{{ $model->id }}" method="POST">
                                        @csrf
                                        <input name="_method" type="hidden" value="DELETE">
                                        <button type="submit" class="btn btn-xs btn-danger mx-1"><i class="fa fa-trash-o"></i></button>
                                    </form>
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