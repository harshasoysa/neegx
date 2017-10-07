<?php
/*
|-----------------------------------------------------------------
| Add routes to your application
|-----------------------------------------------------------------
|
| $routes['request_method']['path']=""
|
|-----------------------------------------------------------------
*/

use Neegx\Foundation\Route\Route;

Route::get('/','HomeContoller.welcome');