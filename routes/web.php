<?php

/**
 * PHP version 7.1.11
 * |--------------------------------------------------------------------------
 * | Web Routes
 * |--------------------------------------------------------------------------
 * |
 * | Here is where you can register web routes for your application. These
 * | routes are loaded by the RouteServiceProvider within a group which
 * | contains the "web" middleware group. Now create something great!
 * |
 * 
 * @category Description
 * @package  Level1
 * @author   KP GES Telkom <username@example.com>
 * @license  example.com none
 * @link     http://example.com/my/bar Documentation of Foo.
 **/

use App\User;

Route::get('/', function ()
{
	if(Auth::guest())
	{
		return view('auth.login');
	}
    return redirect()->route('index');
});

Auth::routes();

Route::get('/register-index', 'Auth\AuthController@indexRegister')->name('register_index');
Route::get('/logout', 'Auth\AuthController@logout');

Route::group(['middleware'=>['auth']], function()
{

	// Route::get('/home', 'HomeController@index')->name('index');

	Route::get('/dashboard', 'Dashboard\DashboardController@index')->name('index');
	Route::group(['prefix' => 'dashboard'], function()
	{
		// Route::get('bukti_p0/pdf/','Dashboard\DashboardController@viewPdf')->name('view_pdf');
		
		Route::get('print/p0/{id}', 'Word\TemplateController@createWordDocxP0')->name('print_p0');
		Route::get('print/p1/{id}', 'Word\TemplateController@createWordDocxP1')->name('print_p1');
		Route::get('delete/{id_proyek}','Dashboard\DashboardController@deleteProyek')->name('proyek_delete');
		Route::get('status/{id_proyek}','Dashboard\DashboardController@updateStatus')->name('status_update');
		Route::post('bukti_p1/insert/{id_proyek}','Dashboard\DashboardController@insertBuktiP1')->name('bukti_p1_insert');
		Route::post('bukti_p1/update/{id_proyek}','Dashboard\DashboardController@updateBuktiP1')->name('bukti_p1_update');
		Route::post('bukti_p0/insert/{id_proyek}','Dashboard\DashboardController@insertBuktiP0')->name('bukti_p0_insert');
		Route::post('bukti_p0/update/{id_proyek}','Dashboard\DashboardController@updateBuktiP0')->name('bukti_p0_update');

	});
	

	Route::get('/form-pelanggan','Justifikasi\FormPelangganController@indexPelanggan')->name('pelanggan');
	Route::post('/form-pelanggan/insert','Justifikasi\FormPelangganController@insertPelanggan')->name('pelanggan_insert');
	Route::get('/form-pelanggan/{id_pelanggan}/{id_proyek}/{id_aspek}','Justifikasi\FormPelangganController@singlePelanggan')->name('pelanggan_single');
	Route::get('/form-pelanggan/update/{id_pelanggan}/{id_proyek}/{id_aspek}','Justifikasi\FormPelangganController@updatePelanggan')->name('pelanggan_update');
	Route::get('/form-proyek/{id_pelanggan}/{id_proyek}/{id_aspek}','Justifikasi\FormProyekController@indexProyek')->name('proyek_single');
	Route::post('/form-proyek/insert/{id_pelanggan}/{id_proyek}/{id_aspek}','Justifikasi\FormProyekController@insertProyek')->name('proyek_insert');
	Route::get('/form-proyek/file_p0/{id_pelanggan}/{id_proyek}/{id_aspek}','Justifikasi\FormProyekController@updateFileP0')->name('file_p0_update');
	Route::get('/form-proyek/file_p1/{id_pelanggan}/{id_proyek}/{id_aspek}','Justifikasi\FormProyekController@updateFileP1')->name('file_p1_update');
	Route::get('/form-proyek/mitra/{id_pelanggan}/{id_proyek}/{id_aspek}','Justifikasi\FormProyekController@updateMitra')->name('mitra2_update');
	Route::get('/form-aspek/{id_pelanggan}/{id_proyek}/{id_aspek}','Justifikasi\FormAspekController@indexAspek')->name('aspek_single');
	Route::get('/form-aspek/insert/{id_pelanggan}/{id_proyek}/{id_aspek}','Justifikasi\FormAspekController@insertAspek')->name('aspek_insert');

	Route::get('/unit-kerja','KelolaData\UnitKerjaController@indexUnitKerja')->name('unit');
	Route::post('/unit-kerja/insert','KelolaData\UnitKerjaController@insertUnitKerja')->name('unit_insert');
	Route::get('/unit-kerja/update/{id}', 'KelolaData\UnitKerjaController@updateUnitKerja')->name('unit_update');
	Route::get('/unit-kerja/delete/{id}', 'KelolaData\UnitKerjaController@deleteUnitKerja')->name('unit_delete');

	Route::get('/mitra','KelolaData\MitraController@indexMitra')->name('mitra');
	Route::post('/mitra/insert','KelolaData\MitraController@insertMitra')->name('mitra_insert');
	Route::get('/mitra/update/{id}','KelolaData\MitraController@updateMitra')->name('mitra_update');
	Route::get('/mitra/delete/{id}','KelolaData\MitraController@deleteMitra')->name('mitra_delete');

	Route::get('/witel','KelolaData\WitelController@indexWitel')->name('witel');
	Route::get('/witel/insert','KelolaData\WitelController@insertWitel')->name('witel_insert');
	Route::get('/witel/update/{id}','KelolaData\WitelController@updateWitel')->name('witel_update');
	Route::get('/witel/delete/{id}','KelolaData\WitelController@deleteWitel')->name('witel_delete');
	Route::get('/witel/single/{id}','KelolaData\WitelController@indexDetilWitel')->name('witel_single');
	Route::get('/witel/detil/{id}','KelolaData\WitelController@indexDetilWitel')->name('witel_detil');

	Route::get('/user','KelolaData\PejabatController@indexPejabat')->name('pejabat');
	Route::get('/user/insert','KelolaData\PejabatController@insertPejabat')->name('user_insert');
	Route::get('/user/update/{id}','KelolaData\PejabatController@updatePejabat')->name('user_update');
	Route::get('/user/delete/{id}','KelolaData\PejabatController@deletePejabat')->name('user_delete');

	Route::get('/parameter','Rekomendasi\ParameterController@indexParameter')->name('parameter');
	Route::post('/parameter/insert','Rekomendasi\ParameterController@insertParameter')->name('parameter_insert');
	Route::get('/parameter/update/{id}','Rekomendasi\ParameterController@updateParameter')->name('parameter_update');
	Route::get('/parameter/reset/{id}','Rekomendasi\ParameterController@resetParameter')->name('parameter_reset');

	Route::get('/margin','Rekomendasi\MarginController@indexMargin')->name('margin');
	// Route::get('/margin/insert','Rekomendasi\MarginController@insertMargin')->name('margin_insert');
	Route::get('/margin/single/{id}','Rekomendasi\MarginController@singleMargin')->name('margin_single');
	Route::get('/margin/update/{id}','Rekomendasi\MarginController@updateMargin')->name('margin_update');

	Route::get('/hasil','Rekomendasi\HasilController@indexHasil')->name('hasil');

	// Route::post('/849520264:AAEP75YqVbA4cREc9l6dBEY_gdqSJ_otylg/webhook', function () {
	// $update = Telegram::commandsHandler(true);

	//     // Commands handler method returns an Update object.
	//     // So you can further process $update object 
	//     // to however you want.

	// return 'ok';
	// });
});

// Route::get('/', 'Telegram\BotController@getUpdates');