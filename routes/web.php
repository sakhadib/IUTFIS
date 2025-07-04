<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\member_controller;
use App\Http\Controllers\login_controller;
use App\Http\Controllers\post_controller;
use App\Http\Controllers\postview_controller;
use App\Http\Controllers\home_Controller;
use App\Http\Controllers\event_controller;
use App\Http\Controllers\workshop_controller;
use App\Http\Controllers\achievement_controller;
use App\Http\Controllers\panel_controller;
use App\Http\Controllers\about_controller;

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

// Reporter routes

Route::get('reporter/createNews', [post_controller::class, 'createNews']);
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


Route::get('reporter/deletepost/{id}', [post_controller::class, 'deletePost']);


Route::get('reporter/createEvents', [event_controller::class, 'createEvent']);
Route::post('reporter/createEvents', [event_controller::class, 'storeEvent']);
Route::get('reporter/Events', [event_controller::class, 'allEvents']);
Route::get('reporter/editEvents/{id}', [event_controller::class, 'editEvent']);
Route::post('reporter/editEvents/{id}', [event_controller::class, 'updateEvent']);
Route::get('reporter/deleteEvent/{id}', [event_controller::class, 'deleteEvent']);


Route::get('reporter/createWorkshops', [workshop_controller::class, 'createWorkshop']);
Route::post('reporter/createWorkshops', [workshop_controller::class, 'storeWorkshop']);
Route::get('reporter/workshops', [workshop_controller::class, 'allWorkshops']);
Route::get('reporter/editWorkshops/{id}', [workshop_controller::class, 'editworkshop']);
Route::post('reporter/editWorkshops/{id}', [workshop_controller::class, 'updateWorkshop']);
Route::get('reporter/deleteWorkshop/{id}', [workshop_controller::class, 'deleteWorkshop']);

Route::get('reporter/addSpeaker/{id}', [workshop_controller::class, 'addSpeakerform']);
Route::post('reporter/addSpeaker/{id}', [workshop_controller::class, 'storeSpeaker']);
Route::get('reporter/removeSpeaker/{id}', [workshop_controller::class, 'removeSpeaker']);



Route::get('reporter/createAchievements', [achievement_controller::class, 'createForm']);
Route::post('reporter/createAchievements', [achievement_controller::class, 'store']);
Route::get('reporter/achievements', [achievement_controller::class, 'allAchievements']);
Route::get('reporter/editAchievements/{id}', [achievement_controller::class, 'editAchievement']);
Route::post('reporter/editAchievements/{id}', [achievement_controller::class, 'updateAchievement']);
Route::get('reporter/deleteAchievement/{id}', [achievement_controller::class, 'deleteAchievement']);

Route::get('reporter/addWinner/{id}', [achievement_controller::class, 'addWinnerform']);
Route::post('reporter/addWinner/{id}', [achievement_controller::class, 'storeWinner']);
Route::get('reporter/removeWinner/{id}', [achievement_controller::class, 'removeWinner']);


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

Route::get('/', [home_Controller::class, 'index']);

Route::get('news', [postview_controller::class, 'news']);
Route::get('articles', [postview_controller::class, 'articles']);
Route::get('announcements', [postview_controller::class, 'announcements']);

Route::get('News/{id}', [postview_controller::class, 'newsdetails']);
Route::get('Articles/{id}', [postview_controller::class, 'articledetails']);
Route::get('Announcements/{id}', [postview_controller::class, 'announcementdetails']);

Route::get('events', [postview_controller::class, 'events']);
Route::get('event/{id}', [postview_controller::class, 'eventdetails']);
Route::get('allevents', [postview_controller::class, 'allevents']);

Route::get('workshops', [workshop_controller::class, 'viewworkshops']);
Route::get('workshop/{id}', [workshop_controller::class, 'workshopdetails']);
Route::get('allworkshops', [workshop_controller::class, 'view_all_workshops']);

Route::get('achievements', [achievement_controller::class, 'viewachievements']);
Route::get('achievement/{id}', [achievement_controller::class, 'viewwinners']);

Route::get('executives', [panel_controller::class, 'currentExecutives']);
Route::get('executives/{id}', [panel_controller::class, 'executives']);

Route::get('panels', [panel_controller::class, 'index']);

Route::get('profile/{id}', [panel_controller::class, 'profile']);
Route::post('update_links/{id}', [panel_controller::class, 'update_links']);
Route::post('updatebio/{id}', [panel_controller::class, 'update_bio']);
Route::post('updatepm/{id}', [panel_controller::class, 'update_pm']);



Route::get('about', [about_controller::class, 'index']);




Route::get('toast', function () {
    return view('toast');
});


Route::fallback(function () {
    return view('404', ['header' => '404 - Not found']);
});
