<?php

use Illuminate\Http\Request;
use App\Http\Resources\Movie as MovieResource;
use App\Models\Movies\Movie;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::resources([
    'movie' => 'Api\MovieController',
]);

Route::resources([
    'article' => 'ArticleController',
]);

//in case of error great routes seperatly as shown in teh tutorial video
