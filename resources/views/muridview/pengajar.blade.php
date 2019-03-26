@extends('muridview.header')
@section('content')

<!-- ##### Instructors Video Start ##### -->
    <div class="instructors-video d-flex align-items-center justify-content-center bg-img" style="background-image: url(/muridtemp/img/bg-img/bg4.jpg);">
        <h2>Jadilah Guru Terbaik</h2>
        <!-- video btn -->
        <a style="display:none;" href="https://www.youtube.com/watch?v=qC_T9ePzANg" class="video-btn"><i class="fa fa-play" aria-hidden="true"></i></a>
    </div>
    <!-- ##### Instructors Video End ##### -->

    <!-- ##### Best Tutors Area Start ##### -->
    <section class="best-tutors-area section-padding-100" style="display:none;">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading">
                        <h3>Pengajar Rating Tertinggi</h3>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="tutors-slide owl-carousel">

                        <!-- Single Tutors Slide -->
                        @foreach($ratingpengajar as $listmatpel)
                        <div class="single-tutors-slides">
                            <!-- Tutor Thumbnail -->
                            <div class="tutor-thumbnail">
                                <img src="{{$listmatpel->file_foto}}" alt="">
                            </div>
                            <!-- Tutor Information -->
                            <div class="tutor-information text-center">
                                <h5>{{$listmatpel->nama_lengkap}}</h5>
                                <span>{{$listmatpel->alamat_email}}</span>
                                <p style="display:none;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi fermentum laoreet elit, sit amet tincidunt mauris ultrices vitae.</p>
                                <div class="social-info" style="display:none;">
                                    <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                    <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                    <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>
                        @endforeach



                        

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Best Tutors Area End ##### -->

    <!-- ##### Top Teacher Area Start ##### -->
    <section class="top-teacher-area section-padding-0-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading">
                        <h3>Rekomendasi Pengajar</h3>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Single Teacher -->
                @foreach($rekompengajar as $listpengajar)
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="single-instructor d-flex align-items-center mb-30">
                        <div class="instructor-thumb">
                            <img src="{{$listpengajar->file_foto}}" alt="">
                        </div>
                        <div class="instructor-info">
                            <h5>{{$listpengajar->nama_lengkap}}</h5>
                            <span><i class="fa fa-envelope" aria-hidden="true"></i> {{$listpengajar->alamat_email}}</span>
                        </div>
                    </div>
                </div>
                @endforeach

                

                <!-- Single Teacher -->

            </div>
        </div>
    </section>

    <!-- ##### Best Tutors End ##### -->

    <!-- ##### Footer Area Start ##### -->
    <footer class="footer-area">
        <!-- Top Footer Area -->
        <div class="top-footer-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <!-- Footer Logo -->
                        <div class="footer-logo">
                            <a href="index.html"><img src="img/core-img/logo2.png" alt=""></a>
                        </div>
                        <!-- Copywrite -->
                        <p><a href="#"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> <a>REDO</a>. All rights reserved
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- ##### Footer Area End ##### -->

    <!-- All Plugins js -->
    <script src="/muridtemp/js/plugins/plugins.js"></script>
    <!-- Active js -->
    <script src="/muridtemp/js/active.js"></script>

    @endsection