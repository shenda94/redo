@extends('muridview.header')
@section('content')

<!-- ##### Single Course Intro Start ##### -->
    @foreach($datakelas as $listkelas)
    <div class="single-course-intro d-flex align-items-center justify-content-center" style="background-image: url(../{{$listkelas->file_gambar}});">
        <!-- Content -->
        <div class="single-course-intro-content text-center">
            <!-- Ratings -->
            <div class="ratings" style="display: none;">
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star-o" aria-hidden="true"></i>
            </div>
            
            <h3>{{$listkelas->nama_kelas}}</h3>
            <div class="meta d-flex align-items-center justify-content-center">
                <a href="#">{{$listkelas->nama_lengkap}}</a>
                <span><i class="fa fa-circle" aria-hidden="true"></i></span>
                <a href="#">{{$listkelas->nma_matpel}}</a>
            </div>
            
            <div class="price">{{$listkelas->nm_level_kelas}}</div>
            <input type="hidden" name="IDT_KELAS" id="IDT_KELAS" value="{{$listkelas->id_kelas}}" />
            <input type="hidden" name="KODE_KELAS" id="KODE_KELAS" value="{{$listkelas->kode_kelas}}" />
        </div>
    </div>
    @endforeach
    <!-- ##### Single Course Intro End ##### -->

