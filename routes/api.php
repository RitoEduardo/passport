<?php

use Illuminate\Http\Request;

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

Route::group(['middleware'=>['auth:api','scope:get-posts']], function () {
    Route::get('posts',function(){
        return App\Post::all();
    });
    Route::get('two-posts',function(){
        return App\Post::limit(2)->get();
    });
});
/*
Route::group(['middleware'=>['auth:api','scope:get-two-posts']], function () {
    Route::get('two-posts',function(){
        return App\Post::limit(2)->get();
    });
});
/*
Route::get('clients/posts', function(){
    return App\Post::all();
})->middleware("client");

Route::post('clients/posts', function( Request $request ){

    return ["status" => 200 ];
    dd(  $request->input("title"),  $request->input("body") );

    App\Post::create([
        'title' => $request->input("title"),
        'post' => $request->input("body")
    ]);
    return ["status" => 200 ];
})->middleware("client");
*/