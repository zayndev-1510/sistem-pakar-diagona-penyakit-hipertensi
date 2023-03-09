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
    fun.guru="Pilih Guru";
    fun.mapel="Pilih Mata Pelajaran";
    fun.kelas="Pilih Kelas";
    fun.id_tahun_ajaran=0;
    var id_guru=0;

    fun.checkinput=false;
    fun.dataPengajar=()=>{
        $("#cover-spin").show();
        service.dataPengajar(row=>{
           fun.datapengajar=row.data;
           $("#cover-spin").hide();
        })

    }

    fun.myFunct = function(keyEvent,value) {
        if (keyEvent.which === 13){
            var obj={
                id_guru:id_guru,
                jabatan:value
            }
            $("#cover-spin").show();
            service.savePengajar(obj,row=>{

                $("#cover-spin").hide();
                if(row.action>0){

                    swal({
                        text:"Suksess Memperbarui jabatan",
                        icon:"success"
                    })
                }else{
                    swal({
                        text:"Ada kesalahan !",
                        icon:"error"
                    })
                }
                fun.dataPengajar();
                fun.checkinput=false;




            })
        }

      }

    fun.editJabatan=(row)=>{
        fun.checkinput=true;
        id_guru=row.id_guru;
    }
    fun.dataPengajar();


});
