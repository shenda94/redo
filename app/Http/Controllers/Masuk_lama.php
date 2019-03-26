<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Utamamodel;
use View;
use Mail;

class Masuk extends Controller
{
    //
    public function index() {
    	//echo "testing";
        if(!Session::get('login')){
            return view('login');
        }
        else {
            if(Session::get('id_user_group') == "1"){
                return redirect('dashboard/admin');
            }
            else if(Session::get('id_user_group') == "2"){
                return redirect('dashboard');
            }
            else if(Session::get('id_user_group') == "3"){
                return redirect('dashboard/pengajar');
            }
            else if(Session::get('id_user_group') == "4"){
                return redirect('dashboard/orangtua');
            }
        }
    }

    public function verifikasikode() {
    	//echo "testing";
    	return view('verifikasi');
    }

    public function mintakode() {
    	//echo "testing";
    	return view('mintakode');
    }

    public function lupapassword() {
    	//echo "testing";
    	return view('lupapassword');
    }

    public function register() {
        //echo "testing";
        $data = "2";
        $arrayName = array('id_group_user' => "2");
        return View::make('register',['id_group_user'=>$data]);
        //return view('register');
    }

    public function genRandomCode($length=20){
        $karakter = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $panjangkarakter = strlen($karakter);
        $randomString ="";
        for ($i=0;$i<$length;$i++){
            $randomString = $karakter[rand(0,$panjangkarakter - 1)];
        }

        return $randomString;
    }

    public function gantipassword1(Request $request) {
        $email = $request->email;
        $password_random = str_random(6);

        $totalcek = array('password' => $password_random);
        $status = Utamamodel::mintakodekode1($totalcek,$email);

        $data = array('email'=>$email, 'kode'=>$password_random);
        Mail::send('emailgantipassword',$data,function($message) use($request){
            $message->to($request->email)
                    ->subject('Ganti Password');
            $message->from('redoteam7@gmail.com','Tim Redo');
        });

        if ($status < 0) {
            echo json_encode(array("pesan" => "Informasi <br> Minta Kode Verifikasi Gagal","status" => "error"));
        }else {
            echo json_encode(array("pesan" => "Informasi <br> Minta Kode Verifikasi Berhasil. Silakan Cek Email","status" => "success"));
        }
    }

    public function mintakodekode(Request $request) {
        $email = $request->email;
        $kode_verifikasi = str_random(6);

        $totalcek = array('kode_verifikasi' => $kode_verifikasi);
        $status = Utamamodel::mintakodekode1($totalcek,$email);

        $data = array('email'=>$email, 'kode'=>$kode_verifikasi);
        Mail::send('emailmintakode',$data,function($message) use($request)  {
            $message->to($request->email)
                    ->subject('Permintaan Kode Verifikasi');
            $message->from('redoteam7@gmail.com','Tim Redo');
        });

        if ($status < 0) {
            echo json_encode(array("pesan" => "Informasi <br> Minta Kode Verifikasi Gagal","status" => "error"));
        }else {
            echo json_encode(array("pesan" => "Informasi <br> Minta Kode Verifikasi Berhasil. Silakan Cek Email","status" => "success"));
        }
    }

    public function verifikasipost(Request $request){
        $email = $request->email;
        $kode = $request->kode;

        $totalcek = array('status_aktif' => '1');
        $status = Utamamodel::updatestatus($totalcek,$email,$kode);
        if ($status < 0) {
            echo json_encode(array("pesan" => "Informasi <br> Verifikasi Kode Gagal","status" => "error"));
        }else {
            echo json_encode(array("pesan" => "Informasi <br> Verifikasi Kode Berhasil","status" => "success"));
        }

        //return $status;
        //return redirect('login')->with('alert-success','Kamu Berhasil Verifikasi');
    }

    public function daftarpost(Request $request){
        $alamat = $request->alamat;
        $password = $request->password;
        $namalengkap = $request->namalengkap;
        $id_group_user = $request->id_group_user;
        $kode_verifikasi = str_random(6);

        $getid_user = Utamamodel::getIDUser();
        $data1 = array('id_user' => $getid_user,'id_user_group' => $id_group_user ,'alamat_email' => $alamat , 'password' => $password, 'nama_lengkap' => $namalengkap, 'kode_verifikasi' => $kode_verifikasi);
        $model = Utamamodel::daftaruser($data1);
        if($model) {
            //then
            
        }

        $offerte = $alamat;
        $data = array('nama'=>$namalengkap, 'kode'=>$kode_verifikasi);
        Mail::send('formemail',$data,function($message) use($request) {
            $message->to($request->alamat)
                    ->subject('Verifikasi Email');
            $message->from('redoteam7@gmail.com','Tim Redo');
        });

        return redirect('verifikasikode')->with('alert-success','Kamu Berhasil Daftar');
    }

    public function daftarpengajarpost() {
        $data = "3";
        $arrayName = array('id_group_user' => "3");
        return View::make('register',['id_group_user'=>$data]);
    }

}
