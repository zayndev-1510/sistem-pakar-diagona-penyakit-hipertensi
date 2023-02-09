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
                                <div class="row">
                                    <div class="col-md-2">
                                        <p style="font-size: 17px;margin-top: 3px;">{{ $data->keterangan }}</p>
                                    </div>
                                    <div class="col-md-3 pull-left">
                                        <select class="form-control" ng-model="searchdata"
                                            ng-change="dataByKelas(searchdata)">
                                            <option value="">Pilih Kelas</option>
                                            <option value="@{{ row.value }}" ng-repeat="row in datasearch">
                                                @{{ row.caption }}</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 pull-left">
                                        <select class="form-control" ng-model="searchdata2"
                                            ng-change="dataByAkademik(searchdata2)">
                                            <option value="">Pilih Tahun Kelulusan</option>
                                            <option value="All">Semua</option>
                                            <option value="@{{ row.tahun_lulus }}" ng-repeat="row in datagroup">
                                                @{{ row.tahun_lulus }}</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
                                <p id="design-btn-2" style="background-color: #514496;cursor: pointer;"
                                    ng-click="tambahData()"> <i class="ti-plus"></i> Alumni Baru</p>
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
                                        <th>Tanggal Lulus</th>
                                        <th>
                                            Aksi
                                        </th>
                                    </tr>
                                </thead>
                                <tbody style="font-size: 12px">
                                    <tr class="text-center" ng-repeat="row in data_alumni">
                                        <td>@{{ $index + 1 }}</td>
                                        <td>@{{ row.nism }}</td>
                                        <td>@{{ row.nama_siswa }}</td>
                                        <td>
                                            <p ng-if="row.id_kelas==0"
                                                style="color: red;font-size: 12px;font-weight: bolder;">
                                                Kosong</p>
                                            <p ng-if="row.id_kelas!=0" style="font-size: 12px;">@{{ row.ket }}</p>
                                        </td>
                                        <td>
                                            @{{ row.tahun_lulus }}
                                        </td>
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
                                <p>Tahun Kelulusan</p>
                                <input type="text" placeholder="Cth. 2021/2022" class="form-control" id="tgl_lulus">
                            </div>
                            <div class="column-1">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>NISM</th>
                                            <th>Nama Siswa</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr ng-repeat="row in datasiswa">
                                            <td>@{{ $index + 1 }}</td>
                                            <td>@{{ row.nism }}</td>
                                            <td>@{{ row.nama_siswa }}</td>
                                            <td>
                                                <input type="checkbox" ng-model="row.Selected">
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
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
        <script src="{{ asset('assets/js/alumni/app.js') }}"></script>
        <script src="{{ asset('assets/js/alumni/service.js') }}"></script>
    @endsection
