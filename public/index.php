<?php

/*
|-----------------------------------------------------------------
|  Neegx-Framework
|-----------------------------------------------------------------
|
|  Simple framework for simple websites
|
|-----------------------------------------------------------------
*/

define('NEEGX_START', true);

/*
|-----------------------------------------------------------------
| Implementing Autoloader
|-----------------------------------------------------------------
|
| We use composer Autoloder for our App
|
|-----------------------------------------------------------------
*/

require_once __DIR__.'/../vendor/autoload.php';

require_once __DIR__.'/../core/app.php';

$Kernal= new Neegx\Foundation\Kernel();

$response=$Kernal->handle(request());

$response->send();

$Kernal->terminate();