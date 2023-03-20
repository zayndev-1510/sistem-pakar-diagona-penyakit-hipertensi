/*jshint esversion: 6 */
$(document).ready( function () {
    $('#dataTable').DataTable();
} );
var app = angular.module("homeApp", ['ngRoute','datatables']);


app.controller("homeController", function ($scope, service) {

    // deklarasi variabel
    var fun = $scope;

    var service = service;

    var basis=document.getElementsByClassName("basis_pengetahuan");


    var id_pengetahuan=0;


    // fungsi load data gejala
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

      // fungsi load data basis
      fun.loadDataBasis=()=>{

        service.dataBasis(obj=>{

            var check=obj.action;
            if(check==0){
                swal({
                    text:"Ada Kesalahan Memuat Data Gejala!",
                    icon:"error",
                });
                return;
            }

            fun.databasis=obj.data;

        })
    }

     // fungsi load data kepastian
     fun.loadDataKepastian=()=>{

        service.dataKepastian(obj=>{

            var check=obj.action;
            if(check==0){
                swal({
                    text:"Ada Kesalahan Memuat Data Kepastian!",
                    icon:"error",
                });
                return;
            }

            fun.datakepastian=obj.data;

        })
    }

    // fungsi load data penyakit
    fun.loadDataPenyakit=()=>{

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

    fun.clearData=()=>{
        basis[2].value="";
        basis[3].value="";

    }
    // call load data
    fun.loadDataBasis();
    fun.loadDataGejala();
    fun.loadDataPenyakit();
    fun.loadDataKepastian();
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
        fun.loadDataBasis();
    }

    fun.detail=(row)=>{
        fun.add=true;
        fun.btnsimpan=false;
        fun.btnperbarui=true;
        id_pengetahuan=row.id_pengetahuan;
        basis[0].value=row.kode_penyakit;
        basis[1].value=row.kode_gejala;
        basis[2].value=row.mb;
        basis[3].value=row.md;
    }

    fun.hapus=(row)=>{
        var obj={
            id_pengetahuan:row.id_pengetahuan
        }
        service.deleteBasisPengetahuanCf(obj,respon=>{

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
            fun.loadDataBasis();
        })
    }

    fun.save=()=>{

        var obj={
            kode_penyakit:basis[0].value,
            kode_gejala:basis[1].value,
            mb:basis[2].value,
            md:basis[3].value
        }

        service.saveBasisPengetahuanCf(obj,row=>{
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
            fun.clearData();
        })
    }

    fun.perbarui=()=>{
        var obj={
            kode_penyakit:basis[0].value,
            kode_gejala:basis[1].value,
            mb:basis[2].value,
            md:basis[3].value,
            id_pengetahuan:id_pengetahuan
        }


        service.updateBasisPengetahuanCf(obj,row=>{
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
            fun.kembali();
        })

    }



});
