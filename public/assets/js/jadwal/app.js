/*jshint esversion: 6 */
$(document).ready(function () {
    $("#dataTable").DataTable();
});
var app = angular.module("homeApp", ["ngRoute", "datatables"]);

app.controller("homeController", function ($scope, service) {
    var fun = $scope;
    var service = service;
    fun.checkedtambah = false;
    fun.checktahun = false;
    fun.pengajar = "Pilih Pengajar";
    fun.mapel = "Pilih Mata Pelajaran";
    fun.hari = "Atur Hari";
    fun.id_tahun_ajaran = 0;
    fun.id = 0;
    var id_mapel = 0;
    var id_pengajar = 0;
    var id_kelas=0;
    var hari = "";
    fun.jam_masuk = "Atur Jam Masuk";
    fun.jam_keluar = "Atur Jam Keluar";
    fun.kelas="Pilih Kelas";
    fun.datahari = [
        { nama: "Senin" },
        { nama: "Selasa" },
        { nama: "Rabu" },
        { nama: "Kamis" },
        { nama: "Jumat" },
        { nama: "Sabtu" },
    ];
    fun.jadwal = {
        senin: [],
        selesa: [],
        rabu: [],
        kamis: [],
        jumat: [],
        sabtu: [],
    };
    fun.dataJadwal = () => {
        service.dataJadwal((row) => {
            var datatemp = row.data;
            var datahari = fun.datahari;
            for (var i in datahari) {
                var a = datahari[i];
                datahari[i].data = [];
                datahari[i].x = 0;
                var y = 1;
                for (var j in datatemp) {
                    var b = datatemp[j];
                    if (a.nama == b.hari) {
                        datahari[i].data.push(b);
                        datahari[i].x = y;
                        y++;
                    }
                }
            }
            fun.datajadwal = datahari;
        });
    };
    fun.aturJamMasuk = () => {
        fun.checkjam_in = true;
        fun.checktahun = true;
        fun.ket = "Atur Jam Masuk";
    };

    fun.aturJamKeluar = () => {
        fun.checkjam_out = true;
        fun.checktahun = true;
        fun.ket = "Atur Jam Keluar";
    };
    fun.dataJadwal();

    fun.tambahData = () => {
        fun.ket = "Tambah Jadwal";
        fun.checkedtambah = true;
        fun.btnsimpan = true;
        fun.btnperbarui = false;
    };

    fun.pilihKelas = () => {
        fun.ket = "Atur Kelas";
        fun.checktahun = true;
        fun.checkkelas = true;
        service.dataKelas((row) => {
            fun.datakelas = row;
            console.log(fun.datakelas);
        });
    };

    fun.pilihPengajar = () => {
        fun.ket = "Atur Pengajar";
        fun.checktahun = true;
        fun.checkpengajar = true;
        service.dataPengajar((row) => {
            fun.datapengajar = row.data;
        });
    };

    fun.pilihMapel = () => {
        fun.ket = "Atur Mata Pelajaran";
        fun.checktahun = true;
        fun.checkmapel = true;
        var datamapel=[];
        service.dataMapel((row) => {

            for(var i=0;i<row.data.length;i++){
                const obj=row.data[i];
                if(obj.status>0){
                    datamapel.push(obj);
                }
            }
            fun.datamapel = datamapel;
        });

    };
    fun.getPengajar = (row) => {
        fun.pengajar = row.nama_guru;
        id_pengajar = row.id_guru;
        fun.selesai();
    };

    fun.getMapel = (res) => {
        fun.mapel = res.nama_mapel
        id_mapel = res.id_mapel;
        fun.selesai();
    };

    fun.getKelas = (res) => {
        fun.kelas = res.keterangan
        id_kelas = res.id_kelas
        fun.selesai();
    };

    fun.pilihHari = () => {
        fun.ket = "Atur Hari";
        fun.checktahun = true;
        fun.checkhari = true;
        fun.checkkelas=false;
    };
    fun.getHari = (row) => {
        fun.hari = "Hari " + row.nama;
        hari = row.nama;
        fun.selesai();
    };
    fun.detail = (row) => {
        fun.checkedtambah = true;
        fun.pengajar =row.nama_guru;
        id_pengajar = row.id_guru;
        fun.mapel=row.nama_mapel;
        fun.btnsimpan = false;
        fun.btnperbarui = true;
        fun.id = row.id_jadwal;
        fun.kelas=row.nama_kelas;
        id_kelas=row.id_kelas;
        id_mapel=row.id_mapel;
        fun.hari = row.hari;
        hari=row.hari;
        fun.jam_masuk = row.jam_masuk;
        fun.jam_keluar = row.jam_keluar;
         $("#jam_masuk").val(row.jam_masuk);
        $("#jam_keluar").val(row.jam_keluar);
    };

    fun.selesai = () => {
        fun.checkpengajar = false;
        fun.checkhari = false;
        fun.checktahun = false;
        fun.checkjam_in = false;
        fun.checkmapel = false;
        fun.ket = "Tambah Jadwal";
    };

    fun.kembali = () => {
        fun.jam_masuk = $("#jam_masuk").val();
        fun.pengajar = "Pilih Pengajar";
        fun.hari = "Atur Hari";
        fun.jam_masuk = "Atur Jam Masuk";
        fun.jam_keluar = "Atur Jam Keluar";
        fun.checkedtambah = false;
        fun.mapel="Pilh Mata Pelajaran"
        fun.dataJadwal();
    };

    fun.aturJam = (a) => {
        if (a == 0) {
            fun.jam_masuk = $("#jam_masuk").val();
            fun.selesai();
        } else {
            fun.jam_keluar = $("#jam_keluar").val();
            fun.selesai();
        }
    };

    fun.save = () => {
        $("#cover-spin").show();
        var obj = {
            id_kelas:id_kelas,
            id_guru: id_pengajar,
            hari: hari,
            jam_masuk: $("#jam_masuk").val(),
            jam_keluar: $("#jam_keluar").val(),
            id_mapel:id_mapel
        };
        service.saveJadwal(obj, (row) => {
            if (row.action > 0) {
                swal({
                    text: "Data Ini Berhasil Di Simpan",
                    icon: "success",
                });
                $("#cover-spin").hide();
                fun.kembali();
            } else {
                swal({
                    text: "Data ini gagal disimpan",
                    icon: "error",
                });
            }
        });
    };

    fun.perbarui = () => {
        $("#cover-spin").show();
        var obj = {
            id_kelas:id_kelas,
            id_guru: id_pengajar,
            hari: hari,
            jam_masuk: $("#jam_masuk").val(),
            jam_keluar: $("#jam_keluar").val(),
            id_jadwal: fun.id,
            id_mapel:id_mapel
        };
        service.updateJadwal(obj, (row) => {
            if (row.action > 0) {
                swal({
                    text: "Data Ini Berhasil Di Perbarui",
                    icon: "success",
                });
                $("#cover-spin").hide();
                fun.kembali();
            } else {
                swal({
                    text: "Data Ini Gagal Di Perbarui",
                    icon: "error",
                });
            }
        });
    };
    fun.hapus = (row) => {
        $("#cover-spin").show();
        const obj = {
            id_jadwal: row.id_jadwal,
        };
        service.deleteJadwal(obj.id_jadwal, (e) => {
            if (e.action > 0) {
                swal({
                    text: "Data Ini Berhasil Di Hapus",
                    icon: "success",
                });
                $("#cover-spin").hide();
                fun.dataJadwal();
            } else {
                swal({
                    text: "Pengajar Ini Gagal Di Hapus",
                    icon: "error",
                });
            }
        });
    };
});
