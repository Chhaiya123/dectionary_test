<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WordController;
use App\Models\Word;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Database\Eloquent\Collection;

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
    return view('pages.home');
    // return view('dashboard');
});

// Route::get([
//     'verify' => true
// ]);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/home', function () {
        $data = Auth::user();
        $data_word = Word::paginate(9);
        // $paginatedItems = $data_word->paginate(10);
        return view('pages.home', compact('data','data_word'));
    })->name('dashboard');
   
});
Route::controller(WordController::class)->group(function() {
    Route::get('/word', 'word')->name('word');
    Route::get('/word.search', 'search')->name('word.search');
});
Route::controller(ProfileController::class)->group(function() {
    Route::get('/setting', 'setting')->name('setting');
    Route::get('/profile', 'viewProfile')->name('profile');
   
});

