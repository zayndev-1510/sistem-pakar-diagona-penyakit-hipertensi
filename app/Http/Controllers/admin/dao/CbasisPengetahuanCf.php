<?php

namespace App\Http\Controllers\admin\dao;

use App\Http\Controllers\Controller;
use App\Models\admin\BasisPengetahuanCFModels;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class CbasisPengetahuanCf extends Controller
{
    function loadDataKepastian(){

        try {
            $data=DB::table("tbl_nilai_kepastian")->select("*")->get();

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

    function loadDataBasis(){
        try {
            $penyakit=DB::table("tbl_penyakit")->select("*")->get();
            $basis_pengetahuan=DB::table("tbl_basis_pengetahuan as b")->join("tbl_gejala as g","b.kode_gejala","=","g.kode_gejala")
            ->select("g.nama_gejala","g.kode_gejala","b.mb","b.md","b.kode_penyakit","b.id_pengetahuan")->get();
            foreach($penyakit as $k=>$value){
                $penyakit[$k]->gejala=[];
                $x=1;
                foreach ($basis_pengetahuan as $key => $values) {
                    if($value->kode_penyakit==$values->kode_penyakit){
                        $penyakit[$k]->gejala[]=$values;
                        $penyakit[$k]->x=$x;
                        $x++;
                    }
                }

            }

            echo json_encode([
                "code"=>200,
                "message"=>"Success",
                "action"=>1,
                "data"=>$penyakit
            ]);
        } catch (\Throwable $th) {
            echo json_encode(
                [
                    "code"=>500,
                    "message"=>"Error ".$th->getMessage(),
                    "action"=>0
                ]
                );
        }




    }

    function saveData(Request $request){
        $data=[
            "kode_penyakit"=>$request->kode_penyakit,"kode_gejala"=>$request->kode_gejala,
            "mb"=>$request->mb,"md"=>$request->md
        ];

        try {
            $query=BasisPengetahuanCFModels::create($data);
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
                "action"=>0,
                "data"=>$data
            ]);



        } catch (\Throwable $th) {
            echo json_encode([
                "code"=>500,
                "message"=>"Error",
                "action"=>0
            ]);
        }
    }
    function updateData(Request $request){
        $data=[
            "kode_penyakit"=>$request->kode_penyakit,"kode_gejala"=>$request->kode_gejala,
            "mb"=>$request->mb,"md"=>$request->md
        ];

        try {
            $query=BasisPengetahuanCFModels::where("id_pengetahuan",$request->id_pengetahuan)->update($data);
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
            echo json_encode([
                "code"=>500,
                "message"=>"Error",
                "action"=>0
            ]);
        }
    }
    function deleteData(Request $request){
        try {
            $query=BasisPengetahuanCFModels::where("id_pengetahuan",$request->id_pengetahuan)->delete();
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
            echo json_encode([
                "code"=>500,
                "message"=>"Error",
                "action"=>0
            ]);
        }
    }
}
