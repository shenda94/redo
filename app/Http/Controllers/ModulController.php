<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Modul;
use Validator;
use Illuminate\Support\Facades\Redirect;



class ModulController extends Controller
{
    /* Menampilakn daftar matpel*/
    function index()
    {
        $data = array('modul' => Modul::all());
        return view('pengajarview.modul.modul',$data);
    }

    /*menmpilkan form tambah matpe*/
    public function tambah()
  {
    //$data = array('matpel' => Matpel::all());

   
    return view('pengajarview.modul.tambahmodul');
  }

  /*menyimpan data form*/
  public function tambahmodul(Request $request)
  {
    //$data = array('matpel' => Matpel::all());

   
        $input =$request->all();
        $pesan = array(
            'id_kelas_det.required'    => 'Id Modul dibutuhkan.',            
            'id_kelas_det.unique'      =>  'Id Modul sudah digunakan.',
            'nm_kelas_det.required'   => 'Nama Kelas dibutuhkan.',
            'penjelasan_modul.required'    => 'Deskripsi Materi dibutuhkan',
            'file_materi.required'       => 'File Materi dibutuhkan',       
        );

        $aturan = array(

            'id_kelas_det'  => 'required|unique:modul',
            'nm_kelas_det' => 'required|max:60',
            'penjelasan_modul'  => 'required',
            'file_materi'     => 'required|document|mimes:pdf,docs,doc,ppt|max:2048',
        );
        

        $validator = Validator::make($aturan, $pesan);

        if($validator->fails()) {
            # Kembali kehalaman yang sama dengan pesan error
            return Redirect::back()->withErrors($validator)->withInput();

          # Bila validasi sukses
        }

        $modul = new Modul;
        $modul->id_kelas_det = $request['id_kelas_det']; 
        $modul->nm_kelas_det = $input['nm_kelas_det'];
        $modul->penjelasan_modul = $input['penjelasan_modul'];
        $modul->file_materi = $input['file_materi'];
        
        if (! $modul->save())
          App::abort(500);

        return Redirect::action('ModulController@index')
                          ->with('successMessage','Data modul "'.$input['nm_kelas_det'].'" telah berhasil diubah.'); 
      
    //return view('adminview.matpel.matpel');
  }

  /*menghapus data*/
  public function hapus($id)
  {
    $modul = Modul::where('id_kelas_det', '=', $id)->first();
    if ($modul == null)
      app::abort(404);
    $modul->delete();
    return Redirect::action('ModulController@index');

  }
}
