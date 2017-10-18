<?php
namespace Neegx\Foundation\Config;

use Neegx\Foundation\Contracts\ConfigInterface;
use Neegx\Support\Arr\Arr;

class Config implements ConfigInterface
{

    public static $all_config=array();

    public static function get($var){
        if(Arr::get(static::$all_config,$var)){
            return Arr::get(static::$all_config,$var);
        }else{
            return NULL;
        }
        
    }

    public static function load(){

        $dir=__DIR__.'/../../../config/';

        $files=scandir($dir);

        $list=array();

        foreach($files as $file){

            if ($file != "." && $file != ".." && strtolower(substr($file, strrpos($file, '.') + 1)) == 'php')
            {
                $val=Config::return_file(__DIR__.'/../../../config/'.$file);
                if($val){
                    $list[strtolower(substr($file,0, strrpos($file, '.')))]=$val;
                }
            }

        }
        static::$all_config=$list;

    }

    private static function return_file($file){
        require $file;
        return (isset($config))?$config:NULL;
    }

    private function __construct(){

    }


}