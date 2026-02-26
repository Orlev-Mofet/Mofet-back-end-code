<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LanguageController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AnswerController;
use App\Http\Controllers\Admin\QuestionController;
use App\Http\Controllers\Admin\ConstantController;
use App\Http\Controllers\Admin\AdminNotificationController;
use App\Http\Controllers\Admin\ContactUsController;
use App\Http\Controllers\Admin\DatabaseController;

use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\Auth\AdminForgotPasswordController;


use App\Http\Controllers\API\UserController as APIUserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view("welcome");
});

Route::get('/policy', function () {
    return view("policy");
});


Route::post('/password/reset', [APIUserController::class, 'resetPassword'] )->name('api.password.reset');
Route::get('/password/reset/{token}', [APIUserController::class, 'showResetForm'] )->name('api.reset.password.get');


Route::group(['prefix' => 'admin', 'middleware' => 'prevent-back-history'], function(){
    //////  authenticate
    Route::get('/', [DashboardController::class, 'index'])->name('admin-dashboard');
    Route::get('/signup', [AdminLoginController::class, 'showSignUpForm'])->name('admin.signup');
    Route::post('/signup', [AdminLoginController::class, 'signup'])->name('admin.signup.submit');
    Route::get('/login', [AdminLoginController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AdminLoginController::class, 'login'])->name('admin.login.submit');
    Route::get('/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');

    //Password reset routes for admin
    Route::post('/password/email', [AdminForgotPasswordController::class, 'sendResetLinkEmail'] )->name('admin.password.email');
    Route::get('/password/reset', [AdminForgotPasswordController::class, 'showLinkRequestForm'] )->name('admin.password.request');
    Route::post('/password/reset', [AdminForgotPasswordController::class, 'resetPassword'] )->name('admin.password.reset');
    Route::get('/password/reset/{token}', [AdminForgotPasswordController::class, 'showResetForm'] )->name('reset.password.get');

    Route::group(['middleware' => 'authadmin' ],function(){
        Route::get('users/questions', [ UserController::class , 'questions'])->name("users.questions");
        Route::get('users/answers', [ UserController::class , 'answers'])->name("users.answers");
        Route::get('users/answersByQuestion', [ UserController::class , 'answersByQuestion'])->name("users.answersByQuestion");
        Route::get('users/excel', [ UserController::class , 'excel'])->name("users.excel");
        Route::get('users/show_all_data', [ UserController::class , 'showAllData'])->name("users.show_all_data");

        Route::get('answers/release_abuse', [ AnswerController::class , 'releaseAbuse'])->name("answers.release_abuse");
        Route::get('questions/release_abuse', [ QuestionController::class , 'releaseAbuse'])->name("questions.release_abuse");
        Route::get('questions/answers', [ QuestionController::class , 'answers'])->name("questions.answers");
        
        Route::get('admins/active', [ AdminController::class , 'active'])->name("admins.active");
        Route::get('admins/inactive', [ AdminController::class , 'inactive'])->name("admins.inactive");
        
        Route::get('database/backup', [ DatabaseController::class , 'backup'])->name("database.backup");
        Route::post('database/restore', [ DatabaseController::class , 'restore'])->name("database.restore");
        Route::get('database/backup_all', [ DatabaseController::class , 'backup_all'])->name("database.backup_all");
        Route::post('database/restore_all', [ DatabaseController::class , 'restore_all'])->name("database.restore_all");
        
        Route::resource('language', LanguageController::class);
        Route::resource('users', UserController::class);
        Route::resource('admins', AdminController::class);
        Route::resource('answers', AnswerController::class);
        Route::resource('questions', QuestionController::class);
        Route::resource('constant', ConstantController::class);
        Route::resource('admin_notification', AdminNotificationController::class);
        Route::resource('contact_us', ContactUsController::class);
    });

});