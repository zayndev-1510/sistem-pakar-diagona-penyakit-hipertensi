/*jshint esversion: 6 */

var app = angular.module("homeApp", ['ngRoute']);


app.controller("homeController", function ($scope, service) {

    // deklarasi variabel
    var fun = $scope;

    var service = service;

    var check=false;
    var username=document.getElementById("username");
    var password=document.getElementById("password");
    username.value="";
    password.value="";
    fun.loginAdmin=()=>{



        var obj={
            username:username.value,
            katasandi:password.value
        }

        if(username.value.length==0 && password.value.length==0){
            check=true;
        }else if(username.value.length==0){
            check=true;
        }else if(password.value.length==0){
            check=true;
        }else{
            check=false;
        }

        if(check){
            swal({
                text:"Lengkapi data yang masih kosong",
                icon:"error"
            })
            return;
        }

        service.loginAdmin(obj,row=>{

            if(row.action==0){
                swal({
                    text:"Login Gagal",
                    icon:"Error",
                });
                return;
            }
            window.location.href="http://localhost:8000/admin/page/dashboard";
            
        });

    }



});
