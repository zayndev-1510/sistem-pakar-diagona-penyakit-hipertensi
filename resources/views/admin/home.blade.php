@extends('admin.layout.template')
@section('header-lvl-1')
    <div class="col-sm-6">
        <div class="breadcrumbs-area clearfix">
            <h4 class="page-title pull-left">Dashboard</h4>
            <ul class="breadcrumbs pull-left">
                <li><a href="index.html">Home</a></li>
                <li><span>Dashboard</span></li>
            </ul>
        </div>
    </div>
@endsection
@section('content')
    <div class="main-content-inner" ng-app="homeApp" ng-controller="homeController">
        <!-- sales report area start -->
        <div class="sales-report-area mt-5 mb-5">
            <div class="row">
                <div class="col-12">
                    <div class="row" style="margin-bottom: 10px;">
                        <div class="col-md-4" style="cursor: pointer"
                            onclick="window.location.href='{{ url('admin/page/ruangan') }}'">
                            <div class="single-report">
                                <div class="s-report-inner pr--10 pt--30 mb-3">
                                    <div class="icon"><i class="ti-room"></i></div>
                                    <div class="s-report-title d-flex justify-content-between">
                                        <h4 class="header-title mb-0">Ruangan</h4>

                                    </div>
                                    <div class="d-flex justify-content-between pb-2">
                                        <h2>{{ $data['ruangan'] }}</h2>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-4" style="cursor: pointer"
                            onclick="window.location.href='{{ url('admin/page/mapel') }}'">
                            <div class="single-report">
                                <div class="s-report-inner pr--10 pt--30 mb-3">
                                    <div class="icon"><i class="ti-book"></i></div>
                                    <div class="s-report-title d-flex justify-content-between">
                                        <h4 class="header-title mb-0">Mata Pelajaran</h4>

                                    </div>
                                    <div class="d-flex justify-content-between pb-2">
                                        <h2>{{ $data['mapel'] }}</h2>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-4" style="cursor: pointer"
                            onclick="window.location.href='{{ url('admin/page/orangtua') }}'">
                            <div class="single-report">
                                <div class="s-report-inner pr--10 pt--30 mb-3">
                                    <div class="icon"><i class="ti-user"></i></div>
                                    <div class="s-report-title d-flex justify-content-between">
                                        <h4 class="header-title mb-0">Orang Tua</h4>

                                    </div>
                                    <div class="d-flex justify-content-between pb-2">
                                        <h2>{{ $data['orangtua'] }}</h2>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4" style="cursor: pointer"
                            onclick="window.location.href='{{ url('admin/page/guru') }}'">
                            <div class="single-report">
                                <div class="s-report-inner pr--10 pt--30 mb-3">
                                    <div class="icon"><i class="ti-user"></i></div>
                                    <div class="s-report-title d-flex justify-content-between">
                                        <h4 class="header-title mb-0">Guru</h4>

                                    </div>
                                    <div class="d-flex justify-content-between pb-2">
                                        <h2>{{ $data['guru'] }}</h2>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-4" style="cursor: pointer"
                            onclick="window.location.href='{{ url('admin/page/siswa') }}'">
                            <div class="single-report">
                                <div class="s-report-inner pr--10 pt--30 mb-3">
                                    <div class="icon"><i class="ti-user"></i></div>
                                    <div class="s-report-title d-flex justify-content-between">
                                        <h4 class="header-title mb-0">Siswa</h4>

                                    </div>
                                    <div class="d-flex justify-content-between pb-2">
                                        <h2>{{ $data['siswa'] }}</h2>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-4" style="cursor: pointer"
                            onclick="window.location.href='{{ url('admin/page/kegiatan') }}'">
                            <div class="single-report">
                                <div class="s-report-inner pr--10 pt--30 mb-3">
                                    <div class="icon"><i class="ti-user"></i></div>
                                    <div class="s-report-title d-flex justify-content-between">
                                        <h4 class="header-title mb-0">Kegiatan</h4>

                                    </div>
                                    <div class="d-flex justify-content-between pb-2">
                                        <h2>{{ $data['kegiatan'] }}</h2>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4" style="cursor: pointer"
                            onclick="window.location.href='{{ url('admin/page/alumni') }}'">
                            <div class="single-report">
                                <div class="s-report-inner pr--10 pt--30 mb-3">
                                    <div class="icon"><i class="ti-user"></i></div>
                                    <div class="s-report-title d-flex justify-content-between">
                                        <h4 class="header-title mb-0">Alumni</h4>

                                    </div>
                                    <div class="d-flex justify-content-between pb-2">
                                        <h2>{{ $data["alumni"] }}</h2>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-4" style="cursor: pointer"
                            onclick="window.location.href='{{ url('admin/page/siswa') }}'">
                            <div class="single-report">
                                <div class="s-report-inner pr--10 pt--30 mb-3">
                                    <div class="icon"><i class="ti-user"></i></div>
                                    <div class="s-report-title d-flex justify-content-between">
                                        <h4 class="header-title mb-0">Siswa Aktif</h4>

                                    </div>
                                    <div class="d-flex justify-content-between pb-2">
                                        <h2>{{ $data['siswa_aktif'] }}</h2>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-4" style="cursor: pointer"
                            onclick="window.location.href='{{ url('admin/page/arsip-sekolah') }}'">
                            <div class="single-report">
                                <div class="s-report-inner pr--10 pt--30 mb-3">
                                    <div class="icon"><i class="ti-folder"></i></div>
                                    <div class="s-report-title d-flex justify-content-between">
                                        <h4 class="header-title mb-0">Arsip Dokumen</h4>

                                    </div>
                                    <div class="d-flex justify-content-between pb-2">
                                        <h2>{{ $data['arsip'] }}</h2>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="column-1">
                    <div class="white">
                        <h5 style="text-align: center">Grafik Data Siswa Berdasarkan Tahun</h5>

                        <div style="width: 100%;margin: 0px auto;"">
                            <canvas id="myChart"></canvas>
                        </div>
                    </div>
                </div>
                <div class="column-2">
                    <div class="white">
                        <div>
                            <h5 style="text-align: center">Grafik Data Siswa Berdasarkan Kelamin</h5>
                            <div style="width:auto;margin: 0px auto;height: 100%">
                                <canvas id="myChart2"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="white">
                        <h5 style="text-align: center">Grafik Data Siswa Berdasarkan Kelamin</h5>

                        <div style="width: 100%;margin: 0px auto;height: 100%;">
                            <canvas id="myChart3"></canvas>
                        </div>
                    </div>

                </div>
            </div>

        </div>

    </div>
    </div>
    </div>
    <!-- sales report area end -->
    <!-- overview area start -->
    <!-- row area start-->
    </div>
@endsection
@section('javascript')
    <script src="{{ asset('grafik/chart.min.js') }}"></script>
    <script src="{{ asset('grafik/chartjs-plugin-datalabels.min.js') }}"></script>

    <script src="{{ asset('assets/angularjs/angular.min.js') }}"></script>
    <script src="{{ asset('assets/angularjs/angular-route.min.js') }}"></script>
    <script src="{{ asset('assets/js/login/dashboard.js') }}"></script>
    <script src="{{ asset('assets/js/login/service.js') }}"></script>
@endsection
