/*jshint esversion: 6 */
$(document).ready( function () {
    $('#dataTable').DataTable();
} );
var app = angular.module("homeApp", ['ngRoute','datatables']);


app.controller("homeController", function ($scope, service) {

    // deklarasi variabel
    var fun = $scope;

    var service = service;

    var aturan=document.getElementsByClassName("aturan");


    var id_aturan=0;

    var string=[];

      // fungsi load data aturan
      fun.loadDataAturan=()=>{
        service.dataAturan(obj=>{

            var check=obj.action;
            if(check==0){
                swal({
                    text:"Ada Kesalahan Memuat Data Aturan!",
                    icon:"error",
                });
                return;
            }

            fun.dataaturan=obj.data;

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

    fun.clearData=()=>{
        for(var i=0;i<aturan.length;i++){
            aturan[i].value="";
        }

    }
    // call load data
    fun.loadDataPenyakit();
    fun.loadDataGejala();
    fun.loadDataAturan();


    //fungsi tambah gejala

    fun.tambahGejala=()=>{
        string.push(aturan[0].value)
        aturan[1].value=string
    }


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
        aturan[1].value=row.rules;
        aturan[2].value=row.kode_penyakit;
        string.push(aturan[1].value)
        id_aturan=row.id_aturan;
    }

    fun.hapus=(row)=>{
        var obj={
            id_aturan:row.id_aturan
        }
        service.deleteAturan(obj,respon=>{

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
            fun.loadDataAturan();

        })
    }

    fun.save=()=>{

        if(aturan[1].value.length==0 && aturan[2].value.length==0){
            swal({
                text:"Lengkapi data yang masih kosong",
                icon:"error"
            })
        }else if(aturan[1].value.length==0){
            swal({
                text:"Rules masih kosong",
                icon:"error"
            })
        }else if(aturan[2].value.length==0){
            swal({
                text:"Penyakit masih kosong"
            })
        }else{
            var obj={
                kode_penyakit:aturan[2].value,
                rules:aturan[1].value
            }
            service.saveAturan(obj,row=>{
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
                fun.loadDataAturan();
                string=[];

            })
        }


    }

    fun.perbarui=()=>{


        aturan[1].value=string;
        var obj={
            rules:aturan[1].value,
            kode_penyakit:aturan[2].value,
            id_aturan:id_aturan
        }

        service.updateAturan(obj,row=>{
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
            fun.loadDataAturan();
            fun.clearData();
            string=[];
        })

    }



});
