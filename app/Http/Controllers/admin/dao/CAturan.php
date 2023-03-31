<?php

namespace App\Http\Controllers\admin\dao;

use App\Http\Controllers\Controller;
use App\Models\admin\AturanModels;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
session_start();
class CAturan extends Controller
{
    // tampil data aturan

    public function loadData(){
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
            $data=DB::table("tbl_aturan as a")->
            join("tbl_penyakit as p","p.kode_penyakit","=","a.kode_penyakit")
            ->select("p.kode_penyakit","p.nama_penyakit","a.rules","a.id_aturan")->get();

            echo json_encode([
                "code"=>200,
                "message"=>"Success",
                "action"=>1,
                "data"=>$data
            ]);
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

    // menyimpan data aturan
    public function saveData(Request $r){
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

            $data=[
                "kode_penyakit"=>$r->kode_penyakit,
                "rules"=>$r->rules
            ];
            $query=AturanModels::create($data);
            if($query){

            echo json_encode([
                "code"=>200,
                "message"=>"Success",
                "action"=>1
            ]);
            return;
            }

            echo json_encode([
                "code"=>200,
                "message"=>"Failed",
                "action"=>0
            ]);
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

     // menmperbarui data aturan
     public function updateData(Request $r){
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

            $data=[
                "kode_penyakit"=>$r->kode_penyakit,
                "rules"=>$r->rules
            ];
            $query=AturanModels::where("id_aturan",$r->id_aturan)->update($data);
            if($query){

            echo json_encode([
                "code"=>200,
                "message"=>"Success",
                "action"=>1
            ]);
            return;
            }

            echo json_encode([
                "code"=>200,
                "message"=>"Failed",
                "action"=>0
            ]);
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

     // menghapus data aturan
     public function deleteData(Request $r){
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

            $query=AturanModels::where("id_aturan",$r->id_aturan)->delete();
            if($query){

            echo json_encode([
                "code"=>200,
                "message"=>"Success",
                "action"=>1
            ]);
            return;
            }

            echo json_encode([
                "code"=>200,
                "message"=>"Failed",
                "action"=>0
            ]);
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
}
