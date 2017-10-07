<?php

namespace Neegx\Foundation\Route;

use Neegx\Foundation\Contracts\RouteInterface;

class Route implements RouteInterface{

    private static $routes= array();


    

    public static function get($route,$action){

        self::$routes['GET'][$route]=$action;

    }



    public static function post($route,$action){

        self::$routes['POST'][$route]=$action;

    }


    public static function handle($request)
    {
        return self::checkRoute($request);
        
    }

    public static function checkRoute($request)
    {
        $action=NULL;

        if($request->method==='GET'){
            $action=self::find_get_routes($request);
        }elseif($request->method==='POST'){
            $action=self::find_post_routes($request);
        }

        return $action;
    }



    private static function find_get_routes($request){
        
        if(array_key_exists($request->get_url_path(),self::$routes['GET']))
        {
            $action = self::$routes['GET'][$request->get_url_path()];
            $action = explode('.',$action);
            return $action;
        }

    }


    private static function find_post_routes($request){
        
        if(array_key_exists($request->get_url_path(),self::$routes['POST']))
        {
            $action = self::$routes['POST'][$request->get_url_path()];
            $action = explode('.',$action);
            return $action;
        }

    }



}


