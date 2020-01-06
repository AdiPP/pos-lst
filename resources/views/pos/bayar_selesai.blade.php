@extends('layouts.casual')

{{-- @section('title', $title) --}}

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
                                {{-- <h5>{{ $title }}</h5> --}}
                            </div>
                            <div class="ml-auto">
                                <a href="/pos" class="btn btn-primary btn-cons">Selesai</a>
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
                <div class="card-block text-center">
                    <h1>Kembali: Rp. 10000</h1>
                </div>
            </div>
            <!-- END card -->
        </div>
    </div>
</div>
@endsection

@section('inpagejs')
<script>
function selesaiBayar(){
    $('#formBayarSelesai').submit();
}
</script>
@endsection

@section('myjsfile')
<!-- BEGIN PAGE LEVEL JS -->
<script src="{{ asset('assets/js/form_elements.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/demo.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/datatables.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/scripts.js') }}" type="text/javascript"></script>
<!-- END PAGE LEVEL JS -->
@endsection