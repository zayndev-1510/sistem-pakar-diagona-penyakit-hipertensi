<?php

use App\Http\Controllers\admin\dao\CGejala;
use App\Http\Controllers\admin\dao\CPenyakit;
use Illuminate\Support\Facades\Route;

Route::prefix("admin")->group(function(){

    route::get("welcome",function(){
        echo json_encode([
            "message"=>"Welcome"
        ]);
    });
    // Manajemen data penyakit

    route::get("data-penyakit",[CPenyakit::class,"loadData"]);
    route::post("save-data-penyakit",[CPenyakit::class,"saveData"]);
    route::post("update-data-penyakit",[CPenyakit::class,"updateData"]);
    route::post("delete-data-penyakit",[CPenyakit::class,"deleteData"]);

    // Manajemen data gejala

    route::get("data-gejala",[CGejala::class,"loadData"]);
    route::post("save-data-gejala",[CGejala::class,"saveData"]);
    route::post("update-data-gejala",[CGejala::class,"updateData"]);
    route::post("delete-data-gejala",[CGejala::class,"deleteData"]);



});

?>
