/*jshint esversion: 6 */
$(document).ready( function () {
    $('#dataTable').DataTable();
} );
var app = angular.module("homeApp", ['ngRoute','datatables']);


app.controller("homeController", function ($scope, service) {

    // deklarasi variabel
    var fun = $scope;

    var service = service;

    var gejala=document.getElementsByClassName("gejala");


    var temp_kode=0;


    // fungsi load data penyakit

    fun.loadData=()=>{

        service.dataPenyakit(obj=>{

            var check=obj.action;
            if(check==0){
                swal({
                    text:"Ada Kesalahan Memuat Data Penyakit!",
                    icon:"error",
                });
                return;
            }

            fun.datapenyakit=obj.data;

        })
    }

    fun.loadDataGejala=()=>{

        service.dataGejala(obj=>{

            var check=obj.action;
            if(check==0){
                swal({
                    text:"Ada Kesalahan Memuat Data Gejala!",
                    icon:"error",
                });
                return;
            }

            fun.datagejala=obj.data;

        })
    }

    fun.clearData=()=>{
        for(var i=0;i<gejala.length;i++){
            gejala[i].value="";
        }

    }
    // call load data
    fun.loadData();
    fun.loadDataGejala();


    // fungsi tambah data

    fun.tambahData=()=>{
        fun.add=true;
        fun.btnsimpan=true;
        fun.clearData();
    }

    fun.kembali=()=>{
        fun.add=false;
        fun.btnsimpan=false;
        fun.btnperbarui=false;
        fun.clearData();
    }

    fun.detail=(row)=>{
        fun.add=true;
        fun.btnsimpan=false;
        fun.btnperbarui=true;
        temp_kode=row.kode_gejala;
        gejala[0].value=row.kode_gejala;
        gejala[1].value=row.nama_gejala;
        gejala[2].value=row.kode_penyakit;
    }

    fun.hapus=(row)=>{
        var obj={
            temp_kode:row.kode_gejala
        }
        service.deleteGejala(obj,respon=>{

            var check=respon.action;
            if (check==0){
                swal({
                    text:"Gagal menghapus",
                    icon:"error"
                })
                return
            }

            swal({
                text:"Berhasil hapus",
                icon:"success"
            })
            fun.loadDataGejala();

        })
    }

    fun.save=()=>{

        var obj={
            kode_gejala:gejala[0].value,
            nama_gejala:gejala[1].value,
            kode_penyakit:gejala[2].value
        }

        service.saveGejala(obj,row=>{
            var check=row.action;
            if(check==0){
                swal({
                    text:"Simpan data gagal!",
                    icon:"error",
                });
                return;
            }

            swal({
                text:"Simpan data berhasil",
                icon:"success"
            });
            fun.loadDataGejala();
            fun.clearData();
        })
    }

    fun.perbarui=()=>{

        var obj={
            kode_gejala:gejala[0].value,
            nama_gejala:gejala[1].value,
            kode_penyakit:gejala[2].value,
            temp_kode:temp_kode
        }

        service.updateGejala(obj,row=>{
            var check=row.action;
            if(check==0){
                swal({
                    text:"Perbarui data gagal!",
                    icon:"error",
                });
                return;
            }

            swal({
                text:"Perbarui data berhasil",
                icon:"success"
            });
            fun.loadDataGejala();
            fun.clearData();
        })

    }



});
