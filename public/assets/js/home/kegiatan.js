var app = angular.module("homeApp", ["ngRoute"]);

app.controller("homeController", function ($scope, service) {
    var fun = $scope;
    var service = service;
    fun.getMedia=()=>{
        service.getMedia(e=>{
          var data=e;
           for(var i in data){
                data[i].thumbnail="http://localhost:8000/thumbnail/"+data[i].cover;
           }
           fun.datamedia=data;
        })
    }

    fun.login=()=>{
        location.href="http://localhost:8000/admin/login";
    }
    fun.getMedia();

    fun.detail=(e)=>{
        localStorage.setItem("detail",JSON.stringify(e));
        location.href="http://localhost:8000/detail-kegiatan"
    }
});
