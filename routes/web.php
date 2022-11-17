<?php

use App\Http\Controllers\ListingController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [ListingController::class, 'home']);

// Show register create form
Route::get('/register', [UserController::class, 'register'])->middleware('guest');

// Store new user
Route::post('/users/register', [UserController::class, 'store']);

// Log user out
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

// Show login form
Route::get('/login', [UserController::class, 'login'])->middleware('guest')->name('login');

// Authenticate use
Route::post('/users/login', [UserController::class, 'authenticate']);

// User Profile Page
Route::get('/my-profile', [UserController::class, 'myProfile'])->middleware('auth');

// Edit user data
Route::put('/users/my-profile/{user}', [UserController::class, 'save']);

// Edit password
Route::put('/users/my-profile/password_change/{user}', [UserController::class, 'passwordChange']);

// Add listing page
Route::get('/add-listing', [ListingController::class, 'addListingPage'])->middleware('auth');

// Create new advertisement
Route::post('/add-listing/create', [ListingController::class, 'create'])->middleware('auth');

// My dashboard page
Route::get('/dashboard', [ListingController::class, 'dashboard'])->middleware('auth');

// Search
Route::get('/search', [ListingController::class, 'search']);

// Listing detail page
Route::get('/detail/{id}', [ListingController::class, 'detailPage']);