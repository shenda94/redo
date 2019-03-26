<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *Must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>Rumah Edukasi Online Indonesia</title>

    <!-- Favicon -->
    <link rel="icon" href="/muridtemp/img/core-img/favicon.ico">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="/muridtemp/style.css">
    <style type="text/css">

        #logo {
            color: #5fcf80;
            font-weight: bold;
        }

        #span1 {
            font-weight: normal;
        }

    </style>

    <script src="/muridtemp/js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="/muridtemp/js/bootstrap/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="/muridtemp/js/bootstrap/bootstrap.min.js"></script>
    <link rel="stylesheet" href="toastr/css/toastr.min.css">
    <script src="../toastr/js/toastr.min.js"></script>
    <style type="text/css">
        a:hover, a:visited, a:link, a:active {
          text-decoration: none;
        }

        .controls {
          margin-bottom: 10px;
        }

        .collapse-group {
          padding: 10px;
          border: 1px solid darkgrey;
          margin-bottom: 10px;
        }

        .panel-title .trigger:before {
          content: '\e082';
          font-family: 'Glyphicons Halflings';
          vertical-align: text-bottom;
        }

        .panel-title .trigger.collapsed:before {
          content: '\e081';
        }
    </style>
</head>

<body>
    <!-- Preloader -->
    <div id="preloader">
        <div class="spinner"></div>
    </div>

    <!-- ##### Header Area Start ##### -->
    <header class="header-area">
        <!-- Top Header Area -->

        <!-- Navbar Area -->
        <div class="clever-main-menu">
            <div class="classy-nav-container breakpoint-off">
                <!-- Menu -->
                <nav class="classy-navbar justify-content-between" id="cleverNav">

                    <!-- Logo -->
                    <a id="logo" class="nav-brand" href="<?php echo url('/') ?>">RE<span id="span1">DO</span>.ID</a>

                    <!-- Navbar Toggler -->
                    <div class="classy-navbar-toggler">
                        <span class="navbarToggler"><span></span><span></span><span></span></span>
                    </div>

                    <!-- Menu -->
                    <div class="classy-menu">

                        <!-- Close Button -->
                        <div class="classycloseIcon">
                            <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                        </div>

                        <!-- Nav Start -->
                        <div class="classynav">
                            <ul>
                                @if (Session::get('login'))
                                <li><a href="../dashboard">Dashboard</a></li>
                                @endif
                                <li><a href="../listkelas">Kelas</a></li>
                                <li><a href="../rekomendasipengajar">Rekomendasi Pengajar</a></li>
                            </ul>

                            <!-- Search Button -->
                            <div class="search-area">
                                <form action="{{url('listkelas')}}" method="get" id="register" name="register">
                                    {{csrf_field()}}
                                    <input type="hidden" id="page" name="page" />
                                    <input type="search" name="carikelas" id="carikelas" placeholder="Cari Kelas">
                                    <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                                </form>
                            </div>

                            <!-- Register / Login -->
                            @if (!Session::get('login'))
                                <div class="register-login-area">
                                    <a href="../daftar" class="btn">Daftar</a>
                                    <a href="../masuk" class="btn active">Masuk</a>
                                </div>
                            @else
                                <div class="login-state d-flex align-items-center">
                                    <div class="user-name mr-30">
                                        <div class="dropdown">
                                            <a class="dropdown-toggle" href="#" role="button" id="userName" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ Session::get('nama_lengkap') }}</a>
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userName">
                                                <a class="dropdown-item" href="#" style="display:none;">Profile</a>
                                                <a class="dropdown-item" href="#" style="display:none;">Account Info</a>
                                                <a class="dropdown-item" href="../keluar">Logout</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="userthumb">
                                        <img src="{{ Session::get('file_foto') }}" alt="no photo">
                                    </div>
                                </div>
                            @endif

                        </div>
                        <!-- Nav End -->
                    </div>
                </nav>
            </div>
        </div>
    </header>

@yield('content')

</body>
</html>