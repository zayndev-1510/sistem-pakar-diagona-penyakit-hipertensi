<!DOCTYPE html>
<html lang="en" ng-app="homeApp">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('library/video-js.css') }}">
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
            <a href="#home">Beranda</a>
            <a href="#profil">Profil Sekolah</a>
            <a href="#tertib">Tata Tertib</a>
            <a href="#news">Kegiatan sekolah</a>
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
                <button class="btn-a">Masuk</button>
            </div>

        </div>

    </nav>

    <div class="wrapper">
        <section id="kegiatan" style="display: grid">
            <div class="column-one">
                <h3>Info Kegiatan</h3>
            </div>
            <div class="column-one">
                <div class="konten">
                    <div class="title-card" style="margin-bottom: 20px;">
                        <h4 style="font-size: 20px;text-align: left">@{{ judul }}</h4>
                    </div>
                    <div class="img-card">
                        <video id="myVideo" class="video-js" controls preload="auto" width="1100" height="500"
                            poster="" data-setup="{}">
                            <source src="" type="video/mp4" />
                            <p class="vjs-no-js">
                                To view this video please enable JavaScript, and consider upgrading to a
                                web browser that
                                <a href="https://videojs.com/html5-video-support/" target="_blank">supports HTML5
                                    video</a>
                            </p>
                        </video>
                    </div>

                    <div id="deskripsi-card">

                    </div>
                </div>
            </div>



        </section>

    </div>

    <div id="kontak">
        <div class="footer">
            <div class="footer-section">
                <h3>Kontak Kami</h3>
                <p>Alamat {{ $sekolah[0]->alamat }}</p>
            </div>
            <div class="footer-section">
                <h3>Sosial Media</h3>
                <p>email {{ $sekolah[0]->email }}</p>
            </div>
        </div>
    </div>
    <div id="copyright">
        <div class="wrapper">
            &copy; 2022. <b>TK AL MUSHLIHUN</b> All Right Reserved
        </div>
    </div>
    <script src="{{ asset('assets/js/home/detail.js') }}"></script>
    <script src="{{ asset('assets/js/home/service.js') }}"></script>
    <script src="{{ asset('library/video.js') }}"></script>
    <script src="{{ asset('assets/angularjs/sweetalert.min.js') }}"></script>
</body>

</html>
