<?php

namespace App\Http\Controllers\pengguna;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
session_start();
class PenyakitController extends Controller
{
    function loadData(){

        if(!isset($_SESSION["tokenuser"])){
            echo json_encode([
                "code"=>200,
                "message"=>"Tidak ada akses untuk API",
                "action"=>0
            ]);
            return;
        }
        try {
            $data=DB::table("tbl_penyakit")->select("*")->get();
            echo json_encode([
                "code"=>200,
                "action"=>1,
                "message"=>"Success",
                "data"=>$data
            ]);
        } catch (\Throwable $th) {
            echo json_encode([
                "code"=>500,
                "action"=>0,
                "message"=>"Error"
            ]);
        }
    }
    function loadDataGejala(){

        if(!isset($_SESSION["tokenuser"])){
            echo json_encode([
                "code"=>200,
                "message"=>"Tidak ada akses untuk API",
                "action"=>0
            ]);
            return;
        }
        try {
            $data=DB::table("tbl_gejala")->select("*")->get();
            echo json_encode([
                "code"=>200,
                "action"=>1,
                "message"=>"Success",
                "data"=>$data
            ]);
        } catch (\Throwable $th) {
            echo json_encode([
                "code"=>500,
                "action"=>0,
                "message"=>"Error"
            ]);
        }

    }
}
