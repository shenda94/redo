<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;
use View;
use Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;

class ProfileController extends Controller
{
  public function index()
  {
     // $levelkelas = LevelKelas::orderBy('id_level_kelas')->get();
    //  $data = array('kelas' => Kelas::all());
  
     
   //   return view('pengajarview.kelas.inputkelas',$data);
           
      //return view('admin.dashboard.jurusan');
    
      $data = array('profile' => Profile::all());
    	//$nama_lengkap = Session::get('nama_lengkap');
    	// /,'nama_lengkap'=>$nama_lengkap

       return View::make('pengajarview.profile.profile',['profile'=>$data]);
  }
    
    public function hapus($id)
    {
     
      $id_user = Profile::where('id_user', '=', $id)->first();
      //$id_kelas = Kelas::find($id)->kelas()->where('id_kelas', 'foo')->first();
      if ($id_user == null)
        app::abort(404);
      /*print_r($kode_kelas->kode_kelas);
      exit;*/
      $id_user->delete();
      //return Redirect::route('kelas');
      return Redirect::action('ProfileController@index');
              /*->with('successMessage','Data dengan kode '.$kode_kelas->kode_kelas.' telah berhasil dihapus');*/
    }
  
    public function tambah()
    {
      //$data = array('matpel' => Matpel::all());
  
     
      return view('pengajarview.profile.tambahprofile');
    }
  
    /*menyimpan data form*/
    public function tambahprofile(Request $request)
    {
      //$data = array('matpel' => Matpel::all());
  
     
          $input =$request->all();
          $pesan = array(
              'id_user.required'    => 'Id user dibutuhkan.',            
              'id_user.unique'      =>  'Id user sudah digunakan.',
              'nama_lengkap.required'   => 'Nama dibutuhkan.',
              'tgl_lahir.required'    => 'Tanggal lahir dibutuhkan',
              'file_foto.required'       => 'File foto dibutuhkan',     
              'alamat.required' => 'Alamat dibutuhkan',  
              'nickname.required' => 'Nama panggilan dibutuhkan',  
          );
  
          $aturan = array(
  
              'id_user'  => 'required|unique:profile',
              'nama_lengkap' => 'required',
              'tgl_lahir' => 'required|max:60',
              'file_foto'     => 'required|document|mimes:jpg,png|max:2048',
              'alamat' => 'required',
              'nickname' => 'required',
          );
          
  
          $validator = Validator::make($aturan, $pesan);
  
          if($validator->fails()) {
              # Kembali kehalaman yang sama dengan pesan error
              return Redirect::back()->withErrors($validator)->withInput();
  
            # Bila validasi sukses
          }
  
          $profile = new Profile;
          $profile->id_user = $request['id_user'];
          $profile->nama_lengkap = $input['nama_lengkap'];		
          $profile->tgl_lahir = $input['tgl_lahir'];
          $profile->file_foto = $input['file_foto'];
          $profile->alamat = $input['alamat'];
          $profile->nickname = $input['nickname'];
         
          
          if (! $profile->save())
            App::abort(500);
  
          return Redirect::action('ProfileController@index')
                            ->with('successMessage','Data profile "'.$input['nama_lengkap'].'" telah berhasil diubah.'); 
        
      //return view('adminview.matpel.matpel');
    }
}
