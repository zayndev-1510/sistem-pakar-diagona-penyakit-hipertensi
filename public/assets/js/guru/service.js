app.service("service", ["$http", function ($http) {
    var link="http://localhost:8000/api/admin/"


    // api menyimpan data guru
    this.saveGuru = function (obj, callback) {
        $http({
            url: link + "save-guru",
            method: "POST",
            data: obj
        }).then(function (e) {

            callback(e.data);
        }).catch(function (err) {

        });
    }

     // api memperbarui data guru
    this.updateGuru = function (obj, callback) {
        $http({
            url: link + "update-guru",
            method: "POST",
            data: obj
        }).then(function (e) {

            callback(e.data);
        }).catch(function (err) {

        });
    }

     // api menghapus data guru
    this.deleteGuru = function (id_card,id_guru, callback) {
        $http({
            url: link + "delete-guru/"+id_card+"/"+id_guru,
            method: "DELETE",
        }).then(function (e) {

            callback(e.data);
        }).catch(function (err) {

        });
    }

    this.detailAkun = function (id_pengguna,callback) {
        $http({
            url: link + "detail-akun/"+id_pengguna,
            method: "GET",
        }).then(function (e) {

            callback(e.data);
        }).catch(function (err) {

        });
    }

     // api menampilkan data guru
    this.dataGuru= function (callback) {
        $http({
            url:  link+"data-guru",
            method: "GET"
        }).then(function (e) {

            callback(e.data);
        }).catch(function (err) {

        });
    }


     // api mengupload foto guru
    this.uploadFotoGuru=function(fd,POST_FILE,PATH_FILE,ID_CARD,callback) {
        $http({
            url: link + "upload-foto-guru/"+POST_FILE+"/"+PATH_FILE+"/"+ID_CARD,
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



}]);
