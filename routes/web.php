<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('home');
//});
//route::get('/Testdulu','Testdulu@index');

Auth::routes();
//Route::get('/', 'Utamacontroller@index');
//Route::resource('home', 'Utamacontroller');
Route::get('/', 'Utamacontroller@index');
//Route::get('masuk', 'Homeuser@login');
//bagian publik dan murid
Route::get('masuk', 'Masuk@index');
Route::get('verifikasikode', 'Masuk@verifikasikode');
Route::get('mintakode', 'Masuk@mintakode');
Route::get('lupapassword', 'Masuk@lupapassword');
Route::get('daftar', 'Masuk@register');
Route::post('daftaruser', 'Masuk@daftarpost');
Route::get('prosesverifikasi', 'Masuk@verifikasipost');
Route::get('prosepermintaankode', 'Masuk@mintakodekode');
Route::get('prosesgantipassword', 'Masuk@gantipassword1');
Route::get('daftarpengajar', 'Masuk@daftarpengajarpost');
Route::post('verifyuser', 'Homeuser@loginPost');
Route::get('keluar', 'Homeuser@logout');
Route::get('dashboard', 'Homeuser@index');
Route::get('dashboard/admin', 'AdminController@index');
Route::get('dashboard/pengajar', 'RolepengajarController@index');
Route::get('dashboard/orangtua', 'Orangtuacontroller@index');
Route::get('listkelas', 'Kelascontroller@index');
Route::get('rekomendasipengajar', 'Rekomendasipengajar@index');
Route::get('kelas/{variable}', 'Kelascontroller@kelas');
Route::get('gabung', 'Kelascontroller@gabungkelas');
Route::get('batal', 'Kelascontroller@batalkelas');
Route::get('progreskelas', 'Kelascontroller@progresskelas');
Route::get('getloadmore', 'Kelascontroller@getloadmore');
Route::get('carikelas', 'Kelascontroller@indexpost');
Route::get('selesaikelas', 'Kelascontroller@selesaikelas');
Route::get('biodata/{id}', 'Biodata@index');
Route::post('updatebiodata', 'Biodata@Updatedata');




Route::resource('m_matpel', 'MatpelController');
//bagian matpel
/*index dari matpel*/
Route::get('matpel', 'MatpelController@index');
/*form tambah matpel*/
Route::get('matpel/tambah','MatpelController@tambah');
/*untuk menyimpan form matpel*/
Route::post('matpel/tambahmatpel', 'MatpelController@tambahmatpel');
/*untuk menghapus matpel*/
Route::get('matpel/{id}/hapus','MatpelController@hapus');
Route::get('pengajar', 'PengajarController@index');
Route::get('pengajar/{nign}/detail', 'PengajarController@detail');

//Data Pengajar
Route::get('pengajar', 'PengajarController@index');
Route::get('pengajar/{nign}/detail', 'PengajarController@detail');

//Data Siswa
Route::get('siswa', 'SiswaController@index');
Route::get('siswa/{kode_murid}/detail', 'SiswaController@detail');

//kelas
Route::get('inputkelas','InputKelasController@index');
Route::get('inputkelas/{id}/hapus', 'InputKelasController@hapus');
Route::get('inputkelas/tambah','InputKelasController@tambah');
Route::post('inpukelas/tambahkelas', 'InputKelasController@tambahkelas');

//Modul
/*index dari modul*/
Route::get('modul', 'ModulController@index');
/*form tambah modul*/
Route::get('modul/tambah','ModulController@tambah');
/*untuk menyimpan form modul*/
Route::post('modul/tambahmodul', 'ModulController@tambahmodul');
/*untuk menghapus modul*/
Route::get('modul/{id}/hapus','ModulController@hapus');

//Kuis
/*index dari kuis*/
Route::get('kuis', 'KuisController@index');
/*form tambah modul*/
Route::get('kuis/{id}/edit', 'KuisController@editkuis');
Route::get('kuis/{id}/simpanedit', 'KuisController@simpanedit');
Route::get('kuis/{id}/hapus','KuisController@hapus');

//profile
Route::get('profile','ProfileController@index');
Route::get('profile/{id}/hapus', 'ProfileController@hapus');
Route::get('profile/tambah','ProfileController@tambah');
Route::post('profile/tambahprofile', 'ProfileController@tambahprofile');
