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

Route::get('/', function () {
    return view('home.index');
});
// Route::get('/', 'HomeController@indexApp');

Route::get('/send-mail', 'MailController@send');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/pembayaran/{id_penyewaan}', 'penyewaanController@pembayaran')->name('pembayaran');

    Route::get('/get-data-penyewaan/{user_id}', 'penyewaanController@getByUserId');
    Route::get('/get-data-reservasi', 'penyewaanController@getData');

    Route::get('/penyewaan-tanggal', 'penyewaanController@index');
    Route::get('/penyewaan-tanggal/{data}', 'penyewaanController@sewa');
    Route::post('/penyewaan-tanggal/submit', 'penyewaanController@submit');

    Route::post('/penyewaan/bayar', 'penyewaanController@bayar');
    
    Route::prefix('admin')->group(function () {
        Route::get('/home', 'HomeAdminController@index');
        Route::get('/penyewaan', 'PenyewaanAdminController@index');
        Route::get('/penyewaan/list', 'PenyewaanAdminController@list');
        Route::get('/penyewaan/acc/{penyewaan_id}', 'PenyewaanAdminController@approve');
        Route::get('/penyewaan/tolak/{penyewaan_id}', 'PenyewaanAdminController@tolak');
        Route::get('/penyewaan/verifikasi/{penyewaan_id}', 'PenyewaanAdminController@verifikasi');
        Route::get('/penyewaan/verifikasi-ganti-rugi/{penyewaan_id}', 'PenyewaanAdminController@verifikasiGantiRugi');
        Route::post('/penyewaan/lapor-kerusakan/{penyewaan_id}', 'PenyewaanAdminController@laporKerusakan');

        Route::get('/user-management', 'UserManagementController@index');
        Route::get('/user-management/list', 'UserManagementController@list');
        Route::get('/user-management/delete/{id}', 'UserManagementController@delete');
        Route::post('/user-management/tambah', 'UserManagementController@tambah');
        
        Route::get('/pengajuan', 'PengajuanController@index');
        Route::get('/pengajuan/list', 'PengajuanController@list');
        Route::post('/pengajuan/tambah', 'PengajuanController@tambah');
        Route::get('/pengajuan/acc/{id}', 'PengajuanController@approve');
    });
    
});

Auth::routes();