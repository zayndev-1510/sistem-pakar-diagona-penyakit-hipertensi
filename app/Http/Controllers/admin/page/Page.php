<?php

namespace App\Http\Controllers\admin\page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
session_start();
class Page extends Controller
{
    public function encrypt_decrypt($action, $string)
    {
        $output = false;
        $encrypt_method = "AES-256-CBC";
        $secret_key = 'key_one';
        $secret_iv = 'key_two';
        // hash
        $key = hash('sha256', $secret_key);
        // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
        $iv = substr(hash('sha256', $secret_iv), 0, 16);
        if ($action == 'encrypt') {
            $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
            $output = base64_encode($output);
        } else if ($action == 'decrypt') {
            $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
        }
        return $output;
    }

    public function homeUser(){
        if(!isset($_SESSION["tokenuser"])){
            $token=rand(9,9999999999);
            $_SESSION["tokenuser"]=$token;
        }
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
        if(isset($_SESSION["idtoken"])){
            session_destroy();
            return view("login");
        }
        return view("login");

    }
    public function halamanDashboard(){


        if(!isset($_SESSION["idtoken"])){
            return view("login");
        }

        $penyakit=DB::table("tbl_penyakit")->select("*")->get();
        $gejala=DB::table("tbl_gejala")->select("*")->get();
        $basis_pengetahuan=DB::table("tbl_basis_pengetahuan")->select("*")->get();
        $data=(Object)[
            "keterangan"=>"Dashboard",
            "penyakit"=>count($penyakit),
            "gejala"=>count($gejala),
            "basis_pengetahuan"=>count($basis_pengetahuan)
        ];
        $datalogin=DB::table("tbl_admin")->where("id_login",$_SESSION["idtoken"])->select()->get();
        return view("admin.home",compact('data','datalogin'));


    }

    public function halamanPenyakit(){

        if(!isset($_SESSION["idtoken"])){
            return view("login");
        }
        $data=(Object)[
            "keterangan"=>"Data Penyakit"
        ];
        $datalogin=DB::table("tbl_admin")->where("id_login",$_SESSION["idtoken"])->select()->get();
        return view("admin.penyakit",compact('data','datalogin'));
    }

    public function halamanGejala(){

        if(!isset($_SESSION["idtoken"])){
            return view("login");
        }
        $data=(Object)[
            "keterangan"=>"Data Gejala"
        ];
        $datalogin=DB::table("tbl_admin")->where("id_login",$_SESSION["idtoken"])->select()->get();
        return view("admin.gejala",compact('data','datalogin'));

    }
    public function halamanBasisPengetahuan(){

        if(!isset($_SESSION["idtoken"])){
            return view("login");
        }
        $data=(Object)[
            "keterangan"=>"Data Basis Pengetahuan"
        ];
        $datalogin=DB::table("tbl_admin")->where("id_login",$_SESSION["idtoken"])->select()->get();
        return view("admin.basis_pengetahuan",compact('data','datalogin'));
    }

    public function halamanAturan(){

        if(!isset($_SESSION["idtoken"])){
            return view("login");
        }
        $data=(Object)[
            "keterangan"=>"Data Aturan"
        ];
        $datalogin=DB::table("tbl_admin")->where("id_login",$_SESSION["idtoken"])->select()->get();
        return view("admin.aturan",compact('data','datalogin'));
    }
    public function halamanPasien(){

        if(!isset($_SESSION["idtoken"])){
            return view("login");
        }
        $data=(Object)[
            "keterangan"=>"Data Pasien"
        ];
        $datalogin=DB::table("tbl_admin")->where("id_login",$_SESSION["idtoken"])->select()->get();
        return view("admin.pasien",compact('data','datalogin'));
    }

}
