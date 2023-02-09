app.service("service", ["$http", function ($http) {
    var link="http://localhost:8000/api/admin/"
    this.saveArsip = function (obj, callback) {
        $http({
            url: link + "insert-data-arsip",
            method: "POST",
            data: obj
        }).then(function (e) {

            callback(e.data);
        }).catch(function (err) {

        });
    }

    this.deleteArsip = function (id, callback) {
        $http({
            url: link + "delete-data-arsip/"+id,
            method: "GET",
        }).then(function (e) {

            callback(e.data);
        }).catch(function (err) {

        });
    }
    this.dataAlumni= function (callback) {
        $http({
            url:  link+"get-data-alumni",
            method: "GET"
        }).then(function (e) {

            callback(e.data);
        }).catch(function (err) {

        });
    }
    this.dataArsip= function (callback) {
        $http({
            url:  link+"get-data-arsip",
            method: "GET"
        }).then(function (e) {

            callback(e.data);
        }).catch(function (err) {

        });
    }

    this.uploadIjazahSiswa=function(fd,id, callback) {
        $http({
            url: link + "upload-ijazah-siswa/"+id,
            method: "POST",
            data:fd,
            headers: {
                'Content-Type': undefined
            },
        }).then(function successCallback(e) {
            callback(e.data);
        }).catch(function (err) {
            callback(err);
        });
    }
}]);
