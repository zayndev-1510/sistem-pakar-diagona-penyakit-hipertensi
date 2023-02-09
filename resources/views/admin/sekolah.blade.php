@extends('admin.layout.template');
@section('header-lvl-1')
    <div class="col-sm-6">
        <div class="breadcrumbs-area clearfix">
            <h4 class="page-title pull-left">Dashboard</h4>
            <ul class="breadcrumbs pull-left">
                <li><a href="index.html">Home</a></li>
                <li><span>{{ $data->keterangan }}</span></li>
            </ul>
        </div>
    </div>
@endsection
@section('content')
    <div class="main-content-inner" ng-app="homeApp" ng-controller="homeController">
        <div class="row">
            <div class="col-10 mt-5" style="margin-left: auto;margin-right: auto">
                <div class="card">
                    <div class="card-body" id="tabel-toko">
                        <div class="row" style="margin-bottom: 10px;">
                            <div class="col-10">
                                <p style="font-size: 20px;font-weight: bolder;">{{ $data->keterangan }}</p>
                            </div>
                            <div class="col-2">

                            </div>
                        </div>
                        <div class="data-tab">
                            <table class="table">
                                <tr>
                                    <td>NSPN</td>
                                    <td>:</td>
                                    <td>@{{nspn}}</td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td>:</td>
                                    <td>@{{alamat}}</td>
                                </tr>
                                <tr>
                                    <td>Kode Pos</td>
                                    <td>:</td>
                                    <td>@{{kode_pos}}</td>
                                </tr>
                                <tr>
                                    <td>Provinsi</td>
                                    <td>:</td>
                                    <td>@{{provinsi}}</td>
                                </tr>
                                <tr>
                                    <td>Kota</td>
                                    <td>:</td>
                                    <td>@{{kota}}</td>
                                </tr>
                                <tr>
                                    <td>Kecamatan</td>
                                    <td>:</td>
                                    <td>@{{kecamatan}}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
@section('javascript')
    <script src="{{ asset('assets/angularjs/angular.min.js') }}"></script>
    <script src="{{ asset('assets/angularjs/angular-route.min.js') }}"></script>
    <script src="{{ asset('assets/angularjs/angular-datatables.min.js') }}"></script>
    <script src="{{ asset('assets/angularjs/sweetalert.min.js') }}"></script>
    <script src="{{ asset('assets/js/sekolah/app.js') }}"></script>
    <script src="{{ asset('assets/js/sekolah/service.js') }}"></script>
@endsection
