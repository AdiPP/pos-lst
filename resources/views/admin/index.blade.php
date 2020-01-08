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
                    <span class="font-montserrat fs-11 all-caps">Penjualan <i class="fa fa-chevron-right"></i>
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
                    <h3 class="no-margin p-b-5">$24,000</h3>
                    <span class="small hint-text pull-left">71% of total goal</span>
                    <span class="pull-right small text-primary">$23,000</span>
                </div>
                </div>
            </div>
            <div class="row-xs-height">
                <div class="col-xs-height col-bottom">
                <div class="progress progress-small m-b-0">
                    <!-- START BOOTSTRAP PROGRESS (http://getbootstrap.com/components/#progress) -->
                    <div class="progress-bar progress-bar-primary" style="width:71%"></div>
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
                    <span class="font-montserrat fs-11 all-caps">Transaksi <i class="fa fa-chevron-right"></i>
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
                    <h3 class="no-margin p-b-5">423</h3>
                    <span class="small hint-text pull-left">22% higher</span>
                    <span class="pull-right small text-danger">$23,000</span>
                </div>
                </div>
            </div>
            <div class="row-xs-height">
                <div class="col-xs-height col-bottom">
                <div class="progress progress-small m-b-0">
                    <!-- START BOOTSTRAP PROGRESS (http://getbootstrap.com/components/#progress) -->
                    <div class="progress-bar progress-bar-danger" style="width:15%"></div>
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
        <div class="col-lg-12 m-b-10 d-flex flex-column">
        <!-- START card -->
        <div class="card-block no-padding">
            <div id="card-advance" class="card card-default">
                <div class="card-header  ">
                <div class="card-title">Grafik Penjualan
                </div>
                </div>
                <div class="card-block">
                    <canvas id="myChart" width="400" height="400"></canvas>
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
                <h3>
                            <span class="semi-bold">Advance</span> Tools</h3>
                <p>We have crafted Pages Cards to suit any use case. Add a maximize button <i class="pg-fullscreen"></i> into your Cards controls bar to make the Cards go full-screen. This will come handy if you want to show lot of content inside a Cards and want to give the content some room to breath</p>
                <br>
                <div>
                    <div class="profile-img-wrapper m-t-5 inline">
                    <img width="35" height="35" data-src-retina="assets/img/profiles/avatar_small2x.jpg" data-src="assets/img/profiles/avatar_small.jpg" alt="" src="assets/img/profiles/avatar_small2x.jpg">
                    <div class="chat-status available">
                    </div>
                    </div>
                    <div class="inline m-l-10">
                    <p class="small hint-text m-t-5">VIA senior product manage
                        <br>for UI/UX at REVOX</p>
                    </div>
                </div>
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
                    <h3>
                                <span class="semi-bold">Advance</span> Tools</h3>
                    <p>We have crafted Pages Cards to suit any use case. Add a maximize button <i class="pg-fullscreen"></i> into your Cards controls bar to make the Cards go full-screen. This will come handy if you want to show lot of content inside a Cards and want to give the content some room to breath</p>
                    <br>
                    <div>
                        <div class="profile-img-wrapper m-t-5 inline">
                        <img width="35" height="35" data-src-retina="assets/img/profiles/avatar_small2x.jpg" data-src="assets/img/profiles/avatar_small.jpg" alt="" src="assets/img/profiles/avatar_small2x.jpg">
                        <div class="chat-status available">
                        </div>
                        </div>
                        <div class="inline m-l-10">
                        <p class="small hint-text m-t-5">VIA senior product manage
                            <br>for UI/UX at REVOX</p>
                        </div>
                    </div>
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
                <div class="card-title">Pelanggan
                </div>
                </div>
                <div class="card-block">
                <h3>
                            <span class="semi-bold">Advance</span> Tools</h3>
                <p>We have crafted Pages Cards to suit any use case. Add a maximize button <i class="pg-fullscreen"></i> into your Cards controls bar to make the Cards go full-screen. This will come handy if you want to show lot of content inside a Cards and want to give the content some room to breath</p>
                <br>
                <div>
                    <div class="profile-img-wrapper m-t-5 inline">
                    <img width="35" height="35" data-src-retina="assets/img/profiles/avatar_small2x.jpg" data-src="assets/img/profiles/avatar_small.jpg" alt="" src="assets/img/profiles/avatar_small2x.jpg">
                    <div class="chat-status available">
                    </div>
                    </div>
                    <div class="inline m-l-10">
                    <p class="small hint-text m-t-5">VIA senior product manage
                        <br>for UI/UX at REVOX</p>
                    </div>
                </div>
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
                    <div class="card-title">Pengingat Stok
                    </div>
                    </div>
                    <div class="card-block">
                    <h3>
                                <span class="semi-bold">Advance</span> Tools</h3>
                    <p>We have crafted Pages Cards to suit any use case. Add a maximize button <i class="pg-fullscreen"></i> into your Cards controls bar to make the Cards go full-screen. This will come handy if you want to show lot of content inside a Cards and want to give the content some room to breath</p>
                    <br>
                    <div>
                        <div class="profile-img-wrapper m-t-5 inline">
                        <img width="35" height="35" data-src-retina="assets/img/profiles/avatar_small2x.jpg" data-src="assets/img/profiles/avatar_small.jpg" alt="" src="assets/img/profiles/avatar_small2x.jpg">
                        <div class="chat-status available">
                        </div>
                        </div>
                        <div class="inline m-l-10">
                        <p class="small hint-text m-t-5">VIA senior product manage
                            <br>for UI/UX at REVOX</p>
                        </div>
                    </div>
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
var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
        datasets: [{
            label: '# of Votes',
            data: [12, 19, 3, 5, 2, 3],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
</script>
@endsection