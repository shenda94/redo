<?php

namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;

class Modul extends Model
{
    protected $table = "t_kelas_det";
	protected $primaryKey = 'id_kelas_det';
	public $timestamps = false;
	
	protected $fillable = array( 'id_kelas_det','nm_kelas_det','penjelasan_modul','file_materi');
	
	public function Kelas(){
		return $this->hasMany('App\Kelas', 'foreign_key', 'id_matpel');
	}
   // public static function getData() {
	//	$modul = DB::table('t_kelas_det')
	//		->join('m_matpel', 't_kelas_det.id_matpel', '=', 'm_matpel.kode_matpel')
	//		->join('t_kelas', 't_kelas_det.id_kelas', '=', 't_kelas.id_kelas')
	//		->select('t_kelas_det.*', 'm_matpel.kode_matpel', 'm_matpel.nma_matpel', 't_kelas.kode_kelas')
	//		->get();
		//if (!is_null(var))
		//$Buylist=DB::select('select oId,bName,bPrice from myshopping')->where('id','=',Auth::user()->id);
	//	return $modul;
    
}
