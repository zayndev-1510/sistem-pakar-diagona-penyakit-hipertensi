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
            <div class="col-12 mt-5" ng-hide="checkedtable">
                <div class="card">
                    <div class="card-body" id="tabel-toko">
                        <div class="row" style="margin-bottom: 10px;">
                            <div class="col-12" style="margin-bottom: 10px;">
                                <div class="row">
                                    <div class="col-3">
                                        <select class="form-control" id="tahun_temp">
                                            <option ng-repeat="row in datatahun" ng-if="row.id==0" value="@{{row.id}}">@{{row.ket}}</option>
                                            <option ng-repeat="row in datatahun" ng-if="row.id!=0" value="@{{row.id}}">@{{row.ket}} Semester @{{row.semester}}</option>
                                        </select>
                                    </div>
                                    <div class="col-3">
                                        <select class="form-control" id="nama_kelas">
                                            <option ng-repeat="row in datakelas" ng-if="row.id==0" value="@{{row.id}}">@{{row.ket}}</option>
                                            <option ng-repeat="row in datakelas" ng-if="row.id!=0" value="@{{row.value}}">@{{row.ket}}</option>
                                        </select>
                                    </div>

                                    <div class="col-3">
                                        <p id="design-btn-2"
                                        style="margin-left:-15px;background-color: #574DE8;cursor: pointer;"
                                        ng-click="viewData()">Lihat Data</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-6">
                                        <table class="table">
                                            <tr>
                                                <td>Status Akademik</td>
                                                <td>:</td>
                                                <td>@{{status_akademik}}</td>
                                            </tr>
                                            <tr>
                                                <td>Kelas</td>
                                                <td>:</td>
                                                <td>@{{kelas}}</td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="col-6">
                                        <table class="table">
                                            <tr>
                                                <td>Tahun Akademik</td>
                                                <td>:</td>
                                                <td>@{{ta}}</td>
                                            </tr>
                                            <tr>
                                                <td>Jumlah Siswa</td>
                                                <td>:</td>
                                                <td>@{{jmlsiswa}}</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="data-tab">
                            <table datatable="ng" class="table table-bordered">
                                <thead class="bg-light" style="font-size: 12px;">
                                    <tr class="text-center">
                                        <th>No</th>
                                        <th>NISM</th>
                                        <th>Nama Siswa</th>
                                        <th>Kelas</th>
                                    </tr>
                                </thead>
                                <tbody style="font-size: 12px">
                                    <tr class="text-center" ng-repeat="row in datasiswa">
                                        <td>@{{ $index + 1 }}</td>
                                        <td>@{{ row.nism }}</td>
                                        <td>@{{ row.nama_siswa }}</td>
                                        <td>@{{ row.nama_kelas }}</td>
                                    </tr>
                                </tbody>
                            </table>
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
        <script src="{{ asset('assets/js/app-guru/siswa/app.js') }}"></script>
        <script src="{{ asset('assets/js/app-guru/siswa/service.js') }}"></script>
    @endsection
