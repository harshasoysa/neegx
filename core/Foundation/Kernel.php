<?php 
    
namespace Neegx\Foundation;

use Neegx\Foundation\Contracts\KernelInterface;
use Neegx\Foundation\HttpResponse\HttpResponse;
use Neegx\Foundation\Route\Route;
use Neegx\Foundation\TemplateHandler\TemplateHandler;

class Kernel
{
    public function __construct(){
        $this->tpl_engine=new TemplateHandler();
    }
    
    public function handle($request)
    {
        $action=Route::handle($request);

        $controler_class= 'App\\Controllers\\'.(string)$action[0];

        $controler_method=$action[1];
        
        $instance=new $controler_class();

        $instance->$controler_method();

        $response=HttpResponse::Instance();
        
        return $response;
    }
    
    public function terminate()
    {

    }
}