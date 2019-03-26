<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RolepengajarController extends Controller
{
    public function index()
	{
		return view('pengajarview.pengajar');
	}
}
