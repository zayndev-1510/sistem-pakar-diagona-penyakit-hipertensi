/*jshint esversion: 6 */
$(document).ready(function () {
    $("#dataTable").DataTable();
});

// deklarasi variabel temp_kk
var temp_kk = "";

// fungsi utk preview file
function preview(event, a) {
    var berkas = event.target;
    var ext = berkas.value.substring(berkas.value.lastIndexOf(".") + 1);

    if (a == 1) {
        if (ext != "jpg") {
            swal({
                text: "Format file tidak mendukung",
                icon: "warning",
            });
        } else {
            const loadimg = document.getElementById("load_foto");
            loadimg.src = URL.createObjectURL(event.target.files[0]);
        }
    }
    else {
        if (ext != "pdf") {
            swal({
                text: "Format file tidak mendukung",
                icon: "warning",
            });
        } else {
            temp_kk = URL.createObjectURL(event.target.files[0]);

        }
    }

}


// deklarasi variabel "app" dari module angular dengan nama "homeApp"
var app = angular.module("homeApp", ["ngRoute", "datatables"]);

// memanggil controller dari moduler angular dengan nama "homeController"
app.controller("homeController", function ($scope, service) {

    // deklarasi variabel "fun" untuk mengambil nilai "$scope"
    var fun = $scope;

    // dkelarasi variabel "service" untuk mengambil nilai "service"
    var service = service;

    // deklarasi variabel "nama_lengkap" dengan nilai string
    fun.nama_lengkap = "Zayn";

    // deklarasi variabel "siswa" untuk memanipulasi dom dari class "siswa"
    var siswa = document.getElementsByClassName("siswa");

    // deklarasi variabel "ortu" untuk memanipulasi dom dari class "ortu"
    var ortu=document.getElementsByClassName("ortu")

    // deklarasi variabel "wali" untuk memanipulasi dom dari class "wali"
    var wali=document.getElementsByClassName("wali")

    var sekolah=document.getElementsByClassName("sekolah")

    // deklarasi variabel tanggal penerimaan
    var tanggal_penerimaan=document.getElementById("tgl_penerimaan")

    // deklarasi variabel "btnsimpan" dengan nilai FALSE
    fun.btnsimpan = false;

    // deklarasi variabel "btnperbarui" dengan nilai FALSE
    fun.btnperbarui = false;

    // deklarasi variabel "checkortu" dengan nilai FALSE
    fun.checkortu = false;

    // deklarasi variabel "ketortu" untuk keterangan
    fun.ketortu = "Atur Orang Tua";

    // deklarasi variabel "datafoto" untuk data foto
    var datafoto = [];



    // fungsi menampilkan data siswa
    fun.dataSiswa=()=>{
        service.dataSiswa(row=>{
            fun.datasiswa=row.data;
        })
    }

    fun.dataSiswa();


    // fungsi preview berkas kk
    fun.loadBerkas= () => {
        var page = document.createElement("a");
        page.target = "_blank";
        page.href = temp_kk;
        page.click();

    }

    // fungsi menampilkan data akademik
    fun.getDataAkademik=()=>{
       service.dataAkademik(row=>{
        const status=row.status;
        if(status==500){
            console.log(row.message)
            return;
        }

       })
    }

    // memanggil fungsi "getDataAkademik"
    fun.getDataAkademik();

    // fungsi membuka file
    fun.openFile = (a) => {
        if (a == 1) {
            document.getElementById("file1").click();
        } else {
            document.getElementById("file2").click();
        }
    };


    fun.detail=(row)=>{
       fun.checkedtambah = true;
       fun.checkedtable = true;
       fun.ket = "Perbarui Siswa";
       fun.btnsimpan = false;
       fun.btnperbarui=true;
       fun.id_siswa=row.id_siswa;
       fun.id_orang_tua=row.id_orang_tua;
       fun.foto=row.foto;
       fun.kk=row.kk;
       siswa[0].value=row.nis;
       siswa[1].value=row.nik;
       siswa[2].value=row.nama_lengkap;
       siswa[3].value=row.tempat_lahir;
       siswa[4].value=row.tgl_lahir;
       siswa[5].value=row.jenis_kelamin
       siswa[6].value=row.id_agama;
       siswa[7].value=row.id_kelas;
       siswa[8].value=row.id_tahun_ajaran;
       sekolah[0].value=row.asal_sekolah_dasar;
       sekolah[1].value=row.asal_sekolah_menengah;
       siswa[9].value=row.anak_ke;
       siswa[10].value=row.status_dalam_keluarga;
       ortu[0].value=row.nama_ayah;
       ortu[1].value=row.nama_ibu;
       ortu[2].value=row.pekerjaan_ayah;
       ortu[3].value=row.pekerjaan_ibu;
       ortu[4].value=row.alamat;
       ortu[5].value=row.nomor_telepon;
       wali[0].value=row.nama_wali;

       wali[1].value=row.pekerjaan_wali;
       wali[2].value=row.alamat_wali;
    }

    // fungsi membersikan data masukan
    fun.clear = () => {
        for (var i = 0; i < siswa.length; i++) {
            siswa[i].value = "";
        }

        for (var j=0;j<ortu.length;j++){
            ortu[j].value="";
        }

        for(var k=0;k<wali.length;k++){
            wali[k].value=""
        }

        temp_kk = "";
    };


    // fungsi menambahkan data siswa
    fun.tambahData = () => {
        fun.checkedtambah = true;
        fun.checkedtable = true;
        fun.ket = "Tambah Siswa";
        fun.btnsimpan = true;
        fun.clear();

    };

    // fungsi menyimpan data siswa
    fun.save = () => {
        $("#cover-spin").show();
        try {
            var data_siswa={
                nis:siswa[0].value,
                nik:siswa[1].value,
                nama_lengkap:siswa[2].value,
                tempat_lahir:siswa[3].value,
                tgl_lahir:siswa[4].value,
                jenis_kelamin:siswa[5].value,
                id_agama:siswa[6].value,
                id_kelas:siswa[7].value,
                tahun_masuk:siswa[8].value,
                anak_ke:siswa[9].value,
                status_dalama_keluarga:siswa[10].value,
                foto:"default.jpg",
                kk:"kosong"
            }

            var data_sekolah={
                asal_sekolah_dasar:sekolah[0].value,
                asal_sekolah_menengah:sekolah[1].value
            }

            var data_ortu={
                nama_ayah:ortu[0].value,
                nama_ibu:ortu[1].value,
                pekerjaan_ayah:ortu[2].value,
                pekerjaan_ibu:ortu[3].value,
                alamat:ortu[4].value,
                nomor_telepon:ortu[5].value
            }
            var data_wali={
                nama_wali:wali[0].value,
                pekerjaan_wali:wali[1].value,
                alamat_wali:wali[2].value
            }

            var data={siswa:data_siswa,ortu:data_ortu,wali:data_wali,sekolah:data_sekolah,tgl_penerimaan:tanggal_penerimaan.value}
            var file_foto = document.getElementById("file1");
            var fd_foto = new FormData();
            var file_kk = document.getElementById("file2");
            var fd_kk = new FormData();
            fd_foto.append("file", file_foto.files[0]);
            fd_kk.append("file", file_kk.files[0]);
            if (file_kk.value.length > 0) {
                service.uploadFotoKk(fd_kk, data_siswa.nik, (res) => {
                    if (res.val > 0) {
                        data_siswa.foto_kk = res.data;
                    }
                });
            }

            if (file_foto.value.length > 0) {
                service.uploadFotoSiswa(fd_foto, data_siswa.nik, (resp) => {
                    if (resp.val > 0) {
                        data_siswa.foto_siswa = resp.data;
                    }
                });
            }

            setTimeout((e) => {
                service.saveSiswa(data, (row) => {
                    $("#cover-spin").hide();
                    if (row.action> 0) {
                        swal({
                            text: "Simpan data siswa berhasil",
                            icon: "success",
                        });
                        fun.clear();
                        fun.ket = "Pilih Orang Tua";
                    } else {
                        swal({
                            text: "Simpan data siswa gagal",
                            icon: "error",
                        });
                    }
                });
            }, 3000);
        } catch (error) {
            console.error("error in "+error)
        }

    };

    fun.perbarui = () => {
        $("#cover-spin").show();
        try {
            var data_siswa={
                nis:siswa[0].value,
                nik:siswa[1].value,
                nama_lengkap:siswa[2].value,
                tempat_lahir:siswa[3].value,
                tgl_lahir:siswa[4].value,
                jenis_kelamin:siswa[5].value,
                id_agama:siswa[6].value,
                id_kelas:siswa[7].value,
                tahun_masuk:siswa[8].value,
                anak_ke:siswa[9].value,
                status_dalama_keluarga:siswa[10].value,
                foto:fun.foto,
                kk:fun.kk,
                id_siswa:fun.id_siswa
            }

            var data_sekolah={
                asal_sekolah_dasar:sekolah[0].value,
                asal_sekolah_menengah:sekolah[1].value
            }

            var data_ortu={
                nama_ayah:ortu[0].value,
                nama_ibu:ortu[1].value,
                pekerjaan_ayah:ortu[2].value,
                pekerjaan_ibu:ortu[3].value,
                alamat:ortu[4].value,
                nomor_telepon:ortu[5].value,
                id_orang_tua:fun.id_orang_tua
            }
            var data_wali={
                nama_wali:wali[0].value,
                pekerjaan_wali:wali[1].value,
                alamat_wali:wali[2].value
            }

            var data={siswa:data_siswa,ortu:data_ortu,wali:data_wali,sekolah:data_sekolah,tgl_penerimaan:tanggal_penerimaan.value,id_siswa:fun.id_siswa}
            var file_foto = document.getElementById("file1");
            var fd_foto = new FormData();
            var file_kk = document.getElementById("file2");
            var fd_kk = new FormData();
            fd_foto.append("file", file_foto.files[0]);
            fd_kk.append("file", file_kk.files[0]);
            if (file_kk.value.length > 0) {
                service.uploadFotoKk(fd_kk, data_siswa.nik, (res) => {
                    if (res.val > 0) {
                        data_siswa.foto_kk = res.data;
                    }
                });
            }

            if (file_foto.value.length > 0) {
                service.uploadFotoSiswa(fd_foto, data_siswa.nik, (resp) => {
                    if (resp.val > 0) {
                        data_siswa.foto_siswa = resp.data;
                    }
                });
            }

            setTimeout((e) => {
                service.updateSiswa(data, (row) => {
                    $("#cover-spin").hide();
                    if (row.action> 0) {
                        swal({
                            text: "Perbarui data siswa berhasil",
                            icon: "success",
                        });
                    } else {
                        swal({
                            text: "Simpan data siswa gagal",
                            icon: "error",
                        });
                    }
                });
            }, 3000);
        } catch (error) {
            console.error("error in "+error)
        }
    };

    fun.kembali = () => {
        fun.checkedtambah = false;
        fun.checkedtable = false;
        fun.btnsimpan = false;
        fun.btnperbarui = false;
        fun.filefoto = false;
        fun.dataSiswa();
        fun.clear();
    };

    fun.selesai = () => {
        fun.checkortu = false;
    };

    fun.hapus = (row) => {
        $("#cover-spin").show();
        const obj = {
          nik:row.nik,
          id_orang_tua:row.id_orang_tua
        };
        service.deleteSiswa(obj.nik,obj.id_orang_tua, (row) => {
            $("#cover-spin").hide();
            if (row.action > 0) {
                swal({
                    text: "Data Siswa ini telah dihapus",
                    icon: "success",
                }).then(function (e) {
                    fun.dataSiswa();
                });
            } else {
                swal({
                    text: "Data Siswa ini gagal dihapus",
                    icon: "error",
                }).then(function (e) { });
            }
        });
    };
});
