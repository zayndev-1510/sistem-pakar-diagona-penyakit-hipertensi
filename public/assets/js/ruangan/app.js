/*jshint esversion: 6 */
$(document).ready( function () {
    $('#dataTable').DataTable();
} );
var app = angular.module("homeApp", ['ngRoute','datatables']);


app.controller("homeController", function ($scope, service) {

    var fun = $scope;
    var service = service ;
    var ruangan=document.getElementsByClassName("ruangan")
    fun.checkedtambah=false;

    var temp_id_kelas=0;
    var temp_obj;

    fun.dataRuangan=()=>{
        service.dataRuangan(row=>{
            fun.dataruangan=row;
        });
    }

    fun.dataGuru=()=>{
        service.dataGuru(row=>{
            fun.dataguru=row;

        })
    }

    fun.dataGuru();
    fun.dataRuangan();

    fun.clear=()=>{
        for(var i=0;i<ruangan.length;i++){
            ruangan[i].value="";
        }
    }

    fun.tambahData=()=>{
        fun.checkedtambah=true;
        fun.ket="Tambah Kelas";
        fun.btnsimpan=true;
        fun.btnperbarui=false;
    }

    fun.kembali=()=>{
        fun.checkedtambah=false;
        fun.btnsimpan=false;
        fun.btnperbarui=false;
        fun.clear();
        fun.dataRuangan();
    }

    fun.save=()=>{
        const obj={
            keterangan:ruangan[0].value,kategori:ruangan[1].value
        }
        $("#cover-spin").show();
        service.saveRuangan(obj,(row)=>{
            $("#cover-spin").hide();
            var action=row.action;
            if(action>0){
                swal({
                    text:"Data ini berhasil disimpan",
                    icon:"success"
                });
                fun.clear();
            }else{
                swal({
                    text:"Data ini gagal disimpan",
                    icon:"error"
                })
            }
        });
    }

    fun.detail=(row)=>{
        fun.id=row.id_kelas
        ruangan[0].value=row.keterangan;
        ruangan[1].value=row.kategori;
        fun.btnperbarui=true;
        fun.btnsimpan=false;
        fun.checkedtambah=true;
    }

    fun.perbarui=()=>{
        const obj={
            ket:ruangan[0].value,kategori:ruangan[1].value,id_kelas:fun.id
        }
        $("#cover-spin").show();
        service.updateRuangan(obj,(row)=>{
            $("#cover-spin").hide();
            var action=row.action;
            if(action>0){
                swal({
                    text:"Data ini berhasil diperbarui",
                    icon:"success"
                })
            }else{
                swal({
                    text:"Data ini gagal diperbarui",
                    icon:"error"
                })
            }
        });
    }

    fun.hapus=(row)=>{
        const obj={
            id_kelas:row.id_kelas
        }
        $("#cover-spin").show();
        service.deleteRuangan(obj,(e)=>{
            $("#cover-spin").hide();
            var action=e.action;
            if(action>0){
                swal({
                    text:"Data in berhasil dihapus",
                    icon:"success"
                })
                fun.dataRuangan();
            }else{
                swal({
                    text:"Data ini gagal disimpan",
                    icon:"error"
                })
            }
        })
    }

    fun.aturWali=(row)=>{
        const obj={
            id_kelas:row.id
        }
        fun.ket_kelas=row.ket;
        temp_id_kelas=row.id;
        temp_obj=row;
        service.cekWali(obj,(e)=>{
            fun.data_wali=e.data;
        })
    }

    fun.addWali=()=>{
        var id_guru=$("#id_guru").val();
        const obj={
            id_guru:id_guru,
            id_kelas:temp_id_kelas
        };

        service.addWali(obj,(e)=>{
            if(e.val>0){
                swal({
                    text:"Simpan data berhasil",
                    icon:"success"
                });
                fun.aturWali(temp_obj);
                fun.dataRuangan();
            }else{
                swal({
                    text:"Simpan data gagal",
                    icon:"error"
                })
            }
        })
    }

    fun.hapusWali=(id)=>{
        const obj={
            id:id
        }
        service.deleteWali(obj,(e)=>{
            if(e.val>0){
                swal({
                    text:"Simpan data berhasil",
                    icon:"success"
                });
                fun.aturWali(temp_obj);
                fun.dataRuangan();

            }else{
                swal({
                    text:"Simpan data gagal",
                    icon:"error"
                });
            }
        })
    }



});
