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
            <a href="/">Beranda</a>
            <a href="profil-sekolah">Profil Sekolah</a>
            <a href="tata-tertib">Tata Tertib</a>
            <a href="" class="active">Kegiatan sekolah</a>

            <div class="dropdown">
                <button class="dropbtn">Pendaftaran Siswa
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
        <section id="kegiatan" style="display: grid">
            <div class="column-one">
                <h3>Info Kegiatan</h3>
            </div>
            <div class="column-three">
                <div class="konten" ng-repeat="row in datamedia">
                    <div class="img-card">
                        <img ng-src="@{{ row.thumbnail }}">
                    </div>
                    <div class="title-card">
                        <h4>@{{ row.judul }}</h4>
                    </div>
                    <div class="deskripsi-card">
                        <p>@{{ row.deskripsi }}</p>
                    </div>
                    <div class="button-card">
                        <button class="btn" ng-click="detail(row)" style="cursor: pointer;">Selengkapnya</button>
                    </div>
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
                        <img src="{{asset('other/icon fb.png')}}"/>
                    </div>
                    <div>
                        <p style="margin-top: 3px;">{{ $sekolah[0]->email }}</p>

                    </div>

                </div>
                <div class="grid-icon-sosmed">
                    <div>
                        <img src="{{asset('other/icon ig.png')}}"/>
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
            &copy; 2022. <b>TK AL MUSHLIHUN</b> All Right Reserved
        </div>
    </div>
    <script src="{{ asset('assets/js/home/kegiatan.js') }}"></script>
    <script src="{{ asset('assets/js/home/service.js') }}"></script>
    <script src="{{ asset('assets/angularjs/sweetalert.min.js') }}"></script>
</body>

</html>
