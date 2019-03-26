@extends('muridview.header')
@section('content')
    <!-- ##### Header Area End ##### -->

    <!-- ##### Hero Area Start ##### -->
    <section class="hero-area bg-img bg-overlay-2by5" style="background-image: url(/muridtemp/img/bg-img/bg1.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <!-- Hero Content -->
                    <div class="hero-content text-center">
                        <h2>Ayo Belajar Bersama</h2>
                        <a href="#" class="btn clever-btn">Get Started</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Hero Area End ##### -->

    <!-- ##### Cool Facts Area Start ##### -->
    <section class="cool-facts-area section-padding-100-0">
        <div class="container">
            <div class="row">
                <!-- Single Cool Facts Area -->
                <div class="col-12 col-sm-6 col-lg-3">
                     <h5>Histori Kelas yang diikuti</h5>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <table id="simple-table" class="table  table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Nama Kelas</th>
                                <th>Pengajar</th>
                                <th>Tgl Gabung</th>
                                <th>Kategori</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($mydata as $listkelas)
                            <tr>
                                <td><a href="kelas/{{$listkelas->kode_kelas}}">{{$listkelas->nama_kelas}}</a></td>
                                 <td>{{$listkelas->nama_lengkap}}</td>
                                  <td>{{$listkelas->tgl_gabung}}</td>
                                    <td>{{$listkelas->nma_matpel}}</td>
                                     <td>{{$listkelas->status_kelass}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Cool Facts Area End ##### -->

    <footer class="footer-area">
        <!-- Top Footer Area -->
        <div class="top-footer-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <!-- Footer Logo -->
                        <!-- Copywrite -->
                        <p><a href="#"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> <a>REDO</a>. All rights reserved
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script src="/muridtemp/js/plugins/plugins.js"></script>
    <!-- Active js -->
    <script src="/muridtemp/js/active.js"></script>
    <!-- ##### Best Tutors End ##### -->
@endsection