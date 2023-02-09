@extends('admin.layout.template')
@section('header-lvl-1')
    <div class="col-sm-6">
        <div class="breadcrumbs-area clearfix">
            <h4 class="page-title pull-left">Dashboard</h4>
            <ul class="breadcrumbs pull-left">
                <li><a href="index.html">Home</a></li>
                <li style="font-family: Poppins;"><span>{{ $data->keterangan }}</span></li>
            </ul>
        </div>
    </div>
@endsection
@section('content')
    <div class="main-content-inner" ng-app="homeApp" ng-controller="homeController">
        <div class="row">
            <div class="col-12 mt-5" ng-hide="checkedtambah">
                <div class="card">
                    <div class="card-body" id="tabel-toko">
                        <div class="row" style="margin-bottom: 10px;">
                            <div class="col-10">
                                <p style="font-size: 17px;font-family: Poppins;">{{ $data->keterangan }}</p>
                            </div>
                            <div class="col-2">
                                <p id="design-btn-2" style="background-color: #514496;cursor: pointer;"
                                 ng-click="tambahData()"> <i class="ti-plus"></i> kegiatan Baru</p>
                            </div>
                        </div>
                        <div class="data-tab">
                            <table class="table table-bordered">
                                <tr class="text-center">
                                    <th>No</th>
                                    <th>Judul</th>
                                    <th>Tanggal</th>
                                    <th>Waktu</th>
                                    <th>Aksi</th>
                                </tr>
                                <tbody>
                                    <tr ng-repeat="row in datakegiatan">
                                        <td>@{{ $index + 1 }}</td>
                                        <td>@{{ row.judul }}</td>
                                        <td>@{{ row.tgl_post }}</td>
                                        <td>@{{ row.waktu_post }}</td>
                                        <td>
                                            <div class="row">
                                                <div class="col-6 col-md-6">
                                                    <p id="design-btn-2" style="background-color: #FFD04C;cursor: pointer;"
                                                        ng-click="rincianKegiatan(row)"> <i class="ti-pencil"></i> Rincian</p>
                                                </div>
                                                <div class="col-6 col-md-6">
                                                    <p id="design-btn-2" style="background-color: #E81224;cursor: pointer;"
                                                        ng-click="hapus(row)"> <i class="ti-trash"></i> Hapus Data</p>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-8 mt-5" style="margin: auto;" ng-show="checkedtambah">
                <div class="card">
                    <div class="card-body">
                        <div class="header-title">
                            <div class="row">
                                <div class="col-2">
                                    <p id="design-btn-2" style="cursor: pointer;background-color: #E81224;" ng-click="kembali()"><i class="ti-arrow-left"></i> Kembali</p>
                                </div>
                                <div class="col-10">
                                    <p class="pull-right" style="font-family: Poppins;">@{{ ket }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="data-tab">
                            <div class="row">
                                <div class="col-12">
                                    <input type="text" id="judul" class="form-control" style="margin-bottom: 20px;"
                                        placeholder="Tuliskan Judul Kegiatan" />
                                    <div id="deskripsi" class="form-control"></div>

                                    <div class="row" style="margin-top: 15px;">
                                        <div class="col-8 col-md-8">
                                            <p style="font-family: Poppins;font-size: 12px;">Silakan masukan foto</p>
                                        </div>
                                        <div class="col-2 col-md-2" ng-click="openThumbnail()">
                                            <input type="file" style="display: none;" id="filethumbnail" onchange="preview(event,1)">
                                            <p id="design-btn-2" style="cursor: pointer">Pilih foto</p>
                                        </div>
                                        <div class="col-2 col-md-2" data-toggle="modal" data-target="#myModal">
                                            <p id="design-btn-2" style="background-color: #F0F1F3;cursor: pointer;color: black;" >Lihat Foto</p>
                                        </div>
                                    </div>

                                    <div class="row" style="margin-top: 15px;">
                                        <div class="col-8 col-md-8">
                                            <p style="font-family: Poppins;font-size: 12px;">Silakan masukan video</p>
                                        </div>
                                        <div class="col-2 col-md-2" ng-click="openVideo()">
                                            <input type="file" style="display: none;" id="filevideo" onchange="preview(event,2)">
                                            <p id="design-btn-2" style="cursor: pointer;">Pilih video</p>
                                        </div>
                                        <div class="col-2 col-md-2"  data-toggle="modal" data-target="#myModal2">
                                            <p id="design-btn-2" style="background-color: #F0F1F3;color:black;cursor: pointer;">Lihat Video</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 col-md-12" style="margin-top: 10px;">
                                    <button class="btn btn-primary pull-left" ng-show="btnsimpan"
                                    ng-click="saveKegiatan()">
                                    Simpan
                                </button>
                                <button class="btn btn-primary" ng-show="btnperbarui" ng-click="perbarui()">
                                    Perbarui
                                </button>
                                </div>

                            </div>


                        </div>

                    </div>
            </div>
        </div>
    </div>
    </div>
    </div>
     <!-- The Modal -->
  <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Lihat Foto</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
            <img src="" id="image_thumbnail" class="img-responsive"/>
        </div>

        <!-- Modal footer -->

      </div>
    </div>
  </div>

  <div class="modal" id="myModal2">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Lihat Video</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">

            <video width="100%" id="loadVideo" controls>
                <source src="" type="video/mp4">
                Your browser does not support HTML video.
              </video>
        </div>

        <!-- Modal footer -->

      </div>
    </div>
  </div>

  <div class="modal" id="myModal3">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Rincian Kegiatan</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
            <p id="detail_video" style="font-family: Poppins"></p>
            <img src="" style="width: 100%;height:350px;" id="detail_foto"/>
            <div id="detail_deskripsi">

            </div>
            <video width="100%" id="load_detail_video" height="350px;" controls>
                <source src="" type="video/mp4">
                Your browser does not support HTML video.
              </video>
        </div>

        <!-- Modal footer -->

      </div>
    </div>
  </div>


  <div id="cover-spin">
    <div class="modal-message">
        <h2 class="animate">Loading</h2>
    </div>
</div>
@endsection
@section('javascript')
    <script src="{{ asset('assets/angularjs/angular.min.js') }}"></script>
    <script src="{{ asset('assets/angularjs/angular-route.min.js') }}"></script>
    <script src="{{ asset('assets/angularjs/angular-datatables.min.js') }}"></script>
    <script src="{{ asset('assets/angularjs/sweetalert.min.js') }}"></script>
    <script src="{{ asset('assets/summernote/summernote.min.js') }}"></script>

    <script src="{{ asset('assets/js/kegiatan/app.js') }}"></script>
    <script src="{{ asset('assets/js/kegiatan/service.js') }}"></script>
@endsection
