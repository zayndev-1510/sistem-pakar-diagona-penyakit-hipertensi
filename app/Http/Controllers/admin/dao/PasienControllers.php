<?php

namespace App\Http\Controllers\admin\dao;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
session_start();
class PasienControllers extends Controller
{
    public function dataPasien(){
        if(!isset($_SESSION["idtoken"])){
            echo json_encode([
                "code"=>200,
                "message"=>"Tidak ada akses API",
                "action"=>0,
                "token"=>"Token tidak cocok"
            ]);
            return;
        }
        try {
            $data=DB::table("tbl_pasien")->select("*")->get();
            echo json_encode(
                [
                    "code"=>200,
                    "message"=>"Success",
                    "action"=>1,
                    "data"=>$data
                ]
                );
        } catch (\Throwable $th) {
            echo json_encode(
                [
                    "code"=>500,
                    "message"=>"Error",
                    "action"=>0
                ]
                );
        }
    }

    public function hapusPasien(Request $r){
        if(!isset($_SESSION["idtoken"])){
            echo json_encode([
                "code"=>200,
                "message"=>"Tidak ada akses API",
                "action"=>0,
                "token"=>"Token tidak cocok"
            ]);
            return;
        }
        try {
            $query=DB::table('tbl_pasien')->where("id_pasien",$r->id_pasien)->delete();
            if($query){
                echo json_encode(
                    [
                        "code"=>200,
                        "message"=>"Success",
                        "action"=>1,
                    ]
                    );
                    return;
            }
            echo json_encode(
                [
                    "code"=>200,
                    "message"=>"Failed",
                    "action"=>0,
                ]
                );
        } catch (\Throwable $th) {
            echo json_encode(
                [
                    "code"=>500,
                    "message"=>"Error",
                    "action"=>0,
                ]
                );
        }
    }
}
