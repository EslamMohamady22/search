<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Models\Message;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Zoom\MeetingController;
use App\Http\Controllers\ZoomController;

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


Route::get('/store_login',[HomeController::class,"store_login"]);
Route::get('/store_logout',[HomeController::class,"store_logout"]);
Route::get('/logout',[HomeController::class,"logout"]);
Route::post('/ajax', [HomeController::class ,'ajax']);
//user
Route::middleware(['user','auth'])->group(function () {
    Route::post('/search',[HomeController::class,"search"]);
    Route::get('chat/{id}', [HomeController::class ,'chat']);
    Route::get('/chat', [HomeController::class ,'chatuser']);
    Route::get('/usernote', [HomeController::class ,'usernote']);
    Route::post('/addusernote',[HomeController::class,'addusernote']);
    Route::get('/shownotes', [HomeController::class ,'shownotes']);
    Route::get('/deleteusernotes/{id}',[HomeController::class,'deleteusernotes']);
    Route::get('/showmeetings',[HomeController::class,'showmeetings']);
    Route::get('/zoomjoiniframe',[HomeController::class,'zoomjoiniframe']);


});

//admin
Route::middleware(['admin','auth'])->group(function () {
    Route::get('/adminhome', [AdminController::class,"addashboard"]);
    Route::get('/users', [AdminController::class,"users"]);
    Route::get('/attendance', [AdminController::class,"attendance"]);
    Route::get('/deleteuser/{id}',[AdminController::class,"deleteuser"]);
    Route::get('/searchresult', [AdminController::class,"searchresult"]);
    Route::get('/searchuser',[AdminController::class,"searchuser"]);
    Route::get('/choose/{id}',[AdminController::class,"choose"]);
    Route::get('/redefine/{id}',[AdminController::class,"redefine"]);
    Route::get('/adduserview',[AdminController::class,"adduserview"]);
    Route::post('/addnewuser',[AdminController::class ,'addnewuser']);
    Route::get('/note',[AdminController::class,"note"]);
    Route::post('/addnote',[AdminController::class,"addnote"]);
    Route::get('/shownote',[AdminController::class,"shownote"]);
    Route::get('/deletenote/{id}',[AdminController::class,"deletenote"]);
    Route::get('chatnow/{id}', [AdminController::class ,'chatnow']);
    Route::get('/deletmsg/{id}', [AdminController::class ,'deletmsg']);
    Route::get('/search', [AdminController::class ,'search2']);
    Route::get('delete_chat/{id}', function ($id) {
        Message::whereIn('user_id', [$id, auth()->user()->id])
        ->whereIn('reciever_id', [$id, auth()->user()->id])->delete();
        return redirect()->back();

    })->name('delete_chat');

    Route::get('/showusernotes',[AdminController::class,'showusernotes']);
    Route::post('/ajax2', [AdminController::class ,'ajax']);
    // Route::get('/detiels/{id}',[AdminController::class,"detiels"]);


});
Route::middleware(['auth'])->group(function () {

    Route::post('sendfile',[AdminController::class ,'sendfile']);
    Route::get('/', [HomeController::class,"index"]);
    Route::get('/redirect',[HomeController::class,"redirect"]);
});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});



// Get list of meetings.
//Route::get('/getmeetings', [MeetingController::class,'list']);

// Create meeting room using topic, agenda, start_time.
Route::post('/meetings',[MeetingController::class,'create']);
Route::get('/createmeetings',[MeetingController::class,'createmeetings']);
Route::get('/list',[MeetingController::class,'list']);
Route::get('/deletemeeting/{id}',[MeetingController::class,'/deletemeeting']);
// Route::get('/showmeetingsinfo',[MeetingController::class,'showmeetingsinfo']);




// Get information of the meeting room by ID.
//Route::get('/meetings/{id}',[MeetingController::class,'get'])->where('id', '[0-9]+');
//Route::patch('/meetings/{id}', [MeetingController::class,'update'])->where('id', '[0-9]+');
//Route::delete('/meetings/{id}', [MeetingController::class,'delete'])->where('id', '[0-9]+');


