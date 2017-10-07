<?php

namespace Neegx\Foundation\Contracts;

interface HttpRequestInterface
{
  
    /*
    |-----------------------------------------------------------------
    | get selected data from GET request
    |-----------------------------------------------------------------
    */
    public function get($name);

    
    /*
    |-----------------------------------------------------------------
    | get selected data from POST request
    |-----------------------------------------------------------------
    */
    public function post($name);

    
    /*
    |-----------------------------------------------------------------
    |  get the current page url
    |-----------------------------------------------------------------
    */
    public function get_url_path();

    
    /*
    |-----------------------------------------------------------------
    | get array of query string data
    |-----------------------------------------------------------------
    */
    public function get_query_string_data();

    
}