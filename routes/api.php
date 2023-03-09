<?php

use App\Http\Controllers\admin\dao\CPenyakit;
use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Controller;

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
});

?>
