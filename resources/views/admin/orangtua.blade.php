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
            <div class="col-12 mt-5" ng-hide="checkedtable">
                <div class="card">
                    <div class="card-body" id="tabel-toko">
                        <div class="row" style="margin-bottom: 10px;">
                            <div class="col-10">
                                <p style="font-size: 17px;font-family: Poppins;">{{ $data->keterangan }}</p>
                            </div>
                            <div class="col-2">
                                <p id="design-btn-2" style="background-color: #514496;cursor: pointer;"
                                ng-click="tambahData()"> <i class="ti-plus"></i> Orang Tua Baru</p>
                            </div>
                        </div>
                        <div class="data-tab">
                            <table datatable="ng" class="table table-bordered">
                                <thead class="bg-light" style="font-size: 12px;">
                                    <tr class="text-center">
                                        <th>No</th>
                                        <th>Nama Ayah</th>
                                        <th>Tempat Lahir Ayah</th>
                                        <th>Tanggal Lahir Ayah</th>
                                        <th>Nama Ibu</th>
                                        <th>
                                            Aksi
                                        </th>

                                    </tr>
                                </thead>
                                <tbody style="font-size: 12px">
                                    <tr class="text-center" ng-repeat="row in dataorangtua">
                                        <td>@{{ $index + 1 }}</td>
                                        <td>@{{ row.nama_ayah }}</td>
                                        <td>@{{ row.tempat_lahir_ayah }}</td>
                                        <td>@{{ row.tgl_lahir_ayah }}</td>
                                        <td>@{{ row.nama_ibu }}</td>
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
            <div class="col-12 mt-5" style="margin: auto;" ng-show="checkedtambah">
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
                        <div class="data-tab">
                            <div class="row">
                                <div class="col-6">
                                    <p style="margin-left: 5px;margin-bottom: 5px">Data Ayah</p>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <input type="number" class="form-control orangtua" placeholder="NIK">
                                                <p><small style="color: red;"> * </small> Kosongkan jika tidak ada dengan
                                                    tanda "-"</p>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <input type="text" class="form-control orangtua" placeholder="Nama Lengkap">
                                                <p><small style="color: red;"> * </small> Wajib diisi</p>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <input type="text" class="form-control orangtua" placeholder="Tempat Lahir">
                                                <p><small style="color: red;"> * </small> Wajib Diisi</p>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <input type="date" class="form-control orangtua">
                                                <p><small style="color: red;"> * </small> Wajib diisi</p>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <select class="form-control orangtua">
                                                    <option value="">Pilih Agama</option>
                                                    @foreach ($data->agama as $item)
                                                        <option value="<?= $item->id ?>">{{ $item->ket }}
                                                    @endforeach

                                                </select>
                                                <p><small style="color: red;"> * </small> Wajib Diisi</p>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <input type="text" class="form-control orangtua"
                                                    placeholder="Masukan Pekerjaan">
                                                <p><small style="color: red;"> * </small> Kosongkan jika tidak ada dengan
                                                    tanda "-"</p>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-6">
                                    <p style="margin-left: 5px;margin-bottom: 5px">Data Ibu</p>
                                    <div class="row">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <input type="number" class="form-control orangtua" placeholder="NIK">
                                                    <p><small style="color: red;"> * </small> Kosongkan jika tidak ada
                                                        dengan tanda "-"</p>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <input type="text" class="form-control orangtua"
                                                        placeholder="Nama Lengkap">
                                                    <p><small style="color: red;"> * </small> Wajib diisi</p>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <input type="text" class="form-control orangtua"
                                                        placeholder="Tempat Lahir">
                                                    <p><small style="color: red;"> * </small> Wajib Diisi</p>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <input type="date" class="form-control orangtua">
                                                    <p><small style="color: red;"> * </small> Wajib diisi</p>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <select class="form-control orangtua">
                                                        <option value="">Pilih Agama</option>
                                                        @foreach ($data->agama as $item)
                                                            <option value="<?= $item->id ?>">{{ $item->ket }}
                                                        @endforeach

                                                    </select>
                                                    <p><small style="color: red;"> * </small> Wajib Diisi</p>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <input type="text" class="form-control orangtua"
                                                        placeholder="Masukan Pekerjaan">
                                                    <p><small style="color: red;"> * </small> Kosongkan jika tidak ada
                                                        dengan tanda "-"</p>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <p style="margin-left: 5px;margin-bottom: 5px;">Rincian Alamat</p>
                                    <div class="form-group">
                                        <textarea class="form-control orangtua" rows="7" placeholder="Alamat"></textarea>
                                        <p><small style="color: red;"> * </small> Kosongkan jika tidak ada dengan tanda "-"
                                        </p>
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
        <script src="{{ asset('assets/js/orang tua/app.js') }}"></script>
        <script src="{{ asset('assets/js/orang tua/service.js') }}"></script>
    @endsection
