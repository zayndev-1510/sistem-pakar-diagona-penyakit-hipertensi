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
            <div class="col-12 mt-5" ng-hide="checkeddetail">
                <div class="card">
                    <div class="card-body" id="tabel-toko">
                        <div class="row" style="margin-bottom: 10px;">
                            <div class="col-10">
                                <p style="font-size: 17px">{{ $data->keterangan }}</p>
                            </div>

                        </div>
                        <div class="data-tab">
                            <table datatable="ng" class="table table-bordered">
                                <thead class="bg-light" style="font-size: 12px;">
                                    <tr class="text-center">
                                        <th>No</th>
                                        <th>Nama Lengkap</th>
                                        <th>NIK</th>
                                        <th>Tempat Lahir</th>
                                        <th>Tanggal lahir</th>
                                        <th>Tanggal Pendaftaran</th>
                                        <th>Status</th>
                                        <th>
                                            Aksi
                                        </th>
                                    </tr>
                                </thead>
                                <tbody style="font-size: 12px">
                                    <tr ng-repeat="row in datacalon" class="text-center">
                                        <td>@{{ $index + 1 }}</td>
                                        <td>@{{ row.nama_lengkap }}</td>
                                        <td>@{{ row.nik }}</td>
                                        <td>@{{ row.tempat_lahir }}</td>
                                        <td>@{{ row.tgl_lahir }}</td>
                                        <td>@{{ row.tgl_daftar }}</td>
                                        <td>
                                            <p ng-if="row.status==3"
                                                style="font-size: 13px;color:#79dec1;font-weight: bolder;">Sedang diproses
                                            </p>
                                            <p ng-if="row.status==1"
                                                style="font-size: 13px;color:#7985DE;font-weight: bolder;">Lulus</p>
                                            <p ng-if="row.status==2"
                                                style="font-size: 13px;color:#FFD04C;font-weight: bolder;">Belum
                                                dikonfirmasi</p>
                                            <p ng-if="row.status==0"
                                                style="font-size: 13px;color:#E96034;font-weight: bolder;">Tidak Lulus</p>
                                        </td>
                                        <td>
                                            <p style="font-size: 13px;color:#7985DE;font-weight: bolder;cursor: pointer;"
                                                ng-click="detail(row)">Info Selengkapnya</p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-8 mt-5" ng-show="checkeddetail" style="margin: 0 auto;">
                <div class="card">
                    <div class="card-body" id="tabel-toko">
                        <div class="row" style="margin-bottom: 10px;">
                            <div class="col-9">
                                <i class="ti-angle-left" style="cursor: pointer" ng-click="kembali()"></i>
                            </div>
                            <div class="col-3">
                                <select class="form-control" ng-model="cek" ng-change="konfirmasi()">
                                    <option value="">Silakan pilih</option>
                                    <option value="3">Sedang diproses</option>
                                    <option value="2">Belum dikonfirmasi</option>
                                    <option value="1">Lulus</option>
                                    <option value="0">Tidak Lulus</option>
                                </select>
                            </div>
                            <div class="col-9">
                                <p style="font-size: 13px;">Tanggal Pendaftaran</p>
                            </div>
                            <div class="col-3">
                                <p style="font-size: 13px">@{{ tgl_daftar }}</p>
                            </div>
                            <div class="col-9">
                                <p style="font-size: 13px;">Status</p>
                            </div>
                            <div class="col-3">
                                <p style="text-align: right;color:#60E934;font-weight: bolder;" ng-if="status==3">Sedang
                                    diproses</p>
                                <p style="text-align: right;color:#FFD04C;font-weight: bolder;" ng-if="status==2">Belum
                                    dikonfirmasi</p>
                                <p style="text-align: right;color:#E96034;font-weight: bolder;" ng-if="status==0">Tidak
                                    Lulus</p>
                                <p style="text-align: right;color:#7985DE;font-weight: bolder;" ng-if="status==1">Lulus</p>
                            </div>
                        </div>

                        <div class="information-detail">
                            <p style="background-color:#5D50C6;color:white;padding:10px;margin-bottom: 20px;">IDENTITAS DIRI
                            </p>
                            <div class="information-3-colomn">
                                <p>Nama Lengkap </p>
                                <p>:</p>
                                <p class="bottom">@{{ nama_lengkap }}</p>

                                <p>NIK </p>
                                <p>:</p>
                                <p class="bottom">@{{ nik }}</p>

                                <p>Tempat Lahir </p>
                                <p>:</p>
                                <p class="bottom">@{{ tempat_lahir }}</p>

                                <p>Tanggal Lahir </p>
                                <p>:</p>
                                <p class="bottom">@{{ tgl_lahir }}</p>

                                <p>Agama </p>
                                <p>:</p>
                                <p class="bottom">@{{ agama_anak }}</p>

                                <p>Jenis Kelamin</p>
                                <p>:</p>
                                <p class="bottom">@{{ jenis_kelamin }}</p>

                                <p>Warga Kewarnegaraan </p>
                                <p>:</p>
                                <p class="bottom">@{{ warga_negara }}</p>

                                <p>Tinggal bersama </p>
                                <p>:</p>
                                <p class="bottom">@{{ tinggal_bersama }}</p>

                                <p>Anak Ke </p>
                                <p>:</p>
                                <p class="bottom">@{{ anak_ke }}</p>

                                <p>Usia </p>
                                <p>:</p>
                                <p class="bottom">@{{ usia }}</p>

                                <p>Alamat </p>
                                <p>:</p>
                                <p class="bottom">@{{ alamat }}</p>

                                <p>Tinggi badan </p>
                                <p>:</p>
                                <p class="bottom">@{{ tinggi_badan }}</p>

                                <p>Berat badan </p>
                                <p>:</p>
                                <p class="bottom">@{{ berat_badan }}</p>

                                <p>Jarak tempuh </p>
                                <p>:</p>
                                <p class="bottom">@{{ jarak_tempuh }}</p>

                                <p>Jumlah saudara </p>
                                <p>:</p>
                                <p class="bottom">@{{ jumlah_saudara }}</p>
                            </div>

                            <p style="background-color:#5D50C6;color:white;padding:10px;margin-bottom: 20px;">ORANG TUA</p>

                            <div class="information-3-colomn">
                                <p>1. Nama Ayah </p>
                                <p>:</p>
                                <p class="bottom">@{{ nama_ayah }}</p>

                                <p style="padding-left: 15px;"> NIK </p>
                                <p>:</p>
                                <p class="bottom">@{{ nik_ayah }}</p>

                                <p style="padding-left: 15px;">Tempat Lahir</p>
                                <p>:</p>
                                <p class="bottom">@{{ tempat_lahir_ayah }}</p>


                                <p style="padding-left: 15px;">Tanggal Lahir </p>
                                <p>:</p>
                                <p class="bottom">@{{ tgl_lahir_ayah }}</p>

                                <p style="padding-left: 15px;">Agama </p>
                                <p>:</p>
                                <p class="bottom">@{{ agama_ayah }}</p>

                                <p style="padding-left: 15px;">Pekerjaan </p>
                                <p>:</p>
                                <p class="bottom">@{{ pekerjaan_ayah }}</p>
                            </div>

                            <div class="information-3-colomn">
                                <p>2. Nama Ibu </p>
                                <p>:</p>
                                <p class="bottom">@{{ nama_ibu }}</p>


                                <p style="padding-left: 15px;"> NIK </p>
                                <p>:</p>
                                <p class="bottom">@{{ nik_ayah }}</p>


                                <p style="padding-left: 15px;">Tempat Lahir</p>
                                <p>:</p>
                                <p class="bottom">@{{ tempat_lahir_ibu }}</p>

                                <p style="padding-left: 15px;">Tanggal Lahir </p>
                                <p>:</p>
                                <p class="bottom">@{{ tgl_lahir_ibu }}</p>

                                <p style="padding-left: 15px;">Agama </p>
                                <p>:</p>
                                <p class="bottom">@{{ agama_ibu }}</p>


                                <p style="padding-left: 15px;">Pekerjaan </p>
                                <p>:</p>
                                <p class="bottom">@{{ pekerjaan_ibu }}</p>
                            </div>

                            <p style="background-color:#5D50C6;color:white;padding:10px;">BERKAS</p>
                            <div class="card-2-column">
                                <div class="column">
                                    <p class="caption">Foto Kartu Keluarga</p>

                                    <img src="{{ asset('other/no image.png') }}" class="set-image" id="muatkk">
                                </div>
                                <div class="column">
                                    <p class="caption">Foto Siswa</p>
                                    <img src="{{ asset('other/no image.png') }}" class="set-image" id="muatsiswa">
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
    <script src="{{ asset('assets/js/calon/app.js') }}"></script>
    <script src="{{ asset('assets/js/calon/service.js') }}"></script>
@endsection
