@extends('muridview.header')
@section('content')
<div class="clever-catagory bg-img d-flex align-items-center justify-content-center p-3" style="background-image: url(img/bc1.jpg);">
        <h3>Kelas</h3>
    </div>

    <!-- ##### Popular Course Area Start ##### -->
    <section class="popular-courses-area section-padding-100">
        <div class="container" id="page">
           
            <div class="row">
                <!-- Single Popular Course -->
                @if($status_data == "1")
                    @foreach($mydata as $listkelas)
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="single-popular-course mb-100 wow fadeInUp" data-wow-delay="250ms">
                        <img src="../{{$listkelas->file_gambar}}" alt="no photo" style="width:400px;heigh:400px">
                        <!-- Course Content -->
                        <div class="course-content">
                            <h4>{{$listkelas->nama_kelas}}</h4>
                            <div class="meta d-flex align-items-center">
                                <a href="#">{{$listkelas->nama_lengkap}}</a>
                                <span><i class="fa fa-circle" aria-hidden="true"></i></span>
                                <a href="#">{{$listkelas->nma_matpel}}</a>
                            </div>
                            <p>{{$listkelas->kelas_deskripsi}}</p>
                        </div>
                        <!-- Seat Rating Fee -->
                        <div class="seat-rating-fee d-flex justify-content-between">
                            <div class="seat-rating h-100 d-flex align-items-center">
                                <div class="seat">
                                    <i class="fa fa-user" aria-hidden="true"></i> {{$listkelas->jumlah_peserta_didik}}
                                </div>
                                <div class="rating">
                                    <i class="fa fa-star" aria-hidden="true"></i> {{$listkelas->jumlah_rating}}
                                </div>
                            </div>
                            <div class="course-fee h-100">
                                <a href="kelas/{{$listkelas->kode_kelas}}" class="free">Detail</a>
                            </div>
                        </div>
                    </div>
                </div>

                @endforeach
                @else
                    <h4>Tidak Ada Data Ditemukan</h4>
                @endif
                

            </div>

            <div class="row" id="remove-row">
                <div class="col-12">
                    <div class="load-more text-center wow fadeInUp" data-wow-delay="1000ms">
                        <a id="2" class="btn clever-btn btn-2 loadmore">Load More</a>
                    </div>
                </div>
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

    <!-- ##### All Javascript Script ##### -->
    <!-- jQuery-2.2.4 js -->
    <!-- ##### All Javascript Script ##### -->
    <!-- jQuery-2.2.4 js -->
    
    <!-- All Plugins js -->
    <script src="/muridtemp/js/plugins/plugins.js"></script>
    <!-- Active js -->
    <script src="/muridtemp/js/active.js"></script>
    
    <script type="text/javascript">
       $(document).ready(function(){
           $(document).on('click','.loadmore',function(){
            //alert("88");
               var usersid =  $(this).attr("id");
               var search = $('#search').val();
                alert(search);
                var base_url = "<?php echo url('/') ?>";
                var url1 = base_url + "/getloadmore?page="+usersid+"&search="+search;

                $.ajax({
                  type: "GET",
                  url: url1,
                  success: function(result) {
                    try {
                            $('#remove-row').remove();
                            $('#page').append(result);
                        } catch (e) {
                    }
                  
                  }
                });
           });  
        }); 

    </script>

    @endsection