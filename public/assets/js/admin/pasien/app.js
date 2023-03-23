/*jshint esversion: 6 */
$(document).ready( function () {
    $('#dataTable').DataTable();
} );
var app = angular.module("homeApp", ['ngRoute','datatables']);


app.controller("homeController", function ($scope, service) {

    // deklarasi variabel
    var fun = $scope;

    var service = service;

    // fungsi load data pasien
    fun.loadDataPasien=()=>{
        service.dataPasien(obj=>{

            var check=obj.action;
            if(check==0){
                swal({
                    text:"Ada Kesalahan Memuat Data Pasien!",
                    icon:"error",
                });
                return;
            }

            fun.datapasien=obj.data;

        })
    }

    fun.loadDataPasien();

    fun.hapus=(row)=>{
        var obj={
            id_pasien:row.id_pasien
        }
        service.hapusPasien(obj,res=>{
            if(res.action>0){
                swal({
                    text:"Hapus data berhasil",
                    icon:"success"
                })
                fun.loadDataPasien();
                return;
            }
            swal({
                text:"Hapus data gagal",
                icon:"error"
            })
        })
    }




});
