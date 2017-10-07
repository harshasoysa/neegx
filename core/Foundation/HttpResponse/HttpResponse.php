<?php

namespace Neegx\Foundation\HttpResponse;

use Neegx\Foundation\Contracts\ResponseInterface;

class HttpResponse implements ResponseInterface
{
    private $feed;

    public function send(){
        var_dump($this->feed);
    }
    
    public function set_http_header(){

    }

    function __construct($feed){
        $this->feed=$feed;
    }
}