<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Rumah Edukasi Online Indonesia</title>
  <meta name="description" content="Rumah Edukasi Online Indonesia">
  <meta name="keywords" content="Rumah Edukasi Online Indonesia, belajar online, redo">

  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans|Candal|Alegreya+Sans">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/imagehover.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
  <link rel="stylesheet" href="toastr/css/toastr.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/jquery.easing.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/custom.js"></script>
  

  <style type="text/css">



    .bawah {
      position: fixed;
      left:0;
      bottom: 0;
      width: 100%;
      background-color: black;
      color: white;
      text-align: center;
      padding: 5px;
    }

    .tengah {
      text-align: :center;
      top: 80%;
      left: 50%;
      position: relative;
    }

    body {
  background: #d2d6de;
    font-family: 'Source Sans Pro', 'Helvetica Neue', Arial, sans-serif,  Open Sans;
    font-size: 14px;
    line-height: 1.42857;
    height: 350px;
    padding: 0;
    margin: 0;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    font-weight: 400;
    overflow-x: hidden;
    overflow-y: auto;
    
}

    .form-control {
    background-color: #ffffff;
    background-image: none;
    border: 1px solid #999999;
    border-radius: 0;
    box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset;
    color: #333333;
    display: block;
    font-size: 14px;
    height: 34px;
    line-height: 1.42857;
    padding: 6px 12px;
    transition: border-color 0.15s ease-in-out 0s, box-shadow 0.15s ease-in-out 0s;
    width: 100%;
}

.login-box, .register-box {
    width: 500px;
    margin: 10% 30%;
}.login-page, .register-page {
    background: #d2d6de;
}

.login-logo, .register-logo {
    font-size: 35px;
    text-align: center;
    margin-bottom: 25px;
    font-weight: 300;
}.login-box-msg, .register-box-msg {
    margin: 0;
    text-align: center;
    padding: 0 20px 20px 20px;
}.login-box-body, .register-box-body {
    background: #fff;
    padding: 20px;
    border-top: 0;
    color: #666;
}.has-feedback {
    position: relative;
}
.form-group {
    margin-bottom: 15px;
}.has-feedback .form-control {
    padding-right: 42.5px;
}.login-box-body .form-control-feedback, .register-box-body .form-control-feedback {
    color: #777;
}
.form-control-feedback {
    position: absolute;
    top: 0;
    right: 0;
    z-index: 2;
    display: block;
    width: 34px;
    height: 34px;
    line-height: 34px;
    text-align: center;
    pointer-events: none;
}.checkbox, .radio {
    position: relative;
    display: block;
    margin-top: 10px;
    margin-bottom: 10px;
}.icheck>label {
    padding-left: 0;
}
.checkbox label, .radio label {
    min-height: 20px;
    padding-left: 20px;
    margin-bottom: 0;
    font-weight: 400;
    cursor: pointer;
}

  </style>
  <!-- =======================================================
    Theme Name: Mentor
    Theme URL: https://bootstrapmade.com/mentor-free-education-bootstrap-theme/
    Author: BootstrapMade.com
    Author URL: https://bootstrapmade.com
  ======================================================= -->
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
        <a class="navbar-brand" href="{{ url('masuk') }}">Re<span>do</span>.ID</a>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav navbar-right">
          <li><a href="/masuk">Masuk</a></li>
          <li><a href="/mintakode">Minta Kode Verikasi</a></li>
          <li><a href="/verifikasikode">Verifikasi Kode</a></li>
          <li><a href="/lupapassword">Lupa Password</a></li>
        </ul>
      </div>
    </div>
  </nav>


@yield('content')


  <footer id="footer" class="bawah">
    <div class="container text-center">
      <!-- End newsletter-form -->
      © <?php echo date("Y"); ?> REDO. All rights reserved
    </div>
  </footer>
  <!--/ Footer-->

  
  

</body>

</html>