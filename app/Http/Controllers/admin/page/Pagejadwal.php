<?php

namespace App\Http\Controllers\admin\page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;

class Pagejadwal extends Controller
{
    public function index(){

        /*
        if(isset($_COOKIE["userid"])){
            $userid=Crypt::decryptString($_COOKIE["userid"]);
            $datalogin=DB::table("tbl_admin")->where("id",$userid)->select()->get();

            $data=(Object)[
                "keterangan"=>"Data Jadwal"
            ];
            return view("admin.jadwal",compact("datalogin",'data'));
        }
        else{
            return redirect("admin/login");
        }
        */

        $datalogin=DB::table("TBL_ADMIN")->where("id_login","djsaldja493248")->select()->get();
        $kelas=DB::table("TBL_KELAS")->select("*")->get();
        $tahunajaran=DB::table("TBL_TAHUN_AJARAN")->select("*")->get();
        $data=(Object)[
            "kelas"=>$kelas,
            "tahunajaran"=>$tahunajaran,
            "keterangan"=>"Data Guru"
        ];
        return view("admin.jadwal",compact('data','datalogin'));
    }
}
