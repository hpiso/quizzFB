<?php

/* ---------- FRONT ----------*/

//$app->get('/', function () use ($app) {
//    return $app->welcome();
//});

$app->get('/', [
    'as' => 'front.index', 'uses' => 'FrontController@index'
]);

$app->get('/question', [
    'as' => 'front.question', 'uses' => 'FrontController@question'
]);

$app->post('/quizz/action', [
    'as' => 'quizz.action', 'uses' => 'FrontController@action'
]);

$app->get('/result', [
    'as' => 'front.result', 'uses' => 'FrontController@result'
]);

$app->get('/classement', [
    'as' => 'front.classement', 'uses' => 'FrontController@classement'
]);

$app->get('/quizz', 'FrontController@quizz');

//$app->filter('old', function()
//{
//    if (Input::get('age') < 200)
//    {
//        return Redirect::to('home');
//    }
//});


/* ---------- LOGIN ----------*/
$app->get('/login', [
    'as' => 'login', 'uses' => 'AuthController@redirectToProvider'
]);
$app->get('/callback', [
    'as' => 'callback', 'uses' => 'AuthController@handleProviderCallback'
]);

$app->get('/logout', [
    'as' => 'logout', 'uses' => 'AuthController@logout'
]);

/* ---------- ADMIN ----------*/

//Dashboard
$app->get('admin/dashboard', [
    'as' => 'dashboard.index', 'uses' => 'DashboardController@index'
]);

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
$app->get('admin/quizz/{id}/edit', [
    'as' => 'quizz.edit', 'uses' => 'QuizzController@edit'
]);
$app->get('admin/quizz/{id}/update', [
    'as' => 'quizz.update', 'uses' => 'QuizzController@update'
]);
$app->get('admin/quizz/{id}/show', [
    'as' => 'quizz.show', 'uses' => 'QuizzController@show'
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
$app->get('admin/question/{id}/delete', [
    'as' => 'question.destroy', 'uses' => 'QuestionController@destroy'
]);
$app->post('admin/question/store', [
    'as' => 'question.store', 'uses' => 'QuestionController@store'
]);
$app->get('admin/question/{id}/show', [
    'as' => 'question.show', 'uses' => 'QuestionController@show'
]);
$app->get('admin/question/{id}/edit', [
    'as' => 'question.edit', 'uses' => 'QuestionController@edit'
]);
$app->get('admin/question/{id}/update', [
    'as' => 'question.update', 'uses' => 'QuestionController@update'
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

//Users
$app->get('admin/users', [
    'as' => 'users.index', 'uses' => 'UserController@index'
]);

$app->get('admin/users/export.csv', [
    'as' => 'users.export', 'uses' => 'UserController@export'
]);