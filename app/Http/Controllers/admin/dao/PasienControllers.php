<?php

namespace App\Http\Controllers\admin\dao;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PasienControllers extends Controller
{
    public function dataPasien(){
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
