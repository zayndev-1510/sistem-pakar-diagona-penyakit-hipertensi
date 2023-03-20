/*jshint esversion: 6 */
var app = angular.module("homeApp", ['ngRoute']);


app.controller("homeController", function ($scope, service) {

    // deklarasi variabel
    var fun = $scope;

    var service = service;

    // fungsi memanggil data gejala
    fun.loadDataGejala=()=>{
        service.dataGejala(row=>{
            if(row.action==0){
                swal({
                    text:"Tidak bisa memuat data gejala !",
                    icon:"error"
                })
                return;
            }
            fun.datagejala=row.data;
        })
    }
    fun.loadDataGejala();

    fun.prosesCheck=(check)=>{
        if(check==1){
            console.log("Blue");
        }
    }

    fun.prosesKonsultasi=()=>{
        var data=fun.datagejala;
        var hasil=[];
        for(var i=0;i<data.length;i++){
            var checkhasil=data[i].hasil;
            if(checkhasil>=0.6){
                hasil.push({
                    cfuser:data[i].hasil,gejala:data[i].nama_gejala,kode_gejala:data[i].kode_gejala
                });
            }
        }
        if(hasil.length==0){
            swal({
                text:"Silakan pilih gejala yang dirasakan",
                icon:"warning"
            })
            return;
        }

        var obj={
            data:hasil,
        };
        service.prosesKonsultasi(obj,row=>{
            var datapakar=row.data.datapakar;
            var datahasil=row.data.array;
            fun.datapakar=datapakar;
            fun.datahasil=datahasil;
            fun.datauser=row.data.datauser;
            fun.rules=row.data.aturan;
            fun.penyakit=row.data.penyakit;

        });

    }

});
