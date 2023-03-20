/*jshint esversion: 6 */
var app = angular.module("homeApp", ['ngRoute']);


app.controller("homeController", function ($scope, service) {

    // deklarasi variabel
    var fun = $scope;

    var service = service;


    fun.pageKonsultasi=()=>{
        window.location.href="http://localhost:8000/konsultasi";
    }

});
