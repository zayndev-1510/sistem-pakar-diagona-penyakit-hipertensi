<?php

namespace App\Http\Controllers\admin\dao;

use App\Http\Controllers\Controller;
use App\Models\admin\Tblorangtua;
use App\Models\admin\Tblsiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Filesystem\Filesystem;

class SiswaController extends Controller
{
    // fungsi menampilkan data siswa
    function getDataSiswa(){

        try {

            $datasiswa = DB::table("TBL_SISWA as siswa")->join("TBL_TAHUN_AJARAN as akademik", "akademik.id_tahun_ajaran", "=", "siswa.id_tahun_ajaran")
            ->join("TBL_ORANG_TUA as ortu","ortu.id_orang_tua","=","siswa.id_orang_tua")
            ->join("TBL_AGAMA as agama","agama.id","=","siswa.id_agama")
            ->join("TBL_KELAS AS kelas","kelas.id_kelas","=","siswa.id_kelas")
            ->select("siswa.id_siswa", "siswa.nis","siswa.nik","siswa.tempat_lahir","siswa.tgl_lahir","siswa.jenis_kelamin","siswa.id_agama","siswa.id_kelas",
                "siswa.id_orang_tua","siswa.anak_ke","siswa.status_dalam_keluarga","siswa.asal_sekolah_dasar","siswa.asal_sekolah_menengah",
                "siswa.nama_lengkap","siswa.foto","siswa.kk","siswa.tgl_penerimaan","siswa.id_calon_siswa","agama.keterangan as kepercayaan",
                "akademik.tahun_akademik","ortu.nama_ayah","ortu.nama_ibu","ortu.pekerjaan_ayah","ortu.pekerjaan_ibu",
                "ortu.alamat","ortu.nomor_telepon","kelas.keterangan as nama_kelas","siswa.id_tahun_ajaran",
                "ortu.nama_wali","ortu.pekerjaan_wali","ortu.alamat_wali"
                )->get();
            echo json_encode([
                "message" => "Success",
                "code" => 200,
                "data" => $datasiswa,
                "action" => 1
            ]);

        } catch (\Throwable $th) {
            echo json_encode([
                "message" => "Error in query ".$th->getMessage(),
                "code" => 500,
                "action" => 0
            ]);
        }

    }


    // fungsi Menyimpan data siswa
    function saveDataSiswa(Request $r){

        try {


            $dataortu=[
                "nama_ayah"=>$r->ortu["nama_ayah"],"nama_ibu"=>$r->ortu["nama_ibu"],
                "pekerjaan_ayah"=>$r->ortu["pekerjaan_ayah"],"pekerjaan_ibu"=>$r->ortu["pekerjaan_ibu"],
                "nomor_telepon"=>$r->ortu["nomor_telepon"],"alamat"=>$r->ortu["alamat"],
                "nama_wali"=>$r->wali["nama_wali"],"alamat_wali"=>$r->wali["alamat_wali"],
                "pekerjaan_wali"=>$r->wali["pekerjaan_wali"],"tgl_buat"=>now()
            ];


            $x = Tblorangtua::create($dataortu);

            if($x){

                $datasiswa =
                [
                    "nis" => $r->siswa["nis"],"nik" => $r->siswa["nik"],
                    "nama_lengkap" => $r->siswa["nama_lengkap"],"tempat_lahir" => $r->siswa["tempat_lahir"],
                    "tgl_lahir" => $r->siswa["tgl_lahir"],"jenis_kelamin"=>$r->siswa["jenis_kelamin"],
                    "id_agama"=>$r->siswa["id_agama"],"id_kelas"=>$r->siswa["id_kelas"],"id_orang_tua"=>$x->id_orang_tua,
                    "asal_sekolah_dasar"=>$r->sekolah["asal_sekolah_dasar"],"asal_sekolah_menengah"=>$r->sekolah["asal_sekolah_menengah"],
                    "anak_ke"=>$r->siswa["anak_ke"],"status_dalam_keluarga"=>$r->siswa["status_dalama_keluarga"],
                    "id_tahun_ajaran"=>$r->siswa["tahun_masuk"],"tgl_penerimaan"=>$r->tgl_penerimaan,
                    "foto"=>$r->siswa["foto_siswa"],"kk"=>$r->siswa["foto_kk"]

                ];

                $y = Tblsiswa::create($datasiswa);
                if($y){
                    echo json_encode(
                        [
                            "message"=>"success",
                            "code"=>200,
                            "action"=>1
                        ]
                        );
                }

            return;
            }


            echo json_encode([
                "message" => "Failed",
                "code" => 500,
                "action" => 0
            ]);
        } catch (\Throwable $th) {
            echo json_encode([
                "message" => "Error ".$th->getMessage(),
                "code" => 500,
                "action" => 0
            ]);
        }
    }

