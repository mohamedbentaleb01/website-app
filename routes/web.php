<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Models\Event;
use App\Models\User;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function() {

    return view('home');

})->middleware(['auth', 'verified']);


Route::resource('Forum', 'PostController');

Route::resource('users', 'UserController')->only([ 'show','edit', 'update']);

// profile user
Route::get('/profile', function() {

    $user = User::findorfail(Auth::user()->id);

    return view('user.profile', [
        'user' => $user,
    ]);
});

// store comments
Route::resource('posts.comment', 'PostCommentController')->only(['store', 'update', 'edit']);

// event test
Route::resource('events', 'EventController')->only(['index', 'show']);

Route::resource('event.participation', 'ParticipationEventController')->only(['create','store']);

//cotisation
Route::resource('event.cotisation', 'CotisationEventController')->only(['create', 'store']);
