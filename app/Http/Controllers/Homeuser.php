<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Usermodel1;
use App\Biodatamodel;
use View;

class Homeuser extends Controller
{
    //
    public function loginPost(Request $request){
    	$email = $request->username;
    	$password = $request->password;
    	$data = Usermodel1::login($email,$password);
        $id_user_group = "";

    	if (count($data) > 0){
            foreach ($data as $key) {
                # code...
                Session::put('email',$key->alamat_email);
                Session::put('nama_lengkap',$key->nama_lengkap);
                Session::put('id_user',$key->id_user);
                Session::put('file_foto',$key->file_foto);
                Session::put('id_user_group',$key->id_user_group);
                Session::put('total_folowing',$key->total_folowing);
                Session::put('total_folower',$key->total_folower);
                Session::put('total_rating',$key->total_rating);
                Session::put('login',TRUE);

                $id_user_group = $key->id_user_group;
            }

            if($id_user_group == "2") {
                return redirect('dashboard');
            }
            else if($id_user_group == "1") {
                return redirect('dashboard/admin');
            }
            else if($id_user_group == "3") {
                return redirect('dashboard/pengajar');
            }
            else if($id_user_group == "4") {
                return redirect('dashboard/orangtua');
            }
    	}
    	else {
            return  redirect()->back()->with('flash-message1','error');
    		//return redirect('masuk');
    	}
    }

    public function index() {
    	if(!Session::get('login')){
    		return redirect('listkelas');
    	}
    	else {
            $data = Biodatamodel::getlistkelas(Session::get('id_user'));
            return View::make('muridview.index',['mydata'=>$data]);
    	}
    }

    public function logout() {
        Session::flush();
        return redirect('listkelas');
    }
    
}
