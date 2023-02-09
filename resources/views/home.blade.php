<!DOCTYPE html>
<html lang="en" ng-app="homeApp">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/navbar.css') }}">
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/images/icon/icon website.png') }}">
    <script src="{{ asset('assets/js/vendor/jquery-2.2.4.min.js') }}"></script>
    <script src="{{ asset('assets/angularjs/angular.min.js') }}"></script>
    <script src="{{ asset('assets/angularjs/angular-route.min.js') }}"></script>
    <title>SISTEM INFORMASI RA AL MUSHLIHUN</title>
</head>

<body ng-controller="homeController">
    <nav>
        <div class="logo">
            <h3>RA AL MUSLIHUN</h3>
        </div>
        <div class="navbar">
            <a class="active" href="/">Beranda</a>
            <a href="profil-sekolah">Profil Sekolah</a>
            <a href="tata-tertib">Tata Tertib</a>
            <a href="kegiatan-sekolah">Kegiatan Rutin</a>

            <div class="dropdown">
                <button class="dropbtn" style="font-size: 12px;">Pendaftaran Siswa
                    <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-content">
                    <a href="{{ url('daftar') }}">Daftar Siswa</a>
                    <a href="{{ url('cekdaftar') }}"">Cek Hasil Daftar</a>
                </div>
            </div>
            <div>
                <button class="btn-a" ng-click="login()" style="cursor: pointer;">Masuk</button>
            </div>

        </div>

    </nav>
    <div class="wrapper">

        <section id="home">
            <div class="column-header" style="margin-top: 30px;">
                <div class="sub-column-header">
                    <div style="padding: 20px;margin-top: 50px;">
                        <p class="deskripsi" style="font-family: Poppins;font-size: 25px;font-weight: 800;color: white;">Selamat Datang Di
                            {{ $sekolah[0]->nama_sekolah }}</p>
                        <h2 style="font-family: Poppins;font-size: 20px;color: white;">Tetap Sehat, Tetap Semangat</h2>
                        <p style="font-family: Poppins;font-size: 12px;margin-top: -20px;color: white;">
                            {{ $sekolah[0]->ket }}
                        </p>
                        <p class="btn-header attr-btn">Selengkapnya</p>
                    </div>
                    <div>
                        
                    </div>
                    <div>
                        <img src="{{ asset('header/kartun 2.png') }}" class="img-header-top" style="width: 100%;height: 300px;" />
                    </div>
                </div>
            </div>

        </section>

        <section id="kegiatan" style="display: grid">
            <div class="column-one">
                <h3 style="font-family: Poppins;">Info Kegiatan</h3>
            </div>
            <div class="column-three">
                <div class="konten" ng-repeat="row in datamedia">
                    <div class="img-card">
                        <img ng-src="@{{ row.thumbnail }}">
                    </div>
                    <div class="title-card">
                        <h4 style="font-family: Poppins;">@{{ row.judul }}</h4>
                    </div>
                    <div class="deskripsi-card">
                        <p style="font-family: Poppins;font-size: 12px;">@{{ row.deskripsi }}</p>
                    </div>
                    <div class="button-card">
                        <button class="btn" ng-click="detail(row)"
                            style="cursor: pointer;font-family: Poppins;">Selengkapnya</button>
                    </div>
                </div>
            </div>



        </section>

        <section id="profil">
            <div class="kolom">

                <p class="deskripsi" style="font-size: 30px;text-align: center;font-family: Poppins;">Profil Sekolah</p>
                <div class="border-image">
                    <img src="{{ asset('header/1.jpg') }}" class="my-img" />
                </div>
                <p style="font-family: Poppins;">

                    {{ $sekolah[0]->ket }}
                </p>
                <div class="mygrid">
                    <table class="table" style="font-family: Poppins;">
                        <tr>
                            <th>NSPN</th>
                            <td>:</td>
                            <td>{{ $sekolah[0]->nspn }}</td>
                        </tr>
                        <tr>
                            <th>Alamat</th>
                            <td>:</td>
                            <td>{{ $sekolah[0]->alamat }}</td>
                        </tr>
                        <tr>
                            <th>Kode Pos</th>
                            <td>:</td>
                            <td>{{ $sekolah[0]->kode_pos }}</td>
                        </tr>
                        <tr>
                            <th>Provinsi</th>
                            <td>:</td>
                            <td>{{ $sekolah[0]->provinsi }}</td>
                        </tr>
                        <tr>
                            <th>Kota</th>
                            <td>:</td>
                            <td>{{ $sekolah[0]->kota }}</td>
                        </tr>
                        <tr>
                            <th>Kecamatan</th>
                            <td>:</td>
                            <td>{{ $sekolah[0]->kecamatan }}</td>
                        </tr>
                        <tr>
                            <th>Bentuk Pendidikan</th>
                            <td>:</td>
                            <td>{{ $sekolah[0]->pendidikan }}</td>
                        </tr>
                        <tr>
                            <th>SK Pendirian Sekolah</th>
                            <td>:</td>
                            <td>{{ $sekolah[0]->sk_pendirian }}</td>
                        </tr>
                        <tr>
                            <th>Tanggal SK Pendirian Sekolah</th>
                            <td>:</td>
                            <td>{{ $sekolah[0]->tanggal_sk_pendirian }}</td>
                        </tr>
                        <tr>
                            <th>SK Izin Operasional</th>
                            <td>:</td>
                            <td>{{ $sekolah[0]->kecamatan }}</td>
                        </tr>
                        <tr>
                            <th>Tanggal SK Izin Operasional</th>
                            <td>:</td>
                            <td>{{ $sekolah[0]->tanggal_sk_izin }}</td>
                        </tr>

                    </table>

                    <div class="grid-card">
                        <div class="card-1">
                            <div class="card-image">
                                <img src="{{ asset('header/guru.png') }}" />
                            </div>
                            <div class="card-title">
                                <p>Guru Profesional</p>
                            </div>
                            <div class="card-deskripsi" style="font-family: Poppins;font-size: 12px;">
                                <p>Guru yang mampu mendidik anak muridnya menjadi generasi yang mampu bersaing dan
                                    memiliki moral yang baik.</p>
                            </div>
                        </div>
                        <div class="card-2">
                            <div class="card-image">
                                <img src="{{ asset('header/belajar.png') }}" />
                            </div>
                            <div class="card-title">
                                <p>Pembelajaran Khusus</p>
                            </div>
                            <div class="card-deskripsi" style="font-family: Poppins;font-size: 12px;">
                                <p>Penerapan secara khusus suatu metode pembelajaran yang telah disesuaikan dengan
                                    kemampuan dan kebiasaan siswa.</p>
                            </div>
                        </div>
                        <div class="card-3">
                            <div class="card-image">
                                <img src="{{ asset('header/buku.png') }}" />
                            </div>
                            <div class="card-title">
                                <p>Buku & Perpustakaan</p>
                            </div>
                            <div class="card-deskripsi" style="font-family: Poppins;">
                                <p>Buku merupakan bentuk cetakan yang tidak bisa dijauhkan dari aktivitas belajar
                                    mengajar.</p>
                            </div>
                        </div>
                        <div class="card-4">
                            <div class="card-image">
                                <img src="{{ asset('header/Akreditasi.png') }}" />
                            </div>
                            <div class="card-title">
                                <p>Akreditas Sekolah</p>
                            </div>
                            <div class="card-deskripsi" style="font-family: Poppins;">
                                <p>Saat ini sekolah belum terakditasi</p>
                            </div>
                        </div>

                    </div>

                </div>


            </div>
        </section>

        <section id="tertib" style="margin-left: 30px;margin-right: 30px;">
            <div class="kolom" style="text-align: justify">
                <div>

                    <p class="deskripsi" style="font-size: 30px;text-align: center;font-family: Poppins;">Visi</p>
                    <p style="font-size: 15px;font-family:Poppins;">
                        {{ $sekolah[0]->visi->ket }}
                    </p>
                    <p class="deskripsi" style="font-size: 30px;text-align: center;font-family: Poppins;">Misi</p>
                    <?php $no = 1; ?>

                    @foreach ($sekolah[0]->misi as $item)
                        <p style="font-size: 13px;font-family:Poppins;margin-bottom: 5px;">
                            {{ $item->ket }}
                        </p>
                    @endforeach
                </div>
                <div style="margin-top: 20px;">
                    <p class="deskripsi" style="font-size: 25px;text-align: center;font-family: Poppins;">Tata Tertib
                    </p>
                    <p class="deskripsi"
                        style="font-size: 25px;text-align: center;font-family: Poppins;margin-top: -10px;">RA AL
                        MUSLIHUN</p>
                    @foreach ($tata_tertib as $item)
                        <div class="column-deskripsi">
                            <div>
                                <p style="font-size: 13px;font-family:Poppins;margin-bottom: 5px;text-align: justify;">
                                    {{ $no++ . '.' }}</p>
                            </div>
                            <div>
                                <p
                                    style="font-size: 13px;font-family:Poppins;margin-bottom: 5px;text-align: justify;margin-left: 5px;">
                                    {{ $item->ket }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    </div>

    <div id="kontak">
        <div class="footer">
            <div class="footer-section" style="font-family: Poppins;">
                <h3>Kontak Kami</h3>
                <p>Alamat {{ $sekolah[0]->alamat }}</p>
                <p style="margin-top: 3px;">Sulawesi Tenggara Kota Baubau</p>
            </div>
            <div class="footer-section" style="font-family: Poppins;">
                <h3>Sosial Media</h3>
                <div class="grid-icon-sosmed">
                    <div>
                        <img src="{{ asset('other/icon fb.png') }}" />
                    </div>
                    <div>
                        <p style="margin-top: 3px;">{{ $sekolah[0]->email }}</p>

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
            &copy; 2022. <b>RA AL MUSHLIHUN</b> All Right Reserved
        </div>
    </div>

    <script src="{{ asset('assets/js/home/app.js') }}"></script>
    <script src="{{ asset('assets/js/home/service.js') }}"></script>
    <script src="{{ asset('assets/angularjs/sweetalert.min.js') }}"></script>
</body>

</html>
