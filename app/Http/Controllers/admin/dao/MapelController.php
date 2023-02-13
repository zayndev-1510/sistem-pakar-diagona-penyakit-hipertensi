<?php

namespace App\Http\Controllers\admin\dao;

use App\Http\Controllers\Controller;
use App\Models\admin\Tblmapel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class MapelController extends Controller
{

    // Menampilkan data tahun akadmeik
    function getDataAkademik(){
        try {

            $dataakademik = DB::table("TBL_TAHUN_AJARAN")->select("*")->get();
        echo json_encode([
            "message" => "Success",
            "code" => 200,
            "action" => 1,
            "data"=>$dataakademik
        ]);

        } catch (\Throwable $th) {
            echo json_encode([
                "message" => "Error in query ".$th->getMessage(),
                "code" => 500,
                "action" => 0
            ]);
        }

    }
    // mengsortir data siswa

    function cmp($a, $b) {
        return strcmp($a->name, $b->name);
    }

    // menambahkan data siswa
    function getDataMapel(){
        try {
            $datanew = [];
            $datamapel = DB::table("TBL_MAPEL")->select("*")->get();
            $dataakademik = DB::table("TBL_TAHUN_AJARAN")->select("*")->get();
        foreach ($datamapel as $key => $value) {
            foreach ($dataakademik as $keys => $values) {
                $id_tahun = $value->id_tahun_ajaran;
                $temp_id_tahun = $values->id_tahun_ajaran;


                if($id_tahun==$temp_id_tahun){
                        $value->tahun_akademik = $values->tahun_akademik;
                        $value->status=$values->status;
                        $datanew[] = $value;

                }
            }
        }
        usort($datanew,function($first,$second){
            return $first->tahun_akademik < $second->tahun_akademik;
        });
        echo json_encode([
            "message" => "Success",
            "code" => 200,
            "action" => 1,
            "data"=>$datanew
        ]);

        } catch (\Throwable $th) {
            echo json_encode([
                "message" => "Error in query ".$th->getMessage(),
                "code" => 500,
                "action" => 0
            ]);
        }


    }

    // menampilkan data siswa
    function saveDataMapel(Request $r){

        try {
            $datainputan = [
                "nama_mapel" => $r->nama_mapel,
                "id_tahun_ajaran" => $r->id_tahun_ajaran
            ];
            $x = Tblmapel::create($datainputan);
            if($x){
                echo json_encode(
                    [
                        "message" => "Success",
                        "code" => 200,
                        "action" => 1
                    ]
                );
                return;
            }
            echo json_encode([
                "message" => "Failed",
                "code" => 500,
                "action" => 0
            ]);
        } catch (\Throwable $th) {
            echo json_encode([
                "message" => "Error in ".$th->getMessage(),
                "code" => 500,
                "action" => 0
            ]);
        }

    }

    // memperbarui data siswa
    function updateDataMapel(Request $r){

        try {
            $datainputan = [
                "nama_mapel" => $r->nama_mapel,
                "id_tahun_ajaran" => $r->id_tahun_ajaran
            ];
            $x = Tblmapel::where("id_mapel", $r->id_mapel)->update($datainputan);
            if($x){
                echo json_encode(
                    [
                        "message" => "Success",
                        "code" => 200,
                        "action" => 1
                    ]
                );
                return;
            }
            echo json_encode([
                "message" => "Failed",
                "code" => 500,
                "action" => 0
            ]);
        } catch (\Throwable $th) {
            echo json_encode([
                "message" => "Error in ".$th->getMessage(),
                "code" => 500,
                "action" => 0
            ]);
        }
    }

    // menghapus data siswa
    function deleteDataMapel($id_mapel){

        try {
            $x = Tblmapel::where("id_mapel", $id_mapel)->delete();
            if($x){
                echo json_encode(
                    [
                        "message" => "Success",
                        "code" => 200,
                        "action" => 1
                    ]
                );
                return;
            }
            echo json_encode([
                "message" => "Failed",
                "code" => 500,
                "action" => 0
            ]);
        } catch (\Throwable $th) {
            echo json_encode([
                "message" => "Error in ".$th->getMessage(),
                "code" => 500,
                "action" => 0
            ]);
        }
    }

}
