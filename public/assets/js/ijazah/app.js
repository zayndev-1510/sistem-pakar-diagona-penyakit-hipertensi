/*jshint esversion: 6 */
$(document).ready(function () {
    $("#dataTable").DataTable();
});

var app = angular.module("homeApp", ["ngRoute", "datatables"]);

app.controller("homeController", function ($scope, service) {
    var fun = $scope;
    var service = service;
    var id_siswa = 0;
    var sub_data=document.getElementsByClassName("sub-table")

    fun.getArsip=()=>{
        service.dataArsip(respon=>{
            fun.dataarsip=respon;
        })
    }
    fun.getArsip();
    fun.tambahData = () => {
        fun.checkedtambah = true;
    }

    fun.kembali=()=>{
        fun.checkedtambah=false;
        fun.getArsip();

    }

    fun.getSiswa = (row,a) => {
        id_siswa = row.id_siswa;
        for(var i=0;i<sub_data.length;i++){
            sub_data[i].style.backgroundColor="white";
            sub_data[i].style.color="black";
        }
        sub_data[a].style.backgroundColor="#7303fc";
        sub_data[a].style.color="white";
    }
    fun.getDataAlumni = () => {
        service.dataAlumni(e => {
            fun.dataalumni = e;
        })
    }

    fun.getDataAlumni();

    fun.insertData = () => {
        $("#cover-spin").show();
        var berkas = document.getElementById("ijazah");
        var ext = berkas.value.substring(berkas.value.lastIndexOf(".") + 1);
        if (ext != 'pdf') {
            swal({
                text: "Format file tidak mendukung !",
                icon: "error",
            })
        } else {
            var fd_berkas = new FormData();
            fd_berkas.append("file", berkas.files[0]);
            service.uploadIjazahSiswa(fd_berkas, id_siswa, (res) => {
                $("#cover-spin").hide();
                if (res.val > 0) {
                    const obj = {
                        tgl_arsip: $("#tgl_ambil").val(), id_siswa: id_siswa,
                        upload:"Admin",berkas:res.data
                    }
                    service.saveArsip(obj,(respon)=>{
                        if(respon.message>0){
                            swal({
                                text:"Data ini berhasil disimpan",
                                icon:"success"
                            });
                        }else{
                            swal({
                                text:"Data ini gagal disimpan",
                                icon:"error"
                            });
                        }
                    });
                }

            });
        }
    }

    fun.deleteData=(row)=>{
        service.deleteArsip(row.id_siswa,(respon)=>{
            if(respon.message>0){
                swal({
                    text:"Berhasil dihapus",
                    icon:"success"
                })
                fun.getArsip();
            }else{
                swal({
                    text:"Gagal dihapus",
                    icon:"error"
                })
            }
        });
    }

    fun.downloadFile=(row)=>{
        const url="http://localhost:8000/ijazah/siswa/"+row.id_siswa+"/"+row.berkas;
        location.href=url;
    }

});
