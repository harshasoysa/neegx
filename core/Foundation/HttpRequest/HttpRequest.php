<?php

namespace Neegx\Foundation\HttpRequest;

use Neegx\Foundation\Contracts\HttpRequestInterface;

class HttpRequest implements HttpRequestInterface
{

    //Which request method was used to access the page; i.e. 'GET', 'HEAD', 'POST', 'PUT'.
    //'REQUEST_METHOD'

    public $method;

    
    
    /*
    |-----------------------------------------------------------------
    | GET data container
    |-----------------------------------------------------------------
    */
    
    private $get_request_data;

    
    
    /*
    |-----------------------------------------------------------------
    | POST data container
    |-----------------------------------------------------------------
    */
    private $post_request_data;


    /*
    |-----------------------------------------------------------------
    |  current page url
    |-----------------------------------------------------------------
    */
    private $url_path;

        
    /*
    |-----------------------------------------------------------------
    | array of query string data
    |-----------------------------------------------------------------
    */
    private $query_string_data;
    
    
    /*
    |-----------------------------------------------------------------
    | get data from $get_request_data
    |-----------------------------------------------------------------
    */
    public function get($name)
    {
        return $this->get_request_data[$name];
    }

    
    /*
    |-----------------------------------------------------------------
    | get data from $post_request_data
    |-----------------------------------------------------------------
    */
    public function post($name)
    {
        return $this->post_request_data[$name];
    }


    /*
    |-----------------------------------------------------------------
    |  get the current page url
    |-----------------------------------------------------------------
    */
    public function get_url_path()
    {
        return $this->url_path;
    }
    
        
    /*
    |-----------------------------------------------------------------
    | get array of query string data
    |-----------------------------------------------------------------
    */
    public function get_query_string_data()
    {
        return $this->query_string_data;
    }
    
    
    function __construct() {
        $this->method = $_SERVER['REQUEST_METHOD'];

        $this->get_request_data = gloabal_validate_input($_GET);

        $this->post_request_data = gloabal_validate_input($_POST);

        $this->method = $_SERVER['REQUEST_METHOD'];

        parse_str($_SERVER["QUERY_STRING"], $this->query_string_data);

        $this->url_path=strtok($_SERVER["REQUEST_URI"],'?');
    }   
    
}