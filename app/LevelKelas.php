<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LevelKelas extends Model
{
    protected $table = "m_level_kelas";
	public $timestamps = false;
	protected $primaryKey = 'id_level_kelas';

	protected $fillable = array( 'id_level_kelas', 'nm_level_kelas');

	public function Kelas(){
		return $this->hasMany('App\Kelas', 'foreign_key', 'id_level_kelas');
	}
}
