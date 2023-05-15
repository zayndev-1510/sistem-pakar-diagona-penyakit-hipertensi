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
                    <div class="row">
                        <div class="col-md-6" style="background-color: white;">
                            <h3 style="margin-bottom: 30px;">Selamat Datang Admin</h3>
                            <h4 style="margin-bottom: 30px;">Diagonosa Penyakit Hipertensi Perbandingan Metode Forward Chaining Dan Certainly Factor</h4>
                            <p style="font-size: 15px;font-family: Poppins;">Adanya aplikasi ini untuk membandingan metode forward chaining dan certainly faktor
                                dalam mengampbil keputusan diagonosa penyakit hipertensi
                            </p>

                            <p style="font-size: 15px;font-family: Poppins;">Ada beberapa pertanyaan yg telah disediakan dari aplikasi dalam mencari penyakit yg diderita dari gejala-gejala yg dipilih
                                forward chaining menentukan kesimpulan dengan beberapa aturan-aturan yang telah dibuat dalam sistem ini, dan certainly faktor untuk mencari tingkat kepastian dalam menentukan penyakit yg diderita
                            </p>
                        </div>
                        <div class="col-md-6">
                            <img src="{{asset('hipertensi_2.jpg')}}" class="img-responsive"/>
                        </div>
                    </div>
                </div>
                <div class="col-12" style="margin-top: 10px;">
                    <div class="row" style="margin-bottom: 10px;">
                        <div class="col-md-4" style="cursor: pointer"
                            onclick="window.location.href='{{ url('admin/page/ruangan') }}'">
                            <div class="single-report">
                                <div class="s-report-inner pr--10 pt--30 mb-3">
                                    <div class="icon"><i class="ti-room"></i></div>
                                    <div class="s-report-title d-flex justify-content-between">
                                        <h4 class="header-title mb-0">Penyakit</h4>

                                    </div>
                                    <div class="d-flex justify-content-between pb-2">
                                        <h2>{{ $data->penyakit }}</h2>
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
                                        <h4 class="header-title mb-0">Gejala</h4>

                                    </div>
                                    <div class="d-flex justify-content-between pb-2">
                                        <h2>{{ $data->gejala }}</h2>
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
                                        <h4 class="header-title mb-0">Basis Pengetahuan</h4>

                                    </div>
                                    <div class="d-flex justify-content-between pb-2">
                                        <h2>{{ $data->basis_pengetahuan }}</h2>
                                    </div>
                                </div>

                            </div>
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
    <script>
    const url="{{ env("API_URL_ADMIN") }}";
    </script>
    <script src="{{ asset('grafik/chart.min.js') }}"></script>
    <script src="{{ asset('grafik/chartjs-plugin-datalabels.min.js') }}"></script>

    <script src="{{ asset('assets/angularjs/angular.min.js') }}"></script>
    <script src="{{ asset('assets/angularjs/angular-route.min.js') }}"></script>
    <script src="{{ asset('assets/js/login/dashboard.js') }}"></script>
    <script src="{{ asset('assets/js/login/service.js') }}"></script>
@endsection
