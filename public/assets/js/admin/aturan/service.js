app.service("service", ["$http", function ($http) {
    var link="http://localhost:8000/api/admin/"


     // fungsi memanggil api data penyakit
     this.dataGejala= function (callback) {
        $http({
            url:  link+"data-gejala",
            method: "GET"
        }).then(function (e) {
            callback(e.data);
        }).catch(function (err) {

        });
    }

    // fungsi memanggil api data penyakit
    this.dataPenyakit= function (callback) {
        $http({
            url:  link+"data-penyakit",
            method: "GET"
        }).then(function (e) {
            callback(e.data);
        }).catch(function (err) {

        });
    }

      // fungsi memanggil api data penyakit
      this.dataAturan= function (callback) {
        $http({
            url:  link+"data-aturan",
            method: "GET"
        }).then(function (e) {
            callback(e.data);
        }).catch(function (err) {

        });
    }


      // fungsi memanggil api menyimpan data aturan
      this.saveAturan= function (obj,callback) {
        $http({
            url:  link+"save-data-aturan",
            method: "POST",
            data:obj
        }).then(function (e) {
            callback(e.data);
        }).catch(function (err) {

        });
    }

      // fungsi memanggil api menyimpan data aturan
      this.updateAturan= function (obj,callback) {
        $http({
            url:  link+"update-data-aturan",
            method: "POST",
            data:obj
        }).then(function (e) {
            callback(e.data);
        }).catch(function (err) {

        });
    }

      // fungsi memanggil api menyimpan data aturan
      this.deleteAturan= function (obj,callback) {
        $http({
            url:  link+"delete-data-aturan",
            method: "POST",
            data:obj
        }).then(function (e) {
            callback(e.data);
        }).catch(function (err) {

        });
    }





}]);
