<?php

namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;

class Pengajar extends Model
{
    //protected $table = "t_user";
	//public $timestamps = false;
//	protected $primaryKey = 'id_user';
	
//	public function Kelas(){
	//	return $this->hasMany('App\Kelas', 'foreign_key', 'id_kelas');

	
	public static function getData() {
		$pengajar = DB::table('t_user')
			->join('m_matpel', 't_user.id_matpel', '=', 'm_matpel.id_matpel')
			->join('t_kelas', 't_user.kode_kelas', '=', 't_kelas.id_kelas')
			->select('t_user.*', 'm_matpel.nma_matpel', 't_kelas.nama_kelas', 't_kelas.jumlah_peserta_didik')
			->get();
		//if (!is_null(var))
		//$Buylist=DB::select('select oId,bName,bPrice from myshopping')->where('id','=',Auth::user()->id);
		return $pengajar;
    
	}
}
