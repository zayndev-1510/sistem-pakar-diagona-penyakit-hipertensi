<?php

namespace App\Http\Controllers\admin\dao;

use App\Http\Controllers\Controller;
use App\Models\admin\Tbltahun_ajaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AkademikController extends Controller
{
    // Menampilkan data akademik
    function getDataAkademik(){
        try {
            $data = DB::table("TBL_TAHUN_AJARAN")->select("*")->get();
            echo json_encode([
                "message" => "Success",
                "code" => 200,
                "action" => 1,
                "data" => $data
            ]);
        } catch (\Throwable $th) {
            echo json_encode([
                "message" => "Error in ".$th->getMessage(),
                "code" => 500,
                "action" => 0
            ]);
        }

    }


    // Menyimpan data akademik
    function saveDataAkademik(Request $r){

        try {
            $data = [
                "tahun_akademik" => $r->tahun_akademik,
                "semester" => $r->semester,
                "tgl"=>$r->tgl,
                "status"=>$r->status
            ];
            $x = Tbltahun_ajaran::create($data);
            if($x){
                echo json_encode([
                    "message" => "Success",
                    "code" => 200,
                    "action" => 1
                ]);
                return;
            }

            echo json_encode([
                "message" => "Failed",
                "code" => 500,
                "action" => 0
            ]);
        } catch (\Throwable $th) {
            echo json_encode([
                "message" => "Error in " . $th->getMessage(),
                "code" => 500,
                "action" => 0
            ]);
        }
    }

      // Memperbarui data akademik
      function updateDataAkademik(Request $r){

        try {
            $data = [
                "tahun_akademik" => $r->tahun_akademik,
                "semester" => $r->semester,
                "tgl"=>$r->tgl,
                "status"=>$r->status
            ];
            $x = Tbltahun_ajaran::where("id_tahun_ajaran", $r->id_tahun_ajaran)->update($data);
            if($x){
                echo json_encode([
                    "message" => "Success",
                    "code" => 200,
                    "action" => 1
                ]);
                return;
            }

            echo json_encode([
                "message" => "Failed",
                "code" => 500,
                "action" => 0
            ]);
        } catch (\Throwable $th) {
            echo json_encode([
                "message" => "Error in " . $th->getMessage(),
                "code" => 500,
                "action" => 0
            ]);
        }

    }

     // Memperbarui data akademik
     function deleteDataAkademik($id_tahun_ajaran){

        try {

            $x = Tbltahun_ajaran::where("id_tahun_ajaran",$id_tahun_ajaran)->delete();
            if($x){
                echo json_encode([
                    "message" => "Success",
                    "code" => 200,
                    "action" => 1
                ]);
                return;
            }

            echo json_encode([
                "message" => "Failed",
                "code" => 500,
                "action" => 0
            ]);
        } catch (\Throwable $th) {
            echo json_encode([
                "message" => "Error in " . $th->getMessage(),
                "code" => 500,
                "action" => 0
            ]);
        }

    }
}
