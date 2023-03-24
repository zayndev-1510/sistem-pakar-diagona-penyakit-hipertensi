<?php

use App\Http\Controllers\admin\dao\CAturan;
use App\Http\Controllers\admin\dao\CbasisPengetahuanCf;
use App\Http\Controllers\admin\dao\CGejala;
use App\Http\Controllers\admin\dao\Ckonsultasi;
use App\Http\Controllers\admin\dao\Clogin;
use App\Http\Controllers\admin\dao\CPenyakit;
use App\Http\Controllers\admin\dao\PasienControllers;
use Illuminate\Support\Facades\Route;


route::get("coba",[Clogin::class,"cobaCF"]);

// data gejala konsultasi
route::get("data-gejala-konsultasi",[Ckonsultasi::class,"gejalaKonsultasi"]);

// proses konsultasi
route::post("proses-konsultasi",[Ckonsultasi::class,"prosesKonsultasi"]);
route::post("save-pasien",[Ckonsultasi::class,"savePasien"]);

Route::prefix("admin")->group(function(){

    route::get("welcome",function(){
        echo json_encode([
            "message"=>"Welcome"
        ]);
    });

    route::post('loginAdmin',[Clogin::class,"LoginAdmin"]);
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

    // Manajemen Data Basis Pengetahuan Certainly Factor

    route::get("data-kepastian",[CbasisPengetahuanCf::class,"loadDataKepastian"]);
    route::get("data-basis-pengetahuan-cf",[CbasisPengetahuanCf::class,"loadDataBasis"]);
    route::post("save-data-basis-pengetahuan-cf",[CbasisPengetahuanCf::class,"saveData"]);
    route::post("update-data-basis-pengetahuan-cf",[CbasisPengetahuanCf::class,"updateData"]);
    route::post("delete-data-basis-pengetahuan-cf",[CbasisPengetahuanCf::class,"deleteData"]);

    // Manajemen Data Aturan

    route::get("data-aturan",[CAturan::class,"loadData"]);
    route::post("save-data-aturan",[CAturan::class,"saveData"]);
    route::post("update-data-aturan",[CAturan::class,"updateData"]);
    route::post("delete-data-aturan",[CAturan::class,"deleteData"]);

    // Manajemen Data Pasien

    route::get("data-pasien",[PasienControllers::class,"dataPasien"]);
    route::post("hapus-pasien",[PasienControllers::class,"hapusPasien"]);

    // Manajemen Data Pengobatan

    route::post("save-data-pengobatan",[CPenyakit::class,"savePengobatan"]);
    route::post("update-data-pengobatan",[CPenyakit::class,"updatePengobatan"]);
    route::post("check-data",[CPenyakit::class,"checkData"]);





});

?>
