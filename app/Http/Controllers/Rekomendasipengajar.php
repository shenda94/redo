<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Kelasmodel;
use View;

class Rekomendasipengajar extends Controller
{
    //
    public function index() {
    	$pengajartertinggi = Kelasmodel::getpengajar();
    	$rekomendasipengajar = Kelasmodel::getpengajarrekomendasi();

    	return View::make('muridview.pengajar',['ratingpengajar'=>$pengajartertinggi,'rekompengajar'=>$rekomendasipengajar]);
    }

}
