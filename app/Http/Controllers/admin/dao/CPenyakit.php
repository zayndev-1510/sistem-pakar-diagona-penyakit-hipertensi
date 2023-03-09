<?php

namespace App\Http\Controllers\admin\dao;

use App\Http\Controllers\Controller;
use App\Models\admin\PenyakitModels;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CPenyakit extends Controller
{

    // fungsi menampilkan data penyakit
    public function loadData(){

        try {
            $data=[];
            $data=DB::table("tbl_penyakit")->select("*")->get();

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
                "kode_penyakit"=>$r->kode_penyakit,
                "nama_penyakit"=>$r->nama_penyakit
            ];

            $query=PenyakitModels::create($input);
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
                "kode_penyakit"=>$r->kode_penyakit,
                "nama_penyakit"=>$r->nama_penyakit
            ];

            $query=PenyakitModels::where("kode_penyakit",$r->temp_kode)->update($input);
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

            $query=PenyakitModels::where("kode_penyakit",$r->temp_kode)->delete();
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
