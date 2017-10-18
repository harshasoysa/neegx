<?php

namespace Neegx\Foundation\Contracts;

interface ResponseInterface
{
    
    public static function Instance();
   
    public function send();

    public function set_http_header();

}