<?php

namespace App\Http\Controllers;
use App\Kelas;
use App\LevelKelas;
use Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Response;
use DB;
use Illuminate\Http\Request;
use View;

class InputKelasController extends Controller
{

    public function index()
  {
     // $levelkelas = LevelKelas::orderBy('id_level_kelas')->get();
    //  $data = array('kelas' => Kelas::all());
  
     
   //   return view('pengajarview.kelas.inputkelas',$data);
           
      //return view('admin.dashboard.jurusan');
    
        $data = Kelas::getData();
    	//$nama_lengkap = Session::get('nama_lengkap');
    	// /,'nama_lengkap'=>$nama_lengkap

       return View::make('pengajarview.kelas.inputkelas',['kelas'=>$data]);
  }
    
    public function hapus($id)
    {
     
      $id_kelas = Kelas::where('id_kelas', '=', $id)->first();
      //$id_kelas = Kelas::find($id)->kelas()->where('id_kelas', 'foo')->first();
      if ($id_kelas == null)
        app::abort(404);
      /*print_r($kode_kelas->kode_kelas);
      exit;*/
      $id_kelas->delete();
      //return Redirect::route('kelas');
      return Redirect::action('InputKelasController@index');
              /*->with('successMessage','Data dengan kode '.$kode_kelas->kode_kelas.' telah berhasil dihapus');*/
    }
  
    public function tambah()
    {
      //$data = array('matpel' => Matpel::all());
  
     
      return view('pengajarview.kelas.tambahkelas');
    }
  
    /*menyimpan data form*/
    public function tambahkelas(Request $request)
    {
      //$data = array('matpel' => Matpel::all());
  
     
          $input =$request->all();
          $pesan = array(
              'id_kelas.required'    => 'Id kelas dibutuhkan.',            
              'id_kelas.unique'      =>  'Id kelas sudah digunakan.',
              'kode_kelas.required' 	=> 'Kode kelas dibutuhkan',
              'nama_kelas.required'   => 'Nama kelas dibutuhkan.',
              'kelas_deskripsi.required'    => 'Deskripsi kelas dibutuhkan',
              'file_gambar.required'       => 'File Gambar dibutuhkan',     
              'tentang_kelas.required' => 'Tentang Kelas dibutuhkan',
              'id_level_kelas.required' => 'Id Level dibutuhkan',  
              'nm_level_kelas.required' => 'Nama Level dibutuhkan',
              'jumlah_peserta_didik.required' => 'Jumlah Peserta Dibutuhkan'  
          );
  
          $aturan = array(
  
              'id_kelas'  => 'required|unique:inputkelas',
              'kode_kelas' => 'required',
              'nama_kelas' => 'required|max:60',
              'kelas_deskripsi'  => 'required',
              'file_gambar'     => 'required|document|mimes:jpg,png|max:2048',
              'tentang_kelas' => 'required',
              'id_level_kelas' => 'required',
              'nm_level_kelas' => 'required',
              'jumlah_peserta_didik' => 'required',
          );
          
  
          $validator = Validator::make($aturan, $pesan);
  
          if($validator->fails()) {
              # Kembali kehalaman yang sama dengan pesan error
              return Redirect::back()->withErrors($validator)->withInput();
  
            # Bila validasi sukses
          }
  
          $kelas = new Kelas;
          $kelas->id_kelas = $request['id_kelas'];
          $kelas->kode_matpel = $input['kode_kelas'];		
          $kelas->nama_kelas = $input['nama_kelas'];
          $kelas->kelas_deskripsi = $input['kelas_deskripsi'];
          $kelas->file_gambar = $input['file_gambar'];
          $kelas->tentang_kelas = $input['tentang_kelas'];
          $kelas->id_level_kelas = $input['id_level_kelas'];
          $kelas->nm_level_kelas = $input['nm_level_kelas'];
          $kelas->jumlah_peserta_didik = $input['jumlah_peserta_didik'];
          if (! $kelas->save())
            App::abort(500);
  
          return Redirect::action('InputKelasController@index')
                            ->with('successMessage','Data kelas "'.$input['nama_kelas'].'" telah berhasil diubah.'); 
        
      //return view('adminview.matpel.matpel');
    }
  
}
