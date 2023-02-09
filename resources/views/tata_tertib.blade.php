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
            <a href="" class="active">Tata Tertib</a>
            <a href="kegiatan-sekolah">Kegiatan sekolah</a>

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
    <?php $no=1;?>
    <div class="wrapper">
        <section id="tertib">
            <div class="kolom">
                <div style="margin-top: 20px;">
                    <p class="deskripsi" style="font-size: 25px;text-align: center;font-family: Poppins;">Tata Tertib</p>
                    <p class="deskripsi" style="font-size: 25px;text-align: center;font-family: Poppins;margin-top: -10px;">RA AL MUSLIHUN</p>
                    @foreach ($tata_tertib as $item)
                        <p style="font-size: 13px;font-family:Poppins;margin-bottom: 5px;">
                           {{$no++}} . {{ $item->ket }}
                        </p>
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
        <div class="wrapper">
            &copy; 2022. <b>TK AL MUSHLIHUN</b> All Right Reserved
        </div>
    </div>

    <script src="{{ asset('assets/js/home/app.js') }}"></script>
    <script src="{{ asset('assets/js/home/service.js') }}"></script>
    <script src="{{ asset('assets/angularjs/sweetalert.min.js') }}"></script>
</body>

</html>
