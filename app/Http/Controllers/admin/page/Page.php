<?php

namespace App\Http\Controllers\admin\page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class Page extends Controller
{
    public function halamanPenyakit(){
        $data=(Object)[
            "keterangan"=>"Data Gejala"
        ];
        $datalogin=DB::table("tbl_admin")->where("id_login","djsaldja493248")->select()->get();
        return view("admin.penyakit",compact('data','datalogin'));
    }

    public function halamanGejala(){
        $data=(Object)[
            "keterangan"=>"Data Gejala"
        ];
        $datalogin=DB::table("tbl_admin")->where("id_login","djsaldja493248")->select()->get();
        return view("admin.gejala",compact('data','datalogin'));
    }
}
