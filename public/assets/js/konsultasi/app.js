/*jshint esversion: 6 */
var app = angular.module("homeApp", ['ngRoute']);


app.controller("homeController", function ($scope, service) {

    // deklarasi variabel
    var fun = $scope;

    var service = service;

    var gejalatemp=[];
    var pasien=document.getElementsByClassName("pasien");

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

    }

    fun.prosesKonsultasi=()=>{
        var x=0;
        for(var i=0;i<pasien.length;i++){
            if(pasien[i].value.length==0){
                x=x+1;
            }
        }
        if(x>0){
            swal({
                text:"Silakan lengkapi formulir pasien terlebih dahulu",
                icon:"error"
            })
            return;
        }



        var data=fun.datagejala;
        var hasil=[];
        for(var i=0;i<data.length;i++){
            var checkhasil=data[i].hasil;
            if(checkhasil>=0.6){
                hasil.push({
                    cfuser:data[i].hasil,gejala:data[i].nama_gejala,kode_gejala:data[i].kode_gejala,
                    gejala:data[i].nama_gejala
                });
                gejalatemp.push(data[i].nama_gejala);
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
            var penyakit=row.data.penyakitv2;
            fun.datapakar=datapakar;
            fun.datahasil=datahasil;
            fun.datauser=row.data.datauser;
            fun.rules=row.data.aturan;



            fun.p=penyakit.penyakit
            fun.hasilpersen=penyakit.hasil;

            var duplicate=row.data.duplicate
            if(duplicate>0){
                fun.penyakit="Berdasarkan aturan diatas penyakit tidak ditemukan";
            }
            else{
                fun.penyakit=row.data.penyakit;
            }
            var data={
                nama_pasien:pasien[0].value,
                tempat_lahir:pasien[1].value,
                tgl_lahir:pasien[2].value,
                jenis_kelamin:pasien[3].value,
                agama:pasien[4].value,
                alamat_rumah:pasien[5].value,
                nomor_handphone:pasien[6].value,
                penyakit:penyakit.penyakit,
                gejala:gejalatemp
            }
          service.savePasien(data,respon=>{

          })
          fun.loadDataGejala();
          gejalatemp=[];
        });
    }

});
