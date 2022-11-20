<?php

use Illuminate\Support\Facades\Route;
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

Route::get('/', "GuestController@index")->name('index');
Route::get('u', "GuestController@index");
Route::post('/',"GuestController@loginToken")->name('loginToken');
Route::get('logout',"GuestController@logout");

// Route::get('cmd/artisan',function(){
//   Artisan::call('make:import PesertaImport');
//   echo "sukses";
// });

// Route::get('test',function(){
//     dd(Hash::make('123@admin'));
// });

Route::group(['middleware' => 'sekolah'],function(){
	Route::get('landing',"GuestController@landing")->name('landing');
	Route::get('u/login',"GuestController@loginUser")->name('user-login');
	Route::post('u/login',"GuestController@doLoginUser");
});


Route::group(['middleware' => 'siswa'],function(){
	Route::get('u/siswa',"SiswaController@index")->name('siswa-index');
	Route::get('u/siswa/biodata',"SiswaController@biodataIndex")->name('siswa-biodata');
	Route::post('u/siswa/biodata',"SiswaController@biodataSave");
	Route::get('u/siswa/biodata/partial',"SiswaController@partialbiodataIndex")->name('siswa-biodata-partial');
	Route::post('u/siswa/biodata/partial',"SiswaController@partialbiodataSave");

    Route::get('u/siswa/biodata/edit','SiswaController@biodataEditIndex')->name('siswa-biodata-edit');
    Route::post('u/siswa/biodata/edit','SiswaController@biodataEditSave');

    Route::get('u/siswa/psc',"SiswaController@psc")->name('siswa-psc');


	Route::get('u/siswa/read-biodata',"SiswaController@readBiodata")->name('siswa-read-biodata');
	Route::get('u/siswa/tes/numerik',"TesController@numerik")->name('siswa-tes-numerik');
	Route::get('u/siswa/tes/numerik/start',"TesController@numerikTes")->name('siswa-tes-numerik-start');
	Route::post('u/siswa/tes/numerik/start',"TesController@numerikSave");

	Route::get('u/siswa/tes/bahasa',"TesController@bahasa")->name('siswa-tes-bahasa');
	Route::get('u/siswa/tes/bahasa/start',"TesController@bahasaTes")->name('siswa-tes-bahasa-start');
	Route::post('u/siswa/tes/bahasa/start',"TesController@bahasaSave");

	Route::get('u/siswa/tes/logika',"TesController@logika")->name('siswa-tes-logika');
	Route::get('u/siswa/tes/logika/start',"TesController@logikaTes")->name('siswa-tes-logika-start');
	Route::post('u/siswa/tes/logika/start',"TesController@logikaSave");

	Route::get('u/siswa/tes/kepribadian',"TesController@kepribadian")->name('siswa-tes-kepribadian');
	Route::get('u/siswa/tes/kepribadian/start',"TesController@kepribadianTes")->name('siswa-tes-kepribadian-start');
	Route::post('u/siswa/tes/kepribadian/start',"TesController@kepribadianSave");

	Route::get('u/siswa/tes/dayaingat',"TesController@dayaingat")->name('siswa-tes-dayaingat');
	Route::get('u/siswa/tes/dayaingat/start',"TesController@dayaingatTes")->name('siswa-tes-dayaingat-start');
	Route::post('u/siswa/tes/dayaingat/start',"TesController@dayaingatSave");

	Route::get('u/siswa/tes/hasil',"TesController@hasil")->name('siswa-tes-hasil');
	
	Route::get('u/siswa/tracker',"SiswaController@tracker")->name('siswa-tracker');
	Route::post('u/siswa/tracker','SiswaController@trackerSave')->name('siswa-tracker');
	
	Route::get('u/siswa/settings',"SiswaController@settingsPage")->name('siswa-settings');
	Route::post('u/siswa/settings',"SiswaController@settings");
});

