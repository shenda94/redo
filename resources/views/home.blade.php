<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Rumah Edukasi Online Indonesia</title>
  <meta name="description" content="Rumah Edukasi Online Indonesia">
  <meta name="keywords" content="REDO, Rumah Edukasi Online Indonesia, Belajar Online">

  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans|Candal|Alegreya+Sans">
  <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/imagehover.min.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
  <!--Navigation bar-->
  <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.html">Re<span>do</span>.ID</a>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav navbar-right">
          <li><a href="#feature">Tentang Kita</a></li>
          <li><a href="#courses">Materi</a></li>
          <li><a href="listkelas">Kelas</a></li>
          <li><a href="#pricing">Pengajar</a></li>
          <li><a href="masuk">Masuk</a></li>
          <li class="btn-trial"><a href="daftar">Daftar</a></li>
        </ul>
      </div>
    </div>
  </nav>
  <!--/ Navigation bar-->
  <!--Modal box-->
  <div class="modal fade" id="login" role="dialog">
    <div class="modal-dialog modal-sm">

      <!-- Modal content no 1-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title text-center form-title">Masuk</h4>
        </div>
        <div class="modal-body padtrbl">

          <div class="login-box-body">
            <p class="login-box-msg" style="display:none;">Sign in to start your session</p>
            <div class="form-group">
              <form name="formlogin" action="{{url('/loginPost')}}" id="loginForm">
                <div class="form-group has-feedback">
                  <!----- username -------------->
                  <input class="form-control" placeholder="Username" id="loginid" type="text" name="username" autocomplete="off" />
                  <span style="display:none;font-weight:bold; position:absolute;color: red;position: absolute;padding:4px;font-size: 11px;background-color:rgba(128, 128, 128, 0.26);z-index: 17;  right: 27px; top: 5px;" id="span_loginid"></span>
                  <!---Alredy exists  ! -->
                  <span class="fa fa-user form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                  <!----- password -------------->
                  <input class="form-control" placeholder="Password" id="loginpsw" type="password" name="password" autocomplete="off" />
                  <span style="display:none;font-weight:bold; position:absolute;color: grey;position: absolute;padding:4px;font-size: 11px;background-color:rgba(128, 128, 128, 0.26);z-index: 17;  right: 27px; top: 5px;" id="span_loginpsw"></span>
                  <!---Alredy exists  ! -->
                  <span class="fa fa-lock form-control-feedback"></span>
                </div>
                <div class="row">
                  <div class="col-xs-12">
                    <button type="submit" class="btn btn-green btn-block btn-flat">Masuk</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
  <!--/ Modal box-->
  <!--Banner-->
  <div class="banner">
    <div class="bg-color">
      <div class="container">
        <div class="row">
          <div class="banner-text text-center">
            <div class="text-border">
              <h2 class="text-dec">Belajar Kapan Saja, dimana saja</h2>
            </div>
            <div class="intro-para text-center quote">
              <p class="big-text">Kembangkan Sebuah Passion Untuk Belajar</p>
              <p class="small-text" style="display:none;">Tingkatkan Kemampuanmu Bersama Kami<br></p>
              <a href="#footer" class="btn get-quote">Mulai dari sini</a>
            </div>
            <a href="#feature" class="mouse-hover">
              <div class="mouse"></div>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--/ Banner-->
  <!--Feature-->
  <section id="feature" class="section-padding">
    <div class="container">
      <div class="row">
        <div class="header-section text-center">
          <h2>Tentang Kita</h2>
          <p>REDO (Rumah Edukasi Online) adalah media online untuk memudahkan anda dalam memberikan keahlian/ilmu anda kepada orang lain dan meningkatkan kemampuan anda. REDO bertujuan untuk berkontribusi mencerdaskan bangsa indonesia dengan membuat media belajar online yang gampang, murah dan dapat diakses dimana saja dan kapan saja serta oleh siapa aja di seluruh dunia.</p>
          <br>
          <h4>Fitur Kami</h4>
          <hr class="bottom-line">
        </div>
        <div class="feature-info">
          <div class="row">
              <div class="fea">
                <div class="col-md-4">
                  <div class="heading pull-right">
                    <h4>Materi Pelajaran Bervariasi</h4>
                    <p>Anda bisa membuat materi dalam jumlah tak terbatas. Materi pelajaran sangat bervariasi berupa text yang dimasukan dan berkas pdf yang diupload.</p>
                  </div>
                  <div class="fea-img pull-left">
                    <i class="fa fa-book"></i>
                  </div>
                </div>
              </div>
              <div class="fea">
                <div class="col-md-4">
                  <div class="heading pull-right">
                    <h4>Kuis</h4>
                    <p>Anda bisa membuat kuis per materi dalam jumlah tak terbatas.</p>
                  </div>
                  <div class="fea-img pull-left">
                    <i class="fa fa-edit"></i>
                  </div>
                </div>
              </div>
              <div class="fea">
                <div class="col-md-4">
                  <div class="heading pull-right">
                    <h4>Peserta Tidak Terbatas</h4>
                    <p>Tidak ada batasan peserta di setiap materi belajar yang anda buat, anda bisa merekomendasikan materi yang menarik dan bermanfaat untuk pengguna.</p>
                  </div>
                  <div class="fea-img pull-left">
                    <i class="fa fa-users"></i>
                  </div>
                </div>
              </div>
          </div>
          <div class="row">
              <div class="fea">
                <div class="col-md-4">
                  <div class="heading pull-right">
                    <h4>Rekomendasi Pengajar</h4>
                    <p>Peserta bisa melihat rekomendasi pengajar berdasarkan banyaknya peserta yang mengikuti kelas sehingga bisa menemukan pengajar yang cocok</p>
                  </div>
                  <div class="fea-img pull-left">
                    <i class="fa fa-user"></i>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="heading pull-right">
                    <h4>Rekomendasi Kelas</h4>
                    <p>Peserta dapat melihat beragam pilihan kelas berdasarkan banyaknya peserta yang mengikuti kelas.</p>
                  </div>
                  <div class="fea-img pull-left">
                    <i class="fa fa-user"></i>
                  </div>
                </div>
              </div>
          </div>

        </div>
      </div>
    </div>
  </section>
  <!--/ feature-->
  <!--Organisations-->
  <section id="courses" class="section-padding">
    <div class="container">
      <div class="row">
        <div class="header-section text-center">
          <h2>Materi</h2>
          <p>Mulailah belajar keterampilan yang kamu idamkan yang bisa kamu ikuti dan pelajari secara online<br></p>
          <hr class="bottom-line">
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        @foreach($mydata as $listmatpel)
          

          <div class="col-md-4 col-sm-6 padleft-right">
            <figure class="imghvr-fold-up">
              <img src="{{$listmatpel->file_gambar}}" class="img-responsive">
              <figcaption>
                <h3>{{$listmatpel->nma_matpel}}</h3>
                <p>{{$listmatpel->deskripsi}}</p>
              </figcaption>
              <a href="#"></a>
            </figure>
          </div>

        @endforeach
        
          
      </div>
    </div>
  </section>
  <!--/ Organisations-->
  <!--Cta-->
  
  <!--/ Cta-->
  <!--work-shop-->

  <!--/ work-shop-->
  <!--Faculity member-->
  <section id="faculity-member" class="section-padding">
    <div class="container">
      <div class="row">
        <div class="header-section text-center">
          <h2>TIM</h2>
    
          <hr class="bottom-line">
        </div>

        <div class="col-lg-3 col-md-3 col-sm-3">
          <div class="pm-staff-profile-container">
            <div class="pm-staff-profile-image-wrapper text-center">
              <div class="pm-staff-profile-image">
                <img src="img/eric.jpeg" alt="" class="img-thumbnail img-circle" />
              </div>
            </div>
            <div class="pm-staff-profile-details text-center">
                <p></p>
              <p class="pm-staff-profile-name">Eric Hendra</p>
              <p class="pm-staff-profile-title">Project Manager + Asisten Programmer + Technical Writer</p>
            </div>
          </div>
        </div>

