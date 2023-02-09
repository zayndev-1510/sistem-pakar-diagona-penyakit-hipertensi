app.service("service", ["$http", function ($http) {
    var link="http://localhost:8000/api/admin/"

    this.saveKegiatan = function (obj, callback) {
        $http({
            url: link + "insert-data-kegiatan",
            method: "POST",
            data: obj
        }).then(function (e) {

            callback(e.data);
        }).catch(function (err) {

        });
    }

    this.updateJadwal = function (obj, callback) {
        $http({
            url: link + "update-jadwal",
            method: "POST",
            data: obj
        }).then(function (e) {

            callback(e.data);
        }).catch(function (err) {

        });
    }
    this.deleteKegiatan = function (obj, callback) {
        $http({
            url: link + "delete-data-kegiatan/"+obj,
            method: "GET",
            data: obj
        }).then(function (e) {

            callback(e.data);
        }).catch(function (err) {

        });
    }

    this.dataKegiatan= function (callback) {
        $http({
            url:  link+"data-kegiatan",
            method: "GET"
        }).then(function (e) {

            callback(e.data);
        }).catch(function (err) {

        });
    }

    this.uploadThumbnail=function(fd,callback) {
        $http({
            url: link + "upload-thumbnail-kegiatan",
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

    this.uploadVideo=function(fd,callback) {
        $http({
            url: link + "upload-video-kegiatan",
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
