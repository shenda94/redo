<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;
use App\Siswa as Siswa;
class SiswaController extends Controller
{
    public function index()
  {
    $data = Siswa::getData();
    	//$nama_lengkap = Session::get('nama_lengkap');
    	// /,'nama_lengkap'=>$nama_lengkap

        return View::make('adminview.data.siswa',['siswa'=>$data]);
  }

  public function detail($kode_murid)
  {
    $data = Siswa::getData();
    	//$nama_lengkap = Session::get('nama_lengkap');
    	// /,'nama_lengkap'=>$nama_lengkap

        return View::make('adminview.data.detailsiswa',['siswa'=>$data]);
  }

}
