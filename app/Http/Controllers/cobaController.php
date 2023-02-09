<?php

namespace App\Http\Controllers;

use App\Models\cobaModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class cobaController extends Controller
{
    public function insertData(Request $r){
        $data=[
            "username"=>$r->username,
            "sandi"=>$r->sandi,
            "alamat"=>$r->alamat
        ];
        $x=cobaModel::create($data);
        if($x){
            echo json_encode(1);
        }else{
            echo json_encode(0);
        }
    }

    public function tampilData(){
        $data=DB::table("tbl_coba_user")->select("*")->get();
        echo json_encode($data);
    }
}
