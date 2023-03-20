<?php

namespace App\Http\Controllers\admin\dao;

use App\Http\Controllers\Controller;
use App\Models\admin\GejalaModels;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CGejala extends Controller
{
     // fungsi menampilkan data gejala
     public function loadData(){

        try {
            $data=[];
           $data=DB::table("tbl_gejala")->select("*")->get();

            echo json_encode([
                "code"=>200,
                "message"=>"Success",
                "action"=>1,
                "data"=>$data
            ]);

        } catch (\Throwable $th) {
            echo json_encode([
                "code"=>500,
                "message"=>"Error in query",
                "action"=>0
            ]);
        }
    }


    // fungsi menyimpan data penyakit
    public function saveData(Request $r){
        try {
            $input=[
                "kode_gejala"=>$r->kode_gejala,
                "nama_gejala"=>$r->nama_gejala
            ];

            $query=GejalaModels::create($input);
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
                "message"=>"Failed",
                "action"=>0
            ]);
        }
    }


    // fungsi memperbarui data penyakit
    public function updateData(Request $r){

        try {
            $input=[
                "kode_gejala"=>$r->kode_gejala,
                "nama_gejala"=>$r->nama_gejala
            ];

            $query=GejalaModels::where("kode_gejala",$r->temp_kode)->update($input);
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
                "message"=>"Failed",
                "action"=>0
            ]);
        }
    }

    // fungsi menghapus data penyakit
    public function deleteData(Request $r){
        try {

            $query=GejalaModels::where("kode_gejala",$r->temp_kode)->delete();
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
                "message"=>"Failed",
                "action"=>0
            ]);
        }
    }
}
