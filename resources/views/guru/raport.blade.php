@extends('guru.layout.template')
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
            <div class="col-12 mt-5" ng-hide="checkedtable">
                <div class="card">
                    <div class="card-body" ng-hide="showaksi">
                        <div class="row" style="margin-bottom: 10px;">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-4">
                                        <select class="form-control" id="tahun_temp">
                                            <option ng-repeat="row in datatahun" ng-if="row.id==0"
                                                value="@{{ row.id }}">@{{ row.ket }}</option>
                                            <option ng-repeat="row in datatahun" ng-if="row.id!=0"
                                                value="@{{ row.id }}">@{{ row.ket }} Semester
                                                @{{ row.semester }}</option>
                                        </select>
                                    </div>
                                    <div class="col-4">
                                        <select class="form-control" id="pengajar_temp">
                                            <option ng-repeat="row in datapengajar" ng-if="row.id==0"
                                                value="@{{ row.id }}">@{{ row.ket }}</option>
                                            <option ng-repeat="row in datapengajar" ng-if="row.id!=0"
                                                value="@{{ row.id }}">@{{ row.nama_mapel }} -
                                                @{{ row.nama_kelas }}</option>
                                        </select>
                                    </div>
                                    <div class="col-4">
                                        <button class="btn btn-primary btn-block mb-2" ng-click="viewData()">View</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-6">
                                        <table class="table">
                                            <tr>
                                                <td>Mata Pelajaran</td>
                                                <td>:</td>
                                                <td>@{{ matpel }}</td>
                                            </tr>
                                            <tr>
                                                <td>Kelas</td>
                                                <td>:</td>
                                                <td>@{{ kelas }}</td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="col-6">
                                        <table class="table">
                                            <tr>
                                                <td>Tahun Akademik</td>
                                                <td>:</td>
                                                <td>@{{ ta }}</td>
                                            </tr>
                                            <tr>
                                                <td>Jumlah Siswa</td>
                                                <td>:</td>
                                                <td>@{{ jmlsiswa }}</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="data-tab">
                            <div class="row">
                                <div class="col-12">
                                    <table datatable="ng" class="table table-bordered">
                                        <thead class="bg-light" style="font-size: 12px;">
                                            <tr class="text-center">
                                                <th>No</th>
                                                <th>NISM</th>
                                                <th>Nama Siswa</th>
                                                <th>Kelas</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody style="font-size: 12px">
                                            <tr class="text-center" ng-repeat="row in datasiswa">
                                                <td>@{{ $index + 1 }}</td>
                                                <td>@{{ row.nism }}</td>
                                                <td>@{{ row.nama_siswa }}</td>
                                                <td>@{{ row.nama_kelas }}</td>
                                                <td>
                                                    <button class="mybtn" ng-click="aturNilai(row)">Atur
                                                        Nilai</button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="card-body" ng-show="showaksi">
                        <div class="row" style="margin-bottom: 10px;">
                            <div class="col-12">

                            </div>

                        </div>
                        <div class="data-tab">
                            <div class="row">
                                <div class="col-12">
                                    <div class="header-title">
                                        <div class="row">
                                            <div class="col-10">
                                                <i class="ti-angle-left" style="cursor: pointer" ng-click="kembali()"></i>
                                            </div>
                                            <div class="col-2">
                                                <p style="font-size:13px;color:#483D8B;font-weight: bolder;cursor: pointer"
                                                    data-toggle="modal" data-target="#myModal" ng-click="tambahData()">@{{ ket }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-6">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Nama Lengkap</th>
                                                        <th>:</th>
                                                        <th>@{{ nama_lengkap }}</th>
                                                    </tr>
                                                    <tr>
                                                        <th>Nama Orang Tua</th>
                                                        <th>:</th>
                                                        <th>@{{ nama_orangtua }}</th>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
                                        <div class="col-6">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Tahun Akademik</th>
                                                        <th>:</th>
                                                        <th>@{{ ta }}</th>
                                                    </tr>
                                                    <tr>
                                                        <th>Kelas</th>
                                                        <th>:</th>
                                                        <th>@{{ kelas }}</th>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>

                                        <div class="col-12">
                                            <p style="font-weight: bolder;">@{{ matpel }}</p>
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr class="text-center" style="font-size: 13px;">
                                                        <th>No</th>
                                                        <th>Hasil Belajar Diharapkan</th>
                                                        <th>Nilai</th>
                                                        <th>Keterangan Dan Pesan Ustad/Ustazah</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr ng-repeat="row in datanilai" class="text-center"
                                                        style="font-size: 12px;">
                                                        <td>@{{ $index + 1 }}</td>
                                                        <td>
                                                            @{{ row.indikator }}
                                                        </td>
                                                        <td>
                                                            @{{ row.nilai }}
                                                        </td>
                                                        <td>
                                                            @{{ row.ulasan }}
                                                        </td>
                                                        <td>
                                                            <div>
                                                                <span class="fa fa-edit"
                                                                    style="font-size: 20px;color: yellow;cursor: pointer;"
                                                                    ng-click="editData(row)" data-toggle="modal"
                                                                    data-target="#myModal"></span>
                                                                <span class="fa fa-trash"
                                                                    style="font-size: 20px;color:red;cursor: pointer;"
                                                                    ng-click="hapusData(row)"></span>
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
                </div>
            </div>
        </div>
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">@{{ ketform }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="..................."
                                ng-model="indikator" />
                            <p><small style="color: red;font-weight: bolder;">*</small> Masukan Indikator</p>
                        </div>
                        <div class="form-group">
                            <input type="number" class="form-control" placeholder="0" ng-model="nilai" />
                            <p><small style="color: red;font-weight: bolder;">*</small> Masukan Nilai</p>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" rows="7" ng-model="ulasan"></textarea>
                            <p><small style="color: red;font-weight: bolder;">*</small> Masukan Keterangan / Ulasan </p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" ng-click="saveData()"
                            ng-hide="checkbtn">Simpan</button>
                        <button type="button" class="btn btn-primary" ng-click="perbaruiData()"
                            ng-show="checkbtn">Perbarui</button>

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
        <script src="{{ asset('assets/js/app-guru/raport/app.js') }}"></script>
        <script src="{{ asset('assets/js/app-guru/raport/service.js') }}"></script>
    @endsection
