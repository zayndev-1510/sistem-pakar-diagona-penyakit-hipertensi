<?php

namespace App\Http\Controllers\kepala_sekolah\page;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class PageLaporan extends Controller
{
    public function laporan($a, $b)
    {

        if (isset($_COOKIE["userid"])) {
            $userid = Crypt::decryptString($_COOKIE["userid"]);
            $datalogin = DB::table("tbl_guru")->where("id", $userid)->select()->get();

            $data = (Object) [
                "keterangan" => "",
                "data" => "",
            ];
            if ($b == "All") {
                $arr = DB::table("tbl_siswa as s")->
                    join("tbl_orang_tua as oa", "oa.id", "=", "s.id_orang_tua")->
                    join("tbl_ruangan as k", "k.id", "=", "s.id_kelas")->
                    join("tbl_tahun_ajaran as ta", "ta.id", "=", "s.id_tahun_ajaran")->
                    where("ta.id", "=", $a)->
                    select("s.id_kelas", "s.id_tahun_ajaran", "k.ket as nama_kelas", "ta.ket as tahun",
                    "s.nama_siswa", "s.nik", "s.nism", "s.tempat_lahir", "s.tgl_lahir", "s.jenis_kelamin",
                    "s.foto_kk", "s.foto_siswa", "oa.nama_ayah", "oa.nama_ibu", "oa.id as id_ortu", "s.id as id_siswa",
                    's.id_agama', 'oa.nik_ayah',"ta.ket as tahun_akademik"
                )->get();
                $data->keterangan = "Semua Kelas";
                $data->data=$arr;
                $data->tahun_akademik=$arr[0]->tahun_akademik;
                
            } else {
                $arr = DB::table("tbl_siswa as s")->
                    join("tbl_orang_tua as oa", "oa.id", "=", "s.id_orang_tua")->
                    join("tbl_ruangan as k", "k.id", "=", "s.id_kelas")->
                    join("tbl_tahun_ajaran as ta", "ta.id", "=", "s.id_tahun_ajaran")->
                    where("ta.id", "=", $a)->where("k.id", "=", $b)->
                    select("s.id_kelas", "s.id_tahun_ajaran", "k.ket as nama_kelas", "ta.ket as tahun",
                    "s.nama_siswa", "s.nik", "s.nism", "s.tempat_lahir", "s.tgl_lahir", "s.jenis_kelamin",
                    "s.foto_kk", "s.foto_siswa", "oa.nama_ayah", "oa.nama_ibu", "oa.id as id_ortu", "s.id as id_siswa",
                    's.id_agama', 'oa.nik_ayah',"ta.ket as tahun_akademik"
                )->get();
                $data->keterangan = $arr[0]->nama_kelas;
                $data->data=$arr;
                $data->tahun_akademik=$arr[0]->tahun_akademik;
            }
            
           return view("kepala-sekolah.laporan_siswa",compact('data'));
        } else {
            return redirect("admin/login");
        }
    }

    public function laporanRaport(){
        $dataakademik=DB::table("tbl_tahun_ajaran")->where("status",1)->get();
        return view("kepala-sekolah.laporan_raport",compact("dataakademik"));
    }
}
