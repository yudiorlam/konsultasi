<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\DaftarTiket;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ConversationController;
use App\Http\Controllers\UserTopicController;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PegawaiSyncController;
use App\Http\Controllers\CetakKonsultasiController;
use App\Http\Controllers\CreateUserController;

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
// hanya untuk tamu yg belum auth
Route::get('/', [PagesController::class, 'landingPage'])->middleware('guest');
Route::get('/login', [LoginController::class, 'login']);
//Route::post('/actionlogin', 'LoginController@actionlogin')->name('actionlogin');
// Route::get('/save_fcm', 'LoginController@save_fcm')->name('save_fcm');
Route::post('/actionlogout', [LoginController::class, 'actionlogout']);
Route::post('/actionlogin', [LoginController::class, 'actionlogin'])->name('actionlogin');



Route::middleware(['super_admin'])->group(
    function () {
        Route::get('/dashboard', [PagesController::class, 'index']);
        Route::get('/getAdminTopik', [UserTopicController::class, 'index']);
        Route::get('/addAdmin', [UserTopicController::class, 'create']);
        Route::post('/addAdmin', [UserTopicController::class, 'store']);
        Route::get('/topic', [TopicController::class, 'index']);
        Route::get('/addTopik', [TopicController::class, 'create']);
        Route::post('/addTopik', [TopicController::class, 'store']);
        Route::get('/edit/{id}', [TopicController::class, 'edit']);


        Route::get('/create', [CreateUserController::class, 'index']);
    

        // Route::get('/getTopik', [TopicController::class, 'index']);
        // Route::get('/addTopik', [TopicController::class, 'create']);
        // Route::post('/addTopik', [TopicController::class, 'store']);

        Route::post('/cek_pegawai', [UserTopicController::class, 'cek_pegawai']);
        Route::get('/status/{id}', [UserTopicController::class, 'editStatus'])->name('editStatus');
        Route::post('/updateStatus', [UserTopicController::class, 'updateStatus'])->name('updateStatus');
        Route::post('/updateStatusTopik', [TopicController::class, 'updateTopic'])->name('updateStatusTopik');


        // 
        Route::get('/grafik-donat', [PagesController::class, 'donat']);
        Route::get('/grafik-batangan', [PagesController::class, 'batangan']);

        Route::get('/grafik-line', [PagesController::class, 'line']);


        // 
        Route::get('/delete_all_pegawai', [PegawaiSyncController::class, 'delete_all_pegawai']);
        Route::get('/pegawai/sync', [PegawaiSyncController::class, 'sync']);
    }
);

Route::middleware(['admin'])->group(function () {
    Route::get('/daftarKonsul', [ConversationController::class, 'daftarKonsul']);
    Route::get('/rangkuman/{id}', [ConversationController::class, 'edit'])->name('edit_rangkuman');
    Route::put('/rangkumanUpdate/{id}', [ConversationController::class, 'updateRangkuman']);
    Route::get('/cetak', [CetakKonsultasiController::class, 'index']);
    Route::post('/cetakKonsul', [CetakKonsultasiController::class, 'cetak']);


    // Route::get('/color/{id}/edit', [TopicController::class, 'edit']);
    // Route::post('/color/{id}', [TopicController::class, 'update']);

    // DS
  
    Route::get('/pegawai/sync/per-instansi', [PegawaiSyncController::class, 'per_instansi']);
});



Route::middleware(['auth'])->group(function () {
    Route::get('/fetch_conv', [ConversationController::class, 'fetch_conv']);

    Route::get('/chat', [MessageController::class, 'chatUser']);

    Route::get('/ajax_get_topic', [DaftarTiket::class, 'ajax_get_topic']);
    Route::post('/send_message', [MessageController::class, 'send_message']);
    Route::post('/ajax_fetch_chats', [MessageController::class, 'ajax_fetch_chats']);
    Route::post('/ajax_create_conv', [ConversationController::class, 'ajax_create_conv']);
    Route::post('/update_status_tiket', [ConversationController::class, 'update']);

    Route::get('/profile', [ProfileController::class, 'index']);
    Route::post('/update-profile', [ProfileController::class, 'update']);


    // ajg
    Route::get('/download-attachment/{id}', [MessageController::class, 'download_attachment']);

    // 
    Route::post('/ajax_get_conv_by_id', [ConversationController::class, 'ajax_get_conv_by_id']);

    // ds
    Route::post('/search_by_nip_or_name', [ConversationController::class, 'search_by_nip_or_name']);
});


Route::get('/konsul', [PagesController::class, 'landingPage']);

Route::get('/notification', [App\Http\Controllers\NotificationController::class, 'index'])->name('home');
Route::post('/save-token', [App\Http\Controllers\NotificationController::class, 'saveToken'])->name('save-token');
Route::post('/send-notification', [App\Http\Controllers\NotificationController::class, 'sendNotification'])->name('send.notification');



// DS
Route::post('/send-message-with-attachment', [MessageController::class, 'send_attachment']);
