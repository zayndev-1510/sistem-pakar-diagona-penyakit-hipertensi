@extends('admin.layout.template');
@section('header-lvl-1')
    <div class="col-sm-6">
        <div class="breadcrumbs-area clearfix">
            <h4 class="page-title pull-left">Dashboard</h4>
            <ul class="breadcrumbs pull-left">
                <li><a href="index.html">Home</a></li>
                <li><span>Pengguna</span></li>
            </ul>
        </div>
    </div>
@endsection
@section('content')
    <div class="main-content-inner" ng-app="homeApp" ng-controller="homeController">
        <div class="row">
            <div class="col-8 mt-5" style="margin: auto">
                <div class="card">
                    <div class="card-body" id="detail-toko">
                        <div class="data-tab">
                            <p id="cekkepsek" ng-show="cek">Atur Username Dan Sandi Kepala Sekolah</p>
                            <table class="table">
                                <tr>
                                    <td>Nama Lengkap</td>
                                    <td>:</td>
                                    <td>@{{nama_lengkap}}</td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td>:</td>
                                    <td>@{{alamat}}</td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>:</td>
                                    <td>@{{email}}</td>
                                </tr>

                                <tr>
                                    <td>Jenis Kelamin</td>
                                    <td>:</td>
                                    <td>@{{jenis_kelamin}}</td>
                                </tr>
                                <tr>
                                    <td>Nomor Handphone</td>
                                    <td>:</td>
                                    <td>@{{nomor_hp}}</td>
                                </tr>
                                <tr>
                                    <td>Username</td>
                                    <td>:</td>
                                    <td>
                                        <input type="text" class="form-control" ng-model="username"/>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Sandi</td>
                                    <td>:</td>
                                    <td>
                                        <input type="password" class="form-control" ng-model="sandi"/>
                                    </td>
                                </tr>
                            </table>
                            <button class="mybtn" ng-click="simpan()">Perbarui</button>
                        </div>
                    </div>
                </div>
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
    <script src="{{ asset('assets/angularjs/sweetalert.min.js') }}"></script>
    <script src="{{ asset('assets/js/login/kepsek.js') }}"></script>
    <script src="{{ asset('assets/js/login/service.js') }}"></script>
@endsection
