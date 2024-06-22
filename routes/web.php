<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\member_controller;
use App\Http\Controllers\login_controller;

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

Route::get('admin/createmember', [member_controller::class, 'createform']);
Route::post('admin/createmember', [member_controller::class, 'store']);
Route::get('admin/members', [member_controller::class, 'index']);
Route::get('/admin/member/{id}', [member_controller::class, 'show']);

Route::get('/admin/panelcreate', [member_controller::class, 'panalcreateform']);
Route::post('/admin/panelcreate', [member_controller::class, 'panelstore']);

Route::get('admin/makeexecutive/{id}', [member_controller::class, 'makeexecutive']);
Route::post('admin/makeexecutive', [member_controller::class, 'storeexecutive']);


Route::get('login', [login_controller::class, 'index']);
