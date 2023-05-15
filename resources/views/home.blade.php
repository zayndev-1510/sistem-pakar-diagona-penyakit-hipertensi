<!DOCTYPE html>
<html lang="en" ng-app="homeApp">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/css/landing.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/nav.css') }}">
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/images/icon/icon website.png') }}">
    <script src="{{ asset('assets/js/vendor/jquery-2.2.4.min.js') }}"></script>
    <script src="{{ asset('assets/angularjs/angular.min.js') }}"></script>
    <script src="{{ asset('assets/angularjs/angular-route.min.js') }}"></script>
    <title>SISPAK DIAGONOSA PENYAKIT HIPERTENSI</title>
</head>

<body ng-controller="homeController">
   <div class="container">
    <div class="wrapper">
        <div class="navbar">
            <div class="logo"></div>
            <ul class="navlist">
                <li><a href="http://localhost:8000/home" class="active">Home</a></li>
                <li><a href="http://localhost:8000/gejala">Gejala</a></li>
                <li><a href="http://localhost:8000/penyakit">Penyakit</a></li>
                <li><a href="http://localhost:8000/konsultasi">Konsultasi</a></li>

            </ul>
        </div>
        <div class="hero">
            <img src="{{ asset("hipertensi_2.jpg")}}"/>
            <div class="content">
                <h3>Diagonosa Penyakit Hipertensi</h3>
                <h1>Perbandingan Metode Forward Chaining Dan Certainly Factor</h1>
                <p>
                    Hipertensi adalah pengertian medis dari penyakit tekanan darah tinggi. Kondisi ini dapat menyebabkan berbagai macam komplikasi kesehatan yang membahayakan nyawa jika dibiarkan. Bahkan, gangguan ini dapat menyebabkan peningkatan risiko terjadinya penyakit jantung, stroke, hingga kematian.
                </p>
                <button ng-click="halamanKonsultasi()">Konsultasi</button>
            </div>
        </div>
    </div>
   </div>
   <script>
    const url="{{ env("API_URL_PENGGUNA") }}";
   </script>
    <script src="{{ asset('assets/js/home/app.js') }}"></script>
    <script src="{{ asset('assets/js/home/service.js') }}"></script>
    <script src="{{ asset('assets/angularjs/sweetalert.min.js') }}"></script>
</body>

</html>
