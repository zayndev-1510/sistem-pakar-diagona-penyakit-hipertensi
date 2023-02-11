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
                        <div class="row" style="margin-bottom: 10px;">
                            <div class="col-10">
                                <p style="font-size: 17px;font-family: Poppins;font-size: 15px;">{{ $data->keterangan }}</p>
                            </div>
                            <div class="col-2">
                                <p id="design-btn-2" style="background-color: #514496;cursor: pointer;"
                                ng-click="tambahData()"> <i class="ti-plus"></i> Tahun Akademik Baru</p>
                            </div>
                        </div>
                        <div class="data-tab">
                            <table datatable="ng" class="table table-bordered">
                                <thead class="bg-light" style="font-size: 12px;">
                                    <tr class="text-center">
                                        <th>No</th>
                                        <th>Tahun Akademik</th>
                                        <th>Semester</th>
                                        <th>Tanggal Akadmeik</th>
                                        <th>Status</th>
                                        <th>
                                            Aksi
                                        </th>
                                    </tr>
                                </thead>
                                <tbody style="font-size: 12px">
                                    <tr class="text-center" ng-repeat="row in datatahun">
                                        <td>@{{ $index + 1 }}</td>
                                        <td>@{{ row.tahun_akademik }}</td>
                                        <td>@{{ row.semester }}</td>
                                        <td>@{{ row.tgl }}</td>
                                        <td>
                                            <p ng-if="row.status ==1" style="color: green;font-weight: bolder;font-family: Poppins;font-size: 12px;">Aktif</p>
                                            <p ng-if="row.status ==0" style="color:red;font-weight: bolder;font-family: Poppins;font-size: 12px;">Nonaktif</p>
                                        </td>
                                        <td>
                                            <span class="fa fa-edit"
                                                style="font-size: 20px;color: yellow;cursor: pointer;"
                                                ng-click="detail(row)"></span>
                                            <span class="fa fa-trash" style="font-size: 20px;color:red;cursor: pointer;"
                                                ng-click="hapus(row)"></span>
                                        </td>
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
                                <div class="col-9">
                                    <i class="ti-angle-left" style="cursor: pointer" ng-hide="checktahun"
                                        ng-click="kembali()"></i>
                                    <i class="ti-angle-left" style="cursor: pointer" ng-show="checktahun"
                                        ng-click="selesai()"></i>

                                </div>
                                <div class="col-3">
                                    <p style="font-size: 13px;">@{{ ket }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="data-tab">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control tahun_ajaran" placeholder="2018/2019" />
                                    </div>
                                    <p style="font-size: 12px;"><small style="color:red;"> * </small> Wajib diisi tahun akademik</p>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <input type="number" class="form-control tahun_ajaran" placeholder="0" />
                                    </div>
                                    <p style="font-size: 12px;"><small style="color:red;"> * </small> Wajib diisi semester</p>

                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <input type="date" class="form-control tahun_ajaran" />
                                    </div>
                                    <p style="font-size: 12px;"><small style="color:red;"> * </small> Wajib diisi tanggal akademik</p>

                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <select class="form-control tahun_ajaran">
                                            <option value="">Pilih Status</option>
                                            <option value="1">Aktif</option>
                                            <option value="0">Nonaktif</option>
                                        </select>
                                    </div>
                                    <p style="font-size: 12px;"><small style="color:red;"> * </small> Wajib diisi</p>

                                </div>
                                <div class="col-12" style="margin-top: 10px;">
                                    <button class="btn btn-primary" ng-show="btnsimpan" style="margin-left: 10px;"
                                        ng-click="save()">
                                        Simpan
                                    </button>
                                    <button class="btn btn-primary" ng-show="btnperbarui" ng-click="perbarui()">
                                        Perbarui
                                    </button>
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
    <script src="{{ asset('assets/angularjs/angular.min.js') }}"></script>
    <script src="{{ asset('assets/angularjs/angular-route.min.js') }}"></script>
    <script src="{{ asset('assets/angularjs/angular-datatables.min.js') }}"></script>
    <script src="{{ asset('assets/angularjs/sweetalert.min.js') }}"></script>
    <script src="{{ asset('assets/js/tahun ajaran/app.js') }}"></script>
    <script src="{{ asset('assets/js/tahun ajaran/service.js') }}"></script>
@endsection
