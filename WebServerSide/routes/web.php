<?php

use App\Http\Controllers\GiftController;
use App\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


Route::get('/',[IndexController::class, 'index'])->name('home');

Route::get('users/show-users', [UserController::class, 'getAllUsersView'])->name('user.showAllUsers');
Route::get('/users/add-user/', [UserController::class, 'getAddUserView'])->name('user.addUser');
Route::get('/users/display-user/{id}', [UserController::class, 'displayUser'])->name('user.displayUser');
Route::get('/users/delete-user/{id}', [UserController::class, 'deleteUser'])->name('user.deleteUser');
Route::post('/users/create-user', [UserController::class, 'createUser'])->name('user.createUser');


Route::get('/gifts/show-gifts', [GiftController::class, 'getAllGiftsView'])->name('gift.showAllGifts');
Route::get('/gifts/add-gift/', [GiftController::class, 'getAddGiftView'])->name('gift.addGift');
Route::get('/gifts/display-gift/{id}', [GiftController::class, 'displayGift'])->name('gift.displayGift');
Route::get('/gifts/delete-gift/{id}', [GiftController::class, 'deleteGift'])->name('gift.deleteGift');
Route::post('/gifts/create-gift', [GiftController::class, 'createGift'])->name('gift.createGift');
