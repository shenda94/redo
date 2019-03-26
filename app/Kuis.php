<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kuis extends Model
{
    protected $table = "t_kelas_det";
	protected $primaryKey = 'id_kelas_det';
	public $timestamps = false;
	
	protected $fillable = array( 'id_kelas_det','nm_kelas_det','jenis_kelas','pertanyaan_kuis','pembahasan_kuis','jawaban', 'A', 'B', 'C', 'D');
	
	public function Kelas(){
		return $this->hasMany('App\Kelas', 'foreign_key', 'id_matpel');
	}
}
