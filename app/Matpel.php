<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Matpel extends Model
{
    protected $table = "m_matpel";
	public $timestamps = false;
	protected $primaryKey = 'id_matpel';

	protected $fillable = array( 'kode_matpel','nma_matpel','deskripsi','file_gambar');

	public function Kelas(){
		return $this->hasMany('App\Kelas', 'foreign_key', 'id_matpel');
	}
}
