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

/* ---------- FRONT ----------*/
$app->get('/', [
    'as' => 'front.index', 'uses' => 'FrontController@index'
]);


/* ---------- ADMIN ----------*/

//Quizz
$app->get('admin/quizz', [
    'as' => 'quizz.index', 'uses' => 'QuizzController@index'
]);
$app->get('admin/quizz/create', [
    'as' => 'quizz.create', 'uses' => 'QuizzController@create'
]);
$app->post('admin/quizz/store', [
    'as' => 'quizz.store', 'uses' => 'QuizzController@store'
]);
$app->get('admin/quizz/{id}/delete', [
    'as' => 'quizz.destroy', 'uses' => 'QuizzController@destroy'
]);

//Question
$app->get('admin/question', [
    'as' => 'question.index', 'uses' => 'QuestionController@index'
]);
$app->get('admin/question/create', [
    'as' => 'question.create', 'uses' => 'QuestionController@create'
]);
$app->post('admin/question/filter', [
    'as' => 'question.filter', 'uses' => 'QuestionController@filter'
]);

//Theme
$app->get('admin/theme', [
    'as' => 'theme.index', 'uses' => 'ThemeController@index'
]);
$app->get('admin/theme/create', [
    'as' => 'theme.create', 'uses' => 'ThemeController@create'
]);
$app->post('admin/theme/store', [
    'as' => 'theme.store', 'uses' => 'ThemeController@store'
]);
$app->get('admin/theme/{id}/edit', [
    'as' => 'theme.edit', 'uses' => 'ThemeController@edit'
]);
$app->get('admin/theme/{id}/update', [
    'as' => 'theme.update', 'uses' => 'ThemeController@update'
]);
$app->get('admin/theme/{id}/delete', [
    'as' => 'theme.destroy', 'uses' => 'ThemeController@destroy'
]);