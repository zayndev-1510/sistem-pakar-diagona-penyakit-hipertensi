<?php

namespace App\Http\Controllers\admin\dao;

use App\Http\Controllers\Controller;
use App\Models\admin\Tbljadwalmapel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\admin\Tbltahun_ajaran;
class JadwalController extends Controller
{
     // Menampilkan data Jadwal Mata Pelajaran
     function getDataJadwal(){
        try {
            $data = DB::table("TBL_JADWAL_MAPEL as mapel")->
            join("TBL_MAPEL as matpel","matpel.id_mapel","=","mapel.id_mapel")->
            join("TBL_KELAS as kelas","kelas.id_kelas","=","mapel.id_kelas")->
            join("TBL_GURU as guru","guru.id_guru","=","mapel.id_guru")->
            select("guru.nama_guru","kelas.keterangan as nama_kelas","mapel.id_kelas","mapel.id_guru","mapel.id_jadwal"
            ,"mapel.hari","mapel.jam_masuk","mapel.jam_keluar","guru.nama_guru","matpel.nama_mapel","mapel.id_mapel")->get();
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


    // Menyimpan data jadwal mata pelajaran
    function saveDataJadwal(Request $r){

        try {
            $data = [
                "id_kelas"=>$r->id_kelas,
                "id_guru" => $r->id_guru,
                "id_mapel" => $r->id_mapel,
                "hari"=>$r->hari,
                "jam_masuk"=>$r->jam_masuk,
                "jam_keluar"=>$r->jam_keluar
            ];
            $x = Tbljadwalmapel::create($data);
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
      function updateDataJadwal(Request $r){

        try {
            $data = [
                "id_guru" => $r->id_guru,
                "id_mapel" => $r->id_mapel,
                "hari"=>$r->hari,
                "jam_masuk"=>$r->jam_masuk,
                "jam_keluar"=>$r->jam_keluar,
                "id_kelas"=>$r->id_kelas
            ];
            $x = Tbljadwalmapel::where("id_jadwal", $r->id_jadwal)->update($data);
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
     function deleteDataJadwal($id_jadwal){

        try {

            $x = Tbljadwalmapel::where("id_jadwal",$id_jadwal)->delete();
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
