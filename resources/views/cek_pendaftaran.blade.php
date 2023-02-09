<!DOCTYPE html>
<html lang="en" ng-app="homeApp">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/css/home.css') }}">
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/images/icon/icon website.png') }}">
    <script src="{{ asset('assets/js/vendor/jquery-2.2.4.min.js') }}"></script>
    <script src="{{ asset('assets/angularjs/angular.min.js') }}"></script>
    <script src="{{ asset('assets/angularjs/angular-route.min.js') }}"></script>
    <title>SISTEM INFORMASI RA AL MUSHLIHUN</title>
</head>

<body ng-controller="homeController">

    <div class="wrapper">
        <div class="card-check-hasil" id="c1">
            <h3>Cek hasil Pendaftaran</h3>
            <div class="check-search">
                <input type="text" placeholder="Cari No.Pendaftaran.........." class="my-input search">
                <button class="btn-search" ng-click="cekHasil()">Pencarian</button>
            </div>
            <div class="information-hasil">
                <h3>Hasil Seleksi Pendaftaran </h3>
                <div class="tgl-daftar-caption">
                    <p>Tanggal Pendaftaran</p>
                    <p style="text-align: right">@{{ tgl_daftar }}</p>
                </div>
                <div class="tgl-daftar-caption">
                    <p>Status</p>
                    <p style="text-align: right;color:#60E934;font-weight: bolder;" ng-if="status==3">Sedang diproses
                    </p>
                    <p style="text-align: right;color:#FFD04C;font-weight: bolder;" ng-if="status==2">Belum dikonfirmasi
                    </p>
                    <p style="text-align: right;color:#E96034;font-weight: bolder;" ng-if="status==0">Tidak Lulus</p>
                    <p style="text-align: right;color:#7985DE;font-weight: bolder;" ng-if="status==1">Lulus</p>
                </div>
                <p ng-if="status==1" style="font-size: 13px;font-family:'comic sans ms';margin-bottom: 10px;">Selamat
                    anda lulus pendaftaran silakan klik tombol lanjut untuk proses berikutnya</p>
                <p style="background-color:#5D50C6;color:white;padding:10px;margin-bottom: 20px;">IDENTITAS DIRI</p>

                <div class="konten">
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

                <div class="konten">
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

                <div class="konten">
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

                <div class="">
                    <button class="btn-daftar" style="width: 100%" ng-if="status==1" ng-click="lanjut()">Lanjut</button>
                </div>

            </div>
        </div>

        <div class="card-check-hasil" id="c2">
            <div class="information-hasil">
                <p ng-if="akun==0" style="font-size: 17px;font-family: 'comic sans ms';color:#5D50C6">Hai Kak, silakan
                    buat akun dulu</p>
                <div class="konten" style="margin-top: 20px;">

                    <p>Username </p>
                    <p>:</p>
                    <input type="text" class="my-input" placeholder="Masukan username" id="username">

                    <p>Sandi </p>
                    <p>:</p>
                    <input type="password" class="my-input" placeholder="Masukan Kata Sandi" id="kata_sandi">

                </div>

                <p style="font-size: 12px;font-family: 'comic sans m';color:#E96034">Catatan : Akun tersebut bisa
                    dipakai untuk login agar bisa mengakses halaman dashboard pengguna jadi jangan sampai lupa ya akun yg telah dibuat</p>


                <div class="">
                    <button class="btn-daftar" style="width: 100%" ng-if="akun==0"
                        ng-click="aktifkan()">Daftar</button>
                </div>
            </div>


        </div>

    </div>

    <script src="{{ asset('assets/js/daftar/cek.js') }}"></script>
    <script src="{{ asset('assets/js/daftar/service.js') }}"></script>
    <script src="{{ asset('assets/angularjs/sweetalert.min.js') }}"></script>
</body>

</html>
