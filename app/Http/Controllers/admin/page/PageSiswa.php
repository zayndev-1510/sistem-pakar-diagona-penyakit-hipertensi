<?php

namespace App\Http\Controllers\admin\page;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
class PageSiswa extends Controller
{
    public function index(){
        /*
        if(isset($_COOKIE["userid"])){
            $userid=Crypt::decryptString($_COOKIE["userid"]);
            $datalogin=DB::table("tbl_admin")->where("id",$userid)->select()->get();
            $agama=DB::table("tbl_agama")->select("*")->get();
            $kelas=DB::table("tbl_ruangan")->select("*")->get();
            $tahunajaran=DB::table("tbl_tahun_ajaran")->select("*")->get();
            $data=(Object)[
                "agama"=>$agama,
                "kelas"=>$kelas,
                "tahunajaran"=>$tahunajaran,
                "keterangan"=>"Data Siswa"
            ];
            return view("admin.siswa",compact("datalogin",'data'));
        }
        else{
            return redirect("admin/login");
        }
     */
    $datalogin=DB::table("TBL_ADMIN")->where("id_login","djsaldja493248")->select()->get();
    $agama=DB::table("TBL_AGAMA")->select("*")->get();
    $kelas=DB::table("TBL_KELAS")->select("*")->get();
    $tahunajaran=DB::table("TBL_TAHUN_AJARAN")->select("*")->get();
    $data=(Object)[
        "agama"=>$agama,
        "kelas"=>$kelas,
        "tahunajaran"=>$tahunajaran,
        "keterangan"=>"Data Siswa"
    ];
    return view("admin.siswa",compact('data','datalogin'));
       
    }
}