<div class="col-lg-3 col-md-3 col-sm-3">
          <div class="pm-staff-profile-container">
            <div class="pm-staff-profile-image-wrapper text-center">
              <div class="pm-staff-profile-image">
                <img src="img/RENA.jpeg" alt="" class="img-thumbnail img-circle" />
              </div>
            </div>
            <div class="pm-staff-profile-details text-center">
                <p></p>
                <p></p>
                <p></p>
                <p></p>
              <p class="pm-staff-profile-name">Merna Shenda</p>
              <p class="pm-staff-profile-title">System Analyst + Programmer</p>
          </div>
        </div>
</div>

<div class="col-lg-3 col-md-3 col-sm-3">
          <div class="pm-staff-profile-container">
            <div class="pm-staff-profile-image-wrapper text-center">
              <div class="pm-staff-profile-image">
                <img src="img/FLO.jpeg" alt="" class="img-thumbnail img-circle" />
              </div>
            </div>
            <div class="pm-staff-profile-details text-center">
                <p></p>
                <p></p>
              <p class="pm-staff-profile-name">Kristina Florensa Kappa</p>
              <p class="pm-staff-profile-title">Programmer + Desain Poster</p>

            </div>
          </div>
        </div>


        <div class="col-lg-3 col-md-3 col-sm-3">
          <div class="pm-staff-profile-container">
            <div class="pm-staff-profile-image-wrapper text-center">
              <div class="pm-staff-profile-image">
                <img src="img/MEGA.jpeg" alt="" class="img-thumbnail img-circle" />
              </div>
            </div>
            <div class="pm-staff-profile-details text-center">
                <p></p>
                <p></p>
              <p class="pm-staff-profile-name">Mega Pertiwi</p>
              <p class="pm-staff-profile-title">Entri Data + Quality Assurance</p>

            </div>
          </div>
        </div>
        
        
        
        
      </div>
    </div>
  </section>
  <!--/ Faculity member-->
  <!--Testimonial-->

  <!--/ Testimonial-->
  <!--Courses-->
  <section id="organisations" class="section-padding" style="display:none;">
    <div class="container">
      <div class="row">
        <div class="header-section text-center">
          <h2>Orang Tua</h2>
          <p>Daftar diri anda sebagai Orang Tua untuk melihat perkembangan belajar anak anda.<br></p>
          <hr class="bottom-line">
        </div>
      </div>
    </div>

    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center">
            <a id="btnsignuportu" name="btnsignuportu" class="form contact-form-button light-form-button oswald light" href="daftar">Daftar</a>
        </div>
        
      </div>
    </div>
  </section>
  <!--/ Courses-->
  <!--Pricing-->
  <section id="pricing" class="section-padding">
    <div class="container">
      <div class="row">
        <div class="header-section text-center">
          <h2>Rekomendasi Pengajar</h2>
    
          <hr class="bottom-line">
        </div>

