/*jshint esversion: 6 */
$(document).ready( function () {
    $('#dataTable').DataTable();
} );
var app = angular.module("homeApp", ['ngRoute','datatables']);


app.controller("homeController", function ($scope, service) {

    var fun = $scope;
    var service = service ;
    fun.checkedtambah=false;
    fun.checktahun=false;
    fun.hari="Atur Hari";
    fun.id=0;
    var data_input=document.getElementsByClassName("tahun_ajaran");
    fun.dataTahun=()=>{
        $("#cover-spin").show();
        service.dataTahun(row=>{
            if(row.action>0){
                fun.datatahun=row.data;
                $("#cover-spin").hide();
                return;
            };
        });
    }

    fun.dataTahun();

    fun.tambahData=()=>{
        fun.ket="Tambah Tahun Akademik";
        fun.checkedtambah=true;
        fun.btnsimpan=true;
        fun.btnperbarui=false;
    }

    fun.clear=()=>{
        for(var i=0;i<data_input.length;i++){
            data_input[i].value="";
        }
    }

    fun.detail=(row)=>{
        fun.id=row.id_tahun_ajaran;
        fun.checkedtambah=true;
        fun.btnsimpan=false;
        fun.btnperbarui=true;

        const data=[row.tahun_akademik,row.semester,row.tgl,row.status];
        for(var i in data){
            data_input[i].value=data[i];
        }
     }

    fun.kembali=()=>{
        fun.checkedtambah=false;
        fun.btnperbarui=false;
        fun.btnsimpan=false;
        fun.dataTahun();
        fun.clear();
    }

    fun.save=()=>{
        var obj={
            tahun_akademik:data_input[0].value,
            semester:data_input[1].value,
            tgl:data_input[2].value,
            status:data_input[3].value,
        };
        $("#cover-spin").show();
        service.saveTahun(obj,(row)=>{
            $("#cover-spin").hide();
            if(row.action>0){
                swal({
                    text:"Data Ini Berhasil Di Simpan",
                    icon:"success"
                });
                fun.clear();
            }
            else{
                swal({
                    text:"Data ini gagal disimpan",
                    icon:"error"
                })
            }
        })
    }

    fun.perbarui=()=>{
        var obj={
            tahun_akademik:data_input[0].value,
            semester:data_input[1].value,
            tgl:data_input[2].value,
            status:data_input[3].value,
            id_tahun_ajaran:fun.id
        };
        $("#cover-spin").show();
        service.updateTahun(obj,(row)=>{
            $("#cover-spin").hide();
            if(row.action>0){
                swal({
                    text:"Data Ini Berhasil Di Perbarui",
                    icon:"success"
                });
            }
            else{
                swal({
                    text:"Data Ini Gagal Di Perbarui",
                    icon:"error"
                })
            }
        })
    }
    fun.hapus=(row)=>{
        var obj={
            id_tahun_ajaran:row.id_tahun_ajaran
        };
        $("#cover-spin").show();
        service.deleteTahun(obj.id_tahun_ajaran,(e)=>{
            $("#cover-spin").hide();
            if(e.action>0){
                swal({
                    text:"Data Ini Berhasil Di Hapus",
                    icon:"success"
                });
                fun.dataTahun();
            }else{
                swal({
                    text:"Data Ini Gagal Di Hapus",
                    icon:"error"
                });
            }
        });
    }
});
