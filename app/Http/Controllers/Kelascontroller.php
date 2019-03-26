<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Kelasmodel;
use View;

class Kelascontroller extends Controller
{
    //
    public function indexpost(Request $request) {
        $search = $request->search;
        $data = Kelasmodel::getData($search);
        //print_r($data);
        //$nama_lengkap = Session::get('nama_lengkap');
        // /,'nama_lengkap'=>$nama_lengkap

        //redirect('carikelas')->with('mydata',$data);

        return View::make('muridview.kelas',['mydata'=>$data]);
        //return view('muridview.kelas');
    }



    public function index(Request $request) {
        $search = $request->carikelas; 
        //$page = $request->page;
        $output = "";
        if ($search == "") {
            $data = Kelasmodel::getData("");
        }
        else {
            $data = Kelasmodel::getData($search);
        }

        $jumlah = Kelasmodel::gettotalData($search);
        $jumlah = count($jumlah);
        //echo $search. $jumlah;
        //exit();

            if($jumlah > 0) {
                //$data = Kelasmodel::getData2($start,$limit,$search);
                $pesan = "1";

                $output .= '<div class="row">';

                foreach ($data as $result) {
                    $output .= '<div class="col-12 col-md-6 col-lg-4">
                            <div class="single-popular-course mb-100 wow fadeInUp" data-wow-delay="250ms">
                                <img src="../'.$result->file_gambar.'" alt="">
                                <!-- Course Content -->
                                <div class="course-content">
                                    <h4>'.$result->nama_kelas.'</h4>
                                    <div class="meta d-flex align-items-center">
                                        <a href="#">'.$result->nama_lengkap.'</a>
                                        <span><i class="fa fa-circle" aria-hidden="true"></i></span>
                                        <a href="#">'.$result->nma_matpel.'</a>
                                    </div>
                                    <p>'.$result->kelas_deskripsi.'</p>
                                </div>
                                <!-- Seat Rating Fee -->
                                <div class="seat-rating-fee d-flex justify-content-between">
                                    <div class="seat-rating h-100 d-flex align-items-center">
                                        <div class="seat">
                                            <i class="fa fa-user" aria-hidden="true"></i> '.$result->jumlah_peserta_didik.'
                                        </div>
                                        <div class="rating">
                                            <i class="fa fa-star" aria-hidden="true"></i> '.$result->jumlah_rating.'
                                        </div>
                                    </div>
                                    <div class="course-fee h-100">
                                        <a href="kelas/'.$result->kode_kelas.'" class="free">Gabung</a>
                                    </div>
                                </div>
                            </div>
                        </div>';
                }


                $page = 1;
                $output .= '</div>';
                $output .= '<div class="row" id="remove-row">';
                $output .= '<div class="col-12">';
                $output .= '<div class="load-more text-center wow fadeInUp" data-wow-delay="1000ms">';
                $output .= '<a id="'.$page.'" class="btn clever-btn btn-2 loadmore">Load More</a>';
                $output .= '</div>';
                $output .= '</div>';
                $output .= '</div>';

                return View::make('muridview.kelas',['mydata'=>$data,'status_data'=>'1']);

                //echo $output;
            }else {
                $resx = array();
                $pesan = "0";
                $isipesan = "No More Data Available";

                return View::make('muridview.kelas',['status_data'=>'0']);

                //echo "over";
                //array_push($resx, array(
                //    "statuspesan"=>$pesan,
                //    "isipesan"=>$isipesan)
                //);

                //echo "No More Data Available";
            }

        //json_encode($data);
    	
    	//$nama_lengkap = Session::get('nama_lengkap');
    	// /,'nama_lengkap'=>$nama_lengkap

        //return View::make('muridview.kelas',['mydata'=>$data]);
    	//return view('muridview.kelas');
    }

