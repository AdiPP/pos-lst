@extends('layouts.casual')

{{-- @section('title', $title) --}}

@section('content')
<form action="/purchaseorder/penerimaan/proses" method="POST" enctype="multipart/form-data">
    @csrf
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
                                    {{-- <h5>{{ $title }}</h5> --}}
                                </div>
                                <div class="ml-auto">
                                    <a href="{{ url()->previous() }}" class="btn btn-primary btn-cons">Batal</a>
                                    <input type="submit" class="btn btn-primary btn-cons" value="Simpan">
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
                            Informasi Purchase Order
                        </div>
                    </div>
                    <div class="card-block">
                        <div class="row">
                            <input type="hidden" name="idPo" value="{{ $po->id }}">
                            <div class="col-lg-3 padding-10">
                                <div class="form-group">
                                    <label class="required-symbol">No. PO</label>
                                    <span class="help"></span>
                                    <input type="text" class="form-control" name="nomorPo" value="{{ $po->nomor }}" readonly>
                                </div>
                            </div>
                            <div class="col-lg-3 padding-10">
                                <div class="form-group">
                                    <label class="required-symbol">Outlet</label>
                                    <span class="help"></span>
                                    <input type="text" class="form-control" value="{{ $po->outlet->outlet_name }}" readonly>
                                </div>
                            </div>
                            <div class="col-lg-3 padding-10">
                                <div class="form-group">
                                    <label class="required-symbol">Supplier</label>
                                    <span class="help"></span>
                                    <input type="text" class="form-control" value="{{ $po->supplier->nama }}" readonly>
                                </div>
                            </div>
                            <div class="col-lg-3 padding-10">
                                <div class="form-group">
                                    <label class="required-symbol">Tanggal</label>
                                    <span class="help"></span>
                                    <input type="text" class="form-control" name="tanggal" value="{{  Helper::mysqlToTanggal($po->tanggal) }}" readonly>
                                </div>
                            </div>
                            <div class="col-lg-6 padding-10">
                                <div class="form-group">
                                    <label>Catatan</label>
                                    <span class="help"></span>
                                    <textarea class="form-control" name="catatan" readonly>{{ $po->catatan }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END card -->
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 m-b-10 d-flex flex-column">
                <div data-pages="card" class="card card-default" id="card-basic">
                    <div class="card-header ">
                        <div class="card-title">
                            Produk
                        </div>
                    </div>
                    <div class="card-block">
                        <table class="table table-hover demo-table-search table-responsive-block" id="tableWithSearch">
                            <thead>
                                <tr>
                                    <th>Nama Produk</th>
                                    <th>Jumlah</th>
                                    <th>Jumlah Diterima</th>
                                    {{-- <th class="text-center  " style="width: 1%"><i class="fa fa-trash"></i> </th> --}}
                                </tr>
                            </thead>
                            <tbody id="produk">
                                @foreach ($po->infos as $info)
                                    <tr>
                                        <input type="hidden" name="idProduk[]" value="{{ $info->product_id }}">
                                        <td class="v-align-middle">
                                            <input type="text" class="form-control" name="produk[]" value="{{  $info->produk->product_name }}" readonly>
                                        </td>
                                        <td class="v-align-middle">
                                            <input type="number" class="form-control input-sm text-right" name="jumlah[]" value="{{ $info->jumlah }}" readonly>
                                        </td>
                                        <td class="v-align-middle text-right">
                                            <input type="number" class="form-control input-sm text-right" name="jumlahDiterima[]">
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection

@section('inpagejs')
<script type="text/javascript">
    
</script>
@endsection

@section('myjsfile')
<!-- BEGIN PAGE LEVEL JS -->
<script src="{{ asset('assets/js/form_elements.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/scripts.js') }}" type="text/javascript"></script>
<!-- END PAGE LEVEL JS -->
@endsection