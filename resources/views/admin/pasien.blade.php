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
            <div class="col-12 mt-5" ng-hide="add">
                <div class="card">
                    <div class="card-body" id="tabel-toko">
                        <div class="row" style="margin-bottom: 10px;">
                            <div class="col-10">
                                <p style="font-size: 17px;font-family: Poppins;">{{ $data->keterangan }}</p>
                            </div>

                        </div>

                        <div class="data-tab">
                            <table datatable="ng" class="table table-bordered">
                                <thead class="bg-light" style="font-size: 12px;">
                                    <tr class="text-center" style="font-family: Poppins;font-size: 13px;text-align: center;">
                                        <th>No</th>
                                        <th>Pasien</th>
                                        <th>Gejala</th>
                                        <th>Penyakit</th>
                                        <th>Tanggal Konsultasi</th>
                                        <th>Jam Konsultasi</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody style="font-size: 12px">
                                    <tr class="text-center" ng-repeat="row in datapasien" style="font-family: Poppins;font-size: 13px;text-align: center;">
                                        <td>@{{ $index + 1 }}</td>
                                        <td>@{{ row.nama_pasien }}</td>
                                        <td>@{{ row.gejala }}</td>
                                        <td>@{{ row.penyakit }}</td>
                                        <td>@{{ row.tgl_konsultasi }}</td>
                                        <td>@{{ row.jam_konsultasi }}</td>
                                        <td>
                                            <div class="row">
                                                <div class="col-12 col-md-12">
                                                    <p id="design-btn-2" style="background-color: #E81224;cursor: pointer;"
                                                        ng-click="hapus(row)"> <i class="ti-trash"></i> Hapus Data</p>
                                                </div>
                                            </div>
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
    <div id="cover-spin">
        <div class="modal-message">
            <h2 class="animate">Loading</h2>
        </div>
    </div>
@endsection
@section('javascript')
    <script>
    const url="{{ env("API_URL_ADMIN") }}";
    </script>
    <script src="{{ asset('assets/angularjs/angular.min.js') }}"></script>
    <script src="{{ asset('assets/angularjs/angular-route.min.js') }}"></script>
    <script src="{{ asset('assets/angularjs/angular-datatables.min.js') }}"></script>
    <script src="{{ asset('assets/angularjs/sweetalert.min.js') }}"></script>
    <script src="{{ asset('assets/js/admin/pasien/app.js') }}"></script>
    <script src="{{ asset('assets/js/admin/pasien/service.js') }}"></script>
@endsection
