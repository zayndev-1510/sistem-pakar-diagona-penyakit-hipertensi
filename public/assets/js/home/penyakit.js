/*jshint esversion: 6 */
var app = angular.module("homeApp", ['ngRoute']);


app.controller("homeController", function ($scope, service) {

    // deklarasi variabel
    var fun = $scope;

    var service = service;


    fun.dataPenyakit=()=>{
        service.dataPenyakit(res=>{
            fun.datapenyakit=res.data;
        })
    }
    fun.dataPenyakit();

});