    public function getloadmore(Request $request) {
        $output = "";
        $page = $request->page;
        $search = $request->search;
        //Initially we show the data from 1st row that means the 0th row 
         $start = 0;

         //Limit is 3 that means we will show 3 items at once
         $limit = 20;
         $total = Kelasmodel::gettotalData($search);
         $total = count($total);

         if ($total < 10) {
            $page_limit =1;
            $limit = 10;
            $start = ($page - 1) * $limit;
        }
        else {
            //We can go atmost to page number total/limit
            $page_limit = $total/$limit;
            $page_limit = round($page_limit, 0); // 4
        }

        if($page<=$page_limit){
            $start = ($page - 1) * $limit;
            $res = array();

            $jumlah = Kelasmodel::gettotalData($search);
            $jumlah = count($jumlah);

            if($jumlah > 0) {
                $data = Kelasmodel::getData2($start,$limit,$search);
                $pesan = "1";

                $output .= '<div class="row">';

                foreach ($data as $result) {
                    $output .= '<div class="col-12 col-md-6 col-lg-4">
                            <div class="single-popular-course mb-100 wow fadeInUp" data-wow-delay="250ms">
                                <img src="../'.$result->file_gambar.'" alt="">
                                <!-- Course Content -->
                                <div class="course-content">
                                    <h4>'.$result->nama_kelas.'</h4>
                                    <div class="meta d-flex align-items-center">
                                        <a href="#">'.$result->nama_lengkap.'</a>
                                        <span><i class="fa fa-circle" aria-hidden="true"></i></span>
                                        <a href="#">'.$result->nma_matpel.'</a>
                                    </div>
                                    <p>'.$result->kelas_deskripsi.'</p>
                                </div>
                                <!-- Seat Rating Fee -->
                                <div class="seat-rating-fee d-flex justify-content-between">
                                    <div class="seat-rating h-100 d-flex align-items-center">
                                        <div class="seat">
                                            <i class="fa fa-user" aria-hidden="true"></i> '.$result->jumlah_peserta_didik.'
                                        </div>
                                        <div class="rating">
                                            <i class="fa fa-star" aria-hidden="true"></i> '.$result->jumlah_rating.'
                                        </div>
                                    </div>
                                    <div class="course-fee h-100">
                                        <a href="kelas/'.$result->kode_kelas.'" class="free">Gabung</a>
                                    </div>
                                </div>
                            </div>
                        </div>';
                }


                $page = $page + 1;
                $output .= '</div>';
                $output .= '<div class="row" id="remove-row">';
                $output .= '<div class="col-12">';
                $output .= '<div class="load-more text-center wow fadeInUp" data-wow-delay="1000ms">';
                $output .= '<a id="'.$page.'" class="btn clever-btn btn-2 loadmore">Load More</a>';
                $output .= '</div>';
                $output .= '</div>';
                $output .= '</div>';

                echo $output;
            }else {
                $resx = array();
                $pesan = "0";
                $isipesan = "No More Data Available";

                //echo "over";
                //array_push($resx, array(
                //    "statuspesan"=>$pesan,
                //    "isipesan"=>$isipesan)
                //);

                echo "No More Data Available";
            }
        }
        else {
            $resx = array();
            $pesan = "0";
            $isipesan = "No More Data Available";

            //echo "over";
            array_push($resx, array(
                "statuspesan"=>$pesan,
                "isipesan"=>$isipesan)
            );

            echo "No More Data Available";
        }
    }

    public function kelas($variabel){
        $id_kelas = 0;
        $status = "0";
        $data = Kelasmodel::getidkelas($variabel);
        foreach ($data as $key) {
            $id_kelas = $key->id_kelas;
        }

        $data2 = Kelasmodel::getlistkelas($id_kelas);
        $data4 = Kelasmodel::getcountkelaskuis($id_kelas);
        $data5 = Kelasmodel::getcountkelasmodul($id_kelas);
        $data6 = Kelasmodel::getpesertakelas($id_kelas);
        $data7 = Kelasmodel::getpengajarrekomendasi2();
        $data8 = Kelasmodel::getrekomendasikelas();

        //get status_gabung
        if(Session::get('login')){
            $id_user = Session::get('id_user');
            $data9 = Kelasmodel::getpesertastatus($id_kelas,$id_user);
            foreach ($data9 as $key1) {
                $status = $key1->status_gabung;
            }

            if (count($data9) > 0){
                $data32 = Kelasmodel::getlistmodulkuismurid($id_user,$id_kelas);
                $data3 = $data32;
            }
            else {
                $data31 = Kelasmodel::getlistmodulkuis($id_kelas);
                $data3 = $data31;
            }
        }
        else {
            $data31 = Kelasmodel::getlistmodulkuis($id_kelas);
            $data3 = $data31;

            $status = "0";
        }
        
        return View::make('muridview.kelasdet',['datakelas'=>$data2,'modulkelas'=>$data3,'countmodul'=>$data5,'countkuis'=>$data4,'pesertakelas'=>$data6,'rekomendasipengajar'=>$data7,'rekomendasikelas'=>$data8,'status'=>$status]);
    }

