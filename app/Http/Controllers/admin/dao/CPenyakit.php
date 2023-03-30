<?php

namespace App\Http\Controllers\admin\dao;

use App\Http\Controllers\Controller;
use App\Models\admin\PengobatanModels;
use App\Models\admin\PenyakitModels;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
session_start();
class CPenyakit extends Controller
{

    // fungsi menampilkan data penyakit
    public function loadData(){
        if(!isset($_SESSION["idtoken"])){
            echo json_encode([
                "code"=>400,
                "message"=>"Tidak ada akses untuk API",
                "action"=>0
            ]);
            return;
        }

        try {
            $data=[];
            $data=DB::table("tbl_penyakit")->select("*")->get();
            $obat=DB::table("tbl_atasi_penyakit")->select("*")->get();
            foreach ($data as $key => $value) {
                $data[$key]->obat=[];
                foreach ($obat as $keys => $values) {
                    if($value->kode_penyakit==$values->kode_penyakit){
                        $data[$key]->obat[]=$values;
                    }
                }
            }

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
        if(!isset($_SESSION["idtoken"])){
            echo json_encode([
                "code"=>400,
                "message"=>"Tidak ada akses untuk API",
                "action"=>0
            ]);
            return;
        }
        try {
            $input=[
                "kode_penyakit"=>$r->kode_penyakit,
                "nama_penyakit"=>$r->nama_penyakit,
                "keterangan"=>$r->keterangan
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
        if(!isset($_SESSION["idtoken"])){
            echo json_encode([
                "code"=>400,
                "message"=>"Tidak ada akses untuk API",
                "action"=>0
            ]);
            return;
        }

        try {
            $input=[
                "kode_penyakit"=>$r->kode_penyakit,
                "nama_penyakit"=>$r->nama_penyakit,
                "keterangan"=>$r->keterangan
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
                "action"=>0,

            ]);


        } catch (\Throwable $th) {
            echo json_encode([
                "code"=>500,
                "message"=>"Error ".$th->getMessage(),
                "action"=>0
            ]);
        }
    }

    // fungsi menghapus data penyakit
    public function deleteData(Request $r){
        if(!isset($_SESSION["idtoken"])){
            echo json_encode([
                "code"=>400,
                "message"=>"Tidak ada akses untuk API",
                "action"=>0
            ]);
            return;
        }
        try {

            $query=PenyakitModels::where("kode_penyakit",$r->temp_kode)->delete();
            PengobatanModels::where("kode_penyakit",$r->temp_kode)->delete();
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

    // fungsi menambahkan data pengobatan

    public function savePengobatan(Request $r){
        if(!isset($_SESSION["idtoken"])){
            echo json_encode([
                "code"=>400,
                "message"=>"Tidak ada akses untuk API",
                "action"=>0
            ]);
            return;
        }
        $data=$r->data;

        try {
            $check=false;
            foreach ($data as $key => $value) {
                $arr=[
                    "kode_penyakit"=>$value["kode_penyakit"],
                    "tips"=>$value["tips"]
                ];

            $querys=PengobatanModels::create($arr);
            if($querys){
                $check=true;
            }
            }

            if($check){
                echo json_encode(
                    [
                        "code"=>200,
                        "message"=>"Success",
                        "action"=>1
                    ]
                    );
                    return;
            }
            echo json_encode(
                [
                    "code"=>200,
                    "message"=>"Failed",
                    "action"=>0
                ]
                );

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


    // fungsi pengecekan data pengobatan

    public function checkData(Request $r){
        if(!isset($_SESSION["idtoken"])){
            echo json_encode([
                "code"=>400,
                "message"=>"Tidak ada akses untuk API",
                "action"=>0
            ]);
            return;
        }
        try {
            $data=$r->data;
            $array=[];
            $check=false;
            foreach ($data as $key => $value) {
                $arr=[
                    "kode_penyakit"=>$value["kode_penyakit"],
                    "tips"=>$value["tips"]
                ];
            $datacheck=DB::table("tbl_atasi_penyakit")->where("kode_penyakit",$value["kode_penyakit"])->select("*")->get();
            if(count($datacheck)>0){
                PengobatanModels::where("kode_penyakit",$value["kode_penyakit"])->delete();
                echo json_encode([
                    "code"=>200,
                    "message"=>"Success",
                    "action"=>1,
                    "status"=>true
                ]);
            }
            echo json_encode([
                "code"=>200,
                "message"=>"Success",
                "action"=>1,
                "status"=>false
            ]);
            }
        }
        catch (\Throwable $th) {
            echo json_encode(
                [
                    "code"=>500,
                    "message"=>"Error ".$th->getMessage(),
                    "action"=>0
                ]
                );
        }


    }
      // fungsi memperbarui data pengobatan

    public function updatePengobatan(Request $r){
        if(!isset($_SESSION["idtoken"])){
            echo json_encode([
                "code"=>400,
                "message"=>"Tidak ada akses untuk API",
                "action"=>0
            ]);
            return;
        }
        $data=$r->data;

        try {
            $check=false;
            foreach ($data as $key => $value) {
                $arr=[
                    "kode_penyakit"=>$value["kode_penyakit"],
                    "tips"=>$value["tips"]
                ];
                $query=PengobatanModels::create($arr);
                if($query){
                    $check=true;
                }
            }

            if($check){
                echo json_encode(
                    [
                        "code"=>200,
                        "message"=>"Success",
                        "action"=>1
                    ]
                    );
                    return;
            }
            echo json_encode(
                [
                    "code"=>200,
                    "message"=>"Failed",
                    "action"=>0
                ]
                );



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
}
