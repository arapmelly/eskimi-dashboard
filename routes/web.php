<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

// Route::get('/', function () {
//     return Inertia::render('Welcome', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });

Route::get('/', function () {
    return Redirect::to('/login');
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('creatives', 'App\Http\Controllers\CreativeController@index')->name('creatives.index');
Route::post('creatives', 'App\Http\Controllers\CreativeController@store')->name('creatives.store');
Route::get('creatives/create', 'App\Http\Controllers\CreativeController@create')->name('creatives.create');
Route::get('creatives/edit/{id}', 'App\Http\Controllers\CreativeController@edit')->name('creatives.edit');
Route::post('creatives/update', 'App\Http\Controllers\CreativeController@update')->name('creatives.update');
Route::get('creatives/delete/{id}', 'App\Http\Controllers\CreativeController@delete')->name('creatives.delete');