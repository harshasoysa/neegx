<?php

namespace Neegx\Foundation\Contracts;

interface ResponseInterface
{
  
   
    public function send();

    public function set_http_header();

}