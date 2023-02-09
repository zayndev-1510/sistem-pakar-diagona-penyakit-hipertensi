<?php

namespace App\Http\Controllers;

use App\Http\Controllers\admin\dao\Siswacontroller;
use App\Models\admin\Tblorangtua;
use App\Models\admin\Tblsiswa;
use App\Models\CalonModel;
use App\Models\Detailcalon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use App\Models\admin\Tbllogin;
class Caloncontroller extends Controller
{
    function rand_string( $length ) {
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        return substr(str_shuffle($chars),0,$length);
    }
    public function daftarSiswa(Request $r){
        $datatahun=DB::table("tbl_tahun_ajaran")->where("status_pendaftaran",1)->
        select("*")->first();
        $kode_daftar=$this->rand_string(8);
        $datacalon=[
            "nik"=>$r->nik,"nama_lengkap"=>$r->nama_lengkap,"jenis_kelamin"=>$r->jenis_kelamin,
            "tempat_lahir"=>$r->tempat_lahir,"tgl_lahir"=>$r->tgl_lahir,"id_agama"=>$r->id_agama,
            "warga_negara"=>$r->warga_negara,"alamat"=>$r->alamat,"tinggal_bersama"=>$r->tinggal_bersama,
            "anak_ke"=>$r->anak_ke,"usia"=>$r->usia,"nomor_hp"=>$r->nomor_hp,"tinggi_badan"=>$r->tinggi_badan,
            "berat_badan"=>$r->berat_badan,"jarak_tempuh"=>$r->jarak_tempuh,"jumlah_saudara"=>$r->jumlah_saudara,
            "status"=>2,"tgl_daftar"=>date("Y-m-d"),"kode_daftar"=>$kode_daftar,"foto_kk"=>$r->foto_kk,
            "foto_siswa"=>$r->foto_siswa,"id_tahun_ajaran"=>$datatahun->id
        ];
        $x=CalonModel::create($datacalon);
        if($x){
            $detailcalon=[
                "id_calon"=>$x->id,
                "nama_ayah"=>$r->nama_ayah,"nik_ayah"=>$r->nik_ayah,"pekerjaan_ayah"=>$r->pekerjaan_ayah,
                "tempat_lahir_ayah"=>$r->tempat_lahir_ayah,"tgl_lahir_ayah"=>$r->tgl_lahir_ayah,
                "agama_ayah"=>$r->agama_ayah,"nama_ibu"=>$r->nama_ibu,"nik_ibu"=>$r->nik_ibu,
                "pekerjaan_ibu"=>$r->pekerjaan_ibu,
                "tempat_lahir_ibu"=>$r->tempat_lahir_ibu,"tgl_lahir_ibu"=>$r->tgl_lahir_ibu,
                "agama_ibu"=>$r->agama_ibu,
            ];
            Detailcalon::create($detailcalon);
            echo json_encode(
                [
                    "message"=>1,
                    "kode_daftar"=>$kode_daftar
                ]
            );
        }else{
            echo json_encode([
                "message"=>0,
                "kode_daftar"=>""
            ]);
        }
    }

    public function cekHasil(Request $r){
        $agama=DB::table("tbl_agama")->select("*")->get();
        $data=DB::table("tbl_calon_siswa as c")->join("tbl_detail_calon as d","c.id","=","d.id_calon")->
        select("*")->where("c.kode_daftar",$r->kode_daftar)->first();
        $hasil=[
            "data"=>$data,
            "agama"=>$agama
        ];
        echo json_encode($hasil);
    }

    public function calonSiswa(){
        $agama=DB::table("tbl_agama")->select("*")->get();
        $data=DB::table("tbl_calon_siswa as c")->join("tbl_detail_calon as d","c.id","=","d.id_calon")->
        select("*")->get();
        $hasil=[
            "data"=>$data,
            "agama"=>$agama
        ];
        echo json_encode($hasil);
    }

    public function konfirmasi(Request $r){
        $data=[
            "status"=>$r->status
        ];
        $x=CalonModel::where("kode_daftar",$r->kode_daftar)->update($data);
        if($x){
            echo json_encode(1);
        }else{
            echo json_encode(0);
        }
    }

    public function moveSiswa(Request $r){
        $akun=$r->akun;
        $ortu=$r->orangtua;

        $dataupdate=[
            "akun"=>$akun["akun"]
        ];

        $i=Tblorangtua::create($ortu);
        if($i){
            $siswa=$r->siswa;
            $id_orang_tua=0;
            $jk=substr($siswa["jenis_kelamin"],0,1);
            $datasiswa=[
                "nama_siswa"=>$siswa["nama_siswa"],"id_tahun_ajaran"=>$siswa["id_tahun_ajaran"],
                "jenis_kelamin"=>$jk,"nik"=>$siswa["nik"],"tempat_lahir"=>$siswa["tempat_lahir"],
                "tgl_lahir"=>$siswa["tgl_lahir"],"id_agama"=>$siswa["id_agama"],
                "foto_kk"=>$siswa["foto_kk"],"foto_siswa"=>$siswa["foto_siswa"],
                "id_orang_tua"=>$i->id
            ];
            $x=Tblsiswa::create($datasiswa);
            if($x){
                $y=CalonModel::where("kode_daftar",$akun["kode_daftar"])->update($dataupdate);
                if($y){
                    $sandi=Crypt::encryptString($akun["kata_sandi"]);
                    $data=[
                        "username"=>$akun["username"],
                        "sandi"=>$sandi,
                        "id_pengguna"=>$i->id,
                        "nama_lengkap"=>$akun["nama_lengkap"],
                        "hak_akses"=>3,
                        "tgl_buat"=>date("Y-m-d"),
                        "status"=>1
                    ];
                    $x=Tbllogin::create($data);
                    echo json_encode(1);
                }
                else{
                    echo json_encode(0);
                }
            }
        }else
        {
            echo json_encode(0);
        }
       
       
        
        
        
    }

   
}
