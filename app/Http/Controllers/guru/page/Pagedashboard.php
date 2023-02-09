<?php

namespace App\Http\Controllers\guru\page;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class Pagedashboard extends Controller
{
    public function index()
    {
        if (isset($_COOKIE["userid"])) {
            $userid = Crypt::decryptString($_COOKIE["userid"]);
            $datalogin = DB::table("tbl_guru")->where("id", $userid)->select()->get();
            $guru = DB::table("tbl_guru")->select("*")->get();
            $siswa = DB::table("tbl_siswa")->select("*")->get();
            $jadwal = DB::table("tbl_jadwal_mapel")->select("*")->get();
            $mapel = DB::table("tbl_mata_pelajaran")->select("*")->get();
            $ruangan = DB::table("tbl_ruangan")->select("*")->get();
            $pengajar = DB::table("tbl_pengajar")->select("*")->get();
            $orang_tua = DB::table("tbl_orang_tua")->select("*")->get();
            $pengajar = DB::table("tbl_pengajar")->select("*")->get();
            $ruangan = DB::table("tbl_ruangan")->select("*")->get();
            $data = [
                "guru" => count($guru), "siswa" => count($siswa), "jadwal" => count($jadwal),
                "mapel" => count($mapel), "ruangan" => count($ruangan), "pengajar" => count($pengajar),
                "orangtua" => count($orang_tua), "ruangan" => count($ruangan),
            ];

            return view("guru.home", compact('datalogin', 'data'));

        } else {
            return redirect("admin/login");
        }
    }

    public function tahun_akademik()
    {

        if (isset($_COOKIE["userid"])) {
            $userid = Crypt::decryptString($_COOKIE["userid"]);
            $datalogin = DB::table("tbl_guru")->where("id", $userid)->select()->get();
            $agama = DB::table("tbl_agama")->select("*")->get();
            $kelas = DB::table("tbl_ruangan")->select("*")->get();
            $tahunajaran = DB::table("tbl_tahun_ajaran")->select("*")->get();
            $data = (Object) [
                "keterangan" => "Data Tahun Akademik",
            ];
            return view("guru.tahun_ajaran", compact("datalogin", 'data'));
        } else {
            return redirect("admin/login");
        }
    }

    public function ruangan()
    {

        if (isset($_COOKIE["userid"])) {
            $userid = Crypt::decryptString($_COOKIE["userid"]);
            $datalogin = DB::table("tbl_guru")->where("id", $userid)->select()->get();
            $data = (Object) [
                "keterangan" => "Data Ruangan",
            ];
            return view("guru.ruangan", compact("datalogin", 'data'));
        } else {
            return redirect("admin/login");
        }
    }

    public function mapel()
    {

        if (isset($_COOKIE["userid"])) {
            $userid = Crypt::decryptString($_COOKIE["userid"]);
            $datalogin = DB::table("tbl_guru")->where("id", $userid)->select()->get();
            $data = (Object) [
                "keterangan" => "Data Mata Pelajaran",
            ];
            return view("guru.mapel", compact("datalogin", 'data'));
        } else {
            return redirect("admin/login");
        }
    }

    public function jadwal()
    {

        if (isset($_COOKIE["userid"])) {
            $userid = Crypt::decryptString($_COOKIE["userid"]);
            $datalogin = DB::table("tbl_guru")->where("id", $userid)->select()->get();
            $data = (Object) [
                "keterangan" => "Data Jadwal",
            ];
            return view("guru.jadwal", compact("datalogin", 'data'));
        } else {
            return redirect("admin/login");
        }
    }

    public function siswa()
    {

        if (isset($_COOKIE["userid"])) {
            $userid = Crypt::decryptString($_COOKIE["userid"]);
            $datalogin = DB::table("tbl_guru")->where("id", $userid)->select()->get();
            $data = (Object) [
                "keterangan" => "Data Siswa",
            ];
            return view("guru.siswa", compact("datalogin", 'data'));
        } else {
            return redirect("admin/login");
        }
    }
    public function nilai()
    {

        if (isset($_COOKIE["userid"])) {
            $userid = Crypt::decryptString($_COOKIE["userid"]);
            $datalogin = DB::table("tbl_guru")->where("id", $userid)->select()->get();
            $data = (Object) [
                "keterangan" => "Data Nilai Siswa",
            ];
            return view("guru.nilai", compact("datalogin", 'data'));
        } else {
            return redirect("admin/login");
        }
    }

    public function raport()
    {

        if (isset($_COOKIE["userid"])) {
            $userid = Crypt::decryptString($_COOKIE["userid"]);
            $datalogin = DB::table("tbl_guru")->where("id", $userid)->select()->get();
            $data = (Object) [
                "keterangan" => "Data Raport Siswa",
            ];
            return view("guru.raport", compact("datalogin", 'data'));
        } else {
            return redirect("admin/login");
        }
    }

    
}
