<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Usermodel1 extends Model
{
    //
    public static function login($username,$password){
    	$query = DB::table('t_user')->where('alamat_email',$username)->where('password',$password)->where('status_aktif','1');
    	return $query->get();
    }
}
