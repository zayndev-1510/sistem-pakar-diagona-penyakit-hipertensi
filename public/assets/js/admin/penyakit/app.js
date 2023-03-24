/*jshint esversion: 6 */
$(document).ready( function () {
    $('#dataTable').DataTable();
} );
var app = angular.module("homeApp", ['ngRoute','datatables']);


app.controller("homeController", function ($scope, service) {

    // deklarasi variabel
    var fun = $scope;

    var service = service;

    var penyakit=document.getElementsByClassName("penyakit");


    var temp_kode=0;
    var pengobatan=[];


    // fungsi load data penyakit
    fun.loadData=()=>{

        service.dataPenyakit(obj=>{

            var check=obj.action;
            if(check==0){
                swal({
                    text:"Ada Kesalahan !",
                    icon:"error",
                });
                return;
            }

            fun.datapenyakit=obj.data;

        })
    }

    fun.clearData=()=>{
        for(var i=0;i<penyakit.length;i++){
            penyakit[i].value="";
        }

    }
    // call load data
    fun.loadData();

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
        temp_kode=row.kode_penyakit;
        penyakit[0].value=row.kode_penyakit;
        penyakit[1].value=row.nama_penyakit;
        penyakit[2].value=row.keterangan;
        penyakit[3].value="";
        pengobatan=row.obat;
        fun.dataobat=pengobatan;
    }

    fun.tambahPengobatan=()=>{
        pengobatan.push({tips:penyakit[3].value,kode_penyakit:penyakit[0].value})
        fun.dataobat=pengobatan;
    }

    fun.hapusObat=(index)=>{
      pengobatan.splice(index,1)
    }

    fun.hapus=(row)=>{
        var obj={
            temp_kode:row.kode_penyakit
        }
        service.deletePenyakit(obj,respon=>{

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
            fun.loadData();

        })
    }

    fun.save=()=>{

        var obj={
            kode_penyakit:penyakit[0].value,
            nama_penyakit:penyakit[1].value,
            keterangan:penyakit[2].value
        }

        service.savePenyakit(obj,row=>{
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
            var data={
                data:pengobatan
            }
            service.savePengobatan(data,res=>{

            })
            fun.loadData();
            fun.clearData();
        })
    }

    fun.perbarui=()=>{

        var obj={
            kode_penyakit:penyakit[0].value,
            nama_penyakit:penyakit[1].value,
            temp_kode:temp_kode,
            keterangan:penyakit[2].value
        };

        service.updatePenyakit(obj,row=>{
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
            fun.loadData();
        })


        var data={
            data:pengobatan
        }

        service.checkData(data,res=>{
            var action=res.action;
            service.updatePengobatan(data,row=>{
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
                fun.loadData();
            })

        })


    }



});
