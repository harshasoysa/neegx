<?php

namespace Neegx\Foundation\HttpResponse;

use Neegx\Foundation\Contracts\ResponseInterface;

class HttpResponse implements ResponseInterface
{
   
    private $content;

    public static function Instance(){
        
        static $response= NULL;

        if ($response === null) {
            $response = new HttpResponse();
        }
        return $response;

    }

    public function send(){
        echo $this->content;
    }

    public function add_content($content){
        $this->content=$content;
    }
    
    public function set_http_header(){

    }

    private function __construct(){

    }
}