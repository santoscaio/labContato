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

/**
 * Welcome message
 *
 *
 * @return Response
 */
$app->get('/', function () use ($app) {
	echo 'Contatos' . '<br>';
	echo 'Autor: Caio Santos' . '<br>';
	echo 'Email: santoscaio@gmail.com' . '<br>';
});

$app->get('contato/{id}', 'ContatoController@select'); //
$app->post('contato/', 'ContatoController@insert'); //
$app->put('contato/{id}', 'ContatoController@update'); //
$app->delete('contato/{id}', 'ContatoController@delete'); //