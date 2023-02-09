@extends('guru.layout.template')
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
            <div class="col-12 mt-5" ng-hide="checkedtambah">
                <div class="card">
                    <div class="card-body" id="tabel-toko">
                        <div class="row" style="margin-bottom: 10px;">
                            <div class="col-12">
                                <p style="font-size: 17px">{{ $data->keterangan }}</p>
                            </div>
                        </div>
                        <div class="data-tab">
                            <table class="table">
                                <tr class="text-center">
                                    <th>Hari</th>
                                    <th>Jam</th>
                                    <th>Mata Pelajaran</th>
                                    <th>Kelas</th>
                                    <th>Guru</th>
                                </tr>
                                <tbody ng-repeat="row in datajadwal">
                                    <tr>
                                        <td rowspan="@{{row.x+1}}" style=" text-align: center; 
                                        vertical-align: middle;">@{{row.nama}}</td>
                                    </tr>
                                    <tr ng-repeat="res in row.data" class="text-center">
                                        <td>@{{res.jam_masuk}} - @{{res.jam_keluar}}</td>
                                        <td>@{{res.nama_matpel}}</td>
                                        <td>@{{res.nama_kelas}}</td>
                                        <td>@{{res.nama_guru}}</td>
                                    </tr>
                                </tbody>       
                            </table>
                        </div>
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
    <script src="{{ asset('assets/js/app-guru/jadwal/app.js') }}"></script>
    <script src="{{ asset('assets/js/app-guru/jadwal/service.js') }}"></script>
@endsection
