@extends('layouts.casual')

@section('content')
<div class="container sm-padding-10 p-t-20 p-l-0 p-r-0">
    <!-- START ROW -->
    <div class="row m-b-10">
        <div class="col-lg-6 col-sm-6 d-flex flex-column">
        <!-- START WIDGET widget_weekly_sales_card-->
        <div class="card no-border widget-loader-bar m-b-10">
            <div class="container-xs-height full-height">
            <div class="row-xs-height">
                <div class="col-xs-height col-top">
                <div class="card-header  top-left top-right">
                    <div class="card-title">
                    <span class="font-montserrat fs-11 all-caps">Penjualan Hari Ini
                        {{-- <i class="fa fa-chevron-right"></i> --}}
                                </span>
                    </div>
                    <div class="card-controls">
                    <ul>
                        <li><a href="#" class="portlet-refresh text-black" data-toggle="refresh"><i class="portlet-icon portlet-icon-refresh"></i></a>
                        </li>
                    </ul>
                    </div>
                </div>
                </div>
            </div>
            <div class="row-xs-height">
                <div class="col-xs-height col-top">
                <div class="p-l-20 p-t-50 p-b-40 p-r-20">
                    <h3 class="no-margin p-b-5">Rp {{ $penjualan }}</h3>
                    <span class="small hint-text pull-left">Penjualan Kemarin</span>
                    <span class="pull-right small text-primary">Rp {{ $penjualanKemarin }}</span>
                </div>
                </div>
            </div>
            <div class="row-xs-height">
                <div class="col-xs-height col-bottom">
                <div class="progress progress-small m-b-0">
                    <!-- START BOOTSTRAP PROGRESS (http://getbootstrap.com/components/#progress) -->
                    <div class="progress-bar progress-bar-primary" style="width:100%"></div>
                    <!-- END BOOTSTRAP PROGRESS -->
                </div>
                </div>
            </div>
            </div>
        </div>
        <!-- END WIDGET -->
        </div>
        <div class="col-lg-6 col-sm-6 d-flex flex-column">
        <!-- START WIDGET widget_weekly_sales_card-->
        <div class="card no-border widget-loader-bar m-b-10">
            <div class="container-xs-height full-height">
            <div class="row-xs-height">
                <div class="col-xs-height col-top">
                <div class="card-header  top-left top-right">
                    <div class="card-title">
                    <span class="font-montserrat fs-11 all-caps">Transaksi Hari Ini
                        {{-- <i class="fa fa-chevron-right"></i> --}}
                                </span>
                    </div>
                    <div class="card-controls">
                    <ul>
                        <li><a href="#" class="portlet-refresh text-black" data-toggle="refresh"><i class="portlet-icon portlet-icon-refresh"></i></a>
                        </li>
                    </ul>
                    </div>
                </div>
                </div>
            </div>
            <div class="row-xs-height">
                <div class="col-xs-height col-top">
                <div class="p-l-20 p-t-50 p-b-40 p-r-20">
                    <h3 class="no-margin p-b-5">{{ $transaksi }}</h3>
                    <span class="small hint-text pull-left">Transaksi Kemarin</span>
                    <span class="pull-right small text-danger">{{ $transaksiKemarin }}</span>
                </div>
                </div>
            </div>
            <div class="row-xs-height">
                <div class="col-xs-height col-bottom">
                <div class="progress progress-small m-b-0">
                    <!-- START BOOTSTRAP PROGRESS (http://getbootstrap.com/components/#progress) -->
                    <div class="progress-bar progress-bar-danger" style="width:100%"></div>
                    <!-- END BOOTSTRAP PROGRESS -->
                </div>
                </div>
            </div>
            </div>
        </div>
        <!-- END WIDGET -->
        </div>
    </div>
    <!-- END ROW -->
    <div class="row">
        <div class="col-lg-6 m-b-10 d-flex flex-column">
            <!-- START card -->
            <div class="card-block no-padding">
                <div id="card-advance" class="card card-default">
                    <div class="card-header  ">
                        <div class="card-title">Grafik Penjualan
                        </div>
                    </div>
                    <div class="card-block">
                        <canvas id="grafikPenjualan" width="400" height="400"></canvas>
                    </div>
                </div>
            </div>
            <!-- END card -->
        </div>
        <div class="col-lg-6 m-b-10 d-flex flex-column">
            <!-- START card -->
            <div class="card-block no-padding">
                <div id="card-advance" class="card card-default">
                    <div class="card-header  ">
                        <div class="card-title">Grafik Transaksi
                        </div>
                    </div>
                    <div class="card-block">
                        <canvas id="grafikTransaksi" width="400" height="400"></canvas>
                    </div>
                </div>
            </div>
            <!-- END card -->
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 m-b-10 d-flex flex-column">
            <!-- START card -->
            <div class="card-block no-padding">
                <div id="card-advance" class="card card-default">
                    <div class="card-header  ">
                        <div class="card-title">Penjualan Produk Tertinggi
                        </div>
                    </div>
                    <div class="card-block">
                        <table class="table table-hover demo-table-search table-responsive-block" id="tableWithSearch">
                            <thead>
                                <tr>
                                    <th style="width: 1%">#</th>
                                    <th class="w-50">Nama Produk</th>
                                    <th class="w-50 text-right">Penjualan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($produks as $produk)
                                    <tr>
                                        <td class="v-align-middle semi-bold">{{ $i++ }}</td>
                                        <td class="v-align-middle semi-bold">
                                            {{ $produk->produk->product_name }}
                                        </td>
                                        <td class="v-align-middle text-right semi-bold">
                                            {{ $produk->penjualan }}
                                            {{-- Rp. {{ number_format($produk->product_price, 0,',','.') }} --}}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- END card -->
        </div>
        <div class="col-lg-6 m-b-10 d-flex flex-column">
            <!-- START card -->
            <div class="card-block no-padding">
                <div id="card-advance" class="card card-default">
                    <div class="card-header  ">
                        <div class="card-title">Penjualan Kategori Tertinggi
                        </div>
                    </div>
                    <div class="card-block">
                        <table class="table table-hover demo-table-search table-responsive-block" id="tableWithSearch">
                            <thead>
                                <tr>
                                    <th style="width: 1%">#</th>
                                    <th class="w-50">Nama Kategori</th>
                                    <th class="w-50 text-right">Penjualan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($kategoris as $kategori)
                                    <tr>
                                        <td class="v-align-middle semi-bold">{{ $i++ }}</td>
                                        <td class="v-align-middle semi-bold">
                                            {{ $kategori->category_name }}
                                        </td>
                                        <td class="v-align-middle text-right semi-bold">
                                            {{ $kategori->penjualan }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- END card -->
        </div>
    </div>
</div>
@endsection

@section('inpagejs')
<script>
$(document).ready(function(){
    $.ajax({
        url: '/dashboard/getgrafikpenjualan',
        type: 'GET',
        success: function(response){
            tanggal = response['tanggal'];
            totalPenjualan = response['totalPenjualan'];
            
            var penjualan = document.getElementById('grafikPenjualan').getContext('2d');
            var grafikPenjualan = new Chart(penjualan, {
                // The type of chart we want to create
                type: 'line',

                // The data for our dataset
                data: {
                    labels: tanggal,
                    datasets: [{
                        label: 'Penjualan',
                        fill: false,
                        // backgroundColor: 'rgb(255, 99, 132)',
                        // borderColor: 'rgb(255, 99, 132)',
                        data: totalPenjualan
                    }]
                },

                // Configuration options go here
                options: {
                    // bezierCurve: false,
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true,
                                userCallback: function(label, index, labels) {
                                    // when the floored value is the same as the value we have a whole number
                                    if (Math.floor(label) === label) {
                                        return label;
                                    }

                                },
                            }
                        }],
                    },
                }
            });
        }
    })

    $.ajax({
        url: '/dashboard/getgrafiktransaksi',
        type: 'GET',
        success: function(response){
            tanggal = response['tanggal'];
            totalTransaksi = response['totalTransaksi'];

            var transaksi = document.getElementById('grafikTransaksi').getContext('2d');
            var grafikTransaksi = new Chart(transaksi, {
                // The type of chart we want to create
                type: 'line',

                // The data for our dataset
                data: {
                    labels: tanggal,
                    datasets: [{
                        label: 'Transaksi',
                        fill: false,
                        // backgroundColor: 'rgb(255, 99, 132)',
                        // borderColor: 'rgb(255, 99, 132)',
                        data: totalTransaksi
                    }]
                },

                // Configuration options go here
                options: {
                    // bezierCurve: false,
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true,
                                userCallback: function(label, index, labels) {
                                    // when the floored value is the same as the value we have a whole number
                                    if (Math.floor(label) === label) {
                                        return label;
                                    }

                                },
                            }
                        }],
                    },
                }
            });
        }
    })

    // var ctx = document.getElementById('myChart').getContext('2d');
    // var chart = new Chart(ctx, {
    //     // The type of chart we want to create
    //     type: 'line',

    //     // The data for our dataset
    //     data: {
    //         labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
    //         datasets: [{
    //             label: 'My First dataset',
    //             backgroundColor: 'rgb(255, 99, 132)',
    //             borderColor: 'rgb(255, 99, 132)',
    //             data: [0, 10, 5, 2, 20, 30, 45]
    //         }]
    //     },

    //     // Configuration options go here
    //     options: {}
    // });

    // var ctx = document.getElementById('myChart2').getContext('2d');
    // var chart = new Chart(ctx, {
    //     // The type of chart we want to create
    //     type: 'line',

    //     // The data for our dataset
    //     data: {
    //         labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
    //         datasets: [{
    //             label: 'My First dataset',
    //             backgroundColor: 'rgb(255, 99, 132)',
    //             borderColor: 'rgb(255, 99, 132)',
    //             data: [0, 10, 5, 2, 20, 30, 45]
    //         }]
    //     },

    //     // Configuration options go here
    //     options: {}
    // });
})
</script>
@endsection