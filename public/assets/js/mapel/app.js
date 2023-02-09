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
            datamapel = row;
            fun.datamapel=datamapel;
            $("#cover-spin").hide();

        });
    };
    fun.dataMapel();
    fun.tambahData = () => {
        fun.ket = "Tambah Pelajaran";
        fun.checkedtambah = true;
        fun.btnsimpan = true;
        fun.btnperbarui = false;
    };
    fun.detail = (row) => {
        fun.id = row.id;
        mapel[0].value = row.ket;
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
        var data = [mapel[0].value];
        var obj = {
            ket: data[0],
        };
        service.saveMapel(obj, (row) => {
            $("#cover-spin").hide();
            if (row > 0) {
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
        const obj = {
            ket: mapel[0].value,
            id: fun.id,
        };
        service.updateMapel(obj, (row) => {
            $("#cover-spin").hide();
            if (row > 0) {
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
        const obj = {
            id: row.id,
        };
        service.deleteMapel(obj, (e) => {
            $("#cover-spin").hide();
            if (e > 0) {
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
