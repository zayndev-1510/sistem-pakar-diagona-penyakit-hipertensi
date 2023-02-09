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
                                                    <button class="mybtn">Selengkapnya</button>
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
            <div class="col-8 mt-5" ng-show="checkedtable" style="margin: auto">
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
                                    <div class="col-12">
                                        <table class="table">
                                            <tr>
                                                <th><p style="font-size: 17px;">Identitas Siswa</p></th>
                                            </tr>
                                            <tr>
                                                <td>NISN</td>
                                                <td>:</td>
                                                <td>@{{nisn}}</td>
                                            </tr>
                                            
                                            <tr>
                                                <td>Nama Lengkap</td>
                                                <td>:</td>
                                                <td>@{{nama_siswa}}</td>
                                            </tr>
                                            <tr>
                                                <td>Tempat Tanggal Lahir</td>
                                                <td>:</td>
                                                <td>@{{ttl}}</td>
                                            </tr>
                                            <tr>
                                                <td>Jenis Kelamin</td>
                                                <td>:</td>
                                                <td>@{{jenis_kelamin}}</td>
                                            </tr>
                                            <tr>
                                                <td>Agama</td>
                                                <td>:</td>
                                                <td>@{{agama}}</td>
                                            </tr>
                                            <tr>
                                                <th><p style="font-size: 17px;">Orang Tua</p></th>
                                            </tr>
                                            <tr>
                                                <th><p style="font-size: 15px;">1. Ayah</p></th>
                                            </tr>
                                            <tr>
                                                <td>NIK</td>
                                                <td>:</td>
                                                <td>{{$datalogin[0]->nik_ayah}}</td>
                                            </tr>
                                            <tr>
                                                <td>Nama</td>
                                                <td>:</td>
                                                <td>{{$datalogin[0]->nama_ayah}}</td>
                                            </tr>
                                            <tr>
                                                <td>Pekerjaan</td>
                                                <td>:</td>
                                                <td>{{$datalogin[0]->pekerjaan_ayah}}</td>
                                            </tr>
                                            <tr>
                                                <th><p style="font-size: 15px;">1. Ibu</p></th>
                                            </tr>
                                            <tr>
                                                <td>NIK</td>
                                                <td>:</td>
                                                <td>{{$datalogin[0]->nik_ibu}}}</td>
                                            </tr>
                                            <tr>
                                                <td>Nama</td>
                                                <td>:</td>
                                                <td>{{$datalogin[0]->nama_ibu}}</td>
                                            </tr>
                                            <tr>
                                                <td>Pekerjaan</td>
                                                <td>:</td>
                                                <td>{{$datalogin[0]->pekerjaan_ayah}}</td>
                                            </tr>
                                        </table>
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
        <script src="{{ asset('assets/js/app-ortu/siswa/app.js') }}"></script>
        <script src="{{ asset('assets/js/app-ortu/siswa/service.js') }}"></script>
    @endsection
