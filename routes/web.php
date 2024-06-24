<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\member_controller;
use App\Http\Controllers\login_controller;
use App\Http\Controllers\post_controller;
use App\Http\Controllers\postview_controller;

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
    return view('welcome');
});


// Reporter routes

Route::get('reporter/createnews', [post_controller::class, 'createNews']);
Route::post('reporter/createnews', [post_controller::class, 'storeNews']);
Route::get('reporter/news', [post_controller::class, 'news']);
Route::get('reporter/editNews/{id}', [post_controller::class, 'editNews']);
Route::post('reporter/editnews', [post_controller::class, 'updateNews']);

Route::get('reporter/createArticles', [post_controller::class, 'createArticle']);
Route::post('reporter/createArticles', [post_controller::class, 'storeArticle']);
Route::get('reporter/articles', [post_controller::class, 'articles']);
Route::get('reporter/editArticles/{id}', [post_controller::class, 'editArticle']);
Route::post('reporter/editArticle', [post_controller::class, 'updateArticle']);

Route::get('reporter/createAnnouncements', [post_controller::class, 'createAnnouncement']);
Route::post('reporter/createAnnouncements', [post_controller::class, 'storeAnnouncement']);
Route::get('reporter/announcements', [post_controller::class, 'announcements']);
Route::get('reporter/editAnnouncements/{id}', [post_controller::class, 'editAnnouncement']);
Route::post('reporter/editAnnouncement', [post_controller::class, 'updateAnnouncement']);


// Admin routes

Route::get('admin/createmember', [member_controller::class, 'createform']);
Route::post('admin/createmember', [member_controller::class, 'store']);
Route::get('admin/members', [member_controller::class, 'index']);

Route::get('admin/executives', [member_controller::class, 'executives']);

Route::get('admin/reporters', [member_controller::class, 'reporters']);
Route::get('admin/removereporter/{id}', [member_controller::class, 'removereporter']);

Route::get('admin/admins', [member_controller::class, 'admins']);
Route::get('admin/removeadmin/{id}', [member_controller::class, 'removeadmin']);

Route::get('/admin/panelcreate', [member_controller::class, 'panalcreateform']);
Route::post('/admin/panelcreate', [member_controller::class, 'panelstore']);

Route::get('admin/makeexecutive/{id}', [member_controller::class, 'makeexecutive']);
Route::post('admin/makeexecutive', [member_controller::class, 'storeexecutive']);





// Common routes

Route::get('login', [login_controller::class, 'index']);
Route::post('login', [login_controller::class, 'login']);
Route::get('logout', [login_controller::class, 'logout']);
Route::get('selector', [login_controller::class, 'selector']);

Route::get('changepassword', [login_controller::class, 'changePassword']);
Route::post('changepassword', [login_controller::class, 'storePassword']);




// Viewer routes

Route::get('news', [postview_controller::class, 'news']);
