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
        <div class="col-lg-12 m-b-10 d-flex flex-column">
        <!-- START card -->
            <div class="card card-default">
                <div class="card-header">
                    <div class="padding-10">
                        <div class="row">
                        <div class="col-lg-3">
                            <label for="">Lokasi</label>
                            <input type="text" id="search-table" class="form-control pull-right" placeholder="Search">
                        </div>
                        <div class="col-lg-3">
                            <label for="">Kategori</label>
                            <input type="text" id="search-table" class="form-control pull-right" placeholder="Search">
                        </div>
                        <div class="col-lg-3">
                            <label for="">Status Dijual</label>
                            <input type="text" id="search-table" class="form-control pull-right" placeholder="Search">
                        </div>
                        <div class="col-lg-3">
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
                        <th style="width:1%" class="text-center sorting_disabled" rowspan="1" colspan="1" aria-label="">
                            <button class="btn btn-link"><i class="pg-trash"></i></button>
                        </th>
                        <th>Nama Produk</th>
                        <th>Kategori</th>
                        <th>Harga</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td class="v-align-middle">
                            <div class="checkbox text-center">
                                <input type="checkbox" value="3" id="checkbox4">
                                <label for="checkbox4" class="no-padding no-margin"></label>
                            </div>
                        </td>
                        <td class="v-align-middle semi-bold">
                          <p>First Tour</p>
                        </td>
                        <td class="v-align-middle"><a href="#" class="btn btn-tag">United States</a><a href="#" class="btn btn-tag">India</a>
                          <a href="#" class="btn btn-tag">China</a><a href="#" class="btn btn-tag">Africa</a>
                        </td>
                        <td class="v-align-middle">
                          <p>it is more then ONE nation/nationality as its fall name is The United Kingdom of Great Britain and North Ireland..</p>
                        </td>
                        <td class="v-align-middle">
                          <p>Public</p>
                        </td>
                      </tr>
                      <tr>
                        <td class="v-align-middle">
                            <div class="checkbox text-center">
                                <input type="checkbox" value="3" id="checkbox4">
                                <label for="checkbox4" class="no-padding no-margin"></label>
                            </div>
                        </td>
                        <td class="v-align-middle semi-bold">
                          <p>Among the children</p>
                        </td>
                        <td class="v-align-middle"><a href="#" class="btn btn-tag">United States</a><a href="#" class="btn btn-tag">India</a>
                          <a href="#" class="btn btn-tag">China</a><a href="#" class="btn btn-tag">Africa</a>
                        </td>
                        <td class="v-align-middle">
                          <p>you want English, Scottish, Welsh, Irish, British, European or UK even a British (name other original country you came form or have roots to E.G. A British Japanese or a 5th generation
                          </p>
                        </td>
                        <td class="v-align-middle">
                          <p>Public</p>
                        </td>
                      </tr>
                      <tr>
                        <td class="v-align-middle">
                            <div class="checkbox text-center">
                                <input type="checkbox" value="3" id="checkbox4">
                                <label for="checkbox4" class="no-padding no-margin"></label>
                            </div>
                        </td>
                        <td class="v-align-middle semi-bold">
                          <p>A day to remember</p>
                        </td>
                        <td class="v-align-middle"><a href="#" class="btn btn-tag">United States</a><a href="#" class="btn btn-tag">India</a>
                          <a href="#" class="btn btn-tag">China</a><a href="#" class="btn btn-tag">Africa</a>
                        </td>
                        <td class="v-align-middle">
                          <p>UK was on top of the art world 18-19 century had the best food, best cloths and best entertainment back then) it was a hyper nation</p>
                        </td>
                        <td class="v-align-middle">
                          <p>Public</p>
                        </td>
                      </tr>
                      <tr>
                        <td class="v-align-middle">
                            <div class="checkbox text-center">
                                <input type="checkbox" value="3" id="checkbox4">
                                <label for="checkbox4" class="no-padding no-margin"></label>
                            </div>
                        </td>
                        <td class="v-align-middle semi-bold">
                          <p>Life’s sadness shared</p>
                        </td>
                        <td class="v-align-middle"><a href="#" class="btn btn-tag">United States</a><a href="#" class="btn btn-tag">India</a>
                          <a href="#" class="btn btn-tag">China</a><a href="#" class="btn btn-tag">Africa</a>
                        </td>
                        <td class="v-align-middle">
                          <p>he world speaks English. Common law, Magna Carta and the Bill of Rights are its wonderful legacy
                          </p>
                        </td>
                        <td class="v-align-middle">
                          <p>Public</p>
                        </td>
                      </tr>
                      <tr>
                        <td class="v-align-middle">
                            <div class="checkbox text-center">
                                <input type="checkbox" value="3" id="checkbox4">
                                <label for="checkbox4" class="no-padding no-margin"></label>
                            </div>
                        </td>
                        <td class="v-align-middle semi-bold">
                          <p>First Tour</p>
                        </td>
                        <td class="v-align-middle"><a href="#" class="btn btn-tag">United States</a><a href="#" class="btn btn-tag">India</a>
                          <a href="#" class="btn btn-tag">China</a><a href="#" class="btn btn-tag">Africa</a>
                        </td>
                        <td class="v-align-middle">
                          <p>it is more then ONE nation/nationality as its fall name is The United Kingdom of Great Britain and North Ireland..</p>
                        </td>
                        <td class="v-align-middle">
                          <p>Public</p>
                        </td>
                      </tr>
                      <tr>
                        <td class="v-align-middle">
                            <div class="checkbox text-center">
                                <input type="checkbox" value="3" id="checkbox4">
                                <label for="checkbox4" class="no-padding no-margin"></label>
                            </div>
                        </td>
                        <td class="v-align-middle semi-bold">
                          <p>First Tour</p>
                        </td>
                        <td class="v-align-middle"><a href="#" class="btn btn-tag">United States</a><a href="#" class="btn btn-tag">India</a>
                          <a href="#" class="btn btn-tag">China</a><a href="#" class="btn btn-tag">Africa</a>
                        </td>
                        <td class="v-align-middle">
                          <p>it is more then ONE nation/nationality as its fall name is The United Kingdom of Great Britain and North Ireland..</p>
                        </td>
                        <td class="v-align-middle">
                          <p>Public</p>
                        </td>
                      </tr>
                      <tr>
                        <td class="v-align-middle">
                            <div class="checkbox text-center">
                                <input type="checkbox" value="3" id="checkbox4">
                                <label for="checkbox4" class="no-padding no-margin"></label>
                            </div>
                        </td>
                        <td class="v-align-middle semi-bold">
                          <p>First Tour</p>
                        </td>
                        <td class="v-align-middle"><a href="#" class="btn btn-tag">United States</a><a href="#" class="btn btn-tag">India</a>
                          <a href="#" class="btn btn-tag">China</a><a href="#" class="btn btn-tag">Africa</a>
                        </td>
                        <td class="v-align-middle">
                          <p>it is more then ONE nation/nationality as its fall name is The United Kingdom of Great Britain and North Ireland..</p>
                        </td>
                        <td class="v-align-middle">
                          <p>Public</p>
                        </td>
                      </tr>
                      <tr>
                        <td class="v-align-middle">
                            <div class="checkbox text-center">
                                <input type="checkbox" value="3" id="checkbox4">
                                <label for="checkbox4" class="no-padding no-margin"></label>
                            </div>
                        </td>
                        <td class="v-align-middle semi-bold">
                          <p>First Tour</p>
                        </td>
                        <td class="v-align-middle"><a href="#" class="btn btn-tag">United States</a><a href="#" class="btn btn-tag">India</a>
                          <a href="#" class="btn btn-tag">China</a><a href="#" class="btn btn-tag">Africa</a>
                        </td>
                        <td class="v-align-middle">
                          <p>it is more then ONE nation/nationality as its fall name is The United Kingdom of Great Britain and North Ireland..</p>
                        </td>
                        <td class="v-align-middle">
                          <p>Public</p>
                        </td>
                      </tr>
                      <tr>
                        <td class="v-align-middle">
                            <div class="checkbox text-center">
                                <input type="checkbox" value="3" id="checkbox4">
                                <label for="checkbox4" class="no-padding no-margin"></label>
                            </div>
                        </td>
                        <td class="v-align-middle semi-bold">
                          <p>First Tour</p>
                        </td>
                        <td class="v-align-middle"><a href="#" class="btn btn-tag">United States</a><a href="#" class="btn btn-tag">India</a>
                          <a href="#" class="btn btn-tag">China</a><a href="#" class="btn btn-tag">Africa</a>
                        </td>
                        <td class="v-align-middle">
                          <p>it is more then ONE nation/nationality as its fall name is The United Kingdom of Great Britain and North Ireland..</p>
                        </td>
                        <td class="v-align-middle">
                          <p>Public</p>
                        </td>
                      </tr>
                      <tr>
                        <td class="v-align-middle">
                            <div class="checkbox text-center">
                                <input type="checkbox" value="3" id="checkbox4">
                                <label for="checkbox4" class="no-padding no-margin"></label>
                            </div>
                        </td>
                        <td class="v-align-middle semi-bold">
                          <p>First Tour</p>
                        </td>
                        <td class="v-align-middle"><a href="#" class="btn btn-tag">United States</a><a href="#" class="btn btn-tag">India</a>
                          <a href="#" class="btn btn-tag">China</a><a href="#" class="btn btn-tag">Africa</a>
                        </td>
                        <td class="v-align-middle">
                          <p>it is more then ONE nation/nationality as its fall name is The United Kingdom of Great Britain and North Ireland..</p>
                        </td>
                        <td class="v-align-middle">
                          <p>Public</p>
                        </td>
                      </tr>
                      <tr>
                        <td class="v-align-middle">
                            <div class="checkbox text-center">
                                <input type="checkbox" value="3" id="checkbox4">
                                <label for="checkbox4" class="no-padding no-margin"></label>
                            </div>
                        </td>
                        <td class="v-align-middle semi-bold">
                          <p>First Tour</p>
                        </td>
                        <td class="v-align-middle"><a href="#" class="btn btn-tag">United States</a><a href="#" class="btn btn-tag">India</a>
                          <a href="#" class="btn btn-tag">China</a><a href="#" class="btn btn-tag">Africa</a>
                        </td>
                        <td class="v-align-middle">
                          <p>it is more then ONE nation/nationality as its fall name is The United Kingdom of Great Britain and North Ireland..</p>
                        </td>
                        <td class="v-align-middle">
                          <p>Public</p>
                        </td>
                      </tr>
                      <tr>
                        <td class="v-align-middle">
                            <div class="checkbox text-center">
                                <input type="checkbox" value="3" id="checkbox4">
                                <label for="checkbox4" class="no-padding no-margin"></label>
                            </div>
                        </td>
                        <td class="v-align-middle semi-bold">
                          <p>First Tour</p>
                        </td>
                        <td class="v-align-middle"><a href="#" class="btn btn-tag">United States</a><a href="#" class="btn btn-tag">India</a>
                          <a href="#" class="btn btn-tag">China</a><a href="#" class="btn btn-tag">Africa</a>
                        </td>
                        <td class="v-align-middle">
                          <p>it is more then ONE nation/nationality as its fall name is The United Kingdom of Great Britain and North Ireland..</p>
                        </td>
                        <td class="v-align-middle">
                          <p>Public</p>
                        </td>
                      </tr>
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