<!-- ##### Courses Content Start ##### -->
    <div class="single-course-content section-padding-100">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-8">
                    <div class="course--content">
                        <input type="hidden" name="status1" id="status1" value="{{$status}}" />

                        <div class="clever-tabs-content">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="tab--1" data-toggle="tab" href="#tab1" role="tab" aria-controls="tab1" aria-selected="false">Deskripsi</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tab--2" data-toggle="tab" href="#tab2" role="tab" aria-controls="tab2" aria-selected="true">Modul dan Kuis</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tab--3" data-toggle="tab" href="#tab3" role="tab" aria-controls="tab3" aria-selected="true">Reviews</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tab--4" data-toggle="tab" href="#tab4" role="tab" aria-controls="tab4" aria-selected="true">Peserta</a>
                                </li>
                            </ul>

                            <div class="tab-content" id="myTabContent">
                                <!-- Tab Text -->
                                <div class="tab-pane fade show active" id="tab1" role="tabpanel" aria-labelledby="tab--1">
                                    <div class="clever-description">

                                        <!-- About Course -->
                                        <div class="about-course mb-30">
                                            <h4>Deskripsi Kelas</h4>
                                            @foreach($datakelas as $listkelas)
                                            <p>{{$listkelas->tentang_kelas}}</p>
                                            @endforeach
                                        </div>

                                        <!-- All Instructors -->
                                        <div class="all-instructors mb-30">
                                            <h4>Rekomendasi Pengajar</h4>

                                            <div class="row">
                                                <!-- Single Instructor -->
                                                @foreach($rekomendasipengajar as $rekomendasipengajar2)
                                                <div class="col-lg-6">
                                                    <div class="single-instructor d-flex align-items-center mb-30">
                                                        <div class="instructor-thumb">
                                                            <img src="../{{$rekomendasipengajar2->file_foto}}" alt="no foto">
                                                        </div>
                                                        <div class="instructor-info">
                                                            <h5>{{$rekomendasipengajar2->nama_lengkap}}</h5>
                                                            <span>{{$rekomendasipengajar2->alamat_email}}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach

                                            </div>
                                        </div>

                                        
                                    </div>
                                </div>

                                <!-- Tab Text -->
                                <div class="tab-pane fade" id="tab2" role="tabpanel" aria-labelledby="tab--2">
                                    <div class="clever-curriculum">

                                        <!-- About Curriculum -->
                                        <div class="about-curriculum mb-30">
                                            <h4>Modul dan Kuis</h4>
                                        </div>

                                        <!-- Curriculum Level -->
                                        <input type="hidden" name="jawaban_dipilih" id="jawaban_dipilih" />
                                        <div class="curriculum-level mb-30">
                                            @if (@count($modulkelas) > 0)
                                            <ul class="curriculum-list">
                                                
                                                @foreach($modulkelas as $listmodul)
                                                @if ($listmodul->jenis_kelas == "0")
                                                <li><i class="fa fa-file" aria-hidden="true"></i> {{$listmodul->nm_kelas_det}}
                                                    <ul id="listmodul1" style="display: none;">
                                                        <li>
                                                            <div id="exampleAccordion1" data-children=".item">
                                                              <div class="item">
                                                                <a data-toggle="collapse" data-parent="#exampleAccordion1" href="#exampleAccordion3" aria-expanded="false" aria-controls="exampleAccordion3">
                                                                  Penjelasan Modul
                                                                </a>
                                                                <div id="exampleAccordion3" class="collapse" role="tabpanel">
                                                                    <p class="mb-3">
                                                                        {{$listmodul->penjelasan_modul}}
                                                                    </p>
                                                                    <p class="mb-3">
                                                                        <input type="hidden" name="file_materi" id="file_materi" value="{{$listmodul->id_kelas_det}}-{{$listmodul->file_materi}}" />
                                                                        <span><i class="fa fa-file-text" aria-hidden="true"></i> Modul: <span><a id="id-{{$listmodul->jenis_kelas}}-{{$listmodul->id_kelas_murid_det}}-{{$listmodul->id_kelas_det}}" class="modul">{{$listmodul->nama_file}}</a></span></span>
                                                                    </p>
                                                                </div>
                                                              </div>
                                                            </div>
                                                            
                                                        </li>
                                                    </ul>
                                                </li>
                                                @else
                                                <li>
                                                    <span><i class="fa fa-graduation-cap" aria-hidden="true"></i> {{$listmodul->nm_kelas_det}}</span>
                                                    <ul id="detkuis" style="display: none;">
                                                        <li>
                                                            <div>
                                                                <p>
                                                                  <a class="btn clever-btn mb-30 w-100" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                                                    Lihat Kuis
                                                                  </a>
                                                                </p>
                                                                <div class="collapse" id="collapseExample">
                                                                  <div class="card card-body">
                                                                        <p>{{$listmodul->pertanyaan_kuis}}</p>

                                                                        <?php $styleA = "color:black;"; ?>
                                                                            <?php $styleB = "color:black;"; ?>
                                                                            <?php $styleC = "color:black;"; ?>
                                                                            <?php $styleD = "color:black;"; ?>

                                                                            <?php $button1 = 'style="display: block;"'; ?>
                                                                        <?php $pembahasan1 = 'style="display: none;"'; ?>
                                                                        
                                                                        @if($listmodul->jawaban_benar == "A")
                                                                            <?php $styleA = "color:green;"; ?>
                                                                            <?php $styleB = "color:black;"; ?>
                                                                            <?php $styleC = "color:black;"; ?>
                                                                            <?php $styleD = "color:black;"; ?>
                                                                        @elseif($listmodul->jawaban_benar == "B")
                                                                            <?php $styleA = "color:black;"; ?>
                                                                            <?php $styleB = "color:green;"; ?>
                                                                            <?php $styleC = "color:black;"; ?>
                                                                            <?php $styleD = "color:black;"; ?>
                                                                        @elseif($listmodul->jawaban_benar == "C")
                                                                            <?php $styleA = "color:black;"; ?>
                                                                            <?php $styleB = "color:black;"; ?>
                                                                            <?php $styleC = "color:green;"; ?>
                                                                            <?php $styleD = "color:black;"; ?>
                                                                        @elseif($listmodul->jawaban_benar == "D")
                                                                            <?php $styleA = "color:black;"; ?>
                                                                            <?php $styleB = "color:black;"; ?>
                                                                            <?php $styleC = "color:black;"; ?>
                                                                            <?php $styleD = "color:green;"; ?>
                                                                        @endif

                                                                        <?php $checkA = ''; ?>
                                                                        <?php $checkB = ''; ?>
                                                                        <?php $checkC = ''; ?>
                                                                        <?php $checkD = ''; ?>
                                                                    

                                                                    @if($listmodul->jawaban_kuis == "A")
                                                                        @if($listmodul->jawaban_benar == $listmodul->jawaban_kuis)
                                                                            <?php $styleA = "color:green;"; ?>
                                                                            <?php $checkA = 'checked="true"'; ?>
                                                                        @else
                                                                            <?php $styleA = "color:red;"; ?>
                                                                            <?php $checkA = 'checked="true"'; ?>
                                                                        @endif

                                                                        <?php $button1 = 'style="display: none;"'; ?>
                                                                        <?php $pembahasan1 = 'style="display: block;"'; ?>
                                                                    @elseif($listmodul->jawaban_kuis == "B")
                                                                        @if($listmodul->jawaban_benar == $listmodul->jawaban_kuis)
                                                                            <?php $styleB = "color:green;"; ?>
                                                                            <?php $checkB = 'checked="true"'; ?>
                                                                        @else
                                                                            <?php $styleB = "color:red;"; ?>
                                                                            <?php $checkB = 'checked="true"'; ?>
                                                                        @endif

                                                                        <?php $button1 = 'style="display: none;"'; ?>
                                                                        <?php $pembahasan1 = 'style="display: block;"'; ?>
                                                                    @elseif($listmodul->jawaban_kuis == "C")
                                                                        @if($listmodul->jawaban_benar == $listmodul->jawaban_kuis)
                                                                            <?php $styleC = "color:green;"; ?>
                                                                            <?php $checkC = 'checked="true"'; ?>
                                                                        @else
                                                                            <?php $styleC = "color:red;"; ?>
                                                                            <?php $checkC = 'checked="true"'; ?>
                                                                        @endif

                                                                        <?php $button1 = 'style="display: none;"'; ?>
                                                                        <?php $pembahasan1 = 'style="display: block;"'; ?>
                                                                    @elseif($listmodul->jawaban_kuis == "D")
                                                                        @if($listmodul->jawaban_benar == $listmodul->jawaban_kuis)
                                                                            <?php $styleD = "color:green;"; ?>
                                                                            <?php $checkD = 'checked="true"'; ?>
                                                                        @else
                                                                            <?php $styleD = "color:red;"; ?>
                                                                            <?php $checkD = 'checked="true"'; ?>
                                                                        @endif

                                                                        <?php $button1 = 'style="display: none;"'; ?>
                                                                        <?php $pembahasan1 = 'style="display: block;"'; ?>
                                                                    @elseif($listmodul->jawaban_kuis == "")
                                                                        <?php $button1 = 'style="display: block;"'; ?>
                                                                        <?php $pembahasan1 = 'style="display: none;"'; ?>
                                                                    @endif


                                                                        <div class="radio">
                                                    <label>
                                                        <input name="kode_hasil_rikes" type="radio" class="ace pilihkuis" id="A_{{$listmodul->id_kelas_det}}" value="a" <?php echo $checkA; ?> />
                                                        <span class="lbl" id="lbl_A_{{$listmodul->id_kelas_det}}" style="<?php echo $styleA; ?>"> a. {{$listmodul->A}}</span>
                                                    </label>
                                                </div>


                                                <div class="radio">
                                                    <label>
                                                        <input name="kode_hasil_rikes" type="radio" class="ace pilihkuis" id="B_{{$listmodul->id_kelas_det}}" value="b" <?php echo $checkB; ?> />
                                                        <span class="lbl" id="lbl_B_{{$listmodul->id_kelas_det}}" style="<?php echo $styleB; ?>"> b. {{$listmodul->B}}</span>
                                                    </label>
                                                </div>

                                                <div class="radio">
                                                    <label>
                                                        <input name="kode_hasil_rikes" type="radio" class="ace pilihkuis" id="C_{{$listmodul->id_kelas_det}}" value="c" <?php echo $checkC; ?> />
                                                        <span class="lbl" id="lbl_C_{{$listmodul->id_kelas_det}}" style="<?php echo $styleC; ?>"> c. {{$listmodul->C}}</span>
                                                    </label>
                                                </div>

                                                <div class="radio">
                                                    <label>
                                                        <input name="kode_hasil_rikes" type="radio" class="ace pilihkuis" id="D_{{$listmodul->id_kelas_det}}" value="d" <?php echo $checkD; ?> />
                                                        <span class="lbl" id="lbl_D_{{$listmodul->id_kelas_det}}" style="<?php echo $styleD; ?>"> d. {{$listmodul->D}}</span>
                                                    </label>
                                                </div>

                                                <button id="id2-{{$listmodul->jenis_kelas}}-{{$listmodul->id_kelas_murid_det}}-{{$listmodul->id_kelas_det}}" name="btnkirim" class="btn clever-btn mb-30 w-100 btn-warning btnkirim" style="<?php echo $button1; ?>">Kirim Jawaban</button>

                                                        <div id="exampleAccordion" data-children=".item" style="<?php echo $pembahasan1; ?>">
                                                          <div class="item">
                                                            <a data-toggle="collapse" data-parent="#exampleAccordion" href="#exampleAccordion2" aria-expanded="false" aria-controls="exampleAccordion2">
                                                              Pembahasan
                                                            </a>
                                                            <div id="exampleAccordion2" class="collapse" role="tabpanel">
                                                                <p class="mb-3">
                                                                    Jawaban Benar : {{$listmodul->jawaban_benar}}
                                                              </p>
                                                              <p class="mb-3">
                                                                {{$listmodul->pembahasan_kuis}}
                                                              </p>
                                                            </div>
                                                          </div>
                                                        </div>


                                                                  </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                    
                                                </li>
                                                @endif
                                                @endforeach
                                                
                                            </ul>
                                            @else
                                            <h4>Modul dan Kuis Belum Ada</h4>
                                            @endif
                                        </div>
                                    </div>

                                    <button id="btnselesai" name="btnselesai" class="btn clever-btn mb-30 w-100 btn-warning">Selesai</button>
                                </div>

                                <!-- Tab Text -->
                                <div class="tab-pane fade" id="tab3" role="tabpanel" aria-labelledby="tab--3">
                                    <div class="clever-review">

                                        <!-- About Review -->
                                        <div class="about-review mb-30">
                                            <h4>Reviews</h4>
                                            
                                        </div>

                                        <!-- Ratings -->

                                        <!-- Single Review -->
                                        @if (@count($pesertakelas) > 0)
                                        @foreach($pesertakelas as $listpesertakelas)
                                        <div class="single-review mb-30">
                                            <div class="d-flex justify-content-between mb-30">
                                                <!-- Review Admin -->
                                                <div class="review-admin d-flex">
                                                    <div class="thumb">
                                                        <img src="img/bg-img/t1.png" alt="">
                                                    </div>
                                                    <div class="text">
                                                        <h6>{{$listpesertakelas->nama_lengkap}}</h6>
                                                        <span>{{$listpesertakelas->tgl_rating}}</span>
                                                    </div>
                                                </div>
                                                <!-- Ratings -->
                                                <div class="ratings">
                                                    {{$listpesertakelas->jumlah_rating}}
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                            <p style="display: none;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce enim nulla, mollis eu metus in, sagittis.</p>
                                        </div>
                                        @endforeach
                                        @else
                                        <h4>Belum Ada Reviews</h4>
                                        @endif

                                    </div>
                                </div>

                                <!-- Tab Text -->
                                <div class="tab-pane fade" id="tab4" role="tabpanel" aria-labelledby="tab--4">
                                    <div class="clever-members">

                                        <!-- About Members -->
                                        <div class="about-members mb-30">
                                            <h4>Peserta</h4>
                                        </div>

                                        <!-- All Members -->
                                        <div class="all-instructors mb-30">
                                            
                                            <div class="row">
                                                <!-- Single Members -->
                                                @if (@count($pesertakelas) > 0)
                                                    @foreach($pesertakelas as $listpesertakelas)
                                                        <div class="col-lg-6">
                                                            <div class="single-instructor d-flex align-items-center mb-30">
                                                                <div class="instructor-thumb">
                                                                    <img src="../{{$listpesertakelas->file_foto}}" alt="">
                                                                </div>
                                                                <div class="instructor-info">
                                                                    <h5>{{$listpesertakelas->nama_lengkap}}</h5>
                                                                    <span>{{$listpesertakelas->alamat_email}}</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach

                                                @else
                                                <div class="col-lg-12">
                                                    <h4>Belum Ada Peserta</h4>
                                                </div>
                                                @endif

                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-4">
                    <div class="course-sidebar">
                        <!-- Buy Course -->
                        <button id="btngabung" name="btngabung" class="btn clever-btn mb-30 w-100">Gabung Kelas</button>
                        <button id="btnbatal" name="btnbatal" class="btn clever-btn mb-30 w-100 btn-warning" style="display: none;">Batalkan</button>

                        <!-- Widget -->
                        <div class="sidebar-widget">
                            <h4>Fitur</h4>
                            <ul class="features-list">
                                <li>
                                    <h6><i class="fa fa-book" aria-hidden="true"></i> Modul</h6>
                                    <h6>{{$countmodul}}</h6>
                                </li>
                                <li>
                                    <h6><i class="fa fa-file" aria-hidden="true"></i> Kuis</h6>
                                    <h6>{{$countkuis}}</h6>
                                </li>
                            </ul>
                        </div>

                        <!-- Widget -->
                        <div class="sidebar-widget">
                            <h4>Mungkin Kau Suka</h4>

                            <!-- Single Courses -->
                            @if (@count($rekomendasikelas) > 0)
                            @foreach($rekomendasikelas as $listrekomendasikelas)
                            <div class="single--courses d-flex align-items-center">
                                <div class="thumb">
                                    <img src="../{{$listrekomendasikelas->file_gambar}}" alt="">
                                </div>
                                <div class="content">
                                    <h5><a href="../kelas/{{$listrekomendasikelas->kode_kelas}}">{{$listrekomendasikelas->nama_kelas}}</a></h5>
                                    <h6>{{$listrekomendasikelas->nm_level_kelas}}</h6>
                                </div>
                            </div>
                            @endforeach
                            @else
                            <div class="single--courses d-flex align-items-center">
                            </div>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Courses Content End ##### -->

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

    <!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Information</h4>
      </div>
      <div class="modal-body">
        <p id="isipesan"></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
    <!-- ##### Footer Area End ##### -->

    <!-- All Plugins js -->
    <script src="/muridtemp/js/plugins/plugins.js"></script>
    <!-- Active js -->
    <script src="/muridtemp/js/active.js"></script>
    <script src="../js/bootbox.js"></script>
    
    <script type="text/javascript">
        $(document).ready(function(){
            var pesan = "<?php echo Session::get('flash-message'); ?>";
            var batal = "<?php echo Session::get('flash-message1'); ?>";
            var flashmessageselesai = "<?php echo Session::get('flash-messageselesai'); ?>";

            if (pesan == "success") {
                //
                bootbox.alert("Selamat Anda Berhasil Bergabung DiKelas ini");
                //btngabung
                $("#btngabung").css( "display", "none" );
                $("#btnbatal").css( "display", "block" );
            }

            if (batal == "success") {
                //
                bootbox.alert("Selamat Anda Berhasil Keluar Dari DiKelas ini");
                //btngabung
                $("#btngabung").css( "display", "block" );
                $("#btnbatal").css( "display", "none" );
            }

            if (flashmessageselesai == "success") {
                //
                bootbox.alert("Kelas Telah diselesaikan");
                //btngabung
                //$("#btngabung").css( "display", "none" );
                //$("#btnbatal").css( "display", "block" );
            }

            var status11 = $('#status1').val();
            if (status11 == "1") {
                $("#btngabung").css( "display", "none" );
                $("#btnbatal").css( "display", "block" );
                $('#detkuis').css( "display", "block" );
                $('#listmodul1').css( "display", "block" );
                $('#btnselesai').css("display","block");
            }
            else {
                $("#btngabung").css( "display", "block" );
                $("#btnbatal").css( "display", "none" );
                $('#detkuis').css( "display", "none" );
                $('#listmodul1').css( "display", "none" );
                $('#btnselesai').css("display","none");
            }
            //alert(status11);
        });

        $('#btnselesai').click(function () {
            var $IDT_KELAS = $('#IDT_KELAS').val();
            var KODE_KELAS1 = $('#KODE_KELAS').val();
            var base_url = "<?php echo url('/') ?>";
            location.href = base_url + "/selesaikelas?IDT_KELAS="+$IDT_KELAS+"&KODE_KELAS="+KODE_KELAS1;
        });
        //btngabung
        $('#btngabung').click(function () {
            var $IDT_KELAS = $('#IDT_KELAS').val();
            var KODE_KELAS1 = $('#KODE_KELAS').val();
            var base_url = "<?php echo url('/') ?>";
            location.href = base_url + "/gabung?IDT_KELAS="+$IDT_KELAS+"&KODE_KELAS="+KODE_KELAS1;
        });

        $('#btnbatal').click(function () {
            var $IDT_KELAS = $('#IDT_KELAS').val();
            var KODE_KELAS1 = $('#KODE_KELAS').val();
            var base_url = "<?php echo url('/') ?>";
            location.href = base_url + "/batal?IDT_KELAS="+$IDT_KELAS+"&KODE_KELAS="+KODE_KELAS1;
        });

        $('.pilihkuis').on("click",function(){
            var usersid =  $(this).attr("id");
            $('#jawaban_dipilih').val(usersid);
        });

        $('.modul').on("click",function(){
            var usersid =  $(this).attr("id");
            var $IDT_KELAS = $('#IDT_KELAS').val();
            var KODE_KELAS1 = $('#KODE_KELAS').val();
            //alert(usersid);
            var base_url = "<?php echo url('/') ?>";
            var file_materi1 = $('#file_materi').val();
            
            var url1 = base_url + "/progreskelas?IDT_KELAS="+$IDT_KELAS+"&KODE_KELAS="+KODE_KELAS1+"&id_kelas_det="+usersid;

            $.ajax({
              type: "GET",
              url: url1,
              success: function(result) {
                    try {
                        obj = JSON.parse(result);
                        var pesan=obj['pesan'];
                        if (pesan == "0"){
                            var url11=obj['getfilemateri'];
                            var url = "<?php echo url('/') ?>"+"/"+url11;
                            //getfilemateri
                            window.open(url);
                        }
                        //window.open(result);
                    } catch (e) {
                }
              
              }
            });


            
            //window.location.href = url;
        });

        $('.btnkirim').click(function () {
            var usersid =  $(this).attr("id");
            var $IDT_KELAS = $('#IDT_KELAS').val();
            var KODE_KELAS1 = $('#KODE_KELAS').val();
            var usersid1 = $('#jawaban_dipilih').val();

            var base_url = "<?php echo url('/') ?>";
            var url1 = base_url + "/progreskelas?IDT_KELAS="+$IDT_KELAS+"&KODE_KELAS="+KODE_KELAS1+"&id_kelas_det="+usersid+"&jawaban_dipilih="+usersid1;

            $.ajax({
              type: "GET",
              url: url1,
              success: function(result) {
                try {
                        obj = JSON.parse(result); 
                        var status1=obj['status1'];

                        if(status1 == "1"){
                            var pesan='Jawaban Benar';
                            var status='success';
                            Command: toastr[status](pesan);
                            $('#lbl_'+usersid1).css("color","green");
                        }
                        else {
                            var pesan='Jawaban Salah';
                            var status='error';
                            Command: toastr[status](pesan);
                            $('#lbl_'+usersid1).css("color","red");
                        }



                        $('#exampleAccordion').css( "display", "block" );
                    } catch (e) {
                }
              
              }
            });


        });

    </script>

      @endsection