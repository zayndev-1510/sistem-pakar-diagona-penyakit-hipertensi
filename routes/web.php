<?php

use App\Http\Controllers\admin\page\Page;
use Illuminate\Support\Facades\Route;


route::get("home",[Page::class,"homeUser"]);
route::get("konsultasi",[Page::class,"konsultasi"]);

Route::prefix('admin')->group(function () {

    // route utk log in
    route::get("login",[Page::class,"login"]);

    // route utk log out
    route::get("logout",[Page::class,"logout"]);

    // route utk memanggil halaman dashboard
    route::get("/page/dashboard",[Page::class,"halamanDashboard"]);

    // route utk memanggil halaman data penyakit
    route::get("/page/penyakit",[Page::class,"halamanPenyakit"]);

    // route utk memanggil halaman data gejala
    route::get("/page/gejala",[Page::class,"halamanGejala"]);

    // route utk memanggil halaman dashboard
    route::get("/page/basis-pengetahuan",[Page::class,"halamanBasisPengetahuan"]);

    //route utk memanggil halaman aturan
    route::get("/page/aturan",[Page::class,"halamanAturan"]);





});


?>
