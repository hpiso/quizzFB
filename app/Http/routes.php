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

$app->get('/', function () use ($app) {
    return $app->welcome();
});

//admin
$app->get('admin/dashboard', [
    'as' => 'admin.index', 'uses' => 'AdminController@index'
]);

//Quizz
$app->get('admin/quizz', [
    'as' => 'quizz.index', 'uses' => 'QuizzController@index'
]);

//Question
$app->get('admin/question', [
    'as' => 'question.index', 'uses' => 'QuestionController@index'
]);