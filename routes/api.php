<?php

use App\Http\Controllers\admin\dao\ArsipGuru_C;
use App\Http\Controllers\admin\dao\GuruController;
use App\Http\Controllers\admin\dao\Ijazah_C;
use App\Http\Controllers\admin\dao\JadwalController;
use App\Http\Controllers\admin\dao\Kegiatan_C;
use App\Http\Controllers\admin\dao\KelasController;
use App\Http\Controllers\admin\dao\Logincontroller;
use App\Http\Controllers\admin\dao\MapelController;
use App\Http\Controllers\admin\dao\Nilaicontroller;
use App\Http\Controllers\admin\dao\Orangtuacontroller;
use App\Http\Controllers\admin\dao\Pengajarcontroller;
use App\Http\Controllers\admin\dao\Penggunacontroller;
use App\Http\Controllers\admin\dao\Ruangancontroller;
use App\Http\Controllers\admin\dao\Sekolahcontroller;
use App\Http\Controllers\admin\dao\SiswaController;
use App\Http\Controllers\admin\dao\AkademikController;
use App\Http\Controllers\admin\dao\Wali_Kelas_C;
use App\Http\Controllers\Alumnicontroller;
use App\Http\Controllers\Caloncontroller;
use App\Http\Controllers\cobaController;
use App\Http\Controllers\GrafikController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\PageHome;
use App\Http\Controllers\plugin\uploadFiles;
use App\Models\admin\Wali_Kelas_M;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


route::prefix("app")->group(function(){

    route::post("login",[Logincontroller::class,"index"]);
    route::get("tampil",[cobaController::class,"tampilData"]);
    route::post("daftar",[Caloncontroller::class,"daftarSiswa"]);
    route::post("cekhasil",[Caloncontroller::class,"cekHasil"]);
    route::get("data-media",[MediaController::class,"getMedia"]);
});

route::prefix("grafik")->group(function(){

    route::get("siswa",[GrafikController::class,"siswa"]);
});

