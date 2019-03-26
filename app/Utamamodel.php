<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Utamamodel extends Model
{
    //
    public static function getData() {
    	$query = DB::table('m_matpel');
    	//if (!is_null(var))
    	return $query->get();
    }

    public static function login($username,$password){
    	$query = DB::table('t_user')->where('alamat_email',$username)->where('password',$password)->where('status_aktif','1')->first();
    	return $query->get();
    }
    
    public static function checkemail($email){
        $query = DB::table('t_user')->where('alamat_email',$email)->where('status_aktif','1');
        return $query->get();
    }

    public static function getIDUser() {
        $jml = DB::table('t_user')->count();
        if($jml == 0){
            $id_regional = "1";
            return $id_regional;
        }else{
            $id_regional = DB::table('t_user')->max('id_user');
            $id_regional = $id_regional+1;
            return $id_regional;
        }
        //return $query->get();
    }

    public static function daftaruser($data) {
        $result = DB::table('t_user')->insert($data);
        return $result;
    }

    public static function updatestatus($data,$email,$kode) {
        $result = DB::table('t_user')->where('alamat_email',$email)->where('kode_verifikasi',$kode)->update($data);
        return $result;
    }

    public static function mintakodekode1($data,$email) {
        $result = DB::table('t_user')->where('alamat_email',$email)->update($data);
        return $result;
    }

}