@foreach($mydata2 as $listmatpel1)
        <div class="col-lg-3 col-md-3 col-sm-3">
          <div class="pm-staff-profile-container">
            <div class="pm-staff-profile-image-wrapper text-center">
              <div class="pm-staff-profile-image">
                <img src="{{$listmatpel1->file_foto}}" alt="" class="img-thumbnail img-circle" />
              </div>
            </div>
            <div class="pm-staff-profile-details text-center">
              <p class="pm-staff-profile-name"><a href="biodata/{{$listmatpel1->id_user}}">{{$listmatpel1->nama_lengkap}}</a></p>
              <p class="pm-staff-profile-title">Jumlah Kelas : {{$listmatpel1->jumlah_peserta_didik}}</p>
              <p>Kontak Pengajar : {{$listmatpel1->alamat_email}}</p>
            </div>
          </div>
        </div>

        @endforeach

      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="header-section text-center">
          <h2>Daftar sebagai Pengajar</h2>
          <p>Daftarkan diri sebagai pengajar dan Bagikan Keahlianmu disini<br></p>
          <hr class="bottom-line">
        </div>
      </div>
    </div>

    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center">
            <a id="btnsignuppengajar" name="btnsignuppengajar" class="form contact-form-button light-form-button oswald light" href="daftarpengajar">Daftar</a>
        </div>
        
      </div>
    </div>
  </section>
  <!--/ Pricing-->
  <!--Contact-->

  <!--/ Contact-->
  <!--Footer-->
  <footer id="footer" class="footer">
    <div class="container text-center">
      <!-- End newsletter-form -->
      © <?php echo date("Y"); ?> REDO. All rights reserved
    </div>
  </footer>
  <!--/ Footer-->

  <script src="js/jquery.min.js"></script>
  <script src="js/jquery.easing.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/custom.js"></script>
  <script src="contactform/contactform.js"></script>

  

</body>

</html>