Route::prefix("admin")->group(function(){


    //Manajemen data kegiatan sekolah
    route::get("data-kegiatan",[Kegiatan_C::class,"loadData"]);
    route::post("upload-thumbnail-kegiatan",[uploadFiles::class,"uploadThumbnailKegiatan"]);
    route::post("upload-video-kegiatan",[uploadFiles::class,"uploadVideoKegiatan"]);
    route::post("insert-data-kegiatan",[Kegiatan_C::class,"insertData"]);
    route::get("delete-data-kegiatan/{id}",[Kegiatan_C::class,"deleteData"]);


    // Manajemen Tahun Akadmeik Sekolah
    route::get("data-sekolah",[Sekolahcontroller::class,"getDataSekolah"]);
    route::get("data-akademik",[AkademikController::class,"getDataAkademik"]);
    route::post("save-akademik",[AkademikController::class,"saveDataAkademik"]);
    route::post("update-akademik",[AkademikController::class,"updateDataAkademik"]);
    route::delete("delete-akademik/{id}",[AkademikController::class,"deleteDataAkademik"]);


    // Manajemen Data Pengguna
    route::get("data-pengguna",[Penggunacontroller::class,"dataPengguna"]);
    route::post("save-pengguna",[Penggunacontroller::class,"savePengguna"]);
    route::post("update-pengguna",[Penggunacontroller::class,"updatePengguna"]);
    route::post("delete-pengguna",[Penggunacontroller::class,"deletePengguna"]);

    // Manajemen Data Guru
    route::get("data-guru",[GuruController::class,"getDataGuru"]);
    route::post("save-guru",[GuruController::class,"saveDataGuru"]);
    route::post("update-guru",[GuruController::class,"updateDataGuru"]);
    route::delete("delete-guru/{id}",[GuruController::class,"hapusDataGuru"]);
    route::post("upload-foto-guru/{a}/{b}/{c}",[uploadFiles::class,"uploadImageGuru"]);


    // Manajemen Data Mata Pelajaran
    route::get("data-mapel",[MapelController::class,"getDataMapel"]);
    route::post("save-mapel",[MapelController::class,"saveDataMapel"]);
    route::post("update-mapel",[MapelController::class,"updateDataMapel"]);
    route::delete("delete-mapel/{id}",[Mapelcontroller::class,"deleteDataMapel"]);
    route::get("data-akademik-mapel",[MapelController::class,"getDataAkademik"]);


    // Manajemen Data Ruangan
    route::get("data-ruangan",[KelasController::class,"dataRuangan"]);
    route::post("save-ruangan",[KelasController::class,"saveRuangan"]);
    route::post("update-ruangan",[KelasController::class,"updateRuangan"]);
    route::post("delete-ruangan",[KelasController::class,"deleteRuangan"]);


    // Manajemen Data Pengajar
    route::get("data-pengajar",[Pengajarcontroller::class,"getDataPengajar"]);
    route::post("save-pengajar",[Pengajarcontroller::class,"saveDataPengajar"]);
    route::post("update-pengajar",[Pengajarcontroller::class,"updateDataPengajar"]);
    route::post("delete-pengajar",[Pengajarcontroller::class,"deleteDataPengajar"]);


    // Manajemen Data Orang Tua
    route::get("data-orangtua",[Orangtuacontroller::class,"getDataOrangTua"]);
    route::post("save-orangtua",[Orangtuacontroller::class,"saveDataOrangTua"]);
    route::post("update-orangtua",[Orangtuacontroller::class,"updateDataOrangTua"]);
    route::post("delete-orangtua",[Orangtuacontroller::class,"deleteDataOrangTua"]);


    // Manajemen Data Siswa
    route::get("data-tahun-akademik", [Siswacontroller::class, "dataAkademik"]);
    route::get("data-siswa",[SiswaController::class,"getDataSiswa"]);
    route::post("save-siswa",[SiswaController::class,"saveDataSiswa"]);
    route::get("siswa-by-ortu/{id}",[Siswacontroller::class,"getDataSiswaByOrtu"]);
    route::get("siswa-by-query/{id_akademik}/{id_kelas}",[Siswacontroller::class,"getDataSiswaByQuery"]);
    route::post("update-siswa",[SiswaController::class,"updateDataSiswa"]);
    route::delete("delete-siswa/{nik}/{id_orang_tua}",[SiswaController::class,"deleteDataSiswa"]);
    route::post("upload-foto-kk/{nism}",[uploadFiles::class,"uploadImageKk"]);
    route::post("upload-foto-siswa/{nism}",[uploadFiles::class,"uploadImageSiswa"]);


    // Manajemen Data Jadwal
    route::get("data-jadwal",[JadwalController::class,"getDataJadwal"]);
    route::get("jadwal-by-hari/{x}",[JadwalController::class,"dataJadwalByDay"]);
    route::post("save-jadwal",[JadwalController::class,"saveDataJadwal"]);
    route::post("update-jadwal",[JadwalController::class,"updateDataJadwal"]);
    route::delete("delete-jadwal/{id}",[JadwalController::class,"deleteDataJadwal"]);

    // Manajemen Data Nilai
    route::get("data-nilai-by-pengajar/{id}/{id_siswa}",[Nilaicontroller::class,"showDataById"]);
    route::post("data-insert-nilai",[Nilaicontroller::class,"insertData"]);
    route::post("data-update-nilai",[Nilaicontroller::class,"updateData"]);
    route::get("data-delete-nilai/{id}",[Nilaicontroller::class,"deleteData"]);
    route::get("data-nilai-by-siswa/{id}",[Nilaicontroller::class,"showNilaiBySiswa"]);


    // Manajemen Data Calon Siswa
    route::get("data-calon-siswa",[Caloncontroller::class,"Calonsiswa"]);
    route::post("konfirmasi-calon-siswa",[Caloncontroller::class,"konfirmasi"]);
    route::post("move-calon-to-siswa",[Caloncontroller::class,"moveSiswa"]);


    // Manajemen Data Alumni
    route::post("insert-data-alumni",[Alumnicontroller::class,"insertDataAlumni"]);
    route::get("get-data-alumni",[Alumnicontroller::class,"getDataAlumni"]);
    route::get("delete-data-alumni/{id}",[Alumnicontroller::class,"deleteDataAlumni"]);


    // Manajemen Data arsip
    route::post("insert-data-arsip",[Ijazah_C::class,"insertData"]);
    route::get("get-data-arsip",[Ijazah_C::class,"getData"]);
    route::get("delete-data-arsip/{id}",[Ijazah_C::class,"deleteData"]);

    route::post("upload-ijazah-siswa/{id}",[uploadFiles::class,"uploadIjazahSiswa"]);

    route::post("insert-data-arsip-sekolah",[ArsipGuru_C::class,"insertData"]);
    route::get("load-data-arsip-sekolah",[ArsipGuru_C::class,"loadData"]);
    route::post("update-data-arsip-sekolah",[ArsipGuru_C::class,"updateData"]);
    route::post("delete-data-arsip-sekolah",[ArsipGuru_C::class,"deleteData"]);


    // Manajemen Data Wali
    route::post("cek-data-wali",[Ruangancontroller::class,"cekWali"]);
    route::post("add-wali",[Ruangancontroller::class,"addWali"]);
    route::post("delete-wali",[Ruangancontroller::class,"deleteWali"]);
    route::get("data-wali",[Wali_Kelas_C::class,"dataWaliKelas"]);





});

?>
