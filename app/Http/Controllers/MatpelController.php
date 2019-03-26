<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Matpel;
use Validator;
use Illuminate\Support\Facades\Redirect;



class MatpelController extends Controller
{
    /* Menampilakn daftar matpel*/
    function index()
    {
        $data = array('matpel' => Matpel::all());
        return view('adminview.matpel.matpel',$data);
    }

    /*menmpilkan form tambah matpe*/
    public function tambah()
  {
    //$data = array('matpel' => Matpel::all());

   
    return view('adminview.matpel.tambahmatpel');
  }

  /*menyimpan data form*/
  public function tambahmatpel(Request $request)
  {
    //$data = array('matpel' => Matpel::all());

   
        $input =$request->all();
        $pesan = array(
            'id_matpel.required'    => 'Id Matpel dibutuhkan.',            
            'id_matpel.unique'      =>  'Id Maptel sudah digunakan.',
			'kode_matpel.required' 	=> 'Kode Matpel dibutuhkan',
            'nma_matpel.required'   => 'Nama Matpel dibutuhkan.',
            'deskripsi.required'    => 'Deskripsi Matpel dibutuhkan',
            'file_gambar.required'       => 'File Gambar dibutuhkan',       
        );

        $aturan = array(

            'id_matpel'  => 'required|unique:matpel',
			'kode_matpel' => 'required',
            'nma_matpel' => 'required|max:60',
            'deskripsi'  => 'required',
            'file_gambar'     => 'required|document|mimes:jpg,png|max:2048',
        );
        

        $validator = Validator::make($aturan, $pesan);

        if($validator->fails()) {
            # Kembali kehalaman yang sama dengan pesan error
            return Redirect::back()->withErrors($validator)->withInput();

          # Bila validasi sukses
        }

        $matpel = new Matpel;
        $matpel->id_matpel = $request['id_matpel'];
        $matpel->kode_matpel = $input['kode_matpel'];		
        $matpel->nma_matpel = $input['nma_matpel'];
        $matpel->deskripsi = $input['deskripsi'];
        $matpel->file_gambar = $input['file_gambar'];
        
        if (! $matpel->save())
          App::abort(500);

        return Redirect::action('MatpelController@index')
                          ->with('successMessage','Data matpel "'.$input['nma_matpel'].'" telah berhasil diubah.'); 
      
    //return view('adminview.matpel.matpel');
  }

  /*menghapus data*/
  public function hapus($id)
  {
    $matpel = Matpel::where('id_matpel', '=', $id)->first();
    if ($matpel == null)
      app::abort(404);
    $matpel->delete();
    return Redirect::action('MatpelController@index');

  }
}
