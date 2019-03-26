<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Kuis;
use Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;


class KuisController extends Controller
{
       /* Menampilakn daftar kuis*/
       function index()
       {
           $data = array('kuis' => Kuis::all());
           return view('pengajarview.kuis.kuis',$data);
       }
   
       /*menmpilkan form tambah kuis*/

   
     /*menyimpan data form*/
     public function editkuis($id)
     {
 
         $data = Kuis::find($id);
 
         return view('pengajarview.kuis.editkuis',$data);
     }
 
     public function simpanedit($id)
     {
         $input =Input::all();
         $messages = [
             
           'id_kelas_det.required'    => 'Id Kuis dibutuhkan.',            
              'id_kelas_det.unique'      =>  'Id Kuis sudah digunakan.',
              'nm_kelas_det.required'   => 'Nama Kelas dibutuhkan.',
              'jenis_kelas.required'   => 'Jenis dibutuhan',
              'pertanyaan_kuis.required' => 'Pertanyaan Kuis dibutuhan',
              'pembahasan_kuis.required'    => 'Pembahasan Kuis dibutuhkan',
              'jawaban.required'       => 'Jawaban dibutuhkan',
              'A.required' => 'Jawaban A',
              'B.required' => 'Jawaban B',
              'C.required' => 'Jawaban C',
              'D.required' => 'Jawaban D',
        
        ];
         
 
         $validator = Validator::make($input, [
              'id_kelas_det'  => 'required|unique:kuis',
              'nm_kelas_det' => 'required|max:60',
              'jenis_kelas' => 'required',
              'pertanyaan_kuis' =>'required',
              'pembahasan_kuis' => 'required',
              'jawaban' => 'required',
              'A' => 'required',
              'B' => 'required',
              'C' => 'required',
              'D' => 'required',
                           ], $messages);
 
         if($validator->fails()) {
             # Kembali kehalaman yang sama dengan pesan error
             return Redirect::back()->withErrors($validator)->withInput();
           # Bila validasi sukses
         }
 
         $kuis = Kuis::find($id);
        $kuis->id_kelas_det = $request['id_kelas_det'];
          $kuis->nm_kelas_det = $input['nm_kelas_det'];
          $kuis->jenis_kelas = $input['jenis_kelas'];
          $kuis->pertanyaan_kuis = $input['pertanyaan_kuis'];
          $kuis->pembahasan_kuis = $input['pembahasan_kuis'];
          $kuis->jawaban = $input['jawaban'];
          $kuis->A = $input['A'];
          $kuis->B = $input['b'];
          $kuis->C = $input['C'];
          $kuis->D = $input['D'];
         if (! $kuis->save())
           App::abort(500);
 
         return Redirect::action('KuisController@index')
                            ->with('successMessage','Data kuis "'.$input['nm_kelas_det'].'" telah berhasil diubah.'); 

     }
   
     /*menghapus data*/
     public function hapus($id)
     {
       $kuis = Kuis::where('id_kelas_det', '=', $id)->first();
       if ($kuis == null)
         app::abort(404);
       $kuis->delete();
       return Redirect::action('KuisController@index');
   
     }
}
