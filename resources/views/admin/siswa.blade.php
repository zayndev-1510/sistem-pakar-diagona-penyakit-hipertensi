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
            <div class="col-12 mt-5" ng-hide="checkedtable">
                <div class="card">
                    <div class="card-body" id="tabel-toko">
                        <div class="row" style="margin-bottom: 10px;">
                            <div class="col-10">
                              <div class="row">
                                <div class="col-md-2">
                                    <p style="font-size: 17px;margin-top: 3px;">{{ $data->keterangan }}</p>
                                </div>
                                <div class="col-md-3 pull-left">
                                    <select class="form-control" ng-model="searchdata" ng-change="dataByKelas(searchdata)">

                                        <option value="@{{row.value}}" ng-repeat="row in datasearch">@{{row.caption}}</option>
                                    </select>
                                </div>
                                <div class="col-md-3 pull-left">
                                    <select class="form-control" ng-model="searchdata2" ng-change="dataByAkademik(searchdata2)">
                                        <option value="">Pilih Tahun Ajaran</option>
                                        <option value="All">Semua</option>
                                        <option value="@{{row.id}}" ng-repeat="row in data_akademik">@{{row.tahun_akademik}}</option>
                                    </select>
                                </div>
                              </div>
                            </div>
                            <div class="col-2">
                                <p id="design-btn-2" style="background-color: #514496;cursor: pointer;"
                                    ng-click="tambahData()"> <i class="ti-plus"></i> Siswa Baru</p>
                            </div>
                        </div>
                        <div class="data-tab">
                            <table datatable="ng" class="table table-bordered">
                                <thead class="bg-light" style="font-size: 12px;">
                                    <tr class="text-center">
                                        <th>No</th>
                                        <th>NISM</th>
                                        <th>Nama Siswa</th>
                                        <th>Nama Ayah</th>
                                        <th>Nama Ibu</th>
                                        <th>Kelas</th>
                                        <th>
                                            Aksi
                                        </th>
                                    </tr>
                                </thead>
                                <tbody style="font-size: 12px">
                                    <tr class="text-center" ng-repeat="row in datasiswa">
                                        <td>@{{ $index + 1 }}</td>
                                        <td>@{{ row.nis }}</td>
                                        <td>@{{ row.nama_lengkap }}</td>
                                        <td>@{{ row.nama_ayah }}</td>
                                        <td>@{{ row.nama_ibu }}</td>
                                        <td>@{{ row.nama_kelas }}</td>
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
            <div class="col-8 mt-5" style="margin: auto;" ng-show="checkedtambah">
                <div class="card">
                    <div class="card-body">
                        <div class="header-title">
                            <div class="row">
                                <div class="col-10">
                                    <i class="ti-angle-left" style="cursor: pointer" ng-hide="checkortu"
                                        ng-click="kembali()"></i>
                                    <i class="ti-angle-left" style="cursor: pointer" ng-show="checkortu"
                                        ng-click="selesai()"></i>
                                </div>
                                <div class="col-2">
                                    <p>@{{ ket }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="data-tab" ng-hide="checkortu">
                            <div class="row">
                                <div class="col-12">
                                    <h4>Profil Siswa</h4>
                                    <hr></hr>
                                    <div class="row">
                                        <div class="col-10">
                                            <p style="font-family: Poppins;font-size: 15px;font-weight: 800">Tanggal Penerimaan</p>
                                        </div>
                                        <div class="col-2">
                                            <input type="date" class="form-control" id="tgl_penerimaan" placeholder="NIS" style="font-family: Poppins;font-size: 12px;">
                                        </div>
                                      <div class="col-12" style="margin-bottom: 10px;">
                                        <div style="border-bottom: 2px solid whitesmoke;"></div>
                                      </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <input type="number" class="form-control siswa" placeholder="NIS" style="font-family: Poppins;font-size: 12px;">
                                                <p style="font-family: Poppins;font-size: 12px;"><small style="color: red;"> * </small> Kosongkan jika tidak ada dengan
                                                    tanda "-"</p>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <input type="number" class="form-control siswa" placeholder="NIK" style="font-family: Poppins;font-size: 12px;">
                                                <p style="font-family: Poppins;font-size: 12px;"><small style="color: red;"> * </small> Wajib Diisi</p>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <input type="text" class="form-control siswa" placeholder="Nama Lengkap" style="font-family: Poppins;font-size: 12px;">
                                                <p style="font-family: Poppins;font-size: 12px;"><small style="color: red;"> * </small> Wajib diisi</p>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <input type="text" class="form-control siswa" placeholder="Tempat Lahir" style="font-family: Poppins;font-size: 12px;">
                                                <p style="font-family: Poppins;font-size: 12px;"><small style="color: red;"> * </small> Wajib Diisi</p>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <input type="date" class="form-control siswa" style="font-family: Poppins;font-size: 12px;">
                                                <p style="font-family: Poppins;font-size: 12px;"><small style="color: red;"> * </small> Wajib Diisi</p>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <select class="form-control siswa" style="font-family: Poppins;font-size: 12px;">
                                                    <option value="">Pilih Jenis Kelamin</option>
                                                    <option value="L">Laki-laki</option>
                                                    <option value="P">Perempuan</option>
                                                </select>
                                                <p style="font-family: Poppins;font-size: 12px;"><small style="color: red;"> * </small> Wajib Diisi</p>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <select class="form-control siswa" style="font-family: Poppins;font-size: 12px;">
                                                    <option value="">Pilih Agama</option>
                                                    @foreach ($data->agama as $item)
                                                        <option value="<?= $item->id ?>">{{ $item->keterangan }}
                                                    @endforeach
                                                </select>
                                                <p style="font-family: Poppins;font-size: 12px;"><small style="color: red;"> * </small> Wajib Diisi</p>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <select class="form-control siswa" style="font-family: Poppins;font-size: 12px;">
                                                    <option value="">Pilih Kelas</option>
                                                    @foreach ($data->kelas as $item)
                                                        <option value="<?= $item->id_kelas ?>">{{ $item->keterangan }}
                                                    @endforeach
                                                </select>
                                                <p style="font-family: Poppins;font-size: 12px;"><small style="color: red;"> * </small> Wajib Diisi</p>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <select class="form-control siswa" style="font-family: Poppins;font-size: 12px;">
                                                    <option value="">Pilih Tahun Ajaran</option>
                                                    @foreach ($data->tahunajaran as $item)
                                                        <option value="<?= $item->id_tahun_ajaran ?>">{{ $item->tahun_akademik }}
                                                    @endforeach
                                                </select>
                                                <p style="font-family: Poppins;font-size: 12px;"><small style="color: red;"> * </small> Wajib Diisi</p>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-12">
                                    <h4>Asal Sekolah</h4>
                                    <hr></hr>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <input type="text" class="form-control sekolah" placeholder="Asal Sekolah Dasar" style="font-family: Poppins;font-size: 12px;">
                                                <p style="font-family: Poppins;font-size: 12px;"><small style="color: red;"> * </small> Kosongkan jika tidak ada dengan
                                                    tanda "-"</p>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group">
                                                <input type="text" class="form-control sekolah" placeholder="Asal Sekolah Menengah" style="font-family: Poppins;font-size: 12px;">
                                                <p style="font-family: Poppins;font-size: 12px;"><small style="color: red;"> * </small> Kosongkan jika tidak ada dengan
                                                    tanda "-"</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <h4>Status Keluarga</h4>
                                    <hr></hr>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <input type="number" class="form-control siswa" placeholder="Anak ke-" style="font-family: Poppins;font-size: 12px;">
                                                <p style="font-family: Poppins;font-size: 12px;"><small style="color: red;"> * </small> Kosongkan jika tidak ada dengan
                                                    tanda "-"</p>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group">
                                                <input type="text" class="form-control siswa" placeholder="Status Dalam Keluarga" style="font-family: Poppins;font-size: 12px;">
                                                <p style="font-family: Poppins;font-size: 12px;"><small style="color: red;"> * </small> Kosongkan jika tidak ada dengan
                                                    tanda "-"</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12"
                                    style="padding: 5px;margin-bottom: 10px;margin-left: 10px;">
                                    <h4>Orang Tua</h4>
                                    <hr></hr>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <input type="text" class="form-control ortu" placeholder="Nama Ayah" style="font-family: Poppins;font-size: 12px;">
                                                <p style="font-family: Poppins;font-size: 12px;"><small style="color: red;"> * </small> Kosongkan jika tidak ada dengan
                                                    tanda "-"</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <input type="text" class="form-control ortu" placeholder="Nama Ibu" style="font-family: Poppins;font-size: 12px;">
                                                <p style="font-family: Poppins;font-size: 12px;"><small style="color: red;"> * </small> Kosongkan jika tidak ada dengan
                                                    tanda "-"</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <input type="text" class="form-control ortu" placeholder="Pekerjaan Ayah" style="font-family: Poppins;font-size: 12px;">
                                                <p style="font-family: Poppins;font-size: 12px;"><small style="color: red;"> * </small> Kosongkan jika tidak ada dengan
                                                    tanda "-"</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <input type="text" class="form-control ortu" placeholder="Pekerjaan Ibu" style="font-family: Poppins;font-size: 12px;">
                                                <p style="font-family: Poppins;font-size: 12px;"><small style="color: red;"> * </small> Kosongkan jika tidak ada dengan
                                                    tanda "-"</p>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <input type="text" class="form-control ortu" placeholder="Alamat Orang Tua" style="font-family: Poppins;font-size: 12px;">
                                                <p style="font-family: Poppins;font-size: 12px;"><small style="color: red;"> * </small> Kosongkan jika tidak ada dengan
                                                    tanda "-"</p>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <input type="text" class="form-control ortu" placeholder="Nomor Telepon Orang Tua" style="font-family: Poppins;font-size: 12px;">
                                                <p style="font-family: Poppins;font-size: 12px;"><small style="color: red;"> * </small> Kosongkan jika tidak ada dengan
                                                    tanda "-"</p>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-12"
                                style="padding: 5px;margin-bottom: 10px;margin-left: 10px;">
                                <h4>Wali</h4>
                                <hr></hr>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control wali" placeholder="Nama Wali" style="font-family: Poppins;font-size: 12px;">
                                            <p style="font-family: Poppins;font-size: 12px;"><small style="color: red;"> * </small> Kosongkan jika tidak ada dengan
                                                tanda "-"</p>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control wali" placeholder="Pekerjaan Wali" style="font-family: Poppins;font-size: 12px;">
                                            <p style="font-family: Poppins;font-size: 12px;"><small style="color: red;"> * </small> Kosongkan jika tidak ada dengan
                                                tanda "-"</p>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control wali" placeholder="Alamat Wali" style="font-family: Poppins;font-size: 12px;">
                                            <p style="font-family: Poppins;font-size: 12px;"><small style="color: red;"> * </small> Kosongkan jika tidak ada dengan
                                                tanda "-"</p>
                                        </div>
                                    </div>
                                </div>

                            </div>

                                <div class="col-12 col-md-12">
                                    <h4>Berkas Siswa</h4>
                                    <hr></hr>
                                    <div class="row" style="margin-top: 10px;">
                                        <div class="col-6 col-md-6">
                                            <p style="font-family: Poppins;font-size: 12px;">Foto Siswa</p>
                                        </div>
                                        <div class="col-6 col-md-6">
                                            <div class="row">
                                                <div class="col-6 col-md-6" ng-click="openFile(1)">
                                                    <input type="file" id="file1" style="display: none"
                                                        onchange="preview(event,1)" />
                                                    <p id="design-btn-2"
                                                        style="background-color: #514496;cursor: pointer;"> <i
                                                            class="ti-file"></i> Pilh Foto</p>
                                                </div>
                                                <div class="col-6 col-md-6" data-toggle="modal" data-target="#myModal">
                                                    <p id="design-btn-2"
                                                        style="background-color: #CCC;cursor: pointer;color:black;"> <i
                                                            class="ti-eye"></i> Lihat Foto</p>
                                                </div>

                                            </div>

                                        </div>
                                        <div class="col-12 col-md-12">
                                            <p style="font-family: Poppins;font-size: 12px;"><small
                                                    style="color: red">*</small> Format foto image/jpg</p>
                                        </div>
                                    </div>

                                    <div class="row" style="margin-top: 10px;">
                                        <div class="col-6 col-md-6">
                                            <p style="font-family: Poppins;font-size: 12px;">Kartu Keluarga</p>
                                        </div>
                                        <div class="col-6 col-md-6">
                                            <div class="row">
                                                <div class="col-6 col-md-6" ng-click="openFile(2)">
                                                    <input type="file" id="file2" style="display: none"
                                                        onchange="preview(event,2)" />
                                                    <p id="design-btn-2"
                                                        style="background-color: #514496;cursor: pointer;"> <i
                                                            class="ti-file"></i> Pilh Berkas</p>
                                                </div>
                                                <div class="col-6 col-md-6" ng-click="loadBerkas()">
                                                    <p id="design-btn-2"
                                                        style="background-color: #CCC;cursor: pointer;color:black;"> <i
                                                            class="ti-eye"></i> Lihat Berkas</p>
                                                </div>

                                            </div>

                                        </div>
                                        <div class="col-12 col-md-12">
                                            <p style="font-family: Poppins;font-size: 12px;"><small
                                                    style="color: red">*</small> Format berkas pdf</p>
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
                        </div>
                        <div class="data-tab" ng-show="checkortu">
                            <div class="row">
                                <div class="col-12">
                                    <table datatable="ng" class="table table-bordered">
                                        <thead class="bg-light" style="font-size: 12px;">
                                            <tr class="text-center">
                                                <th>No</th>
                                                <th>NIK</th>
                                                <th>Nama Ayah</th>
                                                <th>Nama Ibu</th>

                                            </tr>
                                        </thead>
                                        <tbody style="font-size: 12px">
                                            <tr ng-repeat="row in dataortu" class="text-center"
                                                ng-click="pilihOrtu(row)">
                                                <td>@{{ $index + 1 }}</td>
                                                <td>@{{ row.nik_ayah }}</td>
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
        <div id="cover-spin">
            <div class="modal-message">
                <h2 class="animate">Loading</h2>
            </div>
        </div>
        <div class="modal" id="myModal">
            <div class="modal-dialog">
              <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                  <h4 class="modal-title">Lihat Foto</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <img src="" id="load_foto" class="img-responsive"/>
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
        <script src="{{ asset('assets/js/siswa/app.js') }}"></script>
        <script src="{{ asset('assets/js/siswa/service.js') }}"></script>
    @endsection
