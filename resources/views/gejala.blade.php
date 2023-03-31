<!DOCTYPE html>
<html lang="en" ng-app="homeApp">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/css/landing.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/nav.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style_table.css') }}">
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/images/icon/icon website.png') }}">
    <script src="{{ asset('assets/js/vendor/jquery-2.2.4.min.js') }}"></script>
    <script src="{{ asset('assets/angularjs/angular.min.js') }}"></script>
    <script src="{{ asset('assets/angularjs/angular-route.min.js') }}"></script>
    <title>SISPAK DIAGONOSA PENYAKIT HIPERTENSI</title>
</head>

<body ng-controller="homeController">
   <div class="container">
    <div class="wrapper-tabel">
        <div class="navbar">
            <div class="logo"></div>
            <ul class="navlist">
                <li><a href="http://localhost:8000/home">Home</a></li>
                <li><a href="http://localhost:8000/gejala">Gejala</a></li>
                <li><a href="http://localhost:8000/penyakit">Penyakit</a></li>
                <li><a href="http://localhost:8000/konsultasi">Konsultasi</a></li>

            </ul>
        </div>
        <div class="hero">

            <div class="content">
                <table class="styled-table">
                    <thead>
                        <tr style="text-align: center;font-family: Poppins;">
                            <th>No</th>
                            <th>Gejala</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr ng-repeat="res in datagejala" style="text-align: center;font-family: Poppins;">
                            <td>@{{ $index +1 }}</td>
                            <td>@{{res.nama_gejala}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
   </div>
   <script>
    const url="{{ env("API_URL_PENGGUNA") }}";
   </script>
    <script src="{{ asset('assets/js/home/gejala.js') }}"></script>
    <script src="{{ asset('assets/js/home/service.js') }}"></script>
    <script src="{{ asset('assets/angularjs/sweetalert.min.js') }}"></script>
</body>

</html>
