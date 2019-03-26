<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Biodatamodel extends Model
{
    //
    public static function getData($id_kelas) {
    	$query = DB::table('t_user')
         ->select('*')->where('id_user',$id_kelas);
    	//if (!is_null(var))
    	return $query->get();
    }

    public static function getcountkelas($id_kelas) {
        $users = DB::table('t_kelas')
            ->select('t_kelas.id_user_pengajar')->where('id_user_pengajar',$id_kelas)->count();
        return $users;
    }

    public static function getcountkelas2($id_kelas) {
        $users = DB::table('t_kelas_murid')
            ->select('t_kelas_murid.id_user_murid')->where('id_user_murid',$id_kelas)->count();
        return $users;
    }

    public static function getlistkelas($id_user_murid) {
        $users = DB::table('t_kelas_murid')
            ->select('t_kelas.*','t_user.*','t_kelas_murid.*','m_matpel.*',DB::raw(" if((t_kelas_murid.status_selesai = 1),'Selesai','Belum Selesai') as status_kelass"))
            ->join('t_kelas', 't_kelas_murid.id_kelas', '=', 't_kelas.id_kelas')
            ->join('t_user', 't_kelas.id_user_pengajar', '=', 't_user.id_user')
            ->join('m_matpel', 't_kelas.id_matpel', '=', 'm_matpel.id_matpel')
            ->where('t_kelas_murid.id_user_murid',$id_user_murid)
            ->orderBy('t_kelas.id_kelas','desc')
            ->get();
        return $users;
    }

    public static function getlistkelas2($id_user_murid) {
        $users = DB::table('t_kelas')
            ->select('t_kelas.*','m_matpel.*')
            ->join('m_matpel', 't_kelas.id_matpel', '=', 'm_matpel.id_matpel')
            ->where('t_kelas.id_user_pengajar',$id_user_murid)
            ->orderBy('t_kelas.id_kelas','desc')
            ->get();
        return $users;
    }

    public static function getlistkelasmodul($id_user_murid) {
        $users = DB::table('t_kelas_murid')
            ->select('t_kelas_murid.id_kelas_murid','t_kelas_det.*','t_kelas_murid_det.*',DB::raw(" if((t_kelas_murid_det.id_kelas_murid_det is null),'0',t_kelas_murid_det.id_kelas_murid_det) as id_kelas_murid_det"),'t_kelas_murid_det.status_selesai','t_kelas_murid_det.jawaban_kuis','t_kelas_murid_det.status_benar')
            ->join('t_kelas_det', 't_kelas_murid.id_kelas', '=', 't_kelas_det.id_kelas')
            ->Join("t_kelas_murid_det",function($join){
                $join->on("t_kelas_det.id_kelas_det","=","t_kelas_murid_det.id_kelas_det")
                    ->on("t_kelas_murid.id_kelas_murid","=","t_kelas_murid_det.id_kelas_murid");
            })
            ->where('t_kelas_murid.id_user_murid',$id_user_murid)
            ->orderBy('t_kelas_det.id_kelas_det','asc')
            ->get();
        return $users;
    }

    public static function mintakodekode1($data,$email) {
        $result = DB::table('t_user')->where('id_user',$email)->update($data);
        return $result;
    }

}
