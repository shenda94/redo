<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Utamamodel;
use App\Kelasmodel;
use View;

class Utamacontroller extends Controller
{
    //
    public function index()
    {
        //
        //return view('home');
        $data = Utamamodel::getData();
        $rekomendasipengajar = Kelasmodel::getpengajarrekomendasi();

        return View::make('home',['mydata'=>$data,'mydata2'=>$rekomendasipengajar ]);
    }

}
