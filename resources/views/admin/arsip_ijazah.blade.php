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
<style>
    tr.active td { background-color: #8fc3f7;}
</style>
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
                                <button class="btn btn-success" ng-click="tambahData()">Tambah</button>
                            </div>
                        </div>
                        <div class="data-tab">
                            <table datatable="ng" class="table table-bordered">
                                <thead class="bg-light" style="font-size: 12px;">
                                    <tr class="text-center">
                                        <th>No</th>
                                        <th>NISM</th>
                                        <th>Nama Siswa</th>
                                        <th>Tanggal Arsip</th>
                                        <th>
                                            Aksi
                                        </th>
                                    </tr>
                                </thead>
                                <tbody style="font-size: 12px">
                                    <tr class="text-center" ng-repeat="row in dataarsip">
                                        <td>@{{ $index + 1 }}</td>
                                        <td>@{{ row.nism }}</td>
                                        <td>@{{ row.nama_siswa }}</td>
                                        <td>
                                            @{{ row.tgl_arsip }}
                                        </td>
                                        <td>
                                            <span class="fa fa-download" style="font-size: 20px;color:rgb(157, 0, 255);cursor: pointer;"
                                            ng-click="downloadFile(row)"></span>
                                            <span class="fa fa-trash" style="font-size: 20px;color:red;cursor: pointer;"
                                                ng-click="deleteData(row)"></span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="table table-bordered">
                                <tbody>
                                    <td>Jumlah siswa yang belum diatur kelas</td>
                                    <td>:</td>
                                    <td>@{{ jumlahnokelas }}</td>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-10 mt-5" style="margin: auto;" ng-show="checkedtambah">
                <div class="card">
                    <div class="card-body">
                        <div class="header-title">
                            <div class="row">
                                <div class="col-9">
                                    <i class="ti-angle-left" style="cursor: pointer" ng-click="kembali()"></i>

                                </div>
                                <div class="col-3">
                                    <p>@{{ ket }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="column-1">
                            <div class="column-2">
                                <p>Tanggal Pengambilan Ijazah</p>
                                <input type="date" class="form-control" id="tgl_ambil">
                            </div>
                            <div class="column-1">
                                <table class="table table-bordered" id="mytable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>NISM</th>
                                            <th>Nama Siswa</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="sub-table" ng-repeat="row in dataalumni" ng-click="getSiswa(row,$index)" style="cursor: pointer;">
                                            <td>@{{ $index + 1 }}</td>
                                            <td>@{{ row.nism }}</td>
                                            <td>@{{ row.nama_siswa }}</td>

                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="column-1">
                                <p>
                                    Berkas Ijazah
                                </p>
                                <input type="file" id="ijazah">
                                <p style="font-size: 12px"><small style="color: red">*</small>
                                    Berkas format PDF</p>
                            </div>
                            <div class="column-1">
                                <button class="btn btn-primary" style="width: 30%;" ng-click="insertData()">Simpan</button>
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
        <script src="{{ asset('assets/js/ijazah/app.js') }}"></script>
        <script src="{{ asset('assets/js/ijazah/service.js') }}"></script>
    @endsection
