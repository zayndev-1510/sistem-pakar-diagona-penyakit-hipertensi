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
    <title>SISPAK DIAGONOSA PENYAKIT HIPERTENSI</title>
</head>

<body ng-controller="homeController">
    <nav>
        <div class="logo">
            <h3>SISPAK DIAGONOSA PENYAKIT HIPERTENSI</h3>
        </div>
        <div class="navbar">
            <a class="active" href="home">Beranda</a>
            <a href="gejala">Gejala</a>
            <a href="penyakit">Penyakit</a>
        </div>

    </nav>
    <section id="home">
        <div class="column-header" style="margin-left: 50px;margin-right: 50px;">
            <div class="sub-column-header">
                <div style="padding: 20px;margin-top: 80px;">
                    <p class="deskripsi" style="font-family: Poppins;font-size: 25px;font-weight: 800;color: white;">Selamat Datang Di
                       Diagonosa Penyakit Hipertensi</p>
                    <h2 style="font-family: Poppins;font-size: 20px;color: white;">Tetap Sehat, Tetap Semangat</h2>
                    <p style="font-family: Poppins;font-size: 12px;margin-top: -20px;color: white;">

                    </p>
                    <p class="btn-header attr-btn" ng-click="pageKonsultasi()">Konsultasi</p>
                </div>
                <div>

                </div>
                <div>
                    <img src="{{ asset('Hipertensi_mempengaruhi_seluruh_tubuh_MRHP.jpg') }}" class="img-header-top" style="width: 100%;height: 300px;" />
                </div>
            </div>
        </div>
    </section>
    <div id="kontak">
        <div class="footer">
            <div class="footer-section" style="font-family: Poppins;">
                <h3>Kontak Kami</h3>
                <p>Alamat</p>
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
            &copy; 2022. <b>SISTEM PAKAR DIAGONOSA PENYAKIT HIPERTENSI</b> All Right Reserved
        </div>
    </div>

    <script src="{{ asset('assets/js/home/app.js') }}"></script>
    <script src="{{ asset('assets/js/home/service.js') }}"></script>
    <script src="{{ asset('assets/angularjs/sweetalert.min.js') }}"></script>
</body>

</html>
