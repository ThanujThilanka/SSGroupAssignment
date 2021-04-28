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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::group(['middleware' => ['json.response']], function () {

    Route::middleware('auth:api')->get('/user', function (Request $request) {
        return $request->user();
    });

    // public routes
    Route::post('/login', 'Api\AuthController@login')->name('login.api');
    Route::post('/register', 'Api\AuthController@register')->name('register.api');

    // private routes
    Route::middleware('auth:api')->group(function () {
        Route::get('/logout', 'Api\AuthController@logout')->name('logout');
    });

    // json store routes list
    Route::middleware('auth:api')->group(function () {

        Route::get('/user', 'Api\UserController@index')->name('user');
        Route::get('/ticket', 'Api\TicketController@index')->name('user');
        Route::get('/organization', 'Api\OrganizationController@index')->name('user');

        Route::get('/user/{id}', 'Api\UserController@searchByOrganizationId')->name('user.search');
        Route::get('/ticket/{id}', 'Api\TicketController@searchByOrganizationId')->name('ticket.search');
        Route::get('/organization/{id}', 'Api\OrganizationController@searchByOrganizationId')->name('organization.search');

        Route::get('/organizations/{id}', 'Api\OrganizationController@search')->name('organization.search.ticket');

        Route::get('/users/{name}', 'Api\UserController@search')->name('user.search.ticket');

        Route::get('/tickets/{subject}', 'Api\TicketController@search')->name('ticket.search.user');
    });


});
