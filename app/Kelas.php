<?php

namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
   // protected $table = "t_kelas";
	//protected $primaryKey = 'id_kelas';
//	public $timestamps = false;
	

//	protected $fillable = array('idx','nama');
//	public function Matpel(){
//		return $this->hasMany('App\Matpel', 'foreign_key', 'id_matpel');
	
	public static function getData() {
	$kelas = DB::table('t_kelas')
			->join('m_level_kelas', 't_kelas.id_level_kelas', '=', 'm_level_kelas.id_level_kelas')
			->select('t_kelas.*', 'm_level_kelas.nm_level_kelas')
			->get();
		//if (!is_null(var))
		//$Buylist=DB::select('select oId,bName,bPrice from myshopping')->where('id','=',Auth::user()->id);
		return $kelas;
    }
}
