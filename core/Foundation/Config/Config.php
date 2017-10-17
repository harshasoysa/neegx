<?php
namespace Neegx\Foundation\Config;

use Neegx\Foundation\Contracts\ConfigInterface;

class Config implements ConfigInterface
{

    public static $all_config=array();

    public static function get($var){
        return Config::$all_config[$var];
    }

    public static function load(){

        $dir=__DIR__.'/../../../config/';

        $files=scandir($dir);

        $list=array();

        foreach($files as $file){

            if ($file != "." && $file != ".." && strtolower(substr($file, strrpos($file, '.') + 1)) == 'php')
            {
                $val=Config::return_file(__DIR__.'/../../../config/'.$file);
                if($val){array_push($list,$val);}
            }

        }
        Config::$all_config=$list;
        var_dump(Config::get(0));
    }

    private static function return_file($file){
        require $file;
        return (isset($config))?$config:NULL;
    }


}