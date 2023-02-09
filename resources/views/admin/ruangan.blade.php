@extends('admin.layout.template')
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
                            <div class="col-10">
                                <p style="font-size: 17px">{{ $data->keterangan }}</p>
                            </div>
                            <div class="col-2">
                                <p id="design-btn-2" style="background-color: #514496;cursor: pointer;"
                                    ng-click="tambahData()"> <i class="ti-plus"></i> Kelas Baru</p>
                            </div>
                        </div>
                        <div class="data-tab">
                            <table datatable="ng" class="table table-bordered">
                                <thead class="bg-light" style="font-size: 12px;">
                                    <tr class="text-center">
                                        <th>No</th>
                                        <th>Keterangan</th>
                                        <th>Kategori</th>
                                        <th>Wali Kelas</th>
                                        <th>
                                            Aksi
                                        </th>
                                    </tr>
                                </thead>
                                <tbody style="font-size: 12px">
                                    <tr class="text-center" ng-repeat="row in dataruangan">
                                        <td>@{{ $index + 1 }}</td>
                                        <td>@{{ row.keterangan }}</td>
                                        <td>@{{ row.kategori }}</td>
                                        <td>
                                            @{{row.jumlah}} Guru
                                        </td>
                                        <td>
                                            <div class="row">
                                                <div class="col-4 col-md-4">
                                                    <p id="design-btn-2" style="background-color: #574DE8;cursor: pointer;"
                                                        ng-click="aturWali(row)" data-toggle="modal"
                                                        data-target="#modalEdit"> <i class="ti-pencil"></i> Atur Wali Kelas
                                                    </p>
                                                </div>
                                                <div class="col-4 col-md-4">
                                                    <p id="design-btn-2" style="background-color: #FFD04C;cursor: pointer;"
                                                        ng-click="detail(row)"> <i class="ti-pencil"></i> Edit Data</p>
                                                </div>
                                                <div class="col-4 col-md-4">
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
            <div class="col-8 mt-5" style="margin: auto;" ng-show="checkedtambah">
                <div class="card">
                    <div class="card-body">
                        <div class="header-title">
                            <div class="row">
                                <div class="col-8">
                                    <i class="ti-angle-left" style="cursor: pointer" ng-hide="checktahun"
                                        ng-click="kembali()"></i>
                                </div>
                                <div class="col-4">
                                    <p style="font-size: 13px;">@{{ ket }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="data-tab">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control ruangan" placeholder="Masukan Ruangan" />
                                    </div>
                                    <p style="font-size: 12px;"><small style="color:red;"> * </small> Wajib diisi</p>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control ruangan" placeholder="Masukan Kategori" />
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
        <div class="modal" id="modalEdit">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Atur Wali @{{ket_kelas}}</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-8">
                                <select class="form-control" id="id_guru">
                                    <option value="">Semua</option>
                                    <option value="@{{row.id}}" ng-repeat="row in dataguru">@{{row.nama}}</option>
                                </select>
                            </div>
                            <div class="col-4">
                                <p id="design-btn-2" style="background-color: #574DE8;cursor: pointer;"
                                ng-click="addWali()"> <i class="ti-plus"></i> Wali Kelas</p>
                            </div>
                        </div>
                        <div class="row" style="margin-top: 10px;">
                            <div class="col-12 col-md-12">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr class="text-center">
                                            <th>No</th>
                                            <th>Nama Guru</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr ng-repeat="row in data_wali" class="text-center">
                                            <td>@{{$index+1}}</td>
                                            <td>@{{row.nama}}</td>
                                            <td>
                                                <p id="design-btn-2" style="background-color: #E81224;cursor: pointer;"
                                                ng-click="hapusWali(row.id_wali)"> <i class="ti-trash"></i> Hapus Wali</p>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>


                    </div>

                    <!-- Modal footer -->

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
    <script src="{{ asset('assets/js/ruangan/app.js') }}"></script>
    <script src="{{ asset('assets/js/ruangan/service.js') }}"></script>
@endsection
