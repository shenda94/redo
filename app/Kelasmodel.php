<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Kelasmodel extends Model
{
    //
    public static function getData($search) {
        //DB::raw(" like '%".$search."%'")
    	
            if ($search != "") {
                $users = DB::table('t_kelas')
                    ->join('m_matpel', 't_kelas.id_matpel', '=', 'm_matpel.id_matpel')
                    ->join('t_user', 't_kelas.id_user_pengajar', '=', 't_user.id_user')
                    ->select('t_kelas.*', 'm_matpel.nma_matpel', 'm_matpel.file_gambar', 't_user.nama_lengkap')
                    ->where('t_kelas.nama_kelas','like','%'.$search.'%')
                    ->orwhere('m_matpel.nma_matpel','like','%'.$search.'%')
                    ->limit(10)
                    ->get();
            }
            else {
                $users = DB::table('t_kelas')
                    ->join('m_matpel', 't_kelas.id_matpel', '=', 'm_matpel.id_matpel')
                    ->join('t_user', 't_kelas.id_user_pengajar', '=', 't_user.id_user')
                    ->select('t_kelas.*', 'm_matpel.nma_matpel', 'm_matpel.file_gambar', 't_user.nama_lengkap')
                    ->limit(10)
                    ->get();
            }
            
    	//if (!is_null(var))
        //$Buylist=DB::select('select oId,bName,bPrice from myshopping')->where('id','=',Auth::user()->id);
    	return $users;
    }

    public static function getData2($start,$end,$search) {
        
            if ($search != "") {
                $users = DB::table('t_kelas')
            ->join('m_matpel', 't_kelas.id_matpel', '=', 'm_matpel.id_matpel')
            ->join('t_user', 't_kelas.id_user_pengajar', '=', 't_user.id_user')
            ->select('t_kelas.*', 'm_matpel.nma_matpel', 'm_matpel.file_gambar', 't_user.nama_lengkap')
                ->where('t_kelas.nama_kelas','like','%'.$search.'%')
                    ->orwhere('m_matpel.nma_matpel','like','%'.$search.'%')
                ->skip($start)->take($end)
            ->get();
            }
            else {
                $users = DB::table('t_kelas')
            ->join('m_matpel', 't_kelas.id_matpel', '=', 'm_matpel.id_matpel')
            ->join('t_user', 't_kelas.id_user_pengajar', '=', 't_user.id_user')
            ->select('t_kelas.*', 'm_matpel.nma_matpel', 'm_matpel.file_gambar', 't_user.nama_lengkap')
                ->skip($start)->take($end)
            ->get();
            }
            
            
        //if (!is_null(var))
        //$Buylist=DB::select('select oId,bName,bPrice from myshopping')->where('id','=',Auth::user()->id);
        return $users;
    }

    public static function gettotalData($search) {
        
            if ($search != "") {
                $users = DB::table('t_kelas')
            ->join('m_matpel', 't_kelas.id_matpel', '=', 'm_matpel.id_matpel')
            ->join('t_user', 't_kelas.id_user_pengajar', '=', 't_user.id_user')
            ->select('t_kelas.*', 'm_matpel.nma_matpel', 'm_matpel.file_gambar', 't_user.nama_lengkap')
                ->where('t_kelas.nama_kelas','like','%'.$search.'%')
                    ->orwhere('m_matpel.nma_matpel','like','%'.$search.'%')
                ->get();
            }
             
            else {
                $users = DB::table('t_kelas')
            ->join('m_matpel', 't_kelas.id_matpel', '=', 'm_matpel.id_matpel')
            ->join('t_user', 't_kelas.id_user_pengajar', '=', 't_user.id_user')
            ->select('t_kelas.*', 'm_matpel.nma_matpel', 'm_matpel.file_gambar', 't_user.nama_lengkap')
                ->get();
            }
        //if (!is_null(var))
        //$Buylist=DB::select('select oId,bName,bPrice from myshopping')->where('id','=',Auth::user()->id);
        return $users;
    }

    public static function getpengajar() {
        $users = DB::table('t_user')
            ->select('t_user.*')
            ->where('id_user_group',3)
            ->where('total_rating', '=', 5)
            ->inRandomOrder()->limit(5)
            ->get();
        //if (!is_null(var))
            //->limit(5)
        //$Buylist=DB::select('select oId,bName,bPrice from myshopping')->where('id','=',Auth::user()->id);
        return $users;
    }

    public static function getpengajarrekomendasi() {
        $users = DB::table('t_kelas')
            ->join('m_matpel', 't_kelas.id_matpel', '=', 'm_matpel.id_matpel')
            ->join('t_user', 't_kelas.id_user_pengajar', '=', 't_user.id_user')
            ->join('m_level_kelas', 't_kelas.id_level_kelas', '=', 'm_level_kelas.id_level_kelas')
            ->select('t_user.id_user','t_user.nama_lengkap','t_user.file_foto','t_user.alamat_email','t_kelas.jumlah_peserta_didik')
            ->where('t_kelas.jumlah_peserta_didik', '>=', 1)
            ->groupBy('t_user.id_user','t_user.nama_lengkap','t_user.file_foto','t_user.alamat_email','t_kelas.jumlah_peserta_didik')
            ->inRandomOrder()->limit(30)
            ->get();
        /*$users = DB::table('t_user')
            ->select('t_user.*')
            ->where('id_user_group',3)
            ->where('total_rating', '>=', 3)
            ->inRandomOrder()->limit(50)
            ->get();*/
        //if (!is_null(var))
            //->limit(5)
        //$Buylist=DB::select('select oId,bName,bPrice from myshopping')->where('id','=',Auth::user()->id);
        return $users;
    }

    public static function getlistmodulkuis($id_kelas) {
        $users = DB::table('t_kelas_det')
            ->select('t_kelas_det.*',DB::raw(" '0' as id_kelas_murid_det, '0' as jawaban_kuis, '0' as jawaban_benar"))
            ->where('id_kelas',$id_kelas)
            ->get();
        return $users;
    }

    public static function getlistkelas($id_kelas) {
        /*$users = DB::table('t_kelas')
            ->select('t_kelas.*, m_level_kelas.*')
            ->join('m_level_kelas', 't_kelas.id_level_kelas', '=', 'm_level_kelas.id_level_kelas')
            ->join('m_matpel', 't_kelas.id_matpel', '=', 'm_matpel.id_matpel')
            ->where('id_kelas',$id_kelas)
            ->get();
        return $users;*/
        $users = DB::table('t_kelas')
            ->join('m_matpel', 't_kelas.id_matpel', '=', 'm_matpel.id_matpel')
            ->join('t_user', 't_kelas.id_user_pengajar', '=', 't_user.id_user')
            ->join('m_level_kelas', 't_kelas.id_level_kelas', '=', 'm_level_kelas.id_level_kelas')
            ->select('t_kelas.*', 'm_matpel.nma_matpel', 'm_matpel.file_gambar', 'm_level_kelas.*', 't_user.nama_lengkap')
            ->where('id_kelas',$id_kelas)
            ->get();
        //if (!is_null(var))
        //$Buylist=DB::select('select oId,bName,bPrice from myshopping')->where('id','=',Auth::user()->id);
        return $users;
    }

    public static function getlistmodulkuismurid($id_user_murid,$id_kelas) {
        $users = DB::table('t_kelas_murid')
            ->select('t_kelas_murid.id_kelas_murid','t_kelas_det.*',DB::raw(" if((t_kelas_murid_det.id_kelas_murid_det is null),'0',t_kelas_murid_det.id_kelas_murid_det) as id_kelas_murid_det"),'t_kelas_murid_det.status_selesai','t_kelas_murid_det.jawaban_kuis','t_kelas_murid_det.status_benar')
            ->join('t_kelas_det', 't_kelas_murid.id_kelas', '=', 't_kelas_det.id_kelas')
            ->leftJoin("t_kelas_murid_det",function($join){
                $join->on("t_kelas_det.id_kelas_det","=","t_kelas_murid_det.id_kelas_det")
                    ->on("t_kelas_murid.id_kelas_murid","=","t_kelas_murid_det.id_kelas_murid");
            })
            ->where('t_kelas_murid.id_user_murid',$id_user_murid)
            ->where('t_kelas_det.id_kelas',$id_kelas)
            ->orderBy('t_kelas_det.id_kelas_det','asc')
            ->get();
        return $users;
    }

    public static function getcountkelaskuis($id_kelas) {
        $users = DB::table('t_kelas_det')
            ->select('t_kelas_det.id_kelas_det')->where('id_kelas',$id_kelas)->where('jenis_kelas','1')->count();
        return $users;
    }

    public static function getcountkelasmodul($id_kelas) {
        $users = DB::table('t_kelas_det')
            ->select('t_kelas_det.id_kelas_det')->where('id_kelas',$id_kelas)->where('jenis_kelas','0')->count();
        return $users;
    }

    public static function getpesertakelas($id_kelas) {
        $users = DB::table('t_kelas_murid')
            ->join('t_user', 't_kelas_murid.id_user_murid', '=', 't_user.id_user')
            ->select('t_kelas_murid.*', 't_user.*')
            ->where('id_kelas',$id_kelas)
            ->get();
        return $users;
    }

    public static function getidkelas($id_kelas) {
        $users = DB::table('t_kelas')
            ->select('t_kelas.id_kelas')->where('kode_kelas',$id_kelas)
            ->get();
        return $users;
    }

    public static function getpengajarrekomendasi2() {
        /*$users = DB::table('t_user')
            ->select('t_user.*')
            ->where('id_user_group',3)
            ->where('total_rating', '>=', 3)
            ->inRandomOrder()->limit(10)
            ->get();*/

        $users = DB::table('t_kelas')
            ->join('t_user', 't_kelas.id_user_pengajar', '=', 't_user.id_user')
            ->join('m_level_kelas', 't_kelas.id_level_kelas', '=', 'm_level_kelas.id_level_kelas')
            ->select('t_user.id_user','t_user.nama_lengkap','t_user.file_foto','t_user.alamat_email')
            ->where('t_kelas.jumlah_peserta_didik', '>=', 1)
            ->groupBy('t_user.id_user','t_user.nama_lengkap','t_user.file_foto','t_user.alamat_email')
            ->inRandomOrder()->limit(10)
            ->get();

        return $users;
    }

    public static function getrekomendasikelas() {
        $users = DB::table('t_kelas')
            ->join('m_matpel', 't_kelas.id_matpel', '=', 'm_matpel.id_matpel')
            ->join('t_user', 't_kelas.id_user_pengajar', '=', 't_user.id_user')
            ->join('m_level_kelas', 't_kelas.id_level_kelas', '=', 'm_level_kelas.id_level_kelas')
            ->select('t_kelas.*', 'm_matpel.nma_matpel', 'm_matpel.file_gambar', 'm_level_kelas.*', 't_user.nama_lengkap')
            ->where('t_kelas.jumlah_peserta_didik', '>=', 1)
            ->inRandomOrder()->limit(15)
            ->get();
        return $users;
    }

    //gabung kelas
    public static function gabungkelas($data) {
        $result = DB::table('t_kelas_murid')->insert($data);
        return $result;
    }

    public static function getIDUser() {
        $jml = DB::table('t_kelas_murid')->count();
        if($jml == 0){
            $id_regional = "1";
            return $id_regional;
        }else{
            $id_regional = DB::table('t_kelas_murid')->max('id_kelas_murid');
            $id_regional = $id_regional+1;
            return $id_regional;
        }
        //return $query->get();
    }

    public static function getpesertastatus($id_kelas,$id_peserta) {
        $users = DB::table('t_kelas_murid')
            ->join('t_user', 't_kelas_murid.id_user_murid', '=', 't_user.id_user')
            ->select('t_kelas_murid.*', 't_user.*')
            ->where('id_kelas',$id_kelas)
            ->where('id_user_murid',$id_peserta)
            ->get();
        return $users;
    }

    public static function hapuspeserta($id_kelas,$id_user_murid) {
        $users = DB::table('t_kelas_murid')->where('id_kelas', '=', $id_kelas)->where('id_user_murid', '=', $id_user_murid)->delete();
        return $users;
    }

    public static function getIDkelastdetmurid() {
        $jml = DB::table('t_kelas_murid_det')->count();
        if($jml == 0){
            $id_regional = "1";
            return $id_regional;
        }else{
            $id_regional = DB::table('t_kelas_murid_det')->max('id_kelas_murid_det');
            $id_regional = $id_regional+1;
            return $id_regional;
        }
        //return $query->get();
    }

    public static function getjawabanbenar($id_kelas_det,$jawaban_benar) {
        //$users = DB::table('t_kelas_det')
        //    ->select('t_kelas_det.*')->where('id_kelas_det',$id_kelas_det)->where('jawaban_benar',"'".$jawaban_benar."'")
        //    ->count();
        $users = DB::table('t_kelas_det')
            ->select('t_kelas_det.jawaban_benar')->where('id_kelas_det',$id_kelas_det)
            ->get();
        return $users;
    }

    public static function updateprogress($data,$id) {
        if ($id != "0"){
            $result = DB::table('t_kelas_murid_det')
            ->where('id_kelas_murid_det', $id)
            ->update($data);
        }
        else {
            $result = DB::table('t_kelas_murid_det')->insert($data);
        }
        
        return $result;
    }

    public static function getfilemateri($id_kelas) {
        $users = DB::table('t_kelas_det')
            ->select('file_materi')->where('id_kelas_det',$id_kelas)
            ->get();
        return $users;
    }

    public static function updatemodul1($id_user_murid,$id_kelas,$data) {
        $result = DB::table('t_kelas_murid')
            ->where('id_kelas', $id_kelas)
            ->where('id_user_murid', $id_user_murid)
            ->update($data);
        return $result;
    }
    
    public static function updatekelas($id,$data) {
        $result = DB::table('t_kelas')
            ->where('id_kelas', $id)
            ->update($data);
    }
    
    public static function countpeserta($id_kelas) {
        $users = DB::table('t_kelas_murid')
            ->select('t_kelas_murid.id_user_murid')->where('id_kelas',$id_kelas)->count();
        return $users;
    }

    public static function getcountsalah($id_kelas) {
        $users = DB::table('t_kelas_murid_det')
            ->select('t_kelas_murid_det.id_kelas_murid_det')->where('id_kelas_murid',$id_kelas)->where('status_benar','0')->count();
        return $users;
    }

}
