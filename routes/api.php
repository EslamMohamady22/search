<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Zoom\MeetingController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
// Route::get('/', function () {
//     return [
//         'result' => true,
//     ];
// });

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Get list of meetings.
Route::get('/listmeetings', [MeetingController::class,'list_api']);

// Create meeting room using topic, agenda, start_time.
Route::post('/meetings',[MeetingController::class,'create_api']);

// Get information of the meeting room by ID.
Route::get('/meetings/{id}',[MeetingController::class,'get'])->where('id', '[0-9]+');
Route::patch('/meetings/{id}', [MeetingController::class,'update'])->where('id', '[0-9]+');
Route::delete('/meetings/{id}', [MeetingController::class,'delete'])->where('id', '[0-9]+');


