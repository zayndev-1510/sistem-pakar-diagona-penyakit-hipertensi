<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class GrafikController extends Controller
{
    public function siswa()
    {

        $tahunakademik = DB::table("tbl_tahun_ajaran")->select("*")->get();
        $datakelas=DB::table("tbl_ruangan")->select("*")->get();
        $datasiswa = DB::table("tbl_siswa")->select("*")->get();
        $x = 1;
        
        foreach ($tahunakademik as $key => $value) {
            unset($value->semester);
            unset($value->status);
            unset($value->tgl);
            $tahunakademik[$key]->jumlah = 0;
            foreach ($datasiswa as $keys => $values) {
               
                if ($value->id == $values->id_tahun_ajaran) {
                    $tahunakademik[$key]->jumlah = $x;
                 
                    $x++;
                    
                }
            }
        }
        foreach ($datakelas as $key => $value) {
            $y=1;
            $datakelas[$key]->jumlah = 0;
            foreach ($datasiswa as $keys => $values) {
               
                if ($value->id == $values->id_kelas) {
                    $datakelas[$key]->jumlah = $y;
                 
                    $y++;
                    
                }
            }
        }
        $jumlahlaki=DB::table("tbl_siswa")->where("jenis_kelamin","L")->select("*")->get();
        $jumlahwanita=DB::table("tbl_siswa")->where("jenis_kelamin","P")->select("*")->get();
        $datakelamin=[
            "L"=>count($jumlahlaki),"P"=>count($jumlahwanita)
        ];
        $data=[
            "a"=>$tahunakademik,
            "b"=>$datakelamin,
            "c"=>$datakelas
        ];
        echo json_encode($data);
    }
}
