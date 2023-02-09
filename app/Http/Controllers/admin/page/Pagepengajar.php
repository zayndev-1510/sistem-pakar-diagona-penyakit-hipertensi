<?php

namespace App\Http\Controllers\admin\page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;

class Pagepengajar extends Controller
{
    public function index(){
        if(isset($_COOKIE["userid"])){
            $userid=Crypt::decryptString($_COOKIE["userid"]);
            $datalogin=DB::table("tbl_admin")->where("id",$userid)->select()->get();
            $data=(Object)[
                "keterangan"=>"Data Tenaga Pendidikan"
            ];
            return view("admin.pengajar",compact("datalogin",'data'));
        }
        else{
            return redirect("admin/login");
        }
    }
}
