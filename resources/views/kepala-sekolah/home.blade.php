@extends('kepala-sekolah.layout.template')
@section('header-lvl-1')
    <div class="col-sm-6">
        <div class="breadcrumbs-area clearfix">
            <h4 class="page-title pull-left">Dashboard</h4>
            <ul class="breadcrumbs pull-left">
                <li><a href="index.html">Home</a></li>
                <li><span>Dashboard</span></li>
            </ul>
        </div>
    </div>
@endsection
@section('content')
    <div class="main-content-inner" ng-app="homeApp" ng-controller="homeController">
        <!-- sales report area start -->
        <div class="sales-report-area mt-5 mb-5">
           <div class="row">
               <div class="col-12">
                   <div class="row" style="margin-bottom: 10px;">
                    <div class="col-md-4" style="cursor: pointer">
                        <div class="single-report">
                            <div class="s-report-inner pr--10 pt--30 mb-3">
                                <div class="icon"><i class="ti-room"></i></div>
                                <div class="s-report-title d-flex justify-content-between">
                                    <h4 class="header-title mb-0">Ruangan</h4>
                                
                                </div>
                                <div class="d-flex justify-content-between pb-2">
                                    <h2>{{$data["ruangan"]}}</h2>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-md-4" style="cursor: pointer">
                        <div class="single-report">
                            <div class="s-report-inner pr--10 pt--30 mb-3">
                                <div class="icon"><i class="ti-book"></i></div>
                                <div class="s-report-title d-flex justify-content-between">
                                    <h4 class="header-title mb-0">Mata Pelajaran</h4>
                                
                                </div>
                                <div class="d-flex justify-content-between pb-2">
                                    <h2>{{$data["mapel"]}}</h2>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-md-4" style="cursor: pointer">
                        <div class="single-report">
                            <div class="s-report-inner pr--10 pt--30 mb-3">
                                <div class="icon"><i class="ti-user"></i></div>
                                <div class="s-report-title d-flex justify-content-between">
                                    <h4 class="header-title mb-0">Orang Tua</h4>
                                
                                </div>
                                <div class="d-flex justify-content-between pb-2">
                                    <h2>{{$data["orangtua"]}}</h2>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                   </div>
                   <div class="row">
                    <div class="col-md-4" style="cursor: pointer">
                        <div class="single-report">
                            <div class="s-report-inner pr--10 pt--30 mb-3">
                                <div class="icon"><i class="ti-user"></i></div>
                                <div class="s-report-title d-flex justify-content-between">
                                    <h4 class="header-title mb-0">Guru</h4>
                                
                                </div>
                                <div class="d-flex justify-content-between pb-2">
                                    <h2>{{$data["guru"]}}</h2>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-md-4" style="cursor: pointer">
                        <div class="single-report">
                            <div class="s-report-inner pr--10 pt--30 mb-3">
                                <div class="icon"><i class="ti-user"></i></div>
                                <div class="s-report-title d-flex justify-content-between">
                                    <h4 class="header-title mb-0">Siswa</h4>
                                
                                </div>
                                <div class="d-flex justify-content-between pb-2">
                                    <h2>{{$data["siswa"]}}</h2>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-md-4" style="cursor: pointer">
                        <div class="single-report">
                            <div class="s-report-inner pr--10 pt--30 mb-3">
                                <div class="icon"><i class="ti-user"></i></div>
                                <div class="s-report-title d-flex justify-content-between">
                                    <h4 class="header-title mb-0">Pengajar</h4>
                                
                                </div>
                                <div class="d-flex justify-content-between pb-2">
                                    <h2>{{$data["pengajar"]}}</h2>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                   </div>
               </div>
               <div class="col-12">
                   <div class="row">
                       <div class="col-12">
                           <div id="bg-jadwal">
                            <p style="padding-left: 10px;border-bottom: 2px solid whitesmoke;margin-bottom: 10px;">Jadwal Hari Ini</p>
                            <table class="table">
                                <thead>
                                    <tr class="text-center" style="background-color:#4336FB;color:white;">
                                        <td>Keterangan</td>
                                        <td>Jam Masuk</td>
                                        <td>Jam Keluar</td>
                                        <td>Guru</td>
                                    </tr>
                                </thead>
                                <tbody >
                                    <tr ng-repeat="row in datajadwal" class="text-center">
                                            <td>@{{row.nama_matpel}}</td>
                                            <td>@{{row.jam_masuk}}</td>
                                            <td>@{{row.jam_keluar}}</td>
                                            <td>@{{row.nama_guru}}</td>
                                    </tr>
                                </tbody>
                            </table>
                           </div>
                         
                       </div>
                   </div>
               </div>
           </div>
        </div>
        <!-- sales report area end -->
        <!-- overview area start -->
        <!-- row area start-->
    </div>
@endsection

@section('javascript')
    <script src="{{ asset('assets/angularjs/angular.min.js') }}"></script>
    <script src="{{ asset('assets/angularjs/angular-route.min.js') }}"></script>
    <script src="{{ asset('assets/angularjs/angular-datatables.min.js') }}"></script>
    <script src="{{ asset('assets/angularjs/sweetalert.min.js') }}"></script>
    <script src="{{ asset('assets/js/app-ortu/home/app.js') }}"></script>
    <script src="{{ asset('assets/js/app-ortu/home/service.js') }}"></script>
@endsection
