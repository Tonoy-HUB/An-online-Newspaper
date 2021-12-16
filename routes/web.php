<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\UserController;  
use App\Http\Controllers\ReporterController; 
use App\Http\Controllers\BackController;  
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PagesController;

use Illuminate\Foundation\Auth\EmailVerificationRequest; 

Route::get('/', [PagesController::class, 'homepage']);
Route::get('/categorya/{id}', [PagesController::class, 'categorya'])->name('category.categorya');
Route::get('/contactus', [PagesController::class, 'contactus'])->name('category.contactus');
Route::get('/article/{id}', [PagesController::class, 'article'])->name('category.article');

Route::post('/event_search', [PagesController::class, 'event_search'])->name('event_search');



Route::get('/events', [EventsController::class, 'index'])->name('post.index');
Route::get('/events/create', [EventsController::class, 'create'])->name('post.create'); 
Route::post('/store', [EventsController::class, 'store'])->name('store');
Route::get('/event/{id}', [EventsController::class, 'show'])->name('post.show');
Route::get('/post/{id}/edit', [EventsController::class, 'edit'])->name('post.edit');
Route::delete('/post/{id}', [EventsController::class, 'delete'])->name('event_delete');  
Route::put('/post/{id}', [EventsController::class, 'update'])->name('post.update');
Route::post('/events', [EventsController::class, 'event_search'])->name('admin.event_search');


Route::prefix('reporter')->group(function(){
    Route::get('/news', [ReporterController::class, 'news_index'])->name('reporters.news_index');
    Route::get('/news/create', [ReporterController::class, 'news_create'])->name('reporters.news_create'); 
    Route::post('/new', [ReporterController::class, 'news_store'])->name('reporters.new_store');
    Route::get('/news/{id}', [ReporterController::class, 'news_show'])->name('reporters.news_show');
    Route::get('/news/{id}/edit', [ReporterController::class, 'news_edit'])->name('reporters.news_edit');
    Route::delete('/news/{id}', [ReporterController::class, 'news_delete'])->name('reporters.news_delete');  
    Route::put('/news/{id}', [ReporterController::class, 'news_update'])->name('reporters.news_update');  
    Route::post('/news', [ReporterController::class, 'news_search'])->name('reporters.news_search');
 
});


Route::get('/category', [EventsController::class, 'type_index'])->name('types.index');
Route::get('/category/create', [EventsController::class, 'type_create'])->name('types.create'); 
Route::post('/store1', [EventsController::class, 'type_store'])->name('type_store');
Route::get('/types/{id}', [EventsController::class, 'type_show'])->name('types.show');
Route::get('/types/{id}/edit', [EventsController::class, 'type_edit'])->name('types.edit');
Route::delete('/types/{id}', [EventsController::class, 'type_delete'])->name('category_delete');  
Route::put('/types/{id}', [EventsController::class, 'type_update'])->name('types.update');



Route::get('/reporters', [EventsController::class, 'reporter_index'])->name('reporter_index');
Route::get('/reporter/create', [EventsController::class, 'reporter_create'])->name('reporter_create');
Route::post('/reporter', [EventsController::class, 'reporter_store'])->name('reporter_store');
Route::get('/reporter/{id}/edit', [EventsController::class, 'reporter_edit'])->name('reporter_edit');
Route::put('/reporter/{id}', [EventsController::class, 'reporter_update'])->name('reporter_update');
Route::delete('/reporter/{id}', [EventsController::class, 'reporter_delete'])->name('reporter_delete'); 



Route::get('/users', [ReporterController::class, 'user_index'])->name('user_index');
Route::get('/user/create', [ReporterController::class, 'user_create'])->name('user_create');
Route::post('/user', [ReporterController::class, 'user_store'])->name('user_store');
Route::get('/user/{id}/edit', [ReporterController::class, 'user_edit'])->name('user_edit');
Route::put('/user/{id}', [ReporterController::class, 'user_update'])->name('user_update');
Route::delete('/user/{id}', [ReporterController::class, 'user_delete'])->name('user_delete'); 
Route::get('/user/{id}', [ReporterController::class, 'user_show'])->name('user_show');




Route::get('/feedback', [UserController::class, 'feedback_index'])->name('feedback.index');
Route::get('/feedback/{id}', [UserController::class, 'feedback_show'])->name('feedback.show');


Route::get('/contuct', [UserController::class, 'contuct_index'])->name('contuct.index');
Route::get('/contuct/create', [UserController::class, 'contuct_create'])->name('contuct.create'); 
Route::post('/contuct_store', [UserController::class, 'contuct_store'])->name('contuct_store');
Route::get('/contuct/{id}', [UserController::class, 'contuct_show'])->name('contuct.show');
Route::get('/contuct/{id}/edit', [UserController::class, 'contuct_edit'])->name('contuct.edit');
Route::put('/contuct/{id}', [UserController::class, 'contuct_update'])->name('contuct.update');
Route::delete('/contuct/{id}', [UserController::class, 'contuct_delete'])->name('contuct_delete');  



    Route::get('/roles', [BackController::class, 'role_index'])->name('role_index');
    Route::get('/role/create', [BackController::class, 'role_create'])->name('role_create');
    Route::post('/role', [BackController::class, 'role_store'])->name('role_store');
    Route::get('/role/{id}/edit', [BackController::class, 'role_edit'])->name('role_edit');
    Route::put('/role/{id}', [BackController::class, 'role_update'])->name('role_update');
    Route::put('/roles/{id}', [BackController::class, 'role_disable'])->name('role_disable');




Auth::routes(['verify' => true]); 

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('is_user');
Route::get('/admin/home', [App\Http\Controllers\HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');
Route::get('/reporter/home', [App\Http\Controllers\HomeController::class, 'reporterHome'])->name('reporter.home')->middleware('is_reporter');


Route::get('/email/verify', function () {
    return view('auth.verify');
})->middleware('auth')->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');
Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');
