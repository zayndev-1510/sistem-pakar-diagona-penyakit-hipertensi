<?php

namespace App\Http\Controllers\admin\dao;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\AdminModels;
use Illuminate\Support\Facades\DB;
session_start();
class Clogin extends Controller
{

   
    public function cobaCF(){
        $data=DB::table("tbl_pembayaran")->select("nis","harga","sum(harga) as total")->groupBy("nis")->get();
        echo json_encode($data);
    }
    public function loginAdmin(Request $r){

        try {
            $query=AdminModels::where("username",$r->username)->where("katasandi",$r->katasandi)->select("*")->first();

            if($query){
                echo json_encode([
                    "code"=>200,
                    "message"=>"Success",
                    "action"=>1,
                    "data"=>$query->id_login
                ]
                );
                $_SESSION["idtoken"]=$query->id_login;
                return;
            }

            echo json_encode([
                "code"=>200,
                "message"=>"Gagal",
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
