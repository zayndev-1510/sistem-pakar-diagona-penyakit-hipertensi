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
    fun.tahun = "Pilih Tahun Ajaran";
    fun.id_tahun_ajaran = 0;
    fun.id = 0;
    var datamapel = [];
    var j = 0;
    var mapel = document.getElementsByClassName("mapel");
    fun.dataMapel = () => {
        $("#cover-spin").show();
        service.dataMapel((row) => {
            if(row.action>0){
                datamapel = row.data;
                fun.datamapel=datamapel;
            }

            $("#cover-spin").hide();

        });
    };

    fun.dataAkademik=()=>{
        service.dataAkademik(row=>{
            if(row.action>0){
                fun.dataakademik=row.data;
                return;
            }
        });
    }
    fun.dataMapel();
    fun.dataAkademik();
    fun.tambahData = () => {
        fun.ket = "Tambah Pelajaran";
        fun.checkedtambah = true;
        fun.btnsimpan = true;
        fun.btnperbarui = false;
    };
    fun.detail = (row) => {
        fun.id = row.id_mapel;
        mapel[0].value = row.nama_mapel;
        mapel[1].value=row.id_tahun_ajaran;
        fun.checkedtambah = true;
        fun.btnsimpan = false;
        fun.btnperbarui = true;
    };

    fun.selesai = () => {
        if (j == 0) {
            fun.checktahun = false;
            fun.ket = "Tambah Pelajaran";
        } else {
            fun.checktahun = false;
            fun.checkedtambah = false;
            j = 0;
        }
    };
    fun.kembali = () => {
        mapel[0].value = "";
        fun.ket = "Pilih Tahun Ajaran";
        fun.checkedtambah = false;
        fun.dataMapel();
    };

    fun.save = () => {
        $("#cover-spin").show();

        var obj = {
            nama_mapel:mapel[0].value,
            id_tahun_ajaran:mapel[1].value
        };
        service.saveMapel(obj, (row) => {
            $("#cover-spin").hide();
            if (row.action> 0) {
                swal({
                    text: "Mata Pelajaran Ini Berhasil Di Simpan",
                    icon: "success",
                });
                mapel[0].value = "";
                               fun.dataMapel();
            } else {
                swal({
                    text: "Mata Pelajaran ini gagal disimpan",
                    icon: "error",
                });
            }
        });
    };

    fun.perbarui = () => {
        $("#cover-spin").show();
        var obj = {
            nama_mapel:mapel[0].value,
            id_tahun_ajaran:mapel[1].value,
            id_mapel:fun.id
        };
        service.updateMapel(obj, (row) => {
            $("#cover-spin").hide();
            if (row.action > 0) {
                swal({
                    text: "Mata Pelajaran Ini Berhasil Di Perbarui",
                    icon: "success",
                });
                fun.dataMapel();
            } else {
                swal({
                    text: "Mata Pelajaran Ini Gagal Di Perbarui",
                    icon: "error",
                });
            }
        });
    };

    fun.hapus = (row) => {
        $("#cover-spin").show();
        service.deleteMapel(row.id_mapel, (e) => {
            $("#cover-spin").hide();
            if (e.action > 0) {
                swal({
                    text: "Mata Pelajaran Ini Berhasil Di Hapus",
                    icon: "success",
                });
                fun.dataMapel();
            } else {
                swal({
                    text: "Mata Pelajaran Ini Gagal Di Hapus",
                    icon: "error",
                });
            }
        });
    };
});
