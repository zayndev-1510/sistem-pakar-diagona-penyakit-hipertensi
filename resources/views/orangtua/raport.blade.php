@extends('orangtua.layout.template')
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

                        <div class="data-tab">
                            <div class="row">
                                <div class="col-12">
                                    <table datatable="ng" class="table table-bordered">
                                        <thead class="bg-light" style="font-size: 12px;">
                                            <tr class="text-center">
                                                <th>No</th>
                                                <th>NISM</th>
                                                <th>Nama Siswa</th>
                                                <th>Kelas</th>
                                                <td>Aksi</td>
                                            </tr>
                                        </thead>
                                        <tbody style="font-size: 12px">
                                            <tr class="text-center" ng-repeat="row in datasiswa"
                                                ng-click="detailSiswa(row)">
                                                <td>@{{ $index + 1 }}</td>
                                                <td>@{{ row.nism }}</td>
                                                <td>@{{ row.nama_siswa }}</td>
                                                <td>@{{ row.nama_kelas }}</td>
                                                <td>
                                                    <button class="mybtn">Lihat Raport</button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-10 mt-5" ng-show="checkedtable" style="margin: auto">
                <div class="card">
                    <div class="card-body">
                        <div class="data-tab">
                            <div class="col-12">
                                <div class="header-title">
                                    <div class="row">
                                        <div class="col-9">
                                            <i class="ti-angle-left" style="cursor: pointer" ng-click="kembali()"></i>
                                        </div>
                                        <div class="col-3 pull right">
                                            <p>@{{ ket }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <table class="table">
                                            <tr>
                                                <td>NISN</td>
                                                <td>:</td>
                                                <td>@{{nisn}}</td>
                                            </tr>

                                            <tr>
                                                <td>Nama</td>
                                                <td>:</td>
                                                <td>@{{nama_siswa}}</td>
                                            </tr>
                                            <tr>
                                        </table>
                                    </div>
                                    <div class="col-6">
                                        <table class="table">
                                            <tr>
                                                <td>Kelas</td>
                                                <td>:</td>
                                                <td>@{{kelas}}</td>
                                            </tr>

                                            <tr>
                                                <td>Jenis Kelamin</td>
                                                <td>:</td>
                                                <td>@{{jenis_kelamin}}</td>
                                            </tr>
                                            <tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="title" ng-repeat="row in datanilai">
                                           <p>@{{row.ket}}</p>
                                           <table class="table table-bordered">
                                            <thead>
                                                <tr class="text-center" style="font-size: 13px;">
                                                    <th>No</th>
                                                    <th>Hasil Belajar Diharapkan</th>
                                                    <th>Nilai</th>
                                                    <th>Keterangan Dan Pesan Ustad/Ustazah</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr ng-if="getLengthData(row.datanilai) ==0">
                                                    <td colspan="4"><p style="font-size: 12px;">Tidak ada data...</p></td>
                                                </tr>
                                                <tr ng-repeat="res in row.datanilai" ng-if="getLengthData(row.datanilai) !=0" class="text-center"
                                                    style="font-size: 12px;">
                                                    <td>@{{ $index + 1 }}</td>
                                                    <td>
                                                        @{{ res.indikator }}
                                                    </td>
                                                    <td>
                                                        @{{ res.nilai }}
                                                    </td>
                                                    <td>
                                                        @{{ res.ulasan }}
                                                    </td>
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
            </div>

        </div>
        <div id="cover-spin">
            <div class="modal-message">
                <h2 class="animate">Loading</h2>
            </div>
        </div>
    @endsection
    @section('javascript')
        <script>
            var dataprofil=<?php echo json_encode($datalogin[0]);?>;
        </script>
        <script src="{{ asset('assets/angularjs/angular.min.js') }}"></script>
        <script src="{{ asset('assets/angularjs/angular-route.min.js') }}"></script>
        <script src="{{ asset('assets/angularjs/angular-datatables.min.js') }}"></script>
        <script src="{{ asset('assets/angularjs/sweetalert.min.js') }}"></script>
        <script src="{{ asset('assets/js/app-ortu/raport/app.js') }}"></script>
        <script src="{{ asset('assets/js/app-ortu/raport/service.js') }}"></script>
    @endsection
