<!DOCTYPE html>
<html lang="en" ng-app="homeApp">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/css/landing.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/nav.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style_table.css') }}">
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/images/icon/icon website.png') }}">
    <script src="{{ asset('assets/js/vendor/jquery-2.2.4.min.js') }}"></script>
    <script src="{{ asset('assets/angularjs/angular.min.js') }}"></script>
    <script src="{{ asset('assets/angularjs/angular-route.min.js') }}"></script>
    <title>SISPAK DIAGONOSA PENYAKIT HIPERTENSI</title>
</head>

<body ng-controller="homeController">
   <div class="container">
    <div class="wrapper-tabel">
        <div class="navbar">
            <div class="logo"></div>
            <ul class="navlist">
                <li><a href="http://localhost:8000/home">Home</a></li>
                <li><a href="http://localhost:8000/gejala">Gejala</a></li>
                <li><a href="http://localhost:8000/penyakit">Penyakit</a></li>
                <li><a href="http://localhost:8000/konsultasi">Konsultasi</a></li>

            </ul>
        </div>
        <div class="column-one" style="margin-left: 100px;margin-right: 100px;">
          <div class="column-one formulir-pasien" ng-hide="hasil_data">
            <div id="form-pasien">
                <table class="styled-table">
                    <h3>FORMULIR PASIEN BARU</h3>
                    <h3>PERHATIAN : HARAP MENGISI FORMULIR INI DENGAN BENAR DAN JELAS</h3>
                    <tbody>
                        <tr>
                            <td style="font-family: Poppins;">Nama Lengkap</td>
                            <td>:</td>
                            <td>
                                <input type="text" class="form-control-input pasien"/>
                            </td>
                        </tr>
                        <tr>
                            <td style="font-family: Poppins;">Tempat Lahir</td>
                            <td>:</td>
                            <td>
                                <input type="text" class="form-control-input pasien"/>
                            </td>
                        </tr>
                        <tr>
                            <td style="font-family: Poppins;">Tanggal Lahir</td>
                            <td>:</td>
                            <td>
                                <input type="date" class="form-control-input pasien"/>
                            </td>
                        </tr>
                        <tr>
                            <td style="font-family: Poppins;">Jenis Kelamin</td>
                            <td>:</td>
                            <td>
                                <select class="form-select pasien">
                                    <option value="">Pilih Kelamin</option>
                                    <option value="L">Laki-laki</option>
                                    <option value="W">Wanita</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td style="font-family: Poppins;">Agama</td>
                            <td>:</td>
                            <td>
                                <select class="form-select pasien">
                                    <option value="">Pilih Agama</option>
                                    <option value="islam">Islam</option>
                                    <option value="kristen">Kristen</option>
                                    <option value="katolik">Katolik</option>
                                    <option value="hindu">Hindu</option>
                                    <option value="budha">Budha</option>
                                  </select>
                            </td>
                        </tr>
                        <tr>
                            <td style="font-family: Poppins;">Alamat Rumah</td>
                            <td>:</td>
                            <td>
                                <input type="text" class="form-control-input pasien"/>
                            </td>
                        </tr>
                        <tr>
                            <td style="font-family: Poppins;">Nomor Handphone</td>
                            <td>:</td>
                            <td>
                                <input type="number" class="form-control-input pasien"/>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div id="table-gejala">
                <h3 style="font-family: Poppins;font-size: 20px;text-align: center;">PERHATIAN : SILAKAN PILIH GEJALA YANG DIRASAKAN DENGAN MEMILIH PILIHAN YANG TERSEDIA DIBAWAH INI</h3>
                <table class="styled-table">
                    <thead>
                        <tr style="text-align: center;font-family: Poppins;">
                            <th cla>No</th>
                            <th>Gejala</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr ng-repeat="row in datagejala" style="text-align: center;font-family: Poppins;">
                            <td>@{{$index+1}}</td>
                            <td>@{{row.nama_gejala}}</td>
                            <td>
                                <select class="form-select" ng-model="row.hasil" ng-change="prosesCheck(row.hasil)" style="font-family: Poppins;">
                                    <option ng-repeat="res in row.pilihan" value="@{{res.nilai}}">@{{res.keterangan}}</option>
                                </select>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <button class="btn-action touch" style="width: 300px;font-family: Poppins;
                background-color:#254abe;border-radius: 10px;cursor: pointer;" ng-click="prosesKonsultasi()">Proses</button>
            </div>
          </div>
            <div class="column-two" id="datapakaruser" ng-show="hasil_data">
                <div id="table-pakar">
                    <h4 style="padding: 10px;font-size: 15px;font-family: Poppins;text-align: center;">Data Pakar</h4>
                    <hr></hr>
                    <table class="styled-table">
                        <thead>
                            <tr style="text-align: center;font-family: Poppins;">
                                <th>Penyakit</th>
                                <th>Gejala</th>
                                <th>MB</th>
                                <th>MD</th>
                                <td>CF</td>
                            </tr>
                        </thead>
                        <tbody style="font-size: 12px" ng-repeat="row in datapakar">
                            <tr>

                                <td rowspan="@{{row.x+1}}"
                                    style=" text-align: center;
                                    vertical-align: middle;">
                                    @{{ row.nama_penyakit }}</td>
                            </tr>
                            <tr ng-repeat="res in row.pakar" class="text-center">
                                <td>@{{ res.nama_gejala }}</td>
                                <td>@{{ res.mb }}</td>
                                <td>@{{ res.md }}</td>
                                <td>@{{res.CFPakar}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div id="table-user">
                    <h4 style="padding: 10px;font-size: 15px;font-family: Poppins;text-align: center;">Data User</h4>
                    <hr></hr>
                    <table class="styled-table">
                        <thead>
                            <tr style="text-align: center;font-family: Poppins;">

                                <th>Penyakit</th>
                                <th>Gejala</th>
                                <td>CF</td>
                            </tr>
                        </thead>
                        <tbody style="font-size: 12px" ng-repeat="row in datapakar">
                            <tr>

                                <td rowspan="@{{row.x+1}}"
                                    style=" text-align: center;
                                    vertical-align: middle;">
                                    @{{ row.nama_penyakit }}</td>
                            </tr>
                            <tr ng-repeat="res in row.pakar" class="text-center">
                                <td>@{{ res.nama_gejala }}</td>
                                <td>@{{res.CFuser}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="column-two" id="datahasil" ng-show="hasil_data">
                <div id="table-pakar">
                    <h4 style="padding: 10px;font-size: 15px;font-family: Poppins;text-align: center">Data Hasil Perhitungan I</h4>
                    <hr></hr>
                    <table class="styled-table">
                        <thead>
                            <tr style="text-align: center;font-family: Poppins;">
                                <th>Penyakit</th>
                                <th>Gejala</th>
                                <th>CF</th>
                            </tr>
                        </thead>
                        <tbody style="font-size: 12px" ng-repeat="row in datapakar">
                            <tr>

                                <td rowspan="@{{row.x+1}}"
                                    style=" text-align: center;
                                    vertical-align: middle;">
                                    @{{ row.nama_penyakit }}</td>
                            </tr>
                            <tr ng-repeat="res in row.pakar" class="text-center">
                                <td>@{{ res.nama_gejala }}</td>
                                <td>@{{limitDecimal(res.CFHasil)}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div id="table-user">
                    <h4 style="padding: 10px;font-size: 15px;font-family: Poppins;text-align: center;">Data Hasil Perhitungan II</h4>
                    <hr></hr>
                    <table class="styled-table">
                        <thead>
                            <tr style="text-align: center;font-family: Poppins;">

                                <th>Penyakit</th>
                                <th>Gejala</th>
                                <th>Hasil</th>
                            </tr>
                        </thead>
                        <tbody style="font-size: 12px" ng-repeat="row in datapakar">
                            <tr>

                                <td rowspan="@{{row.x+1}}"
                                    style=" text-align: center;
                                    vertical-align: middle;">
                                    @{{ row.nama_penyakit }}</td>
                            </tr>
                            <tr ng-repeat="res in row.pakar" class="text-center">
                                <td>@{{ res.nama_gejala }}</td>
                                <td>@{{res.hasil}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="column-one" ng-show="hasil_data">
                <div>
                    <h4 style="padding: 10px;font-size: 15px;font-family: Poppins;text-align: center">Data Hasil Perhitungan Forward Chaining</h4>
                    <hr></hr>
                    <table class="styled-table">
                        <thead>
                            <tr style="text-align: center;font-family: Poppins;">
                                <th>No</th>
                                <th>Aturan</th>
                                <th>Gejala</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr ng-repeat="res in datauser" style="text-align: center;font-family: Poppins;">
                                <td>@{{ $index +1 }}</td>
                                <td>@{{res.kode_gejala}}</td>
                                <td>@{{res.gejala}}</td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr style="font-family: Poppins;">
                                <td>Aturan Yang Didapatkan</td>
                                <td>:</td>
                                <td>@{{rules}}</td>
                            </tr>
                            <tr style="font-family: Poppins;">
                                <td>Penyakit</td>
                                <td>:</td>
                                <td>@{{penyakit}}</td>
                            </tr>

                        </tfoot>
                    </table>
                </div>
            </div>
            <div class="column-one" ng-show="hasil_data">
                <div>
                    <h4 style="padding: 10px;font-size: 15px;font-family: Poppins;text-align: center">Data Hasil Perhitungan Certainly Factor</h4>
                    <hr></hr>
                    <table class="styled-table">
                        <thead>
                            <tr style="text-align: center;font-family: Poppins;">
                                <th>Penyakit</th>
                                <th>Hasil</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr ng-repeat="res in datahasil" style="text-align: center;font-family: Poppins;">
                                <td>@{{ res.penyakit }}</td>
                                <td>@{{res.hasil}} %</td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td style="font-family: Poppins;">Penyakit yang diderita oleh pasien adalah @{{p}} dengan hasil @{{hasilpersen}} %</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>

    </div>
   </div>
   <script>
    const url="{{ env("API_URL_PENGGUNA") }}";
   </script>
    <script src="{{ asset('assets/js/konsultasi/app.js') }}"></script>
    <script src="{{ asset('assets/js/konsultasi/service.js') }}"></script>
    <script src="{{ asset('assets/angularjs/sweetalert.min.js') }}"></script>
</body>

</html>
