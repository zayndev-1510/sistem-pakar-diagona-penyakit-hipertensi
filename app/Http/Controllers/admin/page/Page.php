<?php

namespace App\Http\Controllers\admin\page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class Page extends Controller
{


    public function homeUser(){

        return view("home");
    }

    public function gejalaUser(){

        return view("gejala");
    }

    public function penyakitUser(){

        return view("penyakit");
    }

    public function konsultasi(){
        return view("konsultasi");
    }

    public function login(){
        return view("login");
    }

    public function logout(){
        unset($_COOKIE["idlogin"]);
        setcookie("idlogin","",1);
        return view("login");
    }
    public function halamanDashboard(){

        if (isset($_COOKIE["idlogin"]))
           {
            $penyakit=DB::table("tbl_penyakit")->select("*")->get();
            $gejala=DB::table("tbl_gejala")->select("*")->get();
            $basis_pengetahuan=DB::table("tbl_basis_pengetahuan")->select("*")->get();
            $data=(Object)[
                "keterangan"=>"Dashboard",
                "penyakit"=>count($penyakit),
                "gejala"=>count($gejala),
                "basis_pengetahuan"=>count($basis_pengetahuan)
            ];
            $datalogin=DB::table("tbl_admin")->where("id_login",$_COOKIE["idlogin"])->select()->get();
            return view("admin.home",compact('data','datalogin'));
           }
        else
            return view("login");

    }

    public function halamanPenyakit(){
        if(isset($_COOKIE["idlogin"])){
            $data=(Object)[
                "keterangan"=>"Data Penyakit"
            ];
            $datalogin=DB::table("tbl_admin")->where("id_login",$_COOKIE["idlogin"])->select()->get();
            return view("admin.penyakit",compact('data','datalogin'));
        }
        else
        return view("login");
    }

    public function halamanGejala(){
        if(isset($_COOKIE["idlogin"])){
            $data=(Object)[
                "keterangan"=>"Data Gejala"
            ];
            $datalogin=DB::table("tbl_admin")->where("id_login",$_COOKIE["idlogin"])->select()->get();
            return view("admin.gejala",compact('data','datalogin'));
        }else
        return view("login");

    }
    public function halamanBasisPengetahuan(){
        if(isset($_COOKIE["idlogin"])){
            $data=(Object)[
                "keterangan"=>"Data Basis Pengetahuan"
            ];
            $datalogin=DB::table("tbl_admin")->where("id_login",$_COOKIE["idlogin"])->select()->get();
            return view("admin.basis_pengetahuan",compact('data','datalogin'));
        }else
        return view("login");
    }

    public function halamanAturan(){
        if(isset($_COOKIE["idlogin"])){
            $data=(Object)[
                "keterangan"=>"Data Aturan"
            ];
            $datalogin=DB::table("tbl_admin")->where("id_login",$_COOKIE["idlogin"])->select()->get();
            return view("admin.aturan",compact('data','datalogin'));
        }else
        return view("login");
    }
    public function halamanPasien(){
        if(isset($_COOKIE["idlogin"])){
            $data=(Object)[
                "keterangan"=>"Data Pasien"
            ];
            $datalogin=DB::table("tbl_admin")->where("id_login",$_COOKIE["idlogin"])->select()->get();
            return view("admin.pasien",compact('data','datalogin'));
        }else
        return view("login");
    }

}