    public function gabungkelas(Request $request) {
        $id_kelas = $request->IDT_KELAS;
        $KODE_KELAS = $request->KODE_KELAS;
        $jumlah_peserta_didik = 0;

        if(!Session::get('login')){
            //echo json_encode(array("statusgabung" => "0","url" => "masuk"));
            return redirect('masuk');
        }
        else {
            $id_user = Session::get('id_user');
            $getid_user = Kelasmodel::getIDUser();
            $tgl = date("Y-m-d H:i:s");
            $data1 = array('id_kelas_murid' => $getid_user,'id_kelas' => $id_kelas ,'id_user_murid' => $id_user , 'tgl_gabung' => $tgl, 'id_user_input' => $id_user, 'tgl_entry' => $tgl, 'status_gabung' => 1);
            $status = Kelasmodel::gabungkelas($data1);
            
            $jumlah_peserta_didik = Kelasmodel::countpeserta($id_kelas);
            $jumlah_peserta_didik = $jumlah_peserta_didik +1;
            $arrayName = array('jumlah_peserta_didik' => $jumlah_peserta_didik );
            $status1 = Kelasmodel::updatekelas($id_kelas,$arrayName);

            if ($status < 0) {
                return  redirect()->back()->with('flash-message','error');
                //\Session::flash('message', 'Gabung Kelas Gagal');
                //echo json_encode(array("statusgabung" => "1","url" => "-","pesan" => "Informasi <br> Gabung Kelas Gagal","status" => "error"));
            }else {
                return  redirect()->back()->with('flash-message','success');
                //\Session::flash('message', 'Selamat Anda Berhasil Gabung Dikelas ini');
                //echo json_encode(array("statusgabung" => "1","url" => "-","pesan" => "Informasi <br> Selamat Anda Berhasil Gabung Dikelas ini","status" => "success"));
            }

            //return redirect('kelas/'.$KODE_KELAS);
        }

    }

    public function batalkelas(Request $request) {
        $id_kelas = $request->IDT_KELAS;
        $KODE_KELAS = $request->KODE_KELAS;
        $jumlah_peserta_didik = 0;

        if(!Session::get('login')){
            //echo json_encode(array("statusgabung" => "0","url" => "masuk"));
            return redirect('masuk');
        }
        else {
            $id_user = Session::get('id_user');
            $getid_user = Kelasmodel::getIDUser();
            $tgl = date("Y-m-d H:i:s");
            //$data1 = array('id_kelas_murid' => $getid_user,'id_kelas' => $id_kelas ,'id_user_murid' => $id_user , 'tgl_gabung' => $tgl, 'id_user_input' => $id_user, 'tgl_entry' => $tgl, 'status_gabung' => 1);
            $status = Kelasmodel::hapuspeserta($id_kelas,$id_user);
            
            $jumlah_peserta_didik = Kelasmodel::countpeserta($id_kelas);
            $jumlah_peserta_didik = $jumlah_peserta_didik - 1;
            $arrayName = array('jumlah_peserta_didik' => $jumlah_peserta_didik );
            $status1 = Kelasmodel::updatekelas($id_kelas,$arrayName);

            if ($status < 0) {
                return  redirect()->back()->with('flash-message1','error');
                //\Session::flash('message', 'Gabung Kelas Gagal');
                //echo json_encode(array("statusgabung" => "1","url" => "-","pesan" => "Informasi <br> Gabung Kelas Gagal","status" => "error"));
            }else {
                return  redirect()->back()->with('flash-message1','success');
                //\Session::flash('message', 'Selamat Anda Berhasil Gabung Dikelas ini');
                //echo json_encode(array("statusgabung" => "1","url" => "-","pesan" => "Informasi <br> Selamat Anda Berhasil Gabung Dikelas ini","status" => "success"));
            }

            //return redirect('kelas/'.$KODE_KELAS);
        }

    }

    public function selesaikelas(Request $request) {
        $id_kelas = $request->IDT_KELAS;
        $id_user = Session::get('id_user');
        $status = "";
        $tgl = date("Y-m-d H:i:s");

        if(!Session::get('login')){
        }
        else {
            $data2 = array('id_user_update' => $id_user, 'tgl_update' => $tgl, 'status_selesai' => 1);
            $status = Kelasmodel::updatemodul1($id_user,$id_kelas,$data2);
        }

        if ($status < 0) {
            return  redirect()->back()->with('flash-messageselesai','error');
            //\Session::flash('message', 'Gabung Kelas Gagal');
            //echo json_encode(array("statusgabung" => "1","url" => "-","pesan" => "Informasi <br> Gabung Kelas Gagal","status" => "error"));
        }else {
            return  redirect()->back()->with('flash-messageselesai','success');
            //\Session::flash('message', 'Selamat Anda Berhasil Gabung Dikelas ini');
            //echo json_encode(array("statusgabung" => "1","url" => "-","pesan" => "Informasi <br> Selamat Anda Berhasil Gabung Dikelas ini","status" => "success"));
        }

    }

