<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/articles/{name}',
            [
               \App\Http\Controllers\ArticleController::class, 'getArticles_api'
            ]);

Route::post(
    'articles',

    [
        \App\Http\Controllers\NewArticleController::class, 'addArticle_api'
    ]
);

Route::get('/shoppingcart/{id}',
    [
        \App\Http\Controllers\WarenkorbController::class, 'getCart_api'
    ]);

Route::post(
    'shoppingcart',
    [
        \App\Http\Controllers\WarenkorbController::class, 'addToCart_api'
    ]
);

Route::delete('shoppingcart/{user_id}/articles/{article_id}',
    [
        \App\Http\Controllers\WarenkorbController::class, 'removeFromCart_api'
    ]
);
