<!DOCTYPE html>
<html lang="en" ng-app="homeApp">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style_table.css') }}">
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/images/icon/icon website.png') }}">
    <script src="{{ asset('assets/js/vendor/jquery-2.2.4.min.js') }}"></script>
    <script src="{{ asset('assets/angularjs/angular.min.js') }}"></script>
    <script src="{{ asset('assets/angularjs/angular-route.min.js') }}"></script>
    <title>Diagonsa Penyakit Hipertensi</title>
</head>

<body ng-controller="homeController">
    <nav>
        <div class="logo">
            <h3>Diagona Penyakit Hipertensi</h3>
        </div>
        <div class="navbar">
            <a class="active" href="/">Beranda</a>
            <a href="profil-sekolah">Profil Sekolah</a>
            <a href="tata-tertib">Tata Tertib</a>
            <a href="kegiatan-sekolah">Kegiatan Rutin</a>
        </div>
    </nav>
    <div class="column-one" style="margin-left: 100px;margin-right: 100px;">
        <div id="table-gejala">
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
        <div class="column-two" id="datapakaruser">
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
        <div class="column-two" id="datahasil">
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
                            <td>@{{res.CFHasil}}</td>
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
        <div class="column-one">
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
                        <tr>
                            <td>Aturan Yang Didapatkan</td>
                            <td>:</td>
                            <td>@{{rules}}</td>
                        </tr>
                        <tr>
                            <td>Penyakit</td>
                            <td>:</td>
                            <td>@{{penyakit}}</td>
                        </tr>

                    </tfoot>
                </table>
            </div>
        </div>
        <div class="column-one">
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
                </table>
            </div>
        </div>

    </div>

    <div id="kontak">
        <div class="footer">
            <div class="footer-section" style="font-family: Poppins;">
                <h3>Kontak Kami</h3>
                <p>Alamat Jln Ahmad Yani</p>
                <p style="margin-top: 3px;">Sulawesi Tenggara Kota Baubau</p>
            </div>
            <div class="footer-section" style="font-family: Poppins;">
                <h3>Sosial Media</h3>
                <div class="grid-icon-sosmed">
                    <div>
                        <img src="{{ asset('other/icon fb.png') }}" />
                    </div>
                    <div>
                        <p style="margin-top: 3px;"></p>

                    </div>

                </div>
                <div class="grid-icon-sosmed">
                    <div>
                        <img src="{{ asset('other/icon ig.png') }}" />
                    </div>
                    <div>
                        <p style="margin-top: 3px;">@raalumuslihun</p>
                    </div>

                </div>

            </div>
        </div>
    </div>
    <div id="copyright">
        <div class="wrapper" style="font-family: Poppins;">
            &copy; 2022. <b>SISTEM PAKAR DIAGONOSA HIPERTENSI</b> All Right Reserved
        </div>
    </div>

    <script src="{{ asset('assets/js/konsultasi/app.js') }}"></script>
    <script src="{{ asset('assets/js/konsultasi/service.js') }}"></script>

    <script src="{{ asset('assets/angularjs/sweetalert.min.js') }}"></script>
</body>

</html>
