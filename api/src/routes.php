<?php

use Slim\Http\Request;
use Slim\Http\Response;

// Routes

$app->get('/recipes', '\App\Controllers\RecipeController:get');
$app->post('/recipes', '\App\Controllers\RecipeController:post');
$app->delete('/recipes/{id}', '\App\Controllers\RecipeController:delete');
$app->put('/recipes/{id}', '\App\Controllers\RecipeController:update');
