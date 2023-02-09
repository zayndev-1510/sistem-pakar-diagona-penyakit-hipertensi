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
        <div class="card-daftar" id="elemendaftar">
            <div class="card-header-daftar">
                <div>
                    <img src="{{ asset('header/1.jpg') }}">
                </div>
                <div class="card-deskripsi-daftar">
                    <p>PENERIMAAN PESERTA DIDIK BARU {{ $sekolah[0]->nama_sekolah }}</p>
                    <p>TAHUN AJARAN {{ $tahun_ajaran[0]->ket }}</p>
                    <p>PENDIDIKAN ANAK USIA DINI (PAUD)</p>
                </div>
            </div>
            <p style="background-color:#5D50C6;color:white;padding:10px;">IDENTITAS ANAK</p>
            <div class="card-form-daftar">
                <p style="font-size: 13px;">1. Nama Lengkap </p>
                <p>:</p>
                <input type="text" class="my-input identitas" placeholder="Masukan Nama Lengkap">

                <p style="font-size: 13px;">2. NIK </p>
                <p>:</p>
                <input type="text" class="my-input identitas" placeholder="Masukan NIK">

                <p style="font-size: 13px;">3. Tempat Lahir </p>
                <p>:</p>
                <input type="text" class="my-input identitas" placeholder="Masukan Tempat Lahir">

                <p style="font-size: 13px;">4. Tanggal Lahir </p>
                <p>:</p>
                <input type="date" class="my-input identitas">

                <p style="font-size: 13px;">5. Agama </p>
                <p>:</p>
                <select class="identitas">
                    <option value="">Pilih Agama</option>
                    @foreach ($agama as $row)
                        <option value="{{ $row->id }}">{{ $row->ket }}</option>
                    @endforeach
                </select>

                <p style="font-size: 13px;">6. Jenis Kelamin </p>
                <p>:</p>
                <select class="identitas">
                    <option value="">Pilih Jenis Kelamin</option>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>

                <p style="font-size: 13px;">7. Warga Kewarnegaraan </p>
                <p>:</p>
                <p><input type="text" class="my-input identitas" placeholder="Masukan warga negara"></p>

                <p style="font-size: 13px;">8. Tinggal bersama </p>
                <p>:</p>
                <p><input type="text" class="my-input identitas" placeholder="Masukan dengan siapa anak tinggal"></p>

                <p style="font-size: 13px;">9. Anak Ke </p>
                <p>:</p>
                <p><input type="number" class="my-input identitas" placeholder="Masukan anak ke berapa dalam keluarga">
                </p>

                <p style="font-size: 13px;">10. Usia </p>
                <p>:</p>
                <p><input type="text" class="my-input identitas" placeholder="Masukan Usia Anak"></p>
                <p style="font-size: 13px;">11. Alamat </p>
                <p>:</p>
                <p><input type="text" class="my-input identitas" placeholder="Masukan Alamat"></p>
            </div>
            <p style="background-color:#5D50C6;color:white;padding:10px;">ORANG TUA</p>
            <div class="card-form-daftar">
                <p style="font-size: 13px;">1. Nama Ayah </p>
                <p>:</p>
                <input type="text" class="my-input ayah" placeholder="Masukan Nama">

                <p style="font-size: 13px;padding-left: 15px;"> NIK </p>
                <p>:</p>
                <input type="number" class="my-input ayah" placeholder="Masukan NIK">

                <p style="font-size: 13px;padding-left: 15px;">Tempat Lahir</p>
                <p>:</p>
                <input type="text" class="my-input ayah" placeholder="Masukan Tempat Lahir">

                <p style="font-size: 13px;padding-left: 15px;">Tanggal Lahir </p>
                <p>:</p>
                <input type="date" class="my-input ayah">
                <p style="font-size: 13px;padding-left: 15px;">Agama </p>
                <p>:</p>
                <select class="ayah">
                    <option value="">Pilih Agama</option>
                    @foreach ($agama as $row)
                        <option value="{{ $row->id }}">{{ $row->ket }}</option>
                    @endforeach
                </select>

                <p style="font-size: 13px;padding-left: 15px;">Pekerjaan </p>
                <p>:</p>
                <input type="text" class="my-input ayah" placeholder="Masukan Pekerjaan">
            </div>
            <div class="card-form-daftar">
                <p style="font-size: 13px;">2. Nama Ibu </p>
                <p>:</p>
                <input type="text" class="my-input ibu" placeholder="Masukan Nama">

                <p style="font-size: 13px;padding-left: 15px;"> NIK </p>
                <p>:</p>
                <input type="number" class="my-input ibu" placeholder="Masukan NIK">

                <p style="font-size: 13px;padding-left: 15px;">Tempat Lahir</p>
                <p>:</p>
                <input type="text" class="my-input ibu" placeholder="Masukan Tempat Lahir">

                <p style="font-size: 13px;padding-left: 15px;">Tanggal Lahir </p>
                <p>:</p>
                <input type="date" class="my-input ibu">

                <p style="font-size: 13px;padding-left: 15px;">Agama </p>
                <p>:</p>
                <select class="ibu">
                    <option value="">Pilih Agama</option>
                    @foreach ($agama as $row)
                        <option value="{{ $row->id }}">{{ $row->ket }}</option>
                    @endforeach
                </select>

                <p style="font-size: 13px;padding-left: 15px;">Pekerjaan </p>
                <p>:</p>
                <input type="text" class="my-input ibu" placeholder="Masukan Pekerjaan">
            </div>
            <p style="background-color:#5D50C6;color:white;padding:10px;">PERIODIK</p>
            <div class="card-form-daftar">
                <p style="font-size: 13px;">1. Tinggi Badan </p>
                <p>:</p>
                <input type="number" class="my-input periodik" placeholder="Masukan Tinggi Badan Anak">

                <p style="font-size: 13px;">2. Berat Badan </p>
                <p>:</p>
                <input type="number" class="my-input periodik" placeholder="Masukan Berat Badan Anak">

                <p style="font-size: 13px;">3. Jarak Tempuh </p>
                <p>:</p>
                <input type="number" class="my-input periodik" placeholder="Masukan Jumlah Tempuh Rumah">

                <p style="font-size: 13px;">4. Jumlah Saudara </p>
                <p>:</p>
                <input type="number" class="my-input periodik" placeholder="Masukan Jumlah Saudara">
            </div>

            <p style="background-color:#5D50C6;color:white;padding:10px;">BERKAS</p>
            <div class="card-2-column">
                <div class="column">
                    <p class="caption">Foto Kartu Keluarga</p>
                    <input type="file" id="fotokk" style="display: none;" onchange="preview(event,0)">
                    <img src="{{ asset('other/no image.png') }}" class="set-image" id="muatkk" ng-click="openBerkas(0)">
                </div>
                <div class="column">
                    <p class="caption">Foto Siswa</p>
                    <input type="file" id="fotosiswa" style="display: none;" onchange="preview(event,1)">
                    <img src="{{ asset('other/no image.png') }}" class="set-image" id="muatsiswa" ng-click="openBerkas(1)">
                </div>
                
            </div>
            <button class="btn-daftar center" ng-click="daftar()">Daftar</button>
        </div>
    </div>
    <div class="wrapper">
        <div class="notif-card" id="elemennotif">
            <h3>Terima kasih telah melakukan pendaftaran</h3>
            <h5>Hai kak, silakan di catat kode cek hasil pendaftaran dibawah ini</h5>
            <h3 id="kode_daftar"></h3>
            <div class="list-information">
                <p>1. Gunakan akun diatas dihalaman login</p>
                <p>2. setelah masuk dashboard halaman pengguna</p>
                <p>3. silakan pilih menu cek pendaftaran</p>
            </div>
        </div>
    </div>

    <div id="cover-spin"></div>
    <script src="{{ asset('assets/js/daftar/app.js') }}"></script>
    <script src="{{ asset('assets/js/daftar/service.js') }}"></script>
    <script src="{{ asset('assets/angularjs/sweetalert.min.js') }}"></script>
</body>

</html>
