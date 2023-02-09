<?php

namespace App\Http\Controllers\admin\dao;

use App\Http\Controllers\Controller;
use App\Models\admin\Tblruangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class KelasController extends Controller
{

    // Menampilkan Data Ruangan 

    public function dataRuangan(Request $r){
        $data = DB::table("TBL_KELAS")->select("*")->get();

        echo json_encode($data);
    }


    // Menambahkan Data Ruangan 
    public function saveRuangan(Request $r){

        $datainputan = [
            "kategori" => $r->kategori,
            "keterangan" => $r->keterangan
        ];

      
        try {
            $x = Tblruangan::create($datainputan);
            if($x){
                echo json_encode([
                    "message" => "Success",
                    "code" => 200,
                    "action"=>1
                ]);
            }      
        } catch (\Throwable $th) {
            echo json_encode(
                [
                    "message" => "Error in " . $th->getMessage(),
                    "code" => $th->getCode(),
                    "line" => $th->getLine(),
                    "action"=>0
                ]
            );
        }
    }

    public function updateRuangan(Request $r){

        $datainputan = [
            "kategori" => $r->kategori,
            "keterangan" => $r->ket
        ];

      
        try {
            $x = Tblruangan::where("id_kelas",$r->id_kelas)->update($datainputan);
            if($x){
                echo json_encode([
                    "message" => "Success",
                    "code" => 200,
                    "action"=>1
                ]);
                return;
            }      

            echo json_encode(
                [
                    "message" => "Failed",
                    "code" => 500,
                    "action"=>0
                ]
            );
            

        } catch (\Throwable $th) {
            echo json_encode(
                [
                    "message" => "Error in " . $th->getMessage(),
                    "code" => $th->getCode(),
                    "line" => $th->getLine(),
                    "action"=>0
                ]
            );
        }
    }

    public function deleteRuangan(Request $r){
  
        try {
            $x = Tblruangan::where("id_kelas",$r->id_kelas)->delete();
            if($x){
                echo json_encode([
                    "message" => "Success",
                    "code" => 200,
                    "action"=>1
                ]);
            }      
        } catch (\Throwable $th) {
            echo json_encode(
                [
                    "message" => "Error in " . $th->getMessage(),
                    "code" => $th->getCode(),
                    "line" => $th->getLine(),
                    "action"=>0
                ]
            );
        }
    }
}

