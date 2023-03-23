/*jshint esversion: 6 */
var app = angular.module("homeApp", ['ngRoute']);


app.controller("homeController", function ($scope, service) {

    // deklarasi variabel
    var fun = $scope;

    var service = service;


    fun.dataGejala=()=>{
        service.dataGejala(res=>{
            fun.datagejala=res.data;
        })
    }
    fun.dataGejala();

});
