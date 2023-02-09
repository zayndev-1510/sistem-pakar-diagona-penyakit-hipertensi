<?php

namespace App\Http\Controllers\admin\page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
class Pagedashboard extends Controller
{
    public function index(){
        if(isset($_COOKIE["userid"])){
            $userid=Crypt::decryptString($_COOKIE["userid"]);
            $datalogin=DB::table("tbl_admin")->where("id",$userid)->select()->get();
            $guru=DB::table("tbl_guru")->select("*")->get();
            $siswa=DB::table("tbl_siswa")->select("*")->get();
            $siswa_aktif=DB::table("tbl_siswa")->where("status_siswa",1)->select("*")->get();
            $jadwal=DB::table("tbl_jadwal_mapel")->select("*")->get();
            $mapel=DB::table("tbl_mata_pelajaran")->select("*")->get();
            $ruangan=DB::table("tbl_ruangan")->select("*")->get();
            $pengajar=DB::table("tbl_pengajar")->select("*")->get();
            $orang_tua=DB::table("tbl_orang_tua")->select("*")->get();
            $pengajar=DB::table("tbl_pengajar")->select("*")->get();
            $ruangan=DB::table("tbl_ruangan")->select("*")->get();
            $alumni=DB::table("tbl_alumni")->select("*")->get();
            $arsip=DB::table("tbl_arsip_sekolah")->select("*")->get();
            $kegiatan=DB::table("tbl_media")->select("*")->get();
            $data=[
                "guru"=>count($guru),"siswa"=>count($siswa),"jadwal"=>count($jadwal),
                "siswa_aktif"=>count($siswa_aktif),"arsip"=>count($arsip),
                "mapel"=>count($mapel),"ruangan"=>count($ruangan),"pengajar"=>count($pengajar),
                "orangtua"=>count($orang_tua),"ruangan"=>count($ruangan),"alumni"=>count($alumni),
                "kegiatan"=>count($kegiatan)
            ];

            return view("admin.home",compact('datalogin','data'));

        }
        else{
            return redirect("admin/login");
        }
    }

    public function kepalaSekolah(){
        if(isset($_COOKIE["userid"])){
            $userid=Crypt::decryptString($_COOKIE["userid"]);
            $datalogin=DB::table("tbl_admin")->where("id",$userid)->select()->get();
            return view("admin.kepala_sekolah",compact('datalogin'));

        }
        else{
            return redirect("admin/login");
        }
    }

    public function akun(){
        if(isset($_COOKIE["userid"])){
            $userid=Crypt::decryptString($_COOKIE["userid"]);
            $datalogin=DB::table("tbl_admin")->where("id",$userid)->select()->get();
            return view("admin.akun",compact('datalogin'));

        }
        else{
            return redirect("admin/login");
        }
    }

    public function calon(){

            if(isset($_COOKIE["userid"])){
                $userid=Crypt::decryptString($_COOKIE["userid"]);
                $datalogin=DB::table("tbl_admin")->where("id",$userid)->select()->get();
                $data=(Object)[

                    "keterangan"=>"Data Pendaftaran Calon Siswa"
                ];
                return view("admin.calon_siswa",compact("datalogin",'data'));
            }
            else{
                return redirect("admin/login");
            }
    }

    public function ijazah(){

        if(isset($_COOKIE["userid"])){
            $userid=Crypt::decryptString($_COOKIE["userid"]);
            $datalogin=DB::table("tbl_admin")->where("id",$userid)->select()->get();
            $data=(Object)[

                "keterangan"=>"Data Arsip Ijazah"
            ];
            return view("admin.arsip_ijazah",compact("datalogin",'data'));
        }
        else{
            return redirect("admin/login");
        }
    }

    public function kegiatan(){

        if(isset($_COOKIE["userid"])){
            $userid=Crypt::decryptString($_COOKIE["userid"]);
            $datalogin=DB::table("tbl_admin")->where("id",$userid)->select()->get();

            $data=(Object)[
                "keterangan"=>"Data Kegiatan"
            ];
            return view("admin.kegiatan",compact("datalogin",'data'));
        }
        else{
            return redirect("admin/login");
        }
    }

    public function arsipGuru(){

        if(isset($_COOKIE["userid"])){
            $userid=Crypt::decryptString($_COOKIE["userid"]);
            $datalogin=DB::table("tbl_admin")->where("id",$userid)->select()->get();

            $data=(Object)[
                "keterangan"=>"Data Dokumen Sekolah"
            ];
            return view("admin.arsip_guru",compact("datalogin",'data'));
        }
        else{
            return redirect("admin/login");
        }
    }

}
