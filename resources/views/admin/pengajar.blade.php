@extends('admin.layout.template')
@section('header-lvl-1')
    <div class="col-sm-6">
        <div class="breadcrumbs-area clearfix">
            <h4 class="page-title pull-left">Dashboard</h4>
            <ul class="breadcrumbs pull-left">
                <li><a href="index.html">Home</a></li>
                <li style="font-family: Poppins;"><span>{{ $data->keterangan }}</span></li>
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

                        <div class="data-tab">
                            <table datatable="ng" class="table table-bordered">
                                <thead class="bg-light" style="font-size: 12px;">
                                    <tr class="text-center">
                                        <th>No</th>
                                        <th>Nama Guru</th>
                                        <th>Jabatan</th>

                                    </tr>
                                </thead>
                                <tbody style="font-size: 12px">
                                    <tr class="text-center" ng-repeat="row in dataguru">
                                        <td>@{{ $index+1 }}</td>
                                        <td>@{{ row.nama }}</td>
                                        <td>@{{ row.ket}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-8 mt-5" style="margin: auto;" ng-show="checkedtambah">
                <div class="card">
                    <div class="card-body">
                        <div class="header-title">
                            <div class="row">
                                <div class="col-8">
                                    <i class="ti-angle-left" style="cursor: pointer" ng-hide="checktahun"
                                        ng-click="kembali()"></i>
                                    <i class="ti-angle-left" style="cursor: pointer" ng-show="checktahun"
                                        ng-click="selesai()"></i>

                                </div>
                                <div class="col-4">
                                    <p class="pull-right">@{{ ket }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="data-tab">
                            <div class="row" ng-hide="checktahun">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-12" style="border: 2px solid whitesmoke;
                                        margin-bottom: 5px;padding: 5px;">
                                            <div class="row">
                                                <div class="col-11">
                                                    <p style="font-size: 12px;font-family: Poppins;">@{{ guru }}
                                                    </p>
                                                </div>
                                                <div class="col-1">
                                                    <i class="ti-angle-right pull-right"
                                                        style="cursor: pointer;margin-top:5px;"
                                                        ng-click="pilihGuru()"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12" style="border: 2px solid whitesmoke;padding: 5px;">
                                            <div class="row">
                                                <div class="col-11">
                                                    <p style="font-size: 12px;font-family: Poppins;">@{{ kelas }}
                                                    </p>
                                                </div>
                                                <div class="col-1">
                                                    <i class="ti-angle-right pull-right"
                                                        style="cursor: pointer;font-weight: bolder;margin-top:5px;"
                                                        ng-click="pilihKelas()"></i>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-12" style="margin-top: 10px;">
                                    <button class="btn btn-primary" ng-show="btnsimpan" style="margin-left: 10px;" ng-click="save()">
                                        Simpan
                                    </button>
                                    <button class="btn btn-primary" ng-show="btnperbarui" ng-click="perbarui()">
                                        Perbarui
                                    </button>
                                </div>
                            </div>
                            <div class="row" ng-show="checktahun">
                                <div class="col-12" ng-show="checkkelas">
                                    <table datatable="ng" class="table table-bordered">
                                        <thead class="bg-light" style="font-size: 12px;">
                                            <tr class="text-center">
                                                <th>No</th>
                                                <th>Keterangan</th>

                                            </tr>
                                        </thead>
                                        <tbody style="font-size: 12px">
                                            <tr class="text-center" ng-repeat="row in datakelas" ng-click="getKelas(row)"
                                                style="cursor: pointer;">
                                                <td>@{{ $index + 1 }}</td>
                                                <td>@{{ row.ket }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-12" ng-show="checkguru">
                                    <table datatable="ng" class="table table-bordered">
                                        <thead class="bg-light" style="font-size: 12px;">
                                            <tr class="text-center">
                                                <th>No</th>
                                                <th>Nama Guru</th>
                                            </tr>
                                        </thead>
                                        <tbody style="font-size: 12px">
                                            <tr class="text-center" ng-repeat="row in dataguru" ng-click="getGuru(row)"
                                                style="cursor: pointer;">
                                                <td>@{{ $index + 1 }}</td>
                                                <td>@{{ row.nama }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-12" ng-show="checkmapel">
                                    <table datatable="ng" class="table table-bordered">
                                        <thead class="bg-light" style="font-size: 12px;">
                                            <tr class="text-center">
                                                <th>No</th>
                                                <th>Nama Guru</th>
                                            </tr>
                                        </thead>
                                        <tbody style="font-size: 12px">
                                            <tr class="text-center" ng-repeat="row in datamapel" ng-click="getMapel(row)"
                                                style="cursor: pointer;">
                                                <td>@{{ $index + 1 }}</td>
                                                <td>@{{ row.ket }}</td>
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

    <div id="cover-spin">
        <div class="modal-message">
            <h2 class="animate">Loading</h2>
        </div>
    </div>
    @endsection
    @section('javascript')
        <script src="{{ asset('assets/angularjs/angular.min.js') }}"></script>
        <script src="{{ asset('assets/angularjs/angular-route.min.js') }}"></script>
        <script src="{{ asset('assets/angularjs/angular-datatables.min.js') }}"></script>
        <script src="{{ asset('assets/angularjs/sweetalert.min.js') }}"></script>
        <script src="{{ asset('assets/js/pengajar/app.js') }}"></script>
        <script src="{{ asset('assets/js/pengajar/service.js') }}"></script>
    @endsection
