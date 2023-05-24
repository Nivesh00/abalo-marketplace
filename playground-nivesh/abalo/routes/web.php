<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function ()
{
    return view('welcome');
});

Route::get('/testdata', [\App\Http\Controllers\AbTestDataController::class, 'getAllEquipment']);

// Meilenstein 1 Aufgabe 6


Route::get('/login', [App\Http\Controllers\AuthController::class, 'login'])->name('login');
Route::get('/logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('logout');
Route::get('/isloggedin', [App\Http\Controllers\AuthController::class, 'isloggedin'])->name('haslogin');

/*
Route::get('/login', function ()
{
    return view('login_page');
})->name('login');

Route::post('login_verify',
    [
    \App\Http\Controllers\AuthController::class,
    'verify_login'
    ])->name('verify_login');

Route::get(('/logout'),
    [
        \App\Http\Controllers\AuthController::class,
        'logout'
    ])->name('logout');

Route::get('/check_loggin',
    [
        \App\Http\Controllers\AuthController::class,
        'check_loggin'
    ])->name('check_loggin');

*/

// Meilenstein 1 Aufgabe 10
Route::get('/articles', [App\Http\Controllers\ArticleController::class, 'articlesfound']);

// Meilenstein 2 Aufgabe 7
Route::get('/navigationsmenue', function ()
{
    return view ('navigationsmenue');
});

// Meilenstein 2 Aufgabe 8
Route::get('/cookiecheck', function ()
{
    return view ('cookiecheck');
});

// Meilenstein 2 Aufgabe 9
Route::get('/newarticle', function ()
    {
        //if(session()->has('Auth'))
          //  if(session()->get('Auth'))
                return view('newarticle');

        //return redirect()->route('login');
    });

/*
Route::get('/newarticle_', function ()
    {
        return view('M02.aufgabe9');
    })->name('newarticle');
*/

Route::post('/newarticle_verify',
    [
        \App\Http\Controllers\NewArticleController::class,
        'verify'
    ])->name('verify');


Route::get('search', function (){
        return view('article_search');
    });

//Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
