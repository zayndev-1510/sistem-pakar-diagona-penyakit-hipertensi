<?php

namespace App\Http\Controllers\admin\dao;

use App\Http\Controllers\Controller;
use App\Models\admin\Tblguru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Filesystem\Filesystem;
class GuruController extends Controller
{
    //menampilkan data guru
    function getDataGuru(){
        try {
            $data = DB::table("TBL_GURU")->select("*")->get();
            $agama = DB::table("TBL_AGAMA")->select("*")->get();

            foreach ($data as $key => $value) {
                foreach ($agama as $key_agama => $value_agama) {
                    if($value_agama->id==$value->id_agama){
                        $data[$key]->id_agama = $value_agama->id;
                        $data[$key]->agama = $value_agama->keterangan;
                    }
                }

            }
            echo json_encode(
                [
                    "message" => "Success",
                    "code" => 200,
                    "action" => 1,
                    "data"=>$data
                ]
            );
        } catch (\Throwable $th) {
            echo json_encode(
                [
                    "message" => "Error in " . $th->getMessage(),
                    "code" => 500,
                    "action"=>0
                ]
            );
        }
    }

    // Menambahkan data guru
    function saveDataGuru(Request $r){

        $data = [
            "id_card" => $r->id_card,
            "nip_guru" => $r->nip_guru,
            "nama_guru" => $r->nama_guru,
            "jenis_kelamin" => $r->jenis_kelamin,
            "tempat_lahir" => $r->tempat_lahir,
            "tgl_lahir" => $r->tgl_lahir,
            "no_telp" => $r->no_telp,
            "alamat_rumah" => $r->alamat_rumah,
            "email" => $r->email,
            "foto" => $r->foto,
            "gelar_depan" => $r->gelar_depan,
            "gelar_belakang" => $r->gelar_belakang,
            "id_agama" => $r->id_agama,
            "tgl_buat" => now(),
            "sk" => $r->sk,
            "ktp" => $r->ktp,
        ];

        try {
            $x = Tblguru::create($data);
            if($x){
                echo json_encode(
                    [
                        "message" => "success",
                        "code" => 200,
                        "action" => 1
                    ]
                );
                return;
            }

            echo json_encode(
                [
                    "message" => "Failed",
                    "code" => 500,
                    "action" => 0
                ]
            );

        } catch (\Throwable $th) {
            echo json_encode(
                [
                    "message" => "Error in  query",
                    "code" => 500,
                    "action" => 0
                ]
            );
        }

    }

    // Memperbarui data guru
    function updateDataGuru(Request $r){

        $data = [
            "id_card" => $r->id_card,
            "nip_guru" => $r->nip_guru,
            "nama_guru" => $r->nama_guru,
            "jenis_kelamin" => $r->jenis_kelamin,
            "tempat_lahir" => $r->tempat_lahir,
            "tgl_lahir" => $r->tgl_lahir,
            "no_telp" => $r->no_telp,
            "alamat_rumah" => $r->alamat_rumah,
            "email" => $r->email,
            "foto" => $r->foto,
            "gelar_depan" => $r->gelar_depan,
            "gelar_belakang" => $r->gelar_belakang,
            "id_agama" => $r->id_agama,
            "tgl_buat" => now(),
            "sk" => $r->sk,
            "ktp" => $r->ktp,
        ];

        try {
            $x = Tblguru::where("id_guru", $r->id_guru)->update($data);
            if($x){
                echo json_encode(
                    [
                        "message" => "success",
                        "code" => 200,
                        "action" => 1
                    ]
                );
                return;
            }

            echo json_encode(
                [
                    "message" => "Failed",
                    "code" => 500,
                    "action" => 0
                ]
            );

        } catch (\Throwable $th) {
            echo json_encode(
                [
                    "message" => "Error in  query",
                    "code" => 500,
                    "action" => 0
                ]
            );
        }

    }

    // Menghapus data guru

    function hapusDataGuru($id_card){




        try {
            $exe = Tblguru::where("id_card", $id_card)->delete();
            if($exe){
                echo json_encode(
                    [
                        "message" => "Success",
                        "code" => 200,
                        "action" => 1
                    ]
                );
                $folder = "guru/" . $id_card;
                if (\File::exists($folder)) \File::deleteDirectory($folder);
                return;
            }

            echo json_encode(
                [
                    "message" => "Failed",
                    "code" => 500,
                    "action" => 0
                ]
            );
        } catch (\Throwable $th) {
            echo json_encode(
                [
                    "message" => "Error in query",
                    "code" => 500,
                    "action" => 0
                ]
            );
        }
    }
}
