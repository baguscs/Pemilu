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

Route::get('/', function () {
    return view('auth.login');
});
Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/peta', function () {
    return view('admin.peta');
});


// abort(404);

Route::group(['middleware' => ['auth','revalidate']], function () {
    // fasilitas
Route::get('/tambah_fasilitas', 'AdminController@tambah_fasilitas')->name('tambah_fasilitas');
Route::post('/tambah_fasilitas/add', 'FasilitasController@add')->name('add_fasilitas');
Route::post('/home/hapus_fasilitas/{id}', 'FasilitasController@hapus')->name('hapus_fasilitas');
Route::post('/home/edited/{id}', 'FasilitasController@post')->name('edit_fasilitas');
Route::post('/home/status/fasilitas/{id}', 'FasilitasController@status')->name('status_fasilitas');

// profil
Route::get('/profil', 'AdminController@profil')->name('profil');
Route::post('/profil/ganti/{id}', 'ProfilController@user')->name('ganti_user');

//ganti password
Route::get('/ganti_password', 'AdminController@pass')->name('pass');
Route::post('/ganti_password/post', 'ProfilController@pass')->name('ganti_password');

//voters
Route::get('/voters', 'AdminController@vote')->name('vote');
Route::get('/voters/edit/{id}', 'VoteController@edit')->name('edit_voters');
Route::post('/voters/edit/post/{id}', 'VoteController@edited')->name('ganti_voters');
Route::get('/tambah_voters', 'AdminController@tambah_vote')->name('tambah_vote');
Route::post('/tambah_voters/add', 'VoteController@add')->name('add_vote');
Route::post('/hapus_voters/{id}', 'VoteController@hapus')->name('hapus_voters');
Route::get('/voters/verif/{id}', 'VoteController@verif')->name('verif_voters');
Route::post('voters/verif/post/{id}', 'VoteController@verified')->name('voters_verified');
Route::post('/voters/status/update/{id}', 'VoteController@status')->name('status_vote');

//camat
Route::get('/calon/camat', 'AdminController@camat')->name('camat');
Route::get('/calon/tambah_camat', 'CamatController@tambah')->name('tambah_camat');
Route::post('/calon/tambah_camat/post', 'CamatController@add')->name('add_camat');
Route::post('/hapus_camat/{id}', 'CamatController@hapus')->name('hapus_camat');
Route::get('/calon/camat/edit/{id}', 'CamatController@edit')->name('edit_camat');
Route::post('/calon/camat/edit/post/{id}', 'CamatController@edited')->name('ganti_camat');
Route::post('/calon/verif/camat/post/{id}', 'CamatController@verified')->name('camat_verified');
Route::post('/calon/camat/status/update/{id}', 'CamatController@status')->name('status_camat');
Route::get('/calon/camat/verif/{id}', 'CamatController@verif')->name('verif_camat');
Route::post('/calon/camat/norut/{id}', 'CamatController@norut')->name('norut_camat');

//lurah
Route::get('/calon/lurah', 'AdminController@lurah')->name('lurah');
Route::get('/calon/tambah_lurah', 'LurahController@tambah')->name('tambah_lurah');
Route::post('/calon/tambah_lurah/post', 'LurahController@add')->name('add_lurah');
Route::post('/hapus_lurah/{id}', 'LurahController@hapus')->name('hapus_lurah');
Route::get('/calon/lurah/edit/{id}', 'LurahController@edit')->name('edit_lurah');
Route::post('/calon/lurah/edit/post/{id}', 'LurahController@edited')->name('ganti_lurah');
Route::post('calon/verif/lurah/post/{id}', 'LurahController@verified')->name('lurah_verified');
Route::post('calon/lurah/status/update/{id}', 'LurahController@status')->name('status_lurah');
Route::get('/calon/lurah/verif/{id}', 'LurahController@verif')->name('verif_lurah');
Route::post('/calon/lurah/norut/{id}', 'LurahController@norut')->name('norut_lurah');

//petugas
Route::get('/pegawai', 'AdminController@petugas')->name('pegawai');
Route::get('/pegawai/tambah_pegawai', 'PetugasController@tambah')->name('tambah_pegawai');
Route::post('pegawai/tambah_pegawai/post', 'PetugasController@add')->name('add_pegawai');
Route::get('/pegawai/tambah_admin', 'PetugasController@admin')->name('tambah_admin');
Route::get('/pegawai/edit_pegawai/{id}', 'PetugasController@edit')->name('edit_pegawai');
Route::post('/pegawai/edit_pegawai/post/{id}', 'PetugasController@edited')->name('ganti_pegawai');
Route::post('/pegawai/hapus_pegawai/{id}', 'PetugasController@hapus')->name('hapus_pegawai');

//tps
Route::get('/tps', 'AdminController@tps')->name('tps');
Route::get('/tps/tambah_tempat', 'TPSController@tambah')->name('tambah_tps');
Route::post('/tps/tambah_tempat/post', 'TPSController@add')->name('add_tps');
Route::get('/tps/edit_tempat/{id}', 'TPSController@edit')->name('edit_tps');
Route::post('/tps/edit_tempat/post/{id}', 'TPSController@edited')->name('ganti_tps');
Route::post('/tps/hapus_tps/{id}', 'TPSController@hapus')->name('hapus_tps');
Route::post('/tps/update_status/{id}', 'TPSController@status')->name('status_tps');
Route::get('/tps/verif_tps/{id}', 'TPSController@verif')->name('verif_tps');
Route::post('/tps/verif_tps/verifed/{id}', 'TPSController@verifed')->name('verifed_tps');

//vote
Route::post('/vote/kirim/{id}', 'VoteController@voting')->name('voting');
Route::get('/vote/finish', 'VoteController@oke')->name('oke');

//hasil
Route::get('/cek_statistik', 'VoteController@cek')->name('cek_vote');
Route::get('/cek_statistik/hasil_camat', 'HasilController@camat')->name('hasil_camat');
Route::get('/cek_statistik/menu_lurah', 'HasilController@lurah')->name('menu_lurah');
Route::get('/cek_statistik/menu_lurah/{id}', 'HasilController@detail')->name('detail_lurah');

//jadwal
Route::get('/jawal', 'JadwalController@index')->name('jadwal');
Route::post('/jadwal/tambah/post', 'JadwalController@add')->name('add_jadwal');
Route::get('/jadwal/edit/{id}', 'JadwalController@edit')->name('edit_jadwal');
Route::post('/jadwal/edit/post/{id}', 'JadwalController@edited')->name('ganti_jadwal');
Route::post('/jadwal/hapus/{id}', 'JadwalController@hapus')->name('hapus_jadwal');


Route::get('/home', 'HomeController@index')->name('home');
});
Auth::routes();


