<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PageHome extends Controller
{
    public function index(){
        $sekolah=DB::table("tbl_sekolah")->select("*")->get();
        $visimisi=DB::table("tbl_visimisi")->select("*")->get();
        $tata_tertib=DB::table("tbl_tata_tertib")->select("*")->get();
        foreach($visimisi as $item){
            if($item->id_sekolah==$sekolah[0]->id){
                   if($item->kategori==1){
                       $sekolah[0]->visi=$item;
                   }else{
                       $sekolah[0]->misi[]=$item;
                   }
            }
        }
        return view("home",compact('sekolah','tata_tertib'));
    }

    public function daftar(){
        $sekolah=DB::table("tbl_sekolah")->select("*")->get();
        $agama=DB::table("tbl_agama")->select("*")->get();
        $tahun_ajaran=DB::table("tbl_tahun_ajaran")->where("status_pendaftaran",1)->select("*")->get();
        $visimisi=DB::table("tbl_visimisi")->select("*")->get();
        foreach($visimisi as $item){
            if($item->id_sekolah==$sekolah[0]->id){
                   if($item->kategori==1){
                       $sekolah[0]->visi=$item;
                   }else{
                       $sekolah[0]->misi[]=$item;
                   }
            }
        }
        return view("daftar",compact('sekolah','tahun_ajaran','agama'));
    }

    public function cekhasil(){
        return view("cek_pendaftaran");
    }

    public function detailKegiatan(){
        $sekolah=DB::table("tbl_sekolah")->select("*")->get();
        $visimisi=DB::table("tbl_visimisi")->select("*")->get();
        foreach($visimisi as $item){
            if($item->id_sekolah==$sekolah[0]->id){
                   if($item->kategori==1){
                       $sekolah[0]->visi=$item;
                   }else{
                       $sekolah[0]->misi[]=$item;
                   }
            }
        }
        return view("detail",compact('sekolah'));
    }

    public function profil(){
        $sekolah=DB::table("tbl_sekolah")->select("*")->get();
        $visimisi=DB::table("tbl_visimisi")->select("*")->get();
        foreach($visimisi as $item){
            if($item->id_sekolah==$sekolah[0]->id){
                   if($item->kategori==1){
                       $sekolah[0]->visi=$item;
                   }else{
                       $sekolah[0]->misi[]=$item;
                   }
            }
        }
        return view("profil_sekolah",compact('sekolah'));
    }
    public function tata_tertib(){
        $sekolah=DB::table("tbl_sekolah")->select("*")->get();
        $visimisi=DB::table("tbl_visimisi")->select("*")->get();
        $tata_tertib=DB::table("tbl_tata_tertib")->select("*")->get();
        foreach($visimisi as $item){
            if($item->id_sekolah==$sekolah[0]->id){
                   if($item->kategori==1){
                       $sekolah[0]->visi=$item;
                   }else{
                       $sekolah[0]->misi[]=$item;
                   }
            }
        }
        return view("tata_tertib",compact('sekolah','tata_tertib'));
    }

    public function kegiatan_sekolah(){
        $sekolah=DB::table("tbl_sekolah")->select("*")->get();
        $visimisi=DB::table("tbl_visimisi")->select("*")->get();
        foreach($visimisi as $item){
            if($item->id_sekolah==$sekolah[0]->id){
                   if($item->kategori==1){
                       $sekolah[0]->visi=$item;
                   }else{
                       $sekolah[0]->misi[]=$item;
                   }
            }
        }
        return view("kegiatan_sekolah",compact('sekolah'));
    }


}
