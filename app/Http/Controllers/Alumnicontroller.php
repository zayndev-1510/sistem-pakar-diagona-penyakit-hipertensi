<?php

namespace App\Http\Controllers;

use App\Models\admin\Tblsiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\AlumniModel;
class Alumnicontroller extends Controller
{
    public function getDataAlumni(){
        $data=DB::table("tbl_alumni as a")->join("tbl_siswa as s","s.id","=","a.id_siswa")
        ->leftJoin("tbl_ruangan as r","r.id","=","s.id_kelas")
        ->select("*")->get();

        $groupby=DB::table("tbl_alumni")->groupBy("tahun_lulus")->select("tahun_lulus")->get();
        echo json_encode([
            "data"=>$data,
            "groupby"=>$groupby
        ]);
    }

    public function insertDataAlumni(Request $r){
        $data=$r->data;
        foreach($data as $row){
            $x=AlumniModel::create($row);
            Tblsiswa::where("id",$row["id_siswa"])->update(
                [
                    "status_siswa"=>0
                ]
                );
        }
        if($x){
            echo json_encode(
                ["message"=>1]
            );
        }else{
            echo json_encode(
                ["message"=>0]
            );
        }
    }

    public function deleteDataAlumni($id){
        $x=AlumniModel::where("id_siswa",$id)->delete();
        if($x){
            Tblsiswa::where("id",$id)->update(
                [
                    "status_siswa"=>1
                ]
                );
            echo json_encode(
                ["message"=>1]
            );
        }else{
            echo json_encode(
                ["message"=>0]
            );
        }
    }
}
