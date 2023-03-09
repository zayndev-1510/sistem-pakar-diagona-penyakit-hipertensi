<?php

use App\Http\Controllers\admin\page\Page;
use Illuminate\Support\Facades\Route;


Route::prefix('admin')->group(function () {

    // route utk memanggil halaman data penyakit
    route::get("/page/penyakit",[Page::class,"halamanPenyakit"]);

    // route utk memanggil halaman data gejala
    route::get("/page/gejala",[Page::class,"halamanGejala"]);

});


?>
