@extends('layouts.casual')

@section('title', $title)

@section('content')
<div class="modal fade slide-up disable-scroll" id="modalHarga" tabindex="-1" role="dialog" aria-hidden="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content-wrapper">
            <div class="modal-content">
                <div class="modal-header clearfix text-left">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i>
                </button>
                <h5>Informasi <span class="semi-bold">Harga</span></h5>
                <p class="p-b-10">Tuliskan harga potongan pelanggan dalam rupiah.</p>
                </div>
                <form role="form" action="/pengaturan/perbaruiharga" method="POST">
                @csrf
                    <div class="modal-body">
                        <input type="hidden" name="id" value="{{ $user->id }}">
                        <div class="form-group-attached">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group form-group-default required">
                                        <label>Harga Pelanggan</label>
                                        <input type="text" class="form-control" name="hargaPelanggan" value="{{ $user->info->harga_pelanggan }}" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-cons pull-left inline" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary btn-cons pull-left inline">Perbarui</button>
                </div>
            </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

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
    @if (session('status'))
        <div class="alert alert-danger" role="alert">
            <button class="close" data-dismiss="alert"></button>
            {{ session('status') }}
        </div>
    @endif
    @if (session('success'))
        <div class="alert alert-success" role="alert">
            <button class="close" data-dismiss="alert"></button>
            {{ session('success') }}
        </div>
    @endif
    <div class="row">
        <div class="col-lg-6 m-b-10 d-flex flex-column">
        <!-- START card -->
            <div class="card card-default">
                <div class="card-header">
                    <div class="card-title">
                        Informasi Harga
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="card-block">
                    <div class="padding-10">
                            <div id="form-work" class="form-horizontal">
                                <div class="form-group row">
                                    <label for="fname" class="col-md-5 control-label">Diskon Pelanggan</label>
                                    <div class="col-md-7 d-flex align-items-center">
                                        @if ($user->info->harga_pelanggan == null)
                                            <cite>Belum di set</cite>
                                        @else
                                            {{ Helper::numberToRupiah($user->info->harga_pelanggan) }}
                                        @endif
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <button class="btn btn-primary pull-right btn-cons" data-target="#modalHarga" data-toggle="modal">Ubah Informasi Harga</button>
                                    </div>
                                </div>
                            </div>
                        {{-- </form> --}}
                    </div>
                </div>
            </div>
        <!-- END card -->
        </div>
    </div>
</div>
@endsection

@section('myjsfile')
<!-- BEGIN PAGE LEVEL JS -->
<script src="{{ asset('assets/js/form_layouts.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/datatables.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/demo.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/scripts.js') }}" type="text/javascript"></script>
<!-- END PAGE LEVEL JS -->
@endsection