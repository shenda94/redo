<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Response;
use App\Pengajar;
use App\Kelas;
use DB;

class PengajarController extends Controller
{
    public function index()
  {
    $dataPengajar = Pengajar::select(DB::raw("nign","nip", "nama", "k_kelas", "nama_kelas", "nma_matpel"))
        ->join('t_kelas', 't_kelas.kode_kelas', '=', 'pengajar.k_kelas')
        ->join('m_matpel','id_matpel','=','m_matpel.kode_matpel')
        ->orderBy(DB::raw("id_kelas"))        
        ->get();
        
    $data = array('pengajar' => $dataPengajar);   
    return view('adminview.data.pengajar',$data);
  }

  public function detail($nign)
  {
    $dataPengajar = Pengajar::select(DB::raw("nign, nip, nama, nama_kelas, nma_matpel"))
        ->join('t_kelas', 't_kelas.id_kelas', '=', 'pengajar.k_kelas')
        ->join('m_matpel','id_matpel','=','m_matpel.kode_matpel')
        ->where('nign','=',$nign)
        ->orderBy(DB::raw("id_kelas"))        
        ->get();
        
    $data = array('pengajar' => $dataPengajar);   
    return view('adminview.data.detailpengajar',$data);
  }
}
