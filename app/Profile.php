<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $table = "t_user";
	public $timestamps = false;
	protected $primaryKey = 'id_user';

	protected $fillable = array( 'id_user','nama_lengkap','tgl_lahir','file_foto','alamat','nickname');

}
