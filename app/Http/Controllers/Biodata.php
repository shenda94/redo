<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Biodatamodel;
use Illuminate\Support\Facades\Session;
use View;

class Biodata extends Controller
{
    //
    public function index($variabel)
    {
    	$id_user = $variabel;
    	$data2 = "";
    	$data3 = "";

    	$data1 = Biodatamodel::getData($id_user);
    	foreach ($data1 as $key) {
    		# code...
    		$id_user_group = $key->id_user_group;
    	}

    	if($id_user_group == "2"){
           $data2 = Biodatamodel::getcountkelas2($id_user);
           $data3 = Biodatamodel::getlistkelas($id_user);
        }
        else if($id_user_group == "3"){
        	$data2 = Biodatamodel::getcountkelas($id_user);
        	$data3 = Biodatamodel::getlistkelas2($id_user);
        }

       // echo json_encode($id_user_group);
        //exit();

        $kondisi = Session::get('id_user');
        $hasil = "0";
        if ($id_user == $kondisi){
        	$hasil = "1";
        }

        return View::make('muridview.biodata',['dataprofile'=>$data1,'jumlahkelas'=>$data2,'datakelas'=>$data3,'hasil'=>$hasil]);
        
    }

    public function Updatedata(Request $request){
    	if(Session::get('login')){
    		$data["alamat_email"] = $request->email;
	    	$data["alamat"] = $request->location;
	    	$data["nama_lengkap"] = $request->first_name;
	    	$alamat = Session::get('id_user');

	        $status = Biodatamodel::mintakodekode1($data,$alamat);
	        if ($status < 0) {
	            echo json_encode(array("pesan" => "Informasi <br> Update Berhasil","status" => "error"));
	        }else {
	            echo json_encode(array("pesan" => "Informasi <br> Gagal","status" => "success"));
	        }
    	}
    }

}
