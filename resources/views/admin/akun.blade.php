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
                            <p style="font-size: 17px;font-weight: bolder;padding: 13px;">Akun Adminstrasi</p>
                           <table class="table">
                                <tr>
                                    <td>Nama Lengkap</td>
                                    <td>:</td>
                                    <td>{{$datalogin[0]->nama_lengkap}}</td>
                                </tr>

                                <tr>
                                    <td>Email</td>
                                    <td>:</td>
                                    <td>{{$datalogin[0]->email}}</td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td>:</td>
                                    <td>{{$datalogin[0]->alamat}}</td>
                                </tr>
                           </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
@section('javascript')
    <script src="{{ asset('assets/angularjs/angular.min.js') }}"></script>
    <script src="{{ asset('assets/angularjs/angular-route.min.js') }}"></script>
    <script src="{{ asset('assets/js/login/akun.js') }}"></script>
    <script src="{{ asset('assets/js/login/service.js') }}"></script>
@endsection
