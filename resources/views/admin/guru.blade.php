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
                                    ng-click="tambahData()"> <i class="ti-plus"></i> Guru Baru</p>
                            </div>
                        </div>
                        <div class="data-tab">
                            <table datatable="ng" class="table table-bordered">
                                <thead class="bg-light" style="font-size: 13px;">
                                    <tr class="text-center">
                                        <th>No</th>
                                        <th>NIP</th>
                                        <th>Nama Lengkap</th>
                                        <th>Tempat Lahir</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Jenis Kelamin</th>
                                        <th>
                                            Aksi
                                        </th>

                                    </tr>
                                </thead>
                                <tbody style="font-size: 13px">
                                    <tr class="text-center" ng-repeat="row in dataguru">
                                        <td>@{{ $index + 1 }}</td>
                                        <td>@{{ row.nip_guru }}</td>
                                        <td>@{{ row.nama_guru }}</td>
                                        <td>@{{ row.tempat_lahir }}</td>
                                        <td>@{{ row.tgl_lahir }}</td>
                                        <td>@{{row.jenis_kelamin}}</td>
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
            <div class="col-8 mt-5" style="margin: auto;" ng-show="checkedtambah">
                <div class="card">
                    <div class="card-body">
                        <div class="header-title">
                            <div class="row">
                                <div class="col-10">
                                    <i class="ti-angle-left" style="cursor: pointer" ng-click="kembali()"></i>
                                </div>
                                <div class="col-2">
                                    <p>@{{ ket }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="data-tab">
                            <div class="row" ng-show="filefoto">
                                <div class="col-12" style="margin-top: 10px;">
                                    <button class="btn btn-primary btn-block" style="color: white;"
                                        ng-click="editFoto()">Edit Foto</button>

                                </div>
                            </div>
                            <div class="row" ng-hide="filefoto">
                                <div class="col-10">
                                    <p style="font-family: Poppins;font-size: 15px;font-weight: 800">ID KARTU</p>
                                </div>
                                <div class="col-2">
                                    <p style="font-family: Poppins;font-size: 15px;font-weight: 800;">@{{id_card}}</p>
                                </div>
                              <div class="col-12" style="margin-bottom: 10px;">
                                <div style="border-bottom: 2px solid whitesmoke;"></div>
                              </div>
                              <div class="col-12">
                                <p style="font-family: Poppins;font-size: 15px;font-weight: 800;">Biodata Guru</p>
                              </div>
                              <div class="col-12" style="margin-bottom: 10px;">
                                <div style="border-bottom: 2px solid whitesmoke;"></div>
                              </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <input type="number" class="form-control guru" placeholder="NIP"  style="font-family: Poppins;font-size: 12px;">
                                        <p  style="font-family: Poppins;font-size: 12px;"><small style="color: red;"> * </small> Kosongkan jika tidak dengan tanda "-"</p>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control guru" placeholder="Nama Lengkap" style="font-family: Poppins;font-size: 12px;">
                                        <p style="font-family: Poppins;font-size: 12px;"><small style="color: red;"> * </small> Wajib diisi</p>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control guru" placeholder="Tempat Lahir" style="font-family: Poppins;font-size: 12px;">
                                        <p style="font-family: Poppins;font-size: 12px;"><small style="color: red;"> * </small> Wajib Diisi</p>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <input type="date" class="form-control guru" style="font-family: Poppins;font-size: 12px;">
                                        <p style="font-family: Poppins;font-size: 12px;"><small style="color: red;"> * </small> Wajib diisi</p>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <select class="form-control guru" style="font-family: Poppins;font-size: 12px;">
                                            <option value="">Pilih Jenis Kelamin</option>
                                            <option value="L">Laki-laki</option>
                                            <option value="P">Perempuan</option>
                                        </select>
                                        <p style="font-family: Poppins;font-size: 12px;"><small style="color: red;"> * </small> Wajib Diisi</p>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <select class="form-control guru" style="font-family: Poppins;font-size: 12px;">
                                            <option value="">Pilih Agama</option>
                                            @foreach ($data->agama as $item)
                                                <option value="<?= $item->id ?>">{{ $item->keterangan }}
                                            @endforeach

                                        </select>
                                        <p style="font-family: Poppins;font-size: 12px;"><small style="color: red;"> * </small> Wajib Diisi</p>
                                    </div>
                                </div>
                        
                                <div class="col-12">
                                    <p style="font-family: Poppins;font-size: 15px;font-weight: 800;">Pendidikan Guru</p>
                                  </div>
                                  <div class="col-12" style="margin-bottom: 10px;">
                                    <div style="border-bottom: 2px solid whitesmoke;"></div>
                                  </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control guru" placeholder="Gelar Depan" style="font-family: Poppins;font-size: 12px;">
                                        <p style="font-family: Poppins;font-size: 12px;"><small style="color: red;"> * </small> Kosongkan jika tidak ada dengan tanda "-"
                                        </p>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control guru" placeholder="Gelar Belakang" style="font-family: Poppins;font-size: 12px;">
                                        <p style="font-family: Poppins;font-size: 12px;"><small style="color: red;"> * </small> Kosongkan jika tidak ada dengan tanda "-"
                                        </p>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <p style="font-family: Poppins;font-size: 15px;font-weight: 800;">Kontak Guru</p>
                                  </div>
                                  <div class="col-12" style="margin-bottom: 10px;">
                                    <div style="border-bottom: 2px solid whitesmoke;"></div>
                                  </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <input type="number" class="form-control guru" placeholder="Nomor Handphone" style="font-family: Poppins;font-size: 12px;">
                                        <p style="font-family: Poppins;font-size: 12px;"><small style="color: red;"> * </small> Kosongkan jika tidak ada dengan tanda "-"
                                        </p>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <input type="email" class="form-control guru" placeholder="Email" style="font-family: Poppins;font-size: 12px;">
                                        <p style="font-family: Poppins;font-size: 12px;"><small style="color: red;"> * </small> Kosongkan jika tidak ada dengan tanda "-"
                                        </p>
                                    </div>
                                </div>


                                <div class="col-12">
                                    <p style="font-family: Poppins;font-size: 15px;font-weight: 800;">Alamat Rumah Guru</p>
                                  </div>
                                  <div class="col-12" style="margin-bottom: 10px;">
                                    <div style="border-bottom: 2px solid whitesmoke;"></div>
                                  </div>

                                  <div class="col-12">
                                    <div class="form-group">
                                        <textarea class="form-control guru" rows="7" placeholder="Alamat" style="font-family: Poppins;"></textarea>
                                        <p><small style="color: red;"> * </small> Kosongkan jika tidak ada dengan tanda "-"
                                        </p>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <p style="font-family: Poppins;font-size: 15px;font-weight: 800;">Foto Dan Berkas Guru</p>
                                  </div>
                                  <div class="col-12" style="margin-bottom: 10px;">
                                    <div style="border-bottom: 2px solid whitesmoke;"></div>
                                  </div>

                                <div class="col-12" style="margin-top: 10px;margin-bottom: 10px;">
                                    <div class="row">
                                        <div class="col-8 col-md-8">
                                            <p style="font-family: Poppins;font-size: 12px;">Foto</p>
                                        </div>
                                        <div class="col-2 col-md-2" ng-click="openFoto()">
                                            <input type="file" style="display: none;" id="filefoto" onchange="preview(event,1)">
                                            <p id="design-btn-2" style="cursor: pointer;">Pilih Foto</p>
                                        </div>
                                        <div class="col-2 col-md-2"  data-toggle="modal" data-target="#modalFoto">
                                            <p id="design-btn-2" style="background-color: #F0F1F3;color:black;cursor: pointer;">Lihat Foto</p>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-12" style="margin-top: 10px;margin-bottom: 10px;">
                                    <div class="row">
                                        <div class="col-8 col-md-8">
                                            <p style="font-family: Poppins;font-size: 12px;">KTP</p>
                                        </div>
                                        <div class="col-2 col-md-2" ng-click="openKtp()">
                                            <input type="file" style="display: none;" id="filektp" onchange="preview(event,2)">
                                            <p id="design-btn-2" style="cursor: pointer;">Pilih KTP</p>
                                        </div>
                                        <div class="col-2 col-md-2" ng-click="getKtp()">
                                            <p id="design-btn-2" style="background-color: #F0F1F3;color:black;cursor: pointer;">Lihat KTP</p>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-12" style="margin-top: 10px;margin-bottom: 10px;">
                                    <div class="row">
                                        <div class="col-8 col-md-8">
                                            <p style="font-family: Poppins;font-size: 12px;">SK</p>
                                        </div>
                                        <div class="col-2 col-md-2" ng-click="openKk()">
                                            <input type="file" style="display: none;" id="filekk" onchange="preview(event,3)">
                                            <p id="design-btn-2" style="cursor: pointer;">Pilih KK</p>
                                        </div>
                                        <div class="col-2 col-md-2" ng-click="getKtp()">
                                            <p id="design-btn-2" style="background-color: #F0F1F3;color:black;cursor: pointer;">Lihat SK</p>
                                        </div>
                                    </div>
                                </div>
                              
                                <div class="col-12 pull-right">
                                    <div class="form-group">
                                        <button class="btn btn-primary" ng-click="save()"
                                            ng-show="btnsimpan" style="font-family: Poppins;">SIMPAN</button>
                                        <button class="btn btn-primary" ng-click="perbarui()"
                                            ng-show="btnperbarui">perbarui</button>
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

    <div class="modal" id="modalFoto">
        <div class="modal-dialog">
          <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Lihat Foto</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <img src="" id="image_foto" class="img-responsive"/>
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
    <script src="{{ asset('assets/js/guru/app.js') }}"></script>
    <script src="{{ asset('assets/js/guru/service.js') }}"></script>
@endsection
