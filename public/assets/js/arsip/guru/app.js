/*jshint esversion: 6 */
$(document).ready(function () {
    $("#dataTable").DataTable();
});

var temp_berkas="";

function preview(event) {
    var berkas = event.target;
    var ext = berkas.value.substring(berkas.value.lastIndexOf(".") + 1);
    if ((ext == "pdf") || (ext =="docx")) {
        temp_berkas=URL.createObjectURL(event.target.files[0]);
    }
    else{
        swal({
            text:"Format file tidak mendukung",
            icon:"error"
        })
    }
}

var app = angular.module("homeApp", ["ngRoute", "datatables"]);

app.controller("homeController", function ($scope, service) {
    var fun = $scope;
    var service = service;

    var arsip=document.getElementsByClassName('arsip');
    var edit_arsip=document.getElementsByClassName("arsip-edit");
    var edit_caption=document.getElementById("edit_caption");
    var move_tab=document.getElementsByClassName("tab-btn");
    var id_dokumen=0;
    var temp_berkas="";
    var data_arsip=[];
    fun.bukaBerkas=()=>{
        document.getElementById("berkas").click();
    }


    fun.showBerkas=(row)=>{
     
        var element=document.createElement("a");
        element.target="_blank";
        element.href="http://localhost:8000/guru/"+row.jenis_arsip+"."+row.kategori_arsip+"/"+row.berkas;
        element.click();
    }
    fun.clearText=()=>{
        arsip[0].value="";
        arsip[1].value="";
    }

    fun.loadBerkas=()=>{
        var a=document.createElement("a");
        a.target="_blank";
        a.href=temp_berkas;
        a.click();
    }

    fun.detail=(row)=>{
        edit_arsip[0].value=row.nama_arsip;
        edit_arsip[1].value=row.jenis_arsip;
        edit_caption.innerHTML=row.berkas;
        id_dokumen=row.id;
        temp_berkas=row.berkas;
    }

    fun.loadData=()=>{
        service.loadData(e=>{
            fun.databerkas=e;
            fun.clearText();
            data_arsip=e;

        })
    }

    fun.loadData();


    fun.simpan=()=>{
        var file_upload_berkas=document.getElementById("berkas");
        var fd_berkas=new FormData();
        const POST_FILE="berkas";

        fd_berkas.append(POST_FILE,file_upload_berkas.files[0]);
        const PATH_FILE="guru_"+arsip[1].value;
        if((arsip[0].value.length==0) || (arsip[1].value.length==0)){
            swal({
                text:"Silakan lengkapi data yang kosong",
                icon:"warning"
            })
        }
        else{
            $("#cover-spin").show();
            const obj={
                nama_arsip:arsip[0].value,jenis_arsip:arsip[1].value,
                berkas:""

            }
            service.uploadBerkas(fd_berkas,POST_FILE,PATH_FILE,(e)=>{
                if(e.val>0){
                    obj.berkas=e.data;
                    service.insertData(obj,(res)=>{
                        $("#cover-spin").hide();
                        if(res.val>0){
                            swal({
                                text:"simpan dokumen guru berhasil",
                                icon:"success"
                            })
                            fun.loadData();
                        }
                        else{
                            swal({
                                text:"simpan dokumen guru gagal",
                                icon:"error"
                            })
                        }
                    });
                }
            })
        }

    }

    fun.perbaruiDokumen=()=>{

        const obj={
            nama_arsip:edit_arsip[0].value,jenis_arsip:edit_arsip[1].value,
            berkas:"",id:id_dokumen
        }
        var berkas=document.getElementById("berkas");
        if(berkas.value.length==0){
            $("#cover-spin").show();
            obj.berkas=temp_berkas;
            service.updateData(obj,(e)=>{
                $("#cover-spin").hide();
                if(e.val>0){
                    swal({
                        text:"Perbarui dokumen ini berhasil",
                        icon:"success"
                    })
                    fun.loadData();
                }
                else{
                    swal({
                        text:"Perbarui dokumen ini gagal",
                        icon:"error"
                    })
                }
            })
        }
        else{
            var fd_berkas=new FormData();
            const POST_FILE="berkas";

            fd_berkas.append(POST_FILE,berkas.files[0]);
            const PATH_FILE="guru_"+arsip[1].value;
            $("#cover-spin").show();
            service.uploadBerkas(fd_berkas,POST_FILE,PATH_FILE,(e)=>{

                if(e.val>0){
                    obj.berkas=e.data;
                    service.updateData(obj,(res)=>{
                        $("#cover-spin").hide();
                        if(res.val>0){
                            swal({
                                text:"Perbarui dokumen ini berhasil",
                                icon:"success"
                            })
                        }
                        else{
                            swal({
                                text:"Perbarui dokumen ini gagal",
                                icon:"error"
                            })
                        }
                    })
                }
            });
        }
    }

    fun.hapus=(row)=>{
        const obj={
            id:row.id
        }
        service.deleteData(obj,(e)=>{
            if(e.val>0){
                swal({
                    text:"Hapus dokumen ini berhasil",
                    icon:"success"
                })
                fun.loadData();
            }
            else{
                swal({
                    text:"Hapus dokumen ini gagal",
                    icon:"error"
                })
            }
        })
    }

    fun.moveTab=(a)=>{
        var kategori="";
        if(a==0){
            kategori="Persuratan"
            move_tab[0].style.backgroundColor="#574DE8";
            move_tab[1].style.backgroundColor="#CCC";
            move_tab[2].style.backgroundColor="#CCC";
        }
        else if(a==1){
            kategori="BOP";
            move_tab[1].style.backgroundColor="#574DE8";
            move_tab[0].style.backgroundColor="#CCC";
            move_tab[2].style.backgroundColor="#CCC";
        }
        else if(a==2){
            kategori="Dokumen Guru"
            move_tab[2].style.backgroundColor="#574DE8";
            move_tab[1].style.backgroundColor="#CCC";
            move_tab[0].style.backgroundColor="#CCC";
        }

        const datanew=data_arsip.filter(row=>{

            if(row.kategori_arsip==kategori){
                return row;
            }
        })

        fun.databerkas=datanew;
    }
});