    function updateDataSiswa(Request $r){
        $id_orang_tua = $r->ortu["id_orang_tua"];


        try {


            $dataortu=[
                "nama_ayah"=>$r->ortu["nama_ayah"],"nama_ibu"=>$r->ortu["nama_ibu"],
                "pekerjaan_ayah"=>$r->ortu["pekerjaan_ayah"],"pekerjaan_ibu"=>$r->ortu["pekerjaan_ibu"],
                "nomor_telepon"=>$r->ortu["nomor_telepon"],"alamat"=>$r->ortu["alamat"],
                "nama_wali"=>$r->wali["nama_wali"],"alamat_wali"=>$r->wali["alamat_wali"],
                "pekerjaan_wali"=>$r->wali["pekerjaan_wali"],"tgl_buat"=>now()
            ];



            $x = Tblorangtua::where("id_orang_tua",$id_orang_tua)->update($dataortu);

            if($x){

                $datasiswa =
                [
                    "nis" => $r->siswa["nis"],"nik" => $r->siswa["nik"],
                    "nama_lengkap" => $r->siswa["nama_lengkap"],"tempat_lahir" => $r->siswa["tempat_lahir"],
                    "tgl_lahir" => $r->siswa["tgl_lahir"],"jenis_kelamin"=>$r->siswa["jenis_kelamin"],
                    "id_agama"=>$r->siswa["id_agama"],"id_kelas"=>$r->siswa["id_kelas"],"id_orang_tua"=>$id_orang_tua,
                    "asal_sekolah_dasar"=>$r->sekolah["asal_sekolah_dasar"],"asal_sekolah_menengah"=>$r->sekolah["asal_sekolah_menengah"],
                    "anak_ke"=>$r->siswa["anak_ke"],"status_dalam_keluarga"=>$r->siswa["status_dalama_keluarga"],
                    "id_tahun_ajaran"=>$r->siswa["tahun_masuk"],"tgl_penerimaan"=>$r->tgl_penerimaan,
                    "foto"=>$r->siswa["foto"],"kk"=>$r->siswa["kk"]

                ];

                $y = Tblsiswa::where("id_siswa", $r->siswa["id_siswa"])->update($datasiswa);
                echo json_encode(
                    [
                        "message"=>"success",
                        "code"=>200,
                        "action"=>1
                    ]
                    );

            return;
            }


            echo json_encode([
                "message" => "Failed",
                "code" => 500,
                "action" => 0
            ]);
        } catch (\Throwable $th) {
            echo json_encode([
                "message" => "Error ".$th->getMessage(),
                "code" => 500,
                "action" => 0
            ]);
        }

    }

    function deleteDataSiswa($nik,$id_orang_tua){


        try {
            $x = Tblorangtua::where("id_orang_tua",$id_orang_tua)->delete();

            if($x){
                echo json_encode([
                    "message" => "Success",
                    "code" => 200,
                    "action" => 1
                ]);
                Tblsiswa::where("nik", $nik)->delete();
                $folder = "siswa/" .$nik;
                if (\File::exists($folder)) \File::deleteDirectory($folder);
                return;
            }



        } catch (\Throwable $th) {
            echo json_encode([
                "message" => "Error ".$th->getMessage(),
                "code" => 500,
                "action" => 0
            ]);
        }

    }

}
