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
<style>
    tr.active td {
        background-color: #8fc3f7;
    }
</style>
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
                                    ng-click="tambahData()" data-toggle="modal" data-target="#modalAdd"> <i
                                        class="ti-plus"></i> Dokumen Baru</p>
                            </div>
                        </div>


                        <div class="data-tab">
                            <div class="row" style="margin-bottom: 20px;">
                                <div class="col-4 col-md-4" ng-click="moveTab(0)">
                                    <p id="design-btn-2" class="tab-btn" style="background-color: #574DE8;cursor: pointer;">Persuratan</p>
                                </div>
                                <div class="col-4 col-md-4" ng-click="moveTab(1)">
                                    <p id="design-btn-2" class="tab-btn" style="background-color: #CCC;cursor: pointer;">BOP</p>
                                </div>

                                <div class="col-4 col-md-4" ng-click="moveTab(2)">
                                    <p id="design-btn-2" class="tab-btn" style="background-color: #CCC;cursor: pointer;">Dokumen Guru</p>
                                </div>
                            </div>
                            <table datatable="ng" class="table table-bordered">
                                <thead class="bg-light" style="font-size: 12px;">
                                    <tr class="text-center">
                                        <th>No</th>
                                        <th>Nama Dokumen</th>
                                        <th>Jenis Dokumen</th>
                                        <th>Tanggal</th>
                                        <th>Berkas</th>

                                        <th>
                                            Aksi
                                        </th>
                                    </tr>
                                </thead>
                                <tbody style="font-size: 12px">
                                    <tr class="text-center" ng-repeat="row in databerkas">
                                        <td>@{{ $index + 1 }}</td>
                                        <td>@{{ row.nama_arsip }}</td>
                                        <td>@{{ row.jenis_arsip }}</td>
                                        <td>@{{ row.tgl}}</td>
                                        <td>
                                            <p id="design-btn-2" style="background-color: #ccc;cursor: pointer;color:black;"
                                            ng-click="showBerkas(row)"> <i class="ti-eye"></i>Lihat Berkas</p>
                                        </td>

                                        <td>
                                            <div class="row">
                                                <div class="col-6 col-md-6">
                                                    <p id="design-btn-2" style="background-color: #FFD04C;cursor: pointer;"
                                                        ng-click="detail(row)" data-toggle="modal" data-target="#modalEdit"> <i class="ti-pencil"></i> Edit Data</p>
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
        </div>
        <div id="cover-spin">
            <div class="modal-message">
                <h2 class="animate">Loading</h2>
            </div>
        </div>

        <div class="modal" id="modalAdd">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Tambah Dokumen</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <p style="font-family: Poppins;font-size: 12px;">Nama Dokumen</p>
                        <input type="text" class="form-control arsip" placeholder="Masukan Nama Dokumen" />

                        <p style="font-family: Poppins;font-size: 12px;">Jenis Dokumen</p>
                        <select class="form-control arsip">
                            <option value="">Pilih Jenis Dokumen</option>
                            <option value="SK.Dokumen Guru">SK</option>
                            <option value="KK.Dokumen Guru">KK</option>
                            <option value="KTP.Dokumne Guru">KTP</option>
                            <option value="DokBelanja.BOP">Dokumentasi Belanja</option>
                            <option value="DokBarang.BOP">Dokumentasi Barang</option>
                            <option value="Persuratan.Persuratan">Persuratan</option>
                            <option value="umum">Umum</option>
                        </select>

                        <div class="row" style="margin-top: 10px;">
                            <div class="col-6 col-md-6">
                                <p style="font-family: Poppins;font-size: 12px;">Belum ada berkas</p>
                            </div>
                            <div class="col-6 col-md-6">
                                <div class="row">
                                    <div class="col-6 col-md-6" ng-click="bukaBerkas()">
                                        <input type="file" id="berkas" style="display: none"
                                        onchange="preview(event)" />
                                        <p id="design-btn-2" style="background-color: #514496;cursor: pointer;"> <i
                                                class="ti-file"></i> Pilh Berkas</p>
                                    </div>
                                    <div class="col-6 col-md-6" ng-click="loadBerkas()">
                                        <p id="design-btn-2" style="background-color: #CCC;cursor: pointer;color:black;"> <i
                                                class="ti-eye"></i> Lihat Berkas</p>
                                    </div>

                                </div>

                            </div>
                            <div class="col-12 col-md-12">
                                <p style="font-family: Poppins;font-size: 12px;"><small style="color: red">*</small> Format berkas pdf/docx</p>
                            </div>
                        </div>

                        <div class="row" style="margin-top: 10px;">
                            <div class="col-12 col-md-12">
                                <p id="design-btn-2" style="background-color: #574DE8;cursor: pointer;" ng-click="simpan()"> <i
                                        class="ti-save"></i> Simpan Dokumen</p>
                            </div>
                        </div>


                    </div>

                    <!-- Modal footer -->

                </div>
            </div>
        </div>
        <div class="modal" id="modalEdit">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Dokumen</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <p style="font-family: Poppins;font-size: 12px;">Nama Dokumen</p>
                        <input type="text" class="form-control arsip-edit" placeholder="Masukan Nama Dokumen" />

                        <p style="font-family: Poppins;font-size: 12px;">Jenis Dokumen</p>
                        <select class="form-control arsip-edit">
                            <option value="">Pilih Jenis Dokumen</option>
                            <option value="SK">SK</option>
                            <option value="KK">KK</option>
                            <option value="KTP">KTP</option>
                            <option value="DokBelanja">Dokumentasi Belanja</option>
                            <option value="DokBarang">Dokumentasi Barang</option>
                        </select>

                        <div class="row" style="margin-top: 10px;">
                            <div class="col-6 col-md-6">
                                <p style="font-family: Poppins;font-size: 12px;" id="edit_caption">Belum ada berkas</p>
                            </div>
                            <div class="col-6 col-md-6">
                                <div class="row">
                                    <div class="col-6 col-md-6" ng-click="bukaBerkas()">
                                        <input type="file" id="berkas" style="display: none"
                                        onchange="preview(event)" />
                                        <p id="design-btn-2" style="background-color: #514496;cursor: pointer;"> <i
                                                class="ti-file"></i> Pilh Berkas</p>
                                    </div>
                                    <div class="col-6 col-md-6" ng-click="loadBerkas()">
                                        <p id="design-btn-2" style="background-color: #CCC;cursor: pointer;color:black;"> <i
                                                class="ti-eye"></i> Lihat Berkas</p>
                                    </div>

                                </div>

                            </div>
                            <div class="col-12 col-md-12">
                                <p style="font-family: Poppins;font-size: 12px;"><small style="color: red">*</small> Format berkas pdf</p>
                            </div>
                        </div>

                        <div class="row" style="margin-top: 10px;">
                            <div class="col-12 col-md-12">
                                <p id="design-btn-2" style="background-color: #574DE8;cursor: pointer;" ng-click="perbaruiDokumen()"> <i
                                        class="ti-save"></i> Perbarui Dokumen</p>
                            </div>
                        </div>


                    </div>

                    <!-- Modal footer -->

                </div>
            </div>
        </div>
    @endsection
    @section('javascript')
        <script src="{{ asset('assets/angularjs/angular.min.js') }}"></script>
        <script src="{{ asset('assets/angularjs/angular-route.min.js') }}"></script>
        <script src="{{ asset('assets/angularjs/angular-datatables.min.js') }}"></script>
        <script src="{{ asset('assets/angularjs/sweetalert.min.js') }}"></script>
        <script src="{{ asset('assets/js/arsip/guru/app.js') }}"></script>
        <script src="{{ asset('assets/js/arsip/guru/service.js') }}"></script>
    @endsection
