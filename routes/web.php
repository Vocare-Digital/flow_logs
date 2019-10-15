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
    $router->get('process', ['uses' => 'ProcessController@getAllProcesses']);
    $router->get('process/{processId}', ['uses' => 'ProcessController@getProcess']);
    $router->post('process', ['uses' => 'ProcessController@createProcess']);
    $router->patch('process/{processId}', ['uses' => 'ProcessController@updateProcess']);
    $router->delete('process/{processId}', ['uses' => 'ProcessController@deleteProcess']);


    $router->get('process/{processId}/logs', ['uses' => 'ProcessLog@getProcessLogs']);
    $router->get('process/{processId}/log/{processLogId}', ['uses' => 'ProcessLog@getProcessLog']);
    $router->post('process/{processId}/log', ['uses' => 'ProcessLog@createProcessLog']);
});
