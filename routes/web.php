<?php

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

$router->get('', function () use ($router) {
    return array_keys($router->app->router->getRoutes());
});

$router->group(['prefix' => 'v1'], function () use ($router) {
    $router->get('logs', ['uses' => 'LogController@getAllLogs']);
    $router->get('logs/{process_name}', ['uses' => 'LogController@getProcessLogs']);
    $router->post('log', ['uses' => 'LogController@create']);
});
