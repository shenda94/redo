<?php
//require_once "vendor/autoload.php";

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Utamamodel;
use View;
use Mail;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Masuk extends Controller
{
    //
    public function index() {
    	//echo "testing";
        if(!Session::get('login')){
            return view('login');
        }
        else {
            if(Session::get('id_user_group') == "1"){
                return redirect('dashboard/admin');
            }
            else if(Session::get('id_user_group') == "2"){
                return redirect('dashboard');
            }
            else if(Session::get('id_user_group') == "3"){
                return redirect('dashboard/pengajar');
            }
            else if(Session::get('id_user_group') == "4"){
                return redirect('dashboard/orangtua');
            }
        }
    }

    public function verifikasikode() {
    	//echo "testing";
    	return view('verifikasi');
    }

    public function mintakode() {
    	//echo "testing";
    	return view('mintakode');
    }

    public function lupapassword() {
    	//echo "testing";
    	return view('lupapassword');
    }

    public function register() {
        //echo "testing";
        $data = "2";
        $arrayName = array('id_group_user' => "2");
        return View::make('register',['id_group_user'=>$data]);
        //return view('register');
    }

    public function genRandomCode($length=20){
        $karakter = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $panjangkarakter = strlen($karakter);
        $randomString ="";
        for ($i=0;$i<$length;$i++){
            $randomString = $karakter[rand(0,$panjangkarakter - 1)];
        }

        return $randomString;
    }

    public function gantipassword1(Request $request) {
        $alamat = $request->email;
        $password_random = str_random(6);

        $totalcek = array('password' => $password_random);
        $status = Utamamodel::mintakodekode1($totalcek,$alamat);

        /*$data = array('email'=>$email, 'kode'=>$password_random);
        Mail::send('emailgantipassword',$data,function($message) use($request){
            $message->to($request->email)
                    ->subject('Ganti Password');
            $message->from('redoteam7@gmail.com','Tim Redo');
        });*/
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = 'tls://smtp.gmail.com:587';
        $mail->SMTPOptions = array('ssl' => array('verify_peer' => false, 'verify_peer_name' => false,'allow_self_signed' => true));
        $mail->SMTPAuth = true;
        $mail->Username = 'redoteam7@gmail.com';
        $mail->Password = 'Redo2018';
        //$mail->SMTPSecure = 'tls';
        //$mail->Port = 465;

        $mail->setFrom("redoteam7@gmail.com","Admin");
        $mail->addAddress($alamat);
        $mail->isHTML(true);
        $mail->Subject = "Ganti Password";
        $mail->Body = '<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
            <html lang="en">
            <head>
              <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
              <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- So that mobile will display zoomed in -->
              <meta http-equiv="X-UA-Compatible" content="IE=edge"> <!-- enable media queries for windows phone 8 -->
              <meta name="format-detection" content="telephone=no"> <!-- disable auto telephone linking in iOS -->
              <title>REDO-ID</title>
              
              <style type="text/css">
            body {
              margin: 0;
              padding: 0;
              -ms-text-size-adjust: 100%;
              -webkit-text-size-adjust: 100%;
            }

            table {
              border-spacing: 0;
            }

            table td {
              border-collapse: collapse;
            }

            .ExternalClass {
              width: 100%;
            }

            .ExternalClass,
            .ExternalClass p,
            .ExternalClass span,
            .ExternalClass font,
            .ExternalClass td,
            .ExternalClass div {
              line-height: 100%;
            }

            .ReadMsgBody {
              width: 100%;
              background-color: #ebebeb;
            }

            table {
              mso-table-lspace: 0pt;
              mso-table-rspace: 0pt;
            }

            img {
              -ms-interpolation-mode: bicubic;
            }

            .yshortcuts a {
              border-bottom: none !important;
            }

            @media screen and (max-width: 599px) {
              .force-row,
              .container {
                width: 100% !important;
                max-width: 100% !important;
              }
            }
            @media screen and (max-width: 400px) {
              .container-padding {
                padding-left: 12px !important;
                padding-right: 12px !important;
              }
            }
            .ios-footer a {
              color: #aaaaaa !important;
              text-decoration: underline;
            }
            </style>
            </head>

            <body style="margin:0; padding:0;" bgcolor="#F0F0F0" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">

            <!-- 100% background wrapper (grey background) -->
            <table border="0" width="100%" height="100%" cellpadding="0" cellspacing="0" bgcolor="#F0F0F0">
              <tr>
                <td align="center" valign="top" bgcolor="#F0F0F0" style="background-color: #F0F0F0;">

                  <br>

                  <!-- 600px container (white background) -->
                  <table border="0" width="600" cellpadding="0" cellspacing="0" class="container" style="width:600px;max-width:600px">
                    <tr>
                      <td class="container-padding header" align="left" style="font-family:Helvetica, Arial, sans-serif;font-size:24px;font-weight:bold;padding-bottom:12px;color:#DF4726;padding-left:24px;padding-right:24px">
                        Rumah Edukasi Online Indonesia
                      </td>
                    </tr>
                    <tr>
                      <td class="container-padding content" align="left" style="padding-left:24px;padding-right:24px;padding-top:12px;padding-bottom:12px;background-color:#ffffff">
                        <br>

            <div class="title" style="font-family:Helvetica, Arial, sans-serif;font-size:18px;font-weight:600;color:#374550">Lupa Password Email!</div>
            <br>

            <div class="body-text" style="font-family:Helvetica, Arial, sans-serif;font-size:14px;line-height:20px;text-align:left;color:#333333">
              Berikut ini Password Terbaru Anda : '.$password_random.'
              <br><br>
              <a href="daftar/aktivasiakun/?id" style="display:none;">Aktivasi Akun</a>
              
              <br><br>
            </div>

                      </td>
                    </tr>
                    <tr>
                      <td class="container-padding footer-text" align="left" style="font-family:Helvetica, Arial, sans-serif;font-size:12px;line-height:16px;color:#aaaaaa;padding-left:24px;padding-right:24px">
                        <br><br>
                        &copy; '.date('Y').' Rumah Edukasi Online Indonesia.
                        <br><br>
                        <strong>REDO</strong><br>
                        <span class="ios-footer">
                          Kembangkan Sebuah Passion Untuk Belajar<br>
                        </span>
                        <a style="color:#aaaaaa">REDO</a><br>

                        <br><br>

                      </td>
                    </tr>
                  </table>
            <!--/600px container -->


                </td>
              </tr>
            </table>
            <!--/100% background wrapper-->

            </body>
            </html>';

        $mail->send();

        if ($status < 0) {
            echo json_encode(array("pesan" => "Informasi <br> Minta Kode Verifikasi Gagal","status" => "error"));
        }else {
            echo json_encode(array("pesan" => "Informasi <br> Minta Kode Verifikasi Berhasil. Silakan Cek Email","status" => "success"));
        }
    }

    public function mintakodekode(Request $request) {
        $alamat = $request->email;
        $kode_verifikasi = str_random(6);

        $totalcek = array('kode_verifikasi' => $kode_verifikasi);
        $status = Utamamodel::mintakodekode1($totalcek,$alamat);

        //$data = array('email'=>$email, 'kode'=>$kode_verifikasi);
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = 'tls://smtp.gmail.com:587';
        $mail->SMTPOptions = array('ssl' => array('verify_peer' => false, 'verify_peer_name' => false,'allow_self_signed' => true));
        $mail->SMTPAuth = true;
        $mail->Username = 'redoteam7@gmail.com';
        $mail->Password = 'Redo2018';
        //$mail->SMTPSecure = 'tls';
        //$mail->Port = 465;

        $mail->setFrom("redoteam7@gmail.com","Admin");
        $mail->addAddress($alamat);
        $mail->isHTML(true);
        $mail->Subject = "Permintaan Kode Verifikasi";
        $mail->Body = '<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
            <html lang="en">
            <head>
              <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
              <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- So that mobile will display zoomed in -->
              <meta http-equiv="X-UA-Compatible" content="IE=edge"> <!-- enable media queries for windows phone 8 -->
              <meta name="format-detection" content="telephone=no"> <!-- disable auto telephone linking in iOS -->
              <title>REDO-ID</title>
              
              <style type="text/css">
            body {
              margin: 0;
              padding: 0;
              -ms-text-size-adjust: 100%;
              -webkit-text-size-adjust: 100%;
            }

            table {
              border-spacing: 0;
            }

            table td {
              border-collapse: collapse;
            }

            .ExternalClass {
              width: 100%;
            }

            .ExternalClass,
            .ExternalClass p,
            .ExternalClass span,
            .ExternalClass font,
            .ExternalClass td,
            .ExternalClass div {
              line-height: 100%;
            }

            .ReadMsgBody {
              width: 100%;
              background-color: #ebebeb;
            }

            table {
              mso-table-lspace: 0pt;
              mso-table-rspace: 0pt;
            }

            img {
              -ms-interpolation-mode: bicubic;
            }

            .yshortcuts a {
              border-bottom: none !important;
            }

            @media screen and (max-width: 599px) {
              .force-row,
              .container {
                width: 100% !important;
                max-width: 100% !important;
              }
            }
            @media screen and (max-width: 400px) {
              .container-padding {
                padding-left: 12px !important;
                padding-right: 12px !important;
              }
            }
            .ios-footer a {
              color: #aaaaaa !important;
              text-decoration: underline;
            }
            </style>
            </head>

            <body style="margin:0; padding:0;" bgcolor="#F0F0F0" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">

            <!-- 100% background wrapper (grey background) -->
            <table border="0" width="100%" height="100%" cellpadding="0" cellspacing="0" bgcolor="#F0F0F0">
              <tr>
                <td align="center" valign="top" bgcolor="#F0F0F0" style="background-color: #F0F0F0;">

                  <br>

                  <!-- 600px container (white background) -->
                  <table border="0" width="600" cellpadding="0" cellspacing="0" class="container" style="width:600px;max-width:600px">
                    <tr>
                      <td class="container-padding header" align="left" style="font-family:Helvetica, Arial, sans-serif;font-size:24px;font-weight:bold;padding-bottom:12px;color:#DF4726;padding-left:24px;padding-right:24px">
                        Rumah Edukasi Online Indonesia
                      </td>
                    </tr>
                    <tr>
                      <td class="container-padding content" align="left" style="padding-left:24px;padding-right:24px;padding-top:12px;padding-bottom:12px;background-color:#ffffff">
                        <br>

            <div class="title" style="font-family:Helvetica, Arial, sans-serif;font-size:18px;font-weight:600;color:#374550">Permintaan Kode Verifikasi!</div>
            <br>

            <div class="body-text" style="font-family:Helvetica, Arial, sans-serif;font-size:14px;line-height:20px;text-align:left;color:#333333">
              Berikut ini Kode Verifikasi Terbaru : '.$kode_verifikasi.'
              <br><br>
              <a href="daftar/aktivasiakun/?id" style="display:none;">Aktivasi Akun</a>
              
              <br><br>
            </div>

                      </td>
                    </tr>
                    <tr>
                      <td class="container-padding footer-text" align="left" style="font-family:Helvetica, Arial, sans-serif;font-size:12px;line-height:16px;color:#aaaaaa;padding-left:24px;padding-right:24px">
                        <br><br>
                        &copy; '.date('Y').' Rumah Edukasi Online Indonesia.
                        <br><br>
                        <strong>REDO</strong><br>
                        <span class="ios-footer">
                          Kembangkan Sebuah Passion Untuk Belajar<br>
                        </span>
                        <a style="color:#aaaaaa">REDO</a><br>

                        <br><br>

                      </td>
                    </tr>
                  </table>
            <!--/600px container -->


                </td>
              </tr>
            </table>
            <!--/100% background wrapper-->

            </body>
            </html>';

        $mail->send();
        /*Mail::send('emailmintakode',$data,function($message) use($request)  {
            $message->to($request->email)
                    ->subject('Permintaan Kode Verifikasi');
            $message->from('redoteam7@gmail.com','Tim Redo');
        });*/

        if ($status < 0) {
            echo json_encode(array("pesan" => "Informasi <br> Minta Kode Verifikasi Gagal","status" => "error"));
        }else {
            echo json_encode(array("pesan" => "Informasi <br> Minta Kode Verifikasi Berhasil. Silakan Cek Email","status" => "success"));
        }
    }

    public function verifikasipost(Request $request){
        $email = $request->email;
        $kode = $request->kode;

        $totalcek = array('status_aktif' => '1');
        $status = Utamamodel::updatestatus($totalcek,$email,$kode);
        if ($status < 0) {
            echo json_encode(array("pesan" => "Informasi <br> Verifikasi Kode Gagal","status" => "error"));
        }else {
            echo json_encode(array("pesan" => "Informasi <br> Verifikasi Kode Berhasil","status" => "success"));
        }

        //return $status;
        //return redirect('login')->with('alert-success','Kamu Berhasil Verifikasi');
    }

    public function daftarpost(Request $request){
        $alamat = $request->alamat;
        $password = $request->password;
        $namalengkap = $request->namalengkap;
        $id_group_user = $request->id_group_user;
        $kode_verifikasi = str_random(6);

        //check email before create new user, first of all create model class for it.
        $alamatemail = Utamamodel::checkemail($alamat);
        if (count($alamatemail) > 0){
            return  redirect()->back()->with('flash-message1','error');
            exit();
        }

        $getid_user = Utamamodel::getIDUser();
        $data1 = array('id_user' => $getid_user,'id_user_group' => $id_group_user ,'alamat_email' => $alamat , 'password' => $password, 'nama_lengkap' => $namalengkap, 'kode_verifikasi' => $kode_verifikasi);
        $model = Utamamodel::daftaruser($data1);
        if($model) {
            //then
            
        }

        $offerte = $alamat;
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = 'tls://smtp.gmail.com:587';
        $mail->SMTPOptions = array('ssl' => array('verify_peer' => false, 'verify_peer_name' => false,'allow_self_signed' => true));
        $mail->SMTPAuth = true;
        $mail->Username = 'redoteam7@gmail.com';
        $mail->Password = 'Redo2018';
        //$mail->SMTPSecure = 'tls';
        //$mail->Port = 465;

        $mail->setFrom("redoteam7@gmail.com","Admin");
        $mail->addAddress($alamat);
        $mail->isHTML(true);
        $mail->Subject = "Verifikasi Email";
        $mail->Body = '<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
            <html lang="en">
            <head>
              <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
              <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- So that mobile will display zoomed in -->
              <meta http-equiv="X-UA-Compatible" content="IE=edge"> <!-- enable media queries for windows phone 8 -->
              <meta name="format-detection" content="telephone=no"> <!-- disable auto telephone linking in iOS -->
              <title>REDO-ID</title>
              
              <style type="text/css">
            body {
              margin: 0;
              padding: 0;
              -ms-text-size-adjust: 100%;
              -webkit-text-size-adjust: 100%;
            }

            table {
              border-spacing: 0;
            }

            table td {
              border-collapse: collapse;
            }

            .ExternalClass {
              width: 100%;
            }

            .ExternalClass,
            .ExternalClass p,
            .ExternalClass span,
            .ExternalClass font,
            .ExternalClass td,
            .ExternalClass div {
              line-height: 100%;
            }

            .ReadMsgBody {
              width: 100%;
              background-color: #ebebeb;
            }

            table {
              mso-table-lspace: 0pt;
              mso-table-rspace: 0pt;
            }

            img {
              -ms-interpolation-mode: bicubic;
            }

            .yshortcuts a {
              border-bottom: none !important;
            }

            @media screen and (max-width: 599px) {
              .force-row,
              .container {
                width: 100% !important;
                max-width: 100% !important;
              }
            }
            @media screen and (max-width: 400px) {
              .container-padding {
                padding-left: 12px !important;
                padding-right: 12px !important;
              }
            }
            .ios-footer a {
              color: #aaaaaa !important;
              text-decoration: underline;
            }
            </style>
            </head>

            <body style="margin:0; padding:0;" bgcolor="#F0F0F0" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">

            <!-- 100% background wrapper (grey background) -->
            <table border="0" width="100%" height="100%" cellpadding="0" cellspacing="0" bgcolor="#F0F0F0">
              <tr>
                <td align="center" valign="top" bgcolor="#F0F0F0" style="background-color: #F0F0F0;">

                  <br>

                  <!-- 600px container (white background) -->
                  <table border="0" width="600" cellpadding="0" cellspacing="0" class="container" style="width:600px;max-width:600px">
                    <tr>
                      <td class="container-padding header" align="left" style="font-family:Helvetica, Arial, sans-serif;font-size:24px;font-weight:bold;padding-bottom:12px;color:#DF4726;padding-left:24px;padding-right:24px">
                        Rumah Edukasi Online Indonesia
                      </td>
                    </tr>
                    <tr>
                      <td class="container-padding content" align="left" style="padding-left:24px;padding-right:24px;padding-top:12px;padding-bottom:12px;background-color:#ffffff">
                        <br>

            <div class="title" style="font-family:Helvetica, Arial, sans-serif;font-size:18px;font-weight:600;color:#374550">Selamat Datang '.$namalengkap.' !</div>
            <br>

            <div class="body-text" style="font-family:Helvetica, Arial, sans-serif;font-size:14px;line-height:20px;text-align:left;color:#333333">
              Terima kasih telah melakukan registrasi di REDO. Silahkan melakukan aktivasi akun anda dengan mengopy Kode Veriifikasi ini : '.$kode_verifikasi.'
              <br><br>
              <a href="daftar/aktivasiakun/?id=" style="display:none;">Aktivasi Akun</a>
              
              <br><br>
            </div>

                      </td>
                    </tr>
                    <tr>
                      <td class="container-padding footer-text" align="left" style="font-family:Helvetica, Arial, sans-serif;font-size:12px;line-height:16px;color:#aaaaaa;padding-left:24px;padding-right:24px">
                        <br><br>
                        &copy; '.date('Y').' Rumah Edukasi Online Indonesia.
                        <br><br>
                        <strong>REDO</strong><br>
                        <span class="ios-footer">
                          Kembangkan Sebuah Passion Untuk Belajar<br>
                        </span>
                        <a style="color:#aaaaaa">REDO</a><br>

                        <br><br>

                      </td>
                    </tr>
                  </table>
            <!--/600px container -->


                </td>
              </tr>
            </table>
            <!--/100% background wrapper-->

            </body>
            </html>';

        $mail->send();
        /*$data = array('nama'=>$namalengkap, 'kode'=>$kode_verifikasi);
        Mail::send('formemail',$data,function($message) use($request) {
            $message->to($request->alamat)
                    ->subject('Verifikasi Email');
            $message->from('redoteam7@gmail.com','Tim Redo');
        });*/

        return redirect('verifikasikode')->with('alert-success','Kamu Berhasil Daftar');
    }

    public function daftarpengajarpost() {
        $data = "3";
        $arrayName = array('id_group_user' => "3");
        return View::make('register',['id_group_user'=>$data]);
    }

}
