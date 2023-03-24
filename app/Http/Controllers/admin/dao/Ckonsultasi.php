<?php

namespace App\Http\Controllers\admin\dao;

use App\Http\Controllers\Controller;
use App\Models\admin\PasienModels;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class Ckonsultasi extends Controller
{
    // fungsi memanggil data gejala konsultasi
    public function gejalaKonsultasi(){


        try {
            $data=DB::table("tbl_gejala")->select("*")->get();
            $kepastian=DB::table("tbl_nilai_kepastian")->select("*")->get();
            foreach ($data as $key => $value) {
                $data[$key]->pilihan=[];
                $data[$key]->hasil=0;
                foreach ($kepastian as $keys => $values) {
                    $data[$key]->pilihan[]=$values;
                }
            }

            echo json_encode([
                "code"=>200,
                "message"=>"Success",
                "action"=>1,
                "data"=>$data
            ]);

        } catch (\Throwable $th) {
            echo json_encode([
                "code"=>500,
                "message"=>"Error",
                "action"=>0,
            ]);
        }
    }

    // fungsi memanggil data proses konsultasi
    public function prosesKonsultasi(Request $r){
        try {
            $cfuser=$r->data;
            $cfpakar=DB::table("tbl_basis_pengetahuan")->orderBy("kode_penyakit")->orderBy("kode_gejala")->select("*")->get();
            $datapenyakit=DB::table("tbl_penyakit")->select("*")->get();
            $aturan=DB::table("tbl_aturan as a")->join("tbl_penyakit as p","p.kode_penyakit","=","a.kode_penyakit")->
            select("a.kode_penyakit","p.nama_penyakit","a.rules")->get();
            $rules=[];
            $datanew=[];
            foreach ($cfpakar as $key => $value) {
                foreach ($cfuser as $keys => $values) {
                    $rules[$keys]=$values["kode_gejala"];
                    if($values["kode_gejala"]==$value->kode_gejala){
                        $value->CFPakar=round($value->mb-$value->md,1);
                        $value->CFHasil=round($value->CFPakar*$values["cfuser"],1);
                        $value->CFuser=$values["cfuser"];
                        $value->nama_gejala=$values["gejala"];
                        $datanew[]=$value;
                    }
                  }
            }

            $string=implode(",",$rules);
            $check=0;
            $strpenyakit="";
            foreach ($aturan as $key => $value) {
                if($value->rules==$string){
                    $check=1;
                    $strpenyakit=$value->nama_penyakit;
                }
            }


            $penyakit=[];

            foreach ($datanew as $key => $value) {
                if($value->kode_penyakit==$value->kode_penyakit){
                    $penyakit[]=$value->kode_penyakit;
                }
            }
            $realpenyakit= array_unique($penyakit);
            $datahasil=[];

            foreach ($realpenyakit as $key => $value) {
                $datahasil["penyakit"][]=["kode_penyakit"=>$value];
            }
            $datapakar=[];

            foreach ($datahasil["penyakit"] as $key => $value) {
                $value["pakar"]=[];
                $x=1;
                foreach ($datanew as $keys => $values) {
                    if($value["kode_penyakit"]==$values->kode_penyakit){
                            $value["pakar"][]=$values;

                            $value["x"]=$x;
                            $x++;
                        }
                }
                $datapakar[]=$value;
            }

            $CFold=0;
            $arrayhasil=[];
            $datareturn=[];
            foreach ($datapakar as $key => $value) {
                foreach ($value["pakar"] as $keys => $values) {

                    if($values->kode_penyakit==$values->kode_penyakit){
                        if($keys==0){
                            $CFold=$values->CFHasil;
                            $values->hasil=$CFold;
                            $arrayhasil[$key]=[
                                "kode_penyakit"=>$value["kode_penyakit"],
                                "hasil"=>round($CFold*100,1),"gejala"=>$values->nama_gejala
                            ];

                            $datareturn[$keys]=[
                                "kode_penyakit"=>$value["kode_penyakit"],
                                "hasil"=>$CFold,"gejala"=>$values->nama_gejala,
                                "kode_gejala"=>$values->kode_gejala
                            ];
                        }else{
                            $CFold=$CFold+$values->CFHasil*(1-$CFold);
                            $values->hasil=$CFold;
                            $arrayhasil[$key]=[
                                "kode_penyakit"=>$value["kode_penyakit"],
                                "hasil"=>round($CFold*100,1),"gejala"=>$values->nama_gejala
                            ];
                            $datareturn[$keys]=[
                                "kode_penyakit"=>$value["kode_penyakit"],
                                "hasil"=>$CFold,"gejala"=>$values->nama_gejala,
                                "kode_gejala"=>$values->kode_gejala

                            ];
                        }
                    }
                }

            }

            foreach ($datapakar as $key => $value) {
                foreach ($datapenyakit as $keys => $values) {
                        if($value["kode_penyakit"]==$values->kode_penyakit){
                            $datapakar[$key]["nama_penyakit"]=$values->nama_penyakit;
                        }
                }
            }
            $rank="";
            foreach ($arrayhasil as $key => $value) {
                foreach ($datapenyakit as $keys => $values) {
                    if($value["kode_penyakit"]==$values->kode_penyakit){
                        $arrayhasil[$key]["penyakit"]=$values->nama_penyakit;
                    }

                }
            }
            $duplicate_y=0;

            $checkmaxvalue=false;
            if($check==0){
                $y=0;

                foreach ($datapakar as $key => $value) {
                    $x=$value["x"];
                    if($x>$y){
                        $y=$x;
                    }
                    if($x==$y){
                        $checkmaxvalue=true;
                        $strpenyakit=$value["nama_penyakit"];
                    }
                }
                if(!$checkmaxvalue){
                    $cm = array_column($datapakar, 'x');
                    if($cm != array_unique($cm)){
                       $duplicate_y=$duplicate_y+1;
                    }
                }


            }



            $k=0;
            $arrpenyakit=[];
            $j=0;
            foreach ($arrayhasil as $key => $value) {
                $hasil=$value["hasil"];
                if($hasil>$k){
                    $k=$hasil;
                }
                if($k==$hasil){
                    $arrpenyakit=[
                        "penyakit"=>$value["penyakit"],
                        "hasil"=>$hasil
                    ];
                    $j=$j+1;
                }
            }

            $respon=[
                "datapakar"=>$datapakar,
                "datauser"=>$cfuser,
                "array"=>$arrayhasil,
                "datanew"=>$datanew,
                "datareturn"=>$datareturn,
                "rank"=>$rank,
                "aturan"=>$string,
                "penyakit"=>$strpenyakit,
                "penyakitv2"=>$arrpenyakit,
                "duplicate"=>$duplicate_y,
                "duplicatecf"=>$j
            ];

            echo json_encode([
                "code"=>200,
                "message"=>"Success",
                "action"=>1,
                "data"=>$respon,


            ]);
        } catch (\Throwable $th) {
          echo json_encode(
            [
                "code"=>500,
                "message"=>"Error ".$th->getMessage(),
                "action"=>0
            ]
            );
        }
    }

    public function savePasien(Request $r){
        try {
            date_default_timezone_set("Asia/Makassar");
            $string=implode(",",$r->gejala);
            $data=[
                "nama_pasien"=>$r->nama_pasien,
                "tempat_lahir"=>$r->tempat_lahir,
                "tgl_lahir"=>$r->tgl_lahir,
                "jenis_kelamin"=>$r->jenis_kelamin,
                "agama"=>$r->agama,
                "alamat_rumah"=>$r->alamat_rumah,
                "nomor_handphone"=>$r->nomor_handphone,
                "gejala"=>$string,
                "penyakit"=>$r->penyakit,
                "tgl_konsultasi"=>date("Y-m-d"),
                "jam_konsultasi"=>date("H:s:d")
            ];
            $query=PasienModels::create($data);
            if($query){
                echo json_encode([
                    "code"=>200,
                    "message"=>"Success",
                    "action"=>1
                ]);
                return;
            }
            echo json_encode([
                "code"=>200,
                "message"=>"Failed",
                "action"=>0
            ]);
        } catch (\Throwable $th) {
            echo json_encode([
                "code"=>500,
                "message"=>"Error ".$th->getMessage(),
                "action"=>0
            ]);
        }
    }
}