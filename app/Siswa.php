<?php

namespace App;
use DB;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    	//protected $primaryKey = "idx";
//	protected $table = "t_user";
//	protected $primaryKey = 'id_user';
//	public $timestamps = false;
	//protected $fillable = ['id_kelas','id_matpel','nama_kelas'];

	//protected $fillable = array('idx','nama');
//	public function Kelas(){
	//	return $this->belongTo('App\kelas', 'foreign_key', 'id_kelas');
	
	public static function getData() {
		$siswa = DB::table('t_user')
			->join('m_matpel', 't_user.id_matpel', '=', 'm_matpel.id_matpel')
			->join('t_kelas', 't_user.kode_kelas', '=', 't_kelas.id_kelas')
			->join('m_level_murid', 't_user.id_level_murid', '=', 'm_level_murid.id_level_murid')
			->select('t_user.*', 'm_matpel.nma_matpel', 't_kelas.nama_kelas', 'm_level_murid.id_level_murid')
			->get();
		//if (!is_null(var))
		//$Buylist=DB::select('select oId,bName,bPrice from myshopping')->where('id','=',Auth::user()->id);
		return $siswa;
    
    }

}
