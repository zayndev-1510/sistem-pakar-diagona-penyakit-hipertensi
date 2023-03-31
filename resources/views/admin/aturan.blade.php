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
                            <div class="col-2">
                                <p id="design-btn-2" style="background-color: #514496;cursor: pointer;"
                                ng-click="tambahData()"> <i class="ti-plus"></i> Menambahkan Aturan</p>
                            </div>
                        </div>

                        <div class="data-tab">
                            <table datatable="ng" class="table table-bordered">
                                <thead class="bg-light" style="font-family: Poppins;font-size: 13px;text-align: center;">
                                    <tr class="text-center">
                                        <th>No</th>
                                        <th>Aturan</th>
                                        <th>Penyakit</th>
                                        <th>
                                            Aksi
                                        </th>
                                    </tr>
                                </thead>
                                <tbody style="font-family: Poppins;font-size: 13px;text-align: center;">
                                    <tr class="text-center" ng-repeat="row in dataaturan">
                                        <td>@{{ $index + 1 }}</td>
                                        <td>@{{ row.rules }}</td>
                                        <td>@{{ row.nama_penyakit }}</td>
                                        <td>
                                            <div class="row">
                                                <div class="col-6 col-md-6">
                                                    <p id="design-btn-2" style="background-color: #FFD04C;cursor: pointer;"
                                                        ng-click="detail(row)"> <i class="ti-pencil"></i> Edit Data</p>
                                                </div>
                                                <div class="col-6 col-md-6">
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
            <div class="col-8 mt-5" style="margin: auto;" ng-show="add">
                <div class="card">
                    <div class="card-body">
                        <div class="header-title">
                            <div class="row">
                                <div class="col-9">
                                    <i class="ti-angle-left" style="cursor: pointer" ng-hide="checktahun"
                                        ng-click="kembali()"></i>
                                    <i class="ti-angle-left" style="cursor: pointer" ng-show="checktahun"
                                        ng-click="selesai()"></i>

                                </div>
                                <div class="col-3">
                                    <p>@{{ ket }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="data-tab">
                            <div class="row" ng-hide="checktahun">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-11">
                                            <div class="form-group">
                                                <select class="form-control aturan">
                                                    <option value="">Pililh Gejala</option>
                                                    <option ng-repeat="row in datagejala" value="@{{row.kode_gejala}}">@{{row.nama_gejala}}</option>
                                                </select>
                                                <p style="font-size: 12px;font-family: Poppins;"><small style="color: red;"> * </small> Wajib Isi
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-1">
                                            <p id="design-btn-2" style="background-color: #514496;cursor: pointer;height: 38px;padding: 10px;"
                                            ng-click="tambahGejala()"> <i class="ti-plus" style="font-size: 15px;"></i></p>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <input type="text" disabled ="font-size: 12px;font-family: Poppins;" class="form-control aturan"
                                                    placeholder="Aturan">
                                                <p style="font-size: 12px;font-family: Poppins;"><small style="color: red;"> * </small> Wajib Isi
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <select class="form-control aturan">
                                                    <option value="">Pililh Penyakit</option>
                                                    <option ng-repeat="row in datapenyakit" value="@{{row.kode_penyakit}}">@{{row.nama_penyakit}}</option>
                                                </select>
                                                <p style="font-size: 12px;font-family: Poppins;"><small style="color: red;"> * </small> Wajib Isi
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <p id="design-btn-2"
                                    style=";background-color: #574DE8;cursor: pointer;"
                                    ng-click="save()" ng-show="btnsimpan">Simpan</p>
                                    <p id="design-btn-2"
                                    style="background-color: #574DE8;cursor: pointer;"
                                    ng-click="perbarui()" ng-show="btnperbarui">Perbarui</p>
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
    const url="{{ env("API_URL_ADMIN") }}";
   </script>
    <script src="{{ asset('assets/angularjs/angular.min.js') }}"></script>
    <script src="{{ asset('assets/angularjs/angular-route.min.js') }}"></script>
    <script src="{{ asset('assets/angularjs/angular-datatables.min.js') }}"></script>
    <script src="{{ asset('assets/angularjs/sweetalert.min.js') }}"></script>
    <script src="{{ asset('assets/js/admin/aturan/app.js') }}"></script>
    <script src="{{ asset('assets/js/admin/aturan/service.js') }}"></script>
@endsection
