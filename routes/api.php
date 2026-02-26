<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\LanguageController;
use App\Http\Controllers\API\QuestionController;
use App\Http\Controllers\API\AnswerController;
use App\Http\Controllers\API\VoteController;
use App\Http\Controllers\API\NotificationSendController;
use App\Http\Controllers\API\ContactUsController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/register', [UserController::class, 'store']);
Route::get('/sendOTP', [UserController::class, 'sendOTP']);
Route::get('/checkOTP', [UserController::class, 'checkOTP']);
Route::get('/language', [LanguageController::class, 'getAll']);
Route::get('/sendMail', [ContactUsController::class, 'sendMail']);

Route::post("/signup", [UserController::class, 'signup']);
Route::post("/signin", [UserController::class, 'signin']);

Route::post('/password/email', [UserController::class, 'sendResetLinkEmail'] )->name('api.password.email');

Route::group(['middleware' => 'jwt.auth'], function () {
    Route::get("notify/sendPushNotification", [ NotificationSendController::class, "sendPushNotification"]);
    Route::get("question/question_by_id", [ QuestionController::class, "getQuestionById"]);

    Route::resource('user',         UserController::class);
    Route::resource('question',     QuestionController::class);
    Route::resource('answer',       AnswerController::class);
    Route::resource('vote',         VoteController::class);
    Route::resource('contact_us',   ContactUsController::class);
});