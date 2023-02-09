app.service("service", ["$http", function ($http) {
    var link="http://localhost:8000/api/admin/"
    this.uploadBerkas=function(fd,POST_FILE,PATH_FILE, callback) {
        $http({
            url: link + "upload-foto-guru/"+POST_FILE+"/"+PATH_FILE,
            method: "POST",
            data: fd,
            headers: {
                'Content-Type': undefined
            },
        }).then(function successCallback(e) {
            callback(e.data);
        }).catch(function (err) {
            callback(err);
        });
    }

    this.insertData = function (obj,callback) {
        $http({
            url: link + "insert-data-arsip-sekolah",
            method: "POST",
            data:obj
        }).then(function (e) {

            callback(e.data);
        }).catch(function (err) {

        });
    }

    this.updateData = function (obj,callback) {
        $http({
            url: link + "update-data-arsip-sekolah",
            method: "POST",
            data:obj
        }).then(function (e) {

            callback(e.data);
        }).catch(function (err) {

        });
    }

    this.deleteData = function (obj,callback) {
        $http({
            url: link + "delete-data-arsip-sekolah",
            method: "POST",
            data:obj
        }).then(function (e) {

            callback(e.data);
        }).catch(function (err) {

        });
    }
    this.loadData = function (callback) {
        $http({
            url: link + "load-data-arsip-sekolah",
            method: "GET",
        }).then(function (e) {

            callback(e.data);
        }).catch(function (err) {

        });
    }



}]);
