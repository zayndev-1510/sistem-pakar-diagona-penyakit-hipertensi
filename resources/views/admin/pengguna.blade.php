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
                                ng-click="tambahData()"> <i class="ti-plus"></i> Pengguna Baru</p>
                            </div>
                        </div>
                        <div class="data-tab">
                            <table datatable="ng" class="table table-bordered">
                                <thead class="bg-light" style="font-size: 12px;">
                                    <tr class="text-center">
                                        <th>No</th>
                                        <th>Username</th>
                                        <th>Nama Lengkap</th>
                                        <th>Hak Akses</th>
                                        <th>
                                            Aksi
                                        </th>
                                    </tr>
                                </thead>
                                <tbody style="font-size: 12px">
                                    <tr class="text-center" ng-repeat="row in datapengguna">
                                        <td>@{{ $index+1 }}</td>
                                        <td>@{{ row.username }}</td>
                                        <td>@{{ row.nama_lengkap }}</td>
                                        <td>
                                            <p style="font-size: 12px;" ng-if="row.hak_akses==2">Guru</p>
                                            <p style="font-size: 12px;" ng-if="row.hak_akses==3">Orang Tua</p>
                                            <p style="font-size:12px;" ng-if="row.hak_akses==4">Kepala Sekolah</p>
                                        </td>
                                        <td>
                                            <span class="fa fa-edit" style="font-size: 20px;color: yellow;cursor: pointer;" ng-click="detail(row)"></span>
                                            <span class="fa fa-trash" style="font-size: 20px;color:red;cursor: pointer;" ng-click="hapus(row)"></span>

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
                                    <p>@{{ ket }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="data-tab">
                            <div class="row" ng-hide="checktahun">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-12" style="border: 2px solid whitesmoke;padding: 5px;">
                                            <div class="row">
                                                <div class="col-11">
                                                    <p style="font-size: 12px;font-family: Poppins;">@{{ nama_lengkap }}
                                                    </p>
                                                </div>
                                                <div class="col-1">
                                                    <i class="ti-angle-right pull-right"
                                                        style="cursor: pointer;font-weight: bolder;margin-top:5px;"
                                                        ng-click="pilihPengguna()"></i>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12" style="border: 2px solid whitesmoke;
                                        margin-bottom: 5px;padding: 5px;">
                                            <div class="row">
                                                <div class="col-11">
                                                    <p style="font-size: 12px;font-family: Poppins;">@{{ username }}
                                                    </p>
                                                </div>
                                                <div class="col-1">
                                                    <i class="ti-angle-right pull-right"
                                                        style="cursor: pointer;font-weight: bolder;margin-top:5px;"
                                                        ng-click="pilihUsername()"></i>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12" style="border: 2px solid whitesmoke;
                                        padding: 5px;margin-bottom: 5px;">
                                            <div class="row">
                                                <div class="col-11">
                                                    <p style="font-size: 12px;font-family: Poppins;">@{{ sandi }}
                                                    </p>
                                                </div>
                                                <div class="col-1">
                                                    <i class="ti-angle-right pull-right"
                                                        style="cursor: pointer;
                                                        font-weight: bolder;margin-top:5px;"
                                                        ng-click="pilihSandi()"></i>
                                                </div>
                                            </div>
                                        </div>



                                    </div>
                                </div>
                                <div class="col-3" style="margin-top: 10px;">
                                    <p id="design-btn-2"
                                        style="margin-left:-15px;background-color: #574DE8;cursor: pointer;"
                                        ng-click="save()" ng-show="btnsimpan">Simpan</p>
                                    <p id="design-btn-2"
                                        style="margin-left:-15px;background-color: #574DE8;cursor: pointer;"
                                        ng-click="perbarui()" ng-show="btnperbarui">Perbarui</p>
                                </div>
                            </div>
                            <div class="row" ng-show="checktahun">
                                <div class="col-12" ng-show="checkusername">
                                    <div class="form-group">
                                        <input type="text" placeholder="Masukan Username" ng-click="clearText(0)" ng-model="username" class="form-control"/>
                                    </div>
                                    <button class="btn bt-warning btn-block" ng-click="selesai()">Gunakan</button>
                                </div>

                                <div class="col-12" ng-show="checksandi">
                                    <div class="form-group">
                                        <input type="password" ng-click="clearText(1)" placeholder="Masukan Kata Sandi" ng-model="sandi" class="form-control"/>
                                    </div>
                                    <button class="btn bt-warning btn-block" ng-click="selesai()">Gunakan</button>
                                </div>

                                <div class="col-12" ng-show="checknama">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <select class="form-control" id="hak_akses" ng-model="hak_akses" ng-change="getHakAkses()">
                                                    <option value="0">Pilih Hak Akses</option>
                                                    <option value="2">Guru</option>
                                                    <option value="3">Orang Tua</option>
                                                </select>
                                            </div>
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
                                        <div class="col-12" ng-show="checkorangtua">
                                            <table datatable="ng" class="table table-bordered">
                                                <thead class="bg-light" style="font-size: 12px;">
                                                    <tr class="text-center">
                                                        <th>No</th>
                                                        <th>NIK Ayah</th>
                                                        <th>Nama Ayah</th>
                                                        <th>Nama Ibu</th>
                                                    </tr>
                                                </thead>
                                                <tbody style="font-size: 12px">
                                                    <tr class="text-center" ng-repeat="row in dataortu" ng-click="getOrtu(row)"
                                                        style="cursor: pointer;">
                                                        <td>@{{ $index + 1 }}</td>
                                                        <td>@{{ row.nik_ayah}}</td>
                                                        <td>@{{ row.nama_ayah }}</td>
                                                        <td>@{{ row.nama_ibu }}</td>
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
        <script src="{{ asset('assets/js/pengguna/app.js') }}"></script>
        <script src="{{ asset('assets/js/pengguna/service.js') }}"></script>
    @endsection
