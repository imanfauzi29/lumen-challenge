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


$router->get('user/{age}', ['middleware' => ['agechecker:age'], 'uses' => 'UserController@index']);
$router->post('user', 'UserController@create');

$router->post('auth', 'AuthController@auth');
$router->group(['middleware' => 'jwt'], function () use ($router) {
    $router->group(['prefix' => 'api/v1'], function () use ($router) {

        // author
        $router->get("author", "AuthorController@get");
        $router->post("author", "AuthorController@create");
        $router->get("author/{id}", "AuthorController@getById");
        $router->delete("author/{id}", "AuthorController@delete");
        $router->patch("author/{id}", "AuthorController@update");

        // post
        $router->get("post", "PostController@get");
        $router->post("post", "PostController@create");
        $router->get("post/{id}", "PostController@getById");
        $router->delete("post/{id}", "PostController@delete");
        $router->patch("post/{id}", "PostController@update");

        // comment
        $router->get("comment", "CommentController@get");
        $router->post("comment", "CommentController@create");
        $router->get("comment/{id}", "CommentController@getById");
        $router->delete("comment/{id}", "CommentController@delete");
        $router->patch("comment/{id}", "CommentController@update");


        // $router->get("post/author", "PostController@relAuthor");
        $router->get("post/{id}/author", "PostController@relAuthorById");


        $router->get("author/post/comment", "CommentController@allTable");
    });
});
