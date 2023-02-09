<!DOCTYPE html>
<html lang="en" ng-app="homeApp">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/css/print.css') }}"  media="screen, print">
    <title>Laporan Data Siswa</title>
</head>

<body ng-controller="homeController">
    <div class="header-report">
        <div class="" style="margin-left: auto;margin-right: auto">
            <img src="{{ asset('header/1.jpg') }}">
        </div>
        <div class="" style="text-align: center;border-bottom: 2px solid black;" >
            <p style="font-size: 15px;font-weight: bolder;">YAYASAN PENDIDIKAN ISLAM  (YPI) AN-NASHIHAH BUTON</p>
            <p style="font-size: 25px;font-weight: bolder;margin-top: -10px;">RAUDHATUL ATHFAL (RA) AL MUSLIHUN</p>
            <p style="font-size: 13px;margin-top:-20px;">JL. ERLANGGA NO 247 KEL.BONEBONE KEC BATUPOARO KOTA BAUBAU</p>
            <p style="font-size: 13px;margin-top:-10px;font-weight: bolder;">Izin Op No 153 Tahun 2019 – NSM : 101274720032</p>
        </div>
        <div class="" style="margin-left: auto;margin-right: auto">
            <img src="{{ asset('header/2.png') }}">
        </div>
    </div>
    <div>
        <p style="font-size: 17px;font-weight: bolder;text-align: center;">
            LEMBAR PENILAIAN  ATHFAL (RA) ALMUSLIHUN SEMESTER {{$dataakademik[0]->semester}}
            </p>
            <p style="font-size: 17px;font-weight: bolder;text-align: center;">
               TAHUN AKADEMIK {{$dataakademik[0]->ket}}
                </p>

    </div>
    <div class="col-12">
        <div class="header-profil">
            <div>
                <p style="font-weight: bolder;">Nama Lengkap</p>
            </div>
            <div>
                <p>:</p>
            </div>
            <div>
                <p>@{{nama_siswa}}</p>
            </div>
            <div>
                <p style="margin-top: -10px;font-weight: bolder;">Nama Orang Tua</p>
            </div>
            <div>
                <p style="margin-top: -10px;">:</p>
            </div>
            <div>
                <p style="margin-top: -10px;">@{{nama_orangtua}}</p>
            </div>
            <div>
                <p style="margin-top: -10px;font-weight: bolder;">Kelas</p>
            </div>
            <div>
                <p style="margin-top: -10px;">:</p>
            </div>
            <div>
                <p style="margin-top: -10px;">@{{nama_kelas}}</p>
            </div>

        </div>
        <div class="title" ng-repeat="row in datanilai">
           <p style="font-weight: bolder;">@{{row.ket}}</p>
           <table class="table">
            <thead>
                <tr style="font-size: 13px;text-align: center">
                    <th>No</th>
                    <th>Hasil Belajar Diharapkan</th>
                    <th>Nilai</th>
                    <th>Keterangan Dan Pesan Ustad/Ustazah</th>
                </tr>
            </thead>
            <tbody>
                <tr style="text-align: center;" ng-if="getLengthData(row.datanilai) ==0">
                    <td colspan="4"><p style="font-size: 12px;">Tidak ada data...</p></td>
                </tr>
                <tr ng-repeat="res in row.datanilai" ng-if="getLengthData(row.datanilai) !=0" style="text-align: center;"
                    style="font-size: 12px;">
                    <td>@{{ $index + 1 }}</td>
                    <td>
                        @{{ res.indikator }}
                    </td>
                    <td>
                        @{{ res.nilai }}
                    </td>
                    <td>
                        @{{ res.ulasan }}
                    </td>
                </tr>
            </tbody>
        </table>
        </div>
    </div>
    <script src="{{ asset('assets/angularjs/angular.min.js') }}"></script>
    <script src="{{ asset('assets/angularjs/angular-route.min.js') }}"></script>
    <script src="{{ asset('assets/angularjs/sweetalert.min.js') }}"></script>
    <script src="{{ asset('assets/js/app-kepsek/raport/laporan.js') }}"></script>
    <script src="{{ asset('assets/js/app-kepsek/raport/service.js') }}"></script>
</body>

</html>
