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
                                <p style="font-size: 17px;font-family: Poppins;">{{ $data->keterangan }}</p>
                            </div>
                            <div class="col-2">
                                <p id="design-btn-2" style="background-color: #514496;cursor: pointer;"
                                    ng-click="tambahData()"> <i class="ti-plus"></i> Jadwal Baru</p>
                            </div>
                        </div>
                        <div class="data-tab">
                            <table class="table table-bordered">
                                <tr class="text-center">
                                    <th>Hari</th>
                                    <th>Jam</th>
                                    <th>Mata Pelajaran</th>
                                    <th>Kelas</th>
                                    <th>Guru</th>
                                    <th>Aksi</th>
                                </tr>
                                <tbody ng-repeat="row in datajadwal">
                                    <tr>
                                        <td rowspan="@{{ row.x + 1 }}"
                                            style=" text-align: center;
                                            vertical-align: middle;">
                                            @{{ row.nama }}</td>
                                    </tr>
                                    <tr ng-repeat="res in row.data" class="text-center">
                                        <td>@{{ res.jam_masuk }} - @{{ res.jam_keluar }}</td>
                                        <td>@{{ res.nama_matpel }}</td>
                                        <td>@{{ res.nama_kelas }}</td>
                                        <td>@{{ res.nama_guru }}</td>
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
                                    <p style="font-family: Poppins;">@{{ ket }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="data-tab">
                            <div class="row" ng-hide="checktahun">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-12"
                                        style="border: 2px solid whitesmoke;margin-bottom: 5px;padding: 5px;">
                                        <div class="row">
                                            <div class="col-11">
                                                <p style="font-size: 12px;font-family: Poppins;">@{{ mapel }}
                                                </p>
                                            </div>
                                            <div class="col-1">
                                                <i class="ti-angle-right pull-right"
                                                    style="cursor: pointer;font-weight: bolder;margin-top:5px;"
                                                    ng-click="pilihMapel()"></i>
                                            </div>
                                        </div>
                                    </div>
                                        <div class="col-12"
                                            style="border: 2px solid whitesmoke;margin-bottom: 5px;padding: 5px;">
                                            <div class="row">
                                                <div class="col-11">
                                                    <p style="font-size: 12px;font-family: Poppins;">@{{ pengajar }}
                                                    </p>
                                                </div>
                                                <div class="col-1">
                                                    <i class="ti-angle-right pull-right"
                                                        style="cursor: pointer;font-weight: bolder;margin-top:5px;"
                                                        ng-click="pilihPengajar()"></i>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12"
                                            style="border: 2px solid whitesmoke;
                                                                padding: 5px;margin-bottom: 5px;">
                                            <div class="row">
                                                <div class="col-11">
                                                    <p style="font-size: 12px;font-family: Poppins;">@{{ hari }}
                                                    </p>
                                                </div>
                                                <div class="col-1">
                                                    <i class="ti-angle-right pull-right"
                                                        style="cursor: pointer;
                                                                                font-weight: bolder;margin-top:5px;"
                                                        ng-click="pilihHari()"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12"
                                            style="border: 2px solid whitesmoke;
                                                                padding: 5px;margin-bottom: 5px;">
                                            <div class="row">
                                                <div class="col-11">

                                                    <p style="font-size: 12px;font-family: Poppins;">@{{ jam_masuk }}
                                                    </p>
                                                </div>
                                                <div class="col-1">
                                                    <i class="ti-angle-right pull-right"
                                                        style="cursor: pointer;
                                                                                font-weight: bolder;margin-top:5px;"
                                                        ng-click="aturJamMasuk()"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12"
                                            style="border: 2px solid whitesmoke;
                                                        padding: 5px;margin-bottom: 5px;">
                                            <div class="row">
                                                <div class="col-11">
                                                    <p style="font-size: 12px;font-family: Poppins;">@{{ jam_keluar }}
                                                    </p>
                                                </div>
                                                <div class="col-1">
                                                    <i class="ti-angle-right pull-right"
                                                        style="cursor: pointer;
                                                                        font-weight: bolder;margin-top:5px;"
                                                        ng-click="aturJamKeluar()"></i>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="col-3" style="margin-top: 10px;">
                                    <p id="design-btn-2"
                                        style="margin-left:-15px;background-color: #574DE8;cursor: pointer;"
                                        ng-click="save()" ng-show="btnsimpan">Simpan Jadwal</p>
                                    <p id="design-btn-2"
                                        style="margin-left:-15px;background-color: #574DE8;cursor: pointer;"
                                        ng-click="perbarui()" ng-show="btnperbarui">Perbarui Jadwal</p>
                                </div>
                            </div>
                            <div class="row" ng-show="checktahun">
                                <div class="col-12" ng-show="checkhari">
                                    <table datatable="ng" class="table table-bordered">
                                        <thead class="bg-light" style="font-size: 12px;">
                                            <tr class="text-center">
                                                <th>No</th>
                                                <th>Hari</th>

                                            </tr>
                                        </thead>
                                        <tbody style="font-size: 12px">
                                            <tr class="text-center" ng-repeat="row in datahari" ng-click="getHari(row)"
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
                                                <th>Mata Pelajaran</th>

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
                                <div class="col-12" ng-show="checkpengajar">
                                    <table datatable="ng" class="table table-bordered">
                                        <thead class="bg-light" style="font-size: 12px;">
                                            <tr class="text-center">
                                                <th>No</th>
                                                <th>Nama Guru</th>
                                                <th>Kelas</th>
                                            </tr>
                                        </thead>
                                        <tbody style="font-size: 12px">
                                            <tr class="text-center" style="cursor: pointer;"
                                                ng-repeat="row in datapengajar" ng-click="getPengajar(row)">
                                                <td>@{{ $index + 1 }}</td>
                                                <td>@{{ row.nama }}</td>
                                                <td>@{{ row.nama_kelas }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-12" ng-show="checkjam_in">
                                    <div class="form-group">
                                        <input type="time" class="form-control" id="jam_masuk" />
                                    </div>
                                    <button class="btn btn-warning btn-block" ng-click="aturJam(0)"
                                        style="color: white;">Atur</button>
                                </div>

                                <div class="col-12" ng-show="checkjam_out">
                                    <div class="form-group">
                                        <input type="time" class="form-control" id="jam_keluar" />
                                    </div>
                                    <button class="btn btn-warning btn-block" ng-click="aturJam(1)"
                                        style="color: white;">Atur</button>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('javascript')
    <script src="{{ asset('assets/angularjs/angular.min.js') }}"></script>
    <script src="{{ asset('assets/angularjs/angular-route.min.js') }}"></script>
    <script src="{{ asset('assets/angularjs/angular-datatables.min.js') }}"></script>
    <script src="{{ asset('assets/angularjs/sweetalert.min.js') }}"></script>
    <script src="{{ asset('assets/js/jadwal/app.js') }}"></script>
    <script src="{{ asset('assets/js/jadwal/service.js') }}"></script>
@endsection
