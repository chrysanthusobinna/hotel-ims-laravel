<?php

use App\Models\Room;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\RoomCategoryController;
use App\Http\Controllers\RoomCategoryPhotoController;

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

Route::get('/', function () {  return view('home-page');  })->name('home-page');

Route::get('/admin', [UserController::class, 'AdminLoginPage'])->name('admin-login-page');
Route::post('/admin', [UserController::class, 'AdminLogin'])->name('admin-login');

Route::get('/admin/logout', [UserController::class, 'logout'])->middleware('MustBeLoggedIn')->name('admin-logout');
Route::get('/admin/dashboard/', [UserController::class, 'AdminDashboard'])->middleware('MustBeLoggedIn')->name('admin.dashboard');
Route::get('/admin/update-password/', [UserController::class, 'UpdatePasswordPage'])->middleware('MustBeLoggedIn')->name('admin.update-passowrd-page');
Route::post('/admin/update-password/', [UserController::class, 'UpdatePassword'])->middleware('MustBeLoggedIn')->name('admin.update-passowrd');


Route::get('/admin/settings/', [SettingController::class, 'Index'])->middleware('MustBeLoggedIn')->name('admin.settings');
Route::get('/admin/settings/general-settings/', [SettingController::class, 'GeneralSettingsPage'])->middleware('MustBeLoggedIn')->name('admin.settings.general-settings-page');
Route::post('/admin/settings/general-settings/', [SettingController::class, 'GeneralSettings'])->middleware('MustBeLoggedIn')->name('admin.settings.general-settings');


Route::get('/admin/settings/room-categories/', [RoomCategoryController ::class, 'Index'])->middleware('MustBeLoggedIn')->name('admin.settings.room-categories');
Route::get('/admin/settings/room-categories/create', [RoomCategoryController ::class, 'Create'])->middleware('MustBeLoggedIn')->name('admin.settings.room-categories.create');
Route::post('/admin/settings/room-categories/store', [RoomCategoryController ::class, 'Store'])->middleware('MustBeLoggedIn')->name('admin.settings.room-categories.store');
Route::get('/admin/settings/room-categories/show/{id}', [RoomCategoryController ::class, 'Show'])->middleware('MustBeLoggedIn')->name('admin.settings.room-categories.show');
Route::get('/admin/settings/room-categories/edit/{id}', [RoomCategoryController ::class, 'Edit'])->middleware('MustBeLoggedIn')->name('admin.settings.room-categories.edit');
Route::put('/admin/settings/room-categories/update/{id}', [RoomCategoryController ::class, 'Update'])->middleware('MustBeLoggedIn')->name('admin.settings.room-categories.update');
Route::delete('/admin/settings/room-categories/delete/{id}', [RoomCategoryController ::class, 'Delete'])->middleware('MustBeLoggedIn')->name('admin.settings.room-categories.delete');


Route::get('/admin/settings/room-categories/{id}/photos/', [RoomCategoryPhotoController ::class, 'Index'])->middleware('MustBeLoggedIn')->name('admin.settings.room-categories.photos');
Route::post('/admin/settings/room-categories/photos/', [RoomCategoryPhotoController ::class, 'store'])->middleware('MustBeLoggedIn')->name('admin.settings.room-categories.photos.store');
Route::delete('/admin/settings/room-categories/photos/delete/{roomCategoryPhoto}', [RoomCategoryPhotoController::class, 'destroy'])->middleware('MustBeLoggedIn')->name('admin.settings.room-categories.photos.delete');


Route::get('/admin/settings/rooms/', [RoomController ::class, 'Index'])->middleware('MustBeLoggedIn')->name('admin.settings.rooms');
Route::get('/admin/settings/rooms/create/', [RoomController::class, 'create'])->middleware('MustBeLoggedIn')->name('admin.settings.rooms.create');
Route::post('/admin/settings/rooms/store/', [RoomController::class, 'Store'])->middleware('MustBeLoggedIn')->name('admin.settings.rooms.store');

Route::get('/admin/settings/rooms/edit/{id}', [RoomController ::class, 'Edit'])->middleware('MustBeLoggedIn')->name('admin.settings.rooms.edit');
Route::put('/admin/settings/rooms/update/{id}', [RoomController ::class, 'Update'])->middleware('MustBeLoggedIn')->name('admin.settings.rooms.update');

Route::delete('/admin/settings/rooms/delete/{id}', [RoomController ::class, 'Delete'])->middleware('MustBeLoggedIn')->name('admin.settings.room.delete');