    public function progresskelas(Request $request){
        $id_kelas = $request->IDT_KELAS;
        $KODE_KELAS = $request->KODE_KELAS;
        //id-{{$listmodul->jenis_kelas}}-{{$listmodul->id_kelas_murid_det}}-{{$listmodul->id_kelas_det}}
        $id_kelas_det = $request->id_kelas_det;
        $id_kelas_det1 = explode('-',$id_kelas_det);
        $id_kelas_murid_det = $id_kelas_det1[2];
        $jenis_kelas = $id_kelas_det1[1];
        $id_kelas_det2 = $id_kelas_det1[3];
        $id_kelas_murid = 0;
        $tgl = date("Y-m-d H:i:s");
        $jawaban_dipilih1 = $request->jawaban_dipilih;
        $jawaban_dipilih2 = explode('_',$jawaban_dipilih1);
        $jawaban_dipilih3 = $jawaban_dipilih2[0];
        $status_benar = "";
        $totalmodul = 0;

        if(!Session::get('login')){
        }
        else {
            $id_user = Session::get('id_user');
            $dat1 = Kelasmodel::getpesertastatus($id_kelas,$id_user);
            foreach ($dat1 as $key1) {
                # code...
                 $id_kelas_murid = $key1->id_kelas_murid;
            }

            if ($id_kelas_murid_det == "0") {
                $getid_user = Kelasmodel::getIDkelastdetmurid();
            }
            else {
                $getid_user = $id_kelas_murid_det;
            }
            
            if ($jenis_kelas == "0") {
                if ($id_kelas_murid_det == "0") {
                    $data1 = array('id_kelas_murid_det' => $getid_user, 'tgl_update' => $tgl, 'id_kelas_det' => $id_kelas_det2 ,'id_kelas_murid' => $id_kelas_murid , 'id_user_entry' => $id_user, 'tgl_entry' => $tgl, 'status_selesai' => 1);
                }
                else {
                    $data1 = array('id_user_update' => $id_user, 'tgl_update' => $tgl, 'status_selesai' => 1);
                }

                //update yg telah selesai
                $totalmodul = $totalmodul+1;
                $data2 = array('id_user_update' => $id_user, 'tgl_update' => $tgl, 'jumlah_materi_selesai' => $totalmodul);
                $hasil = Kelasmodel::updatemodul1($id_user,$id_kelas,$data2);
            }
            else if($jenis_kelas == "1") {
                if ($id_kelas_murid_det == "0") {
                    $status_benar = "0";
                    $Jawaban = "0";
                    $benar = Kelasmodel::getjawabanbenar($id_kelas_det2,$jawaban_dipilih3);

                    foreach ($benar as $benar1) {
                        # code...
                        $Jawaban = $benar1->jawaban_benar;
                    }

                    if($Jawaban == $jawaban_dipilih3){
                        $status_benar = "1";
                    }
                    else {
                        $status_benar = "0";
                    }

                    $data1 = array('id_kelas_murid_det' => $getid_user, 'tgl_update' => $tgl, 'id_kelas_det' => $id_kelas_det2 ,'id_kelas_murid' => $id_kelas_murid , 'id_user_entry' => $id_user, 'tgl_entry' => $tgl, 'status_selesai' => 1, 'status_benar' => $status_benar, 'jawaban_kuis' => $jawaban_dipilih3);
                }
                else {
                    $status_benar = "0";
                    $Jawaban = "0";
                    $benar = Kelasmodel::getjawabanbenar($id_kelas_det2,$jawaban_dipilih3);

                    foreach ($benar as $benar1) {
                        # code...
                        $Jawaban = $benar1->jawaban_benar;
                    }

                    if($Jawaban == $jawaban_dipilih3){
                        $status_benar = "1";
                    }
                    else {
                        $status_benar = "0";
                    }

                    $data1 = array('id_user_update' => $id_user, 'tgl_update' => $tgl, 'status_selesai' => 1);
                }
                
            }

            $status = Kelasmodel::updateprogress($data1,$id_kelas_murid_det);

            if ($jenis_kelas == "0") {
                if ($status < 0) {
                    echo json_encode(array("pesan" => $jenis_kelas,"status" => "error"));
                }else {
                    $getfilemateri = Kelasmodel::getfilemateri($id_kelas_det2);
                    $file_materi = "0";

                    foreach ($getfilemateri as $key2) {
                        # code...
                        $file_materi = $key2->file_materi;
                    }

                    echo json_encode(array("pesan" => $jenis_kelas,"status" => "success","getfilemateri" => $file_materi));
                }
            }
            else {
                if ($status < 0) {
                    echo json_encode(array("pesan" => "Informasi <br> Ada Sesuatu yang salah","status" => "error","status1"=>$status_benar));
                }else {
                    echo json_encode(array("pesan" => "Informasi <br> Kirim Jawaban Berhasil","status" => "success","status1"=>$status_benar));
                }
            }
            

        }
    }
    
}
