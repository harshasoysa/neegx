<?php

namespace Neegx\Foundation\Contracts;

interface RouteInterface
{
  
    /*
    |-----------------------------------------------------------------
    | get selected data from GET request
    |-----------------------------------------------------------------
    */
    public static function get($route,$action);

    
    /*
    |-----------------------------------------------------------------
    | get selected data from POST request
    |-----------------------------------------------------------------
    */
    public static function post($route,$action);

    public static function handle($request);

    public static function checkRoute($request);

}