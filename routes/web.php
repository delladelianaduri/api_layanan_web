<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});
/** @var \Laravel\Lumen\Routing\Router $router */

$router->group(['prefix' => 'api'], function () use ($router) {
    $router->post('/register', 'AuthController@register');
    $router->post('/login', 'AuthController@login');
});

$router->group(['prefix' => 'api'], function () use ($router) {
    $router->post('login', 'AuthController@login');

    $router->get('barangs', 'BarangController@index');
    $router->get('barangs/{id}', 'BarangController@show');
    $router->post('barangs', 'BarangController@store');
    $router->put('barangs/{id}', 'BarangController@update');
    $router->delete('barangs/{id}', 'BarangController@destroy');
});
