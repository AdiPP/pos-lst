@extends('layouts.casual')

@section('title', $title)

@section('content')
<form action="/inventori/stokopname" method="post">
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
                                    <h5>{{ $title }}</h5>
                                </div>
                                <div class="ml-auto">
                                    <a href="{{ url()->previous() }}" class="btn btn-primary btn-cons">Batal</a>
                                    <input type="submit" id="buttonFormUtama" class="btn btn-primary btn-cons" value="Simpan">
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
                            Informasi Stok Opname
                        </div>
                    </div>
                    <div class="card-block">
                        <form action="/inventori/stokopname" method="post" id="formUtama">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6 padding-10">
                                <div class="form-group">
                                    <label class="required-symbol">Outlet</label>
                                    <span class="help"></span>
                                    <select class="full-width" data-init-plugin="select2" name="outlet" onchange="pilihOutlet()" id="outlet" required>
                                        <option disabled value="" selected>Pilih Outlet</option>
                                        @foreach ($outlets as $outlet)
                                            <option value="{{ $outlet->id }}">{{ $outlet->outlet_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 padding-10">
                                <div class="form-group">
                                    <label>Catatan</label>
                                    <span class="help"></span>
                                    <textarea class="form-control" name="catatan"></textarea>
                                </div>
                            </div>
                        </div>
                        </form>
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
                            <span class="required-symbol">Produk</span>
                        </div>
                    </div>
                    <div class="card-block">
                        <table class="table table-hover demo-table-search table-responsive-block" id="tableWithSearch">
                            <thead>
                            <tr>
                                <th>Nama Produk</th>
                                <th class="text-right">Jumlah Barang (Sistem)</th>
                                <th class="text-right">Jumlah Barang (Aktual)</th>
                                <th class="text-right">Selisih</th>
                                <th class="invisible" style="width: 1%;"></th>
                            </tr>
                            </thead>
                            <tbody id="produk">
                                <tr>
                                    <td class="v-align-middle">
                                        <select class="full-width" onchange="pilihProduk(this)" data-init-plugin="select2" name="produk[]" id="mainProduk" disabled required>
                                            <option selected value="" disabled>Pilih Produk</option>
                                            @foreach ($produks as $produk)
                                                <option value="{{ $produk->id }}">{{ $produk->product_name }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td class="v-align-middle text-right">
                                        <input type="number" class="form-control input-sm text-right" name="jumlahSistem[]" placeholder="0" readonly>
                                    </td>
                                    <td class="v-align-middle">
                                        <input type="number" class="form-control input-sm text-right" onclick="selisihByJumlah(this)" onkeyup="selisihByJumlah(this)" name="jumlah[]" placeholder="0" disabled>
                                    </td>
                                    <td class="v-align-middle text-right">
                                        <input type="number" class="form-control input-sm text-right" name="selisih[]" placeholder="0" readonly>
                                    </td>
                                    <td class="v-align-middle">
                                        <div class="d-flex justify-content-center">
                                            <button type="button" class="btn btn-xs btn-danger mx-1" disabled><i class="fa fa-trash"></i></button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div>
                            <br>
                            <button type="button" onclick="tambahProduk()" class="btn btn-default brn-cons" id="tambahButton" disabled>Tambah Produk</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection

@section('inpagejs')
<script type="text/javascript">
    var outlet;

    $(document).ready(function(){
        $.ajaxSetup({
        headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    })

    // Addons function

    function undisabled(input){
        var inputs = document.getElementsByName('produk[]');
        var indeks;

        indeks = findIndex(input, inputs);

        document.getElementsByName('jumlah[]')[indeks].disabled = false;
        document.getElementById('tambahButton').disabled = false;
    }

    function findIndex(input, inputs){
        var index;

        for (var i = 0 ; i<inputs.length; i++){
            if(input == inputs[i]){
                index = i;
            }   
        }

        return index;
    }

    // Main function

    function tambahProduk(){
        
        $.ajax({
            url: '/inventori/stokopname/tambahproduk',
            type: 'GET',
            success: function(response){
                $('#produk').append(response);
            }
        });

    }

    function hapusProduk(button){
        $(button).parent().parent().parent().remove();
    }

    function selisihByJumlah(input){
        var inputs = document.getElementsByName('jumlah[]');
        var indeks,
            jumlah,
            jumlahSistem;

        // Cari indeks dari input.
        indeks = findIndex(input, inputs);

        jumlah = inputs[indeks].value
        jumlahSistem = document.getElementsByName('jumlahSistem[]')[indeks].value;;

        document.getElementsByName('selisih[]')[indeks].value = jumlah - jumlahSistem;
    }

    function pilihOutlet(){
        var e = document.getElementById("outlet");
        var selected = e.options[e.selectedIndex].value;

        outlet = selected;

        document.getElementById('mainProduk').disabled = false;
    }

    function pilihProduk(input){
        undisabled(input);
        var inputs = document.getElementsByName('produk[]');

        indeks = findIndex(input, inputs);

        var e = document.getElementsByName("produk[]")[indeks];
        var selected = e.options[e.selectedIndex].value;

        $.ajax({
            url: '/inventori/stokopname/pilihproduk',
            type: 'GET',
            data: {produk: selected, outlet: outlet},
            success:function(response){
                document.getElementsByName("jumlahSistem[]")[indeks].value = response;

                // Update selisih
                jumlah = document.getElementsByName('jumlah[]')[indeks].value;
                jumlahSistem = document.getElementsByName('jumlahSistem[]')[indeks].value;
                document.getElementsByName('selisih[]')[indeks].value = jumlah - jumlahSistem;
            }
        })        
    }
</script>
@endsection

@section('myjsfile')
<!-- BEGIN PAGE LEVEL JS -->
<script src="{{ asset('assets/js/form_elements.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/scripts.js') }}" type="text/javascript"></script>
<!-- END PAGE LEVEL JS -->
@endsection