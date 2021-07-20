<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ScrapingController;
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

Route::get('/', [ScrapingController::class, 'index'])->name('index');
Route::post('/', [ScrapingController::class, 'add'])->name('add');
Route::get('/list', [ScrapingController::class, 'list'])->name('list');


// Route::get('/scraping', function() {
//     return view('scraping.app');
// });

Route::get('/scraping/edit/{scraping_id}', function($scraping_id) {
    return $scraping_id . 'のページ';
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');
