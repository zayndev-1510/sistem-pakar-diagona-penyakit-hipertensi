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
                                ng-click="tambahData()"> <i class="ti-plus"></i> Menambahkan Basis Pengetahuan</p>
                            </div>
                        </div>

                        <div class="data-tab">
                            <table class="table table-bordered">
                                <thead class="bg-light" style="font-family: Poppins;font-size: 13px;text-align: center;">
                                    <tr class="text-center">
                                        <th>Penyakit</th>
                                        <th>Gejala</th>
                                        <th>MB</th>
                                        <td>MD</td>
                                        <td>Aksi</td>

                                    </tr>
                                </thead>
                                <tbody sstyle="font-family: Poppins;font-size: 13px;text-align: center;" ng-repeat="row in databasis">
                                    <tr>

                                        <td rowspan="@{{row.x+1}}"
                                            style=" text-align: center;
                                            vertical-align: middle;">
                                            @{{ row.nama_penyakit }}</td>
                                    </tr>
                                    <tr ng-repeat="res in row.gejala" class="text-center">
                                        <td>@{{ res.nama_gejala }}</td>
                                        <td>@{{ res.mb }}</td>
                                        <td>@{{ res.md }}</td>
                                        <td>
                                            <div class="row">
                                                <div class="col-6 col-md-6">
                                                    <p id="design-btn-2" style="background-color: #FFD04C;cursor: pointer;"
                                                        ng-click="detail(res)"> <i class="ti-pencil"></i> Edit Data</p>
                                                </div>
                                                <div class="col-6 col-md-6">
                                                    <p id="design-btn-2" style="background-color: #E81224;cursor: pointer;"
                                                        ng-click="hapus(res)"> <i class="ti-trash"></i> Hapus Data</p>
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
                                        <div class="col-12">
                                            <div class="form-group">
                                                <select name="penyakit" class="form-control basis_pengetahuan">
                                                    <option value="">Pilih Penyakit</option>
                                                    <option ng-repeat="row in datapenyakit" value="@{{row.kode_penyakit}}">@{{row.nama_penyakit}}</option>
                                                </select>
                                                <p style="font-size: 12px;font-family: Poppins;"><small style="color: red;"> * </small> Wajib Isi
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <select name="penyakit" class="form-control basis_pengetahuan">
                                                    <option value="">Pilih Gejala</option>
                                                    <option ng-repeat="row in datagejala" value="@{{row.kode_gejala}}">@{{row.nama_gejala}}</option>
                                                </select>
                                                <p style="font-size: 12px;font-family: Poppins;"><small style="color: red;"> * </small> Wajib Isi
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <select name="penyakit" class="form-control basis_pengetahuan">
                                                    <option value="">Nilai Kepastian MB</option>
                                                    <option ng-repeat="row in datakepastian" value="@{{row.nilai}}">@{{row.keterangan}}(@{{row.nilai}})</option>
                                                </select>
                                                <p style="font-size: 12px;font-family: Poppins;"><small style="color: red;"> * </small> Wajib Isi
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <select name="penyakit" class="form-control basis_pengetahuan">
                                                    <option value="">Nilai Kepastian MD</option>
                                                    <option ng-repeat="row in datakepastian" value="@{{row.nilai}}">@{{row.keterangan}}(@{{row.nilai}})</option>
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
    <script src="{{ asset('assets/js/admin/basis/app.js') }}"></script>
    <script src="{{ asset('assets/js/admin/basis/service.js') }}"></script>
@endsection