Route::group(['middleware' => 'bk'],function(){
	Route::get('u/bk',"BKController@index")->name('bk-index');

	Route::get('u/bk/siswa',"BKController@siswa")->name("bk-siswa");
	Route::get('u/bk/psc',"BKController@psc")->name("bk-psc");
	Route::get('u/bk/siswa/create',"BKController@siswaCreate")->name("bk-siswa-create");
	Route::post('u/bk/siswa/create',"BKController@siswaCreateSave");
	Route::get('u/bk/siswa/export',"AdminController@siswaExport")->name('bk-siswa-export');
	Route::get('u/bk/siswa/export2',"AdminController@siswaExport2")->name('bk-siswa-export2');
    Route::get('u/bk/siswa/export3',"AdminController@hasilTesExport")->name('bk-hasilTes-export');

	Route::get('u/bk/siswa/edit/{id}',"BKController@siswaEdit")->name('bk-siswa-edit');
	Route::post('u/bk/siswa/edit/{id}',"BKController@siswaEditSave");

	Route::get('u/bk/siswa/delete/{id}',"BKController@siswaDelete")->name('bk-siswa-delete');

	Route::get("u/bk/siswa/detail/{id}","BKController@siswaDetail")->name('bk-siswa-detail');
	
	Route::post('u/bk/siswa/import',"BKController@siswaImport")->name('bk-siswa-import');
	
	
	Route::get('u/bk/settings',"BKController@settingsPage")->name('bk-settings');
	Route::post('u/bk/settings',"BKController@settings");
	Route::post('u/bk/settings-nanme',"BKController@settingsName")->name('bk-settings-name');
});


Route::get('admin-area/login', "GuestController@adminLogin")->name('admin-login');
Route::post('admin-area/login', "GuestController@adminDoLogin");
Route::group(['middleware' => 'admin'],function(){
	Route::get('admin-area',"AdminController@index")->name('admin-index');


	Route::get('admin-area/siswa',"AdminController@siswaIndex")->name("admin-siswa");
	
	Route::get('admin-area/psc',"AdminController@psc")->name("admin-psc");
	Route::get('admin-area/siswa/create',"AdminController@siswaCreate")->name("admin-siswa-create");
	Route::post('admin-area/siswa/create',"AdminController@siswaCreateSave");

	Route::get('admin-area/siswa/export',"AdminController@siswaExport")->name('admin-siswa-export');
	Route::get('admin-area/siswa/export2',"AdminController@siswaExport2")->name('admin-siswa-export2');
    Route::get('admin-area/siswa/export3',"AdminController@hasilTesExport")->name('admin-hasilTes-export');
    Route::get('admin-area/siswa/export4/{id}',"AdminController@hasilTesExportPerSekolah")->name('hasilTesExportPerSekolah');
    Route::get('admin-area/sekolah/export',"AdminController@SekolahExport")->name('admin-sekolah-export');

	Route::get('admin-area/siswa/edit/{id}',"AdminController@siswaEdit")->name('admin-siswa-edit');
	Route::post('admin-area/siswa/edit/{id}',"AdminController@siswaEditSave");

	Route::get('admin-area/siswa/delete/{id}',"AdminController@siswaDelete")->name('admin-siswa-delete');

	Route::get("admin-area/siswa/detail/{id}","AdminController@siswaDetail")->name('admin-siswa-detail');

	Route::post('admin-area/siswa/import','AdminController@importSiswa')->name('admin-siswa-import');

	Route::get('admin-area/sekolah',"AdminController@sekolahIndex")->name("admin-sekolah");
	Route::get('admin-area/sekolah/create',"AdminController@sekolahCreate")->name("admin-sekolah-create");
	Route::post('admin-area/sekolah/create',"AdminController@sekolahCreateSave");

	Route::get('admin-area/sekolah/edit/{id}',"AdminController@sekolahEdit")->name('admin-sekolah-edit');
	Route::post('admin-area/sekolah/edit/{id}',"AdminController@sekolahEditSave");

	Route::get('admin-area/sekolah/delete/{id}',"AdminController@sekolahDelete")->name('admin-sekolah-delete');

	Route::get("admin-area/sekolah/detail/{id}","AdminController@sekolahDetail")->name('admin-sekolah-detail');
	
	Route::get('admin-area/settings',"AdminController@settingsPage")->name('admin-settings');
	Route::post('admin-area/settings',"AdminController@settings");
	
});